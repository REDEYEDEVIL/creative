<?php
$per_name = '';
// Check if session ID is set
if (!isset($_SESSION['id'])) {
  echo '<script type="text/javascript">window.location.href="index.php";</script>';
}else {
  if ($_SESSION['id'] == 1) {
  $uid = $_SESSION['userid'];
  $query = "SELECT * FROM `awt_admin` WHERE id = '$uid'";
  $result = mysqli_query($sql, $query);
  if ($result) {
    $listdata = mysqli_fetch_object($result);
    if ($listdata) {
      $per_name = $listdata->first_name . ' ' . $listdata->last_name;
    } else {
      // Handle case where no admin is found
      echo 'Admin not found.';
      echo '<script type="text/javascript">window.location.href="index.php";</script>';
    }
  } else {
    // Handle query failure
    echo 'Error executing query.';
  }
  }elseif ($_SESSION['id']==2)  {
    $uid = $_SESSION['user_id'];

    $query = "SELECT * FROM `awt_admin` WHERE id = '$uid' ";
    $result = mysqli_query($sql, $query);
    if ($result) {
      $listdata = mysqli_fetch_object($result);
      if ($listdata) {
        $per_name = $listdata->first_name . ' ' . $listdata->last_name;
      } else {
        // Handle case where no admin is found
        echo 'Admin not found.';
        echo '<script type="text/javascript">window.location.href="index.php";</script>';
      }
    } else {
      // Handle query failure
      echo 'Error executing query.';
    }
    }elseif ($_SESSION['id']==3)  {
      $uid = $_SESSION['customer_id'];
      $query = "SELECT * FROM `awt_customer` WHERE id = '$uid'";
      $result = mysqli_query($sql, $query);
      if ($result) {
        $listdata = mysqli_fetch_object($result);
        if ($listdata) {
          $per_name = $listdata->company_name;
        } else {
          // Handle case where no admin is found
          echo 'Admin not found.';
          echo '<script type="text/javascript">window.location.href="index.php";</script>';
        }
      } else {
        // Handle query failure
        echo 'Error executing query.';
      }
      }
}
?>


<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-md">
    <div class="navbar-header" data-logobg="skin6" >
      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="#"><i class="ti-menu ti-close"></i></a>
      <div class="navbar-brand justify-content-center">

        <img src="assets/images/users/north-star-logo.jpg" alt="homepage" width="80%"  class="dark-logo" />
       
      </div>

    </div>

    <!-- End Logo -->

    <div class="navbar-collapse collapse justify-content-end bg-white " id="navbarSupportedContent">
     
      <ul class="navbar-nav">



        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle" width="40">
            <span class="ml-2 d-none d-lg-inline-block text-dark   "><span>Hello,</span> <span class="text-dark"> <?php echo htmlspecialchars($per_name); ?> </span> <i data-feather="chevron-down" class="svg-icon"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
           
            
            <a class="dropdown-item" href="modal/logout/admin_logout.php"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
              Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
