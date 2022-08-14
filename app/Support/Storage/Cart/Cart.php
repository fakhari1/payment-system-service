<?php

namespace App\Support\Storage\Cart;

use App\Exceptions\QuantityExceedentException;
use App\Support\Storage\Contracts\StorageInterface;
use App\Models\Product;

class Cart
{
    private $storage;


    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function increment(Product $product, int $quantity)
    {
        if ($this->hasItem($product)) {
            $quantity = $this->getItemQuantity($product)['quantity'] + $quantity;
        }

        $this->update($product, $quantity);
    }

    public function update(Product $product, int $quantity)
    {
        if (!$product->hasStock($quantity)) {
            throw new QuantityExceedentException();
        }

        $this->storage->set($product->id, [
            'quantity' => $quantity
        ]);
    }

    public function destroy(Product $product)
    {
        if ($this->storage->exists($product->id)) {
            $this->storage->unset($product->id);
        }
    }

    public function decrement(Product $product)
    {
        $quantity = 0;

        if ($this->hasItem($product))
            $quantity = $this->getItemQuantity($product)['quantity'] - 1;

        if ($quantity <= 0) {
            $this->storage->unset($product->id);
        }

        $this->storage->unset($product->id);

        $this->storage->set($product->id, [
            'quantity' => $quantity
        ]);
    }

    public function hasItem(Product $product)
    {
        return $this->storage->exists($product->id);
    }

    public function getItemQuantity(Product $product)
    {
        return $this->storage->get($product->id);
    }

    public function itemCount()
    {
        return $this->storage->count();
    }

    public function get(Product $product)
    {
        return $this->storage->get($product->id);
    }

    public function all()
    {
        $products = Product::query()->find(array_keys($this->storage->all()));

        foreach ($products as $key => $product) {
            $product->quantity = $this->get($product)['quantity'];
        }

        return $products;
    }

    public function totalPrice()
    {
        $total = 0;

        foreach ($this->all() as $key => $item)
            $total += $item->price * $item->quantity;

        return $total;
    }
}
