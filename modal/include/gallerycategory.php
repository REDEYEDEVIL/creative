<?php
$catName = '';
$date = date('y-i-d h:m:s');
$eid = '';
$msg = '';
$msge = '';
$valid_formats=  array("jpg", "jpeg", "png", "gif");
$path = "upload/";
$filepath ='';



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
    $catName = $_POST['catName'];
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
    $flag = true;
    if (empty($catName)) {
        $flag = false;
        $msge = "Title is required";
    } else {
        $query = mysqli_query($sql, "Select * from `gallery_category` where title='$catName'");
        if (mysqli_num_rows($query)) {
            $flag = false;
            $msge = "Title already exists";
        }
    }

   
        if ($eid == '') {
            $query = mysqli_query($sql, "INSERT INTO `gallery_category` (`title`,`image`,`created_date`) VALUES ('$catName','$filepath','$date')");
            if ($query) {

                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="gallerycategory.php?&s=1"</script>';
        } else {

            echo "UPDATE `gallery_category` SET `title`='$catName' , `image`='$filepath',`created_date`='$date' where `id` = '$eid'";
            $query = mysqli_query($sql, "UPDATE `gallery_category` SET `title`='$catName' ,`image`='$filepath', `created_date`='$date' where `id` = '$eid'");
            if ($query) {
                $msg = "Title Updated";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="gallerycategory.php?&u=1"</script>';
        }
    
}


if (isset($_GET['did'])) {
    $did = $_GET['did'];

    echo "update `gallery_category` set `deleted` = 1 where `id`='$did'";

    $query = mysqli_query($sql, "update `gallery_category` set `deleted` = 1 where `id`='$did'");
    if ($query) {

        $msg = "Title Deleted";
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    echo '<script type="text/javascript">window.location.href="gallerycategory.php?&d=1"</script>';
}

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "Select * From `gallery_category` where `id`='$eid'");
    $row = mysqli_fetch_object($query);
    $catName = $row->title;
    $filepath = $row->image;
    $eid = $row->id;
}


function tablerow($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `gallery_category` where `deleted` = 0");

    $x = 1;

   
    while ($listdata = mysqli_fetch_object($query1 )) {

        echo '<tr>
        <td class="text-center">' . $x . ' </td>
        <td class="d-flex justify-content-between">
            <p>' . $listdata->title . '</p>
            <div class="popover-icon">';
        $id = $listdata->id;
      

        echo '</div>
        </td>
        <td>
          <a href="gallerycategory.php?&eid=' . $listdata->id . '" class="btn" style="color: black;"><i class="fas fa-edit"></i></a>
          <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="gallerycategory.php?&did=' . $listdata->id . '" class="btn" style="color: red;"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>';
        $x++;
    }
}