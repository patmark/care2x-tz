<?php
if ($printout) {

 echo '<head>
<script language="javascript"> this.window.print(); </script>
<title>' . $LDMinorProcReport . '</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>';
//query to pull data from the database, two tables are joined
//care_tz_billing_archive_elem and care_tz_drugsandservices

//check payment type
switch($insurance_type){
   case 0:
    $ins_id='AND insurance_id="0"';
    break;

   case 1:
   $ins_id='AND insurance_id>"0"';
   break;
   
   default:
   $ins_id='AND insurance_id="0"';
   
    
}


//message for payment type
switch($ins_id){
   case 'AND insurance_id="0"':
   $message = 'CASH CUSTOMERS';
   break;
   
   case 'AND insurance_id>"0"':
   $message = 'CREDIT CUSTOMERS';
   break;

   default:
   $message = 'CASH CUSTOMERS';

}



$sql="SELECT  FROM_UNIXTIME(bae.date_change) AS tarehe, bae.description,count(bae.description) AS qty,bae.price
      FROM care_tz_billing_archive_elem AS bae INNER JOIN care_tz_drugsandservices AS drp ON bae.item_number=drp.item_id    
      WHERE bae.date_change  
      BETWEEN $date_from_timestamp AND $date_to_timestamp $ins_id AND drp.purchasing_class='minor_proc_op' 
      GROUP BY FROM_UNIXTIME(bae.date_change,'%d-%m-%Y'), bae.description";

?>
<DIV align="center">
<h2><?php echo $message.''.'<h1> '.$LDFrom.' '.date('d-m-Y H:i:s',$date_from_timestamp).' '.' '.$LDto.' '.date('d-m-Y H:i:s',$date_to_timestamp);?><h1>
</DIV>
<table border="1" cellspacing="0" cellpadding="2" align="center" bgcolor=#ffffdd>
<?php
echo '<tr>';
echo '<th><b>'.$LDDate.'</th>';
echo '<th><b>'.$LDDescription.'</th>';
echo '<th><b>'.$LDNOofTests.'</th>';
echo '<th><b>'.$LDUnitPrice.'</th>';
echo '<th><b>'.$LDTotal.'</th>';
echo '</tr>';
$data = array();
$result=$db->Execute($sql);
while($rows=$result->fetchRow()){
$data['minor_proc_op'][]=$rows;
}
$count=count($data['minor_proc_op']);
$grand_total=0;
for($i=0; $i<$count; $i++){
$date=date('d.m.Y',strtotime($data['minor_proc_op'][$i]['tarehe']));
echo '<tr>';
echo '<td>'.$date.'</td>';
echo '<td>'.$data['minor_proc_op'][$i]['description'].'</td>';
echo '<td>'.$data['minor_proc_op'][$i]['qty'].'</td>';
echo '<td>'.number_format($data['minor_proc_op'][$i]['price'],2).'</td>';
echo '<td>'.number_format($data['minor_proc_op'][$i]['qty']*$data['minor_proc_op'][$i]['price'],2).'</td>';
echo '</tr>';
$grand_total=$grand_total+($data['minor_proc_op'][$i]['qty']*$data['minor_proc_op'][$i]['price']);
}
echo '<tr>';
echo '<td colspan="4"><b>'.$LDgrand_total.'</td>'.'<td><b>'.number_format($grand_total,2).'</td>';
echo '</tr>';


 
echo '</table>';

    
   ?>
 
<?php
    exit();
}
?>



<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<HTML>
    <HEAD>
        <TITLE><?php echo $LDReportingModule; ?></TITLE>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta name="Author" content="Israel Pascal">
        <meta name="Generator" content="various: Quanta, AceHTML 4 Freeware, NuSphere, PHP Coder">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <script language="javascript" >

            function gethelp(x, s, x1, x2, x3, x4)
            {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php?sid=<?php echo sid; ?>&lang=$lang&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }
            function printOut()
            {
                urlholder = "./obgyne_surgeries_report.php?printout=TRUE&start=<?php echo $_POST['date_from']; ?>&end=<?php echo $_POST['date_to']; ?>&insurance_type=<?php echo $_POST['paytype'];?>";
                testprintout = window.open(urlholder, "printout", "width=800,height=600,menubar=no,resizable=yes,scrollbars=yes");
                window.testprintout.moveTo(0, 0);
            }
            function patientsList(doctor) {
//                alert(doctor);
                urlholder = "./docs_util_report_patients.php?doctor=" + doctor + "&start=<?php echo $startdate; ?>&end=<?php echo $enddate; ?>";
                patientswin = window.open(urlholder, "patientslist", "width=1020,height=600,menubar=yes,resizable=yes,scrollbars=yes");
                window.patientswin.moveTo(0, 0);
            }
