<?php
require "vendor/autoload.php";
$helpers = new Helpers();

$helpers->accepts('POST');

$email = $helpers->input('email');
$password = $helpers->input('password');


$validator = $helpers->validator($helpers->inputs(), [
	'email' 	=> ['required'],
	'password'  => ['required']
]);

if(!$validator) {
	http_response_code(400);
	echo json_encode(['message' => $helpers->errors]);
} else {

}

?>