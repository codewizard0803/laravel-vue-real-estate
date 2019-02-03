<?php

use Illuminate\Database\Seeder;

class FakeCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\City::class, 10)->create();
    }
}
