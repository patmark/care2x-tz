
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Quarterly Facility Based HIV CARE/ART Reporting Form</title>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="Author" content="Patrick Mark">
        <script language="javascript" type="text/javascript">
            function gethelp(x, s, x1, x2, x3, x4)
            {
                if (!x)
                    x = "";
                urlholder = "../../main/help-router.php<?php echo URL_APPEND; ?>&helpidx=" + x + "&src=" + s + "&x1=" + x1 + "&x2=" + x2 + "&x3=" + x3 + "&x4=" + x4;
                helpwin = window.open(urlholder, "helpwin", "width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
                window.helpwin.moveTo(0, 0);
            }

            function printOut()
            {
                urlholder = "./arv_reporting_quarterly.php?printout=TRUE&quarter=" +<?php echo $_GET['quarter'] ?> + "&year=" +<?php echo $_GET['year'] ?>;
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
                margin-bottom:5px;
                font-size:20px;
                margin-left:15px;
                font-family: Arial, Helvetica, sans-serif;
            }

            h2 {
                color:black;
                margin-bottom:5px;
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
                border:1px solid black;
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
                background-color: #b89f81;
            }
            .heading{
                font-weight: bold;
                font-size:12px;  
            }
            .rep_left{
                font-size: 10.5px;
                width: 40%; 
            }
            .normal{
                font-size: 12px;
            }
            .center{
                text-align: center;
            }
            -->
        </style>
    </head>
    <body>
        <?php if (!$_GET['printout']) { ?>
            <table cellspacing="0"  class="titlebar" border=0>
                <tr valign=top  class="titlebar" >
                    <td bgcolor="#99ccff" >
                        &nbsp;&nbsp;<font color="#330066">CTC Reporting Form</font>
                    </td>

                    <td bgcolor="#99ccff" align=right>
                        <!--<a href="javascript:this.window.print();"><img src="../../gui/img/control/blue_aqua/en/en_printout.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>-->
                        <a href="javascript:gethelp('arv_reporting_quarterly.php','Quarterly, Facility-Based HIV Care/ART Reporting Form')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a><a
                            href="<?php echo $root_path . $breakfile . URL_APPEND; ?>" >
                            <img src="../../gui/img/control/blue_aqua/en/en_cancel.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)">
                        </a>
                    </td>
                </tr>
            </table>
            <form method="get" action="" name="select_form">
                <h1>Quarterly, Facility-Based HIV Care/ART Reporting Form</h1>																
                <div class="timeframe">
                    Quarter
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
                    <input type="submit" name="submit" value="show" />
                </div>

                <?php
            }else {
                echo '<head><script language="javascript"> this.window.print(); </script>';
            }
            if (($_GET['submit'] == 'show' && $arv_report->ok) || ($printout && $arv_report->ok)) :
                ?>
                <div align="center">

                    <h1>
                        United Republic of Tanzania</br>
                        Ministry of Health and Social Welfare</br>
                        National Care and Treatment Programme</h1>
                    <h2>    
                        Quarterly Facility-based HIV care/ART Reporting Form
                    </h2>

                </div>

                <table class="tittle_table">
                    <tr>
                        <td>Quarter    beginning (dd-mm-yyyy): <?php echo date("d-m-Y", $start_month_timestamp); ?></td>
                        <td>Quarter ending (dd-mm-yyyy): <?php echo date("d-m-Y", $end_month_timestamp); ?></td>
                    </tr>
                    <tr>
                        <td>Facility Name: <?php echo $arr_facility['main_info_facility_name'] ?></td>
                        <td>( )Public ( )Private ( )FBO ( )Other (specify)_________
                        </td>
                    </tr>
                    <tr>
                        <td>District: <?php echo $arr_facility['main_info_facility_district'] ?></td>
                        <td>Name of Person Reporting: ________________________</td>
                    </tr>
                </table>
                <table border="0" class="mainTable" cellspacing="0">
                    <tr>
                        <td class="heading" rowspan="2">Indicator</td>
                        <td class="heading" rowspan="2">Total</td>
                        <td class="heading" colspan="5">Males</td>
                        <td class="heading" colspan="6">Females</td>
                    </tr>
                    <tr>
                        <td class="heading">Total</td>
                        <td class="heading"><1 year</td>
                        <td class="heading">1-4 years</td>
                        <td class="heading">5-14 years</td>
                        <td class="heading">>=15 years</td>
                        <td class="heading">Total</td>
                        <td class="heading"><1 year</td>
                        <td class="heading">1-4 years</td>
                        <td class="heading">5-14 years</td>
                        <td class="heading">>=15 years</td>
                        <td class="heading">Pregnant women</td>
                    </tr>

                    <tr>
                        <td colspan="13" class="tableheading"><span class="Stil6">1. HIV CARE (Pre ART and ART)</span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">1.1 Cumulative number of persons ever enrolled in care at this
                            facility at beginning of the reporting quarter</td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[1][11] ?></span></td>
                        <!--<td class="center"><span class="Stil6"><?php // echo $arr_r1[1][12]               ?></span></td>-->
                    </tr>
                    <tr>
                        <td class="rep_left">1.2 Number of persons NEWLY enrolled in HIV care at this facility
                            during the reporting quarter (EXCLUDE TI)
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][11] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[2][12] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">1.3 Cumulative number of persons ever enrolled in care at this 
                            facility at the end of the reporting quarter 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[3][11] ?></span></td>
                        <!--<td class="center"><span class="Stil6"><?php // echo $arr_r1[3][12]              ?></span></td>-->
                    </tr>
                    <tr>
                        <td class="rep_left">1.4 Number of persons who received care during the reporting 
                            quarter 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][11] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[4][12] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">1.5 Number of persons who received cotrimoxazole during the 
                            reporting quarter (subset of received care) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][11] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[5][12] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">1.6 Number of persons screened for TB in the reporting quarter 
                            (subset of received care) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[6][1] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">1.7 Number of persons who started on TB treatment (Pre ART and 
                            ART) (subset of received care) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[7][1] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">1.8 Number of HIV positive clinically malnourished persons 
                            identified during the quarter (subset of received care) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][11] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[8][12] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">1.9 Number of HIV positive clinically malnourished received 
                            therapeutic and/or supplementary food (subset of malnourished) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][11] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[9][12] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">1.10 Number medically eligible for ART but not yet started (subset 
                            of pre-ART) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r1[10][1] ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="13" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td colspan="13" class="tableheading">2. ART (Subset of HIV care)</td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.1 Cumulative number of persons ever started ART at this facility
                            at beginning of the reporting quarter
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[1][11] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.2 Persons newly initiated on ART at this facility during the
                            reporting quarter (EXCLUDE TI)
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][11] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[2][12] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.3 Cumulative number of persons ever started on ART at this 
                            facility at the end of the reporting quarter 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[3][11] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.4 Number of persons who are on 1st line regimen during the 
                            reporting period (subset of total) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[4][11] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.5 Number of persons who are on 2nd line regimen during the 
                            reporting period (subset of total) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[5][11] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.6 Number of persons who are on other regimens during the 
                            reporting period (subset of total) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][11] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[6][12] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.7 Number of persons currently on ART but current regimen 
                            unrecorded 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[7][11] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.8 Current number of persons on ART at the end of the quarter 
                            (total of 1st line, 2nd line, other and unrecorded regimen) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[8][11] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.9 Current number of persons on ART at the end of the quarter 
                            who started ART at this facility (exclude TI) 
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][1] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][2] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][3] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][4] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][5] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][6] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][7] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][8] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][9] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][10] ?></span></td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[9][11] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">2.10 Number of persons on ART and already enrolled in the
                            program who transferred into facility during the reporting period
                        </td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r2[10][1] ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="13" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="tableheading" colspan="13">ART FOLLOW UP: Persons who started on ART at the facility who were not on ART at the end of the quarter</td>
                    </tr>
                    <tr>
                        <td colspan="13" bgcolor="#CCCCCC"></td>
                    </tr>

                    <tr>
                        <td class="rep_left">1. Stopped ART</td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r3[1] ?></span></td>
                        <td colspan="11" rowspan="5" class="normal" style="padding-left: 50px">
                            Name of Person Reviewing Report</br>
                            __________________________________</br></br>
                            Date: ____/____/________

                        </td>
                    </tr>
                    <tr>
                        <td class="rep_left">2. Transferred out</td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r3[2] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">3. Death</td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r3[3] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">4. Lost to follow-up</td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r3[4] ?></span></td>
                    </tr>
                    <tr>
                        <td class="rep_left">5. Total</td>
                        <td class="center"><span class="Stil6"><?php echo $arr_r3[5] ?></span></td>
                    </tr>
                    <tr>
                        <td colspan="13" bgcolor="#CCCCCC"></td>
                    </tr>
                    <?php if (!$_GET['printout']) { ?>
                        <tr>
                            <td colspan="13" align="center">                        
                                <a href="javascript:printOut()"><img border=0 src=<?php echo $root_path; ?>/gui/img/common/default/billing_print_out.gif></a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <?php if (!$_GET['printout']) echo '<br><br><br><br>'; ?>

                <?php
            else :
                $arv_report->getMessages();
            endif;
            ?>
        </form>

    </body>
</html>