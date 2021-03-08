<?
session_start();
if(isset($_POST['submitted'])) {

$attending = trim($_POST['attending']);

$guests = trim($_POST['guests']);
$children = trim($_POST['children']);

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$address = trim($_POST['address']);
$restrictions = trim($_POST['restrictions']);
$comment = trim($_POST['comment']);

$emailTo = "danny.bof@gmail.com, stella1229@yahoo.com";
$subject = 'RSVP from '.$name;			
$body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nAddress: $address \n\nMessage: $comment \n\nAttending: $attending \n\nRestrictions: $restrictions \n\nNumber of guests: $guests \n\nNumber of children: $children";
$headers = 'From: '. $name .' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;

$myFile = "RSVP.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
fwrite($fh, $body);
$stringData = "\n==================================\n";
fwrite($fh, $stringData);
fclose($fh);

@mail($emailTo, $subject, $body, $headers);						
$emailSent = true;

}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1" />
<meta name="author" content="FamousThemes" />
<meta name="description" content="Get in the spotlight" />
<meta name="keywords" content="premium css templates, premium wordpress themes, famous themes, themeforest" />
<title>Stella & Danny</title>
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<link rel="stylesheet" href="prettyphoto/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
<link href='http://fonts.googleapis.com/css?family=Ovo' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
<!-- jQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!-- Twitter Feed -->
<script src="js/twitter/jquery.tweet.js" charset="utf-8"></script>
<!-- Flickr Feed -->
<script src="js/jflickrfeed.min.js"></script>
<!-- FlexSlider -->
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<!-- PrettyPhoto -->
<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="js/custom.quicksand.js"></script>
<!-- DropDownMenu -->
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" charset="utf-8">
var $ = jQuery.noConflict();
  $(window).load(function() {
    $('.flexslider').flexslider({
          animation: "fade"
    });
	
	$(function() {
		$('.show_menu').click(function(){
				$('.menu').fadeIn();
				$('.show_menu').fadeOut();
				$('.hide_menu').fadeIn();
		});
		$('.hide_menu').click(function(){
				$('.menu').fadeOut();
				$('.show_menu').fadeIn();
				$('.hide_menu').fadeOut();
		});
	});
	

  });
  
  jQuery(function($){
	$(".tweet").tweet({
	  modpath: 'js/twitter/',
	  join_text: "auto",
	  username: "famousthemes",
	  count: 1,
	  auto_join_text_default: "we said,",
	  auto_join_text_ed: "we",
	  auto_join_text_ing: "we were",
	  auto_join_text_reply: "we replied",
	  auto_join_text_url: "we were checking out",
	  loading_text: "loading tweets..."
	});
	$('#basicuse').jflickrfeed({
		limit: 6,
		qstrings: {
			id: '31408169@N04'
		},
		itemTemplate: '<li><a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
	});
  });
</script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#form1").validate({
        rules: {
          name: "required",// simple rule, converted to {required:true}
          email: {// compound rule
          required: true,
          email: true
        },
        comment: {
          required: true
        }
        },
        messages: {
          comment: "Please enter a message."
        }
      });
    });
</script>
<script type="text/javascript" charset="utf-8">
function hideDetails() {
	document.getElementById("additionalDetails").style.display = "none";
}

function showDetails() { 
	document.getElementById("additionalDetails").style.display = "block";
}
</script>
</head>
<body>
<div id="shadow_bg">
<div id="main_container">

	<a class="show_menu" href="#">menu</a>
    <a class="hide_menu" href="#">close menu</a>
	
    <div class="menu">                                                                   
        <ul id="main_menu">
        	<li><a href="index.html">Home</a></li>
            <li><a href="wedding.html">Our Wedding</a></li>
            <!--<li><a href="blog.html">Blog</a></li>-->
            <li><a href="gallery.html">Photo Album</a></li>
            <li><a class="selected" href="rsvp.php">RSVP</a></li>
            <li><a href="contact.php">Contact</a></li> 
        </ul>
     </div>
	

