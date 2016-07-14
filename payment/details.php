 <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo "<pre>";
require_once "getcontent.php";
define("ENDPOINT", "https://sandbox-ca.rapidefund.com/chatak-pay/pg/transaction/process");
define("USERNAME", "DropcomLLC");
define("PASSWORD", "OSMJXAC7");

function getToken(){
	$action = "https://sandbox-ca.rapidefund.com/chatak-pay/pg/oauth/token?grant_type=password&username=".USERNAME."&password=".PASSWORD;
	echo $action;
	$content = getcontent($action);
	$jsonDecoded = json_decode($content);
	print_r($jsonDecoded);
	return $jsonDecoded->access_token;
}

function submitManualSaleCard($cardDetails){
	$ManualSALECardData = Array(
		"billingData" => Array(
			"address1" =>" abc",
			"address2" =>" Bangalore",
			"city" =>" Bangalore",
			"state" =>" KA",
			"country" =>" India",
			"zipCode" =>" 123456",
			"email" =>" email@email.com",
		),

		"cardData" => Array(
			"cvv" =>" 232",
			"cardHolderName" =>" abc",
			"expDate" =>" 1604",
			"cardNumber" =>" 4215729002869979",
			"cardType" =>" VI",
		),

		"entryMode" =>" MANUAL",
		"invoiceNumber" =>" 12144124540",
		"merchantAmount" =>" 10",
		"feeAmount" =>" 1",
		"totalTxnAmount" =>" 11",
		"registerNumber" =>" 111224",
		"orderId" =>" 11121243545541",
		"merchantId" =>" 372605264715263",
		"merchantName" =>" merchantName",
		"terminalId" =>" 13606818",
		"transactionType" =>" SALE",
	);

	print_r($ManualSALECardData);
	$content = getcontent(ENDPOINT, $ManualSALECardData);
}

function submitMagneticSaleCard(){
	$MAGNETIC_STRIPSALEAencrypted = Array(
		"cardData" => Array(
			"cardHolderName" => " Morrish s Taylor sas Taylor",
			"track" =>  "17AF4AC59D3B14AC16B0DC4C899912C7A1A81DA764D777DEBF38A4871CC804 63A1122FCA4EB2532A",
			"cardType" =>" VI",
			"keySerial" =>" 9014300B090EF100000D",
		),

		"entryMode" =>" MAGNETIC_STRIP",
		"invoiceNumber" =>" 123123",
		"merchantAmount" =>" 10",
		"feeAmount" =>" 1",
		"totalTxnAmount" =>" 11",
		"registerNumber" =>" 1112234118",
		"orderId" =>" 123123",
		"merchantId" =>" 455416286838425",
		"merchantName" =>" merchantName",
		"terminalId" =>" 13606818",
		"transactionType" =>" SALE",
	);
	print_r($MAGNETIC_STRIPSALEAencrypted);
	$content = getcontent(ENDPOINT, $MAGNETIC_STRIPSALEAencrypted);
}

function submitMagneticStripBunSaleCard(){
	$MAGNETIC_STRIPSALEBunencrypted = Array(
		"cardData" => Array(
			"cvv" =>" 232",
			"track" =>" 1r2MJvS8mEschAqbTCi6wIRVODzivnZ9e6sOZMBAtBEZFGZwVheArsdyAts8TNbw",
			"cardType" =>" VI",
		), 
		"entryMode" =>" MAGNETIC_STRIP",
		"invoiceNumber" =>" 123123",
		"merchantAmount" =>" 10",
		"feeAmount" =>" 1",
		"totalTxnAmount" =>" 11",
		"registerNumber" =>" 1112234118",
		"orderId" =>" 123123",
		"merchantId" =>" 455416286838425",
		"merchantName" =>" merchantName",
		"terminalId" =>" 13606818",
		"transactionType" =>" SALE",
	);
	print_r($MAGNETIC_STRIPSALEBunencrypted);
	$content = getcontent(ENDPOINT, $MAGNETIC_STRIPSALEBunencrypted);
}

