<?php
$gallery_category = '';
$subcatName = '';
$date = date('y-i-d h:m:s');
$eid = '';
$msg = '';
$msge = '';
$filepath = '';
$description = '';


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
    $subcatName = $_POST['subcatName'];
    $gallery_category = trim($_POST['gallery_category']);
    $gallery_category = mysqli_real_escape_string($sql, $gallery_category);


    $flag = true;
    if (empty($subcatName)) {
        $flag = false;
        $msge = "Title is required";
    } else {
        $query = mysqli_query($sql, "Select * from `gallery_subcategory` where title='$subcatName'");
        if (mysqli_num_rows($query)) {
            $flag = false;
            $msge = "Title already exists";
        }
    }

    if ($flag) {
        if ($eid == '') {
            $query = mysqli_query($sql, "INSERT INTO `gallery_subcategory` (`catid`,`title`, `created_date`) VALUES ('$gallery_category','$subcatName','$date')");
            if ($query) {

                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="gallerysub-category.php?&s=1"</script>';
        } else {

            echo "UPDATE `gallery_subcategory` SET `title`='$subcatName' ,`catid`='$gallery_category', `created_date`='$date' where `id` = '$eid'";
            $query = mysqli_query($sql, "UPDATE `gallery_subcategory` SET `title`='$subcatName' , `created_date`='$date' where `id` = '$eid'");
            if ($query) {
                $msg = "Title Updated";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="gallerysub-category.php?&u=1"</script>';
        }
    }
}


if (isset($_GET['did'])) {
    $did = $_GET['did'];

    echo "update `gallery_subcategory` set `deleted` = 1 where `id`='$did'";

    $query = mysqli_query($sql, "update `gallery_subcategory` set `deleted` = 1 where `id`='$did'");
    if ($query) {

        $msg = "Title Deleted";
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    echo '<script type="text/javascript">window.location.href="gallerysub-category.php?&d=1"</script>';
}

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "Select * From `gallery_subcategory` where `id`='$eid'");
    $row = mysqli_fetch_object($query);
    $subcatName = $row->title;
    $gallery_category = $row->catid;
    $eid = $row->id;
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


function tablerow1($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `gallery_subcategory` where `deleted` = 0");

    $x = 1;


    while ($listdata = mysqli_fetch_object($query1)) {
        // echo "select * from `gallery_category` where id = '$listdata->catid'";
        $querys = mysqli_query($sql,"select * from `gallery_category` where id = '$listdata->catid'");
        $list = mysqli_fetch_object($querys);
        $name = $list->title;

        echo '<tr>
        <td class="text-center">' . $x . ' </td>
        <td>' . $name    . '</td>
        <td class="">
            <p>' . $listdata->title . '</p>
        </td>
        <td>
          <a href="gallerysub-category.php?&eid=' . $listdata->id . '" class="btn" style="color: black;"><i class="fas fa-edit"></i></a>
          <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="gallerysub-category.php?&did=' . $listdata->id . '" class="btn" style="color: red;"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>';
        $x++;
    }
}

