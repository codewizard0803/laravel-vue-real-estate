<?php

use Illuminate\Database\Seeder;

class FakeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ListModel::class, 20)->create();
    }
}
