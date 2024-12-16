<?php

namespace App\Console\Commands;

use http\Client\Curl\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class MakeRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-roles';

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
        Role::query()->create( [
                                   'name' => 'Main admin',
                                   'guard_name' => 'admins'
                               ] );

        Role::query()->create( [
                                   'name' => 'Admin 1',
                                   'guard_name' => 'admins'
                               ] );

        Role::query()->create( [
                                   'name' => 'Admin 2',
                                   'guard_name' => 'admins'
                               ] );

        $user = \App\Models\User::query()->where('email', 'emilabbas679@gmail.com')
            ->first();
        $user->assignRole( 'Main admin' );

    }
}
