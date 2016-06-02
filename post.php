
<?php

$post_data = file_get_contents('php://input'); 
$post_data = json_decode($post_data, true);


	// Define db details
	$servername = 'hack6.chi7azzc6jzj.ap-southeast-2.rds.amazonaws.com:3306';
	$username = 'hack6';
	$password = 'partyparrot';
	$db = 'hack6';

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 


	$hirer_id = $post_data['hirer_id'];
	$role_id = $post_data['role_id'];
	date_default_timezone_set('Australia/Melbourne');
	$create_date = date("Y-m-d h:i:sa");

	foreach ($post_data['candidate)'] as $candidate) {

		$candidate_id = $candidate['candidate_id'];
		$distance = $candidate['distance'];
		$total_exp = $candidate['total_exp'];
		$has_photo = $candidate['has_photo'];
		$has_certs = $candidate['has_certs'];
		$avail_coverage = $candidate['avail_coverage'];
		$visa_type = $candidate['visa_type'];
		$rank = $candidate['rank'];

		$sql = "INSERT INTO records (hirer_id, role_id, candidate_id, distance, total_exp, has_photo, has_certs, avail_coverage, visa_type, rank, create_date)
		VALUES ('$hirer_id', '$role_id', '$candidate_id', '$distance', '$total_exp', '$has_photo', '$has_certs', '$avail_coverage', '$visa_type', '$rank', '$create_date')";

		if ($conn->query($sql) === TRUE) {
		    // Assume success - do nothing.
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		    break;
		}
	}

?>