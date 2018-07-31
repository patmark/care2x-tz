
ALTER TABLE `care_test_request_chemlabor` 
ADD `specimen_collected` TINYINT(1) NOT NULL DEFAULT '0' AFTER `send_date`, 
ADD `specimen_date` DATETIME NULL DEFAULT NULL AFTER `specimen_collected`, 
ADD `specimen_type` VARCHAR(200) NULL AFTER `specimen_date`, 
ADD `specimen_volume` VARCHAR(100) NULL AFTER `specimen_type`, 
ADD `specimen_units` VARCHAR(50) NULL AFTER `specimen_volume`,
ADD `specimen_container` VARCHAR(200) NULL AFTER `specimen_units`,
ADD `specimen_taken_by` VARCHAR(200) NULL AFTER `specimen_units`;