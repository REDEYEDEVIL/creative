<?php
include('include/master.php');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

?>

<div class="container-fluid row p-0 m-1 ">
  <div class="col-6">
    <div class=" card m-1 p-1 col-12 ">
      <div class="  card-body col-12">
        <h5 class=" text-dark"><strong>Customer </strong></h5>
        <form id="customerForm" method="POST" enctype="multipart/form-data" style="margin: 1px;border-top: 1px solid black ; padding-top:15px;">

          <div class="form-group">
            <label class="text-dark" for="companyName">Company Name<span style="color: red;">*</span></label>
            <input value="<?php echo $companyName; ?>" type="text" class="form-control" id="companyName" name="companyName">
            <span class="error" id="companyNameError"><?php echo $companyNameError; ?></span>
          </div>
          <div class="form-row">
            <div class="form-group col-4">
              <label class="text-dark" for="email">Email<span style="color: red;">*</span><span style="color: blue;"> (This will use as username)</span></label>
              <input value="<?php echo $email; ?>" type="email" class="form-control" id="email" name="email">
              <span class="error" id="emailError"><?php echo $emailError; ?></span>
            </div>

            <div class="form-group col-4">
              <label class="text-dark" for="mobileNo">Mobile No.<span style="color: red;">*</span></label>
              <input value="<?php echo $mobileNo; ?>" type="text" class="form-control" id="mobileNo" name="mobileNo">
              <span class="error" id="mobileNoError"><?php echo $mobileNoError; ?></span>
            </div>
            <div class="form-group col-4">
              <label class="text-dark" for="gstNo">GST No.</label>
              <input value="<?php echo $gstNo; ?>" type="text" class="form-control" id="gstNo" name="gstNo">
              <span class="error" id="gstNoError"><?php echo $gstNoError; ?></span>
            </div>
          </div>
          <div class="form-group">
            <label class="text-dark" for="address">Address<span style="color: red;">*</span></label>
            <textarea class="form-control" id="address" name="address" rows="3"><?php echo $address; ?></textarea>
            <span class="error" id="addressError"><?php echo $addressError; ?></span>
          </div>
          <div class="form-row">
            <div class="form-group col-3">
              <label class="text-dark" for="state">State<span style="color: red;">*</span></label>
              <select class="form-control" id="state" name="state">
                <option value="0">Select the State</option>
                <?php state($sql, $state); ?>
              </select>
              <span class="error" id="stateError"><?php echo $stateError; ?></span>
            </div>
            <div class="form-group col-3">
              <label class="text-dark" for="city">City<span style="color: red;">*</span></label>
              <input value="<?php echo $city; ?>" type="text" class="form-control" id="city" name="city">
              <span class="error" id="cityError"><?php echo $cityError; ?></span>
            </div>
            <div class="form-group col-3">
              <label class="text-dark" for="pincode">Pincode<span style="color: red;">*</span></label>
              <input value="<?php echo $pincode; ?>" type="text" class="form-control" id="pincode" name="pincode">
              <span class="error" id="pincodeError"><?php echo $pincodeError; ?></span>
            </div>
            <div class="form-group col-3">
              <label class="text-dark" for="password">Password<span style="color: red;">*</span></label>
              <input type="password" class="form-control" id="password" name="password">
              <span class="error" id="passwordError"><?php echo $passwordError; ?></span>
            </div>
          </div>
          <input type="hidden" name="eid" value="<?php echo $eid; ?>">
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                    <button type=" button" onclick="window.location.href='customer_master_list.php'" name="cancel" id="cancel" class="btn btn-danger"">Cancel</button>
                </form>
                <div style=" color: red;"><?php echo $msg;  ?>
      </div>
    </div>
  </div>
</div>

<div class=" col-6">
  <div class=" card mt-1 p-0 col-12 ">
    <div class=" card-body col-12">
      <div class="row " style=" border-bottom: 1px solid black ; padding-bottom :7px; margin-bottom: 7px; ">
        <h5 class=" text-dark col-8"><strong>Contact Person</strong></h5>
        <div class="col-4 d-flex justify-content-end ">
          <button class="btn btn-primary text-white " style="font-size: 12px;" onclick="changesit()">Add Contact Person</button>
        </div>
      </div>
      <div id="displayfeild">
        <table width="100%" class="table mt-3 table-bordered table-sm   " id="myTable">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th style="width: 50%;">Name</th>
              <th>Mobile</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="customerTableBody" class="text-left">
            <!-- Sample Data -->

            <?php makerow($sql, $eid); ?>



          </tbody>
        </table>
      </div>
      <div id="input_field" style="display: none;">
        <form type="form" method="POST" enctype="multipart/form-data">

          <div class="row">
            <div class="form-group col-6">
              <label class="text-dark" for="name">Name</label>
              <input value="<?php echo $cu_name; ?>" type="text" class="form-control" id="name" name="name">
              <span class="error" id="nameError"></span>
            </div>
            <div class="form-group col-6">
              <label class="text-dark" for="mobile">Mobile</label>
              <input value="<?php echo $mobiles; ?>" type="text" class="form-control" id="mobile" name="mobiles">
              <span class="error" id="mobileError"></span>
            </div>
            <div class="form-group col-6">
              <label class="text-dark" for="email">Email</label>
              <input value="<?php echo $emails; ?>" type="email" class="form-control" id="email" name="email">
              <span class="error" id="emailError"></span>
            </div>
            <div class="form-group col-6">
              <label class="text-dark" for="Role">Role</label>
              <input value="<?php echo $role; ?>" type="text" class="form-control" id="Role" name="role">
              <span class="error" id="roleError"></span>
            </div>
            <div class="form-group col-12">
              <input type="hidden" value="<?php echo $eid; ?>" name="eid">
              <input type="hidden" value="<?php echo $ecid; ?>" name="ecid">
              <button class="btn  btn-primary" name="contact_no" onclick="changesit()">Add</button>
            </div>
          </div>
        </form>
      </div>
      <div style="color: red;"><?php echo $msge;  ?></div>

    </div>


  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title"><strong>Projects</strong></h5>
      <div class="table-responsive" style="border-top: 1px solid black ; padding-top:5px; margin-top: 2px; ">
        <table class="table  table-sm table-bordered   ">
          <thead>
            <tr>
              <th width="5%">#</th>
              <th width="65%">Project Name</th>
              <th width="30%">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php getrow($sql,$eid); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
