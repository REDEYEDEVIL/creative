<?php
include('include/role_master.php');
?>

<div class="page-wrapper">
  <div class="p-3" style="height: 100vh !important; width: 100%; ">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card_body">
            <form class="d-flex align-items-center">
              <div class="form-group col-md-8 m-3">
                <input type="text" class="form-control" name="roleName" id="roleName" placeholder="Enter Creative name to search......" name="roleName">
              </div>
              <div class="from-group">
                <button type="submit" name="search" class="btn btn-primary">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-body p-2">
            <i class="m-0 pl-3">1 Result Found</i>
          </div>
        </div>
        <div class="card  mb-4">
          <div class="card-body d-flex align-items-center">
            <div class="col-md-9 ">
              <h4 class="mb-3"><strong>Office Renovation</strong></h4>
              <p><strong>Project Information:</strong> <br><span>We have to create a poster for office.</span></p>
              <p><strong>File Path: </strong>assets\images\users\1.jpg </p>
              <!-- <p><strong>Creative-type:</strong> Abstract, Graffiti</p> -->
              <!-- <p><strong>Project-type:</strong> Space Design</p> -->
              <button class="btn btn-primary mt-2">View</button>
            </div>
            <div class="col-md-3 text-center">
              <img src="assets/images/BANNER1.png" width="70%" class="img-fluid rounded" style="border: 2px solid #343a40;" alt="Banner">
            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
</div>
