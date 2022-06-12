<?php

namespace App\Services;

use App\Models\Transaction;
use Midtrans\Notification;

class CallbackService extends Midtrans {
  protected $notification;
  protected $transaction;
  protected $serverKey;

  public function __construct()
  {
    parent::__construct();

    $this->serverKey = config('midtrans.server_key');
    $this->_handleNotification();
  }

  public function isSignatureKeyVerified()
    {
        return true;
    }
 
    public function isSuccess()
    {
        $statusCode = $this->notification->status_code;
        $transactionStatus = $this->notification->transaction_status;
        $fraudStatus = !empty($this->notification->fraud_status) ? ($this->notification->fraud_status == 'accept') : true;
 
        return ($statusCode == 200 && $transactionStatus == 'settlement');
    }
 
    public function isExpire()
    {
        return ($this->notification->transaction_status == 'expire');
    }
 
    public function isCancelled()
    {
        return ($this->notification->transaction_status == 'cancel');
    }
 
    public function getNotification()
    {
        return $this->notification;
    }
 
    public function getOrder()
    {
        return $this->transaction;
    }
 
    protected function _handleNotification()
    {
        $notification = new Notification();
 
        $orderNumber = $notification->order_id;
        $transaction = Transaction::where('id', $orderNumber)->first();
 
        $this->notification = $notification;
        $this->transaction = $transaction;
    }
}