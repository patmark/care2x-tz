--SQL to add columns for reports review
ALTER TABLE `care_encounter_diagnostics_report` 
ADD `is_reviewed` TINYINT(1) NOT NULL DEFAULT '0' AFTER `open_status`, 
ADD `reviewer_comments` VARCHAR(255) NULL AFTER `is_reviewed`, 
ADD `reviewed_by` VARCHAR(255) NULL AFTER `reviewer_comments`;
