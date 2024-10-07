<?php

namespace App\Nova;

use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Order extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ProductOrder>
     */
    public static $model = \App\Models\ProductOrder::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'user'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('User', 'user')
                ->display('full_name')
                ->showOnPreview()
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),
            BelongsTo::make('Address', 'address')
                ->display('address')
                ->showOnPreview()
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),
            Text::make('Amount')
                ->showOnPreview()
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),
            Text::make('Discount', 'total_discount')
                ->showOnPreview()
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),
            Text::make('Method', 'payment_method')
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]])
                ->showOnPreview()
                ->displayUsing(function ($value) {
                    if ($value === ProductOrder::PAYMENT_METHOD_CASH) {
                        return __('Cash');
                    } elseif ($value === ProductOrder::PAYMENT_METHOD_ONLINE) {
                        return __('Online');
                    } else {
                        return __('Bank');
                    }
                }),
            Select::make('Status', 'delivered_status')
                ->options([
                    ProductOrder::DELIVERED_STATUS_COMPLETED => ProductOrder::DELIVERED_STATUS_COMPLETED,
                    ProductOrder::DELIVERED_STATUS_PREPARING => ProductOrder::DELIVERED_STATUS_PREPARING,
                    ProductOrder::DELIVERED_STATUS_CANCELED => ProductOrder::DELIVERED_STATUS_CANCELED
                ])
                ->showOnPreview()
                ->displayUsing(function ($value) {
                    if ($value === ProductOrder::DELIVERED_STATUS_COMPLETED) {
                        return __('Completed');
                    } elseif ($value === ProductOrder::DELIVERED_STATUS_PREPARING) {
                        return __('Preparing');
                    } else {
                        return __('Canceled');
                    }
                }),
            HasMany::make('Items', 'items', OrderItem::class)
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),
            Text::make('Delivery price')->showOnPreview()
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),
            DateTime::make('Created at')
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]])
                ->showOnPreview()
                ->displayUsing(fn($value) => $value ? $value->format('d.m.Y H:i') : '')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    public function authorizedToReplicate(Request $request)
    {
        return false;
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

//    public function authorizedToUpdate(Request $request)
//    {
//        return false;
//    }
}
