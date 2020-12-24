<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\sms;
use Faker\Generator as Faker;

$factory->define(sms::class, function (Faker $faker) {
    return [
        //
               			"username"=>'mohsin99',
    					"plane_name"=>"basic@sms",
    					"sms_credit"=>"0",
                        "tx_no"=> uniqid(),
    					"balance"=>"100"
    ];
});
