<?php
$roleName = '';
$date = date('y-i-d h:m:s');
$eid = '';
$msg = '';
$msge = '';


if (isset($_GET['s'])) {
    $msg = "New record created successfully";
}
if (isset($_GET['d'])) {
    $msg = "Role Deleted";
}
if (isset($_GET['e'])) {
    $msg = "Role Updated";
}

if (isset($_POST['submit'])) {
    $eid = '';
    $roleName = $_POST['roleName'];
    $eid = $_POST['eid'];
    $flag = true;
    if (empty($roleName)) {
        $flag = false;
        $msge = "Role Name is required";
    } else {
        $query = mysqli_query($sql, "Select * from `awt_role` where title='$roleName'");
        if (mysqli_num_rows($query)) {
            $flag = false;
            $msge = "Role Name already exists";
        }
    }

    if ($flag) {
        if ($eid == '') {
            $query = mysqli_query($sql, "INSERT INTO `awt_role` (`title`, `created_at`) VALUES ('$roleName','$date')");
            if ($query) {

                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="role_master.php?&s=1"</script>';
        } else {

            echo "UPDATE `awt_role` SET `title`='$roleName' , `created_at`='$date' where `id` = '$eid'";
            $query = mysqli_query($sql, "UPDATE `awt_role` SET `title`='$roleName' , `created_at`='$date' where `id` = '$eid'");
            if ($query) {
                $msg = "Role Updated";
            } else {
                $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            echo '<script type="text/javascript">window.location.href="role_master.php?&u=1"</script>';
        }
    }
}


if (isset($_GET['did'])) {
    $did = $_GET['did'];

    echo "update `awt_role` set `deleted` = 1 where `id`='$did'";

    $query = mysqli_query($sql, "update `awt_role` set `deleted` = 1 where `id`='$did'");
    if ($query) {

        $msg = "Role Deleted";
    } else {
        $msg = "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    echo '<script type="text/javascript">window.location.href="role_master.php?&d=1"</script>';
}

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $query = mysqli_query($sql, "Select * From `awt_role` where `id`='$eid'");
    $row = mysqli_fetch_object($query);
    $roleName = $row->title;
}


function tablerow($sql)
{
    $query1 = mysqli_query($sql, "SELECT * FROM `awt_role` where `deleted` = 0");

    $x = 1;

    mysqli_data_seek($query1, 1);
    while ($listdata = mysqli_fetch_object($query1 )) {

        echo '<tr>
        <td class="text-center">' . $x . ' </td>
        <td class="d-flex justify-content-between">
            <p>' . $listdata->title . '</p>
            <div class="popover-icon">';
        $id = $listdata->id;
        $query3 = mysqli_query($sql, "Select id, role , first_name , last_name from `awt_admin` where role = '$id'");
        $row = mysqli_num_rows($query3);
        if ($row > 0) {
            while ($listdata2 = mysqli_fetch_object($query3)) {
                $first_name = $listdata2->first_name[0];
                $last_name = $listdata2->last_name[0];
                echo '<a class="btn btn-sm btn-success text-white rounded-circle popover-item btn-circle font-12" href="user_master.php?&id=' . $listdata2->id . '">' . $first_name . $last_name . '</a>';
            }
            echo '<a class="btn btn-sm btn-success text-white rounded-circle btn-circle font-20" href="role_rights.php?&id=' . $listdata->id . '">+</a>';
        }

        echo '</div>
        </td>
        <td>
          <a href="role_master.php?&eid=' . $listdata->id . '" class="btn" style="color: black;"><i class="fas fa-edit"></i></a>
          <a onclick=\"return confirm("Are you sure you want to delete this role?")\" href="role_master.php?&did=' . $listdata->id . '" class="btn" style="color: red;"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>';
        $x++;
    }
}


