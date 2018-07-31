
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Cohort Indicators Reporting Form</title>
        <meta name="Description" content="Hospital and Healthcare Integrated Information System - CARE2x">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta name="Author" content="Patrick Mark">

        <?php
        echo '<script language="JavaScript">';
        require($root_path . 'include/inc_checkdate_lang.php');
        echo '</script>';
        echo '<script language="javascript" src="' . $root_path . 'js/setdatetime.js"></script>';
        echo '<script language="javascript" src="' . $root_path . 'js/checkdate.js"></script>';
        echo '<script language="javascript" src="' . $root_path . 'js/dtpick_care2x.js"></script>';
        ?>
        <script src="<?php print $root_path; ?>/include/_jquery.js" language="javascript"></script> 

        <!--<link rel="stylesheet" href="../../css/themes/default/default.css" type="text/css">-->
        <script language="javascript" src="../../js/hilitebu.js"></script>


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
                urlholder = "./arv_reporting_cohort_ind.php?printout=TRUE&start_date=" + "<?php echo $_GET['start_date'] ?>" + "&end_date=" + "<?php echo $_GET['end_date'] ?>" +
                        "&indicator=" +<?php echo $_GET['indicator'] ?> + "&interval=" +<?php echo $_GET['interval'] ?>;
                testprintout = window.open(urlholder, "printout", "width=800,height=600,menubar=no,resizable=yes,scrollbars=yes");
                testprintout.resizeTo(screen.availWidth, screen.availHeight);
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
                /*font-weight: bold;*/
                font-size:12px;
                width: 140px;
                vertical-align: text-top;
                text-align: center;
                /*background-color: #b89f81;*/
            }

            .tableheading_center {
                width: 50px;
                font-weight: bold;
                font-size:12px;
                text-align:center;
                background-color: #e6cfbf;
            }
            .heading{
                width: 100px;
                font-weight: bold;
                font-size:12px;
                text-align: center;
                vertical-align: bottom;
            }
            .rep_left{
                font-size: 12px;
                width: 100px; 
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
                font-size: 12px;
                text-align: center;
                width: 80px;
            }
            .select{
                background-color: #fefefe;
                width: auto;
            }
            .input{
                background-color: #fefefe;
                width: 180px;
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
                        <a href="javascript:gethelp('reporting_overview.php','Reporting :: Overview')"><img src="../../gui/img/control/blue_aqua/en/en_hilfe-r.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)"></a>
                        <a href="<?php echo $root_path . $breakfile . URL_APPEND; ?>" >
                            <img src="../../gui/img/control/blue_aqua/en/en_cancel.gif" border=0 width="76" height="21" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this, 1)" onMouseOut="hilite(this, 0)">
                        </a>
                    </td>
                </tr>
            </table>
            <form method="get" action="" name="select_form">
                <h1>Cohort Indicators Reporting Form</h1>																
                <div class="timeframe">
                    <table>
                        <tr>
                            <td>Date From:</td>&nbsp;&nbsp;<td>
                                <input  class="input" name="start_date" size="10" maxlength="10" onfocus="this.select()" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')"
                                        id="start_date"  type="text" value="<?php echo $_GET['start_date']; ?>" onClick="show_calendar('select_form.start_date', '<?php echo $date_format; ?>')"/>
                                <a href="javascript:show_calendar('select_form.start_date','<?php echo $date_format; ?>')">
                                    <img src="../../gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>
                                (dd/mm/yyyy)
                            </td>
                        </tr>
                        <tr>
                            <td>Date To:</td>&nbsp;&nbsp;<td>
                                <input  class="input" name="end_date" type="text" size="10" maxlength="10"  onfocus="this.select()" onkeyup="setDate(this, '<?php echo $date_format; ?>', '<?php echo $lang; ?>')" 
                                        id="end_date" value="<?php echo $_GET['end_date']; ?>" onClick="show_calendar('select_form.end_date', '<?php echo $date_format; ?>')"/>
                                <a href="javascript:show_calendar('select_form.end_date','<?php echo $date_format; ?>')">
                                    <img src="../../gui/img/common/default/show-calendar.gif" border=0 align="absmiddle" width="26" height="22"></a>
                                (dd/mm/yyyy)
                            </td>
                        </tr>
                        <tr>
                            <td>Indicator:</td>&nbsp;&nbsp;
                            <td>
                                <?php
                                echo $cohort_ind->form_dropdown($name = 'indicator', $arr_ind['indicators'], $_GET['indicator'], $extra = 'class="select"');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Interval: </td>&nbsp;&nbsp;<td><input  class="input" name="interval" type="text" value="<?php echo $_GET['interval'] ?>"/>
                                &nbsp;&nbsp;Months</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="center">
                                <input type="submit" name="submit" value="show"/>
                            </td>
                        </tr>
                    </table>
                </div>

                <?php
            } else {
                echo '<head><script language="javascript"> this.window.print(); </script>';
            }
            if (($_GET['submit'] == 'show' && $cohort_ind->ok) || ($printout && $cohort_ind->ok)) :
                ?>
                <div align="center">

                    <h1><?php echo $arr_facility['main_info_facility_name'] ?></h1>
                    <h2>    
                        Cohort Indicator Report
                    </h2>
                    <h2>
                        <?php
                        echo $arr_coh['tittles']['indic'] . " ";
                        echo ($_GET['indicator'] == 5) ? 3 : $_GET['interval'];
                        echo ' months after start of ART';
                        ?>
                    </h2>
                </div>

                <table border="1" class="mainTable" cellspacing="2" cellpadding="2">
                    <tr>
                        <td class="heading"><h2>Cohort month</h2></td>
                        <td class="heading"><h2>Follow up month</h2></td>
                        <td class="heading"><h2>Follow up period</h2></td>
                        <td class="tableheading"><h2>Numerator: </h2><?php echo $arr_coh['tittles']['numer']; ?></td>
                        <td class="tableheading"><h2>Denominator: </h2><?php echo $arr_coh['tittles']['denom']; ?></td>
                        <td class="tableheading"><h2>Indicator: </h2><?php echo $arr_coh['tittles']['indic']; ?></td>
                    </tr>
                    <?php
                    $numer = 0;
                    $denom = 0;
                    foreach ($arr_coh['months'] as $key => $value) {
                        echo '<tr>';
                        echo '<td class="rep_left">' . date("M Y", $arr_coh['col'][$key . 'baseline_start']) . '</td>';
                        echo '<td class="rep_left">' . date("M Y", $arr_coh['col'][$key . 'follow_up_stop']) . '</td>';
                        echo '<td class="rep_left">' . date("M y", $arr_coh['col'][$key . 'period_start']) .
                        ' to ' . date("M y", $arr_coh['col'][$key . 'period_stop']) . '</td>';
                        echo '<td class="center">' . $arr_coh['numer'][$key] . '</td>';
                        echo '<td class="center">' . $arr_coh['denom'][$key] . '</td>';
                        echo '<td class="center">' . (($arr_coh['numer'][$key] / $arr_coh['denom'][$key]) * 100) . '%</td>';
                        echo '</tr>';
                        $numer+=$arr_coh['numer'][$key];
                        $denom+=$arr_coh['denom'][$key];
                    }
                    echo '<tr>';
                    echo '<td class="rep_left" colspan="3" bgcolor="#CCCCCC"><b>Total</b></td>';
                    echo '<td class="center" bgcolor="#CCCCCC"><b>' . $numer . '</b></td>';
                    echo '<td class="center" bgcolor="#CCCCCC"><b>' . $denom . '</b></td>';
                    echo '<td class="center" bgcolor="#CCCCCC"><b>' . (($numer / $denom) * 100) . '%</b></td>';
                    echo '</tr>';
                    ?>                    
                    <tr>
                        <td colspan="6">
                            </br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" bgcolor="#CCCCCC"></td>
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
                $cohort_ind->getMessages();
            endif;
            ?>
        </form>

    </body>
</html>