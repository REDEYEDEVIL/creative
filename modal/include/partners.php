<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$partnersName = '';
$shrt_desc = '';
$desc = '';
$date = date('y-i-d h:m:s');
$eid = '';
$msg = '';
$msge = '';
$filepath = '';





if (!file_exists('uploads')) {
    mkdir('../uploads', 0777, true);
}
if (!file_exists('../uploads/partners/')) {
    mkdir('../uploads/partners/', 0777, true);
}

$path = "../uploads/partners/";
$valid_formats = array("jpg", "png", "gif", "bmp", "jpeg", "JPG", "PNG", "GIF", "BMP", "JPEG", "webp", "WEBP");
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
    $eid = '';
    $partnersName = $_POST['partnersName'];
    $desc = $_POST['desc'];
    $shrt_desc = $_POST['shrt_desc'];
    $eid = $_POST['eid'];
    $filename = $_FILES['file']['name'];

    // echo"<script>alert('.$desc.')</script>";
    // echo"<script>alert('.$shrt_desc.')</script>";

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
   
    $flag = true;
    if (empty($partnersName)) {
        $flag = false;
        $msge = "Title is required";
    } else {
        $query = mysqli_query($sql, "Select * from `partners` where title='$partnersName'");
        if (mysqli_num_rows($query)) {
            $flag = false;
            $msge = "Title already exists";
        }
    }

     if ($flag) {
        if ($eid == '') {
            $query = mysqli_query($sql, "INSERT INTO `partners` (`title`,`image`,`short_description`,`description`, `created_date`) VALUES ('$partnersName','$filepath','$shrt_desc','$desc','$date')");
            if ($query) {

                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="partners.php?&s=1"</script>';
        } else {


            $query = mysqli_query($sql, "UPDATE `partners` SET `title`='$partnersName',`image`='$filepath',`short_description`='$shrt_desc',`description`='$desc', `created_date`='$date' where `id` = '$eid'");
            if ($query) {
                $msg = "Data Updated";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="partners.php?&u=1"</script>';
        }
    }
 }


if (isset($_GET['did'])) {
    $did = $_GET['did'];

    echo "update `partners` set `deleted` = 1 where `id`='$did'";

    $query = mysqli_query($sql, "update `partners` set `deleted` = 1 where `id`='$did'");
    if ($query) {

        $msg = "Title Deleted";
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    echo '<script type="text/javascript">window.location.href="partners.php?&d=1"</script>';
}

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "Select * From `partners` where `id`='$eid'");
    $row = mysqli_fetch_object($query);
    $partnersName = $row->title;
    $filepath = $row->image;
    $shrt_desc = $row->short_description;
    $desc = $row->description;

}


function tablerow($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `partners` where `deleted` = 0");

    $x = 1;


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
          <a href="partners.php?&eid=' . $listdata->id . '" class="btn" style="color: black;"><i class="fas fa-edit"></i></a>
          <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="partners.php?&did=' . $listdata->id . '" class="btn" style="color: red;"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>';
        $x++;
    }
}