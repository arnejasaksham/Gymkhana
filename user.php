<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Students</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Students</div>
			</div> 
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addUserModalBtn" data-target="#addUserModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Student </button>
				</div> 
				
				<table class="table" id="manageUserTable">
					<thead>
						<tr>
							<th style="width:10%;">Roll</th>
							<th style="width:15%;">Name</th>
							<th style="width:15%;">Email</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>

			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitUserForm" action="php_action/createUser.php" method="POST">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add User</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-user-messages"></div>
	      		     	           	       
	        <div class="form-group">
	        	<label for="uroll" class="col-sm-3 control-label">Roll: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="uroll" placeholder="Roll No of the Student" name="uroll" autocomplete="off">
				    </div>
	        </div> 

	        <div class="form-group">
	        	<label for="uname" class="col-sm-3 control-label">Name: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="uname" placeholder="Name of the Student" name="uname" autocomplete="off">
				    </div>
	        </div> 

	        <div class="form-group">
	        	<label for="uemail" class="col-sm-3 control-label">Email: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="uemail" placeholder="Email of th Student" name="uemail" autocomplete="off">
				    </div>
	        </div> 	

	        <div class="form-group">
	        	<label for="upass" class="col-sm-3 control-label">Password: </label>
	        	
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="upass" placeholder="Initial Password" value="password" name="upass" autocomplete="off">
				    </div>
	        </div> 	

	        <div class="form-group">
	        	<label for="uhostel" class="col-sm-3 control-label">Hostel: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="uhostel" placeholder="Hostel of Student" name="uhostel" autocomplete="off">
				    </div>
	        </div> 	                         
	        	         	        
	      </div> 
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> 
     	</form> 
    </div> 
  </div> 
</div> 


<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
    	<form class="form-horizontal" id="editUserForm" action="php_action/editUser.php" method="POST">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-edit"></i> Edit User</h4>
			</div>

	      	<div class="modal-body" style="max-height:450px; overflow:auto;">

		    	<div id="edit-user-messages"></div>

		    	<div class="form-group">
	        		<label for="edituserName" class="col-sm-3 control-label">User Name: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="edituserName" placeholder="New User Name" name="edituserName" autocomplete="off">
				    </div>
	        	</div> 
		        <div class="form-group">
		        	<label for="editPassword" class="col-sm-3 control-label">Password: </label>
		        	
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="editPassword" placeholder="New Password" value="password" name="editPassword" autocomplete="off">
					    </div>
		        </div> 
		        <div class="form-group">
		        	<label for="editEmail" class="col-sm-3 control-label">Email: </label>
		        	
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="editEmail" placeholder="New Email" name="editEmail" autocomplete="off">
					    </div>
		        </div> 		        

		        <div class="modal-footer editUserFooter">
			        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
			        
			        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
			    </div> 

			</div>

		</form>
				    
	</div>

</div>
</div> 

<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove User</h4>
      </div>
      <div class="modal-body">

      	<div class="removeUserMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div>
  </div>
</div>



	<script src="custom/js/user.js"></script>

<?php require_once 'includes/footer.php'; ?>