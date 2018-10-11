<?php

namespace App\Classes;

use App\Classes\Service;

class Pickup
{
  public static function getPickups(){
    $client = Service::init();

    $res = $client->request('GET', 'pickup_location');
    $decode = json_decode($res->getBody());
    return ($decode);
  }
}
