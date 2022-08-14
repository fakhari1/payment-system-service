<?php

namespace App\Http\Controllers;

use App\Exceptions\QuantityExceedentException;
use App\Models\Product;
use App\Support\Storage\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $sum = $this->cart->totalPrice();
        $items = $this->cart->all();
        $sendCost = 250000;

        return view('cart.items', compact('items', 'sum', 'sendCost'));
    }

    public function increment(Product $product)
    {
        try {
            $this->cart->increment($product, 1);

            return redirect()->back()->with(['success_msg' => 'محصول به سبد خرید اضافه شد.']);

        } catch (QuantityExceedentException $e) {

            return redirect()->back()->with(['error_msg' => 'موجودی محصول ناکافی است.']);

        }
    }

    public function decrement(Product $product)
    {
        $this->cart->decrement($product);

        return back()->with(['success_msg' => 'تغییرات تعداد در سبد خرید اعمال شد.']);
    }

    public function update(Request $request, Product $product)
    {
        $this->cart->update($product, $request->quantity);

        return redirect()->back();
    }

    public function destroy(Request $request, Product $product)
    {
        $this->cart->destroy($product);

        return redirect()->back()->with(['success_msg' => 'محصول از سبد خرید حذف شد.']);
    }

}
