<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate) // i added this "GateContract $gate"
    {
        $this->registerPolicies();

        // you can use Gate::define(); instead of $gate variable

        /*
         you must know that the first parameter must be a user no thing else 
         and you can't pass any argument to it but you can add second of more parameter to send parameter
        */

        // you can use any of this naming convention >>> show-employee (kabeb-case) or >>> ShowEmployee (PascalCase)
        $gate->define('show-employee', function($user, $employee){
            return $user->company_id === $employee->company_id;
        });


        $gate->define('adminRole', function($soso_current_user){
            return $soso_current_user->role === 'admin';
        });

        // also you can use the statement in this way
        // $gate->define('update-post', 'Class@method');


        // auth()->user()->can('show-employee', var is here);
        // auth()->user()->cannot('adminRole');
        // $request->user()->can('show-employee', auth()->user()); // auth()->user() >>> return model
        // $request->user()->cannot('show-employee', auth()->user());
        // $this->authorize('show-employee', auth()->user());
        // Gate::allows('show-employee', auth()->user());
        // Gate::denies('adminRole');
    }
}
