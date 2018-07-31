
<?php
$bat_nr=(isset($bat_nr) ? $bat_nr : null); 
$bill_obj->Display_Header($LDNewQuotation, $enc_obj->ShowPID($bat_nr), ''); 
?>

<BODY bgcolor="#ffffff" link="#000066" alink="#cc0000" vlink="#000066" onLoad="javascript:setBallon('BallonTip', '', '');">

    <?php $bill_obj->Display_Headline($LDCreatenewquotation, '', '', 'billing_create_2.php', 'Billing :: Create Quotation'); ?>
    <!--Date starts here-->
    <script type="text/javascript">
    function CheckTarehe(){
       var date_from=document.getElementById("date_from").value;
       var date_to=document.getElementById("date_to").value;

       if(date_from==''){
        alert("Date empty");
        return false;
       }else if(date_to==''){
        alert("Date empty");
         return false;

       }else if(date_from>date_to){
        alert("incorrect date");
        return false;

       }

    }
        
    </script>
    <form name="form1" action="" method="POST" onSubmit=" return CheckTarehe();">
    <script type="text/javascript"><?php require($root_path.'include/inc_checkdate_lang.php'); ?>
    </script>
    <script language="javascript" src="<?php echo $root_path; ?>js/setdatetime.js"></script>
    <script language="javascript" src="<?php echo $root_path; ?>js/checkdate.js"></script>
    <script language="javascript" src="<?php echo $root_path; ?>js/dtpick_care2x.js"></script>


         <table>   
         <tr>  
         <th> 
          ONE MONTH QUOTATION IS SELECTED BY DEFAULT, TO SEARCH MORE QUOTE CHOOSE DATE BELOW.
          </th>
          </tr>
          <tr>

              <td>
              <?php
              $_POST['date_from']=(isset($_POST['date_from']) ? $_POST['date_from'] : null);
                      

              ?>
              FROM DATE: <input name="date_from" type="text" size=10 maxlength=10 value="<?php echo $_POST['date_from'];?>">

<a href="javascript:show_calendar('form1.date_from','<?php echo date('d-m-Y',strtotime($date_from)); ?>')">

    <img <?php echo createComIcon($root_path, 'show-calendar.gif', '0', 'absmiddle'); ?>>

