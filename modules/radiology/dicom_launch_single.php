<?php
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');

# Switch to the selected dicom viewer module

switch ($_SESSION['sess_dicom_viewer']) {
    case 'dcmtk':
        header("location:dicom_dcmtk_launch.php" . URL_REDIRECT_APPEND . "&pid=$pid&img_nr=$img_nr&fn=$fn");
        exit;
    default:
    # Default viewer
}

/* * * CARE2X Integrated Hospital Information System Deployment 2.1 - 2004-10-02
 * GNU General Public License
 * Copyright 2002,2003,2004,2005 Elpidio Latorilla
 * elpidio@care2x.org, 
 *
 * See the file 'copy_notice.txt' for the licence notice
 * Modified by Mark Patrick - 2016
 * markpatrick9@gmail.com
 */
define('LANG_FILE', 'actions.php');
//define('LANG_FILE','radio.php');
//define('NO_2LEVEL_CHK',1);
$local_user = 'ck_radio_user';
require_once($root_path . 'include/inc_front_chain_lang.php');
require_once($root_path . 'global_conf/inc_remoteservers_conf.php');

$thisfile = basename($_SERVER['PHP_SELF']);

$breakfile = 'patient_search.php' . URL_APPEND;

$nogo = false;

if (isset($img_nr) && $img_nr && isset($pid) && $pid && isset($fn) && $fn) {
    //echo $img_obj->getLastQuery();
    $imgpath = $root_path . $dicom_img_localpath . $pid . '/' . $img_nr . '/' . $fn;
    if (!file_exists($imgpath)) {
        $nogo = true;
    }
} else {
    $nogo = true;
}
# If no go, get out of here
if ($nogo) {
    //echo $imgpath;
    header("location:upload.php" . URL_REDIRECT_APPEND . "&mode=show&pid=$pid&nr=$img_nr");
    exit;
}

$images = array(); //Initializa an array to hold all images
array_push($images, $imgpath);  //Add image path to array
//print_r($images);
//echo $imgpath;
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<?php html_rtl($lang); ?>
<HEAD>
    <TITLE>
        <?php echo $LDDicomViewer ?>
    </TITLE>
    <script src="<?php echo $root_path; ?>js/jquery-1.11.3.min.js"></script> 
    <link href="<?php echo $root_path; ?>css/imageviewer.css"  rel="stylesheet" type="text/css" />
    <script src="<?php echo $root_path; ?>js/imageviewer.js"></script>

    <style>
        .gallery-items{
            float: left;
            height: 150px;
        }
    </style>

</HEAD>
<BODY topmargin=0 leftmargin=0  marginwidth=0 marginheight=0><font face="Verdana, Arial" size=1><?php
    if (isset($pop_only) && $pop_only) {
        ?>
        <a href="javascript:window.close()">&nbsp;>> <?php echo $LDClose ?> <<</a>
        <?php
    } else {
        ?>
        <a href="upload.php<?php echo URL_APPEND . "&saved=1&mode=show&pid=$pid&nr=$img_nr"; ?>"><font size=1>&nbsp;<< <?php echo $LDBack ?></font></a>
        <?php
    }
    ?></font>
    <br>

    <?php
    include 'dicom_dcmtk_launch.php';
    ?>

    <SCRIPT type="text/javascript">

        var path = '<?php echo $new_img; ?>';
        var sid = '<?php echo $_REQUEST['sid']; ?>';
        //        window.onbeforeunload = removeImage;
        //
        //        function removeImage() {
        ////            alert(path);
        //            var cn = confirm('Exit?');
        //            return null;
        //        }

        window.onbeforeunload = function () {
            urlholder = "<?php echo $root_path; ?>modules/radiology/delete_jpg.php?path=" + path + '&sid=' + sid;
            var Request = new XMLHttpRequest();

            Request.open("GET", urlholder, false);
            Request.send();

            if (Request.status === 200) {
                //                alert(Request.responseText);
//                return Request.responseText;
                return null;
            } else {
                //                alert("Error!");
                return "Error!";
            }
        }


        $(function () {
            var viewer = ImageViewer();
            $('.gallery-items').click(function () {
                var imgSrc = this.src,
                        highResolutionImage = $(this).data('high-res-img');

                viewer.show(imgSrc, highResolutionImage);
            });
        });

    </script>

</BODY>
</HTML> 
