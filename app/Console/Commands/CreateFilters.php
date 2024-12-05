<?php

namespace App\Console\Commands;

use App\Models\Filter;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateFilters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-filters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::query()->with( [ 'refProperties' ] )->get();
        $filters  = [];
        foreach ( $products as $product ) {
            $filter = [];


            foreach ( $product->weights as $weight ) {
                $filter['category_id'] = $product->category_id;
                $filter['brand_id']    = $product->brand_id
                    ?: null;
                foreach ( $product->appearances as $appearance ) {
                    foreach ( $product->refProperties as $property ) {
                        $filter['property_id'] = $property->id;
                    }
                    $filter['appearance_id'] = $appearance->id;
                }
                $filter['weight_id'] = $weight->id;
                $filters[]           = $filter;
            }
        }

        foreach ( $filters as $filter ) {
            Filter::query()->updateOrCreate( $filter, [
                'count' => DB::raw( 'count + 1' ),
            ] );
        }

//
//        foreach ( $filters as $filter ) {
//            $f = [];
//            $f['category_id'] = $filter['category_id'];
//            $f['brand_id'] = $filter['brand_id'];
//
//        }
    }
}
