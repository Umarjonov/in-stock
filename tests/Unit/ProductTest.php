<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Retailer;
use App\Models\Stock;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /** @test  */
    public function test_it_checks_stock_for_products_at_retailers()
    {
        $switvh = Product::create(['name' => 'Nintendo Switch']);

        $bestBuy = Retailer::create(['name' => 'Best Buy']);

        $this->assertFalse($switvh->inStock());

        $stock = new Stock([
            'price' => 10000,
            'url' => 'http://foo.com',
            'sku' => '12345',
            'in_stock' => true
        ]);
        $bestBuy->addStock($switvh, $stock);
        $this->assertTrue($switvh->inStock());
    }
}
