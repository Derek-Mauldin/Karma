<?php
$errorMSG = "";

// MESSAGE
if (empty($_POST["message"])) {
	$errorMSG .= "Message is required ";
} else {
	$message = $_POST["message"];
}
$EmailTo = "ddkarmabear@gmail.com";
$Subject = "New Message Received";
// prepare email body text
$Body = "";
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
// send email
$success = mail($EmailTo, $Subject, $Body);
// redirect to success page
if ($success && $errorMSG == ""){
	echo "success";
}else{
	if($errorMSG == ""){
		echo "Something went wrong :(";
	} else {
		echo $errorMSG;
	}
}
?>