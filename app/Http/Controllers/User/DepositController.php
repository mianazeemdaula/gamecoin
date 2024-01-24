<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helper\NowPayment;
use Illuminate\Support\Str;
use App\Models\Invoice;
use App\Models\Wallet;
class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $coins = [
        ['name' => 'tusdtrc20', 'icon' => '/images/coins/tusdtrc20.svg'],
        ['name' => 'BUSDBSC', 'icon' => '/images/coins/busdbsc.svg'],
        ['name' => 'USDTMATIC', 'icon' => '/images/coins/usdtmatic.svg'],
    ];
    public function index()
    {
        $deposits = Wallet::where('user_id', auth()->user()->id)->whereNotNull('tx_id')->orderBy('created_at', 'desc')->paginate(10);
        return view('user.deposit.index', compact('deposits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.deposit.crypto', ['coins' => $this->coins]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string',
        ]);
        
        $data = [
            "price_amount" => $request->amount ??  10.0,
            "price_currency"=> "usd",
            "pay_currency" => $request->currency ?? "usdttrc20",
            "ipn_callback_url" => $request->callback ?? url('/api/nowpayments/ipn'),
            "order_id" =>  $request->user()->id,
            "order_description" => "Deposit from Crypto",
            "is_fixed_rate"=> true,
            "is_fee_paid_by_user" => true,
        ];
        $payment = (new NowPayment())->payment($data);
        if(isset($payment['payment_id'])){
            $invoice  = new Invoice();
            $invoice->user_id = $request->user()->id;
            $invoice->payment_method_id = 1;
            $invoice->invoice_id = $payment['payment_id'];
            $invoice->payload = json_encode($payment);
            $invoice->save();
            return redirect()->route('user.deposit.show', $invoice->invoice_id);
        }
        return redirect()->back()->withInput()->withErrors(['error' => $payment['message']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::where('invoice_id', $id)->first();
        // $payment = (new NowPayment())->getPayment($id);
        $payment = json_decode($invoice->payload, true);
        return view('user.deposit.crypto_status', compact('invoice', 'payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function crypto(Request $request)
    {
        
    }

    public function status(string $id) {
        try {
            $payment = (new NowPayment())->getPayment($id);
            return response()->json(['status' => $payment['payment_status']]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }   
    }
}
