<?php
$companyName = $email = $mobileNo = $gstNo = $address = $state = $city = $pincode = $password = '';
$companyNameError = $emailError = $mobileNoError = $gstNoError = $addressError = $stateError = $cityError = $pincodeError = $passwordError = '';
$msg = '';


if (isset($_POST['submit'])) {
  // escape variables for security
  // $password = mysqli_real_escape_string($sql, $_POST['password']);
  // Validate form data
  // Sanitize and validate company name
  $password = trim(mysqli_real_escape_string($sql, $_POST['password']));
  if (empty($password)) {
    $passwordError = "Password is required.";
  }
  $password = md5($password);
  $companyName = trim(mysqli_real_escape_string($sql, $_POST['companyName']));
  if (empty($companyName)) {
    $companyNameError = "Company Name is required.";
  }

  $email = trim(mysqli_real_escape_string($sql, $_POST['email']));
  if (empty($email)) {
    $emailError = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailError = "Invalid email format.";
  } else {
    $query = "SELECT * FROM `awt_customer` WHERE `email` = '$email'";
    $result = mysqli_query($sql, $query);
    if (mysqli_num_rows($result) > 0) {
      $emailError = "Email already exists.";
    }
  }
  // Sanitize and validate mobile number
  $mobileNo = trim(mysqli_real_escape_string($sql, $_POST['mobileNo']));
  if (empty($mobileNo)) {
    $mobileNoError = "Mobile Number is required.";
  } elseif (!preg_match("/^[0-9]{10}$/", $mobileNo)) {
    $mobileNoError = "Invalid mobile number format. It should be 10 digits.";
  }

  // Sanitize GST number
  if (!empty($gstNo)) {
    $gstNo = trim(mysqli_real_escape_string($sql, $_POST['gstNo']));
    $gstNoRegex = '/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/';

    if (!preg_match($gstNoRegex, $gstNo)) {
      $gstNoError = 'Invalid GST number';
    }
  }

  // Sanitize and validate address
  $address = trim(mysqli_real_escape_string($sql, $_POST['address']));
  if (empty($address)) {
    $addressError = "Address is required.";
  }

  // Sanitize and validate state
  $state = trim(mysqli_real_escape_string($sql, $_POST['state']));
  if (empty($state)) {
    $stateError = "State is required.";
  }

  // Sanitize and validate city
  $city = trim(mysqli_real_escape_string($sql, $_POST['city']));
  if (empty($city)) {
    $cityError = "City is required.";
  }

  // Sanitize and validate pincode
  $pincode = trim(mysqli_real_escape_string($sql, $_POST['pincode']));
  if (empty($pincode)) {
    $pincodeError = "Pincode is required.";
  } elseif (!preg_match("/^[0-9]{6}$/", $pincode)) {
    $pincodeError = "Invalid pincode format. It should be 6 digits.";
  }

  // Check if there are no errors
  if (empty($companyNameError) && empty($emailError) && empty($mobileNoError) && empty($addressError) && empty($stateError) && empty($cityError) && empty($pincodeError) && empty($gstNoError) && empty($passwordError)) {
    // No errors, proceed with database insertion or further processing
    // Your database code here
    // insert query
    $query = "INSERT INTO `awt_customer` (`company_name`, `email`, `mobile_no`, `gst_no`, `address`, `state`, `city`, `pincode`, `password`) VALUES ('$companyName', '$email', '$mobileNo', '$gstNo', '$address', '$state', '$city', '$pincode', '$password')";

    if (mysqli_query($sql, $query)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($sql);
    }

    echo '<script type="text/javascript">window.location.href="customer_master_list.php?s=1";</script>';
  }
}


function state($sql,$state){
  $query =mysqli_query($sql , "Select * from `awt_states` ");
  while ($listdata=mysqli_fetch_object($query)) {
    echo '<option value='. $listdata->id .'>' ;
    if ($state==$listdata->id) {
      echo "selected";
    }
    echo ''. $listdata->name .'</option>';
  }
}
