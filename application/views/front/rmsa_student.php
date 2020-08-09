<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Student List</h1> 

        <div class="form-group">                
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <br>
                    Class :
                    <select type="text" class="form-control" id="class">
                        <option class="" value="">------ Select ------</option>
                        <option value="ix">Class IX</option>
                        <option value="x">Class X</option>
                        <option value="xi">Class XI</option>
                        <option value="xii">Class XII</option>
                    </select>
                </div>
                <div class="col-md-4 col-xs-6">
                    <br>
                    Stream :
                    <select class="form-control" name="rmsa_stream_code" required="" id="rmsa_stream_code" data-bv-field="rmsa_stream_code">
                        <option class="" value="" disabled="" selected="">------ Select ------</option>
                        <option value="ARTS">ARTS</option>
                        <option value="MEDICAL">MEDICAL</option>
                        <option value="NON-MEDICAL">NON-MEDICAL</option>
                        <option value="COMMERCE">COMMERCE</option>
                        <option value="MED-NONMED">MED-NONMED</option>
                        <option value="NO-STREAM">NO-STREAM</option>
                    </select>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <br>
                    <br>                        
                    <button class="btn btn-primary col-xs-12" id="searchTag">Search</button>
                </div>
                <div class="col-sm-2 col-xs-6">  
                    <br>
                    <br>
                    <button class="btn btn-danger col-xs-12" id="searchTagClear">Clear</button>
                </div>
            </div> 
        </div> 

        <hr>
        <a href="<?php echo RMSA_STUDENT_REGISTER_LINK; ?>" class="btn btn-primary btn-sm"  id="searchTag" style="float: right;color:#fff"><i class="fa fa-plus"> </i> Add Student</a>
        <br>
        <hr>                            
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Index</th>
                    <th>Roll Number</th>            
                    <th>Name</th>
                    <th>School Name</th>
                    <th>District</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Email Status</th>
                    <th>Status</th>
                    <th>Locked</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Index</th>
                    <th>Roll Number</th>            
                    <th>Name</th>
                    <th>School Name</th>
                    <th>District</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Email Status</th>
                    <th>Status</th>
                    <th>Locked</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

