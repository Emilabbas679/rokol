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
        DB::statement('truncate table filters');
        $products = Product::query()->with( [ 'refProperties', 'appearances', 'weights' ] )->get();
        foreach ( $products as $product ) {
            $filter = [];

            dump();
            $weights = $product->weights;
            if ( is_null( $weights ) || !$product->weights->count() ) {
                $weights = [
                    null,
                ];
            }
            $appearances = $product->appearances;
            if ( is_null( $appearances ) || !$product->appearances->count() ) {
                $appearances = [
                    null,
                ];
            }
            $refProperties = $product->refProperties;
            if ( is_null( $refProperties ) || !$product->refProperties->count() ) {
                $refProperties = [
                    null,
                ];
            }
            foreach ( $weights as $weight ) {
                $filter['category_id'] = $product->category_id;
                $filter['brand_id']    = $product->brand_id
                    ?: null;
                $filter['weight_id'] = $weight?->id;
                foreach ( $appearances ?? [ null ] as $appearance ) {
                    $filter['appearance_id'] = $appearance?->id;
                    foreach ( $refProperties as $property ) {
                        $filter['property_id'] = $property?->id;
                        Filter::query()->updateOrCreate( $filter, [
                            'count' => DB::raw( 'count + 1' ),
                        ] );
                    }

                }

            }
        }

    }
}
