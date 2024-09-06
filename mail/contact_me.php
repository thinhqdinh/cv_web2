<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['company']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['company'];
$message = $_POST['message'];

// Set the API endpoint and your email address
$api_endpoint = 'https://formsubmit.co/info@computingvista.com';
$api_key = ''; // Leave this blank if you don't have an API key

// Set the POST data
$post_data = array(
	'name' => $name,
	'email' => $email_address,
	'company' => $phone,
	'message' => $message
);

// Set the headers
$headers = array(
	'Content-Type: application/json',
	'Accept: application/json'
);

// Initialize the curl session
$ch = curl_init($api_endpoint);

// Set the curl options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute the curl session
$response = curl_exec($ch);

// Close the curl session
curl_close($ch);

// Check the response
if ($response === false) {
	echo 'Error: ' . curl_error($ch);
} else {
	echo 'Message sent successfully!';
}
?>