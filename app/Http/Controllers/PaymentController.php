<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    /**
     * Display a listing of payments with active rentals for the form.
     */
    public function index(Request $request)
    {
        $rentalId = $request->get('rental_id');

        $paymentsQuery = Payment::with(['rental.tenant', 'rental.room']);

        if ($rentalId) {
            $paymentsQuery->where('rental_id', $rentalId);
        }

        // Use pagination instead of get()
        $payments = $paymentsQuery->orderBy('created_at', 'desc')->paginate(10);

        // Fetch active rentals with tenant, room, and their payments for filtering
        $activeRentals = Rental::with(['tenant', 'room', 'payments'])
            ->where('status', 'ongoing')
            ->get();

        // Calculate totals
        $totalPaid = Payment::where('status', 'paid')->sum('amount_paid');
        $totalUnpaid = Payment::where('status', 'pending')->sum('amount_paid');

        return view('admin.Payments', compact('payments', 'activeRentals', 'totalPaid', 'totalUnpaid', 'rentalId'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch active rentals with tenant and room data for the dropdown
        $activeRentals = Rental::with(['tenant', 'room'])
            ->where('status', 'ongoing')
            ->get();

        return view('admin.payments.create', compact('activeRentals'));
    }

    /**
     * Store a newly created payment in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'rental_id' => [
                'required',
                'integer',
                'exists:rentals,id',
            ],
            'pay_month' => [
                'required',
                'string',
                'regex:/^\d{4}-\d{2}$/', // Format: YYYY-MM
            ],
            'amount_paid' => [
                'required',
                'numeric',
                'min:0',
                'max:999999.99',
            ],
            'paid_date' => [
                'required',
                'date',
                'before_or_equal:today',
            ],
            'status' => [
                'required',
                Rule::in(['paid', 'pending', 'overdue']),
            ],
        ], [
            // Custom error messages
            'rental_id.required' => 'សូមជ្រើសរើសការជួល',
            'rental_id.exists' => 'ការជួលនេះមិនមានក្នុងប្រព័ន្ធទេ',
            'pay_month.required' => 'សូមបញ្ចូលខែបង់ប្រាក់',
            'pay_month.regex' => 'ទម្រង់ខែមិនត្រឹមត្រូវ (ត្រូវតែជា YYYY-MM)',
            'amount_paid.required' => 'សូមបញ្ចូលចំនួនទឹកប្រាក់',
            'amount_paid.numeric' => 'ចំនួនទឹកប្រាក់ត្រូវតែជាលេខ',
            'amount_paid.min' => 'ចំនួនទឹកប្រាក់ត្រូវតែធំជាង ឬស្មើ 0',
            'amount_paid.max' => 'ចំនួនទឹកប្រាក់លើសកំណត់',
            'paid_date.required' => 'សូមបញ្ចូលកាលបរិច្ឆេទបង់ប្រាក់',
            'paid_date.date' => 'កាលបរិច្ឆេទមិនត្រឹមត្រូវ',
            'paid_date.before_or_equal' => 'កាលបរិច្ឆេទមិនអាចលើសពីថ្ងៃនេះបានទេ',
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.in' => 'ស្ថានភាពមិនត្រឹមត្រូវ',
        ]);

        // Check for duplicate payment (same rental_id and pay_month)
        $existingPayment = Payment::where('rental_id', $validated['rental_id'])
            ->where('pay_month', $validated['pay_month'])
            ->first();

        if ($existingPayment) {
            return back()
                ->withErrors(['pay_month' => 'ការបង់ប្រាក់សម្រាប់ការជួលនេះ និងខែនេះមានរួចហើយ'])
                ->withInput();
        }

        // Verify that the rental is ongoing
        $rental = Rental::find($validated['rental_id']);
        if ($rental->status !== 'ongoing') {
            return back()
                ->withErrors(['rental_id' => 'ការជួលនេះមិនសកម្មទេ'])
                ->withInput();
        }

        // Create the payment
        try {
            DB::beginTransaction();

            $payment = Payment::create([
                'rental_id' => $validated['rental_id'],
                'pay_month' => $validated['pay_month'],
                'amount_paid' => $validated['amount_paid'],
                'paid_date' => $validated['paid_date'],
                'status' => $validated['status'],
            ]);

            DB::commit();

            return redirect()
                ->route('admin.payments')
                ->with('success', 'ការបង់ប្រាក់ត្រូវបានបន្ថែមដោយជោគជ័យ');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withErrors(['error' => 'មានបញ្ហាក្នុងការបង្កើតការបង់ប្រាក់: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        $payment->load(['rental.tenant', 'rental.room']);
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $activeRentals = Rental::with(['tenant', 'room'])
            ->where('status', 'ongoing')
            ->get();

        return view('admin.payments.edit', compact('payment', 'activeRentals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'rental_id' => [
                'required',
                'integer',
                'exists:rentals,id',
            ],
            'pay_month' => [
                'required',
                'string',
                'regex:/^\d{4}-\d{2}$/',
            ],
            'amount_paid' => [
                'required',
                'numeric',
                'min:0',
                'max:999999.99',
            ],
            'paid_date' => [
                'required',
                'date',
                'before_or_equal:today',
            ],
            'status' => [
                'required',
                Rule::in(['paid', 'pending', 'overdue']),
            ],
        ]);

        // Check for duplicate payment (excluding current payment)
        $existingPayment = Payment::where('rental_id', $validated['rental_id'])
            ->where('pay_month', $validated['pay_month'])
            ->where('id', '!=', $payment->id)
            ->first();

        if ($existingPayment) {
            return back()
                ->withErrors(['pay_month' => 'ការបង់ប្រាក់សម្រាប់ការជួលនេះ និងខែនេះមានរួចហើយ'])
                ->withInput();
        }

        try {
            DB::beginTransaction();

            $payment->update($validated);

            DB::commit();

            return redirect()
                ->route('admin.payments')
                ->with('success', 'ការបង់ប្រាក់ត្រូវបានកែប្រែដោយជោគជ័យ');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withErrors(['error' => 'មានបញ្ហាក្នុងការកែប្រែការបង់ប្រាក់: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        try {
            $payment->delete();

            return redirect()
                ->route('admin.payments')
                ->with('success', 'ការបង់ប្រាក់ត្រូវបានលុបដោយជោគជ័យ');

        } catch (\Exception $e) {
            return back()
                ->withErrors(['error' => 'មានបញ្ហាក្នុងការលុបការបង់ប្រាក់: ' . $e->getMessage()]);
        }
    }
}
