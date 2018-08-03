ALTER TABLE `care_tz_diagnosis` ADD `practitioner_nr` VARCHAR(20) NULL DEFAULT NULL AFTER `doctor_name`;

ALTER TABLE `care_tz_diagnosis` ADD `diagnosis_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `type`;

ALTER TABLE `care_encounter_prescription` ADD `practitioner_nr` VARCHAR(20) NULL DEFAULT NULL AFTER `issuer`;