</a>



              TO: <input type="text" name="date_to" id="date_to" size="10" maxlength="10" value="<?php echo $date_to;?>" ><a href="javascript:show_calendar('form1.date_to','<?php echo $date_format;?>')"><img <?php echo createComIcon($root_path,'show-calendar.gif','0','absmiddle'); ?>></a><input type="submit" name="show" value="show">
              </td>
              
          </tr>
          </table>

      
      <label>
      
          
      </label>
     
    

        
    </form>
    <!--Date ends here-->

    <?php if (!isset($mode)) $mode = ''; ?>
    <table width="80%">
        <tr>
            <td>
        <center><?php echo $message; ?></center>
        <table width="100%" border="0" align="center" cellspacing=0  class="table_content">
            <tr>
                <td bgcolor=#ffffdd class="headline"><div align="center"><a href="billing_tz_quotation.php?patient=<?php
                        echo $_REQUEST['patient'] . '&sort=care_encounter.modify_time&sorttyp=';
                        if (!$_REQUEST['sorttyp'])
                            echo 'asc';
                        if ($_REQUEST['sorttyp'] == 'asc')
                            echo 'desc';
                        if ($_REQUEST['sorttyp'] == 'desc')
                            echo 'asc';
                        ?> "><u><strong><?php echo $LDDate; ?></strong></u></a></div></td>
                <td bgcolor=#ffffdd class="headline"><div align="center"><a href="billing_tz_quotation.php?patient=<?php
                        echo $_REQUEST['patient'] . '&sort=care_encounter.encounter_nr&sorttyp=';
                        if (!$_REQUEST['sorttyp'])
                            echo 'asc';
                        if ($_REQUEST['sorttyp'] == 'asc')
                            echo 'desc';
                        if ($_REQUEST['sorttyp'] == 'desc')
                            echo 'asc';
                        ?> "><u><strong><?php echo $LDAdmissionNr; ?></strong></u></a></div></td>
                <td bgcolor=#ffffdd class="headline"><div align="center"><a href="billing_tz_quotation.php?patient=<?php
                        echo $_REQUEST['patient'] . '&sort=care_person.pid&sorttyp=';
                        if (!$_REQUEST['sorttyp'])
                            echo 'asc';
                        if ($_REQUEST['sorttyp'] == 'asc')
                            echo 'desc';
                        if ($_REQUEST['sorttyp'] == 'desc')
                            echo 'asc';
                        ?> "><u><strong><?php echo $LDPID; ?></strong></u></a></div></td>
                <td bgcolor=#ffffdd class="headline"><div align="center"><a href="billing_tz_quotation.php?patient=<?php
                        echo $_REQUEST['patient'] . '&sort=care_person.selian_pid&sorttyp=';
                        if (!$_REQUEST['sorttyp'])
                            echo 'asc';
                        if ($_REQUEST['sorttyp'] == 'asc')
                            echo 'desc';
                        if ($_REQUEST['sorttyp'] == 'desc')
                            echo 'asc';
                        ?> "><u><strong><?php echo $LDHospitalfileNR; ?></strong></u></a></div></td>
                <td bgcolor=#ffffdd class="headline"><div align="center"><a href="billing_tz_quotation.php?patient=<?php
                        echo $_REQUEST['patient'] . '&sort=care_person.name_first&sorttyp=';
                        if (!$_REQUEST['sorttyp'])
                            echo 'asc';
                        if ($_REQUEST['sorttyp'] == 'asc')
                            echo 'desc';
                        if ($_REQUEST['sorttyp'] == 'desc')
                            echo 'asc';
                        ?> "><u><strong><?php echo $LDPatientName; ?></strong></u></a></div></td>
                <td bgcolor=#ffffdd class="headline"><div align="center"><a href="billing_tz_quotation.php?patient=<?php
                        echo $_REQUEST['patient'] . '&sort=care_person.date_birth&sorttyp=';
                        if (!$_REQUEST['sorttyp'])
                            echo 'asc';
                        if ($_REQUEST['sorttyp'] == 'asc')
                            echo 'desc';
                        if ($_REQUEST['sorttyp'] == 'desc')
                            echo 'asc';
                        ?> "><u><strong><?php echo $LDBirth; ?></strong></u></a></div></td>
                <td bgcolor=#ffffdd class="headline"><div align="center"><a href="billing_tz_quotation.php?patient=<?php
                        echo $_REQUEST['patient'] . '&sort=insurance&sorttyp=';
                        if (!$_REQUEST['sorttyp'])
                            echo 'asc';
                        if ($_REQUEST['sorttyp'] == 'asc')
                            echo 'desc';
                        if ($_REQUEST['sorttyp'] == 'desc')
                            echo 'asc';
                        ?> "><u><strong><?php echo $LDBillType; ?></strong></u></a></div></td>
                <td bgcolor=#ffffdd class="headline"><div align="center"><a href="billing_tz_quotation.php?patient=<?php
                        echo $_REQUEST['patient'] . '&sort=count&sorttyp=';
                        if (!$_REQUEST['sorttyp'])
                            echo 'asc';
                        if ($_REQUEST['sorttyp'] == 'asc')
                            echo 'desc';
                        if ($_REQUEST['sorttyp'] == 'desc')
                            echo 'asc';
                        ?> "><u><strong><?php echo $LDCount; ?></strong></u></a></div></td>
                <td bgcolor=#ffffdd class="headline"><div align="center"><a href="billing_tz_quotation.php?patient=<?php
                        echo $_REQUEST['patient'] . '&sort=location&sorttyp=';
                        if (!$_REQUEST['sorttyp'])
                            echo 'asc';
                        if ($_REQUEST['sorttyp'] == 'asc')
                            echo 'desc';
                        if ($_REQUEST['sorttyp'] == 'desc')
                            echo 'asc';
                        ?> "><u><strong>
                                                                                        <?php
                                                                                        if ($in_outpatient == 'outpatient') {
                                                                                            echo 'Clinic/Department';
                                                                                        } else {
                                                                                            echo 'Ward/Station';
                                                                                        }
                                                                                        ?>
                                </strong></u></a></div></td>

                <td bgcolor=#ffffdd class="headline"><div align="center"><strong><?php echo $LDInfo; ?></strong></div></td>

                <td bgcolor=#ffffdd class="headline"><div align="center"><strong><?php echo $LDOK; ?></strong></div></td>
            </tr>
            <tr>

                <?php $bill_obj->ShowNewQuotations($in_outpatient, $sid,$_POST['date_from'],$_POST['date_to']); ?>
            </tr>
        </table>
    </td>
</tr>
</table>


<?php $bill_obj->Display_Footer($LDCreatenewquotation, '', '', 'billing_create_2.php', 'Billing :: Create Quotation'); ?>

<?php $bill_obj->Display_Credits(); ?>
