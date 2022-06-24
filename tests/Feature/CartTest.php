<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Cart;
use Psy\Readline\Hoa\Console;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

class CartTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        $this->get('/empty-cart');
        parent::tearDown();
    }

    public function test_is_empty()
    {
        $response = $this->get('/bestellen');
        $response->assertStatus(200);

        $response->assertSessionHas('cart', function (Cart $cart) {
            assertEquals(0.0, $cart->getTotalPrice());
            assertTrue($cart->isEmpty());
            return true;
        });
    }

    public function test_one_item()
    {
        $response = $this->get('/add-to-cart/1668');
        $response->assertStatus(302);

        $response->assertSessionHas('cart', function (Cart $cart) {
            assertEquals(6.3, $cart->getTotalPrice());
            assertEquals(1, $cart->getTotalQty());
            return true;
        });
    }

    public function test_one_item_and_remove()
    {
        $response = $this->get('/add-to-cart/1668');
        $response->assertStatus(302);

        $response = $this->get('/delete-from-cart/1668');
        $response->assertStatus(302);

        $response->assertSessionHas('cart', function (Cart $cart) {
            assertEquals(0, $cart->getTotalPrice());
            assertEquals(0, $cart->getTotalQty());
            return true;
        });
    }
}
