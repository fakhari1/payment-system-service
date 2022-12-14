<?php

namespace App\Support\Storage\Payment;

use App\Http\Requests\CartCheckoutRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Support\Storage\Cart\Cart;
use App\Support\Storage\Payment\Gateways\Contracts\GatewayContract;
use App\Support\Storage\Payment\Gateways\Pasargad;
use App\Support\Storage\Payment\Gateways\Saman;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Transaction
{
    private $request;
    private $cart;

    public function __construct(Cart $cart)
    {
//        $this->request = $request;
        $this->cart = $cart;
    }

    public function checkout($request)
    {
        $this->request = $request;

        $order = $this->createOrder();

        $payment = $this->createPayment($order);

        if ($payment->isOnline) {
            $response = $this->gatewaysFactory()->pay($order);
        }

        $this->cart->clear();

        return $order;
    }

    private function createOrder()
    {
        $sendCost = 250000;
        $finalAmount = $this->cart->totalPrice() + $sendCost;

        $order = Order::query()->create([
            'user_id' => auth()->id(),
            'code' => bin2hex(Str::random(16)),
            'amount' => $finalAmount
        ]);

        $order->products()->attach($this->products());;
        return $order;
    }

    private function products()
    {
        foreach ($this->cart->all() as $key => $item) {
            $products[$item->id] = ['quantity' => $item->quantity];
        }

        return $products;
    }

    private function createPayment($order)
    {
        return Payment::query()->create([
            'order_id' => $order->id,
            'method' => $this->request->type,
            'amount' => $order->amount
        ]);
    }

    private function gatewaysFactory()
    {
        $gateways = [
            'saman' => Saman::class,
            'pasargad' => Pasargad::class
        ][$this->request->gateway];

        return resolve($gateways);
    }

    public function verify()
    {
        $result = $this->gatewaysFactory()->verify($this->request);

        if ($result['status'] === GatewayContract::TRANSACTION_FAILED) return false;
    }
}
