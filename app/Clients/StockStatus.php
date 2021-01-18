<?php


namespace App\Clients;


class StockStatus
{
    public $available;
    public $price;

    /**
     * StockStatus constructor.
     * @param $available
     */
    public function __construct($available, $price)
    {
        $this->available = $available;
        $this->price = $price;
    }


}
