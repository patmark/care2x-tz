<?php
if ($PRINTOUT) {
    echo '<head>
 <script language="javascript"> this.window.print(); </script>
<title>' . $LDReportingModule . '</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<STYLE TYPE="text/css">
.report{
font-size: 10px;
border-collapse:collapse;
}

</STYLE>
</head>';
    ?>

    <?php
//        echo 'lklklkl';
//    echo $_GET['dept_nr'];
   // $rep_obj->Detailed_Revenue($_GET['start'], $_GET['end'], $_GET['company'], $_GET['in_out_patient'], $_GET['dept_nr'], $_GET['insurance'], 1);
    //exit();
}
?>



<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 3.0//EN" "html.dtd">
<HTML>
    <HEAD>
        <TITLE><?php echo $LDReportingModule; ?></TITLE>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta name="Author" content="Robert Meggle">
        <meta name="Generator" content="various: Quanta, AceHTML 4 Freeware, NuSphere, PHP Coder">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

        <script language="javascript" >
<!-- 
            function gethelp(x, s, x1, x2, x3, x4)
            {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php?sid=<?php echo sid; ?>&lang=$lang&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }
            function printOut(admission_id, dept, insurance)
            {
                urlholder = "./DetailedRevenue.php?printout=TRUE&start=<?php echo $selected_date_from; ?>&end=<?php echo $selected_date_to; ?>&company=<?php echo $company; ?>&in_out_patient=" + admission_id + "&dept_nr=" + dept + "&insurance=" + insurance;
                testprintout = window.open(urlholder, "printout", "width=800,height=600,menubar=no,resizable=yes,scrollbars=yes");
                window.testprintout.moveTo(0, 0);
            }



