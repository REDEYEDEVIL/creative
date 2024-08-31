<?php
include('include/gallerycategory.php');
?>

    <div class="page-wrapper">
        <div class="p-3" >
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-dark"><strong>Category</strong></h5>

                            <form method="post" id="aboutForm" role="form" enctype="multipart/form-data"
                                style="border-top: 1px solid #cfcfcf;">
                                <div class="card-body p-1 mt-2">
                                    <!-- gallerycategory Section -->
                                     <div class="row">
                                   
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <label for="gallerycategoryTitle" class="text-dark-50">Category
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="catName"
                                                    id="catName" value="<?php echo $catName; ?>"
                                                    placeholder="Enter Category Title. . . . .">
                                                <h6 class="err text-danger" id="err"></h6>
                                            </div>
                                        </div>
                                     

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gallerycategoryImages" class="form-label">Image<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-controlfile" type="file" name="file"
                                                    id="name">
                                                    <?php
                                                    if ($filepath != '') {
                                                        echo '<img src="' . $path . $filepath . '" alt="Image Description" width="25%;" />';
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                       
                                

                                       
                                   



                                    </div>
                                    <div class="form-group row mr-1 justify-content-end">
                                        <input type="hidden" class="form-control" id="eid" name="eid" value="<?php echo $eid; ?>">
                                        <input type="hidden" value="<?php echo $filepath; ?>" name="filepath">
                                        <button type="submit" name="submit" class="btn col-2 btn-primary btn-sm btn-block" id="submit">Submit</button>
                                            <?php //} ?>
                                            <a href="gallerycategory.php" name="cancel" class=" col-2 ml-1 btn btn-danger">Cancel</a>
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
                            $x = mysqli_num_rows(mysqli_query($sql, "SELECT * from `gallery_category` where deleted = 0"));
                            ?>
                            <h5 class="text-dark" style="border-bottom: 1px solid #cfcfcf;padding-bottom:5px ; ">
                                <strong>Category List (<span id="roleCount"><?php echo $x; ?></span>)</strong>
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
