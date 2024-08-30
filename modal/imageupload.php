<?php
include('include/imageupload.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>imageupload</title>
    <!-- Include CKEditor CSS (optional, if needed) -->

</head>

<body>
    <div class="page-wrapper">
        <div class="p-3" style="height: 100vh !important; width: 100%;">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-dark"><strong>Upload Images</strong></h5>

                            <form method="post" id="aboutForm" role="form" enctype="multipart/form-data"
                                style="border-top: 1px solid #cfcfcf;">
                                <div class="card-body p-1 mt-2">
                                    <!-- imageupload Section -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category">Category<span class="text-danger"></span>
                                                </label><br>
                                                <select name="category" id="category"
                                                    placeholder="Select category" class="form-control">
                                                    <option value="">Select Category</option>
                                                    <?php getgallery_category($sql, $gallery_category); ?>
                                                    <div id="category_err" class="errordiv text-danger"></div>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subcategory">Sub-Category<span class="text-danger"></span>
                                                </label><br>
                                                <select name="subcategory" id="subcategory"
                                                    placeholder="Select subcategory" class="form-control">
                                                    <option value="">Select Sub-Category</option>
                                                    <?php getgallery_subcategory($sql, $gallery_subcategory); ?>
                                                    <div id="subcategory_err" class="errordiv text-danger"></div>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="imageuploadImages" class="form-label">Multiple Images<span
                                                        class="text-danger">*</span></label>
                                                <input class="form-controlfile" type="file" name="file" id="name"
                                                    multiple>
                                                <?php
                                                if ($filepath != '') {
                                                    echo '<img src="' . $path . $filepath . '" alt="Image Description" width="100%;" />';
                                                }
                                                ?>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group row mr-1 justify-content-end">
                                        <input type="hidden" class="form-control" id="eid" name="eid"
                                            value="<?php echo $eid; ?>">
                                        <input type="hidden" value="<?php echo $filepath; ?>" name="filepath">
                                        <button type="submit" name="submit"
                                            class="btn col-2 btn-primary btn-sm btn-block">Submit</button>
                                        <a href="imageupload.php" name="cancel"
                                            class=" col-2 ml-1 btn btn-danger">Cancel</a>
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
                                <strong>Images List (<span id="roleCount"><?php echo $x; ?></span>)</strong>
                            </h5>
                            <table width="100%" class="table table-striped align-baseline table-bordered table-sm"
                                id="myTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th style="width: 10%;">Category</th>
                                        <th style="width: 10%;">Sub-category</th>
                                        <th style="width: 70%;">Images</th>
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
        CKEDITOR.replace('imageuploadDescription');
    </script>

    <script>

    </script>