<div id="center_container">

  <div id="header">
     
     <div class="title"><a href="index.html">Stella &amp; Danny</a></div>
     <div class="description"><span class="swirl_left"><span class="swirl_right">18 November 2015</span></span></div>
     
  </div><!-- End of Header-->
     

  <div class="pages_title">
  <h2>Repondez s'il vous plait <span>RSVP</span></h2>
  </div> 
   
   <div class="content">
        <div class="left23">
    
			<div class="form_content">
            
			<?php if(isset($emailSent) && $emailSent == true) { ?>
            
                    <h2>Thank you,</h2>
            
                    <p>Your message was sent successfully!</p>
            
            <?php } else {?>
            
            <form id="form1" method="post" action="rsvp.php">  
			
			<h3 class="form_subtitle">Guest </h3>
          		<div class="form">
                    <div class="form_row">
                    <label>your name:</label>
                    <input type="text" class="form_input" name="name" />
                    </div>
                    <div class="form_row">
                    <label>your email:</label>
                    <input type="text" class="form_input" name="email" />
                    </div>
				</div>
			
			<h3 class="form_subtitle">Will you be attending the wedding?</h3>
            	<div class="form_rsvp">
                    <div class="form_row_rsvp">
						<div class="checkbox_container"><input checked type="radio" name="attending" value="yes" class="form_checkbox" onClick="javascript:showDetails();" /></div> <span class="checkbox_value">Of Course Yes!</span>
                    </div>
					<div class="form_row_rsvp">
						<div class="checkbox_container"><input type="radio"  name="attending" value="no" class="form_checkbox" onClick="javascript:hideDetails();" /></div> <span class="checkbox_value">Unfortunately Not.</span>
                    </div>
                </div>
                
           <h3 class="form_subtitle">Additional Details</h3>
          		<div id="additionalDetails" class="form">
                    <div class="form_row">
                    <label># of adults:</label>
                    <div class="select_container">
                    <select class="form_select" name="guests">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    </select>
                    </div>
                    </div>
                    <div class="form_row">
                    <label># of children*:</label>
                    <div class="select_container">
                    <select class="form_select" name="children">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                    </div>
                    </div>					
                    <div class="form_row">
                    <label>your phone:</label>
                    <input type="text" class="form_input" name="phone" />
                    </div>
                    <div class="form_row">
                    <label>your address:</label>
                    <textarea class="form_textarea" name="address"></textarea>
                    </div>	
                    <div class="form_row">
                    <label>any dietary restrictions or allergies:</label>
                    <textarea class="form_textarea" name="restrictions"></textarea>
                    </div>					
				* Children = age below 10
				</div>
			<h3 class="form_subtitle">Comments </h3>
          		<div class="form">
                    <div class="form_row">
                    <label>comments:</label>
                    <textarea class="form_textarea" name="comment"></textarea>
                    </div>
                    <div class="form_row">
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                    <input type="submit" class="form_submit_contact" value="Add RSVP" />
                    </div> 
				</div>
				
                </form>
                
                <?php } ?>
                
            </div>
             
        </div>
		
   		<div class="left13 sidebar">

			<h2>Wedding Location</h2>

<div class="gmap"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d554679.9885268357!2d-156.4424285714739!3d20.65653099723704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7954db470fe726eb%3A0x614a8d7e47816893!2sKukahiko+Estate!5e1!3m2!1sen!2sus!4v1437325931096" width="260" height="200" frameborder="0" style="border:0"></iframe></div>
			<h2>Address</h2>
			<ul>
                <li><a href="http://www.kukahikoestate.com">Kukahiko Estate</a></li>
				<li>5034 Makena Rd. - Kihei, HI 96753</li>
				<li>Phone: (808) 575-9999</li>
				<li><a href="https://www.facebook.com/kukahikoestate"><img src="images/facebook.png" alt="" title="" border="0"/></a></li>
				<li><a href="https://vimeo.com/86054405"><img src="images/vimeo.png" alt="vimeo" title="vimeo" border="0"/></a></li>
            </ul>
<!--            
            <h2>Latest tweets</h2>
            <div class="tweet"></div>
            <img src="images/icon_tweets.gif" alt="" title="" class="tweet_icon" />
            
            <h2>Flickr photos</h2>
            <div class="flickr_photos">
            <ul id="basicuse" class="thumbs"></ul>
            </div>
 -->           
            
             
        </div>
		
        <div class="clear"></div>
       
   </div>
   
   <div class="clear"></div> 
   
</div>

</div>
</div>

   
   <div class="footer">
       <div class="footer_content">
       <div class="footer_text">
	   <strong>Stella:</strong> Product Manager, QA<br />
	   <strong>Danny:</strong> Lead Developer, UX Design, Scrum Master<br />
	   <strong>Penny:</strong> Moral Support and Everything Else<br />
	   Wedding Template by <a href="http://famousthemes.com">Famous Themes</a>
       </div>
       <div class="footer_menu">
	       <ul>
		   <li><a href="index.html">Home</a></li>
		   <li><a href="wedding.html">Our Wedding</a></li>
           <!--<li><a href="blog.html">Blog </a></li>-->         
           <li><a href="gallery.html">Photo Album </a></li>             
           <li class="selected"><a href="rsvp.php">RSVP</a></li>               
           <li><a href="contact.php">Contact</a></li> 
           <li><a onclick="jQuery('html, body').animate( { scrollTop: 0 }, 'slow' );"  href="javascript:void(0);" class="gotop" title="Go on top">TOP</a> </li>
           </ul>
       </div>
       <div class="clear"></div>
       </div>
       
   </div>

<script type="text/javascript">
var main_menu=new main_menu.dd("main_menu");
main_menu.init("main_menu","menuhover");
</script>
</body>
</html>
