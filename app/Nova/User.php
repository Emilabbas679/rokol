<?php

namespace App\Nova;

use App\Rules\PhoneNumberRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\FieldCollection;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields( NovaRequest $request )
    {
        return [
            ID::make()->sortable(),

            Gravatar::make()->maxWidth( 50 ),

            Text::make( 'Full name', 'full_name' )
                ->sortable()
                ->rules( 'required', 'max:255' ),

            Text::make( 'Email' )
                ->sortable()
                ->rules( 'nullable', 'email', 'max:254' )
                ->creationRules( 'unique:users,email' )
                ->updateRules( 'unique:users,email,{{resourceId}}' ),

            Text::make( 'Phone' )
                ->sortable()
                ->rules( 'nullable', 'max:254' )
                ->creationRules( [ 'unique:users,phone', new PhoneNumberRule() ] )
                ->placeholder( "Nömrə +(994) xx xxx xx xx formatında olmalıdır" )
                ->updateRules( 'unique:users,phone,{{resourceId}}' ),

            MorphToMany::make( 'Roles', 'roles', Role::class ),

            Boolean::make( 'Admin', 'is_admin' )
                   ->trueValue( '1' )
                   ->falseValue( '0' ),

            Password::make( 'Password' )
                    ->onlyOnForms()
                    ->creationRules( 'required', Rules\Password::defaults() )
                    ->updateRules( 'nullable', Rules\Password::defaults() ),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards( NovaRequest $request )
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters( NovaRequest $request )
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses( NovaRequest $request )
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions( NovaRequest $request )
    {
        return [];
    }

    public function authorizedToUpdate( Request $request )
    {
        // Add your condition here. For example, if the resource has a 'status' field:
        if ( !$this->is_admin ) {
            return false;
        }

        // Otherwise, use the default authorization logic
        return parent::authorizedToUpdate( $request );
    }


    public static function authorizeToCreate( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }

    public static function authorizedToCreate( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }

    public function authorizedToDelete( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }


    public function authorizedToReplicate( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }

    public static function availableForNavigation( Request $request )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }

    public function availablePanelsForCreate( $request, FieldCollection $fields = null )
    {
        return $request->user()?->hasRole( [ 'Main admin', 'Admin 1' ] );
    }
}
