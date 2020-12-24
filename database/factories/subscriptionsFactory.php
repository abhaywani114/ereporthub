<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\subscriptions;
use Faker\Generator as Faker;

$factory->define(subscriptions::class, function (Faker $faker) {
	$new_due_date = \Carbon\carbon::create('2019-06-27 17:41:11')->addMonths(6);

    return [
        //
            			"username"=>'mohsin99',
    					"subscription"=>"basic@subscription",
    					"tx_no"=>uniqid(),
    					"due_date"=> $new_due_date,
    ];
});
