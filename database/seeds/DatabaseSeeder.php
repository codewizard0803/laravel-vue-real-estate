<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(ExampleUserSeeder::class);
         $this->call(FakeDevelopersSeeder::class);
         $this->call(FakeCitiesSeeder::class);
         $this->call(FakeListSeeder::class);
    }
}
