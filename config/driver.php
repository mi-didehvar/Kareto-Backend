<?php

return [
    "kareto" => [
        "driver"=> App\Drivers\Markets\BasalamDriver::class,
    ],
    "basalam" => [
        "driver" => App\Drivers\Markets\BasalamDriver::class,
    ],
    "snapp" => [
        "driver" => App\Drivers\Markets\SnappDriver::class,
    ]
];
