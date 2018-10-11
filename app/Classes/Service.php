<?php

namespace App\Classes;

use GuzzleHttp\Client;

class Service{

  public static function init(){
    $client = new Client([
      'base_uri' => 'http://167.99.200.183/api_shop/shop/',
      'timeout' => '30.0',
      'headers' => [
          'Content-Type' => 'application/json',
      ]
    ]);

    return $client;
  }

}
