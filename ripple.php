<?php
/**
 * ======================================================================================================
 * File Name: ripple.php
 * ======================================================================================================
 * Author: affankhan43
 *
 * ------------------------------------------------------------------------------------------------------
 */

use IEXBase\RippleAPI\Contracts\TransactionBuilderContract;
use IEXBase\RippleAPI\Support\TransactionType;

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/.env';

$address = $ripple_address;

$ripple = new \IEXBase\RippleAPI\Ripple($address);

if(isset($_POST['msg']) && isset($_POST['key']) && isset($_POST['coin']) && $_POST['coin'] == 'xrp'){
	if($_POST['msg'] == 'transactions_list' && $_POST['key']=='hashlist' && isset($_POST['hash'])){
		$data = $ripple->getAccountTransactionHistory(null,array("limit"=>500,'start'=>$_POST['hash']));
		$timestamp = new DateTime();
		$date = $timestamp->format('c'); // Returns ISO8601 in proper format
		$tx_data = array("transactions"=>array(),'latest'=>$date);
		for ($i=0; $i < sizeof($data); $i++) {
			if(isset($data[$i]['hash'],$data[$i]['date'],$data[$i]['tx']['TransactionType'],$data[$i]['tx']['Amount'],$data[$i]['tx']['Destination'],$data[$i]['tx']['DestinationTag']) && $data[$i]['tx']['Destination'] == $address){
				$tx_data['transactions'][] = array('txid'=>$data[$i]['hash'],'date'=>$data[$i]['date'],'category'=>'receive',"amount"=>$data[$i]['tx']['Amount']/1000000,"address"=>$data[$i]['tx']['Destination'],"message"=>$data[$i]['tx']['DestinationTag']);
			}
			$tx_data['latest'] = $data[$i]['date'];
		}
		echo json_encode(array("data"=>$tx_data));
	}
}
?>