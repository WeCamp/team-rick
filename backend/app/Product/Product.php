<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function addBatch(int $quantity, string $expirationDate, int $retailPrice) : void
    {
        $batch = new Batch();
        $batch->store_id = session('user')['store_id'];
        $batch->quantity = $quantity;
        $batch->expiration_date = $expirationDate;
        $batch->product_id = $this->id;
        $batch->retail_price = $retailPrice;

        $batch->save();
    }

    public function deductInventory(int $productId, int $quantity){
        $batch = Batch::where('product_id',$productId)->orderBy('expiration_date','dsc')->first();
        $batch->quantity -= $quantity;
        $batch->save();
    }


    public function category() : Category
    {
        return Category::fromId($this->category_id);
    }

    public function categoryName() : string
    {
        return $this->category()->name();
    }

}
