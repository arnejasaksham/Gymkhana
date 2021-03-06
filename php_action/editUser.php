<?php 	

require_once 'core.php';

if($_SESSION['userId']!=1) {
    header('location: dashboard.php');
}

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$uname = $_POST['username'];
	$upass = $_POST['userpassword'];
	$uemail = $_POST['useremail'];
	$roll = $_POST['roll'];

    $roll = strtolower($roll);

	if($uname){
		$sql = "UPDATE student SET name=? WHERE rollno='$roll'";

        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $uname);

        if($stmt->execute()) {
            $valid['success'] = true;
            $valid['messages'] = "Successfully Updated";
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while Updating";
        }			
	}
	if($upass){
		$upass = password_hash($upass, PASSWORD_DEFAULT);
		$sql = "UPDATE student SET password=? WHERE rollno='$roll'";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $upass);

        if($stmt->execute()) {
            $valid['success'] = true;
            $valid['messages'] = "Successfully Updated";
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while Updating";
        }			
	}
	if($uemail){
		$sql = "UPDATE student SET emailid=? WHERE rollno='$roll'";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $uemail);

        if($stmt->execute()) {
            $valid['success'] = true;
            $valid['messages'] = "Successfully Updated";
        } else {
            $valid['success'] = false;
            $valid['messages'] = "Error while Updating";
        }			
	}

}
	 
// $connect->close();

echo json_encode($valid);
 
