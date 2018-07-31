ALTER TABLE  `care_test_request_chemlabor` CHANGE  `notes`  `notes` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ;

ALTER TABLE `care_encounter_diagnostics_report` ADD `open_status` tinyint(1) DEFAULT 0 AFTER `create_time` ;

--An update query for storing modified test results
ALTER TABLE `care_test_findings_chemlabor_sub` ADD `is_updated` TINYINT(1) NOT NULL DEFAULT '0' AFTER `parameter_value`, ADD `old_param_value` VARCHAR(255) NULL AFTER `is_updated`;
