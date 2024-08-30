<?php
include('include/edit.php');
?>

<div class="container-fluid p-0 ">
    <div class="card m-3 row">
        <div class=" card-body col-12">
            <h5 class=" text-dark"><strong>Customer </strong></h5>

            <form id="customerForm" method="POST" enctype="multipart/form-data" style="margin: 1px;border-top: 1px solid black ; padding-top:15px;">

                <div class="form-group">
                    <label class="text-dark" for="companyName">Company Name<span style="color: red;">*</span></label>
                    <input value="<?php echo $companyName; ?>" type="text" class="form-control" id="companyName" name="companyName">
                    <span class="error" id="companyNameError"><?php echo $companyNameError ; ?></span>
                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <label class="text-dark" for="email">Email<span style="color: red;">*</span><span style="color: blue;"> (This will use as username)</span></label>
                        <input value="<?php echo $email; ?>" type="email" class="form-control" id="email" name="email">
                        <span class="error" id="emailError"><?php echo $emailError ; ?></span>
                    </div>

                    <div class="form-group col-4">
                        <label class="text-dark" for="mobileNo">Mobile No.<span style="color: red;">*</span></label>
                        <input value="<?php echo $mobileNo; ?>" type="text" class="form-control" id="mobileNo" name="mobileNo">
                        <span class="error" id="mobileNoError"><?php echo $mobileNoError ; ?></span>
                    </div>
                    <div class="form-group col-4">
                        <label class="text-dark" for="gstNo">GST No. </label>
                        <input value="<?php echo $gstNo; ?>" type="text" class="form-control" id="gstNo" name="gstNo" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$">                        <span class="error" id="gstNoError"><?php echo $gstNoError ; ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-dark" for="address">Address<span style="color: red;">*</span></label>
                    <textarea class="form-control"  id="address" name="address" rows="3"><?php echo $address; ?></textarea>
                    <span class="error" id="addressError"><?php echo $addressError ; ?></span>
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <label class="text-dark" for="state">State<span style="color: red;">*</span></label>
                        <select class="form-control" id="state" name="state">
                          <option value="0">Select the State</option>
                          <?php state($sql,$state);?>
                        </select>
                        <span class="error" id="stateError"><?php echo $stateError ; ?></span>
                    </div>
                    <div class="form-group col-3">
                        <label class="text-dark" for="city">City<span style="color: red;">*</span></label>
                        <input value="<?php echo $city; ?>" type="text" class="form-control" id="city" name="city">
                        <span class="error" id="cityError"><?php echo $cityError ; ?></span>
                    </div>
                    <div class="form-group col-3">
                        <label class="text-dark" for="pincode">Pincode<span style="color: red;">*</span></label>
                        <input value="<?php echo $pincode; ?>" type="text" class="form-control" id="pincode" name="pincode">
                        <span class="error" id="pincodeError"><?php echo $pincodeError ; ?></span>
                    </div>
                    <div class="form-group col-3">
                        <label class="text-dark" for="password">Password<span style="color: red;">*</span></label>
                        <input  type="password" class="form-control" id="password" name="password">
                        <span class="error" id="passwordError"><?php echo $passwordError ; ?></span>
                    </div>
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-primary"">Submit</button>
         </form>
        </div>
    </div>
</div>
