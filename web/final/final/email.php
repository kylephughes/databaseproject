<?php
//kyle hughes michael vivona eric dijamco
// checks to see if the email is entered or valid otherwise is 
// gives you an error

if(!empty($_GET['email'])){
if(! filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
echo"Email is not valid";
}
else{
$to = $_GET['email'];
$subject = "Ticket Purchase";
$message = "Congratulations! You successfully purchased a ticket, click 
the link below to claim it 

www.stubhub.com



Have a Great Day!";



mail($to, $subject,$message);

// confirmation page confirming you entered data correctly
header( "Location: confirmation.html" );
}

}
 else {
echo"Enter Something For  Email Address";
}
?>
