

<table border=0 cellpadding=4 cellspacing=1 width=100% class="frame">
<?php

$bgc=(isset($bgc) ? $bgc : null);
?>
    <tr bgcolor="<?php echo $bgc; ?>" valign="top">

        <td><FONT SIZE=-1  FACE="Arial">Date/Admission No.</td>
        <td><FONT SIZE=-1  FACE="Arial"><?php if ($prescrServ == "serv" || $prescrServ == "proc") {
    echo "Procedure / Details";
} else {
    echo "Drug /Prescription";
}
?></td>

        <td><FONT SIZE=-1  FACE="Arial"><?php if ($prescrServ == "serv" || $prescrServ == "proc") {
                echo "";
            } else {
                echo "Single Dose";
            }
?></td>

        <td><FONT SIZE=-1  FACE="Arial"><?php if ($prescrServ == "serv" || $prescrServ == "proc") {
                echo "";
            } else {
                echo "Times Per Day";
            }
?></td>

        <td><FONT SIZE=-1  FACE="Arial"><?php if ($prescrServ == "serv" || $prescrServ == "proc") {
        echo "";
    } else {
        echo "Days";
    }
?></td>

        <td><FONT SIZE=-1  FACE="Arial"><?php if ($prescrServ == "serv" || $prescrServ == "proc") {
        echo "Total Tests /Items ";
    } else {
        echo "Total Dose";
    }
