<?php

use App\User;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        User::factory(10)->create();
    }
}
