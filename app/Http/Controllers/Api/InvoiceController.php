<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Database\Factories\InvoiceFactory;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * function index
     *
     * @param Request $request
     * @return
     */
    public function index(Request $request)
    {
        //
    }
    /**
     * function store
     *
     * @param Request $request
     * @return
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|integer|exists:customers,id',
            'payment_method' => 'required|string|in:braz', //braz,paypal,picpay
            'charge_info.description' => 'required|string|min:5|max:20',
            'charge_info.amount' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
        ]);

        $invoice = Invoice::create([
            'customer_id' => $request->integer('customer_id'),
            'description' => $request->input('charge_info.description'),
            'items' => InvoiceFactory::fakeItems(), //TODO Remover faker
            'amount' => \rand(10, 100) . '.00',
            'status' => Invoice::STATUS_OPENED,
        ]);

        if (!$invoice) {
            return response()->json([
                'success' => false,
                'message' => __('Fail to create invoice'),
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => __('Invoice create successfuly'),
        ], 200);
    }
}
