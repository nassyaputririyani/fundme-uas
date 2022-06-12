<?php

namespace App\Services;

use Midtrans\Snap;

class CreateSnapURLService extends Midtrans {
  
  protected $transaction;

  public function __construct($transaction)
  {
    parent::__construct();
    $this->transaction = $transaction;
  }

  public function getSnapURL()
  {
    $params = [
      'transaction_details' => [
        'order_id' => 'TRANSACTION-FUND_ME-' . $this->transaction->id,
        'gross_amount' => $this->transaction->amount
      ],
      'item_details' => [
        [
          'id' => $this->transaction->project->id,
          'name' => $this->transaction->project->title,
          'quantity' => 1,
          'price' => $this->transaction->amount
        ]
      ],
      'customer_details' => [
        'first_name' => $this->transaction->user->name,
        'email' => $this->transaction->user->email
      ]
    ];

    $snapURL = Snap::createTransaction($params)->redirect_url;

    return $snapURL;
  }
}