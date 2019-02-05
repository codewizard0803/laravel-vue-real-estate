<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListIndexTest extends TestCase
{
    use DatabaseMigrations;

    public function testShouldRedirectIfMakeRequestWithoutAuthTokenInHeader()
    {
        $response = $this->get('/api/lists');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function testShouldReceiveHttp200IfAuthTokenIsValid()
    {
        $response = $this->makeRequest();

        $response->assertStatus(200);
    }

    public function testShouldAListOf10Items()
    {
        factory(\App\ListModel::class, 10)->create();

        $response = $this->makeRequest();

        $response->assertStatus(200);
        $this->assertEquals(10, sizeof($response->json()));
    }

    public function testShouldReceiveConcreteItem()
    {
        factory(\App\ListModel::class)->create([
            'name' => 'example list item',
            'price' => 55,
        ]);

        $response = $this->makeRequest();

        $response->assertStatus(200);
        $response->assertJsonStructure([
            ['name']
        ]);
        $response->assertJson([[
            'name' => 'example list item',
            'price' => 55,
        ]]);
    }

    public function testShouldReceiveValidStructure()
    {
        factory(\App\ListModel::class, 5)->create();

        $response = $this->makeRequest();

        $response->assertJsonStructure([
            [
                'id',
                'name',
                'price',
                'isOnSale',
                'city_id',
                'developer_id',
                'city' => [
                    'name',
                    'country',
                ]
            ]
        ]);
    }

    public function testFilteringByCountryShouldWork()
    {
        factory(\App\City::class)->create([
            'country' => 'Spain',
        ]);
        $spain = \App\City::orderBy('id', 'desc')->first();

        factory(\App\City::class)->create([
            'country' => 'not Spain',
        ]);
        $notSpain = \App\City::orderBy('id', 'desc')->first();

        factory(\App\ListModel::class, 3)->create([
            'city_id' => $spain->id,
        ]);

        factory(\App\ListModel::class, 7)->create([
            'city_id' => $notSpain->id,
        ]);

        $response = $this->makeRequest([
            'country' => 'Spain'
        ]);

        $this->assertEquals(3, sizeof($response->json()));
    }

    public function testFilteringByIsOnSaleShouldWork()
    {
        factory(\App\ListModel::class, 3)->create([
            'isOnSale' => 1,
        ]);

        factory(\App\ListModel::class, 7)->create([
            'isOnSale' => 0,
        ]);

        $response = $this->makeRequest([
            'isOnSale' => 1
        ]);

        $this->assertEquals(3, sizeof($response->json()));
    }

    public function testFilteringByIsPriceLessThanShouldWork()
    {
        factory(\App\ListModel::class)->create([
            'price' => 100,
        ]);

        factory(\App\ListModel::class)->create([
            'price' => 200,
        ]);

        factory(\App\ListModel::class)->create([
            'price' => 300,
        ]);

        factory(\App\ListModel::class)->create([
            'price' => 400,
        ]);

        factory(\App\ListModel::class)->create([
            'price' => 500,
        ]);

        $response = $this->makeRequest([
            'priceLessThan' => 400
        ]);

        $this->assertEquals(3, sizeof($response->json()));
    }

    private function makeRequest(array $qsFilters = [])
    {
        $apiToken = 'example-api-token';

        factory(\App\User::class)->create([
            'api_token' => $apiToken,
        ]);

        $url = '/api/lists';
        if ($qsFilters) {
            $url .= '?' . http_build_query($qsFilters);
        }

        return $this->get($url, [
            'Authorization' => 'Bearer ' . $apiToken
        ]);
    }
}
