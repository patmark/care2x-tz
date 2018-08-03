
ALTER TABLE `care_role_person` ADD `sname` VARCHAR(50) NOT NULL AFTER `role`;

ALTER TABLE `care_personell` CHANGE `short_id` `practitionerno` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
