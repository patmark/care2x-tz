
ALTER TABLE  `care_tz_billing` ADD INDEX (  `encounter_nr` ) ;

ALTER TABLE  `care_tz_billing_archive` ADD INDEX (  `nr` ,  `encounter_nr` ) ;

ALTER TABLE  `care_tz_billing_archive_elem` ADD INDEX (  `nr` ) ;

ALTER TABLE  `care_tz_billing_elem` ADD INDEX (  `nr` ) ;