?></td>

    </tr>

    <?php
    $GLOBAL_CONFIG['patient_outpatient_nr_adder']=(isset($GLOBAL_CONFIG['patient_outpatient_nr_adder']) ? $GLOBAL_CONFIG['patient_outpatient_nr_adder'] : null);

    $toggle = 0;

             //$_SESSION['loccode'];                            
    while ($row = $result->FetchRow()) {
        //this page appear in pharmacy
        //echo "<pre>" .print_r($row) ."</pre>";
        if ($toggle)
            $bgc = '#f3f3f3';
        else
            $bgc = '#fefefe';
        $toggle = !$toggle;

        if ($row['encounter_class_nr'] == 1)
            $full_en = $row['encounter_nr'] + $GLOBAL_CONFIG['patient_inpatient_nr_adder']; // inpatient admission
        else
            $full_en = $row['encounter_nr'] + $GLOBAL_CONFIG['patient_outpatient_nr_adder']; // outpatient admission
        $amount = 0;
        $notbilledyet = false;
        if ($row['bill_number'] > 0) {
            include_once($root_path . 'include/care_api_classes/class_tz_billing.php');
            if (!isset($bill_obj))
                $bill_obj = new Bill;
            $billresult = $bill_obj->GetElemsOfBillByPrescriptionNr($row['nr']);
            if ($billrow = $billresult->FetchRow()) {
                if ($billrow['amount'] != $row['dosage'])
                    $amount = $billrow['amount'];
            }
            if (!$amount > 0) {
                $billresult = $bill_obj->GetElemsOfBillByPrescriptionNrArchive($row['nr']);
                if ($billrow = $billresult->FetchRow()) {
                    if ($billrow['amount'] != $row['dosage'])
                        $amount = $billrow['amount'];
                }
            }
        } {
            $notbilledyet = true;
        }
        ?>

        <tr bgcolor="<?php echo $bgc; ?>" valign="top">
        
            <td><FONT SIZE=-1  FACE="Arial"><?php echo date('d/M/Y', strtotime($row['prescribe_date'])); ?></td>

            <td><FONT SIZE=-1  FACE="Arial"><?php echo $row['article']; ?></td>
            <td><FONT SIZE=-1  FACE="Arial"><?php echo $row['dosage']; ?></td>
            <td><FONT SIZE=-1  FACE="Arial"><?php echo $row['times_per_day']; ?></td>
            <td><FONT SIZE=-1  FACE="Arial"><?php echo $row['days']; ?></td>
            <td><FONT SIZE=-1  FACE="Arial">

                <?php
                //$StockBalance=$weberp_obj->get_stock_balance_webERP($stockid);
                if ($amount > 0) {
                    echo '<s>' . $row['total_dosage'] . '</s> ' . $amount;
                } else {
                    echo $row['total_dosage'];
                }
                ?>
            </td>
            <?php

                     if($transmit_to_weberp_enabled==1){



                                
                        require_once($root_path . 'include/care_api_classes/class_weberp_c2x.php');
                                if(!isset($weberp_obj)){

                                     $weberp_obj= new weberp();

                                } 

//print_r($_SESSION);

                        if(isset($_SESSION['loccode'])){



                            $stockid=$row['partcode'];


                            
                           $item=$weberp_obj->get_stock_item_from_webERP($stockid);

       
                           // if($stockid!==$item['stockid']){
                           //  echo $not$stockid;
                           // }

                               //echo 'care2x partcode'.$row['partcode'].'<br>';
                               //echo 'weberp itemid'.$item['stockid'];


                             if($row['partcode']==$item['stockid']){

                            $StockBalance=$weberp_obj->get_stock_balance_webERP($stockid);
                            for($i=0; $i<sizeof($StockBalance); $i++ ){
                                if($StockBalance[$i]['loccode']==$_SESSION['loccode'] && $row['status']!='done' && $row['status']!='deleted'){
                                    $Balance=$StockBalance[$i]['quantity'];

                                    if($row['total_dosage']>$Balance){
                                        
                                      ?>
                                      <td style="background-color:red"><FONT SIZE=-1   FACE="Arial" ><?php echo "Insufficient Balance. "."Bal=". number_format($Balance); ?></td>
                                      <?php
                                        
                                    }else{
                                        ?>
                                        <td><FONT SIZE=-1   FACE="Arial" ><strong><?php echo "Bal.". number_format($Balance); ?></strong></td>

                                        <?php

                                    }

                                
                                    
                                    

                                }//end if status!=done and !=deleted

                            }//end for($i=0; $i<sizeof($StockBalance); $i++ )
                        }else{
                            if($row['status']!='done' && $row['status']!='deleted'){
                             ?>
                                      <td style="background-color:orange"><FONT SIZE=-1   FACE="Arial">Not in webERP</td>   

                                        <?php
                            }
                        }


                        }//end if(isset($_SESSION['loccode']))
                     }//end if($transmit_to_weberp_enabled==1
                        

                      
            ?>
            
            
             
            
        </tr>
        <tr bgcolor="<?php echo $bgc; ?>" valign="top">
            <td><FONT SIZE=-1  FACE="Arial"></td>
            <td rowspan=2><FONT SIZE=-1  FACE="Arial">
                <?php
                if ($row['is_disabled']) {
                    echo '<br><br><img src="../../gui/img/common/default/warn.gif" border=0 height="15" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"> <font color=red>' . $LDDisabled . '</font>';
                } elseif ($row['bill_number'] > 0) {
                    echo '<br><br><img src="../../gui/img/common/default/warn.gif" border=0 height="15" alt="" style="filter:alpha(opacity=70)"> <font color=green>' . $LDAlreadyBilled . ' ' . $row['bill_number'] . '</font>';
                    if ($billrow['amount'] != $row['total_dosage'])
                        echo '<br><img src="../../gui/img/common/default/warn.gif" border=0 height="15" alt="" style="filter:alpha(opacity=70)"> <font color="red">' . $LDTheDrugDosagehasChanged . '</font>';
                }
                elseif ($notbilledyet) {
                    echo '<br><br><img src="../../gui/img/common/default/warn.gif" border=0 height="15" alt="" style="filter:alpha(opacity=70)" onMouseover="hilite(this,1)" onMouseOut="hilite(this,0)"> <font color=red>' . $LDPrescriptionNotBilled . '</font>';
                }
                ?>    </td>
            <td><FONT SIZE=-1  FACE="Arial">Notes</td>
            <td colspan=3><FONT SIZE=-1  FACE="Arial"><?php echo $row['notes']; ?></td>

        </tr>
        <?php $disablebuttons=(isset($disablebuttons) ? $disablebuttons : null);?>
        <tr bgcolor="<?php echo $bgc; ?>" valign="top">
            <td><FONT SIZE=-1  FACE="Arial"></td>


            <td><FONT SIZE=-1  FACE="Arial">
                <?php
                if ($row['is_disabled'] || $row['bill_number'] > 0 || $row['issuer']) {
                    echo '<font color="#D4D4D4">edit</font>';
                } else
                    echo '<a href="' . $thisfile . URL_APPEND . '&mode=edit&nr=' . $row['nr'] . '&show=insert&backpath=' . urlencode($backpath) . '&prescrServ=' . $_GET['prescrServ'] . '&externalcall=' . $externalcall . '&disablebuttons=' . $disablebuttons . '">' . $LDEdit='' . '</a>';
                ?>  
    <?php
    if ($row['is_disabled'] || $row['bill_number'] > 0 || $row['issuer'] ) {
        echo '<font color="#D4D4D4">' . $LDdelete . '</font>';
    } else
        echo '<a href="' . $thisfile . URL_APPEND . '&mode=delete&nr=' . $row['nr'] . '&show=insert&backpath=' . urlencode($backpath) . '&prescrServ=' . $_GET['prescrServ'] . '&externalcall=' . $externalcall . '&disablebuttons=' . $disablebuttons . '">' . $LDdelete='' . '</a>'
        ?></td>
            <td><FONT SIZE=-1  FACE="Arial">Prescribed by:</td>
            <td colspan=2><FONT SIZE=-1  FACE="Arial"><?php echo $row['prescriber']; ?></td>
        </tr>

        <tr bgcolor="<?php echo $bgc; ?>" valign="top">
            <td colspan="2">
            </td>

            <td>
    <?php
    if ($row['status'] == "done") {
        $status = "Taken";
        echo $status;
    }else if($row['status']=="deleted"){

               $status="deleted";
               echo $status.' by:'.$row['disable_id'];


    }else {
        $status = $row['status'];
        echo $status;
    }
    //echo "Status: " . $status;
    ?>
            </td>	

            <td>
                <?php
                if (!$row['is_disabled']) {
                    echo 'Issued By:';
                }
                ?>
            </td>

            <td colspan="2">
                <FONT SIZE=-1 FACE="Arial">
        <?php
        if (!$row['is_disabled']) {
            echo $row['issuer'];
        }
        ?>
            </td>  

            

        </tr>
        <tr bgcolor="<?php echo $bgc; ?>" valign="top">
            <td colspan="3">
            </td>
             <td>
                Modified by:
            </td>

             <td colspan="2">
                <?php
                if($row['modify_id']){
                    echo $row['modify_id'];
                }
                ?>
            </td>

        </tr>



    <?php
}
?>
</table>

    <?php
    if (isset($parent_admit) && !isset($is_discharged)) {
        ?>
    <p>
        <img <?php //echo createComIcon($root_path, 'bul_arrowgrnlrg.gif', '0', 'absmiddle'); ?>>
        <a href="<?php echo $thisfile . URL_APPEND . '&pid=' . $_SESSION['sess_pid'] . '&target=' . $target . '&mode=new'; ?>">
    
        </a>
    <?php
}
?>