//-->
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

            .report{
                font-size: 10px;
                border-collapse:collapse;
            }


        </style>
        <script language="JavaScript">
            <!--
        function popPic(pid, nm) {

                if (pid != "")
                    regpicwindow = window.open("../../main/pop_reg_pic.php?sid=<?php echo sid; ?>&lang=$lang&pid=" + pid + "&nm=" + nm, "regpicwin", "toolbar=no,scrollbars,width=180,height=250");

            }
            // -->
        </script>

        <script language="JavaScript">
            function popdepts() {
                var x = document.getElementById("admission_id").value;
                if (x == 1) {
                    document.getElementById("dept").innerHTML =<?php echo json_encode($TP_SELECT_BLOCK_IN); ?>

                } else if (x == 2) {
                    document.getElementById("dept").innerHTML =<?php echo json_encode($TP_SELECT_BLOCK); ?>
                } else if (x == "all_opd_ipd") {

                    document.getElementById("dept").innerHTML = "all_opd_ipd";
                }
            }
        </script>		 
        <script language="JavaScript">
            var u = true;
            function validate() {
                if (document.getElementById('date_from').value == '') {
                    alert('Date from is needed');
                    document.getElementById('date_from').focus();
                    u = false;
                } else if (document.getElementById('date_to').value == "") {
                    alert('Date to is needed');
                    document.getElementById('date_to').focus();
                    u = false;
                } else {
                    return true;
                }

            }

        </script>
    </HEAD>

    <BODY bgcolor=#ffffff link=#000066 alink=#cc0000 vlink=#000066  >

        <!-- START HEAD OF HTML CONTENT -->
        <table width=100% border=0 cellspacing=0>
            <tbody class="main">

                <tr>
                    <td  valign="top" align="middle" height="35">
                        <table cellspacing="0"  class="titlebar" border=0>
                            <tr valign=top  class="titlebar" >
                                <td width="202" bgcolor="#99ccff" >
                                    &nbsp;&nbsp;<font color="#330066"><?php echo $LDDetailedRevenue; ?></font></td>
                                <td width="408" align=right bgcolor="#99ccff">
                                    <a href="javascript: history.back();"><img src="../../gui/img/control/default/en/en_back2.gif" border=0 width="110" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)" ></a>
                                    <a href="javascript:gethelp('reporting_overview.php','Reporting :: Overview')"><img src="../../gui/img/control/default/en/en_hilfe-r.gif" border=0 width="75" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                                    <a href="<?php echo $root_path; ?>modules/reporting_tz/reporting_main_menu.php" ><img src="../../gui/img/control/default/en/en_close2.gif" border=0 width="103" height="24" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>  
                                </td>
                            </tr>
                        </table>




                        <form name="form2" method="post" action="" ">

                          <table width="59%" border="0" align="center">



                          <input type="text" name="date_from" id="date_from" size=10 maxlength=10 value="<?php echo $_POST['date_from'] ?>" >

                           <a href="javascript:show_calendar('form2.date_from','<?php echo date_format('d-m-Y'); ?>')">
                           <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>


                           <input type="text" name="date_to" id="date_to" size=10 maxlength=10 value="<?php echo $_POST['date_to'] ?>" >

                           <a href="javascript:show_calendar('form2.date_to','<?php echo date_format('d-m-Y'); ?>')">
                           <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>></a>

                           <input type="text" name="nr" id="nr" placeholder="Receipt#" size=5 value="<?php echo $_POST['nr'];?>">
                           

                           <?php
                           
                            // dates today and last month 
                            $Today = date('Y-m-d');
                            $LastMonth = date('Y-m-d',strtotime("-1 month",strtotime($Today)));

                            //add seconds to today and last month, will be used in billing table   
                            $LastMonthS=$LastMonth.' 00:00:00';
                            $TodayS=$Today.' 23:59:59';
                            
                            //convert dates into timestamp
                            $LastMonthTimeStamp=strtotime($LastMonthS);
                            $TodayTimeStamp=strtotime($TodayS);

                            //assign date if date is not set
                            if(empty($_POST['date_from']) || empty($_POST['date_to'])){
                                $DateFromS=$LastMonthTimeStamp;
                                $DateToS=$_POST['date_to']=$TodayTimeStamp;



                                
                            }else{

                              $date1=$_POST['date_from'].' 00:00:00';
                              $date2=$_POST['date_to'].' 23:59:59';

                              $DateFromS=strtotime($date1);
                              $DateToS=strtotime($date2);

                              //echo date('Y-m-d H:i:s',$Date1TimeStamp).'<br>'.date('Y-m-d H:i:s',$Date2TimeStamp);                           


                            }


                            $DateCreteria='';
                            $bill_nr='';
                            if(empty($_POST['nr'])){
                            $DateCreteria='be.date_change  BETWEEN "'.$DateFromS.'" AND "'.$DateToS.'"';
                            }else{
                                $bill_nr='be.nr='.$_POST['nr'];
                            }

                            $SQL="SELECT FROM_UNIXTIME(be.date_change) as tarehe, concat(cp.name_first,' ', cp.name_last) as names,cp.selian_pid,cb.encounter_nr,cp.date_birth,cp.sex,cp.phone_1_nr,CASE WHEN be.insurance_ID='0' THEN 'Cash-Patient' ELSE insr.name END as healthfund,be.User_Id,sum(be.amount*be.price) as total,be.nr FROM care_person cp INNER JOIN care_encounter as ce ON ce.pid=cp.pid INNER JOIN care_tz_billing as cb ON cb.encounter_nr=ce.encounter_nr INNER JOIN care_tz_billing_elem as be ON be.nr=cb.nr INNER JOIN care_tz_company as insr ON insr.id=cp.insurance_ID WHERE $DateCreteria $bill_nr GROUP BY be.nr ORDER BY tarehe Desc";    

                            $RESULT=$db->Execute($SQL);        
                       
                            

                       ?>
            
                             <input type="submit" name="show" value="show">

                              <table border="1" class="report">
                                <tr><td bgcolor="lightblue" colspan="10"></td></tr>
                                <tr><th colspan="10"><?php echo date('d-m-Y H:i:s',$DateFromS).' To: '.date('d-m-Y H:i:s',$DateToS);?></th></tr>

                                  <tr><td bgcolor="lightblue" colspan="10"></td></tr>
                                <tr>
                                    <th>Rec</th>
                                    <th>Date</th>
                                    <th>Names</th>
                                    <th>FileNr.</th>
                                    <th>VisitNo</th>
                                    <th>Sex</th>
                                    <th>Phone</th>
                                    <th>Health Fund</th>
                                    <th>Total</th>
                                    <th>Cashier</th>
                                </tr>



                          			

                            <?php 

                            /*altenate color/
                             for($i=0;$i < 10;$i++){
                             $bg_color = $i % 2 === 0 ? "green" : "blue";
                            echo "<tr style='background-color: ". $bg_color .";'><td>What's Up ?</td><td>Sky (Troll Face)</td></tr>";
                             }
                             */

                            // echo $RESULT->RecordCount();

                             $NumRow=$RESULT->RecordCount();

                             for($i=0; $i < $NumRow; $i++){
                                $bg_color = $i % 2 === 0 ? "lightblue" : "lightgrey";

                                $row=$RESULT->FetchRow();

                                ?>
                                <tr bgcolor="<?php echo $bg_color;?>">
                                    <td><?php echo ($row['nr']) ;?></td>
                                    <td><?php echo date('d.m.Y H:i:s',strtotime($row['tarehe']) );?></td>
                                    <td><?php echo strtoupper($row['names']) ;?></td>
                                    <td><?php echo ($row['selian_pid']) ;?></td>
                                    <td><?php echo ($row['encounter_nr']) ;?></td>
                                    <td><?php echo ($row['sex']) ;?></td>
                                    <td><?php echo ($row['phone_1_nr']) ;?></td>
                                    <td><?php echo ($row['healthfund']) ;?></td>
                                    <td><?php echo ($row['total']) ;?></td>
                                    <td><?php echo ($row['User_Id']) ;?></td>
                                    

                                </tr>

                                <?php






                             }
                            ?>
                           

                                
                                
                            </table>
                            </table>
                            
                            <!-- &nbsp;&nbsp;
                             <a href="./gui/downloads/detailed_revenue.csv"><img border=0 src=<?php //echo $root_path;                 ?>/gui/img/common/default/savedisk.gif></a>-->
                        </form>
                        <table width=100% border=0 cellspacing=0 height="30">
                            <tr valign=top>
                                <td width="408" align=center bgcolor="#99ccff">
                                    <a href="javascript:printOut('<?php echo $_POST['admission_id']; ?>',<?php echo $dept_nr; ?>,<?php echo $insurance; ?>)"><img border=0 src="<?php echo $root_path; ?>gui/img/common/default/billing_print_out.gif"></a>     
                                </td>
                            </tr>
                        </TABLE>
                </TR>
            </TBODY>
        </TABLE>
    </body>
</html>









