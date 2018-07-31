/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  haule
 * Created: Jan 17, 2018
 * Modified by Pat
 */
ALTER TABLE `care_encounter` ADD `nhif_auth_no` VARCHAR(15) NOT NULL AFTER `guarantor_pid`;

ALTER TABLE `care_encounter` CHANGE `encounter_type` `encounter_type` VARCHAR(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1';

ALTER TABLE `care_encounter` ADD `referral_no` VARCHAR(15) NULL DEFAULT NULL AFTER `referrer_institution`;