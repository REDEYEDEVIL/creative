<?php
include('include/about_us.php');
?>
<!-- <!DOCTYPE html> -->
<!-- <html lang="en"> -->

<!-- <body> -->
<div class="page-wrapper">
  <div class="p-3">
    <div class="row ">
      <div class="col-md-6 ">
        <div class="card">
          <div class="card-body">
            <h5 class="text-dark"><strong>About Us</strong></h5>

            <form method="post" id="aboutForm" role="form" enctype="multipart/form-data" style="border-top: 1px solid #cfcfcf;">
              <div class="card-body p-1 mt-2">
                <!-- BreadCrumb Section -->
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="aboutName" class="text-dark-50">BreadCrumb Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="aboutName" id="aboutName" value="" placeholder="Enter your Title. . . . .">
                    <h6 class="err text-danger" id="err"></h6>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group" style="position:relative;">
                    <label for="breadcrumbImage" class="form-label">Breadcrumb Image<span class="text-danger">*</span></label>
                    <input class="form-control-file" type="file" name="file" id="breadcrumbImage">
                    <?php
                    if ($filepath != '') {
                      echo '<img src="' . $path . $filepath . '" alt="Image Description" width="100%;" />';
                    }
                    ?>
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group row mr-1 justify-content-end">
                  <input type="hidden" class="form-control" id="eid" name="eid" value="">
                  <button type="submit" name="submit" class="btn col-3 btn-primary btn-sm btn-block">Submit</button>
                </div>
                <div class="text-danger"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Vision Section -->
      <!-- <div class="row"> -->
      <div class="col-md-6 ">
        <div class="card">
          <div class="card-body">
            <h5 class="text-dark"><strong>Vision</strong></h5>
            <div class="card-body p-1 mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="visionTitle" class="text-dark-50">Vision Title<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="visionTitle" id="visionTitle" value="" placeholder="Enter Vision Title. . . . .">
                  <h6 class="err text-danger" id="err"></h6>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Vision Description</label>
                  <textarea class="form-control" placeholder="" id="visionDescription" name="visiondescription" rows="8"><?php echo $description; ?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group" style="position:relative;">
                  <label for="visionImage" class="form-label">Vision Image<span class="text-danger">*</span></label>
                  <input class="form-control" type="file" name="file" id="visionImage">
                  <?php
                  if ($filepath != '') {
                    echo '<img src="' . $path . $filepath . '" alt="Image Description" width="100%;" />';
                  }
                  ?>
                </div>
              </div>
              <div class="form-group row mr-1 justify-content-end">
                  <input type="hidden" class="form-control" id="eid" name="eid" value="">
                  <button type="submit" name="submit" class="btn col-3 btn-primary btn-sm btn-block">Submit</button>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Mission Section -->
      <div class="col-md-6 ">
        <div class="card">
          <div class="card-body">
            <h5 class="text-dark"><strong>Mission</strong></h5>
            <div class="card-body p-1 mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="missionTitle" class="text-dark-50">Mission Title<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="missionTitle" id="missionTitle" value="" placeholder="Enter Mission Title. . . . .">
                  <h6 class="err text-danger" id="err"></h6>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Mission Description</label>
                  <textarea class="form-control" placeholder="" id="missionDescription" name="missiondescription" rows="8"><?php echo $description; ?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group" style="position:relative;">
                  <label for="missionImage" class="form-label">Mission Image<span class="text-danger">*</span></label>
                  <input class="form-control" type="file" name="file" id="missionImage">
                  <?php
                  if ($filepath != '') {
                    echo '<img src="' . $path . $filepath . '" alt="Image Description" width="100%;" />';
                  }
                  ?>
                </div>
              </div>
              <div class="form-group row mr-1 justify-content-end">
                  <input type="hidden" class="form-control" id="eid" name="eid" value="">
                  <button type="submit" name="submit" class="btn col-3 btn-primary btn-sm btn-block">Submit</button>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>
<!-- </body> -->
<!-- CKEditor Initialization -->
<script>
  CKEDITOR.replace('visionDescription');
  CKEDITOR.replace('missionDescription');
</script>
