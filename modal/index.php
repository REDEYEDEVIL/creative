<?php
include('include/index.php')
?>

<section class="ftco-section ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(assets/images/image_login.png);"></div>
                    <div class="login-wrap p-4 p-md-5 d-flex flex-column justify-content-center ">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4 ">Sign In</h3>
                            </div>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label class="label" for="name">Username</label>
                                <input type="text" class="form-control nospace" placeholder="Username" id="email" name="email">
                                <div id="reg1" style="color:red; text-align: left; font-size:13px;"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control nospace" placeholder="Password" id="password" name="password">
                                <div id="reg2" style="color:red; text-align: left; font-size:13px;"></div>
                            </div>
                            <div><?Php echo $msg ;?></div>
                            <div class="form-group">
                                <button type="submit" class="form-control   submit px-3" id="loginsubmit" name="submit">Sign In</button>
                                <!-- <input type="submit" style="width:100%;" class="btn btn-primary" value="Sign me in" > -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>