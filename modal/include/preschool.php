<?php
$aboutName = '';
$date = date('y-i-d h:m:s');
$eid = '';
$msg = '';
$msge = '';
$filepath ='';
$description ='';


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
    $aboutName = $_POST['aboutName'];
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
    if (empty($aboutName)) {
        $flag = false;
        $msge = "Title is required";
    } else {
        $query = mysqli_query($sql, "Select * from `awt_about` where title='$aboutName'");
        if (mysqli_num_rows($query)) {
            $flag = false;
            $msge = "Title already exists";
        }
    }

    if ($flag) {
        if ($eid == '') {
            $query = mysqli_query($sql, "INSERT INTO `awt_about` (`title`, `created_date`) VALUES ('$aboutName','$date')");
            if ($query) {

                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="about_us.php?&s=1"</script>';
        } else {

            echo "UPDATE `awt_about` SET `title`='$aboutName' , `created_date`='$date' where `id` = '$eid'";
            $query = mysqli_query($sql, "UPDATE `awt_about` SET `title`='$aboutName' , `created_date`='$date' where `id` = '$eid'");
            if ($query) {
                $msg = "Title Updated";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="about_us.php?&u=1"</script>';
        }
    }
}


if (isset($_GET['did'])) {
    $did = $_GET['did'];

    echo "update `awt_about` set `deleted` = 1 where `id`='$did'";

    $query = mysqli_query($sql, "update `awt_about` set `deleted` = 1 where `id`='$did'");
    if ($query) {

        $msg = "Title Deleted";
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    echo '<script type="text/javascript">window.location.href="about_us.php?&d=1"</script>';
}

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "Select * From `awt_about` where `id`='$eid'");
    $row = mysqli_fetch_object($query);
    $aboutName = $row->title;
}


function tablerow($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `awt_about` where `deleted` = 0");

    $x = 1;

    mysqli_data_seek($query1, 1);
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
          <a href="about_us.php?&eid=' . $listdata->id . '" class="btn" style="color: black;"><i class="fas fa-edit"></i></a>
          <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="about_us.php?&did=' . $listdata->id . '" class="btn" style="color: red;"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>';
        $x++;
    }
}