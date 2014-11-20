<?php
//config.php
include 'credentials.php';#database credentials
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
define('DEBUG',FALSE); #we want to see all errors
//echo THIS_PAGE;
//die;

$nav1['template.php'] = 'Home';
$nav1['customers.php'] = 'Customers';
$nav1['fiji.php'] = 'Fiji';
$nav1['jamaica.php'] = 'Jamaica';
$nav1['contact.php'] = 'Contact Us';

/*
echo '<pre>';
var_dump($nav1);
echo '</pre>';
die;
*/






/*
echo '<pre>';
var_dump(makeLinks($nav1));
echo '</pre>';
die;
*/



switch(THIS_PAGE)
{
	
	case 'hawaii.php':	
		$title = "Island Title Tag";
		break;
		
	default:
		$title = "Default Title Tag";
		$banner = "Site Banner";		
	
}

function makeLinks($nav)
{
	$myReturn = "";
	
	foreach($nav as $url => $label )
	{
		if(THIS_PAGE ==$url )
		{//same page, show current class
			$myReturn .= '<li class="current"><a href="' . $url . '">' . $label . '</a></li>';	
			
		}else{//not special!
			$myReturn .= '<li><a href="' . $url . '">' . $label . '</a></li>';	
		}
		
		
		
	}
	
	return $myReturn;
}

/*

builds and sends a safe email, using Reply-To properly!

$today = date("Y-m-d H:i:s");
$to = 'wnewma01@seattlecentral.edu';
$replyTo = 'willamnewman@gmail.com';
$subject = 'Test Email, includes ReplyTo: ' . $today;
$message = 'Test Message Here.  Below should be a carriage return or two: ' . PHP_EOL . PHP_EOL .
'Here is some more text.  Hopefully BELOW the carriage return!
';

safeEmail($to, $subject, $message, $replyTo);

*/
function safeEmail($to, $subject, $message, $replyTo='')
{#builds and sends a safe email, using Reply-To properly!
    $fromDomain = $_SERVER["SERVER_NAME"];
    $fromAddress = "noreply@" . $fromDomain; //form always submits from domain where form resides
    if($replyTo==''){$replyTo='';}
    $headers = 'From: ' . $fromAddress . PHP_EOL .
    'Reply-To: ' . $replyTo . PHP_EOL .
    'X-Mailer: PHP/' . phpversion();
    return mail($to, $subject, $message, $headers);
}

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
} 


function myerror($myFile, $myLine, $errorMsg)
{
    if(defined('DEBUG') && DEBUG)
    {
       echo "Error in file: <b>" . $myFile . "</b> on line: <b>" . $myLine . "</b><br />";
       echo "Error Message: <b>" . $errorMsg . "</b><br />";
       die();
    }else{
        echo "I'm sorry, we have encountered an error.  Would you like to buy some socks?";
        die();
    }
}