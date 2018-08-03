UPDATE  `care_menu_main` SET  `url` =  'modules/news/start_page.php' 
WHERE  `care_menu_main`.`nr` =1;

INSERT INTO `care_menu_main` (`nr`, `sort_nr`, `name`, `LD_var`, `url`, `is_visible`, `hide_by`, `status`, `modify_id`, `modify_time`) 
VALUES (28, 61, 'NHIF Claims', 'LDNHIFClaims', 'modules/nhif/nhif_pass.php', 1, '', '', '2011-08-24 12:44:37', '0000-00-00 00:00:00');

INSERT INTO `care_menu_main` (`nr`, `sort_nr`, `name`, `LD_var`, `url`, `is_visible`, `hide_by`, `status`, `modify_id`, `modify_time`) 
VALUES ('29', '62', 'TB Care', 'LDTBClinic', 'modules/tb/tb_clinic_pass.php', '1', '', '', '2018-03-01 15:44:37', '0000-00-00 00:00:00');
