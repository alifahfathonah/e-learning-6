<!-- DOKU    API    
DOCUMENTATION
Version 1 
–
A
pril, 2016
www.doku.com
PT Nusa Satu Inti Artha
Plaza 
Asia Office Park Unit 3
Jl. Jenderal Sudirman Kav. 59
Jakarta 12190 Indonesia -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" rel="stylesheet">
<script src="http://staging.doku.com/doku-js/assets/js/doku.js"></script>
<link href="http://staging.doku.com/doku-js/assets/css/doku.css" rel="stylesheet">

<form action="charge.php" method="POST" id="payment-form">
	<div doku-div='form-payment'>
		<input id="doku-token" name="doku-token" type="hidden" />
		<input id=" doku-pairing-code" name="doku-pairing-code" type="hidden" /> 
	</div>      
</form>

<?php
require_once('../Doku.php');
Doku_Initiate::$sharedKey = '<v8a2K3f3Y9Y3>';
Doku_Initiate::$mallId = '<10896632>';
$invoice = 'invoice_1458123951';
$params = array(
'amount' => '10000.00',
'invoice' => $invoice,
'currency' => '360'
);
$words = doku_Library::doCreateWords($params);
?>


<script 
type="text/javascript">
$(function() {
var data = new Object();
data.req_merchant_code = '1';
data.req_chain_merchant = 'NA';
data.req_payment_channel = '15';
data.req_transaction_id = '<?php echo $invoice ?>';
data.req_currency = '<?php echo $currency ?>';
data.req_amount = '<?php echo $amount ?>';
data.req_words = '<?php echo $words ?>';
data.req_form_type = 'full';
getForm(data);
});
</script>