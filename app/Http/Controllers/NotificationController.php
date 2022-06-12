<?php

namespace App\Http\Controllers;

use App\Mail\NotifyPayment;
use App\Services\CallbackService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function receivePayment() {
        $callback = new CallbackService;
        Log::info("Masuk payment " . $callback->isSuccess());

        if ($callback->isSignatureKeyVerified()) {
            $transaction = $callback->getOrder();
            Log::info("Masuk payment verified" . $transaction);

            if ($callback->isSuccess() == 1) {
                $transaction->status = 'paid';
                $transaction->save();

                Mail::to($transaction->user->email)->send(new NotifyPayment());

                Log::info('Berhasil sukses transaksi ' . $transaction->id);
            }
 
            if ($callback->isExpire()) {
                $transaction->status = 'failed';
                $transaction->save();
                Log::info('Transaksi expire');
            }
 
            if ($callback->isCancelled()) {
                $transaction->status = 'cancelled';
                $transaction->save();
                Log::info('Tranaksi batal');
            }
            
            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
             return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }
}
