<?php
/**
 * ======================================================================================================
 * File Name: ripple.php
 * ======================================================================================================
 * Author: affankhan43
 *
 * ------------------------------------------------------------------------------------------------------
 */

//$timestamp = new DateTime();
//echo $timestamp->format('c'); // Returns ISO8601 in proper format
//echo $timestamp->format(DateTime::ISO8601);

require_once __DIR__.'/vendor/autoload.php';

$address = "rpx9uJ4KgJTzaMZokPr95SznNJQv24JP52";
$ripple = new \IEXBase\RippleAPI\Ripple($address);
dump($ripple->getAccountPayments());

?>