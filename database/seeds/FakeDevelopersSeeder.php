<?php

use Illuminate\Database\Seeder;

class FakeDevelopersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Developer::class, 10)->create();
    }
}