function submitTokenData(){
	$ManualSALETokenData3 = Array(
		"billingData" => Array(
				"address1" =>" abc",
				"address2" =>" Bangalore",
				"city" =>" Bangalore",
				"state" =>" KA",
				"country" =>" India",
				"zipCode" =>" 123456",
				"email" =>" email@email.com",
		),

		"cardTokenData" => Array(
			"userId" =>" user1",
			"password" =>" Password@1234",
			"token" =>" 2725462845740645",
			"cardLastFourDigit" =>" 4673",
			"cardType" =>" VI",
			"cvv" =>" 222",
			"email" =>" user1@mail.com",
		),

		"entryMode" =>" MANUAL",
		"invoiceNumber" =>" 12144124540",
		"merchantAmount" =>" 10",
		"feeAmount" =>" 1",
		"totalTxnAmount" =>" 11",
		"registerNumber" =>" 111224",
		"orderId" =>" 11121243545541",
		"merchantId" =>" 372605264715263",
		"merchantName" =>" merchantName",
		"terminalId" =>" 13606818",
		"transactionType" =>" SALE",
	);
	print_r($ManualSALETokenData3);
	$content = getcontent(ENDPOINT, $ManualSALETokenData3);
}

function submitManualAuth(){
	$MANUALAUTH = Array(
		"billingData" => Array(
			"address1" =>" abc",
			"address2" =>" Bangalore",
			"city" =>" Bangalore",
			"state" =>" KA",
			"country" =>" India",
			"zipCode" =>" 123456",
			"email" =>" email@email.com",
		),

		"cardData" => Array(
			"cvv" =>" 232",
			"cardHolderName" =>" abc",
			"expDate" =>" 1604",
			"cardNumber" =>" 4215729002869979",
			"cardType" =>" VI",
		)
,
		"entryMode" =>" MANUAL",
		"invoiceNumber" =>" 12144124540",
		"merchantAmount" =>" 10",
		"feeAmount" =>" 1",
		"totalTxnAmount" =>" 11",
		"registerNumber" =>" 111224",
		"orderId" =>" 11121243545541",
		"merchantId" =>" 372605264715263",
		"merchantName" =>" merchantName",
		"terminalId" =>" 13606818",
		"transactionType" =>" AUTH",
	);
	print_r($MANUALAUTH);
	$content = getcontent(ENDPOINT, $MANUALAUTH);
}

function captureTrans(){
	 $CAPTURE = Array(
		"merchantId" =>" 719516713606818",
		"terminalId" =>" 13606818",
		"transactionType" =>" CAPTURE",
		"txnRefNumber" =>" 713561067601",
		"cgRefNumber" =>" 844021121273175000",
	);
        
	print_r($CAPTURE);
	$content = getcontent(ENDPOINT, $CAPTURE);
}


function voidtrans(){
	$VOID = Array(
		"merchantId" =>" 719516713606818",
		"terminalId" =>" 13606818",
		"transactionType" =>" VOID",
		"txnRefNumber" =>" 713561067601",
		"cgRefNumber" =>" 844021121273175000",
	);
	print_r($VOID);
	$content = getcontent(ENDPOINT, $VOID);
}

function refundTrans(){
	 $REFUND = Array(
		"merchantId" =>" 719516713606818",
		"terminalId" =>" 13606818",
		"transactionType" =>" REFUND",
		"txnRefNumber" =>" 713561067601",
		"cgRefNumber" =>" 844021121273175000",
		"feeAmount" =>" 0",
		"merchantAmount" =>" 1000",
		"totalTxnAmount" =>" 1000",
	);
	print_r($REFUND);
	$content = getcontent(ENDPOINT, $VOID);
}

function registerCard(){
	$RegisterCard = Array(
		"cardData" => Array(
			"cardHolderName" =>" Morrish s Taylor sas Taylor",
			"cardType" =>" VI",
			"cardNumber" =>" 4421021022684673",
			"expDate" =>" 2212",
		),

		"userId" =>" user1",
		"password" =>" Password@1234",
		"email" =>" user1@mail.com",
	);
	print_r($RegisterCard);
	$content = getcontent(ENDPOINT, $RegisterCard);
}

echo $test = getToken();
?>