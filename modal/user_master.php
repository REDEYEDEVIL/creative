<?php
include('include/user_master.php')
?>

<div class="page-wrapper">
    <div class="p-3">
        <div class="row">
            <div id="informationform" style="display: none;">
                <div class="card col-12 p-0">
                    <div class="card-body " >
                        <div style="margin: 1px; border-bottom: 1px solid #cfcfcf; margin-bottom: 15px;" class="pages-title">
                            <h5 class="row text-dark"><strong>Add User</strong></h5>
                        </div>
                        <div style="margin: 1px;">
                            <form class="row" action=""  method="POST" enctype="multipart/form-data" id="userForm" style="margin: 1px;">
                                <div class="form-group col-md-3">
                                    <label class="text-dark" for="firstName">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName" value="<?php echo $firstName; ?>" name="firstName">
                                    <div id="firstNameError" style="color: red;"><?php echo $firstNameError ;?></div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="text-dark" for="lastName">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lastName" value="<?php echo $lastName; ?>" name="lastName">
                                    <div id="lastNameError" style="color: red;"><?php echo $lastNameError ;?></div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="text-dark" for="emailId">Email ID <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="emailId" value="<?php echo $emailId; ?>" name="emailId">
                                    <div id="emailIdError" style="color: red;"><?php echo $emailIdError ;?></div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="text-dark" for="mobileNo">Mobile No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="mobileNo" value="<?php echo $mobileNo; ?>" name="mobileNo">
                                    <div id="mobileNoError" style="color: red;"><?php echo $mobileNoError ;?></div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="text-dark" for="password">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" value="<?php echo $npassword; ?>" name="password">
                                    <div id="passwordError" style="color: red;"><?php echo $passwordError ;?></div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="text-dark" for="reportto">Report TO</label>
                                 <select class="form-control" id="reportto" name="reportto">
                                       <?php reportto($sql , $reportto) ?>
                                    </select>
                                    <div id="reporttoEERRO" style="color: red;"><?php echo $reporttoError ;?></div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="text-dark" for="role">Role <span class="text-danger">*</span></label>
                                    <select class="form-control" id="role" name="role">
                                       <?php role($sql , $role) ?>
                                    </select>
                                    <div id="roleError" style="color: red;"><?php echo $roleError ;?></div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="text-dark" for="pimg">Profile Icon </label>

                                    <input type="file" class="form-control" name="pimg" >

                                    <div id="pimgError" style="color: red;"><?php echo $pimgError ;?></div>
                                    <?php
                                    if ($filepath) {
                                        echo '<img src="upload/profile_img/' . $filepath . '" width="100px">';
                                    }
                                    ?>
                                </div>
                                <div style="color: red;" ><?php echo $msg ?></div>
                                <div class="form-group col-12 d-flex justify-content-end">
                                    <input type="hidden" name="mdpss" value="<?php echo  $mdpss;?>">
                                    <input type="hidden" name="filepath" value="<?php echo  $filepath;?>">
                                    <input type="hidden" name="eid" value="<?php echo  $id;?>">
                                    <button type="submit" style="width: 100px;" name="submit" id="submit" class="btn  btn-sm btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="informationtable">
                <div class="card col-12 p-0">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-10 d-flex align-items-center">
                                <h5 class="text-dark"><strong>Users List</strong></h5>
                            </div>
                            <div class="col-2 d-flex justify-content-end">
                                <button class="btn btn-primary m-2" id="adduser" onclick="changesit()">Add User</button>
                            </div>
                        </div>
                        <div class="table-responsive" style="border-top: 1px solid #cfcfcf ;padding: 10px 14px;">
                            <table width="100%" class="table table-striped  table-bordered table-sm" id="myTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-left" style="width: 20%;">Name</th>
                                        <th class="text-left">Email ID</th>
                                        <th class="text-left">Mobile No.</th>
                                        <th class="text-left">Role</th>
                                        <th class="text-left">Status</th>
                                        <th class="text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="userTableBody">
                                   <?php tablerow($sql); ?>
                                </tbody>
                            </table>
                        </div>
                        <div style="color:red;"><?php echo $msg;  ?></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
