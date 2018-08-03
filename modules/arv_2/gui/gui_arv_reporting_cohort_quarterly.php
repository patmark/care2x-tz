
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Quarterly Facility Based Cohort Reporting Form</title>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="Author" content="Patrick Mark">
        <script language="javascript" type="text/javascript">
            function gethelp(x, s, x1, x2, x3, x4)
            {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php<?php echo URL_APPEND; ?>&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790, height=540, menubar=no, resizable=yes, scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }

            function printOut()
            {
                urlholder = "./arv_reporting_cohort_quarterly.php?printout=TRUE&quarter=" +<?php echo $_GET['quarter'] ?> + "&year=" +<?php echo $_GET['year'] ?> + "&period=" +<?php echo $_GET['period'] ?>;
                testprintout = window.open(urlholder, "printout", "width=800,height=600,menubar=no,resizable=yes,scrollbars=yes");
                window.testprintout.moveTo(0, 0);
            }
        </script>
        <link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">
        <style type="text/css">
            <!-- 
            body {
                background-color:#ECF5FF;
            }

            h1 {
                color:black;
                margin-bottom:2px;
                font-size:20px;
                margin-left:15px;
                font-family: Arial, Helvetica, sans-serif;
            }

            h2 {
                color:black;
                margin-bottom:2px;
                font-size:16px;
                margin-left:15px;
                font-family: Arial, Helvetica, sans-serif;
            }

            .mainTable {
                margin-top:15px;
                margin-bottom:15px;
                width:764px;
                font-size:0.9em;
                border-collapse: collapse;
                background-color:white;
                margin-left:auto;
                margin-right: auto;
                font-family: Arial, Helvetica, sans-serif;
            }

            .mainTable td {
                border-bottom: 1px solid black;
            }

            .tittle_table {
                margin-top:15px;
                margin-bottom:15px;
                width:764px;
                font-size:13px;
                border-collapse: collapse;
                /*background-color:white;*/
                margin-left:auto;
                margin-right: auto;
                font-family: Arial, Helvetica, sans-serif;
            }

            .error {
                color:black;
                font-weight:bold;
                font-size:14px;
                border: 3px solid red;
                width:370px;
                padding:5px;
                margin:15px;
            }

            .timeframe {
                margin-top:20px;
                margin-left:15px;
                color:black;
                font-weight: bold;
                margin-bottom:15px;
            }

            .tableheading {
                font-weight: bold;
                font-size:12px;
                background-color: #b89f81;
            }

            .tableheading_center {
                font-weight: bold;
                font-size:12px;
                text-align:center;
                background-color: #e6cfbf;
            }
            .heading{
                width: 50px;
                font-weight: bold;
                font-size:12px;
                text-align: center;
                padding-left: 10px;
                padding-right: 10px;
            }
            .rep_left{
                font-size: 10.5px;
                width: 200px; 
            }
            .normal{
                font-size: 12px;
            }
            .center{
                text-align: center;
            }
            .center_bg{
                text-align: center;
                background-color: #e6cfbf;
            }
            .serial{
                font-size: 12;
                text-align: center;
                width: 25px;
            }
            -->
        </style>
    </head>
    <body>
        <?php if (!$_GET['printout']) { ?>
            <table cellspacing="0"  class="titlebar" border=0>
                <tr valign=top  class="titlebar" >
                    <td bgcolor="#99ccff" >
                        &nbsp;&nbsp;<font color="#330066">CTC NACP Cohort Reporting</font>
                    </td>

                    <td bgcolor="#99ccff" align=right>
                        <!--<a href="javascript:this.window.print();"><img src="../../gui/img/control/blue_aqua/en/en_printout.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>-->
                        <!--<a href="javascript:gethelp('arv_reporting_quarterly.php','Quarterly, Facility-Based HIV Care/ART Reporting Form')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>-->
                        <a href="javascript:gethelp('reporting_overview.php','Reporting :: Overview')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                        <a href="<?php echo $root_path . $breakfile . URL_APPEND; ?>" >
                            <img src="../../gui/img/control/blue_aqua/en/en_cancel.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)">
                        </a>
                    </td>
                </tr>
            </table>
            <form method="get" action="" name="select_form">
                <h1>Quarterly, Cohort Tracking Reporting Form</h1>																
                <div class="timeframe">
                    Cohorts Maturing in:&nbsp;
                    <select name="quarter" size="1">
                        <option <?php if ($_GET['quarter'] == 1) echo "selected=\"selected\""; ?> value="1">Jan-March</option>
                        <option <?php if ($_GET['quarter'] == 4) echo "selected=\"selected\""; ?> value="4">April-June</option>
                        <option <?php if ($_GET['quarter'] == 7) echo "selected=\"selected\""; ?> value="7">Jul-Sept</option>
                        <option <?php if ($_GET['quarter'] == 10) echo "selected=\"selected\""; ?> value="10">Oct-Dec</option>
                    </select>
                    Year
                    <select name="year" size="1"/>
                    <option <?php if ($_GET['year'] == $curr_year) echo "selected=\"selected\""; ?> value="<?php echo $curr_year ?>"> <?php echo $curr_year; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 1) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 1; ?>"> <?php echo $curr_year - 1; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 2) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 2; ?>"> <?php echo $curr_year - 2; ?></option>
                    </select>
                    </br></br>
                    Follow up period:&nbsp;
                    <select name="period" size="1"/>
                    <option <?php if ($_GET['period'] == 6) echo "selected=\"selected\""; ?> value="6">6</option>
                    <option <?php if ($_GET['period'] == 12) echo "selected=\"selected\""; ?> value="12">12</option>
                    <option <?php if ($_GET['period'] == 24) echo "selected=\"selected\""; ?> value="24">24</option>
                    <option <?php if ($_GET['period'] == 36) echo "selected=\"selected\""; ?> value="36">36</option>
                    <option <?php if ($_GET['period'] == 48) echo "selected=\"selected\""; ?> value="48">48</option>
                    <option <?php if ($_GET['period'] == 60) echo "selected=\"selected\""; ?> value="60">60</option>
                    <option <?php if ($_GET['period'] == 72) echo "selected=\"selected\""; ?> value="72">72</option>
                    </select>&nbsp; months
                    </br></br>
                    Cohorts of: &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="cohort-start_q" size="9" value="<?php echo isset($start_month_timestamp) ? date("F", $start_month_timestamp) . '-' . date("F", $end_month_timestamp) : ""; ?>" readonly>
                    <input type="text" name="cohort-start_yr" size="2" value="<?php echo isset($end_month_timestamp) ? date("Y", $end_month_timestamp) : ""; ?>" readonly>&nbsp;
                    <input type="submit" name="submit" value="show" />
                </div>

                <?php
            }else {
                echo '<head><script language="javascript"> this.window.print(); </script>';
            }
            if (($_GET['submit'] == 'show' && $cohort_rpt->ok) || ($printout && $cohort_rpt->ok)) :
                ?>
                <div align="center">

                    <h1><?php echo $arr_facility['main_info_facility_name'] ?></h1>
                    <h2>    
                        National Care and Treatment Programme Cohort Analysis Form
                    </h2>
                    <h2>
                        Baseline results <?php echo date("M Y", $start_month_timestamp) ?>
                        to <?php echo date("M Y", $end_month_timestamp) ?></br>

                        Follow-up results <?php echo date("M Y", $fu_start_month_timestamp) ?>
                        to <?php echo date("M Y", $fu_end_month_timestamp) ?>
                    </h2>
                    <h2>
                        Follow-up period <?php echo $_GET['period'] ?> months
                    </h2>

                </div>

                <table border="0" class="mainTable" cellspacing="2" cellpadding="4">
                    <tr>
                        <td class="serial"></td>
                        <td class="serial"></td>
                        <td class="rep_left"></td>
                        <td class="tableheading_center">Cohort <?php echo date("M y", $arr_c['baseline_start']); ?></td>
                        <td class="heading"><?php echo $_GET['period'] . ' mo ' . date("M y", $arr_c['follow_up_start']); ?></td>
                        <td class="tableheading_center">Cohort <?php echo date("M y", $arr_c['baseline_mid_start']); ?></td>
                        <td class="heading"><?php echo $_GET['period'] . ' mo ' . date("M y", $arr_c['follow_up_mid_start']); ?></td>
                        <td class="tableheading_center">Cohort <?php echo date("M y", $arr_c['baseline_end_start']); ?></td>
                        <td class="heading"><?php echo $_GET['period'] . ' mo ' . date("M y", $arr_c['follow_up_end_start']); ?></td>
                        <td class="tableheading_center">Total quarter baseline</td>
                        <td class="heading">Total quarter follow-up</td>
                    </tr>

                    <tr>
                        <td class="center">1</td>
                        <td class="center">G</td>
                        <td class="rep_left">Started on ART in this clinic - original cohort</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[1][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[1][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[1][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[1][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[1][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[1][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[1][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[1][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">2</td>
                        <td class="center">TI</td>
                        <td class="rep_left">Transfers in </td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[2][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[2][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[2][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[2][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[2][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[2][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[2][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[2][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">3</td>
                        <td class="center">TO</td>
                        <td class="rep_left">Transfers out </td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[3][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[3][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[3][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[3][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[3][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[3][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[3][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[3][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">4</td>
                        <td class="center">N</td>
                        <td class="rep_left">Net current cohort</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[4][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[4][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[4][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[4][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[4][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[4][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[4][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[4][8] ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="11" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">5</td>
                        <td class="center">H</td>
                        <td class="rep_left">On original 1st line regimen</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[5][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[5][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[5][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[5][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[5][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[5][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[5][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[5][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">6</td>
                        <td class="center">I</td>
                        <td class="rep_left">On alternate 1st line regimen (substituted)</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[6][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[6][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[6][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[6][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[6][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[6][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[6][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[6][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">7</td>
                        <td class="center">J</td>
                        <td class="rep_left">On 2nd line or other regimen (switched)</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[7][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[7][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[7][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[7][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[7][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[7][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[7][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[7][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">8</td>
                        <td class="center"></td>
                        <td class="rep_left">Current regimen unrecorded</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[8][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[8][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[8][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[8][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[8][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[8][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[8][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[8][8] ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="11" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">9</td>
                        <td class="center"></td>
                        <td class="rep_left">Stopped / current ARV status unrecorded</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[9][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[9][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[9][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[9][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[9][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[9][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[9][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[9][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">10</td>
                        <td class="center"></td>
                        <td class="rep_left">Died</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[10][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[10][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[10][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[10][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[10][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[10][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[10][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[10][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">11</td>
                        <td class="center"></td>
                        <td class="rep_left">Lost to follow up / did not visit for three months </td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[11][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[11][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[11][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[11][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[11][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[11][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[11][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[11][8] ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="11" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">12</td>
                        <td class="center"></td>
                        <td class="rep_left">Number of cohort alive and on ART</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[12][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[12][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[12][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[12][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[12][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[12][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[12][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[12][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">13</td>
                        <td class="center"></td>
                        <td class="rep_left">Percent of cohort alive and on ART</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[13][1] = ($arr_c[12][1] / $arr_c[4][1]) * 100 ?>%</span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[13][2] = ($arr_c[12][2] / $arr_c[4][2]) * 100 ?>%</span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[13][3] = ($arr_c[12][3] / $arr_c[4][3]) * 100 ?>%</span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[13][4] = ($arr_c[12][4] / $arr_c[4][4]) * 100 ?>%</span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[13][5] = ($arr_c[12][5] / $arr_c[4][5]) * 100 ?>%</span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[13][6] = ($arr_c[12][6] / $arr_c[4][6]) * 100 ?>%</span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[13][7] = ($arr_c[12][7] / $arr_c[4][7]) * 100 ?>%</span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[13][8] = ($arr_c[12][8] / $arr_c[4][8]) * 100 ?>%</span></td>
                    </tr>
                    <tr>
                        <td colspan="11" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">14</td>
                        <td class="center"></td>
                        <td class="rep_left">Number of patients with CD4 count</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[14][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[14][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[14][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[14][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[14][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[14][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[14][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[14][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">15</td>
                        <td class="center"></td>
                        <td class="rep_left">Median CD4</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[15][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[15][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[15][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[15][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[15][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[15][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[15][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[15][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">16</td>
                        <td class="center"></td>
                        <td class="rep_left">Number with CD4 > 200</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[16][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[16][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[16][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[16][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[16][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[16][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[16][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[16][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">17</td>
                        <td class="center"></td>
                        <td class="rep_left">Percent with CD4 > 200</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[17][1] = ($arr_c[16][1] / $arr_c[14][1]) * 100 ?>%</span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[17][2] = ($arr_c[16][2] / $arr_c[14][2]) * 100 ?>%</span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[17][3] = ($arr_c[16][3] / $arr_c[14][3]) * 100 ?>%</span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[17][4] = ($arr_c[16][4] / $arr_c[14][4]) * 100 ?>%</span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[17][5] = ($arr_c[16][5] / $arr_c[14][5]) * 100 ?>%</span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[17][6] = ($arr_c[16][6] / $arr_c[14][6]) * 100 ?>%</span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[17][7] = ($arr_c[16][7] / $arr_c[14][7]) * 100 ?>%</span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[17][8] = ($arr_c[16][8] / $arr_c[14][8]) * 100 ?>%</span></td>
                    </tr>
                    <tr>
                        <td colspan="11" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">18</td>
                        <td class="center"></td>
                        <td class="rep_left">Number Working</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[18][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[18][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[18][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[18][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[18][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[18][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[18][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[18][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">19</td>
                        <td class="center"></td>
                        <td class="rep_left">Number Ambulatory</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[19][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[19][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[19][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[19][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[19][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[19][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[19][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[19][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">20</td>
                        <td class="center"></td>
                        <td class="rep_left">Number Bedridden</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[20][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[20][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[20][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[20][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[20][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[20][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[20][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[20][8] ?></span></td>
                    </tr>
                    <tr>
                        <td class="center">21</td>
                        <td class="center"></td>
                        <td class="rep_left">Number functional status unrecorded</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[21][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[21][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[21][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[21][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[21][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[21][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[21][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[21][8] ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="11" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">22</td>
                        <td class="center"></td>
                        <td class="rep_left">Number who visited and were recorded on ARVs as many times as there are months</td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[22][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[22][2] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[22][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[22][4] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[22][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[22][6] ?></span></td>
                        <td class="center_bg"><span class="Stil6"><?php echo $arr_c[22][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_c[22][8] ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="11" bgcolor="#CCCCCC"></td>
                    </tr>
                    <?php if (!$_GET['printout']) { ?>
                        <tr>
                            <td colspan="11" align="center">                        
                                <a href="javascript:printOut()"><img border=0 src=<?php echo $root_path; ?>/gui/img/common/default/billing_print_out.gif></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php if (!$_GET['printout']) echo '<br><br><br><br>'; ?>

                <?php
            else :
                $cohort_rpt->getMessages();
            endif;
            ?>
        </form>

    </body>
</html>