
ALTER TABLE `care_tz_billing_elem` ADD `materialcost` DOUBLE(10,2) NULL DEFAULT NULL AFTER `price`, ADD `bank_ref` BIGINT(20) NULL DEFAULT NULL AFTER `materialcost`;


ALTER TABLE `care_tz_billing_archive_elem` ADD `materialcost` DOUBLE(10,2) NULL DEFAULT NULL AFTER `price`, ADD `bank_ref` BIGINT(20) NULL DEFAULT NULL AFTER `materialcost`;

ALTER TABLE `care_tz_billing_elem_advance` ADD `is_deposit_item` TINYINT(1) NOT NULL DEFAULT '0' AFTER `prescriptions_nr`;