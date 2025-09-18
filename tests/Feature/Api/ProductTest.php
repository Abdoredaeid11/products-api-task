<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

     public function test_it_creates_a_product_via_api()
    {
        $payload = [
            'name'  => 'Laptop',
            'price' => 1500.50,
            'stock' => 10,
        ];

        $response = $this->postJson('/api/products', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Laptop']);

        $this->assertDatabaseHas('products', ['name' => 'Laptop']);
    }
}
