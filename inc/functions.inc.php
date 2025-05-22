<?php

require_once "config.inc.php";

function getHeader()
{
   $header = "\n\tProduct order calculator app by " . APP_DEVELOPER . " (" . APP_ID . ")\n";

   echo "\n---------------------------------------------------------------------------\n";
   echo $header;
   echo "\n---------------------------------------------------------------------------\n";
}

function generateOrder()
{
   $orderData = [];

   for ($i = 1; $i < 5; $i++) {

      $id = "order_" . $i;

      $amounts = [rand(MIN_AMOUNT, MAX_AMOUNT), rand(MIN_AMOUNT, MAX_AMOUNT), rand(MIN_AMOUNT, MAX_AMOUNT)];

      array_push($orderData, ["id" => $id, "amount" => $amounts]);
   }
   return $orderData;
}


function calculateAndPrintOrder($orderData, $price, $discountThreshold)
{

   echo "Order\tProduct A\tProduct B\tProduct C\tDiscount\tSub Total\n";
   for ($i = 0; $i < count($orderData); $i++) {

      $subtotal = getSubTotal($orderData[$i]["amount"], $price);
      $discount = getDiscountedPercentage($subtotal, $discountThreshold);

      $subTotalAfterDiscount = $subtotal - ($subtotal * $discount);
      $subTotalWithTax = $subTotalAfterDiscount * (1 + TAX);

      echo $orderData[$i]["id"] . "\t\t" . $orderData[$i]["amount"][0] . "\t\t" . $orderData[$i]["amount"][1] . "\t\t" . $orderData[$i]["amount"][2] . "\t" . number_format($discount * 100, 0) . "%  \t\t$" . number_format($subTotalWithTax, 2) . "\n";
   }
}

function getDiscountedPercentage($subTotal, $discountThreshold)
{

   $finalDiscount = 0;

   foreach ($discountThreshold as $threshold => $discount) {
      if ($subTotal >= $threshold) {
         $finalDiscount = $discount;
      } else {
         break;
      }
   }
   return $finalDiscount;
}

function getSubTotal($amount, $price)
{
   $subTotal = 0;
   for ($i = 0; $i < count($price); $i++) {

      $subTotal += $amount[$i] * $price[$i];
   }
   return $subTotal;
}
