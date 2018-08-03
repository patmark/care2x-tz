
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Two Years Facility Based Cohort Reporting Form</title>
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
                urlholder = "./arv_reporting_six_cohorts.php?printout=TRUE&month=" +<?php echo $_GET['month'] ?> + "&year=" +<?php echo $_GET['year'] ?>;
                testprintout = window.open(urlholder, "printout", "width=940,height=800,menubar=no,resizable=yes,scrollbars=yes");
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
                width:1080px;
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
                width:1080px;
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
                font-size:10px;
                background-color: #b89f81;
            }

            .tableheading_center {
                width: 50px;
                font-weight: bold;
                font-size:10px;
                text-align:center;
                background-color: #e6cfbf;
            }
            .heading{
                width: 50px;
                font-weight: bold;
                font-size:10px;
                text-align: center;
                /*                padding-left: 2px;
                                padding-right: 2px;*/
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
                font-size: 10px;
                padding-top: 3px;
                padding-bottom: 3px;
            }
            .center_bg{
                text-align: center;
                background-color: #e6cfbf;
                font-size: 10px;
            }
            .serial{
                font-size: 12px;
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
                <h1>Six cohorts-Two Years, Cohort Tracking Reporting Form</h1>																
                <div class="timeframe">
                    Patients who started ARVs in each of the months:&nbsp;
                    <select name="month" size="1" style="width:150px;">
                        <option <?php if ($_GET['month'] == 1) echo "selected=\"selected\""; ?> value="1">January</option>
                        <option <?php if ($_GET['month'] == 2) echo "selected=\"selected\""; ?> value="2">February</option>
                        <option <?php if ($_GET['month'] == 3) echo "selected=\"selected\""; ?> value="3">March</option>
                        <option <?php if ($_GET['month'] == 4) echo "selected=\"selected\""; ?> value="4">April</option>
                        <option <?php if ($_GET['month'] == 5) echo "selected=\"selected\""; ?> value="5">May</option>
                        <option <?php if ($_GET['month'] == 6) echo "selected=\"selected\""; ?> value="6">June</option>
                        <option <?php if ($_GET['month'] == 7) echo "selected=\"selected\""; ?> value="7">July</option>
                        <option <?php if ($_GET['month'] == 8) echo "selected=\"selected\""; ?> value="8">August</option>
                        <option <?php if ($_GET['month'] == 9) echo "selected=\"selected\""; ?> value="9">September</option>
                        <option <?php if ($_GET['month'] == 10) echo "selected=\"selected\""; ?> value="10">October</option>
                        <option <?php if ($_GET['month'] == 11) echo "selected=\"selected\""; ?> value="11">November</option>
                        <option <?php if ($_GET['month'] == 12) echo "selected=\"selected\""; ?> value="12">December</option>
                    </select>

                    <select name="year" size="1" style="width:60px;"/>
                    <option <?php if ($_GET['year'] == $curr_year) echo "selected=\"selected\""; ?> value="<?php echo $curr_year ?>"> <?php echo $curr_year; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 1) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 1; ?>"> <?php echo $curr_year - 1; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 2) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 2; ?>"> <?php echo $curr_year - 2; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 3) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 3; ?>"> <?php echo $curr_year - 3; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 4) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 4; ?>"> <?php echo $curr_year - 4; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 5) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 5; ?>"> <?php echo $curr_year - 5; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 6) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 6; ?>"> <?php echo $curr_year - 6; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 7) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 7; ?>"> <?php echo $curr_year - 7; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 8) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 8; ?>"> <?php echo $curr_year - 8; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 9) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 9; ?>"> <?php echo $curr_year - 9; ?></option>
                    <option <?php if ($_GET['year'] == $curr_year - 10) echo "selected=\"selected\""; ?> value="<?php echo $curr_year - 10; ?>"> <?php echo $curr_year - 10; ?></option>
                    </select>
                    </br>
                    <?php
                    for ($i = 0; $i <= 84; $i++) {
                        echo '&nbsp;';
                    }
                    ?>
                    To: &nbsp;&nbsp;
                    <input type="text" name="cohort-start_q" style="width:145px;" value="<?php echo isset($end_month_timestamp) ? date("F", $end_month_timestamp) : ""; ?>" readonly>
                    <input type="text" name="cohort-start_yr" style="width:55px;" value="<?php echo isset($end_month_timestamp) ? date("Y", $end_month_timestamp) : ""; ?>" readonly>&nbsp;
                    </br></br>
                    <?php
                    for ($i = 0; $i <= 35; $i++) {
                        echo '&nbsp;';
                    }
                    ?>
                    <b><i>Progress for the 24 months after starting</i></b>

                    </br></br>

                    <?php
                    for ($i = 0; $i <= 64; $i++) {
                        echo '&nbsp;';
                    }
                    ?>
                    <input type="submit" name="submit" value="show" />
                </div>

                <?php
            } else {
                echo '<head><script language="javascript"> this.window.print(); </script>';
            }
            if (($_GET['submit'] == 'show' && $cohort_rpt->ok) || ($printout && $cohort_rpt->ok)) :
                ?>
                <div align="center">

                    <h1><?php echo $arr_facility['main_info_facility_name'] ?></h1>
                    <h2>    
                        National Care and Treatment Programme Cohort Analysis Form
                    </h2>
                </div>

                <table border="0" class="mainTable" cellspacing="2" cellpadding="0">
                    <tr>
                        <td class="serial"></td>
                        <td class="serial"></td>
                        <td class="rep_left"></td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="tableheading_center">Cohort ' . date("M y", $arr_coh['col'][$c_value . 'baseline_start']) . '</td>';
                                } else {
                                    echo '<td class="heading">' . $col . ' mo ' . date("M y", $arr_coh['col'][$c_value . 'baseline_start']) . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>

                    <tr>
                        <td class="center">1</td>
                        <td class="center">G</td>
                        <td class="rep_left">Started on ART in this clinic - original cohort</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[1][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[1][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">2</td>
                        <td class="center">TI</td>
                        <td class="rep_left">Transfers in </td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[2][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[2][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">3</td>
                        <td class="center">TO</td>
                        <td class="rep_left">Transfers out </td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[3][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[3][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">4</td>
                        <td class="center">N</td>
                        <td class="rep_left">Net current cohort</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . ($arr_coh[4][$c_value] = $arr_coh[1][$c_value] + $arr_coh[2][$c_value] + $arr_coh[3][$c_value]) . '</td>';
                                } else {
                                    echo '<td class="center">' . ($arr_coh[4][$c_value] = $arr_coh[1][$c_value] + $arr_coh[2][$c_value] + $arr_coh[3][$c_value]) . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="27" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">5</td>
                        <td class="center">H</td>
                        <td class="rep_left">On original 1st line regimen</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[5][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[5][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">6</td>
                        <td class="center">I</td>
                        <td class="rep_left">On alternate 1st line regimen (substituted)</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[6][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[6][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">7</td>
                        <td class="center">J</td>
                        <td class="rep_left">On 2nd line or other regimen (switched)</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[7][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[7][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">8</td>
                        <td class="center"></td>
                        <td class="rep_left">Current regimen unrecorded</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[8][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[8][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="27" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">9</td>
                        <td class="center"></td>
                        <td class="rep_left">Stopped / current ARV status unrecorded</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[9][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[9][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">10</td>
                        <td class="center"></td>
                        <td class="rep_left">Died</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[10][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[10][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">11</td>
                        <td class="center"></td>
                        <td class="rep_left">Lost to follow up / did not visit for three months </td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[11][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[11][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="27" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">12</td>
                        <td class="center"></td>
                        <td class="rep_left">Number of cohort alive and on ART</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[12][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[12][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">13</td>
                        <td class="center"></td>
                        <td class="rep_left">Percent of cohort alive and on ART</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . ($arr_coh[12][$c_value] / $arr_coh[4][$c_value]) * 100 . '%' . '</td>';
                                } else {
                                    echo '<td class="center">' . ($arr_coh[12][$c_value] / $arr_coh[4][$c_value]) * 100 . '%' . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="27" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">14</td>
                        <td class="center"></td>
                        <td class="rep_left">Number of patients with CD4 count</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[14][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[14][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">15</td>
                        <td class="center"></td>
                        <td class="rep_left">Median CD4</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[15][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[15][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">16</td>
                        <td class="center"></td>
                        <td class="rep_left">Number with CD4 > 200</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[16][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[16][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">17</td>
                        <td class="center"></td>
                        <td class="rep_left">Percent with CD4 > 200</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . ($arr_coh[16][$c_value] / $arr_coh[14][$c_value]) * 100 . '%' . '</td>';
                                } else {
                                    echo '<td class="center">' . ($arr_coh[16][$c_value] / $arr_coh[14][$c_value]) * 100 . '%' . '</td>';
                                }
                            }
                        }
                        ?>    
                    </tr>
                    <tr>
                        <td colspan="27" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">18</td>
                        <td class="center"></td>
                        <td class="rep_left">Number Working</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[18][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[18][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">19</td>
                        <td class="center"></td>
                        <td class="rep_left">Number Ambulatory</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[19][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[19][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">20</td>
                        <td class="center"></td>
                        <td class="rep_left">Number Bedridden</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[20][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[20][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td class="center">21</td>
                        <td class="center"></td>
                        <td class="rep_left">Number functional status unrecorded</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[21][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[21][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="27" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td class="center">22</td>
                        <td class="center"></td>
                        <td class="rep_left">Number who visited and were recorded on ARVs as many times as there are months</td>
                        <?php
                        foreach ($arr_coh['periods'] as $key => $value) {
                            foreach ($value as $col => $c_value) {
                                if ($col == 0) {
                                    echo '<td class="center_bg">' . $arr_coh[22][$c_value] . '</td>';
                                } else {
                                    echo '<td class="center">' . $arr_coh[22][$c_value] . '</td>';
                                }
                            }
                        }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="27" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tr>
                        <td colspan="27">
                            </br>
                        </td>
                    </tr>
                    <?php if (!$_GET['printout']) { ?>
                        <tr>
                            <td colspan="27" align="center">                        
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