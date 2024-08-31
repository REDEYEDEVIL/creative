<?php
include('include/partners.php');
?>



<div class="page-wrapper">
    <div class="p-3" >
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-dark"><strong>Partners</strong></h5>

                        <form method="post" id="aboutForm" role="form" enctype="multipart/form-data"
                            style="border-top: 1px solid #cfcfcf;">
                            <div class="card-body p-1 mt-2">
                                <!-- partners Section -->


                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label for="partnersTitle" class="text-dark-50">Partners
                                            Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="partnersName" id="partnersName"required
                                            value="<?php echo $partnersName; ?>"
                                            placeholder="Enter partners Title. . . . .">
                                        <h6 class="err text-danger" id="err"></h6>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="partnersImages" class="form-label">Image<span
                                                class="text-danger">*</span></label>
                                        <input class="form-controlfile" type="file" name="file" id="name" >
                                        <?php
                                        if ($filepath != '') {
                                            echo '<img src="' . $path . $filepath . '" alt="Image Description" width="25%;" />';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Short Description </label>
                                        <textarea class="form-control" placeholder="" id="shrt_desc" name="shrt_desc" rows="5">
                                            <?php echo $shrt_desc; ?></textarea>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Description</label>
                                        <textarea class="form-control" placeholder="" id="ckeditor" name="desc" rows="8">
                                            <?php echo $desc; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mr-1 justify-content-end">
                                    <input type="hidden" class="form-control" id="eid" name="eid" value="<?php echo $eid; ?>">

                                    <input type="hidden" value="<?php echo $filepath; ?>" name="filepath">
                                    <button type="submit" name="submit"
                                        class="btn col-2 btn-primary btn-sm btn-block">Submit</button>
                                    <a href="partners.php" name="cancel" class=" col-2 ml-1 btn btn-danger">Cancel</a>
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
                        $x = mysqli_num_rows(mysqli_query($sql, "SELECT * from `partners` where deleted = 0"));
                        ?>
                        <h5 class="text-dark" style="border-bottom: 1px solid #cfcfcf;padding-bottom:5px ; ">
                            <strong>Partners List (<span id="roleCount"><?php echo $x; ?></span>)</strong>
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

<!-- CKEditor Initialization -->

<!-- CKEditor Initialization -->



<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#ckeditor1'))
        .create(document.querySelector('#shrt_desc'))
        .then(editor => {
            editor.editing.view.change(writer => {
                writer.setStyle(
                    'height',
                    '120px',  // This value is approximate for 6 rows. Adjust as needed.
                    editor.editing.view.document.getRoot()
                );
            });
        })
        .catch(error => {
            console.error(error);
        });
</script>