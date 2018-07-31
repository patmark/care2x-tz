
--Indexing
ALTER TABLE `care_encounter_event_signaller` ADD INDEX(`encounter_nr`);

ALTER TABLE `care_encounter_financial_class` ADD INDEX(`encounter_nr`);

ALTER TABLE `care_encounter_measurement` ADD INDEX(`encounter_nr`);

ALTER TABLE care_tz_billing_archive DROP INDEX nr;

ALTER TABLE care_tz_billing_archive DROP INDEX nr_2;

ALTER TABLE `care_tz_billing_archive` ADD INDEX(`encounter_nr`);

ALTER TABLE care_person DROP INDEX date_reg;

ALTER TABLE care_person DROP INDEX name_first_2;

ALTER TABLE care_tz_diagnosis DROP INDEX parent_case_nr;

ALTER TABLE care_tz_diagnosis DROP INDEX ICD_10_code;

ALTER TABLE `care_tz_diagnosis` ADD INDEX(`encounter_nr`);

ALTER TABLE `care_tz_diagnosis` ADD INDEX(`PID`);

---New Columns-------
ALTER TABLE `care_encounter_diagnostics_report` ADD `open_status` tinyint(1) DEFAULT 0 AFTER `create_time` ;

--An update query for storing modified test results
ALTER TABLE `care_test_findings_chemlabor_sub` ADD `is_updated` TINYINT(1) NOT NULL DEFAULT '0' AFTER `parameter_value`, ADD `old_param_value` VARCHAR(255) NULL AFTER `is_updated`;


----A query to add columns for Specimen data------------

ALTER TABLE `care_test_request_chemlabor` 
ADD `specimen_collected` TINYINT(1) NOT NULL DEFAULT '0' AFTER `send_date`, 
ADD `specimen_date` DATETIME NULL DEFAULT NULL AFTER `specimen_collected`, 
ADD `specimen_type` VARCHAR(200) NULL AFTER `specimen_date`, 
ADD `specimen_volume` VARCHAR(100) NULL AFTER `specimen_type`, 
ADD `specimen_units` VARCHAR(50) NULL AFTER `specimen_volume`,
ADD `specimen_container` VARCHAR(200) NULL AFTER `specimen_units`,
ADD `specimen_taken_by` VARCHAR(200) NULL AFTER `specimen_units`;

--------

--SQL to add columns for reports review
ALTER TABLE `care_encounter_diagnostics_report` 
ADD `is_reviewed` TINYINT(1) NOT NULL DEFAULT '0' AFTER `open_status`, 
ADD `reviewer_comments` VARCHAR(255) NULL AFTER `is_reviewed`, 
ADD `reviewed_by` VARCHAR(255) NULL AFTER `reviewer_comments`;

---------
----------
-- Billing modifications by Israel
--------------

ALTER TABLE `care_tz_billing_elem` ADD `materialcost` DOUBLE(10,2) NULL DEFAULT NULL AFTER `price`, ADD `bank_ref` BIGINT(20) NULL DEFAULT NULL AFTER `materialcost`;


ALTER TABLE `care_tz_billing_archive_elem` ADD `materialcost` DOUBLE(10,2) NULL DEFAULT NULL AFTER `price`, ADD `bank_ref` BIGINT(20) NULL DEFAULT NULL AFTER `materialcost`;

ALTER TABLE `care_tz_billing_elem_advance` ADD `is_deposit_item` TINYINT(1) NOT NULL DEFAULT '0' AFTER `prescriptions_nr`;



