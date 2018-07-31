<html>
    <head>

    </head>
</html>
<?php
require('./roots.php');
require($root_path . 'include/inc_environment_global.php');
$lang_tables[] = 'date_time.php';
$lang_tables[] = 'reporting.php';
require($root_path . 'include/inc_front_chain_lang.php');
require($root_path . 'language/en/lang_en_reporting.php');
require($root_path . 'language/en/lang_en_date_time.php');
require($root_path . 'include/inc_date_format_functions.php');
require_once($root_path . 'include/care_api_classes/class_tz_insurance.php');
require_once($root_path . 'include/care_api_classes/class_ward.php');
$ward_obj = new Ward;
$items = 'nr,name';
$TP_SELECT_BLOCK_IN = '';
$ward_info = $ward_obj->getAllWardsItemsObject($items);

$TP_SELECT_BLOCK_IN.='<select name="current_ward_nr" size="1"><option value="all_ipd">all</option>';
if (!empty($ward_info) && $ward_info->RecordCount()) {
    while ($station = $ward_info->FetchRow()) {
        $TP_SELECT_BLOCK_IN.='
								<option value="' . $station['nr'] . '" ';
        if (isset($current_ward_nr) && ($current_ward_nr == $station['nr']))
            $TP_SELECT_BLOCK.='selected';
        $TP_SELECT_BLOCK_IN.='>' . $station['name'] . '</option>';
    }
}
$TP_SELECT_BLOCK_IN.='</select>';

require_once($root_path . 'include/care_api_classes/class_department.php');
$dept_obj = new Department;
$medical_depts = $dept_obj->getAllMedical();
$TP_SELECT_BLOCK = '<select name="dept_nr" size="1"><option value="all_opd">all</option>';
$later_depts = $medical_depts;

while (list($x, $v) = each($medical_depts)) {
    $TP_SELECT_BLOCK.='
	<option value="' . $v['nr'] . '">';
    $buffer = $v['LD_var'];
    if (isset($$buffer) && !empty($$buffer))
        $TP_SELECT_BLOCK.=$$buffer;
    else
        $TP_SELECT_BLOCK.=$v['name_formal'];
    $TP_SELECT_BLOCK.='</option>';
}
$TP_SELECT_BLOCK.='</select>';



$insurance_obj = new Insurance_tz;

#Load and create paginator object
require_once($root_path . 'include/care_api_classes/class_tz_reporting.php');
/**
 * getting summary of OPD...
 */
$rep_obj = new selianreport();


//require_once('include/inc_timeframe.php');
/**
 * Getting the timeframe...
 */
$debug = FALSE;
$PRINTOUT = FALSE;
$EXPORT = FALSE;

if(isset($_POST['show'])){
    $msg="";
    $error=FALSE;
    if($_POST['date_from']=="" || $_POST['date_to']==""){

       $msg="PLEASE ENTER DATE";
       $error=TRUE;
       

    } else if($_POST['date_from']>$_POST['date_to']){
        $msg="DATE FROM MUST BE GREATER";
        $error=TRUE;

    }else{

       $MysqlDateFrom= @formatDate2STD($_POST['date_from'],$date_format);
       $MysqlDateTo=@formatDate2STD($_POST['date_to'],$date_format);
       

       switch ($_POST['insurance']) {
           case '-2':
               $insurance="";
               $ins_name='All Insurance Companies';
               break;
           case '-1':
               $insurance="AND insurance_id=".'0'; 
               $ins_name='CASH';   
                   break; 

           
           default:
               $insurance="AND insurance_id=".$_POST['insurance'];
               $sql_insurancename = "SELECT name FROM care_tz_company where id='".$_POST['insurance']."'";
                $insurance_name = $db->Execute($sql_insurancename);
                $sql_insurancename = $insurance_name->FetchRow();
                $ins_name = $sql_insurancename['name'];
               break;
       }

     switch ($_POST['admission_id']) {
         case 'all_opd_ipd':
             $admission="";
             $admissionname='All OPD and IPD';
             break;
         case '1':
         if($_POST['current_ward_nr']=='all_ipd'){
            $admission="AND encounter_class_nr=".'1';
            $admissionname='All IPD';
         }else{
            $admission="AND current_ward_nr =".$_POST['current_ward_nr']; 
            $sql_ward_name="SELECT name FROM care_ward WHERE nr=".$_POST['current_ward_nr'];
            $result=$db->Execute($sql_ward_name);
            if($wname=$result->FetchRow()){
                $admissionname=$wname['name'];
                
            }
            
         }  
         break;

         case '2':
            if ($_POST['dept_nr']=='all_opd') {
                $admission="AND encounter_class_nr=".'2';
                $admissionname='All OPD';
              }else{
                $admission="AND current_dept_nr=".$_POST['dept_nr'];
                $sql_dept_name="SELECT name_formal FROM care_department WHERE nr=".$_POST['dept_nr'];
                $result=$db->Execute($sql_dept_name);
                if($row_deptname=$result->FetchRow()){
                  $admissionname=$row_deptname['name_formal'];

                }

              }  
               break;  
         
         default:
             $admission="";
             break;
     }



    }

}

require_once('gui/gui_reporting_pharmacy_stock.php');
?>
