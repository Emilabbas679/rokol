<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

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
        $fullName = readline( 'Full name: ' );
        $email    = readline( 'Email: ' );
        $phone    = readline( 'Phone: ' );
        $password = readline( 'Password: ' );
        $isAdmin  = readline( 'Is admin: ' );

        User::query()->create( [
                                   'full_name' => $fullName,
                                   'email'     => $email,
                                   'phone'     => $phone,
                                   'password'  => bcrypt( $password ),
                                   'is_admin'  => in_array( mb_strtolower( $isAdmin ), [ '1', 'true', 'yes', 'y' ] ),
                               ] );

    }
}
