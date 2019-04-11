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
use IEXBase\RippleAPI\Contracts\TransactionBuilderContract;
use IEXBase\RippleAPI\Support\TransactionType;

require_once __DIR__.'/vendor/autoload.php';

$address = "rpx9uJ4KgJTzaMZokPr95SznNJQv24JP52";
$secretKey = "shdefS9eDcFp8rAL8oGPGSqJbGSpg";

$ripple = new \IEXBase\RippleAPI\Ripple($address);
$data = $ripple->getAccountTransactionHistory(null,array("limit"=>500));
for ($i=0; $i < sizeof($data); $i++) { 
	echo $i.') Hash---> '.$data[$i]['hash'];
	echo "<br>";
	echo $i.') Date---> '.$data[$i]['date'];
	echo "<br>";
	echo $i.') Tx Type---> '.$data[$i]['tx']['TransactionType'];
	echo "<br>";
	echo $i.') Amount---> '.$data[$i]['tx']['Amount']/1000000;
	echo "<br>";
	echo $i.') Destination---> '.$data[$i]['tx']['Destination'];
	echo "<br>";
	echo "<br>";
}
print_r(($data[0]));

// $ripple = new \IEXBase\RippleAPI\Ripple($address, $secretKey);
// try {
//     $transfer = $ripple->buildTransaction(function (TransactionBuilderContract $item)
//     {
//         return $item
//             ->setAmount(10)
//             ->setDestinationTag(123)
//             ->setDestination('rBiyqsFRBTFHSHaopJ5zMpS6gmsgJNAbJu')
//             ->setTransactionType(TransactionType::PAYMENT)
//             ->sign();
//     })->submit();
// } catch (Exception $e) {
//     die($e->getMessage());
// }
//dump($transfer);

?>