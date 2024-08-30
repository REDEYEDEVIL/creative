<?php
include('include/contactus.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>contactus</title>
    <!-- Include CKEditor CSS (optional, if needed) -->
  
</head>

<body>
    <div class="page-wrapper">
        <div class="p-3" style="height: 100vh !important; width: 100%;">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-dark"><strong>Contact Us</strong></h5>

                            <form method="post" id="aboutForm" role="form" enctype="multipart/form-data"
                                style="border-top: 1px solid #cfcfcf;">
                                <div class="card-body p-1 mt-2">
                                    <!-- contactus Section -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" placeholder="" id="partnersDescription"
                                                    name="partnersdescription" rows="8"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email<span class="red">*</span></label>
                                                <input type="text" placeholder="Enter ..." id="email" required
                                                    class="form-control nospace" />
                                                <div id="emsg"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Phone Number </label>
                                                <input type="text" placeholder="Enter ..." id="mobile2"
                                                   
                                                    class="form-control onlynumber" />
                                                <div id="mmsg"></div>
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
            </div>
        </div>

    </div>
    </form>
    <!-- CKEditor Initialization -->

    <!-- CKEditor Initialization -->
    <script>
        CKEDITOR.replace('contactusDescription');
    </script>