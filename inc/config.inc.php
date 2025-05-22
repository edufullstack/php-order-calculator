<?php

define("NUM_OF_ORDERS", 4);
define("APP_DEVELOPER", "Jose Ramirez");
define("APP_ID", 300407177);
define("MIN_AMOUNT", 0);
define("MAX_AMOUNT", 10);
define("TAX", .12);

$price = [30, 30, 40];
$discountThreshold = [
    "0" => 0,
    "200" => .05,
    "300" => .1,
    "500" => .15,
    "700" => .25
];
