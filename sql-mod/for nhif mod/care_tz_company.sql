ALTER TABLE `care_tz_company` ADD `company_code` VARCHAR(50) NULL DEFAULT NULL AFTER `name`;

UPDATE `care_tz_company` SET `company_code` = 'NHIF' WHERE `care_tz_company`.`id` = 12;