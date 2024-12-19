<?php

namespace App\Console\Commands;

use App\Models\Color;
use Illuminate\Console\Command;

class FixTreeOnColor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-tree';

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
        Color::fixTree();
    }
}
