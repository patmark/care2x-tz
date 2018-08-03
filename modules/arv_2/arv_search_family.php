<?php

error_reporting(E_COMPILE_ERROR | E_ERROR | E_CORE_ERROR);
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');


if (isset($_GET['ctc_id'])) {
//    echo $_GET['pid'];
    $ctc_id = trim(str_replace('-', '', $_GET['ctc_id']));
    $ctc_qry = "SELECT p.name_first, p.name_2, p.name_last,
                       p.date_birth, p.selian_pid, c.ctc_id                       
                FROM care_person p, care_tz_arv_registration c
                WHERE p.pid = c.pid
                AND ctc_id = '$ctc_id'
                AND p.pid !=" . $_GET['pid'];
    $db_ctc_id = $db->Execute($ctc_qry);
    $data = array();
    while ($row_ctc_id = $db_ctc_id->FetchRow()) {
        $data['patient_relative'][] = $row_ctc_id;
    }
    $table = '';
    if (count($data['patient_relative']) < 1) {
        echo "<table class=\"mainTable\"><tr><td bgcolor=\"#F0F8FF\" class=\"error2\">No Patient Found!</td></tr></table>";
    } else {
        $table.='<tr>';
        $table.='<td bgcolor="#F0F8FF" align="center"><strong>Name</strong></td>';
        $table.='<td bgcolor="#F0F8FF" align="center"><strong>Age</strong></td>';
        $table.='<td bgcolor="#F0F8FF" align="center"><strong>HIV Status</strong></td>';
        $table.='<td bgcolor="#F0F8FF" align="center"><strong>HIV Care Status</strong></td>';
        $table.='<td bgcolor="#F0F8FF" align="center"><strong>Facility File No</strong></td>';
        $table.='</tr>';

        for ($i = 0; $i < count($data['patient_relative']); $i++) {
            $relative_name = $data['patient_relative'][$i]['name_first'] . ' ' . $data['patient_relative'][$i]['name_2'] . ' ' . $data['patient_relative'][$i]['name_last'];
            $temp = explode('-', $data['patient_relative'][$i]['date_birth']);
            $gebd = $temp[2];
            $gebm = $temp[1];
            $geby = $temp[0];

            if (date('m', time()) < $gebm) {
                $x = 1;
            } else if (date('m', time()) == $gebm AND date('d', time()) < $gebd) {
                $x = 1;
            }

            $relative_age = date('Y', time()) - $geby - $x;
            $hiv_status = 'positive';
            $hiv_care_status = 'Attending this Clinic';
            $facility_file_no = $data['patient_relative'][$i]['selian_pid'];

            $table.='<tr>';
            $table.="<td bgcolor=\"#F0F8FF\" align=\"center\"><input class=\"input_med\" name='relative_name' type='text' readonly value='$relative_name'/> </td>";
            $table.="<td bgcolor=\"#F0F8FF\" align=\"center\"><input class=\"input_short\" name='age' type='text' readonly value='$relative_age'/> </td>";
            $table.="<td bgcolor=\"#F0F8FF\" align=\"center\"><input class=\"input_short\" name='hiv_status' type='text' readonly value='$hiv_status'/> </td>";
            $table.="<td bgcolor=\"#F0F8FF\" align=\"center\"><input class=\"input_med\" name='hiv_care_status' type='text' readonly value='$hiv_care_status'/> </td>";
            $table.="<td bgcolor=\"#F0F8FF\" align=\"center\"><input class=\"input_short\" name='facility_file_no' type='text' readonly value='$facility_file_no'/> </td>";
            $table.='</tr>';
        }
        $table.='<tr>';
        $table.='<td colspan="5" bgcolor="#F0F8FF" align="center"><input type="submit" name="submit" class="register" value=""/></td>';
        $table.='</tr>';
        echo $table;
    }
}
?>
