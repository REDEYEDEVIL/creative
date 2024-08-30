<?php
include('head.php');
include('loader.php');
?>
<style>
  body {
    font-family: Rubik, sans-serif;
    background-color: #f8f9fa;
    padding: 0%;
    margin: 0%;
  }

  .form-group {
    margin-bottom: 15px;
  }

  .table th,
  .table td {
    vertical-align: middle;
  }

  .card-body {
    padding: 20px;
  }

  .btn {
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .btn-primary {
    background-color: #337ab7;
    color: #fff;
  }

  .btn-primary:hover {
    background-color: #23527c;
  }

  .btn-danger {
    background-color: #d9534f;
    color: #fff;
  }

  .btn-danger:hover {
    background-color: #c9302c;
  }

  .btn-cyan {
    background-color: #00bcd4;
    color: #fff;
  }

  .btn-cyan:hover {
    background-color: #0097a7;
  }

  .btn-success {
    background-color: #5cb85c;
    color: #fff;
  }

  .btn-success:hover {
    background-color: #449d44;
  }

  .edit-btn {
    background-color: #337ab7;
    color: #fff;
    padding: 5px 10px;
    font-size: 14px;
  }

  .edit-btn:hover {
    background-color: #23527c;
  }

  .delete-btn {
    background-color: #d9534f;
    color: #fff;
    padding: 5px 10px;
    font-size: 14px;
  }

  .delete-btn:hover {
    background-color: #c9302c;
  }

  .assign-btn {
    background-color: #5cb85c;
    color: #fff;
    padding: 5px 10px;
    font-size: 14px;
  }

  .assign-btn:hover {
    background-color: #449d44;
  }
</style>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="dist/css/style.min.css">

<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php
  include('sidebar.php');
  include('header.php');
  include('modal/preschool.php');
  ?>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
<script>
  $(document).ready(function() {
    new DataTable('#myTable', {
      "info": false // hide the "Showing 1 to 3 of 3entries" text
    });
  });
</script>


<?php
include('footer.php');
?>

<script>


</script>