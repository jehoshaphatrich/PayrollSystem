<!-- Add -->
<div class="modal modal-xl fade" id="scan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Scan Employee QRCODE</b></h4>
          	</div>
          	<div class="modal-body">
              <form id="attendanceqr">
        <select class="form-control mb-1" name="status">
          <option value="in">Time In</option>
          <option value="out">Time Out</option>
        </select>
        <main>
          <div id="reader"></div>
          <div id="result"></div>
        </main>
		</form>

          	</div>
		        <div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>

          	</div>
        </div>
    </div>
</div>



<div class="modal fade" id="timein">
    <div class="modal-dialog ">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Time in Employee</b></h4>
          	</div>
          	<div class="modal-body">
              <form id="attendance">
          <div class="form-group">
            <select class="form-control" name="status">
              <option value="in">Time In</option>
              <option value="out">Time Out</option>
            </select>
          </div>
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control input-lg" id="employee" name="employee" required>
        		<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      		</div>

          	</div>
		        <div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-sign-in"></i> Sign In</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Attendance</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="attendance_add.php">
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Employee ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="employee" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Date</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="date" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="time_in" class="col-sm-3 control-label">Time In</label>

                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
                    		<input type="text" class="form-control timepicker" id="time_in" name="time_in">
                    	</div>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="time_out" class="col-sm-3 control-label">Time Out</label>

                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
                    		<input type="text" class="form-control timepicker" id="time_out" name="time_out">
                    	</div>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="attendance_edit.php">
            		<input type="hidden" id="attid" name="id">
                <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">Date</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_edit" name="edit_date">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="edit_time_in" class="col-sm-3 control-label">Time In</label>

                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
                    		<input type="text" class="form-control timepicker" id="edit_time_in" name="edit_time_in">
                    	</div>
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="edit_time_out" class="col-sm-3 control-label">Time Out</label>

                  	<div class="col-sm-9">
                  		<div class="bootstrap-timepicker">
                    		<input type="text" class="form-control timepicker" id="edit_time_out" name="edit_time_out">
                    	</div>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="attendance_date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="attendance_delete.php">
            		<input type="hidden" id="del_attid" name="id">
            		<div class="text-center">
	                	<p>DELETE ATTENDANCE</p>
	                	<h2 id="del_employee_name" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     