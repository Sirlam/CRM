<?php

namespace App\Classes;

use App\Classes\Service;

class Order
{
  public static function orderByCustomerId($customer_id){
    $client = Service::init();

    $res = $client->request('GET', 'order_by_customer',
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

  public static function orderDetailsByOrderId($order_id){
    $client = Service::init();

    $res = $client->request('GET', 'last_order',
      [
        'query' =>
          [
            'order_id' => "$order_id"
          ]
      ]
    );
    $decode = json_decode($res->getBody());
    return ($decode);
  }

  public static function getOrdersByPickupId($pickup_id){
    $client = Service::init();

    $res = $client->request('GET', 'all_last_orderby_pickup',
      [
        'query' =>
          [
            'pickup_id' => "$pickup_id"
          ]
      ]
    );
    $decode = json_decode($res->getBody());
    return ($decode);
  }

}
