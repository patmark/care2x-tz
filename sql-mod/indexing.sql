
/*Index person table*/

ALTER TABLE  `care_person` ADD INDEX (  `name_first` ,  `name_last` ) ;


ALTER TABLE  `care_encounter_prescription` ADD INDEX (  `encounter_nr` ) ;


ALTER TABLE `care_test_request_chemlabor` ADD INDEX(`encounter_nr`);

ALTER TABLE `care_test_request_chemlabor_sub` ADD INDEX(`encounter_nr`);

ALTER TABLE `care_encounter` ADD INDEX(`encounter_nr`);

ALTER TABLE `care_encounter` ADD INDEX(`pid`);


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