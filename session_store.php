<?php
session_start();
$refsite = "";
$adunit = "";
$channel = "";
$campaign = "";
$term = "";
$content="";
###  Default values for Tracking Parameters  ###
$def_refsite = "Arrosa_LP";
$def_adunit = "Arrosa_LP";
$def_channel = "Arrosa_LP";
$def_campaign = "Arrosa_LP";

// utm_source & refsite values - starts here 
if (isset($_REQUEST["utm_source"])) 
{
	$refsite=strip_tags(trim($_REQUEST["utm_source"]));		
}
else if(isset($_REQUEST['refsite']))
{
	$refsite=strip_tags(trim($_REQUEST['refsite']));	
}
else if(isset($_SESSION['refsite']))
{
	$refsite=strip_tags(trim($_SESSION['refsite']));	
}
else
{
	$refsite=$def_refsite;
}
// utm_source & refsite values - ends here 

// utm_content & adunit values - starts here 
if (isset($_REQUEST["utm_content"])) 
{
	$adunit=strip_tags(trim($_REQUEST["utm_content"]));		
}
else if (isset($_REQUEST["adunit"]))
{
	$adunit=strip_tags(trim($_REQUEST["adunit"]));
}
else if (isset($_SESSION["adunit"]))
{
	$adunit=strip_tags(trim($_SESSION["adunit"]));
}
else 
{
	$adunit=$def_adunit;
}
// utm_content & adunit values - ends here 

// utm_medium & channel values - starts here 
if (isset($_REQUEST["utm_medium"]))
{
	$channel=strip_tags(trim($_REQUEST["utm_medium"]));
	
}
else if (isset($_REQUEST["channel"]))
{
	$channel=strip_tags(trim($_REQUEST['channel']));
}
else if (isset($_SESSION["channel"]))
{
	$channel=strip_tags(trim($_SESSION["channel"]));
}
else 
{
	$channel=$def_channel;
}
// utm_medium & channel values - ends here 

// utm_campaign & campaign values - starts here 
if (isset($_REQUEST["utm_campaign"]))
{
   $campaign=strip_tags(trim($_REQUEST["utm_campaign"]));
}
else if(isset($_REQUEST['campaign']))
{
	$campaign=strip_tags(trim($_REQUEST['campaign']));
}
else if (isset($_SESSION["campaign"]))
{
	$campaign=strip_tags(trim($_SESSION["campaign"]));
}
else 
{
	$campaign=$def_campaign;
}
// utm_campaign & campaign values - ends here

// utm_term & term values - starts here
if (isset($_REQUEST["utm_term"]))
{
   $term=strip_tags(trim($_REQUEST["utm_term"]));
}
else
{
	$term="";	
}
// utm_term & term values - ends here

$_SESSION['refsite'] = $refsite;
$_SESSION['adunit'] = $adunit;
$_SESSION['channel'] = $channel;
$_SESSION['campaign'] = $campaign;
$_SESSION['term'] = $term;
?>