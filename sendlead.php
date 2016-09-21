<?php
session_start(); 
include("connection.php");
function clean( $input ) 
{
	if( get_magic_quotes_gpc() )
	$input = stripslashes( $input );
	return mysql_real_escape_string($input );
}
function spamcheck($field)
{
	 $field=filter_var($field, FILTER_SANITIZE_EMAIL);
	 if(filter_var($field, FILTER_VALIDATE_EMAIL))
	 {
		return TRUE;
	 }
	 else
	 {
		return FALSE;
	 }
}
/*** Fetch form fields ***/
$_SESSION['enqSent'] = "empty";
$Fname = clean($_REQUEST['txtname']);
$Email = clean($_REQUEST['txtmail']);
$Country = clean($_REQUEST['txtcountry']);
$code = clean($_REQUEST['txtcode']);
$Phone = clean($_REQUEST['txtmobile']);

/*** Fetch tracking urls ***/
$refsite = clean($_REQUEST['refsite']);
$adunit = clean($_REQUEST['adunit']);
$channel = clean($_REQUEST['channel']);
$campaign = clean($_REQUEST['campaign']);
$adset = clean($_REQUEST['adset']);
$keyword = clean($_REQUEST['keyword']);

$Mobile = $code.' '.$Phone;	
	
$mailcheck = spamcheck($Email);
if ($mailcheck==FALSE)
{
	header("location: index.php");
	echo "test";
	exit();
}

$refsite  = urlencode($refsite);
$adunit  = urlencode($adunit);
$channel  = urlencode($channel);
$campaign  = urlencode($campaign);
$ipaddress = urlencode($_SERVER['REMOTE_ADDR']);  
$projid = "Eleve";
$domain = $_SERVER['HTTP_HOST'];		
/*echo $adunit;
echo $channel;
echo $refsite;
echo $campaign;
exit;*/	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Arrosa</title>
</head>
<body>

<form name="frmenquiryconfirm" id="frmenquiryconfirm" method="POST" action="http://tatahousing.in/leads/enquiry_web_thdc_submit.php">
  <input type="hidden" value="<?=$refsite?>" name=refsite>
  <input type="hidden" value="<?=$adunit?>" name=adunit>
  <input type="hidden" value="<?=$channel?>" name=channel>
  <input type="hidden" value="<?=$campaign?>" name=campaign>
  <input type="hidden" value="<?=$ipaddress?>" name=REMOTE_ADDR>
  <input name="Fname" type="hidden" value="<?=$Fname?>" >
  <input name="Mobile" type="hidden" value="<?=$Mobile?>" >
  <input name="txtcountry" type="hidden" value="<?=$Country?>" >
  <input name="Email" type="hidden" value="<?=$Email?>" >
  <input name="projid" type="hidden" value="<?=$projid?>">
  <input name="domain" type="hidden" value="<?=$domain?>" >
  <input name="adset" type="hidden" value="<?=$adset?>" >
  <input name="keyword" type="hidden" value="<?=$keyword?>" >
   <input name="website_source" type="hidden" value="Arrosa" >
  <input name="sou" type="hidden" value="Arrosa-website-Enquiry" >
</form>
<script language="javascript1.2">
	document.frmenquiryconfirm.submit();
</script>
</body>
</html>