<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\reports;
use Faker\Generator as Faker;

$factory->define(reports::class, function (Faker $faker) {
    return [
        //
            "name" => $faker->name,
            "addr" => $faker->address,
            "phone" => '8493081876',
            "eMail" => $faker->unique()->safeEmail,
            "age" => 	15,
            "report_name" => $faker->title,
            "footnote"=> '',
             'username' => 'mohsin99',
             'report' => '[{"name":"t2","result":"2","unit":"2","ref":"2","flag":"NORMAL"}]',
             'report_id' => strtoupper(uniqid()),
             "report_url" => md5(uniqid()),
    ];
});
