<?php
$pretitle = '';
$date = date('y-i-d h:m:s');
$eid = '';
$msg = '';
$msge = '';
$filepath = '';
$desc = '';

if (!file_exists('upload')) {
  mkdir('upload', 0777, true);
}
if (!file_exists('uploads/preschool/')) {
  mkdir('uploads/preschool/', 0777, true);
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

$error_preschoolTitle = $error_preschoolImages = $error_backgroundColor = $error_sectionSequence = $error_preschooldescription = '';

if (isset($_POST['submit'])) {
  // Validate input data
  $preschoolTitle = trim($_POST['preschoolTitle']);
  $preschoolImages = $_FILES['preschoolImages'];
  $backgroundColor = trim($_POST['backgroundColor']);
  $sectionSequence = trim($_POST['sectionSequence']);
  $preschooldescription = trim($_POST['preschooldescription']);

  // Check for errors
  if (empty($preschoolTitle)) {
    $error_preschoolTitle = 'Preschool title is required';
  }
  if (empty($preschoolImages)) {
    $error_preschoolImages = 'Preschool images are required';
  }
  if (empty($backgroundColor)) {
    $error_backgroundColor = 'Background color is required';
  }
  if (empty($sectionSequence)) {
    $error_sectionSequence = 'Section sequence is required';
  }
  if (empty($preschooldescription)) {
    $error_preschooldescription = 'Preschool description is required';
  }

  // If no errors, insert data into database
  if (empty($error_preschoolTitle) && empty($error_preschoolImages) && empty($error_backgroundColor) && empty($error_sectionSequence) && empty($error_preschooldescription)) {
    // Insert preschool data into database
    $stmt = $sql->prepare("INSERT INTO `awt_preschool` (  `preschoolTitle`,  `backgroundColor`,  `sectionSequence`,  `preschooldescription`) VALUES ( ?, ?, ?, ?)");

    $stmt->bind_param("ssis",   $preschoolTitle,  $backgroundColor,   $sectionSequence,   $preschooldescription);

    $stmt->execute();

    // Upload preschool images
    $imageNames = array();
    foreach ($preschoolImages['name'] as $key => $imageName) {
      $imageNames[] = $imageName;
      $imagePath = 'uploads/preschool/' . $imageName;
      move_uploaded_file($preschoolImages['tmp_name'][$key], $imagePath);
    }
    $dara = implode(',', $imageNames);
    $ik = mysqli_insert_id($sql);
    // Update preschool images in database
    $stmt = $sql->prepare("UPDATE `awt_preschool` SET `preschoolImages` = ? WHERE `id` = ?");
    $stmt->bind_param("si", $dara, $ik);
    $stmt->execute();

    // Display success message
    $msg = 'Preschool data inserted successfully';
  } else {
    // Display error messages
    $msg = '<br>' . $error_preschoolTitle . '<br>' . $error_preschoolImages . '<br>' . $error_backgroundColor . '<br>' . $error_sectionSequence . '<br>' . $error_preschooldescription;
  }
}






function tablerow($sql)
{
  $query1 = mysqli_query($sql, "SELECT * FROM `awt_preschool` where `deleted` = 0");

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