<?php require($root_path . 'include/inc_checkdate_lang.php'); ?>

        </script> 

        <script language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>
        <script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>
        <script language="javascript" src="<?php echo $root_path; ?>js/dtpick_care2x.js"></script>
        <script src="<?php print $root_path; ?>/include/_jquery.js" language="javascript"></script> 

        <link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
        <script language="javascript" src="../../js/hilitebu.js"></script>

        <STYLE TYPE="text/css">
            A:link  {color: #000066;}
            A:hover {color: #cc0033;}
            A:active {color: #cc0000;}
            A:visited {color: #000066;}
            A:visited:active {color: #cc0000;}
            A:visited:hover {color: #cc0033;}
        </style>
        <script language="JavaScript">

            function popPic(pid, nm) {

                if (pid != "")
                    regpicwindow = window.open("../../main/pop_reg_pic.php?sid=<?php echo sid; ?>&lang=$lang&pid=" + pid + "&nm=" + nm, "regpicwin", "toolbar=no,scrollbars,width=180,height=250");

            }


        </script> 
    </HEAD>

    <BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066  >

        <!-- START HEAD OF HTML CONTENT -->


        <table width=100% border=0 cellspacing=0 height=100%>
            <tbody class="main">

                <tr>

                    <td  valign="top" align="middle" height="35">
                        <table cellspacing="0"  class="titlebar" border=0>
                            <tr valign=top  class="titlebar" >
                                <td width="302" bgcolor="#99ccff" > &nbsp;&nbsp;<font color="#330066"><?php echo $LDMinorProcReport; ?></font></td>
                                <td width="408" align=right bgcolor="#99ccff">
                                    <a href="javascript: history.back();"><img src="../../gui/img/control/blue_aqua/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a>
                                    <a href="javascript:gethelp('reporting_overview.php','Reporting :: Overview')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                                    <a href="<?php echo $root_path; ?>modules/reporting_tz/reporting_main_menu.php" ><img src="../../gui/img/control/blue_aqua/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>  
                                </td>
                            </tr>
                        </table>	

                        <!-- END HEAD OF HTML CONTENT -->

                        <form name="form1" method="post" action=""></p>
                            <?php require_once($root_path . $top_dir . 'include/inc_gui_timeframe_date_procedures.php'); ?>


</form>
<?php
//check if date is specified
if(!$_POST['date_from'] || !$_POST['date_to']){
$date_from_timestamp = strtotime(str_replace('/', '-', date("d/m/Y 00:00:00")));
$date_to_timestamp   = strtotime(str_replace('/', '-', date("d/m/Y 23:59:59")));

   
   

}else{

//pick date for user selection and change to timestamp
$date_from_timestamp = strtotime(str_replace('/', '-', $_POST['date_from'].' '.'00:00:00'));
$date_to_timestamp   = strtotime(str_replace('/', '-', $_POST['date_to'].' '.'23:59:59'));


}

//check payment type
switch($_POST['paytype']){
   case 0:
    $ins_id='AND insurance_id=0';
    break;

   case 1:
   $ins_id='AND insurance_id>0';
   break;
   
   default:
   $ins_id='AND insurance_id=0';
   
    
}

//message for payment type
switch($ins_id){
   case 'AND insurance_id=0':
   $message = 'CASH CUSTOMERS';
   break;
   
   case 'AND insurance_id>0':
   $message = 'CREDIT CUSTOMERS';
   break;

   default:
   $message = 'CASH CUSTOMERS';

}




//query to pull data from the database, two tables are joined
//care_tz_billing_archive_elem and care_tz_drugsandservices

$sql="SELECT  FROM_UNIXTIME(bae.date_change) AS tarehe, bae.description,count(bae.description) AS qty,bae.price
      FROM care_tz_billing_archive_elem AS bae INNER JOIN care_tz_drugsandservices AS drp ON bae.item_number=drp.item_id    
      WHERE bae.date_change  
      BETWEEN $date_from_timestamp AND $date_to_timestamp $ins_id AND drp.purchasing_class='minor_proc_op' 
      GROUP BY FROM_UNIXTIME(bae.date_change,'%d-%m-%Y'), bae.description";

?>
<DIV align="center">
<h2><?php echo $message.''.'<h1> '.$LDFrom.' '.date('d-m-Y H:i:s',$date_from_timestamp).' '.' '.$LDto.' '.date('d-m-Y H:i:s',$date_to_timestamp);?><h1>
</DIV>
<table border="1" cellspacing="0" cellpadding="2" align="center" bgcolor=#ffffdd>
<?php
echo '<tr>';
echo '<th><b>'.$LDDate.'</th>';
echo '<th><b>'.$LDDescription.'</th>';
echo '<th><b>'.$LDNOofTests.'</th>';
echo '<th><b>'.$LDUnitPrice.'</th>';
echo '<th><b>'.$LDTotal.'</th>';
echo '</tr>';
$data = array();
$result=$db->Execute($sql);
while($rows=$result->fetchRow()){
$data['minor_proc_op'][]=$rows;
}
$count=count($data['minor_proc_op']);
$grand_total=0;
for($i=0; $i<$count; $i++){
$date=date('d.m.Y',strtotime($data['minor_proc_op'][$i]['tarehe']));
echo '<tr>';
echo '<td>'.$date.'</td>';
echo '<td>'.$data['minor_proc_op'][$i]['description'].'</td>';
echo '<td>'.$data['minor_proc_op'][$i]['qty'].'</td>';
echo '<td>'.number_format($data['minor_proc_op'][$i]['price'],2).'</td>';
echo '<td>'.number_format($data['minor_proc_op'][$i]['qty']*$data['minor_proc_op'][$i]['price'],2).'</td>';
echo '</tr>';
$grand_total=$grand_total+($data['minor_proc_op'][$i]['qty']*$data['minor_proc_op'][$i]['price']);
}
echo '<tr>';
echo '<td colspan="4"><b>'.$LDgrand_total.'</td>'.'<td><b>'.number_format($grand_total,2).'</td>';
echo '</tr>';


 
echo '</table>';
?>
<a href="javascript:printOut()"><img border=0 src=<?php echo $root_path; ?>/gui/img/common/default/billing_print_out.gif></a><br>									  
                        <br><br><br>  <br><br><br>

                           
                        <!-- START BOTTIOM OF HTML CONTENT --->
                        <table width="100%" border="0" cellspacing="0" cellpadding="1" bgcolor="#cfcfcf">
                            <tr>
                                <td align="center">
                                    <table width="100%" bgcolor="#ffffff" cellspacing=0 cellpadding=5>
                                        <tr>
                                            <td>
                                                <div class="copyright">
                                                    <script language="JavaScript">
            <!-- Script Begin
                                                    function openCreditsWindow() {

                urlholder = "../../language/$lang/$lang_credits.php?lang=$lang";
                creditswin = window.open(urlholder, "creditswin", "width=500,height=600,menubar=no,resizable=yes,scrollbars=yes");

            }
            //  Script End -->
                                                    </script>


                                                    <a href="http://www.luico.co.tz" target=_new>CARE2X 3rd Generation pre-deployment 3.3</a> :: <a href="../../legal_gnu_gpl.htm" target=_new> License</a> ::
                                                    <a href=mailto:care2x@luico.co.tz>Contact</a>  :: <a href="../../language/en/en_privacy.htm" target="pp"> Our Privacy Policy </a> ::
                                                    <a href="../../docs/show_legal.php?lang=$lang" target="lgl"> Legal </a> ::
                                                    <a href="javascript:openCreditsWindow()"> Credits </a> ::.<br>

                                                </div>
                                            </td>
                                        <tr>
                                    </table>
                                </td>
                            </tr>
                        </table>


                        <!-- START BOTTIOM OF HTML CONTENT --->

                        </BODY> 

