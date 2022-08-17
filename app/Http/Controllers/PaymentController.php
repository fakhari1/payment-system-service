<?php

namespace App\Http\Controllers;

use App\Support\Storage\Payment\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function verify(Request $request)
    {
        return $this->transaction->verify() ?
            $this->sendSuccessResponse() :
            $this->sendErrorResponse();

    }

    private function sendErrorResponse()
    {
        return redirect()->route('home')->with(['error_msg' => 'مشکلی در هنگام ثبت سفارش رخ داده است.']);
    }

    private function sendSuccessResponse()
    {
        return redirect()->route('home')->with(['success_msg' => 'سفارش شما ایجاد شد.']);
    }
}
