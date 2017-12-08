<?php

namespace App\Billing;

class Stripe
{
    protected $key;

    public function __construct($key) //api key
    {
        $this->key = $key;
    }

}