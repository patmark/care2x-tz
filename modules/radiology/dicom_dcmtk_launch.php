<!--#!/usr/bin/php-->
<?php
#
# Creates a jpeg and jpeg thumbnail of a DICOM file 
#
//session_start();
if (!isset($root_path) || empty($root_path)) {
    include('roots.php');
} // added for Care2002 1.0.04

require_once($root_path . 'include/care_api_classes/class_dicom.php');

//$file = (isset($argv[1]) ? $argv[1] : '');
$new_img = '';
$dicom_jpg = array();
$dicom_jpg_tn = array();
$r = 1;   //Initialize variable to hold rows number
$col = 1;   //A variable to hold columns number
$disp_cols = 3;   //Holds the number of columns to display
$no_images = count($images);
//echo $no_images;
echo '<table border=1>';

foreach ($images as $path) {
    $file = $path;


    if (!$file) {
        print "USAGE: ./dicom_dcmtk_launch.php <FILE>\n";
        exit;
    }

    if (!file_exists($file)) {
        print "$file: does not exist\n";
        exit;
    }

//    $job_start = time();

    $d = new dicom_convert;
    $d->file = $file;

    $new_img = $d->dcm_to_jpg();
    //Save images paths to array
    array_push($dicom_jpg, $new_img);


    $new_img_tn = $d->dcm_to_tn(); //Create thumbnails for the images to display
    array_push($dicom_jpg_tn, $new_img_tn);
//system("ls -lsh $file*");
//
//$job_end = time();
//$job_time = $job_end - $job_start;
//print "Created JPEG and thumbnail in $job_time seconds.\n";
//print "Created JPEG in $job_time seconds.\n";
//    if (preg_match('jpg', $new_img_tn)) {
//        echo "<img src='$new_img_tn'>";
//    } else {
//        echo "<img src='$new_img_tn'>";
//    }
    if ($r == 1 && $col == 1) {      //For the first iteration
        echo '<tr>';
    }
    if ($r > 1 && $col == 1) {      //For the other rows
        echo '<tr>';
    }
    ?>
    <td>
        <div>
            <div id="image-gallery-1" class="cf">
                <img src="<?php echo $new_img_tn; ?>" data-high-res-img="<?php echo $new_img; ?>" alt="" class="gallery-items">
            </div>
            <br/>
            <div style="float: left">
                <a href="delete_dicom.php<?php echo URL_APPEND . "&pid=$pid&nr=$img_nr&path=$file"; ?>"><font size=1>&nbsp; <?php echo 'Delete Dicom' ?></font></a>
            </div>
        </div>
    </td>
    <!--    <div>
            <br>
        </div>-->
    <?php
    if ($disp_cols > $no_images && $col == $no_images) {
        echo '</tr>';
        $r++;
        $col = 1;
        continue;
    }
    if ($col >= $disp_cols && $col % $disp_cols == 0) {
        echo '</tr>';
        $r++;
        $col = 1;
        continue;
    }

    $col++;
}
echo '<table>';

////Assign paths to session variable
$_SESSION['dicom_jpg'] = $dicom_jpg;
$_SESSION['dicom_jpg_tn'] = $dicom_jpg_tn;

//print_r($_SESSION['dicom_jpg_tn']);
?>
