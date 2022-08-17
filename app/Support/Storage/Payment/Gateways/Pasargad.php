<?php

namespace App\Support\Storage\Payment\Gateways;

use App\Models\Order;
use App\Support\Storage\Payment\Gateways\Contracts\GatewayContract;
use Illuminate\Http\Request;

class Pasargad implements GatewayContract
{

    public function pay(Order $order)
    {
        dd('Pasargad Pay');
    }

    public function verify(Request $request)
    {
        // TODO: Implement verify() method.
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }
}
