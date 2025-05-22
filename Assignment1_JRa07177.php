<?php

require_once "inc/functions.inc.php";

$counter = 1;
$flag = true;

while ($flag) {
    getHeader();
    echo "\nOrder record: " . $counter . "\n\n";
    $orderData = generateOrder();
    calculateAndPrintOrder($orderData, $price, $discountThreshold);
    echo "\nDo you want to add another record of order (Y/N)? ";
    $input = stream_get_line(STDIN, 1024, PHP_EOL);
    if (strtoupper($input) === 'Y') {
        $counter++;
    } else {
        $flag = false;
    }
}
echo "\nYou have generated " . $counter . " batch(es) of customer record(s). Good bye!";
