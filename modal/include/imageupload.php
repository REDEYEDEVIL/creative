<?php
$images = '';
$date = date('y-i-d h:m:s');
$eid = '';
$msg = '';
$msge = '';
$filepath ='';
$catid='';
$subcat_id='';


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
    $cat_id = $_POST['category'];
    $subcat_id = $_POST['eid'];
    $eid = $_POST['eid'];
    $filename = $_FILES['file']['name'];

    if ($filename != '') {
        list($name, $ext) = explode(".", $filename);

        if (in_array($ext, $valid_formats)) {
            $upload_filename = time() . "-" . $filename;
            $tmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmp, $path . $upload_filename);
        }
        $filepath = $upload_filename;
    } else {
        $filepath = $_POST['filepath'];
    }



        if ($eid == '') {
            
            echo "INSERT INTO `image_upload` (`catid`,`subcatid`,`images`, `created_date`) VALUES ('$gallery_category','$gallery_subcategory','$images','$date')";

            exit();

            $query = mysqli_query($sql, "INSERT INTO `image_upload` (`catid`,`subcatid`,`images`, `created_date`) VALUES ('$gallery_category','$gallery_subcategory','$images','$date')");
            if ($query) {

                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="imageupload.php?&s=1"</script>';
        } else {

            echo "UPDATE `image_upload` SET `catid`='$gallery_category',`subcatid`='$gallery_subcategory',`images`='$images', `created_date`='$date' where `id` = '$eid'";
            $query = mysqli_query($sql, "UPDATE `image_upload` SET `images`='$image' , `created_date`='$date' where `id` = '$eid'");
            if ($query) {
                $msg = "Title Updated";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="imageupload.php?&u=1"</script>';
        }
    }



if (isset($_GET['did'])) {
    $did = $_GET['did'];

    echo "update `image_upload` set `deleted` = 1 where `id`='$did'";

    $query = mysqli_query($sql, "update `image_upload` set `deleted` = 1 where `id`='$did'");
    if ($query) {

        $msg = "Title Deleted";
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    echo '<script type="text/javascript">window.location.href="imageupload.php?&d=1"</script>';
}

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "Select * From `image_upload` where `id`='$eid'");
    $row = mysqli_fetch_object($query);
    $images = $row->images;
    $filepath =$row->image;
    
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

function tablerow($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `image_upload` where `deleted` = 0");

    $x = 1;

    
    while ($listdata = mysqli_fetch_object($query1)) {
        // echo "select * from `gallery_category` where id = '$listdata->catid'";
        $querys = mysqli_query($sql,"select * from `gallery_category` where id = '$listdata->catid'");
        $list = mysqli_fetch_object($querys);
        $name = $list->title;

        echo '<tr>
        <td class="text-center">' . $x . ' </td>
        <td class="d-flex justify-content-between">
            <p>' . $listdata->images . '</p>
            <div class="popover-icon">';
        $id = $listdata->id;
      

        echo '</div>
        </td>
        <td>
          <a href="imageupload.php?&eid=' . $listdata->id . '" class="btn" style="color: black;"><i class="fas fa-edit"></i></a>
          <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="imageupload.php?&did=' . $listdata->id . '" class="btn" style="color: red;"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>';
        $x++;
    }
}