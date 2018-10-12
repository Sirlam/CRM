<?php

namespace App\Classes;

use App\Classes\Service;

class OrderStatus
{
  public static function statusByLanguageId($language_id){
    $client = Service::init();

    $res = $client->request('GET', 'all_statusby_language',
      [
        'query' =>
          [
            'language_id' => "$language_id"
          ]
      ]
    );
    $decode = json_decode($res->getBody());
    return ($decode);
  }

}
