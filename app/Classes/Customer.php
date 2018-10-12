<?php

namespace App\Classes;

use App\Classes\Service;

class Customer
{
  public static function getCustomers($location_id){
    $client = Service::init();

    $res = $client->request('GET', 'customer_pickup_location',
      [
        'query' =>
          [
            'location_id' => "$location_id"
          ]
      ]
    );
    $decode = json_decode($res->getBody());
    return ($decode);
  }

  public static function getCustomerById($customer_id){
    $client = Service::init();

    $res = $client->request('GET', 'get_customer',
      [
        'query' =>
          [
            'customer_id' => "$customer_id"
          ]
      ]
    );
    $decode = json_decode($res->getBody());
    return ($decode);
  }
}
