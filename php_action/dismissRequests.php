<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$request = $_POST['request'];

if($request) { 

 $sql = "DELETE FROM requests WHERE requestno = '$request'";

 if($hostel->query($sql) === true) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the request";
 }
 
 $hostel->close();

 echo json_encode($valid);
 
}