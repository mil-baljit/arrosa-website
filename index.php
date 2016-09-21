<?php include("session_store.php");
$_SESSION['enqSent'] = "empty";
$pageOpen = @$_REQUEST["page"];
include_once("detect.php");
$uagent_obj = new uagent_info();
$smartphone = $uagent_obj->DetectTierIphone();
$tablet = $uagent_obj->DetectTierTablet();
$richcss = $uagent_obj->DetectTierRichCss();
$maemo = $uagent_obj->DetectMaemoTablet();
$operatab = $uagent_obj->DetectOperaAndroidTablet();
$androidCheck = $uagent_obj->DetectAndroidPhone();
$anysmartphone = $uagent_obj->DetectSmartphone();
if(($smartphone == 1) || ($richcss == 1) || ($maemo==1) || ($operatab==1)|| ($androidCheck==1)|| ($anysmartphone==1))
{
header('Location: http://tatahousing.in/arrosa/mobile/index.php?refsite='.$refsite.'&campaign='.$campaign.'&adunit='.$adunit.'&channel='.$channel.'');
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name = "format-detection" content = "telephone=no">

    <title>Tata Housing - Arrosa 2BHK, 2.5BHK, 3BHK Apartments</title>
    <meta name="description" content="Tata Housing Arrosa offering eco-luxury residential flats 2 bhk, 2.5 bhk and 3 bhk with top class amenities located LBS Marg, Bhandup Mumbai."/>
    <meta name="keywords" content="Flats in Bhandup, Tata Housing Arrosa, 2 bhk Flats in Bhandup, Mumbai, 2.5 bhp Apartments in Mumbai, 3 bhk Flats in Mumbai, 3 bhk Super Luxury Flats in Mumbai, Buy Flats in Bhandup Mumbai, Bhandup Residential Flats."/>
    <meta name="author" content="Tata Housing Development Company Ltd."/>
    <meta name="robots" content="index,follow"/>
    <meta property="og:title" content="TATA Housing - Arrosa Bhandup." />
    <meta property="og:description" content="Tata Housing Arrosa offering eco-luxury residential flats 2 bhk, 2.5 bhk and 3 bhk with top class ameneties located LBS Marg, Bhandup Mumbai."/>
    <meta property="og:site_name" content="TATA Housing – Arrosa Bhandup."/>

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-38590321-20', 'auto');
  ga('send', 'pageview');

</script> 
    
    <div id="wrapper">
    	<div class="container-fluid">
        	<div class="row banner">
            	<div class="header">
                	<aside class="right"><a href="http://tatahousing.in/" target="_blank"><img src="images/tata-logo.png" alt=""></a></aside>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-12 formContainer">
                	<div class="netLogo"><img src="images/nept.png" alt=""></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12"><h1>Enquire now</h1></div>
                                
                                <div class="col-lg-3 col-md-6 tollFreeContainer">
                                    <div class="col-lg-2 col-md-3 text-left"><img src="images/phone-icon.gif" width="36" height="40" alt="" class="shortIcons"/> </div>
                                    <div class="col-lg-10 col-md-9 tollFree">
                                    	1800 3004 8282 (INDia)
                                        <div class="hiddenNub">
                                        	8000 3570 3675 (UAE)<br>
                                            8557 28 6714 (USA)<br>
                                            8081 78 5141 (UK)<br>
                                            8003 21 1140 (SG)
                                        </div>
                                        <span>+</span>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-6 pull-right formContentContainer">
                                	<div class="col-lg-1 col-md-1 text-right mailIcon"><img src="images/mail-icon.gif" width="36" height="40" alt="" class="shortIcons"/> </div>
                                    <div class="col-lg-11 col-md-11 form">
                                    <form name="dropEnq" id="dropEnq" class="floating-form-section" action="sendlead.php" method="post">
                                    	<fieldset>
                                            <div class="holder">
                                               <input type="text" name="txtname" id="txtname" title="Please enter your name" placeholder="Full Name" class="required">
                                            </div>
                                            <div class="holder">
                                               <input type="text" name="txtmail" id="txtmail" title="Please enter a valid email ID" placeholder="Email" class="required">
                                            </div>
                                            <div class="holder">
                                              <select id="txtcountry_sticky" name="txtcountry" onchange="showCode(this.value,this.form.name)" class="country_id required styled" aria-required="true">
                                                  <?php include('callback_countries_list.htm');?>
                                                </select>
                                            </div>
                                            <div class="holder phone">
                                            <input type="text"  name="txtcode" value="+91" readonly class="txcode short">
                                             <input type="text" name="txtmobile" id="txtmobile" title="Please enter a valid mobile no." class="txmobile med required" placeholder="Mobile" onkeypress="return isNumberKey(event)" maxlength="12">
                                            </div>
                                            <div class="holder submitBtn">
                                                <input type="submit" value="Submit">
                                                 <input type="hidden" name="human">
  <input type="hidden" id="refsite" name="refsite" value="<?php echo $refsite; ?>">
                    <input type="hidden" id="adunit" name="adunit" value="<?php echo $adunit; ?>">
                    <input type="hidden" id="channel" name="channel" value="<?php echo $channel; ?>">
                    <input type="hidden" id="campaign" name="campaign" value="<?php echo $campaign; ?>">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container-fluid tabs">
            	<div class="row">
                	<div class="col-lg-12">
                        <div id="exTab1" class="container-fluid">	
                            <ul  class="nav nav-pills">
                                <li class="active"><a href="#1" data-toggle="tab">Project at a Glance</a></li>
                                <li><a href="#2" data-toggle="tab">Amenities & Specifications</a></li>
                                <li><a href="#3" data-toggle="tab">Master Plan</a></li>
                                <li><a href="#4" data-toggle="tab">Floor Plans</a></li>
                                <li><a href="#5" data-toggle="tab">Unit Plans</a></li>
                                <li><a href="#6" data-toggle="tab">Price</a></li>
                                <li class="last"><a href="#7" data-toggle="tab">Location</a></li>
                            </ul>
                    
                            <div class="tab-content clearfix">
                            	
                                <!-- tab content 1 -->
                                <div class="tab-pane active auto" id="1">
                                  Welcome to Arrosa, a part of Eleve, a true oasis of private living surrounded by unobstructed views of lush green spaces, Powai Lake and Vihar Lake. Starting at a lofty 150 ft. (approx) above sea level, it gives you the exclusivity of a gated complex in the midst of a socially active hub.<br><br>

The high rise luxury tower offers premium homes on LBS Marg and is in close proximity to the Eastern Express Highway, the International Airport, JVLR & SCLR. Arrosa is nestled in a residential neighbourhood with ready social infrastructure located nearby such as schools, colleges, hospitals, shopping malls, multiplexes, retail shops as well as the station.

So, come home to a higher form of living, and wellness as far as the eyes can see.

                                    <br><br>
                                    <h2>So, come home to a higher form of living, and wellness<br>
 as far as the eyes can see.</h2>
                                </div>
                                <!-- tab content 2 -->
                                <div class="tab-pane amenities auto" id="2">
                                	<h3>Amenities</h3>
                                    <br><br>
                                    ARROSA has been conceived as the perfect blend of contemporary<br>
									architecture and the goodness of nature, located in the prime most location of Central Suburbs of Mumbai
                                    <div class="amenitesPlans">
                                    	<div class="pull-left col-xs-offset-1"><img src="images/a1.jpg" alt=""></div>
                                        <div class="pull-right"><h4>Sub Urban Soul with <br>Contemporary Flair</h4>
                                        <p>With close proximity to the International Airport,<br> Eastern Express Highway & Powai, Arrosa offers a<br> perfect blend of new age style of MODERN LIVING<br> balanced with privacy & spaciousness.</p>
                                        </div>
                                        <div class="clearfix"></div>
                                        <br><br>
                                        <div class="pull-left col-xs-offset-1"><img src="images/a2.jpg" alt=""></div>
                                        <div class="pull-right"><h4>clubhouse</h4>
                                        <p>Separate Changing Rooms | Gymnasium<br>
                                            Indoor Games Room | 3 Table Tennis Pool Tables<br>
                                            Squash Court  | Locker Room | Daily Needs Store</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="amenitesPlans">
                                    	<h3>Landscape Amenities</h3>
                                        <br><br>
                                    	<div class="pull-left col-xs-offset-1"><img src="images/a3.jpg" alt=""></div>
                                        <div class="pull-right">
                                        <p style="margin-top:30px">Pet Park | Butterfly Garden | Multi Sports Court<br>
                                        Jogging/Walking Tracks | Open Air Meditation Zone<br>
                                        Children’s Play Area | Manicured Gardens | Outdoor Gym<br> 
                                        Senior Citizens Corner | Acupressure Walk | Aerobic Center </p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="amenitesPlans">
                                        <h3>Specifications</h3>
                                        <br><br>
                                    	<div class="pull-left col-xs-offset-1"><img src="images/a1.jpg" alt=""></div>
                                        <div class="pull-right">
                                      		<ul>
                                                <li>Marble finish elevators.</li>
                                                <li>Vitrified tiles & ceramic floorings</li>
                                                <li>Double bolted night latches for enhanced
                                                safety & security</li>
                                                <li>VDO & intercom facilities</li>
                                                <li>Provision for geysers, exhaust fans & split ACs </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!-- tab content 3 -->
                                <div class="tab-pane amenities" id="3">
                                    <h3>MASTER PLAN</h3>
                                    <br><br>
                                        <div class="masterPlan">
                                            <aside class="left legend ">
                                                <h2>legend</h2>
                                                <ul class="left scrollContent">
                                                    <li>INFINITY POOL</li>
                                                    <li>KIDS POOL</li>
                                                    <li>SITOUT</li>
                                                    <li>OUTDOOR GYMNASIUM</li>
                                                    <li>CHILDREN’S PLAY AREA</li>
                                                    <li>YOGA PAVILION</li>
                                                    <li>ACUPRESSURE WALK</li>
                                                    <li>MEDITATION PAVILION</li>
                                                    <li>PARTY LAWN</li>
                                                    <li>WIDE JOGGING/ WALKING TRACK</li>
                                                    <li>BUTTERFLY GARDEN</li>
                                                    <li>SKATING RINK</li>
                                                    <li>TERRACE GARDEN ON CLUB HOUSE</li>
                                                    <li>WATER CURTAIN</li>
                                                    <li>GREEN WALL</li>
                                                    <li>PARTY AREA PAVILIONS</li>
                                                    <li>SENIOIR CITIZEN’S AREA</li>
                                                    <li>MANICURED GARDEN</li>
                                                    <li>PAVILION IN MANICURED GARDEN</li>
                                                    <li>BASKETBALL COURT</li>
                                                    <li>PET PARK</li>
                                                    <li>VIEWING SITOUT</li>
                                                    <li>OUTDOOR CHESS BOARD</li>
                                                </ul>
                                            <div class="clear"></div>
                                            </aside>
                                           <img class="body mainPic" src="images/master-big.jpg" style="display:none;">
                                            <a href="javascript:void(0)" class="masPlans right testPic"></a>
                                            <div class="clear"></div>
                                            <a href="javascript:void(0)" class="masterZoom testPic"><img src="images/zoom.jpg" alt="" /><br /> Click to enlarge</a>
                                        </div>
                                </div>
                                 <!-- tab content 4 -->
                                <div class="tab-pane amenities" id="4">
                                	<h3>Floor Plans</h3>
                                    <br><br>
                                   	<div class="floorPlans">
                                    	  <img class="body floorPic" src="images/floor-2-big.jpg" style="display:none;">
                                   		<a href="javascript:void(0)" class="floorPlan"><img src="images/floor-plan.jpg" alt=""></a>
                                    </div>
                                   	<a href="javascript:void(0)" class="floorPlan"><img src="images/zoom.jpg" alt=""></a>
                                </div>
                                <!-- tab content 5 -->
                                <div class="tab-pane amenities" id="5">
                                	<h3>Unit Plans</h3>
                                    <br><br>
                                    <div class="unitPlans">
                                        <div class="row">
                                        	<img class="body unitpic1" src="images/unit-2-big.jpg" style="display:none;">
                                            <a href="javascript:void(0)" class="unit1"><img src="images/unit1.png" alt="" /></a>
                                            <span>2 BHK</span>
                                        </div>
                                        <div class="row">
                                        	<img class="body unitpic2" src="images/unit-1-big.jpg" style="display:none;">
                                            <a href="javascript:void(0);" class="unit2"><img src="images/unit2.png" alt="" /></a>
                                            	<span>2.5 BHK</span>
                                        </div>
                                        <div class="row">
                                        	<img class="body unitpic3" src="images/unit-3-big.jpg" style="display:none;">
                                            <a href="javascript:void(0);" class="unit3"><img src="images/unit3.png" alt="" /></a>  
                                            <span>3 BHK</span>                                        
                                        </div>
                                    </div>
                                </div>
                                <!-- tab content 6 -->
                                <div class="tab-pane amenities" id="6">
                                	<h3>Price</h3><br>
                                    <div class="priceContainer">
                                    	<div class="heading">
                                        	<div>2 BHK</div>
                                            <div>2.5 BHK</div>
                                            <div>3 BHK</div>
                                        </div>
                                        <div class="heading inner">
                                        	<div>Rs 1.48 Cr onwards</div>
                                            <div>Rs 1.88 Cr onwards</div>
                                            <div>Rs 2.06 Cr onwards</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- tab content 7 -->
                                <div class="tab-pane amenities" id="7">
                                	<h3>Location</h3><br>
                                      <div class="reach">
                                        <aside class="right reachUs">
                                            <h2>sales office</h2>
                                           	Eleve Sales Lounge, Neptune Living Point,<br>
                                            Behind Metro Cash & Carry,<br>
                                            LBS Marg, Bhandup (W)<br><br>
                                            <h2>registered office</h2>
                                            TATA Housing Development Co. Ltd.<br>
                                            12th Floor, Times Tower, Kamala Mills Compound<br>
                                            Senapati Bapat Marg<br>
                                            Lower Parel, Mumbai - 400013
                        
                                        </aside>
                                        <a href="images/locationmap.jpg" class="fancyboxPlan locationMap left"></a>
                                        <div class="clear"></div>
                                        <a href="images/locationmap.jpg" class="fancyboxPlan zoomIcon"><img src="images/zoom-icon.png" alt="" /><br /> Click to enlarge</a>
                                    </div>
                                </div>
                            </div>
                            
                          </div>
                      </div>
                  </div>
            </div>
            
            <br><br>
            <div class="tagLing">Project Conceptualised, Executed, Managed and Marketed by Tata Housing Development Co. Ltd as Development Manager</div>
            <div class="container footer">
            	<div class="row">
                	<div class="col-lg-12">
                    	Disclaimer: The layouts, design, specifications, colour scheme are only for pictorial representation and are not final in any nature, details mentioned herein <br>
are subject to change at the discretion of the promoter. Tata Housing Development Company Limited hereby reserves the right to vary/alter/change the information appearing herein/therein at any time without prior intimation of the Applicants.
                        <br>
                    	<img src="images/foot-dvd.gif" width="1070" height="8" alt=""/>
                        <br>
                        <span>Copyright 2016 Tata Housing Development Company &nbsp; /  <a href="privacy.php" class="fancybox fancybox.iframe">Privacy</a>  /  <a href="disclaimer.php" class="fancybox fancybox.iframe">Disclaimer</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design: <a href="http://milagro.in/" target="_blank" class="credit">Milagro Interactive</a></span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <a href="https://tatahousing.in/eleve/onlinebooking/index.php?adunit=<?=$adunit?>&channel=<?=$channel?>&refsite=<?=$refsite?>&campaign=<?=$campaign?>" target="_blank" class="bookOnline"><img src="images/Book-Online_button.png" ></a>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
        $(".tollFree").hover(function(){
			$(".hiddenNub").slideToggle("slow")
		});
    });
