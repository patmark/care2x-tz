
ALTER TABLE `care_tz_drugsandservices` ADD `nhif_item_code` VARCHAR(20) NULL DEFAULT NULL AFTER `partcode`;

#For ICD description field

ALTER TABLE `care_tz_diagnosis` CHANGE `ICD_10_description` `ICD_10_description` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '';
