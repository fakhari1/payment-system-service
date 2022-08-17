<?php

namespace App\Support\Storage\Payment\Gateways;

use App\Models\Order;
use App\Support\Storage\Payment\Gateways\Contracts\GatewayContract;
use Illuminate\Http\Request;

class Saman implements GatewayContract
{

    private $merchantID;
    private $callback;


    public function __construct()
    {
        $this->merchantID = '123456789'; // hard-code
        $this->callback = route('payment.verify', $this->getName());
    }


    public function pay(Order $order)
    {
        $this->redirectToBank($order);
    }

    public function verify(Request $request)
    {
        $sendCost = 250000;
        $refNum = $request->input('RefNum');
        $resNum = $request->input('ResNum');

//        if (!$request->has('state') || $request->input('state') != 'OK') {
//            return $this->transactionFailed();
//        }

        $soapClient = new \SoapClient('https://acquirer.samanepay.com/payments/referencepayment.asmx?WSDL');

        $response = $soapClient->VerifyTransaction($refNum, $this->merchantID);

        $order = $this->getOrder($resNum);

        $request->merge(['RefNum' => '12345678']);

        return $response == ($order->amount + $sendCost) ? $this->transactionSuccess($order, $refNum) : $this->transactionFailed();
    }

    private function getOrder($resNum)
    {
        return Order::query()->where('code', $resNum)->firstOrFail();
    }

    private function transactionFailed()
    {
        return [
            'status' => self::TRANSACTION_FAILED,
        ];
    }

    private function transactionSuccess($order, string $refNum)
    {
        return [
            'status' => self::TRANSACTION_SUCCESS,
            'order' => $order,
            'refNum' => $refNum,
            'gateway' => $this->getName()
        ];
    }

    public function getName(): string
    {
        return 'saman';
    }

    private function redirectToBank($order)
    {
        $sendCost = 250000;
        $amount = $order->amount + $sendCost;

        echo
            "<form id='saman_payment' name='saman_payment' action='https://sep.shaparak.ir/payment.aspx' method='post'>" .
            "<input type='hidden' name='amount' value='{$amount}'>" .
            "<input type='hidden' name='resNum' value='{$order->code}'>" .
            "<input type='hidden' name='redirectURL' value='{$this->callback}'>" .
            "<input type='hidden' name='MID' value='{$this->merchantID}'>" .
            "</form>" .
            "<script>document.forms.namedItem('saman_payment').submit()</script>";
    }
}
