<?php require_once 'includes/header.php';

$roll_no = $_SESSION['userId'];

$hostel = new mysqli($localhost, $username, $password, $_SESSION['hostel']);
// check connection
if($hostel->connect_error) {
  die("Connection Failed : " . $hostel->connect_error);
} else {
//   echo "Successfully connected";
}

$sql = "SELECT * FROM equipment";
$query = $hostel->query($sql);
$countTotal = $query->num_rows;

$sql = "SELECT * FROM equipment WHERE status = 2";
$query = $hostel->query($sql);
$countRepair = $query->num_rows;

$sql = "SELECT * FROM equipment WHERE status = 1";
$query = $hostel->query($sql);
$countAvailable = $query->num_rows;

$sql = "SELECT * FROM issued natural join equipment WHERE rollno = '$roll_no'";
$query = $hostel->query($sql);

$sql = "SELECT sum(fine) as totalfine FROM issued WHERE rollno = '$roll_no'";
$fine = $hostel->query($sql);

$fine = $fine->fetch_assoc();
$fine = $fine['totalfine']
?>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<div class="row">
	<?php  if(isset($_SESSION['userId'])) { ?>
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				
				<a href="brand.php" style="text-decoration:none;color:black;">
					Item Available
					<span class="badge pull pull-right"><?php echo $countAvailable; ?></span>
				</a>
				
			</div>
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<a href="brand.php" style="text-decoration:none;color:black;">
					Items under Repair
					<span class="badge pull pull-right"><?php echo $countRepair; ?></span>
				</a>
				
			</div>
		</div>
	</div>
	
	
	<?php } ?>  
		<div class="col-md-4">
			<div class="panel panel-info">
			<div class="panel-heading">
				<a href="brand.php?o=manord" style="text-decoration:none;color:black;">
					Total Items
					<span class="badge pull pull-right"><?php echo $countTotal; ?></span>
				</a>
					
			</div>
		</div>
		</div>

	

	<div class="col-md-4">
		<div class="card">
		  <div class="cardHeader">
		    <h1><?php echo date('d'); ?></h1>
		  </div>

		  <div class="cardContainer">
		    <p><?php echo date('l') .' '.date('d').', '.date('Y'); ?></p>
		  </div>
		</div> 
		<br/>

		<div class="card">
		  <div class="cardHeader" style="background-color:#245580;">
              <?php echo $fine; ?>
		  </div>

		  <div class="cardContainer">
		    <p> Total Fine</p>
		  </div>
		</div> 

	</div>
	
	<?php  if(isset($_SESSION['userId'])) { ?>
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading"> <i class="glyphicon glyphicon-calendar"></i> You Issued Items</div>
			<div class="panel-body">
				<table class="table" id="productTable">
			  	<thead>
			  		<tr>			  			
			  			<th style="width:20%;">Name</th>
                        <th style="width:20%;">Date of Issue</th>
			  			<th style="width:20%;">Fine</th>
			  		</tr>
			  	</thead>
			  	<tbody>
					<?php while ($issued = $query->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $issued['name']?></td>
                            <td><?php echo $issued['dateofissue']?></td>
							<td><?php echo $issued['fine']?> Rs</td>

						</tr>

					<?php } ?>
				</tbody>
				</table>
				<!--<div id="calendar"></div>-->
			</div>	
		</div>
		
	</div> 
	<?php  } ?>
	
</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>


<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'
        }
      });


    });
</script>

<?php require_once 'includes/footer.php'; ?>
