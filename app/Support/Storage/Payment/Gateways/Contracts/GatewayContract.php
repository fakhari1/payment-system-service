<?php

namespace App\Support\Storage\Payment\Gateways\Contracts;

use App\Models\Order;
use Illuminate\Http\Request;

interface GatewayContract
{

    const TRANSACTION_FAILED = 'transaction.failed';
    const TRANSACTION_SUCCESS = 'transaction.success';


    public function pay(Order $order);

    public function verify(Request $request);

    public function getName(): string;

}
