<?php 
include('head.php');

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// ?>

<style>
  .ftco-section {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f9f9f9;
  }

  .container {
    height: 100%;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .row {
    width: 90%;
    height: 75%;
    margin: 0;

  }

  .col-md-12, .col-lg-10 {
    height: 100%;
    padding: 20px;
  }

  .wrap {
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    background-color: white;
  }

  .img {
    width: 50%;
    height: 100%;
   
    background-position: center;
    border-radius: 10px 0 0 10px;
    
    background-size: 80%;
    background-repeat: no-repeat;
    
  }

  .login-wrap {
    width: 50%;
    height: 100%;
    padding: 40px;
    background-color: #fff;
    border-radius: 0 10px 10px 0;
   
  }

  .login-wrap h3 {
    font-weight: bold;
    color: #333;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .label {
    font-weight: bold;
    margin-bottom: 10px;
    display: block;
  }

  .form-control {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
  }

  .form-control:focus {
    border-color: #aaa;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .submit {
    background-color: #337ab7;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .submit:hover {
    background-color: #23527c;
  }

  #reg1, #reg2 {
    font-size: 13px;
    color: red;
    margin-top: 5px;
  }

  button{
    border-radius: 0 60px 60px 0;
    color: #fff !important;
    background: linear-gradient(to right, #8971ea, #7f72ea, #7574ea, #6a75e9, #5f76e8);
    box-shadow: 0 7px 12px 0 rgba(95, 118, 232, .21);
    opacity: 1; 
  }

  @media only screen and (max-width: 400px) {
    .ftco-section {
      padding: 80px 0px;
    }
  }
</style>




<?php 
include('modal/index.php');
include('footer.php');
?>