<?php
$gallery_category = '';
$date = date('y-i-d h:m:s');
// $$subcat = '';
$eid = '';
$msg = '';
$msge = '';
$filepath = '';
$description = '';
$gallery_subcategory = '';
$category = '';
$subcategory = '';
$images= '';

if (!file_exists('uploads')) {
  mkdir('uploads', 0777, true);
}
if (!file_exists('uploads/gallery/')) {
  mkdir('uploads/gallery/', 0777, true);
}




$path = "../upload/gallery/";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg", "JPG", "PNG", "GIF", "BMP", "JPEG", "webp", "WEBP");

if (isset($_GET['s'])) {
  $msg = "New record created successfully";
}
if (isset($_GET['d'])) {
  $msg = "about Deleted";
}
if (isset($_GET['e'])) {
  $msg = "about Updated";
}

if (isset($_POST['submit'])) {
  // Validate input data
  $category = trim($_POST['Category']);
  $subcat = $_FILES['imageuploadImages'];
  $subcategory = trim($_POST['Sub-Category']);
  $images = trim($_POST['filepath']);
  $eid = $_GET['eid'];

  // If no errors, insert data into database
  if ($eid == '') {
    // Insert preschool data into database
    $stmt = $sql->prepare("INSERT INTO `image_upload` (  `catid`,  `subcatid`) VALUES ( ?, ?)");

    $stmt->bind_param("ss", $category, $subcategory);

    $stmt->execute();

    // Upload preschool images
    $imageNames = array();
    foreach ($subcat['name'] as $key => $imageName) {
      $imageNames[] = $imageName;
      $imagePath = 'uploads/gallery/' . $imageName;
      move_uploaded_file($subcat['tmp_name'][$key], $imagePath);
    }
    $dara = implode(',', $imageNames);
    $ik = mysqli_insert_id($sql);
    // Update preschool images in database
    $stmt = $sql->prepare("UPDATE `image_upload` SET `images` = ? WHERE `id` = ?");
    $stmt->bind_param("si", $dara, $ik);
    $stmt->execute();

    // Display success message
    $msg = 'Preschool data inserted successfully';
  } else {

    // Insert preschool data into database
    $stmt = $sql->prepare("update `image_upload` set  `catid` = ?,  `subcatid` = ?  where id = ?");

    $stmt->bind_param("sss", $category, $subcategory, $eid);

    $stmt->execute();

    if ( empty(isset($_POST['imageuploadImages']))) {
      // Upload preschool images

      $imageNames = array();
      foreach ($subcat['name'] as $key => $imageName) {
        $imageNames[] = $imageName;
        $imagePath = 'uploads/gallery/' . $imageName;
        move_uploaded_file($subcat['tmp_name'][$key], $imagePath);
      }
      $dara = implode(',', $imageNames);
      $ik = $_GET['eid'];
      // Update preschool images in database
      $stmt = $sql->prepare("UPDATE `image_upload` SET `images` = ? WHERE `id` = ?");
      $stmt->bind_param("ss", $dara, $ik);
      $stmt->execute();
      echo '<script>alert("UPDATE `image_upload` SET `images` = '.implode(',', $imageNames).' WHERE `id` = '.mysqli_insert_id($sql).'");</script>';
    }

    // Display success message
    $msg = 'Preschool data inserted successfully';
  }
}
function getgallery_category($sql, $gallery_category)
{

  $getdata = mysqli_query($sql, "SELECT * FROM `gallery_category` where `deleted` != 1");

  while ($listdata = mysqli_fetch_object($getdata)) {

    echo '<option value="' . $listdata->id . '"';
    if ($listdata->id == $gallery_category) {
      echo 'selected="gallery_category"';
    }
    echo '>' . $listdata->title . ' </option>';
  }
}
function getgallery_subcategory($sql, $gallery_subcategory)
{

  $getdata = mysqli_query($sql, "SELECT * FROM `gallery_subcategory` where `deleted` != 1");

  while ($listdata = mysqli_fetch_object($getdata)) {

    echo '<option value="' . $listdata->id . '"';
    if ($listdata->id == $gallery_subcategory) {
      echo 'selected="gallery_category"';
    }
    echo '>' . $listdata->title . ' </option>';
  }
}


if (isset($_GET['eid'])) {
  $id = $_GET['eid'];
  $query = mysqli_query($sql, "Select * from `image_upload` where `id` = '$id'");
  $listdata = mysqli_fetch_object($query);
  $category = $listdata->catid;
  $subcategory = $listdata->subcatid;
  $images = $listdata->images;
  // echo $images;
  // $filepath= explode(',',$images);
}


if (isset($_GET['did'])) {
  $id = $_GET['did'];
  $query = mysqli_query($sql , "update `image_upload` set deleted = 1  where id = '$id'");
  echo "<script>location.href='imageupload.php';</script>";
}

function tablerow($sql)
{
  $query1 = mysqli_query($sql, "SELECT im.id , gc.title as gc,gs.title as gs FROM `image_upload` as im left JOIN gallery_category as gc on im.catid = gc.id left join gallery_subcategory as gs on im.subcatid = gs.id where im.deleted=0");

  $x = 1;

  // mysqli_data_seek($query1, 1);
  while ($listdata = mysqli_fetch_object($query1)) {
    echo '<tr>
        <td class="text-center">' . $x . ' </td>
        <td class="text-left"><p>' . $listdata->gc . '</p></td>
        <td class="text-left"><p>' . $listdata->gs . '</p></td>
        <td>
          <a href="imageupload.php?&eid=' . $listdata->id . '" class="btn" style="color: black;"><i class="fas fa-edit"></i></a>
          <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="imageupload.php?&did=' . $listdata->id . '" class="btn" style="color: red;"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>';
    $x++;
  }
}
