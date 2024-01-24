<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Helper\NowPayment;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Invoice;

class PaymentHooksController extends Controller
{
    public function handleNowPaymentsIPN(Request $request)
    {
        $error_msg = "Unknown error";
        $auth_ok = false;
        $request_data = null;
        if ($request->header('x-nowpayments-sig')) {
            $received_hmac = $request->header('x-nowpayments-sig');
            $request_json = $request->getContent();
            $request_data = json_decode($request_json, true);
            ksort($request_data); 
            $sorted_request_json = json_encode($request_data, JSON_UNESCAPED_SLASHES);
            if ($request_json !== false && !empty($request_json)) {
                $hmac = hash_hmac("sha512", $sorted_request_json, trim(env('NOWPAYMENTS_IPN_KEY')));
                if ($hmac == $received_hmac) {
                    $auth_ok = true;
                } else {
                    $error_msg = 'HMAC signature does not match';
                }
            } else {
                $error_msg = 'Error reading POST data';
            }
        } else {
            $error_msg = 'No HMAC signature sent.';
        }

        if ($auth_ok) {
            DB::beginTransaction();
            $payment_id = $request->input('payment_id');
            if($payment_id){
                $data = (new NowPayment())->getPayment($payment_id);
                $txDeposit =  Wallet::where('tx_id', $payment_id)->first();
                if($data && !$txDeposit && ($data['payment_status'] == 'finished' || $data['payment_status'] == 'partially_paid')){
                
                    $amount = $data['actually_paid'] ??  $data['pay_amount'];
                    $extradata = [
                        'tx_id' => $payment_id,
                        'tx_amount' => $amount,
                        'tx_currency' => $data['pay_currency'],
                    ];
                    $user->updateBalance($wallet->amount, 'Deposit from Crypto', $extradata);
                }
            }
            DB::commit();
        } else {
            DB::rollBack();
            Log::error($error_msg);
            return response()->json(['error' => $error_msg], 400);
        }
    }
}
