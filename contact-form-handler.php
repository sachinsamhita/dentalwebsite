<?php 
$errors = '';
$myemail = 'himanshududeja99@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['phone']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$phone = $_POST['phone']; 
$appointment = $_POST['appointment']; 
$message = $_POST['message']; 
$date = date("d:m:y");

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Website Contact form submission: $name  $date ";
	$email_body = "Hello Doctor, You have received a new message. ".
	" Here are the details:\n\n Name: $name \n Phone: $phone \n Appointment: $appointment \n Message: $message \n Date: $date \n\n End of Message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: ThankYou.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>