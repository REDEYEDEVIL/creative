<?php 
$category = '';
$subcategory = '';
$image = '';
$title = '';
$eid = '';
$alertMessage = '';

$path = "../upload/gallery/";
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg", "JPG", "PNG", "GIF", "BMP", "JPEG", "webp", "WEBP");

$cdate = date('Y-m-d H:i:s');

if(isset($_POST['submit'])) {

    $category = trim($_POST['Gall_cat']);
    $category = mysqli_real_escape_string($conn, $category);

    $subcategory = trim($_POST['Gall_subcat']);
    $subcategory = mysqli_real_escape_string($conn, $subcategory);

    $title = trim($_POST['title']);
    $title = mysqli_real_escape_string($conn, $title);

    $year = trim($_POST['year']);
    $year = mysqli_real_escape_string($conn, $year);

    $eid = trim($_POST['eid']);
    $eid = mysqli_real_escape_string($conn, $eid);

    /* Image Upload Start */ 
    $upload = $_FILES['upload']['name']; 

    if($upload != '') {

        $lastDot = strrpos($upload, ".");
        $upload = str_replace(".", "", substr($upload, 0, $lastDot)) . substr($upload, $lastDot);

		list($txt, $ext) = explode(".", $upload);

		if(in_array($ext,$valid_formats)){

            $txt = str_replace(" ", "-", $txt);

			global $upload_image;
			$upload_image = $txt."-".time().".".$ext;

			$tmp = $_FILES['upload']['tmp_name'];	
			move_uploaded_file($tmp, $path.$upload_image);

		} else {

            

        }

		$image = $upload_image;			

	} else {

		$image = mysqli_real_escape_string($conn,$_POST['image']);

	}

    /* Image Upload Complete */ 


    if($eid == '') {

        mysqli_query($conn, "INSERT INTO `awt_gallery` (`category`,`subcategory`, `year`, `upload`, `title`, `created_by`, `created_date`) VALUES ('$category','$subcategory', '$year', '$image', '$title', '$userid', '$cdate')");

        echo '<script type="text/javascript">window.location.href="gallery_camp.php?s=1"</script>';

    } else {

        mysqli_query($conn, "UPDATE `awt_gallery` SET `category` = '$category', `subcategory` = '$subcategory', `year` = '$year', `upload` = '$image', `title` = '$title',  `updated_by` = '$userid', `updated_date`= '$cdate' where `id` = '$eid' ");

        echo '<script type="text/javascript">window.location.href="gallery_camp.php?u=1"</script>';

    }

}

if(isset($_GET['s'])) {

    $alertMessage = '<div class="alert alert-success mt-2" role="alert">Data Inserted Successfully</div>';

}

if(isset($_GET['u'])) {

    $alertMessage = '<div class="alert alert-success mt-2" role="alert">Data Updated Successfully</div>';

}

function gallery_cat($conn, $scategory) {

    $query = mysqli_query($conn, "SELECT * FROM `awt_category` where `deleted` != 1");

    while($listdata = mysqli_fetch_object($query)){

        echo '<option value="'.$listdata->id.'" ';
            if($listdata->id == $scategory) {echo ' selected="selected"'; }
        echo '>'.$listdata->category.'</option>';

    }
}

function gallery_subcat($conn, $scategory, $subcategory) {

    $query = mysqli_query($conn, "SELECT * FROM `awt_subcategory` where `category` = '$scategory' and `deleted` != 1");

    while($listdata = mysqli_fetch_object($query)){

        echo '<option value="'.$listdata->id.'" ';
            if($listdata->id == $subcategory) {echo ' selected="selected"'; }
        echo '>'.$listdata->subcategory.'</option>';

    }
}



if(isset($_GET['eid'])) {

    $eid = trim($_GET['eid']);    
    $eid = mysqli_real_escape_string($conn, $eid);

    $query = mysqli_query($conn, "SELECT * FROM `awt_gallery` where `id` = '$eid'");

    $getdata = mysqli_fetch_object($query);

    $title = $getdata->title;
    $year = $getdata->year;
    $image = $getdata->upload;
    $scategory = $getdata->category;
    $sub_category = $getdata->subcategory;
    $eid = $getdata->id;

}

if(isset($_GET['did'])) {

    $did = trim($_GET['did']);    
    $did = mysqli_real_escape_string($conn, $did);
    $cdate = date('Y-m-d H:i:s');

    mysqli_query($conn, "UPDATE `awt_gallery` SET `deleted` = 1, `updated_date` = '$cdate', `updated_by` = '$userid' where `id` = '$did'");

    echo '<script type="text/javascript">window.location.href="gallery_camp.php?d=1"</script>';

}




?>