</script>
<script type="text/javascript" src="js/jquery.customSelect.js"></script>
<script type="text/javascript">
	$(function(){
		$('.styled').customSelect();
	});
</script>

<!--fancybox-->
<script type="text/javascript" src="source/jquery.fancybox.js" defer></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" property="stylesheet" />
<script type="text/javascript">
	$(document).ready(function(){ 
   $(".fancybox").fancybox({
   fitToView   : true,
	autoSize    : true,
	closeClick  : true,
	'type': 'iframe',
	openEffect  : 'elastic',
	closeEffect : 'elastic',
	helpers: {
    	overlay: {
      	locked: false
    	}
  	}
   });
   
   $(".fancyboxPlan").fancybox({
   fitToView   : true,
	autoSize    : true,
	closeClick  : true,
	openEffect  : 'elastic',
	closeEffect : 'elastic',
	helpers: {
    	overlay: {
      	locked: false
    	}
  	}
   });
});
</script>

<!-- CustomScroll-->
<script src="js/jquery.mCustomScrollbar.concat.min.js" defer></script>
<link href="js/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" property="stylesheet"  />
<script>
	(function($){
		$(window).load(function(){
			$(".scrollContent").mCustomScrollbar({
				scrollButtons:{
					enable:false,
				} 
			});
		});
	})(jQuery);
</script>
<script src="js/jquery-plugins.js"></script> 
<script src="js/common.js"></script>

<script src="js/jquery.imagecursorzoom.js"></script> 
<script>
	$(function(){
		$('IMG.body').imageCursorZoom();
		$('IMG.box').imageCursorZoom({parent:function(){ return $(this).parent(); }});
	});
	
	$(document).ready(function(e) {
        $(".testPic").click(function(){
			$(".mainPic").click();
		});
		
		 $(".floorPlan").click(function(){
			$(".floorPic").click();
		});
		$(".unit1").click(function(){
			$(".unitpic1").click();
		});
		$(".unit2").click(function(){
			$(".unitpic2").click();
		});
		$(".unit3").click(function(){
			$(".unitpic3").click();
		});
    });
</script>

<!-- Google Code for Eleve - Leads Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 938440297;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "AZ9hCMHh0WMQ6ey9vwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/938440297/?label=AZ9hCMHh0WMQ6ey9vwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1657100824566533');
fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1657100824566533&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->

</body>
</html>