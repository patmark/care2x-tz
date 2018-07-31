

INSERT INTO  `care_department` (
`nr` ,
`id` ,
`type` ,
`name_formal` ,
`name_short` ,
`name_alternate` ,
`LD_var` ,
`description` ,
`admit_inpatient` ,
`admit_outpatient` ,
`has_oncall_doc` ,
`has_oncall_nurse` ,
`does_surgery` ,
`this_institution` ,
`is_sub_dept` ,
`parent_dept_nr` ,
`work_hours` ,
`consult_hours` ,
`is_inactive` ,
`sort_order` ,
`address` ,
`sig_line` ,
`sig_stamp` ,
`logo_mime_type` ,
`status` ,
`history` ,
`modify_id` ,
`modify_time` ,
`create_id` ,
`create_time`
)
VALUES (
'0',  'def',  '2',  'Inpatient',  'Inpatient',  '',  'LDDefault',  '',  '0',  '0',  '1',  '1',  '0',  '1',  '0',  '0',  '',  '',  '1',  '0', NULL ,  '',  '',  '',  'hidden',  '',  'admin',  '2005-06-29 11:21:08',  '', '0000-00-00 00:00:00'
);



UPDATE  `care_department` SET  `nr` =  '0' WHERE  `care_department`.`nr` =54;
