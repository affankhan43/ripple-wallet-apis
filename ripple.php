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
$data = $ripple->getAccountTransactionHistory(null,array("limit"=>500,'start'=>"2019-04-11T20:48:50+00:00"));
for ($i=0; $i < sizeof($data); $i++) {
	if(isset($data[$i]['hash'],$data[$i]['date'],$data[$i]['tx']['TransactionType'],$data[$i]['tx']['Amount'],$data[$i]['tx']['Destination'],$data[$i]['tx']['DestinationTag']) && $data[$i]['tx']['Destination'] == $address){
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
		echo $i.') DestinationTag---> '.$data[$i]['tx']['DestinationTag'];
		echo "<br>";
		echo "<br>";
	}
}
//print_r(($data[5]));

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