<?php

namespace App\Http\Controllers;

use App\Offer\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListOffers extends Controller
{
    public function __invoke()
    {
        $offers = DB::select(
            DB::raw(
                "SELECT retail_price, discount_percentage, DATE_FORMAT(end_date,'%d %M %Y') AS end_date_formatted, batch_id, barcode, product.name, manager.store_name
                 FROM offer ,batch ,product, manager
                 WHERE batch_id = batch.id AND product_id = product.id AND offer.store_id = manager.store_id
                 ORDER BY end_date"));

        return view('offer.list-offer',compact('offers'));
    }
}
