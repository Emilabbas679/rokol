<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $sql = file_get_contents(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'db.sql');
        $statements = explode("\n", $sql);
        foreach ($statements as $statement) {
            if (!empty($statement)) {
                DB::statement($statement);
            }
        }
    }
}
