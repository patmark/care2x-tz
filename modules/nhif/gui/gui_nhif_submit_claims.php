
<link rel="stylesheet" href="<?php echo $root_path; ?>assets/bootstrap/css/bootstrap.min.css" >
<script src="<?php echo $root_path; ?>assets/bootstrap/js/jquery-3.2.1.slim.min.js" ></script>
<script src="<?php echo $root_path; ?>assets/bootstrap/js/popper.min.js" ></script>
<script src="<?php echo $root_path; ?>assets/bootstrap/js/bootstrap.min.js"></script>
<?php
$bat_nr = (isset($bat_nr) ? $bat_nr : null);
$claims_obj->Display_Header($LDNewQuotation, $enc_obj->ShowPID($bat_nr), '');
?>

    <?php $claims_obj->Display_Headline($LDPendingClaims, '', '', 'Nhif_pending_claims.php', 'Claims :: Pending Claims'); ?>

    <?php
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    $submitted_claims = $claims_obj->submit_claims(array('patient' => $in_outpatient, 'encounter_nr' => $encounter_nr));
    if ($submitted_claims['success']) {
        ?>
        
            <div class="alert alert-success">
                <strong><h1><?= $submitted_claims['status_massage'] ?>!</h1></strong>
            </div>
            <hr>

        
            <div class="col-12">
                <a href="../../modules/nhif/nhif_pass.php<?= URL_APPEND ?> &patient=<?= $in_outpatient ?> &lang=en&target=review&encounter_nr= <?= $encounter_nr ?>&date_from=<?= $date_from?>&date_to=<?= $date_to ?>" title="Back to List"><input type="submit" class="btn btn-info btn-block" name="show" value="Back to List"></a>
            </div>
        <?php
    } else {
        ?>
            <div class="alert alert-danger">
                <strong><h1><?= $submitted_claims['status_massage'] ?>!</h1></strong>
            </div>
            <div class="col-12">
                <a href="../../modules/nhif/nhif_pass.php<?= URL_APPEND ?> &patient=<?= $in_outpatient ?> &lang=en&target=review&encounter_nr= <?= $encounter_nr ?>&date_from=<?= $date_from ?>&date_to=<?= $date_to ?>" title="Back to List"><input type="submit" class="btn btn-info btn-block" name="show" value="Back to List"></a>
            </div>
        <?php
    }
    ?>


    <?php $claims_obj->Display_Footer($LDCreatenewquotation, '', '', 'billing_create_2.php', 'Billing :: Create Quotation'); ?>

    <?php $claims_obj->Display_Credits(); ?>
