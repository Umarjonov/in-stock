<?php

namespace App\Models;

use App\Clients\BestBuy;
use App\Clients\ClientException;
use Facades\App\Clients\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';

    protected $casts = [
        'in_stock'  =>  'boolean'
    ];

    public function track()
    {
        $status = $this->retailer->client()->checkAvailability($this);

        $this->update([
            'in_stock'  =>  $status->available,
            'price'     =>  $status->price
        ]);
    }

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }

}
