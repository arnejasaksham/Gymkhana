<?php 	

require_once 'core.php';

if(!($_SESSION['userId']==-2 || $_SESSION['userId']>2)) {
    header('location: dashboard.php');
}

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){

	$brandId = $_POST['brandId'];

	if($brandId) { 

	 $sql = "UPDATE currentapplications set status = 2 WHERE formid = '$brandId'";

	 if($forms->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Rejected";
	 } else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while updating the Item (Maybe Constraint error)";
	 }
	 
	 $forms->close();

	 echo json_encode($valid);
	 
	}
}