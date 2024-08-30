<?php
include('include/Primary.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us Form</title>
    <!-- Include CKEditor CSS (optional, if needed) -->

</head>

<body>
    <div class="page-wrapper">
        <div class="p-3" style="height: 100vh !important; width: 100%;">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-dark"><strong>Primary</strong></h5>

                            <form method="post" id="aboutForm" role="form" enctype="multipart/form-data"
                                style="border-top: 1px solid #cfcfcf;">
                                <div class="card-body p-1 mt-2">
                                    <!-- Primary Section -->

                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="PrimaryTitle" class="text-dark-50">Primary Title<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="PrimaryTitle"
                                                    id="PrimaryTitle" value=""
                                                    placeholder="Enter Primary Title. . . . .">
                                                <h6 class="err text-danger" id="err"></h6>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="PrimaryImages" class="form-label">Multiple Images<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="file" name="PrimaryImages[]"
                                                    id="PrimaryImages" multiple>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="backgroundColor" class="text-dark-50">Background Color<span
                                                        class="text-danger">*</span></label>
                                                <input type="color" class="form-control" name="backgroundColor"
                                                    id="backgroundColor" value="#ffffff">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sectionSequence" class="text-dark-50">Section Sequence<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="sectionSequence"
                                                    id="sectionSequence" value="1" min="1">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Primary Description</label>
                                                <textarea class="form-control" placeholder="" id="PrimaryDescription"
                                                    name="Primarydescription" rows="8"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mr-1 justify-content-end">
                                        <input type="hidden" class="form-control" id="eid" name="eid" value="">
                                        <button type="submit" name="submit"
                                            class="btn col-2 btn-primary btn-sm btn-block">Submit</button>
                                    </div>
                                    <div class="text-danger"></div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $x = mysqli_num_rows(mysqli_query($sql, "SELECT * from `awt_role` where deleted = 0"));
                            ?>
                            <h5 class="text-dark" style="border-bottom: 1px solid #cfcfcf;padding-bottom:5px ; ">
                                <strong>Primary List (<span id="roleCount"><?php echo $x; ?></span>)</strong>
                            </h5>
                            <table width="100%" class="table table-striped align-baseline table-bordered table-sm"
                                id="myTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th style="width: 70%;">Title</th>
                                        <th style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="roleTableBody">
                                    <?php tablerow($sql); ?>


                                </tbody>
                            </table>
                            <div style="font-size: 14px; color: red;">
                                <p><?php echo $msg; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </form>
   <!-- CKEditor Initialization -->
  
    <!-- CKEditor Initialization -->
<script>
    CKEDITOR.replace('PrimaryDescription');
   
</script>

