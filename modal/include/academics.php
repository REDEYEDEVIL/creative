<?php
$aboutName = '';
$date = date('y-i-d h:m:s');
$eid = '';
$msg = '';
$msge = '';
$filepath = '';
$description = '';

if (!file_exists('upload')) {
  mkdir('upload', 0777, true);
}
if (!file_exists('uploads/academics/')) {
  mkdir('uploads/academics/', 0777, true);
}


if (isset($_GET['s'])) {
  $msg = "New record created successfully";
}
if (isset($_GET['d'])) {
  $msg = "about Deleted";
}
if (isset($_GET['e'])) {
  $msg = "about Updated";
}

$error_academicsTitle = $error_academicsImages = $error_backgroundColor = $error_sectionSequence = $error_academicsdescription = '';

if (isset($_POST['submit'])) {
  // Validate input data
  $academicsTitle = trim($_POST['academicsTitle']);
  $academicsImages = $_FILES['academicsImages'];
  $backgroundColor = trim($_POST['backgroundColor']);
  $sectionSequence = trim($_POST['sectionSequence']);
  $academicsdescription = trim($_POST['academicsdescription']);

  // Check for errors
  if (empty($academicsTitle)) {
    $error_academicsTitle = 'academics title is required';
  }
  if (empty($academicsImages)) {
    $error_academicsImages = 'academics images are required';
  }
  if (empty($backgroundColor)) {
    $error_backgroundColor = 'Background color is required';
  }
  if (empty($sectionSequence)) {
    $error_sectionSequence = 'Section sequence is required';
  }
  if (empty($academicsdescription)) {
    $error_academicsdescription = 'academics description is required';
  }

  // If no errors, insert data into database
  if (empty($error_academicsTitle) && empty($error_academicsImages) && empty($error_backgroundColor) && empty($error_sectionSequence) && empty($error_academicsdescription)) {
    // Insert academics data into database
    $stmt = $sql->prepare("INSERT INTO `academics` (  `academicsTitle`,  `backgroundColor`,  `sectionSequence`,  `academicsdescription`) VALUES ( ?, ?, ?, ?)");

    $stmt->bind_param("ssis",   $academicsTitle,  $backgroundColor,   $sectionSequence,   $academicsdescription);

    $stmt->execute();

    // Upload academics images
    $imageNames = array();
    foreach ($academicsImages['name'] as $key => $imageName) {
      $imageNames[] = $imageName;
      $imagePath = 'uploads/academics/' . $imageName;
      move_uploaded_file($academicsImages['tmp_name'][$key], $imagePath);
    }
    $dara = implode(',', $imageNames);
    $ik = mysqli_insert_id($sql);
    // Update academics images in database
    $stmt = $sql->prepare("UPDATE `academics` SET `academicsImages` = ? WHERE `id` = ?");
    $stmt->bind_param("si", $dara, $ik);
    $stmt->execute();

    // Display success message
    $msg = 'academics data inserted successfully';
  } else {
    // Display error messages
    $msg = '<br>' . $error_academicsTitle . '<br>' . $error_academicsImages . '<br>' . $error_backgroundColor . '<br>' . $error_sectionSequence . '<br>' . $error_academicsdescription;
  }
}






function tablerow($sql)
{
  $query1 = mysqli_query($sql, "SELECT * FROM `awt_about` where `deleted` = 0");

  $x = 1;

  mysqli_data_seek($query1, 1);
  while ($listdata = mysqli_fetch_object($query1)) {

    echo '<tr>
        <td class="text-center">' . $x . ' </td>
        <td class="d-flex justify-content-between">
            <p>' . $listdata->title . '</p>
            <div class="popover-icon">';
    $id = $listdata->id;


    echo '</div>
        </td>
        <td>
          <a href="about_us.php?&eid=' . $listdata->id . '" class="btn" style="color: black;"><i class="fas fa-edit"></i></a>
          <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="about_us.php?&did=' . $listdata->id . '" class="btn" style="color: red;"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>';
    $x++;
  }
}
