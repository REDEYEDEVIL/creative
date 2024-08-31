<?php
$letterName = '';
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
    $letterName = $_POST['letterName'];
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
    if (empty($letterName)) {
        $flag = false;
        $msge = "Title is required";
    } else {
        $query = mysqli_query($sql, "Select * from `e_letters` where title='$letterName'");
        if (mysqli_num_rows($query)) {
            $flag = false;
            $msge = "Title already exists"; 
        }
    }

   
        if ($eid == '') {
            $query = mysqli_query($sql, "INSERT INTO `e_letters` (`title`,`image`, `created_date`) VALUES ('$letterName','$filepath','$date')");
            if ($query) {

                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="e_letters.php?&s=1"</script>';
        } else {

            echo "UPDATE `e_letters` SET `title`='$letterName' ,`image`='$filepath', `created_date`='$date' where `id` = '$eid'";
            $query = mysqli_query($sql, "UPDATE `e_letters` SET `title`='$letterName' ,`image`='$filepath', `created_date`='$date' where `id` = '$eid'");
            if ($query) {
                $msg = "Title Updated";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="e_letters.php?&u=1"</script>';
        }
    
}


if (isset($_GET['did'])) {
    $did = $_GET['did'];

    echo "update `e_letters` set `deleted` = 1 where `id`='$did'";

    $query = mysqli_query($sql, "update `e_letters` set `deleted` = 1 where `id`='$did'");
    if ($query) {

        $msg = "Title Deleted";
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    echo '<script type="text/javascript">window.location.href="e_letters.php?&d=1"</script>';
}

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "Select * From `e_letters` where `id`='$eid'");
    $row = mysqli_fetch_object($query);
    $letterName = $row->title;
    $filepath = $row->image;
}


function tablerow($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `e_letters` where `deleted` = 0");

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
          <a href="e_letters.php?&eid=' . $listdata->id . '" class="btn" style="color: black;"><i class="fas fa-edit"></i></a>
          <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="e_letters.php?&did=' . $listdata->id . '" class="btn" style="color: red;"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>';
        $x++;
    }
}