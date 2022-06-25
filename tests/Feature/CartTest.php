<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Cart;
use App\Models\User;
use App\Product;
use App\Option;
use DateTime;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertTrue;

class CartTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User([
            'id' => 999,
            'name' => 'test_user'
        ]);
        $this->actingAs($this->user);
    }

    protected function tearDown(): void
    {
        $this->get('/empty-cart');
        parent::tearDown();
    }

    public function test_is_empty()
    {
        $this->get('/bestellen')
            ->assertStatus(200)
            ->assertSessionHas('cart', function (Cart $cart) {
                assertEquals(0.0, $cart->getTotalPrice());
                assertEquals(0, $cart->getTotalQty());
                return true;
            });
    }

    public function test_one_product()
    {
        $product = Product::find(1668); // Texasburger
        $options = [Option::find(5)]; // Ketchup
        $expected_price = $product->price + $options[0]->price;

        $this->post('/add-to-cart', ['selectedProduct' => $product, 'selectedOptions' => $options])
            ->assertStatus(302)
            ->assertSessionHas('cart', function (Cart $cart) use ($expected_price) {
                assertEquals($expected_price, $cart->getTotalPrice());
                assertEquals(1, $cart->getTotalQty());
                return true;
            });
    }

    public function test_one_product_and_remove()
    {
        $product = Product::find(1668);
        $options = [Option::find(5)];

        $this->post('/add-to-cart', ['selectedProduct' => $product, 'selectedOptions' => $options])
            ->assertStatus(302);

        $this->get('/delete-from-cart/0')
            ->assertStatus(302)
            ->assertSessionHas('cart', function (Cart $cart) {
                assertEquals(0, $cart->getTotalPrice());
                assertEquals(0, $cart->getTotalQty());
                return true;
            });
    }

    public function test_two_products()
    {
        $product = Product::find(1668);
        $options = [Option::find(5)];
        $expected_price = $product->price + $options[0]->price;
        $this->post('/add-to-cart', ['selectedProduct' => $product, 'selectedOptions' => $options]);

        $product = Product::find(1568);
        $options = null;
        $expected_price += $product->price;

        $this->post('/add-to-cart', ['selectedProduct' => $product, 'selectedOptions' => $options])
            ->assertStatus(302)
            ->assertSessionHas('cart', function (Cart $cart) use ($expected_price) {
                assertEquals($expected_price, $cart->getTotalPrice());
                assertEquals(2, $cart->getTotalQty());
                return true;
            });
    }

    public function test_one_product_and_checkout()
    {
        $product = Product::find(1668); // Texasburger
        $options = [Option::find(5)]; // Ketchup
        $this->post('/add-to-cart', ['selectedProduct' => $product, 'selectedOptions' => $options]);

        $pickuptime = "18:00";
        $this->post('/checkout/submit', ['pickuptime' => $pickuptime]);
    }
}
