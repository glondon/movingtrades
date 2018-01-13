<?php

if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest')
    exit(header('Location: ' . URL . '404'));

include('additional_settings.php');

$db = new mysqli($host, $user, $pass, $database);
if(mysqli_connect_errno()){
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

session_start();

if(!empty($_POST)){

	foreach($_POST as $k => $v)
		$_POST[$k] = trim(filter_var($v, FILTER_SANITIZE_STRING));

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$comments = $_POST['comments'];
	$captcha = $_POST['captcha'];
	$source = 'movingtrades';

	$errors = array();

	if($name == '')
		$errors[] = 'Enter name';
	if($name != '' && strlen($name) > 50)
		$errors[] = 'Name maxed';
	if($phone != '' && !preg_match('/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i', $phone))
		$errors[] = 'Invalid phone';
	if($phone != '' && strlen($phone) > 20)
		$errors[] = 'Phone maxed';
	if($email == '')
		$errors[] = 'Enter email';
	if($email != '' && !filter_var($email, FILTER_VALIDATE_EMAIL))
		$errors[] = 'Invalid email';
	if($email != '' && strlen($email) > 50)
		$errors[] = 'Email maxed';
	if(!email_check($email, $source))
		$errors[] = 'Email exists';
	if($comments != '' && strlen($comments) > 100)
		$errors[] = 'Comments maxed';
	if($captcha == '')
		$errors[] = 'Enter captcha';
	if($captcha != '' && md5($captcha) != $_SESSION['randomnr2'])
		$errors[] = 'Invalid captcha';

	$response = array();

	if(empty($errors)){
		$response['success'] = true;
		$data = array('name' => $name, 'phone' => $phone, 'email' => $email, 'comments' => $comments, 'source' => $source);

		save($data);
		email_user($data);
		email_admin($data);
	}
	else{
		//show errors
		$response['success'] = false;
		$response['errors'] = $errors;
	}

	echo json_encode($response);

}

function save($data)
{
	global $db, $table;
	$ip = $_SERVER['REMOTE_ADDR'];
	$country = '';
	$status = 'new';
	$api = 'http://freegeoip.net/json/' . $ip;
	$file = file_get_contents($api);
	if($file != false){
		$response = json_decode($file, true);
		if($response != false || $response != null){
			if(isset($response['country_code'])){
				if($response['country_code'] != '0')
					$country = $response['country_code'];
			}
				
		}
	}
		
	$query = "INSERT INTO $table (source, name, phone, email, status, timestamp, ip, country, comments) VALUES ('".
			  $data['source']."', '".$data['name']."', '".$data['phone']."', '".
			  $data['email']."', '$status', NOW(), '$ip', '$country', '".$data['comments']."')";

	$db->query($query);
}

function email_user($data)
{
	$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Admin <'.EMAIL.'>' . "\r\n";

	$to = $data['email'];
	$subject = $data['name'] . ', thanks for subscribing.';
	$body = '<p>You made the right decision to join the JazzTrumpetLicks mailing list.</p>';
	$body .= '<p>I wanted to start things off by giving you a list of chords you should focus on as a jazz musician.</p>';
	$body .= '<p><a href="'.URL.'basic-chords-to-learn/" target="_blank">'.URL.'basic-chords-to-learn/</a></p>';
	$body .= '<p>We look forward to working with you!</p>';

	mail($to, $subject, $body, $headers);
}

function email_admin($data)
{
	$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Admin <'.EMAIL.'>' . "\r\n";

	$to = EMAIL;
	$subject = 'You have a new subscriber on ' . date('Y/m/d');
	$body = '<p>Lead details from '.$data['source'].' are below:</p>;
		<ul>
			<li>Name: '.$data['name'].'</li>
			<li>Email: '.$data['email'].'</li>
			<li>Phone: '.$data['phone'].'</li>
			<li>Source: '.$data['source'].'</li>
			<li>Comments: '.$data['comments'].'</li>
		</ul>';

	mail($to, $subject, $body, $headers);
}

function email_check($email, $source)
{
	global $db, $table;
	$query = "SELECT email FROM $table WHERE email = '$email' AND source = '$source' LIMIT 1";

	$result = $db->query($query);

	if($result->num_rows > 0)
		return false;

	return true;
	
}


?>