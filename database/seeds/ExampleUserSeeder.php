<?php

use Illuminate\Database\Seeder;

class ExampleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Example user',
            'email' => 'example-user@gmail.com',
            'password' => bcrypt('secret'),
            'api_token' => str_limit(bcrypt('api_token'), 60),
        ]);
    }
}
