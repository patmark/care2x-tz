# phpMyAdmin SQL Dump
# version 2.11.4
# http://www.phpmyadmin.net
#
# Host: localhost
# Erstellungszeit: Mar 18, 2008 at 09:46
# Server Version: 5.0.51
# PHP-Version: 4.4.8
#
# Datenbank:
#

# --------------------------------------------------------
--
-- Table structure for table 'care_address_citytown'
--

drop table if exists care_test_findings_chemlab_copy;
DROP TABLE IF EXISTS care_address_citytown;
DROP TABLE IF EXISTS care_appointment;
DROP TABLE IF EXISTS care_billing_archive;
DROP TABLE IF EXISTS care_billing_bill;
DROP TABLE IF EXISTS care_billing_bill_item;
DROP TABLE IF EXISTS care_billing_final;
DROP TABLE IF EXISTS care_billing_item;
DROP TABLE IF EXISTS care_billing_payment ;
DROP TABLE IF EXISTS care_cache         ;
DROP TABLE IF EXISTS care_cafe_menu       ;
DROP TABLE IF EXISTS care_cafe_prices          ;
DROP TABLE IF EXISTS care_category_diagnosis    ;
DROP TABLE IF EXISTS care_category_disease      ;
DROP TABLE IF EXISTS care_category_procedure     ;
DROP TABLE IF EXISTS care_class_encounter        ;
DROP TABLE IF EXISTS care_class_ethnic_orig        ;
DROP TABLE IF EXISTS care_class_financial ;
DROP TABLE IF EXISTS care_class_insurance  ;
DROP TABLE IF EXISTS care_class_therapy  ;
DROP TABLE IF EXISTS care_classif_neonatal ;
DROP TABLE IF EXISTS care_complication    ;
DROP TABLE IF EXISTS care_config_global   ;
DROP TABLE IF EXISTS care_config_user    ;
DROP TABLE IF EXISTS care_currency      ;
DROP TABLE IF EXISTS care_department        ;
DROP TABLE IF EXISTS care_diagnosis_localcode  ;
DROP TABLE IF EXISTS care_drg_intern       ;
DROP TABLE IF EXISTS care_drg_quicklist    ;
DROP TABLE IF EXISTS care_drg_related_codes  ;
DROP TABLE IF EXISTS care_dutyplan_oncall    ;
DROP TABLE IF EXISTS care_effective_day      ;
DROP TABLE IF EXISTS care_encounter          ;
DROP TABLE IF EXISTS care_encounter_diagnosis         ;
DROP TABLE IF EXISTS care_encounter_diagnostics_report    ;
DROP TABLE IF EXISTS care_encounter_drg_intern       ;
DROP TABLE IF EXISTS care_encounter_event_signaller   ;
DROP TABLE IF EXISTS care_encounter_financial_class  ;
DROP TABLE IF EXISTS care_encounter_image      ;
DROP TABLE IF EXISTS care_encounter_immunization ;
DROP TABLE IF EXISTS care_encounter_location   ;
DROP TABLE IF EXISTS care_encounter_measurement  ;
DROP TABLE IF EXISTS care_encounter_notes     ;
DROP TABLE IF EXISTS care_encounter_obstetric   ;
DROP TABLE IF EXISTS care_encounter_op       ;
DROP TABLE IF EXISTS care_encounter_prescription    ;
DROP TABLE IF EXISTS care_encounter_prescription_notes   ;
DROP TABLE IF EXISTS care_encounter_procedure;
DROP TABLE IF EXISTS care_encounter_sickconfirm  ;
DROP TABLE IF EXISTS care_group       ;
DROP TABLE IF EXISTS care_icd10_bs    ;
DROP TABLE IF EXISTS care_icd10_de    ;
DROP TABLE IF EXISTS care_icd10_en    ;
DROP TABLE IF EXISTS care_icd10_es     ;
DROP TABLE IF EXISTS care_icd10_pt_br     ;
DROP TABLE IF EXISTS care_img_diagnostic   ;
DROP TABLE IF EXISTS care_insurance_firm   ;
DROP TABLE IF EXISTS care_mail_private     ;
DROP TABLE IF EXISTS care_mail_private_users  ;
DROP TABLE IF EXISTS care_med_ordercatalog   ;
DROP TABLE IF EXISTS care_med_orderlist      ;
DROP TABLE IF EXISTS care_med_products_main   ;
DROP TABLE IF EXISTS care_med_report          ;
DROP TABLE IF EXISTS care_menu_main           ;
DROP TABLE IF EXISTS care_menu_sub            ;
DROP TABLE IF EXISTS care_method_induction    ;
DROP TABLE IF EXISTS care_mode_delivery       ;
DROP TABLE IF EXISTS care_neonatal            ;
DROP TABLE IF EXISTS care_news_article         ;
DROP TABLE IF EXISTS care_op_med_doc            ;
DROP TABLE IF EXISTS care_ops301_de             ;
DROP TABLE IF EXISTS care_ops301_es              ;
DROP TABLE IF EXISTS care_person                 ;
DROP TABLE IF EXISTS care_person_insurance       ;
DROP TABLE IF EXISTS care_person_other_number     ;
DROP TABLE IF EXISTS care_personell               ;
DROP TABLE IF EXISTS care_personell_assignment    ;
DROP TABLE IF EXISTS care_pharma_ordercatalog       ;
DROP TABLE IF EXISTS care_pharma_orderlist         ;
DROP TABLE IF EXISTS care_pharma_products_main      ;
DROP TABLE IF EXISTS care_phone                     ;
DROP TABLE IF EXISTS care_pregnancy                  ;
DROP TABLE IF EXISTS care_registry                    ;
DROP TABLE IF EXISTS care_role_person                 ;
DROP TABLE IF EXISTS care_room                       ;
DROP TABLE IF EXISTS care_sessions            ;
DROP TABLE IF EXISTS care_standby_duty_report   ;
DROP TABLE IF EXISTS care_steri_products_main    ;
DROP TABLE IF EXISTS care_tech_questions        ;
DROP TABLE IF EXISTS care_tech_repair_done       ;
DROP TABLE IF EXISTS care_tech_repair_job         ;
DROP TABLE IF EXISTS care_test_findings_baclabor    ;
DROP TABLE IF EXISTS care_test_findings_chemlab      ;
DROP TABLE IF EXISTS care_test_findings_laboratory    ;
DROP TABLE IF EXISTS care_test_findings_patho        ;
DROP TABLE IF EXISTS care_test_findings_radio         ;
DROP TABLE IF EXISTS care_test_group                 ;
DROP TABLE IF EXISTS care_test_param                  ;
DROP TABLE IF EXISTS care_test_request_baclabor       ;
DROP TABLE IF EXISTS care_test_request_blood            ;
DROP TABLE IF EXISTS care_test_request_chemlabor         ;
DROP TABLE IF EXISTS care_test_request_generic            ;
DROP TABLE IF EXISTS care_test_request_laboratory          ;
DROP TABLE IF EXISTS care_test_request_laboratory_tasks    ;
DROP TABLE IF EXISTS care_test_request_patho           ;
DROP TABLE IF EXISTS care_test_request_radio              ;
DROP TABLE IF EXISTS care_type_anaesthesia             ;
DROP TABLE IF EXISTS care_type_application                 ;
DROP TABLE IF EXISTS care_type_assignment                  ;
DROP TABLE IF EXISTS care_type_cause_opdelay               ;
DROP TABLE IF EXISTS care_type_color                      ;
DROP TABLE IF EXISTS care_type_department                  ;
DROP TABLE IF EXISTS care_type_discharge                   ;
DROP TABLE IF EXISTS care_type_duty                        ;
DROP TABLE IF EXISTS care_type_encounter                   ;
DROP TABLE IF EXISTS care_type_ethnic_orig                 ;
DROP TABLE IF EXISTS care_type_feeding                     ;
DROP TABLE IF EXISTS care_type_immunization                ;
DROP TABLE IF EXISTS care_type_insurance                   ;
DROP TABLE IF EXISTS care_type_localization                ;
DROP TABLE IF EXISTS care_type_location                    ;
DROP TABLE IF EXISTS care_type_measurement                 ;
DROP TABLE IF EXISTS care_type_notes                      ;
DROP TABLE IF EXISTS care_type_outcome                    ;
DROP TABLE IF EXISTS care_type_perineum                   ;
DROP TABLE IF EXISTS care_type_prescription              ;
DROP TABLE IF EXISTS care_type_room                     ;
DROP TABLE IF EXISTS care_type_test                     ;
DROP TABLE IF EXISTS care_type_time                      ;
DROP TABLE IF EXISTS care_type_unit_measurement          ;
DROP TABLE IF EXISTS care_tz_arv_adher_code             ;
DROP TABLE IF EXISTS care_tz_arv_adher_reas             ;
DROP TABLE IF EXISTS care_tz_arv_adher_reas_code         ;
DROP TABLE IF EXISTS care_tz_arv_allergies                ;
DROP TABLE IF EXISTS care_tz_arv_case                    ;
DROP TABLE IF EXISTS care_tz_arv_chairman                ;
DROP TABLE IF EXISTS care_tz_arv_co_medi                 ;
DROP TABLE IF EXISTS care_tz_arv_co_medi_other           ;
DROP TABLE IF EXISTS care_tz_arv_education               ;
DROP TABLE IF EXISTS care_tz_arv_education_group         ;
DROP TABLE IF EXISTS care_tz_arv_education_topic          ;
DROP TABLE IF EXISTS care_tz_arv_eligible_reason          ;
DROP TABLE IF EXISTS care_tz_arv_eligible_reason_code     ;
DROP TABLE IF EXISTS care_tz_arv_events                   ;
DROP TABLE IF EXISTS care_tz_arv_events_code               ;
DROP TABLE IF EXISTS care_tz_arv_exposure                 ;
DROP TABLE IF EXISTS care_tz_arv_follow_status             ;
DROP TABLE IF EXISTS care_tz_arv_follow_status_code        ;
DROP TABLE IF EXISTS care_tz_arv_functional_status        ;
DROP TABLE IF EXISTS care_tz_arv_illness                  ;
DROP TABLE IF EXISTS care_tz_arv_illness_code             ;
DROP TABLE IF EXISTS care_tz_arv_lab                      ;
DROP TABLE IF EXISTS care_tz_arv_lab_param                ;
DROP TABLE IF EXISTS care_tz_arv_referred                 ;
DROP TABLE IF EXISTS care_tz_arv_referred_code             ;
DROP TABLE IF EXISTS care_tz_arv_referred_from            ;
DROP TABLE IF EXISTS care_tz_arv_referred_from_code        ;
DROP TABLE IF EXISTS care_tz_arv_regimen                   ;
DROP TABLE IF EXISTS care_tz_arv_regimen_code              ;
DROP TABLE IF EXISTS care_tz_arv_registration              ;
DROP TABLE IF EXISTS care_tz_arv_status                    ;
DROP TABLE IF EXISTS care_tz_arv_status_txt                ;
DROP TABLE IF EXISTS care_tz_arv_status_txt_code           ;
DROP TABLE IF EXISTS care_tz_arv_tb_status                 ;
DROP TABLE IF EXISTS care_tz_arv_treatment_supporter       ;
DROP TABLE IF EXISTS care_tz_arv_visit                     ;
DROP TABLE IF EXISTS care_tz_arv_visit_2                   ;
DROP TABLE IF EXISTS care_tz_billing                       ;
DROP TABLE IF EXISTS care_tz_billing_archive               ;
DROP TABLE IF EXISTS care_tz_billing_archive_elem          ;
DROP TABLE IF EXISTS care_tz_billing_elem                  ;
DROP TABLE IF EXISTS care_tz_company                       ;
DROP TABLE IF EXISTS care_tz_diagnosis                     ;
DROP TABLE IF EXISTS care_tz_district                      ;
DROP TABLE IF EXISTS care_tz_drugliststruc                 ;
DROP TABLE IF EXISTS care_tz_drugsandservices              ;
DROP TABLE IF EXISTS care_tz_drugsandservices_description ;
DROP TABLE IF EXISTS care_tz_icd10_quicklist               ;
DROP TABLE IF EXISTS care_tz_insurance                     ;
DROP TABLE IF EXISTS care_tz_insurance_types               ;
DROP TABLE IF EXISTS care_tz_laboratory                    ;
DROP TABLE IF EXISTS care_tz_laboratory_param              ;
DROP TABLE IF EXISTS care_tz_laboratory_tests              ;
DROP TABLE IF EXISTS care_tz_mtuha_cat                     ;
DROP TABLE IF EXISTS care_tz_mtuha_cat_key                 ;
DROP TABLE IF EXISTS care_tz_region                        ;
DROP TABLE IF EXISTS care_tz_regions                       ;
DROP TABLE IF EXISTS care_tz_religion                      ;
DROP TABLE IF EXISTS care_tz_stock_item_amount             ;
DROP TABLE IF EXISTS care_tz_stock_item_properties         ;
DROP TABLE IF EXISTS care_tz_stock_place                   ;
DROP TABLE IF EXISTS care_tz_tribes                      ;
DROP TABLE IF EXISTS care_tz_ward                         ;
DROP TABLE IF EXISTS care_unit_measurement                ;
DROP TABLE IF EXISTS care_users                          ;
DROP TABLE IF EXISTS care_version;
DROP TABLE IF EXISTS care_ward                                ;
DROP TABLE IF EXISTS mems_drug_list                       ;
DROP TABLE IF EXISTS mems_special_other                   ;
DROP TABLE IF EXISTS mems_supplies                        ;
DROP TABLE IF EXISTS mems_supplies_labor                  ;
DROP TABLE IF EXISTS query                                ;
DROP TABLE IF EXISTS sessions                             ;


CREATE TABLE care_address_citytown (
  nr mediumint(8) unsigned NOT NULL auto_increment,
  unece_modifier char(2) default NULL,
  unece_locode varchar(15) default NULL,
  `name` varchar(100) NOT NULL default '',
  zip_code varchar(25) NOT NULL default '',
  iso_country_id char(3) NOT NULL default '',
  unece_locode_type tinyint(3) unsigned default NULL,
  unece_coordinates varchar(25) default NULL,
  info_url varchar(255) default NULL,
  use_frequency bigint(20) unsigned NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  is_additional tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (nr),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_appointment'
--

CREATE TABLE care_appointment (
  nr bigint(20) unsigned NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  `date` date NOT NULL default '0000-00-00',
  `time` time NOT NULL default '00:00:00',
  to_dept_id varchar(25) NOT NULL default '',
  to_dept_nr smallint(5) unsigned NOT NULL default '0',
  to_personell_nr int(11) NOT NULL default '0',
  to_personell_name varchar(60) default NULL,
  purpose text NOT NULL,
  urgency tinyint(2) unsigned NOT NULL default '0',
  remind tinyint(1) unsigned NOT NULL default '0',
  remind_email tinyint(1) unsigned NOT NULL default '0',
  remind_mail tinyint(1) unsigned NOT NULL default '0',
  remind_phone tinyint(1) unsigned NOT NULL default '0',
  appt_status varchar(35) NOT NULL default 'pending',
  cancel_by varchar(255) NOT NULL default '',
  cancel_date date default NULL,
  cancel_reason varchar(255) default NULL,
  encounter_class_nr int(1) NOT NULL default '0',
  encounter_nr int(11) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY pid (pid)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_billing_archive'
--

CREATE TABLE care_billing_archive (
  bill_no bigint(20) NOT NULL default '0',
  encounter_nr int(10) NOT NULL default '0',
  patient_name tinytext NOT NULL,
  vorname varchar(35) NOT NULL default '0',
  bill_date_time datetime NOT NULL default '0000-00-00 00:00:00',
  bill_amt double(16,4) NOT NULL default '0.0000',
  payment_date_time datetime NOT NULL default '0000-00-00 00:00:00',
  payment_mode text NOT NULL,
  cheque_no varchar(10) NOT NULL default '0',
  creditcard_no varchar(10) NOT NULL default '0',
  paid_by varchar(15) NOT NULL default '0',
  PRIMARY KEY  (bill_no)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_billing_bill'
--

CREATE TABLE care_billing_bill (
  bill_bill_no bigint(20) NOT NULL default '0',
  bill_encounter_nr int(10) unsigned NOT NULL default '0',
  bill_date_time date default NULL,
  bill_amount float(10,2) default NULL,
  bill_outstanding float(10,2) default NULL,
  PRIMARY KEY  (bill_bill_no),
  KEY index_bill_patnum (bill_encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_billing_bill_item'
--

CREATE TABLE care_billing_bill_item (
  bill_item_id int(11) NOT NULL auto_increment,
  bill_item_encounter_nr int(10) unsigned NOT NULL default '0',
  bill_item_code varchar(5) default NULL,
  bill_item_unit_cost float(10,2) default '0.00',
  bill_item_units tinyint(4) default NULL,
  bill_item_amount float(10,2) default NULL,
  bill_item_date datetime default NULL,
  bill_item_status enum('0','1') default '0',
  bill_item_bill_no int(11) NOT NULL default '0',
  PRIMARY KEY  (bill_item_id),
  KEY index_bill_item_patnum (bill_item_encounter_nr),
  KEY index_bill_item_bill_no (bill_item_bill_no)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_billing_final'
--

CREATE TABLE care_billing_final (
  final_id tinyint(3) NOT NULL auto_increment,
  final_encounter_nr int(10) unsigned NOT NULL default '0',
  final_bill_no int(11) default NULL,
  final_date date default NULL,
  final_total_bill_amount float(10,2) default NULL,
  final_discount tinyint(4) default NULL,
  final_total_receipt_amount float(10,2) default NULL,
  final_amount_due float(10,2) default NULL,
  final_amount_recieved float(10,2) default NULL,
  PRIMARY KEY  (final_id),
  KEY index_final_patnum (final_encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_billing_item'
--

CREATE TABLE care_billing_item (
  item_code varchar(5) NOT NULL default '',
  item_description varchar(100) default NULL,
  item_unit_cost float(10,2) default '0.00',
  item_type tinytext,
  item_discount_max_allowed tinyint(4) unsigned default '0',
  `group` varchar(6) default '0',
  PRIMARY KEY  (item_code)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_billing_payment'
--

CREATE TABLE care_billing_payment (
  payment_id tinyint(5) NOT NULL auto_increment,
  payment_encounter_nr int(10) unsigned NOT NULL default '0',
  payment_receipt_no int(11) NOT NULL default '0',
  payment_date datetime default '0000-00-00 00:00:00',
  payment_cash_amount float(10,2) default '0.00',
  payment_cheque_no int(11) default '0',
  payment_cheque_amount float(10,2) default '0.00',
  payment_creditcard_no int(25) default '0',
  payment_creditcard_amount float(10,2) default '0.00',
  payment_amount_total float(10,2) default '0.00',
  PRIMARY KEY  (payment_id),
  KEY index_payment_patnum (payment_encounter_nr),
  KEY index_payment_receipt_no (payment_receipt_no)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_cache'
--

CREATE TABLE care_cache (
  id varchar(125) NOT NULL default '',
  ctext text,
  cbinary blob,
  tstamp timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_cafe_menu'
--

CREATE TABLE care_cafe_menu (
  item int(11) NOT NULL auto_increment,
  lang varchar(10) NOT NULL default 'en',
  cdate date NOT NULL default '0000-00-00',
  menu text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  UNIQUE KEY item_2 (item),
  KEY item (item,lang),
  KEY cdate (cdate)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_cafe_prices'
--

CREATE TABLE care_cafe_prices (
  item int(11) NOT NULL auto_increment,
  lang varchar(10) NOT NULL default 'en',
  productgroup tinytext NOT NULL,
  article tinytext NOT NULL,
  description tinytext NOT NULL,
  price varchar(10) NOT NULL default '',
  unit tinytext NOT NULL,
  pic_filename tinytext NOT NULL,
  modify_id varchar(25) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(25) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  KEY item (item),
  KEY lang (lang)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_category_diagnosis'
--

CREATE TABLE care_category_diagnosis (
  nr tinyint(3) unsigned NOT NULL default '0',
  category varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  short_code char(1) NOT NULL default '',
  LD_var_short_code varchar(25) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  hide_from varchar(255) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_category_disease'
--

CREATE TABLE care_category_disease (
  nr tinyint(3) unsigned NOT NULL auto_increment,
  group_nr tinyint(3) unsigned NOT NULL default '0',
  category varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_category_procedure'
--

CREATE TABLE care_category_procedure (
  nr tinyint(3) unsigned NOT NULL default '0',
  category varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  short_code char(1) NOT NULL default '',
  LD_var_short_code varchar(25) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  hide_from varchar(255) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_classif_neonatal'
--

CREATE TABLE care_classif_neonatal (
  nr smallint(2) unsigned NOT NULL auto_increment,
  id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) default NULL,
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  UNIQUE KEY id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_class_encounter'
--

CREATE TABLE care_class_encounter (
  class_nr smallint(6) unsigned NOT NULL default '0',
  class_id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(25) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  hide_from tinyint(4) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (class_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_class_ethnic_orig'
--

CREATE TABLE care_class_ethnic_orig (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_class_financial'
--

CREATE TABLE care_class_financial (
  class_nr smallint(5) unsigned NOT NULL auto_increment,
  class_id varchar(15) NOT NULL default '0',
  `type` varchar(25) NOT NULL default '0',
  `code` varchar(5) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(25) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  policy text NOT NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (class_nr),
  KEY class_2 (class_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_class_insurance'
--

CREATE TABLE care_class_insurance (
  class_nr smallint(5) unsigned NOT NULL auto_increment,
  class_id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(25) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (class_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_class_therapy'
--

CREATE TABLE care_class_therapy (
  nr smallint(5) unsigned NOT NULL auto_increment,
  group_nr tinyint(3) unsigned NOT NULL default '0',
  class varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(25) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_complication'
--

CREATE TABLE care_complication (
  nr int(10) unsigned NOT NULL auto_increment,
  group_nr int(11) unsigned NOT NULL default '0',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `code` varchar(25) default NULL,
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_config_global'
--

CREATE TABLE care_config_global (
  `type` varchar(60) NOT NULL default '',
  `value` varchar(255) default NULL,
  notes varchar(255) default NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_config_user'
--

CREATE TABLE care_config_user (
  user_id varchar(100) NOT NULL default '',
  serial_config_data text NOT NULL,
  notes varchar(255) default NULL,
  `status` varchar(25) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (user_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_currency'
--

CREATE TABLE care_currency (
  item_no smallint(5) unsigned NOT NULL auto_increment,
  short_name varchar(10) NOT NULL default '',
  long_name varchar(20) NOT NULL default '',
  info varchar(50) NOT NULL default '',
  `status` varchar(5) NOT NULL default '',
  modify_id varchar(20) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(20) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  KEY item_no (item_no),
  KEY short_name (short_name)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_department'
--

CREATE TABLE care_department (
  nr mediumint(8) unsigned NOT NULL auto_increment,
  id varchar(60) NOT NULL default '',
  `type` varchar(25) NOT NULL default '',
  name_formal varchar(60) NOT NULL default '',
  name_short varchar(35) NOT NULL default '',
  name_alternate varchar(225) default NULL,
  LD_var varchar(35) NOT NULL default '',
  description text NOT NULL,
  admit_inpatient tinyint(1) NOT NULL default '0',
  admit_outpatient tinyint(1) NOT NULL default '0',
  has_oncall_doc tinyint(1) NOT NULL default '1',
  has_oncall_nurse tinyint(1) NOT NULL default '1',
  does_surgery tinyint(1) NOT NULL default '0',
  this_institution tinyint(1) NOT NULL default '1',
  is_sub_dept tinyint(1) NOT NULL default '0',
  parent_dept_nr tinyint(3) unsigned default NULL,
  work_hours varchar(100) default NULL,
  consult_hours varchar(100) default NULL,
  is_inactive tinyint(1) NOT NULL default '0',
  sort_order tinyint(3) unsigned NOT NULL default '0',
  address text,
  sig_line varchar(60) default NULL,
  sig_stamp text,
  logo_mime_type varchar(5) default NULL,
  `status` varchar(25) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  UNIQUE KEY id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_diagnosis_localcode'
--

CREATE TABLE care_diagnosis_localcode (
  localcode varchar(12) NOT NULL default '',
  description text NOT NULL,
  class_sub varchar(5) NOT NULL default '',
  `type` varchar(10) NOT NULL default '',
  inclusive text NOT NULL,
  exclusive text NOT NULL,
  notes text NOT NULL,
  std_code char(1) NOT NULL default '',
  sub_level tinyint(4) NOT NULL default '0',
  remarks text NOT NULL,
  extra_codes text NOT NULL,
  extra_subclass text NOT NULL,
  search_keys varchar(255) NOT NULL default '',
  use_frequency int(11) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (localcode),
  KEY diagnosis_code (localcode)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_drg_intern'
--

CREATE TABLE care_drg_intern (
  nr int(11) NOT NULL auto_increment,
  `code` varchar(12) NOT NULL default '',
  description text NOT NULL,
  synonyms text NOT NULL,
  notes text,
  std_code char(1) NOT NULL default '',
  sub_level tinyint(1) NOT NULL default '0',
  parent_code varchar(12) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(25) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(25) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY nr (nr),
  KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_drg_quicklist'
--

CREATE TABLE care_drg_quicklist (
  nr int(11) NOT NULL auto_increment,
  `code` varchar(25) NOT NULL default '',
  code_parent varchar(25) NOT NULL default '',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  qlist_type varchar(25) NOT NULL default '0',
  rank int(11) NOT NULL default '0',
  `status` varchar(15) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(25) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(25) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_drg_related_codes'
--

CREATE TABLE care_drg_related_codes (
  nr int(11) NOT NULL auto_increment,
  group_nr int(11) unsigned NOT NULL default '0',
  `code` varchar(15) NOT NULL default '',
  code_parent varchar(15) NOT NULL default '',
  code_type varchar(15) NOT NULL default '',
  rank int(11) NOT NULL default '0',
  `status` varchar(15) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(25) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(25) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_dutyplan_oncall'
--

CREATE TABLE care_dutyplan_oncall (
  nr bigint(20) unsigned NOT NULL auto_increment,
  dept_nr int(10) unsigned NOT NULL default '0',
  role_nr tinyint(3) unsigned NOT NULL default '0',
  `year` year(4) NOT NULL default '0000',
  `month` char(2) NOT NULL default '',
  duty_1_txt text NOT NULL,
  duty_2_txt text NOT NULL,
  duty_1_pnr text NOT NULL,
  duty_2_pnr text NOT NULL,
  `status` varchar(25) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY dept_nr (dept_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_effective_day'
--

CREATE TABLE care_effective_day (
  eff_day_nr tinyint(4) NOT NULL auto_increment,
  `name` varchar(25) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (eff_day_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter'
--

CREATE TABLE care_encounter (
  encounter_nr bigint(11) unsigned NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  encounter_date datetime NOT NULL default '0000-00-00 00:00:00',
  encounter_class_nr smallint(5) unsigned NOT NULL default '0',
  encounter_type varchar(35) NOT NULL default '',
  encounter_status varchar(35) NOT NULL default '',
  referrer_diagnosis varchar(255) NOT NULL default '',
  referrer_recom_therapy varchar(255) default NULL,
  referrer_dr varchar(60) NOT NULL default '',
  referrer_dept varchar(255) NOT NULL default '',
  referrer_institution varchar(255) NOT NULL default '',
  referrer_notes text NOT NULL,
  financial_class_nr tinyint(3) unsigned NOT NULL default '0',
  insurance_nr varchar(25) default '0',
  insurance_firm_id varchar(25) NOT NULL default '0',
  insurance_class_nr tinyint(3) unsigned NOT NULL default '0',
  insurance_2_nr varchar(25) default '0',
  insurance_2_firm_id varchar(25) NOT NULL default '0',
  guarantor_pid int(11) NOT NULL default '0',
  contact_pid int(11) NOT NULL default '0',
  contact_relation varchar(35) NOT NULL default '',
  current_ward_nr smallint(3) unsigned NOT NULL default '0',
  current_room_nr smallint(5) unsigned NOT NULL default '0',
  in_ward tinyint(1) NOT NULL default '0',
  current_dept_nr smallint(3) unsigned NOT NULL default '0',
  in_dept tinyint(1) NOT NULL default '0',
  current_firm_nr smallint(5) unsigned NOT NULL default '0',
  current_att_dr_nr int(10) NOT NULL default '0',
  consulting_dr varchar(60) NOT NULL default '',
  extra_service varchar(25) NOT NULL default '',
  is_discharged tinyint(1) unsigned NOT NULL default '0',
  discharge_date date default NULL,
  discharge_time time default NULL,
  followup_date date NOT NULL default '0000-00-00',
  followup_responsibility varchar(255) default NULL,
  post_encounter_notes text NOT NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (encounter_nr),
  KEY pid (pid),
  KEY encounter_date (encounter_date)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_diagnosis'
--

CREATE TABLE care_encounter_diagnosis (
  diagnosis_nr int(11) NOT NULL auto_increment,
  encounter_nr int(11) NOT NULL default '0',
  op_nr int(10) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `code` varchar(25) NOT NULL default '',
  code_parent varchar(25) NOT NULL default '',
  group_nr mediumint(8) unsigned NOT NULL default '0',
  code_version tinyint(4) NOT NULL default '0',
  localcode varchar(35) NOT NULL default '',
  category_nr tinyint(3) unsigned NOT NULL default '0',
  `type` varchar(35) NOT NULL default '',
  localization varchar(35) NOT NULL default '',
  diagnosing_clinician varchar(60) NOT NULL default '',
  diagnosing_dept_nr smallint(5) unsigned NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (diagnosis_nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_diagnostics_report'
--

CREATE TABLE care_encounter_diagnostics_report (
  item_nr int(11) NOT NULL auto_increment,
  report_nr int(11) NOT NULL default '0',
  reporting_dept_nr smallint(5) unsigned NOT NULL default '0',
  reporting_dept varchar(100) NOT NULL default '',
  report_date date NOT NULL default '0000-00-00',
  report_time time NOT NULL default '00:00:00',
  encounter_nr int(10) NOT NULL default '0',
  script_call varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (item_nr,report_nr),
  KEY report_nr (report_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_drg_intern'
--

CREATE TABLE care_encounter_drg_intern (
  nr int(11) NOT NULL auto_increment,
  encounter_nr int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  group_nr mediumint(8) unsigned NOT NULL default '0',
  clinician varchar(60) NOT NULL default '',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_event_signaller'
--

CREATE TABLE care_encounter_event_signaller (
  encounter_nr int(10) unsigned NOT NULL default '0',
  yellow tinyint(1) NOT NULL default '0',
  black tinyint(1) NOT NULL default '0',
  blue_pale tinyint(1) NOT NULL default '0',
  brown tinyint(1) NOT NULL default '0',
  pink tinyint(1) NOT NULL default '0',
  yellow_pale tinyint(1) NOT NULL default '0',
  red tinyint(1) NOT NULL default '0',
  green_pale tinyint(1) NOT NULL default '0',
  violet tinyint(1) NOT NULL default '0',
  blue tinyint(1) NOT NULL default '0',
  biege tinyint(1) NOT NULL default '0',
  orange tinyint(1) NOT NULL default '0',
  green_1 tinyint(1) NOT NULL default '0',
  green_2 tinyint(1) NOT NULL default '0',
  green_3 tinyint(1) NOT NULL default '0',
  green_4 tinyint(1) NOT NULL default '0',
  green_5 tinyint(1) NOT NULL default '0',
  green_6 tinyint(1) NOT NULL default '0',
  green_7 tinyint(1) NOT NULL default '0',
  rose_1 tinyint(1) NOT NULL default '0',
  rose_2 tinyint(1) NOT NULL default '0',
  rose_3 tinyint(1) NOT NULL default '0',
  rose_4 tinyint(1) NOT NULL default '0',
  rose_5 tinyint(1) NOT NULL default '0',
  rose_6 tinyint(1) NOT NULL default '0',
  rose_7 tinyint(1) NOT NULL default '0',
  rose_8 tinyint(1) NOT NULL default '0',
  rose_9 tinyint(1) NOT NULL default '0',
  rose_10 tinyint(1) NOT NULL default '0',
  rose_11 tinyint(1) NOT NULL default '0',
  rose_12 tinyint(1) NOT NULL default '0',
  rose_13 tinyint(1) NOT NULL default '0',
  rose_14 tinyint(1) NOT NULL default '0',
  rose_15 tinyint(1) NOT NULL default '0',
  rose_16 tinyint(1) NOT NULL default '0',
  rose_17 tinyint(1) NOT NULL default '0',
  rose_18 tinyint(1) NOT NULL default '0',
  rose_19 tinyint(1) NOT NULL default '0',
  rose_20 tinyint(1) NOT NULL default '0',
  rose_21 tinyint(1) NOT NULL default '0',
  rose_22 tinyint(1) NOT NULL default '0',
  rose_23 tinyint(1) NOT NULL default '0',
  rose_24 tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_financial_class'
--

CREATE TABLE care_encounter_financial_class (
  nr bigint(20) unsigned NOT NULL auto_increment,
  encounter_nr int(11) NOT NULL default '0',
  class_nr smallint(3) unsigned NOT NULL default '0',
  date_start date default NULL,
  date_end date default NULL,
  date_create datetime NOT NULL default '0000-00-00 00:00:00',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_image'
--

CREATE TABLE care_encounter_image (
  nr bigint(20) NOT NULL auto_increment,
  encounter_nr int(11) NOT NULL default '0',
  shot_date date NOT NULL default '0000-00-00',
  shot_nr smallint(6) NOT NULL default '0',
  mime_type varchar(10) NOT NULL default '',
  upload_date date NOT NULL default '0000-00-00',
  notes text NOT NULL,
  graphic_script text NOT NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_immunization'
--

CREATE TABLE care_encounter_immunization (
  nr int(10) unsigned NOT NULL auto_increment,
  encounter_nr int(11) NOT NULL default '0',
  `date` date NOT NULL default '0000-00-00',
  `type` varchar(60) NOT NULL default '',
  medicine varchar(60) NOT NULL default '',
  dosage varchar(60) default NULL,
  application_type_nr smallint(5) unsigned NOT NULL default '0',
  application_by varchar(60) default NULL,
  titer varchar(15) default NULL,
  refresh_date date default NULL,
  notes text,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_location'
--

CREATE TABLE care_encounter_location (
  nr int(11) NOT NULL auto_increment,
  encounter_nr int(11) unsigned NOT NULL default '0',
  type_nr smallint(5) unsigned NOT NULL default '0',
  location_nr smallint(5) unsigned NOT NULL default '0',
  group_nr smallint(5) unsigned NOT NULL default '0',
  date_from date NOT NULL default '0000-00-00',
  date_to date NOT NULL default '0000-00-00',
  time_from time default '00:00:00',
  time_to time default NULL,
  discharge_type_nr tinyint(3) unsigned NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr,location_nr),
  KEY `type` (type_nr),
  KEY location_id (location_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_measurement'
--

CREATE TABLE care_encounter_measurement (
  nr int(11) unsigned NOT NULL auto_increment,
  msr_date date NOT NULL default '0000-00-00',
  msr_time float(4,2) NOT NULL default '0.00',
  encounter_nr int(11) unsigned NOT NULL default '0',
  msr_type_nr tinyint(3) unsigned NOT NULL default '0',
  `value` varchar(255) default NULL,
  unit_nr smallint(5) unsigned default NULL,
  unit_type_nr tinyint(2) unsigned NOT NULL default '0',
  notes varchar(255) default NULL,
  measured_by varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY `type` (msr_type_nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_notes'
--

CREATE TABLE care_encounter_notes (
  nr int(10) unsigned NOT NULL auto_increment,
  encounter_nr int(10) unsigned NOT NULL default '0',
  type_nr smallint(5) unsigned NOT NULL default '0',
  notes text NOT NULL,
  short_notes varchar(25) default NULL,
  aux_notes varchar(255) default NULL,
  ref_notes_nr int(10) unsigned NOT NULL default '0',
  personell_nr int(10) unsigned NOT NULL default '0',
  personell_name varchar(60) NOT NULL default '',
  send_to_pid int(11) NOT NULL default '0',
  send_to_name varchar(60) default NULL,
  `date` date default NULL,
  `time` time default NULL,
  location_type varchar(35) default NULL,
  location_type_nr tinyint(3) NOT NULL default '0',
  location_nr mediumint(8) unsigned NOT NULL default '0',
  location_id varchar(60) default NULL,
  ack_short_id varchar(10) NOT NULL default '',
  date_ack datetime default NULL,
  date_checked datetime default NULL,
  date_printed datetime default NULL,
  send_by_mail tinyint(1) default NULL,
  send_by_email tinyint(1) default NULL,
  send_by_fax tinyint(1) default NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY encounter_nr (encounter_nr),
  KEY type_nr (type_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_obstetric'
--

CREATE TABLE care_encounter_obstetric (
  encounter_nr int(11) unsigned NOT NULL auto_increment,
  pregnancy_nr int(11) unsigned NOT NULL default '0',
  hospital_adm_nr int(11) unsigned NOT NULL default '0',
  patient_class varchar(60) NOT NULL default '',
  is_discharged_not_in_labour tinyint(1) default NULL,
  is_re_admission tinyint(1) default NULL,
  referral_status varchar(60) default NULL,
  referral_reason text,
  `status` varchar(25) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (encounter_nr),
  KEY encounter_nr (pregnancy_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_op'
--

CREATE TABLE care_encounter_op (
  nr int(11) NOT NULL auto_increment,
  `year` varchar(4) NOT NULL default '0',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  op_room varchar(10) NOT NULL default '0',
  op_nr mediumint(9) NOT NULL default '0',
  op_date date NOT NULL default '0000-00-00',
  op_src_date varchar(8) NOT NULL default '',
  encounter_nr int(10) unsigned NOT NULL default '0',
  diagnosis text NOT NULL,
  operator text NOT NULL,
  assistant text NOT NULL,
  scrub_nurse text NOT NULL,
  rotating_nurse text NOT NULL,
  anesthesia varchar(30) NOT NULL default '',
  an_doctor text NOT NULL,
  op_therapy text NOT NULL,
  result_info text NOT NULL,
  entry_time varchar(5) NOT NULL default '',
  cut_time varchar(5) NOT NULL default '',
  close_time varchar(5) NOT NULL default '',
  exit_time varchar(5) NOT NULL default '',
  entry_out text NOT NULL,
  cut_close text NOT NULL,
  wait_time text NOT NULL,
  bandage_time text NOT NULL,
  repos_time text NOT NULL,
  encoding longtext NOT NULL,
  doc_date varchar(10) NOT NULL default '',
  doc_time varchar(5) NOT NULL default '',
  duty_type varchar(15) NOT NULL default '',
  material_codedlist text NOT NULL,
  container_codedlist text NOT NULL,
  icd_code text NOT NULL,
  ops_code text NOT NULL,
  ops_intern_code text NOT NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY dept (dept_nr),
  KEY op_room (op_room),
  KEY op_date (op_date)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_prescription'
--

CREATE TABLE `care_encounter_prescription` (
  `nr` int(11) NOT NULL auto_increment,
  `encounter_nr` int(10) unsigned NOT NULL default '0',
  `prescription_type_nr` smallint(5) unsigned NOT NULL default '0',
  `article` varchar(100) NOT NULL default '',
  `article_item_number` varchar(50) NOT NULL default '',
  `price` varchar(255) NOT NULL default '',
  `drug_class` varchar(60) NOT NULL default '',
  `order_nr` int(11) NOT NULL default '0',
  `dosage` varchar(255) NOT NULL default '',
  `application_type_nr` smallint(5) unsigned NOT NULL default '0',
  `notes` text NOT NULL,
  `prescribe_date` date default NULL,
  `prescriber` varchar(60) NOT NULL default '',
  `color_marker` varchar(10) NOT NULL default '',
  `is_stopped` tinyint(1) unsigned NOT NULL default '0',
  `is_outpatient_prescription` tinyint(11) unsigned NOT NULL default '0',
  `is_disabled` varchar(255) default NULL,
  `stop_date` date default NULL,
  `status` varchar(25) NOT NULL default '',
  `history` text NOT NULL,
  `bill_number` bigint(20) NOT NULL default '0',
  `bill_status` varchar(10) NOT NULL default '',
  `modify_id` varchar(35) NOT NULL default '',
  `modify_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `create_id` varchar(35) NOT NULL default '',
  `create_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`nr`),
  KEY `encounter_nr` (`encounter_nr`),
  KEY `IX_ARTICLE_ITEM_NUMBER` (`article_item_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_prescription_notes'
--

CREATE TABLE care_encounter_prescription_notes (
  nr bigint(20) unsigned NOT NULL auto_increment,
  `date` date NOT NULL default '0000-00-00',
  prescription_nr int(10) unsigned NOT NULL default '0',
  notes varchar(35) default NULL,
  short_notes varchar(25) default NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_procedure'
--

CREATE TABLE care_encounter_procedure (
  procedure_nr int(11) NOT NULL auto_increment,
  encounter_nr int(11) NOT NULL default '0',
  op_nr int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `code` varchar(25) NOT NULL default '',
  code_parent varchar(25) NOT NULL default '',
  group_nr mediumint(8) unsigned NOT NULL default '0',
  code_version tinyint(4) NOT NULL default '0',
  localcode varchar(35) NOT NULL default '',
  category_nr tinyint(3) unsigned NOT NULL default '0',
  localization varchar(35) NOT NULL default '',
  responsible_clinician varchar(60) NOT NULL default '',
  responsible_dept_nr smallint(5) unsigned NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (procedure_nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_encounter_sickconfirm'
--

CREATE TABLE care_encounter_sickconfirm (
  nr int(11) NOT NULL auto_increment,
  encounter_nr int(11) NOT NULL default '0',
  date_confirm date NOT NULL default '0000-00-00',
  date_start date NOT NULL default '0000-00-00',
  date_end date NOT NULL default '0000-00-00',
  date_create date NOT NULL default '0000-00-00',
  diagnosis text NOT NULL,
  dept_nr smallint(6) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_group'
--

CREATE TABLE care_group (
  nr smallint(5) unsigned NOT NULL auto_increment,
  id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_icd10_bs'
--

CREATE TABLE care_icd10_bs (
  diagnosis_code varchar(12) NOT NULL default '',
  description text NOT NULL,
  class_sub varchar(5) NOT NULL default '',
  `type` varchar(10) NOT NULL default '',
  inclusive text NOT NULL,
  exclusive text NOT NULL,
  notes text NOT NULL,
  std_code char(1) NOT NULL default '',
  sub_level tinyint(4) NOT NULL default '0',
  remarks text NOT NULL,
  extra_codes text NOT NULL,
  extra_subclass text NOT NULL,
  PRIMARY KEY  (diagnosis_code),
  KEY diagnosis_code (diagnosis_code)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_icd10_de'
--

CREATE TABLE care_icd10_de (
  diagnosis_code varchar(12) NOT NULL default '',
  description text NOT NULL,
  class_sub varchar(5) NOT NULL default '',
  `type` varchar(10) NOT NULL default '',
  inclusive text NOT NULL,
  exclusive text NOT NULL,
  notes text NOT NULL,
  std_code char(1) NOT NULL default '',
  sub_level tinyint(4) NOT NULL default '0',
  remarks text NOT NULL,
  extra_codes text NOT NULL,
  extra_subclass text NOT NULL,
  KEY diagnosis_code (diagnosis_code)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_icd10_en'
--

CREATE TABLE care_icd10_en (
  diagnosis_code varchar(12) NOT NULL default '',
  description text NOT NULL,
  class_sub varchar(5) NOT NULL default '',
  `type` varchar(10) NOT NULL default '',
  inclusive text NOT NULL,
  exclusive text NOT NULL,
  notes text NOT NULL,
  std_code char(1) NOT NULL default '',
  sub_level tinyint(4) NOT NULL default '0',
  remarks text NOT NULL,
  extra_codes text NOT NULL,
  extra_subclass text NOT NULL,
  PRIMARY KEY  (diagnosis_code),
  KEY diagnosis_code (diagnosis_code)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_icd10_es'
--

CREATE TABLE care_icd10_es (
  diagnosis_code varchar(12) NOT NULL default '',
  description text NOT NULL,
  class_sub varchar(5) NOT NULL default '',
  `type` varchar(10) NOT NULL default '',
  inclusive text NOT NULL,
  exclusive text NOT NULL,
  notes text NOT NULL,
  std_code char(1) NOT NULL default '',
  sub_level tinyint(4) NOT NULL default '0',
  remarks text NOT NULL,
  extra_codes text NOT NULL,
  extra_subclass text NOT NULL,
  PRIMARY KEY  (diagnosis_code),
  KEY diagnosis_code (diagnosis_code)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_icd10_pt_br'
--

CREATE TABLE care_icd10_pt_br (
  diagnosis_code varchar(12) NOT NULL default '',
  description text NOT NULL,
  class_sub varchar(5) NOT NULL default '',
  `type` varchar(10) NOT NULL default '',
  inclusive text NOT NULL,
  exclusive text NOT NULL,
  notes text NOT NULL,
  std_code char(1) NOT NULL default '',
  sub_level tinyint(4) NOT NULL default '0',
  remarks text NOT NULL,
  extra_codes text NOT NULL,
  extra_subclass text NOT NULL,
  PRIMARY KEY  (diagnosis_code),
  KEY diagnosis_code (diagnosis_code)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_img_diagnostic'
--

CREATE TABLE care_img_diagnostic (
  nr bigint(20) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  encounter_nr int(11) NOT NULL default '0',
  doc_ref_ids varchar(255) default NULL,
  img_type varchar(10) NOT NULL default '',
  max_nr tinyint(2) default '0',
  upload_date date NOT NULL default '0000-00-00',
  cancel_date date NOT NULL default '0000-00-00',
  cancel_by varchar(35) default NULL,
  notes text,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY encounter_nr (pid)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_insurance_firm'
--

CREATE TABLE care_insurance_firm (
  firm_id varchar(40) NOT NULL default '',
  `name` varchar(60) NOT NULL default '',
  iso_country_id char(3) NOT NULL default '',
  sub_area varchar(60) NOT NULL default '',
  type_nr smallint(5) unsigned NOT NULL default '0',
  addr varchar(255) default NULL,
  addr_mail varchar(200) default NULL,
  addr_billing varchar(200) default NULL,
  addr_email varchar(60) default NULL,
  phone_main varchar(35) default NULL,
  phone_aux varchar(35) default NULL,
  fax_main varchar(35) default NULL,
  fax_aux varchar(35) default NULL,
  contact_person varchar(60) default NULL,
  contact_phone varchar(35) default NULL,
  contact_fax varchar(35) default NULL,
  contact_email varchar(60) default NULL,
  use_frequency bigint(20) unsigned NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (firm_id),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_mail_private'
--

CREATE TABLE care_mail_private (
  recipient varchar(60) NOT NULL default '',
  sender varchar(60) NOT NULL default '',
  sender_ip varchar(60) NOT NULL default '',
  cc varchar(255) NOT NULL default '',
  bcc varchar(255) NOT NULL default '',
  `subject` varchar(255) NOT NULL default '',
  body text NOT NULL,
  sign varchar(255) NOT NULL default '',
  ask4ack tinyint(4) NOT NULL default '0',
  reply2 varchar(255) NOT NULL default '',
  attachment varchar(255) NOT NULL default '',
  attach_type varchar(30) NOT NULL default '',
  read_flag tinyint(4) NOT NULL default '0',
  mailgroup varchar(60) NOT NULL default '',
  maildir varchar(60) NOT NULL default '',
  exec_level tinyint(4) NOT NULL default '0',
  exclude_addr text NOT NULL,
  send_dt datetime NOT NULL default '0000-00-00 00:00:00',
  send_stamp timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  uid varchar(255) NOT NULL default '',
  KEY recipient (recipient)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_mail_private_users'
--

CREATE TABLE care_mail_private_users (
  user_name varchar(60) NOT NULL default '',
  email varchar(60) NOT NULL default '',
  alias varchar(60) NOT NULL default '',
  pw varchar(255) NOT NULL default '',
  inbox longtext NOT NULL,
  sent longtext NOT NULL,
  drafts longtext NOT NULL,
  trash longtext NOT NULL,
  lastcheck timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  lock_flag tinyint(4) NOT NULL default '0',
  addr_book text NOT NULL,
  addr_quick tinytext NOT NULL,
  secret_q tinytext NOT NULL,
  secret_q_ans tinytext NOT NULL,
  public tinyint(4) NOT NULL default '0',
  sig tinytext NOT NULL,
  append_sig tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (email)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_med_ordercatalog'
--

CREATE TABLE care_med_ordercatalog (
  item_no int(11) NOT NULL auto_increment,
  dept_nr int(3) NOT NULL default '0',
  hit int(11) NOT NULL default '0',
  artikelname tinytext NOT NULL,
  bestellnum varchar(20) NOT NULL default '',
  minorder int(4) NOT NULL default '0',
  maxorder int(4) NOT NULL default '0',
  proorder tinytext NOT NULL,
  PRIMARY KEY  (item_no),
  KEY item_no (item_no)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_med_orderlist'
--

CREATE TABLE care_med_orderlist (
  order_nr int(11) NOT NULL auto_increment,
  dept_nr int(3) NOT NULL default '0',
  order_date date NOT NULL default '0000-00-00',
  order_time time NOT NULL default '00:00:00',
  articles text NOT NULL,
  extra1 tinytext NOT NULL,
  extra2 text NOT NULL,
  validator tinytext NOT NULL,
  ip_addr tinytext NOT NULL,
  priority tinytext NOT NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  sent_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  process_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (order_nr),
  KEY item_nr (order_nr),
  KEY dept (dept_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_med_products_main'
--

CREATE TABLE care_med_products_main (
  bestellnum varchar(25) NOT NULL default '',
  artikelnum tinytext NOT NULL,
  industrynum tinytext NOT NULL,
  artikelname tinytext NOT NULL,
  generic tinytext NOT NULL,
  description text NOT NULL,
  packing tinytext NOT NULL,
  minorder int(4) NOT NULL default '0',
  maxorder int(4) NOT NULL default '0',
  proorder tinytext NOT NULL,
  picfile tinytext NOT NULL,
  encoder tinytext NOT NULL,
  enc_date tinytext NOT NULL,
  enc_time tinytext NOT NULL,
  lock_flag tinyint(1) NOT NULL default '0',
  medgroup text NOT NULL,
  cave tinytext NOT NULL,
  `status` varchar(20) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (bestellnum),
  KEY bestellnum (bestellnum)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_med_report'
--

CREATE TABLE care_med_report (
  report_nr int(11) NOT NULL auto_increment,
  dept varchar(15) NOT NULL default '',
  report text NOT NULL,
  reporter varchar(25) NOT NULL default '',
  id_nr varchar(15) NOT NULL default '',
  report_date date NOT NULL default '0000-00-00',
  report_time time NOT NULL default '00:00:00',
  `status` varchar(20) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (report_nr),
  KEY report_nr (report_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_menu_main'
--

CREATE TABLE care_menu_main (
  nr tinyint(3) unsigned NOT NULL default '0',
  sort_nr tinyint(2) NOT NULL default '0',
  `name` varchar(35) collate latin1_general_ci NOT NULL default '',
  LD_var varchar(35) collate latin1_general_ci NOT NULL default '',
  url varchar(255) collate latin1_general_ci NOT NULL default '',
  is_visible tinyint(1) unsigned NOT NULL default '1',
  hide_by text collate latin1_general_ci,
  `status` varchar(25) collate latin1_general_ci NOT NULL default '',
  modify_id timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  modify_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_menu_sub'
--

CREATE TABLE care_menu_sub (
  s_nr int(11) NOT NULL default '0',
  s_sort_nr int(11) NOT NULL default '0',
  s_main_nr int(11) NOT NULL default '0',
  s_ebene int(11) NOT NULL default '0',
  s_name varchar(100) collate latin1_general_ci NOT NULL default '',
  s_LD_var varchar(100) collate latin1_general_ci NOT NULL default '',
  s_url varchar(100) collate latin1_general_ci NOT NULL default '',
  s_url_ext varchar(100) collate latin1_general_ci NOT NULL default '',
  s_image varchar(100) collate latin1_general_ci NOT NULL default '',
  s_open_image varchar(100) collate latin1_general_ci NOT NULL default '',
  s_is_visible varchar(100) collate latin1_general_ci NOT NULL default '',
  s_hide_by varchar(100) collate latin1_general_ci NOT NULL default '',
  s_status varchar(100) collate latin1_general_ci NOT NULL default '',
  s_modify_id varchar(100) collate latin1_general_ci NOT NULL default '',
  s_modify_time datetime NOT NULL default '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_method_induction'
--

CREATE TABLE care_method_induction (
  nr smallint(5) unsigned NOT NULL auto_increment,
  group_nr tinyint(3) unsigned NOT NULL default '0',
  method varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_mode_delivery'
--

CREATE TABLE care_mode_delivery (
  nr smallint(5) unsigned NOT NULL auto_increment,
  group_nr tinyint(3) unsigned NOT NULL default '0',
  `mode` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) default NULL,
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_neonatal'
--

CREATE TABLE care_neonatal (
  nr int(11) unsigned NOT NULL auto_increment,
  pid int(11) unsigned NOT NULL default '0',
  delivery_date date NOT NULL default '0000-00-00',
  parent_encounter_nr int(11) unsigned NOT NULL default '0',
  delivery_nr tinyint(4) NOT NULL default '0',
  encounter_nr int(11) unsigned NOT NULL default '0',
  delivery_place varchar(60) NOT NULL default '',
  delivery_mode tinyint(2) NOT NULL default '0',
  c_s_reason text,
  born_before_arrival tinyint(1) default '0',
  face_presentation tinyint(1) NOT NULL default '0',
  posterio_occipital_position tinyint(1) NOT NULL default '0',
  delivery_rank tinyint(2) unsigned NOT NULL default '1',
  apgar_1_min tinyint(4) NOT NULL default '0',
  apgar_5_min tinyint(4) NOT NULL default '0',
  apgar_10_min tinyint(4) NOT NULL default '0',
  time_to_spont_resp tinyint(2) default NULL,
  `condition` varchar(60) default '0',
  weight float(8,2) unsigned default NULL,
  length float(8,2) unsigned default NULL,
  head_circumference float(8,2) unsigned default NULL,
  scored_gestational_age float(4,2) unsigned default NULL,
  feeding tinyint(4) NOT NULL default '0',
  congenital_abnormality varchar(125) NOT NULL default '',
  classification varchar(255) NOT NULL default '0',
  disease_category tinyint(2) NOT NULL default '0',
  outcome tinyint(2) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY pid (pid),
  KEY pregnancy_nr (parent_encounter_nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_news_article'
--

CREATE TABLE care_news_article (
  nr int(11) NOT NULL auto_increment,
  lang varchar(10) NOT NULL default 'en',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  category tinytext NOT NULL,
  `status` varchar(10) NOT NULL default 'pending',
  title varchar(255) NOT NULL default '',
  preface text NOT NULL,
  body text NOT NULL,
  pic blob,
  pic_mime varchar(4) default NULL,
  art_num tinyint(1) NOT NULL default '0',
  head_file tinytext NOT NULL,
  main_file tinytext NOT NULL,
  pic_file tinytext NOT NULL,
  author varchar(30) NOT NULL default '',
  submit_date datetime NOT NULL default '0000-00-00 00:00:00',
  encode_date datetime NOT NULL default '0000-00-00 00:00:00',
  publish_date date NOT NULL default '0000-00-00',
  modify_id varchar(30) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(30) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY item_no (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_ops301_de'
--

CREATE TABLE care_ops301_de (
  `code` varchar(12) NOT NULL default '',
  description text NOT NULL,
  inclusive text NOT NULL,
  exclusive text NOT NULL,
  notes text NOT NULL,
  std_code char(1) NOT NULL default '',
  sub_level tinyint(4) NOT NULL default '0',
  remarks text NOT NULL,
  KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_ops301_es'
--

CREATE TABLE care_ops301_es (
  `code` varchar(12) NOT NULL default '',
  description text NOT NULL,
  inclusive text NOT NULL,
  exclusive text NOT NULL,
  notes text NOT NULL,
  std_code char(1) NOT NULL default '',
  sub_level tinyint(4) NOT NULL default '0',
  remarks text NOT NULL,
  KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_op_med_doc'
--

CREATE TABLE care_op_med_doc (
  nr bigint(20) unsigned NOT NULL auto_increment,
  op_date varchar(12) NOT NULL default '',
  operator tinytext NOT NULL,
  encounter_nr int(11) unsigned NOT NULL default '0',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  diagnosis text NOT NULL,
  localize text NOT NULL,
  therapy text NOT NULL,
  special text NOT NULL,
  class_s tinyint(4) NOT NULL default '0',
  class_m tinyint(4) NOT NULL default '0',
  class_l tinyint(4) NOT NULL default '0',
  op_start varchar(8) NOT NULL default '',
  op_end varchar(8) NOT NULL default '',
  scrub_nurse varchar(70) NOT NULL default '',
  op_room varchar(10) NOT NULL default '',
  `status` varchar(15) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_person'
--

CREATE TABLE care_person (
  pid int(11) unsigned NOT NULL auto_increment,
  selian_pid bigint(20) NOT NULL default '0',
  date_reg datetime NOT NULL default '0000-00-00 00:00:00',
  name_first varchar(60) NOT NULL default '',
  name_2 varchar(60) default NULL,
  name_3 varchar(60) default NULL,
  name_middle varchar(60) default NULL,
  name_last varchar(60) NOT NULL default '',
  name_maiden varchar(60) default NULL,
  name_others text NOT NULL,
  date_birth date NOT NULL default '0000-00-00',
  blood_group char(2) NOT NULL default '',
  rh varchar(10) NOT NULL default '',
  addr_str varchar(60) NOT NULL default '',
  addr_str_nr varchar(10) NOT NULL default '',
  addr_zip varchar(15) NOT NULL default '',
  addr_citytown_nr mediumint(8) unsigned NOT NULL default '0',
  addr_is_valid tinyint(1) NOT NULL default '0',
  citizenship varchar(35) default NULL,
  phone_1_code varchar(15) default '0',
  phone_1_nr varchar(35) default NULL,
  phone_2_code varchar(15) default '0',
  phone_2_nr varchar(35) default NULL,
  cellphone_1_nr varchar(35) default NULL,
  cellphone_2_nr varchar(35) default NULL,
  fax varchar(35) default NULL,
  email varchar(60) default NULL,
  civil_status varchar(35) NOT NULL default '',
  sex char(1) NOT NULL default '',
  title varchar(25) default NULL,
  photo blob,
  photo_filename varchar(60) NOT NULL default '',
  ethnic_orig mediumint(8) unsigned default NULL,
  org_id varchar(60) default NULL,
  sss_nr varchar(60) default NULL,
  nat_id_nr varchar(60) default NULL,
  religion varchar(125) default NULL,
  region varchar(50) default NULL,
  district varchar(50) default NULL,
  ward varchar(50) default NULL,
  mother_pid int(11) unsigned NOT NULL default '0',
  father_pid int(11) unsigned NOT NULL default '0',
  contact_person varchar(255) default NULL,
  contact_pid int(11) unsigned NOT NULL default '0',
  contact_relation varchar(25) default '0',
  death_date date NOT NULL default '0000-00-00',
  death_encounter_nr int(10) unsigned NOT NULL default '0',
  death_cause varchar(255) default NULL,
  death_cause_code varchar(15) default NULL,
  date_update datetime default NULL,
  `status` varchar(20) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  addr_citytown_name varchar(35) NOT NULL default '',
  insurance_ID tinyint(4) NOT NULL default '0',
  insurance_silver tinyint(4) NOT NULL default '0',
  insurance_gold tinyint(4) NOT NULL default '0',
  insurance_friedkin tinyint(4) NOT NULL default '0',
  insurance_selian_stuff tinyint(4) NOT NULL default '0',
  insurance_premium_for_adults int(11) NOT NULL default '0',
  insurance_premium_for_childs int(11) NOT NULL default '0',
  insurance_premium_for_senior int(11) NOT NULL default '0',
  insurance_copayment_OPD int(11) NOT NULL default '0',
  insurance_copayment_IPD int(11) NOT NULL default '0',
  insurance_ceiling_by_individual tinyint(4) NOT NULL default '0',
  insurance_ceiling_by_family tinyint(4) NOT NULL default '0',
  insurance_ceiling_amount int(11) NOT NULL default '0',
  insurance_ceiling_for_families int(11) NOT NULL default '0',
  insurance_head_pid bigint(20) NOT NULL default '0',
  PRIMARY KEY  (pid),
  KEY name_last (name_last),
  KEY name_first (name_first),
  KEY date_reg (date_reg),
  KEY date_birth (date_birth)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table 'care_personell'
--

CREATE TABLE care_personell (
  nr int(11) NOT NULL auto_increment,
  short_id varchar(10) default NULL,
  pid int(11) NOT NULL default '0',
  job_type_nr int(11) NOT NULL default '0',
  job_function_title varchar(60) default NULL,
  date_join date default NULL,
  date_exit date default NULL,
  contract_class varchar(35) NOT NULL default '0',
  contract_start date default NULL,
  contract_end date default NULL,
  is_discharged tinyint(1) NOT NULL default '0',
  pay_class varchar(25) NOT NULL default '',
  pay_class_sub varchar(25) NOT NULL default '',
  local_premium_id varchar(5) NOT NULL default '',
  tax_account_nr varchar(60) NOT NULL default '',
  ir_code varchar(25) NOT NULL default '',
  nr_workday tinyint(1) NOT NULL default '0',
  nr_weekhour float(10,2) NOT NULL default '0.00',
  nr_vacation_day tinyint(2) NOT NULL default '0',
  multiple_employer tinyint(1) NOT NULL default '0',
  nr_dependent tinyint(2) unsigned NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr,pid,job_type_nr),
  KEY pid (pid)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_personell_assignment'
--

CREATE TABLE care_personell_assignment (
  nr int(10) unsigned NOT NULL auto_increment,
  personell_nr int(11) unsigned NOT NULL default '0',
  role_nr smallint(5) unsigned NOT NULL default '0',
  location_type_nr smallint(5) unsigned NOT NULL default '0',
  location_nr smallint(5) unsigned NOT NULL default '0',
  date_start date NOT NULL default '0000-00-00',
  date_end date NOT NULL default '0000-00-00',
  is_temporary tinyint(1) unsigned default NULL,
  list_frequency int(11) unsigned NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr,personell_nr,role_nr,location_type_nr,location_nr),
  KEY personell_nr (personell_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_person_insurance'
--

CREATE TABLE care_person_insurance (
  item_nr int(10) unsigned NOT NULL auto_increment,
  pid int(10) unsigned NOT NULL default '0',
  `type` varchar(60) NOT NULL default '',
  insurance_nr varchar(50) NOT NULL default '0',
  firm_id varchar(60) NOT NULL default '',
  class_nr tinyint(2) unsigned NOT NULL default '0',
  is_void tinyint(1) unsigned NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (item_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_person_other_number'
--

CREATE TABLE care_person_other_number (
  nr int(10) unsigned NOT NULL auto_increment,
  pid int(11) unsigned NOT NULL default '0',
  other_nr varchar(30) NOT NULL default '',
  org varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY pid (pid),
  KEY other_nr (other_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_pharma_ordercatalog'
--

CREATE TABLE care_pharma_ordercatalog (
  item_no int(11) NOT NULL auto_increment,
  dept_nr int(3) NOT NULL default '0',
  hit int(11) NOT NULL default '0',
  artikelname tinytext NOT NULL,
  bestellnum varchar(20) NOT NULL default '',
  minorder int(4) NOT NULL default '0',
  maxorder int(4) NOT NULL default '0',
  proorder tinytext NOT NULL,
  KEY item_no (item_no)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_pharma_orderlist'
--

CREATE TABLE care_pharma_orderlist (
  order_nr int(11) NOT NULL auto_increment,
  dept_nr int(3) NOT NULL default '0',
  order_date date NOT NULL default '0000-00-00',
  order_time time NOT NULL default '00:00:00',
  articles text NOT NULL,
  extra1 tinytext NOT NULL,
  extra2 text NOT NULL,
  validator tinytext NOT NULL,
  ip_addr tinytext NOT NULL,
  priority tinytext NOT NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  sent_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  process_datetime datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (order_nr,dept_nr),
  KEY dept (dept_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_pharma_products_main'
--

CREATE TABLE care_pharma_products_main (
  bestellnum varchar(25) NOT NULL default '',
  artikelnum tinytext NOT NULL,
  industrynum tinytext NOT NULL,
  artikelname tinytext NOT NULL,
  generic tinytext NOT NULL,
  description text NOT NULL,
  packing tinytext NOT NULL,
  minorder int(4) NOT NULL default '0',
  maxorder int(4) NOT NULL default '0',
  proorder tinytext NOT NULL,
  picfile tinytext NOT NULL,
  encoder tinytext NOT NULL,
  enc_date tinytext NOT NULL,
  enc_time tinytext NOT NULL,
  lock_flag tinyint(1) NOT NULL default '0',
  medgroup text NOT NULL,
  cave tinytext NOT NULL,
  `status` varchar(20) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (bestellnum)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_phone'
--

CREATE TABLE care_phone (
  item_nr bigint(20) unsigned NOT NULL auto_increment,
  title varchar(25) default NULL,
  `name` varchar(45) NOT NULL default '',
  vorname varchar(45) NOT NULL default '',
  pid int(11) unsigned NOT NULL default '0',
  personell_nr int(10) unsigned NOT NULL default '0',
  dept_nr smallint(3) unsigned NOT NULL default '0',
  beruf varchar(25) default NULL,
  bereich1 varchar(25) default NULL,
  bereich2 varchar(25) default NULL,
  inphone1 varchar(15) default NULL,
  inphone2 varchar(15) default NULL,
  inphone3 varchar(15) default NULL,
  exphone1 varchar(25) default NULL,
  exphone2 varchar(25) default NULL,
  funk1 varchar(15) default NULL,
  funk2 varchar(15) default NULL,
  roomnr varchar(10) default NULL,
  `date` date NOT NULL default '0000-00-00',
  `time` time NOT NULL default '00:00:00',
  `status` varchar(15) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (item_nr,pid,personell_nr,dept_nr),
  KEY `name` (`name`),
  KEY vorname (vorname)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_pregnancy'
--

CREATE TABLE care_pregnancy (
  nr int(10) unsigned NOT NULL auto_increment,
  encounter_nr int(11) unsigned NOT NULL default '0',
  this_pregnancy_nr int(11) unsigned NOT NULL default '0',
  delivery_date date NOT NULL default '0000-00-00',
  delivery_time time NOT NULL default '00:00:00',
  gravida tinyint(2) unsigned default NULL,
  para tinyint(2) unsigned default NULL,
  pregnancy_gestational_age tinyint(2) unsigned default NULL,
  nr_of_fetuses tinyint(2) unsigned default NULL,
  child_encounter_nr varchar(255) NOT NULL default '',
  is_booked tinyint(1) NOT NULL default '0',
  vdrl char(1) default NULL,
  rh tinyint(1) default NULL,
  delivery_mode tinyint(2) NOT NULL default '0',
  delivery_by varchar(60) default NULL,
  bp_systolic_high smallint(4) unsigned default NULL,
  bp_diastolic_high smallint(4) unsigned default NULL,
  proteinuria tinyint(1) default NULL,
  labour_duration smallint(3) unsigned default NULL,
  induction_method tinyint(2) NOT NULL default '0',
  induction_indication varchar(125) default NULL,
  anaesth_type_nr tinyint(2) NOT NULL default '0',
  is_epidural char(1) default NULL,
  complications varchar(255) default NULL,
  perineum tinyint(2) NOT NULL default '0',
  blood_loss float(8,2) unsigned default NULL,
  blood_loss_unit varchar(10) default NULL,
  is_retained_placenta char(1) NOT NULL default '',
  post_labour_condition varchar(35) default NULL,
  outcome varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr,encounter_nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_registry'
--

CREATE TABLE care_registry (
  registry_id varchar(35) NOT NULL default '',
  module_start_script varchar(60) NOT NULL default '',
  news_start_script varchar(60) NOT NULL default '',
  news_editor_script varchar(255) NOT NULL default '',
  news_reader_script varchar(255) NOT NULL default '',
  passcheck_script varchar(255) NOT NULL default '',
  composite text NOT NULL,
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (registry_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_role_person'
--

CREATE TABLE care_role_person (
  nr smallint(5) unsigned NOT NULL auto_increment,
  group_nr tinyint(3) unsigned NOT NULL default '0',
  role varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr,group_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_room'
--

CREATE TABLE care_room (
  nr int(8) unsigned NOT NULL auto_increment,
  type_nr tinyint(3) unsigned NOT NULL default '0',
  date_create date NOT NULL default '0000-00-00',
  date_close date NOT NULL default '0000-00-00',
  is_temp_closed tinyint(1) default '0',
  room_nr smallint(5) unsigned NOT NULL default '0',
  ward_nr smallint(5) unsigned NOT NULL default '0',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  nr_of_beds tinyint(3) unsigned NOT NULL default '1',
  closed_beds varchar(255) NOT NULL default '',
  info varchar(60) default NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr,type_nr,ward_nr,dept_nr),
  KEY room_nr (room_nr),
  KEY ward_nr (ward_nr),
  KEY dept_nr (dept_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_sessions'
--

CREATE TABLE care_sessions (
  SESSKEY varchar(32) NOT NULL default '',
  EXPIRY int(11) unsigned NOT NULL default '0',
  expireref varchar(64) NOT NULL default '',
  `DATA` text NOT NULL,
  PRIMARY KEY  (SESSKEY),
  KEY EXPIRY (EXPIRY)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_standby_duty_report'
--

CREATE TABLE care_standby_duty_report (
  report_nr int(11) NOT NULL auto_increment,
  dept varchar(15) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  standby_name varchar(35) NOT NULL default '',
  standby_start time NOT NULL default '00:00:00',
  standby_end time NOT NULL default '00:00:00',
  oncall_name varchar(35) NOT NULL default '',
  oncall_start time NOT NULL default '00:00:00',
  oncall_end time NOT NULL default '00:00:00',
  op_room char(2) NOT NULL default '',
  diagnosis_therapy text NOT NULL,
  encoding text NOT NULL,
  `status` varchar(20) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (report_nr),
  KEY report_nr (report_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_steri_products_main'
--

CREATE TABLE care_steri_products_main (
  bestellnum int(15) unsigned NOT NULL default '0',
  containernum varchar(15) NOT NULL default '',
  industrynum tinytext NOT NULL,
  containername varchar(40) NOT NULL default '',
  description text NOT NULL,
  packing tinytext NOT NULL,
  minorder int(4) unsigned NOT NULL default '0',
  maxorder int(4) unsigned NOT NULL default '0',
  proorder tinytext NOT NULL,
  picfile tinytext NOT NULL,
  encoder tinytext NOT NULL,
  enc_date tinytext NOT NULL,
  enc_time tinytext NOT NULL,
  lock_flag tinyint(1) NOT NULL default '0',
  medgroup text NOT NULL,
  cave tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tech_questions'
--

CREATE TABLE care_tech_questions (
  batch_nr int(11) NOT NULL auto_increment,
  dept varchar(60) NOT NULL default '',
  `query` text NOT NULL,
  inquirer varchar(25) NOT NULL default '',
  tphone varchar(30) NOT NULL default '',
  tdate date NOT NULL default '0000-00-00',
  ttime time NOT NULL default '00:00:00',
  tid timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  reply text NOT NULL,
  answered tinyint(1) NOT NULL default '0',
  ansby varchar(25) NOT NULL default '',
  astamp varchar(16) NOT NULL default '',
  archive tinyint(1) NOT NULL default '0',
  `status` varchar(15) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default '0000-00-00 00:00:00',
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr),
  KEY batch_nr (batch_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tech_repair_done'
--

CREATE TABLE care_tech_repair_done (
  batch_nr int(11) NOT NULL auto_increment,
  dept varchar(15) default NULL,
  dept_nr tinyint(3) unsigned NOT NULL default '0',
  job_id varchar(15) NOT NULL default '0',
  job text NOT NULL,
  reporter varchar(25) NOT NULL default '',
  id varchar(15) NOT NULL default '',
  tdate date NOT NULL default '0000-00-00',
  ttime time NOT NULL default '00:00:00',
  tid timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  seen tinyint(1) NOT NULL default '0',
  d_idx varchar(8) NOT NULL default '',
  `status` varchar(15) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default '0000-00-00 00:00:00',
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr,dept_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tech_repair_job'
--

CREATE TABLE care_tech_repair_job (
  batch_nr tinyint(4) NOT NULL auto_increment,
  dept varchar(15) NOT NULL default '',
  job text NOT NULL,
  reporter varchar(25) NOT NULL default '',
  id varchar(15) NOT NULL default '',
  tphone varchar(30) NOT NULL default '',
  tdate date NOT NULL default '0000-00-00',
  ttime time NOT NULL default '00:00:00',
  tid timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  done tinyint(1) NOT NULL default '0',
  seen tinyint(1) NOT NULL default '0',
  seenby varchar(25) NOT NULL default '',
  sstamp varchar(16) NOT NULL default '',
  doneby varchar(25) NOT NULL default '',
  dstamp varchar(16) NOT NULL default '',
  d_idx varchar(8) NOT NULL default '',
  archive tinyint(1) NOT NULL default '0',
  `status` varchar(20) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default '0000-00-00 00:00:00',
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr),
  KEY batch_nr (batch_nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_findings_baclabor'
--

CREATE TABLE care_test_findings_baclabor (
  batch_nr int(11) NOT NULL default '0',
  encounter_nr int(11) unsigned NOT NULL default '0',
  room_nr varchar(10) NOT NULL default '',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  notes varchar(255) NOT NULL default '',
  findings_init tinyint(1) NOT NULL default '0',
  findings_current tinyint(1) NOT NULL default '0',
  findings_final tinyint(1) NOT NULL default '0',
  entry_nr varchar(10) NOT NULL default '',
  rec_date date NOT NULL default '0000-00-00',
  type_general text NOT NULL,
  resist_anaerob text NOT NULL,
  resist_aerob text NOT NULL,
  findings text NOT NULL,
  doctor_id varchar(35) NOT NULL default '',
  findings_date date NOT NULL default '0000-00-00',
  findings_time time NOT NULL default '00:00:00',
  `status` varchar(10) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr,encounter_nr,room_nr,dept_nr),
  KEY findings_date (findings_date),
  KEY rec_date (rec_date)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_findings_chemlab_copy'
--

CREATE TABLE care_test_findings_chemlab_copy (
  batch_nr int(11) NOT NULL auto_increment,
  encounter_nr int(11) NOT NULL default '0',
  job_id varchar(25) NOT NULL default '',
  test_date date NOT NULL default '0000-00-00',
  test_time time NOT NULL default '00:00:00',
  group_id varchar(30) NOT NULL default '',
  serial_value text NOT NULL,
  add_value text NOT NULL,
  validator varchar(15) NOT NULL default '',
  validate_dt datetime NOT NULL default '0000-00-00 00:00:00',
  `status` varchar(20) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr,encounter_nr,job_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `care_test_findings_chemlab` (
  `batch_nr` int(11) NOT NULL auto_increment,
  `encounter_nr` int(11) NOT NULL default '0',
  `job_id` varchar(25) NOT NULL default '',
  `test_date` date NOT NULL default '0000-00-00',
  `test_time` time NOT NULL default '00:00:00',
  `group_id` varchar(30) NOT NULL default '',
  `serial_value` text NOT NULL,
  `add_value` text NOT NULL,
  `validator` varchar(15) NOT NULL default '',
  `validate_dt` datetime NOT NULL default '0000-00-00 00:00:00',
  `status` varchar(20) NOT NULL default '',
  `history` text NOT NULL,
  `modify_id` varchar(35) NOT NULL default '',
  `modify_time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `create_id` varchar(35) NOT NULL default '',
  `create_time` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`batch_nr`,`encounter_nr`,`job_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5659 ;

--
-- Table structure for table 'care_test_findings_laboratory'
--

CREATE TABLE care_test_findings_laboratory (
  findings_nr int(11) NOT NULL auto_increment,
  parent int(11) default NULL COMMENT 'Point to the HEAD finding_nr for follow up findings',
  task_nr int(11) NOT NULL default '-1',
  `timestamp` bigint(20) NOT NULL,
  finding text NOT NULL,
  `status` varchar(20) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  history text NOT NULL COMMENT 'Should be empty for follow ups, just for HEAD findings',
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (findings_nr,task_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_findings_patho'
--

CREATE TABLE care_test_findings_patho (
  batch_nr int(11) NOT NULL default '0',
  encounter_nr int(11) unsigned NOT NULL default '0',
  room_nr varchar(10) NOT NULL default '',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  material text NOT NULL,
  macro text NOT NULL,
  micro text NOT NULL,
  findings text NOT NULL,
  diagnosis text NOT NULL,
  doctor_id varchar(35) NOT NULL default '',
  findings_date date NOT NULL default '0000-00-00',
  findings_time time NOT NULL default '00:00:00',
  `status` varchar(10) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr,encounter_nr,room_nr,dept_nr),
  KEY send_date (findings_date),
  KEY findings_date (findings_date)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_findings_radio'
--

CREATE TABLE care_test_findings_radio (
  batch_nr int(11) unsigned NOT NULL default '0',
  encounter_nr int(11) unsigned NOT NULL default '0',
  room_nr smallint(5) unsigned NOT NULL default '0',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  findings text NOT NULL,
  diagnosis text NOT NULL,
  doctor_id varchar(35) NOT NULL default '',
  findings_date date NOT NULL default '0000-00-00',
  findings_time time NOT NULL default '00:00:00',
  `status` varchar(10) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr,encounter_nr),
  KEY send_date (findings_date),
  KEY findings_date (findings_date)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_group'
--

CREATE TABLE care_test_group (
  nr smallint(5) unsigned NOT NULL auto_increment,
  group_id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  sort_nr tinyint(4) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr,group_id),
  UNIQUE KEY group_id (group_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_param'
--

CREATE TABLE care_test_param (
  nr smallint(5) unsigned NOT NULL auto_increment,
  group_id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  id varchar(10) NOT NULL default '',
  msr_unit varchar(15) NOT NULL default '',
  median varchar(20) default NULL,
  hi_bound varchar(20) default NULL,
  lo_bound varchar(20) default NULL,
  hi_critical varchar(20) default NULL,
  lo_critical varchar(20) default NULL,
  hi_toxic varchar(20) default NULL,
  lo_toxic varchar(20) default NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr,group_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_request_baclabor'
--

CREATE TABLE care_test_request_baclabor (
  batch_nr int(11) NOT NULL auto_increment,
  encounter_nr int(11) unsigned NOT NULL default '0',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  material text NOT NULL,
  test_type text NOT NULL,
  material_note tinytext NOT NULL,
  diagnosis_note tinytext NOT NULL,
  immune_supp tinyint(4) NOT NULL default '0',
  send_date date NOT NULL default '0000-00-00',
  sample_date date NOT NULL default '0000-00-00',
  `status` varchar(10) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr),
  KEY send_date (send_date)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_request_blood'
--

CREATE TABLE care_test_request_blood (
  batch_nr int(11) NOT NULL auto_increment,
  encounter_nr int(11) unsigned NOT NULL default '0',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  blood_group varchar(10) NOT NULL default '',
  rh_factor varchar(10) NOT NULL default '',
  kell varchar(10) NOT NULL default '',
  date_protoc_nr varchar(45) NOT NULL default '',
  pure_blood varchar(15) NOT NULL default '',
  red_blood varchar(15) NOT NULL default '',
  leukoless_blood varchar(15) NOT NULL default '',
  washed_blood varchar(15) NOT NULL default '',
  prp_blood varchar(15) NOT NULL default '',
  thrombo_con varchar(15) NOT NULL default '',
  ffp_plasma varchar(15) NOT NULL default '',
  transfusion_dev varchar(15) NOT NULL default '',
  match_sample tinyint(4) NOT NULL default '0',
  transfusion_date date NOT NULL default '0000-00-00',
  diagnosis tinytext NOT NULL,
  notes tinytext NOT NULL,
  send_date date NOT NULL default '0000-00-00',
  doctor varchar(35) NOT NULL default '',
  phone_nr varchar(40) NOT NULL default '',
  `status` varchar(10) NOT NULL default '',
  blood_pb tinytext NOT NULL,
  blood_rb tinytext NOT NULL,
  blood_llrb tinytext NOT NULL,
  blood_wrb tinytext NOT NULL,
  blood_prp tinyblob NOT NULL,
  blood_tc tinytext NOT NULL,
  blood_ffp tinytext NOT NULL,
  b_group_count mediumint(9) NOT NULL default '0',
  b_group_price float(10,2) NOT NULL default '0.00',
  a_subgroup_count mediumint(9) NOT NULL default '0',
  a_subgroup_price float(10,2) NOT NULL default '0.00',
  extra_factors_count mediumint(9) NOT NULL default '0',
  extra_factors_price float(10,2) NOT NULL default '0.00',
  coombs_count mediumint(9) NOT NULL default '0',
  coombs_price float(10,2) NOT NULL default '0.00',
  ab_test_count mediumint(9) NOT NULL default '0',
  ab_test_price float(10,2) NOT NULL default '0.00',
  crosstest_count mediumint(9) NOT NULL default '0',
  crosstest_price float(10,2) NOT NULL default '0.00',
  ab_diff_count mediumint(9) NOT NULL default '0',
  ab_diff_price float(10,2) NOT NULL default '0.00',
  x_test_1_code mediumint(9) NOT NULL default '0',
  x_test_1_name varchar(35) NOT NULL default '',
  x_test_1_count mediumint(9) NOT NULL default '0',
  x_test_1_price float(10,2) NOT NULL default '0.00',
  x_test_2_code mediumint(9) NOT NULL default '0',
  x_test_2_name varchar(35) NOT NULL default '',
  x_test_2_count mediumint(9) NOT NULL default '0',
  x_test_2_price float(10,2) NOT NULL default '0.00',
  x_test_3_code mediumint(9) NOT NULL default '0',
  x_test_3_name varchar(35) NOT NULL default '',
  x_test_3_count mediumint(9) NOT NULL default '0',
  x_test_3_price float(10,2) NOT NULL default '0.00',
  lab_stamp datetime NOT NULL default '0000-00-00 00:00:00',
  release_via varchar(20) NOT NULL default '',
  receipt_ack varchar(20) NOT NULL default '',
  mainlog_nr varchar(7) NOT NULL default '',
  lab_nr varchar(7) NOT NULL default '',
  mainlog_date date NOT NULL default '0000-00-00',
  lab_date date NOT NULL default '0000-00-00',
  mainlog_sign varchar(20) NOT NULL default '',
  lab_sign varchar(20) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr),
  KEY send_date (send_date)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_request_chemlabor'
--

CREATE TABLE care_test_request_chemlabor (
  batch_nr int(11) NOT NULL auto_increment,
  encounter_nr int(11) unsigned NOT NULL default '0',
  room_nr varchar(10) NOT NULL default '',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  parameters text NOT NULL,
  doctor_sign varchar(35) NOT NULL default '',
  highrisk smallint(1) NOT NULL default '0',
  notes tinytext NOT NULL,
  send_date datetime NOT NULL default '0000-00-00 00:00:00',
  sample_time time NOT NULL default '00:00:00',
  sample_weekday smallint(1) NOT NULL default '0',
  `status` varchar(15) NOT NULL default '',
  history text,
  bill_number bigint(20) NOT NULL default '0',
  bill_status varchar(10) NOT NULL default '',
  is_disabled varchar(255) default NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_request_generic'
--

CREATE TABLE care_test_request_generic (
  batch_nr int(11) NOT NULL default '0',
  encounter_nr int(11) unsigned NOT NULL default '0',
  testing_dept varchar(35) NOT NULL default '',
  visit tinyint(1) NOT NULL default '0',
  order_patient tinyint(1) NOT NULL default '0',
  diagnosis_quiry text NOT NULL,
  send_date date NOT NULL default '0000-00-00',
  send_doctor varchar(35) NOT NULL default '',
  result text NOT NULL,
  result_date date NOT NULL default '0000-00-00',
  result_doctor varchar(35) NOT NULL default '',
  `status` varchar(10) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr),
  KEY batch_nr (batch_nr,encounter_nr),
  KEY send_date (send_date)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_request_laboratory'
--

CREATE TABLE care_test_request_laboratory (
  batch_nr int(11) NOT NULL auto_increment,
  encounter_nr int(10) unsigned NOT NULL default '0',
  room_nr int(11) unsigned NOT NULL default '0',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  doctor_sign varchar(255) NOT NULL default '',
  highrisk smallint(1) NOT NULL default '0',
  notes varchar(255) NOT NULL default '',
  send_date datetime NOT NULL default '0000-00-00 00:00:00',
  sample_time time NOT NULL default '00:00:00',
  sample_weekday smallint(1) NOT NULL default '0',
  `status` varchar(15) NOT NULL default '',
  history varchar(255) NOT NULL default '',
  is_disabled varchar(255) default NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr),
  KEY encounter_nr (encounter_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_request_laboratory_tasks'
--

CREATE TABLE care_test_request_laboratory_tasks (
  task_nr int(11) NOT NULL auto_increment,
  batch_nr int(11) NOT NULL,
  test_nr int(11) NOT NULL,
  bill_number bigint(20) NOT NULL default '0',
  bill_status varchar(10) NOT NULL default '',
  send_date datetime NOT NULL default '0000-00-00 00:00:00',
  `status` varchar(15) NOT NULL default '',
  is_disabled tinyint(4) default '0',
  PRIMARY KEY  (task_nr),
  KEY batch_nr (batch_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_request_patho'
--

CREATE TABLE care_test_request_patho (
  batch_nr int(11) unsigned NOT NULL auto_increment,
  encounter_nr int(11) unsigned NOT NULL default '0',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  quick_cut tinyint(4) NOT NULL default '0',
  qc_phone varchar(40) NOT NULL default '',
  quick_diagnosis tinyint(4) NOT NULL default '0',
  qd_phone varchar(40) NOT NULL default '',
  material_type varchar(25) NOT NULL default '',
  material_desc text NOT NULL,
  localization tinytext NOT NULL,
  clinical_note tinytext NOT NULL,
  extra_note tinytext NOT NULL,
  repeat_note tinytext NOT NULL,
  gyn_last_period varchar(25) NOT NULL default '',
  gyn_period_type varchar(25) NOT NULL default '',
  gyn_gravida varchar(25) NOT NULL default '',
  gyn_menopause_since varchar(25) NOT NULL default '0',
  gyn_hysterectomy varchar(25) NOT NULL default '0',
  gyn_contraceptive varchar(25) NOT NULL default '0',
  gyn_iud varchar(25) NOT NULL default '',
  gyn_hormone_therapy varchar(25) NOT NULL default '',
  doctor_sign varchar(35) NOT NULL default '',
  op_date date NOT NULL default '0000-00-00',
  send_date datetime NOT NULL default '0000-00-00 00:00:00',
  `status` varchar(10) NOT NULL default '',
  entry_date date NOT NULL default '0000-00-00',
  journal_nr varchar(15) NOT NULL default '',
  blocks_nr int(11) NOT NULL default '0',
  deep_cuts int(11) NOT NULL default '0',
  special_dye varchar(35) NOT NULL default '',
  immune_histochem varchar(35) NOT NULL default '',
  hormone_receptors varchar(35) NOT NULL default '',
  specials varchar(35) NOT NULL default '',
  history text,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  process_id varchar(35) NOT NULL default '',
  process_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr),
  KEY encounter_nr (encounter_nr),
  KEY send_date (send_date)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_test_request_radio'
--

CREATE TABLE care_test_request_radio (
  batch_nr int(11) NOT NULL default '0',
  encounter_nr int(11) unsigned NOT NULL default '0',
  dept_nr smallint(5) unsigned NOT NULL default '0',
  xray tinyint(1) NOT NULL default '0',
  ct tinyint(1) NOT NULL default '0',
  sono tinyint(1) NOT NULL default '0',
  mammograph tinyint(1) NOT NULL default '0',
  mrt tinyint(1) NOT NULL default '0',
  nuclear tinyint(1) NOT NULL default '0',
  if_patmobile tinyint(1) NOT NULL default '0',
  if_allergy tinyint(1) NOT NULL default '0',
  if_hyperten tinyint(1) NOT NULL default '0',
  if_pregnant tinyint(1) NOT NULL default '0',
  clinical_info text NOT NULL,
  test_request text NOT NULL,
  send_date date NOT NULL default '0000-00-00',
  send_doctor varchar(35) NOT NULL default '0',
  xray_nr varchar(9) NOT NULL default '0',
  r_cm_2 varchar(15) NOT NULL default '',
  mtr varchar(35) NOT NULL default '',
  xray_date date NOT NULL default '0000-00-00',
  xray_time time NOT NULL default '00:00:00',
  results text NOT NULL,
  results_date date NOT NULL default '0000-00-00',
  results_doctor varchar(35) NOT NULL default '',
  `status` varchar(10) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  process_id varchar(35) NOT NULL default '',
  process_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (batch_nr),
  UNIQUE KEY batch_nr_2 (batch_nr),
  KEY batch_nr (batch_nr,encounter_nr),
  KEY send_date (xray_time)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_anaesthesia'
--

CREATE TABLE care_type_anaesthesia (
  nr smallint(2) unsigned NOT NULL auto_increment,
  id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) default NULL,
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  UNIQUE KEY id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_application'
--

CREATE TABLE care_type_application (
  nr int(11) NOT NULL auto_increment,
  group_nr tinyint(3) unsigned NOT NULL default '0',
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) default NULL,
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_assignment'
--

CREATE TABLE care_type_assignment (
  type_nr int(10) unsigned NOT NULL default '0',
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(25) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_cause_opdelay'
--

CREATE TABLE care_type_cause_opdelay (
  type_nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  cause varchar(255) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (type_nr),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_color'
--

CREATE TABLE care_type_color (
  color_id varchar(25) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (color_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_department'
--

CREATE TABLE care_type_department (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_discharge'
--

CREATE TABLE care_type_discharge (
  nr smallint(3) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(100) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_duty'
--

CREATE TABLE care_type_duty (
  type_nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (type_nr),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_encounter'
--

CREATE TABLE care_type_encounter (
  type_nr int(10) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(25) NOT NULL default '0',
  description varchar(255) NOT NULL default '',
  hide_from tinyint(4) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (type_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_ethnic_orig'
--

CREATE TABLE care_type_ethnic_orig (
  nr smallint(5) unsigned NOT NULL auto_increment,
  class_nr tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY `type` (class_nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_feeding'
--

CREATE TABLE care_type_feeding (
  nr smallint(2) unsigned NOT NULL auto_increment,
  group_nr tinyint(3) unsigned NOT NULL default '0',
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) default NULL,
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_immunization'
--

CREATE TABLE care_type_immunization (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(20) NOT NULL default '',
  `name` varchar(20) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  period smallint(6) default '0',
  tolerance smallint(3) default '0',
  dosage text,
  medicine text NOT NULL,
  titer text,
  note text,
  application tinyint(3) default '0',
  `status` varchar(25) NOT NULL default 'normal',
  history text,
  modify_id varchar(35) default NULL,
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_insurance'
--

CREATE TABLE care_type_insurance (
  type_nr int(11) NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(60) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (type_nr),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_localization'
--

CREATE TABLE care_type_localization (
  nr tinyint(3) unsigned NOT NULL auto_increment,
  category varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  short_code char(1) NOT NULL default '',
  LD_var_short_code varchar(25) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  hide_from varchar(255) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_location'
--

CREATE TABLE care_type_location (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_measurement'
--

CREATE TABLE care_type_measurement (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_notes'
--

CREATE TABLE care_type_notes (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  sort_nr smallint(6) NOT NULL default '0',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  UNIQUE KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_outcome'
--

CREATE TABLE care_type_outcome (
  nr smallint(2) unsigned NOT NULL auto_increment,
  group_nr tinyint(3) unsigned NOT NULL default '0',
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_perineum'
--

CREATE TABLE care_type_perineum (
  nr smallint(2) unsigned NOT NULL auto_increment,
  id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  UNIQUE KEY id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_prescription'
--

CREATE TABLE care_type_prescription (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_room'
--

CREATE TABLE care_type_room (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_test'
--

CREATE TABLE care_type_test (
  type_nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (type_nr),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_time'
--

CREATE TABLE care_type_time (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_type_unit_measurement'
--

CREATE TABLE care_type_unit_measurement (
  nr smallint(5) unsigned NOT NULL auto_increment,
  `type` varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY `type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_adher_code'
--

CREATE TABLE care_tz_arv_adher_code (
  care_tz_arv_adher_code_id bigint(20) NOT NULL auto_increment,
  `code` char(1) collate latin1_general_ci default NULL,
  description varchar(40) collate latin1_general_ci default NULL,
  other tinyint(1) NOT NULL,
  PRIMARY KEY  (care_tz_arv_adher_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_adher_reas'
--

CREATE TABLE care_tz_arv_adher_reas (
  care_tz_arv_adher_reas_id bigint(20) NOT NULL auto_increment,
  care_tz_arv_visit_2_id bigint(20) NOT NULL,
  care_tz_arv_adher_reas_code_id int(10) unsigned NOT NULL,
  other varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_adher_reas_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_adher_reas_code'
--

CREATE TABLE care_tz_arv_adher_reas_code (
  care_tz_arv_adher_reas_code_id int(10) unsigned NOT NULL auto_increment,
  `code` tinyint(3) unsigned default NULL,
  description varchar(40) collate latin1_general_ci default NULL,
  other tinyint(1) NOT NULL,
  PRIMARY KEY  (care_tz_arv_adher_reas_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_allergies'
--

CREATE TABLE care_tz_arv_allergies (
  care_tz_arv_allergies_id int(10) unsigned NOT NULL auto_increment,
  care_tz_arv_registration_id bigint(20) default NULL,
  description varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_allergies_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_case'
--

CREATE TABLE care_tz_arv_case (
  care_tz_arv_case_id bigint(20) unsigned NOT NULL auto_increment,
  pid int(11) unsigned NOT NULL,
  datetime_first_hivtest datetime default NULL,
  datetime_start_arv datetime default NULL,
  arv_pid bigint(20) NOT NULL,
  district varchar(80) collate latin1_general_ci default NULL,
  village varchar(60) collate latin1_general_ci default NULL,
  street varchar(60) collate latin1_general_ci default NULL,
  balozi varchar(80) collate latin1_general_ci default NULL,
  chairman_of_village varchar(80) collate latin1_general_ci default NULL,
  head_of_family varchar(80) collate latin1_general_ci default NULL,
  name_of_secretary varchar(80) collate latin1_general_ci default NULL,
  secretary_phone varchar(10) collate latin1_general_ci default NULL,
  secretary_adress varchar(100) collate latin1_general_ci default NULL,
  history text collate latin1_general_ci,
  create_id timestamp NULL default NULL,
  create_time bigint(20) default NULL,
  modify_id varchar(35) collate latin1_general_ci default NULL,
  modify_time timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (care_tz_arv_case_id),
  UNIQUE KEY pid (pid),
  UNIQUE KEY arv_pid (arv_pid),
  UNIQUE KEY arv_pid_2 (arv_pid)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_chairman'
--

CREATE TABLE care_tz_arv_chairman (
  care_tz_arv_chairman_id int(10) unsigned NOT NULL auto_increment,
  care_tz_arv_registration_id bigint(20) default NULL,
  vname varchar(60) collate latin1_general_ci default NULL,
  nname varchar(60) collate latin1_general_ci default NULL,
  street varchar(60) collate latin1_general_ci default NULL,
  village varchar(60) collate latin1_general_ci default NULL,
  hamlet varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_chairman_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_co_medi'
--

CREATE TABLE care_tz_arv_co_medi (
  care_tz_arv_co_medi_id int(11) NOT NULL auto_increment,
  care_tz_arv_co_medi_other_id int(10) unsigned default NULL,
  item_id bigint(20) default NULL,
  care_tz_arv_visit_2_id bigint(20) NOT NULL,
  PRIMARY KEY  (care_tz_arv_co_medi_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_co_medi_other'
--

CREATE TABLE care_tz_arv_co_medi_other (
  care_tz_arv_co_medi_other_id int(10) unsigned NOT NULL auto_increment,
  description varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  USING BTREE (care_tz_arv_co_medi_other_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_education'
--

CREATE TABLE care_tz_arv_education (
  care_tz_arv_education_id int(10) unsigned NOT NULL auto_increment,
  care_tz_arv_education_topic_id bigint(20) NOT NULL,
  care_tz_arv_registration_id bigint(20) NOT NULL,
  `comment` text collate latin1_general_ci,
  comment_date date default NULL,
  create_id varchar(35) collate latin1_general_ci default NULL,
  modify_id varchar(35) collate latin1_general_ci default NULL,
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  history text collate latin1_general_ci NOT NULL,
  care_tz_arv_education_group_id int(10) unsigned NOT NULL,
  PRIMARY KEY  (care_tz_arv_education_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_education_group'
--

CREATE TABLE care_tz_arv_education_group (
  care_tz_arv_education_group_id int(10) unsigned NOT NULL auto_increment,
  description varchar(255) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_education_group_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_education_topic'
--

CREATE TABLE care_tz_arv_education_topic (
  care_tz_arv_education_topic_id bigint(20) NOT NULL auto_increment,
  care_tz_arv_education_group_id int(10) unsigned NOT NULL,
  description varchar(255) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_education_topic_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_eligible_reason'
--

CREATE TABLE care_tz_arv_eligible_reason (
  care_tz_arv_eligible_reason_id int(10) unsigned NOT NULL auto_increment,
  care_tz_arv_eligible_reason_code_id int(10) unsigned NOT NULL,
  care_tz_arv_registration_id bigint(20) NOT NULL,
  care_tz_arv_lab_id bigint(20) default NULL,
  PRIMARY KEY  (care_tz_arv_eligible_reason_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_eligible_reason_code'
--

CREATE TABLE care_tz_arv_eligible_reason_code (
  care_tz_arv_eligible_reason_code_id int(10) unsigned NOT NULL auto_increment,
  description varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_eligible_reason_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_events'
--

CREATE TABLE care_tz_arv_events (
  care_tz_arv_events_id bigint(20) NOT NULL auto_increment,
  care_tz_arv_events_code_id bigint(20) NOT NULL,
  care_tz_arv_visit_id bigint(20) NOT NULL,
  PRIMARY KEY  (care_tz_arv_events_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_events_code'
--

CREATE TABLE care_tz_arv_events_code (
  care_tz_arv_events_code_id bigint(20) NOT NULL auto_increment,
  who_code int(10) unsigned default NULL,
  who_code_text varchar(256) collate latin1_general_ci default NULL,
  parent int(4) default NULL,
  PRIMARY KEY  (care_tz_arv_events_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_exposure'
--

CREATE TABLE care_tz_arv_exposure (
  care_tz_arv_exposure_id int(10) unsigned NOT NULL auto_increment,
  description varchar(50) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_exposure_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_follow_status'
--

CREATE TABLE care_tz_arv_follow_status (
  care_tz_arv_follow_status_id int(10) unsigned NOT NULL auto_increment,
  care_tz_arv_follow_status_code_id int(10) unsigned default NULL,
  care_tz_arv_visit_2_id bigint(20) NOT NULL,
  other varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_follow_status_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_follow_status_code'
--

CREATE TABLE care_tz_arv_follow_status_code (
  care_tz_arv_follow_status_code_id int(10) unsigned NOT NULL auto_increment,
  `code` varchar(8) collate latin1_general_ci default NULL,
  description varchar(80) collate latin1_general_ci default NULL,
  other tinyint(1) NOT NULL,
  PRIMARY KEY  (care_tz_arv_follow_status_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_functional_status'
--

CREATE TABLE care_tz_arv_functional_status (
  care_tz_arv_functional_status_id int(10) unsigned NOT NULL auto_increment,
  `code` char(1) collate latin1_general_ci default NULL,
  description varchar(60) collate latin1_general_ci default NULL,
  other tinyint(1) NOT NULL,
  PRIMARY KEY  (care_tz_arv_functional_status_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_illness'
--

CREATE TABLE care_tz_arv_illness (
  care_tz_arv_illness_id int(10) unsigned NOT NULL auto_increment,
  care_tz_arv_illness_code_id bigint(20) NOT NULL,
  care_tz_arv_visit_2_id bigint(20) NOT NULL,
  other varchar(80) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_illness_id),
  KEY care_tz_arv_events_FKIndex2 (care_tz_arv_visit_2_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_illness_code'
--

CREATE TABLE care_tz_arv_illness_code (
  care_tz_arv_illness_code_id bigint(20) NOT NULL auto_increment,
  `code` varchar(10) collate latin1_general_ci NOT NULL,
  description varchar(256) collate latin1_general_ci NOT NULL,
  other tinyint(1) NOT NULL,
  PRIMARY KEY  (care_tz_arv_illness_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_lab'
--

CREATE TABLE care_tz_arv_lab (
  care_tz_arv_lab_id bigint(20) NOT NULL auto_increment,
  nr bigint(20) NOT NULL,
  care_tz_arv_visit_2_id bigint(20) default NULL,
  `value` varchar(6) collate latin1_general_ci default NULL,
  date_analyse int(10) unsigned default NULL,
  PRIMARY KEY  (care_tz_arv_lab_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_lab_param'
--

CREATE TABLE care_tz_arv_lab_param (
  care_tz_arv_lab_param_id bigint(20) NOT NULL auto_increment,
  lab_param int(10) unsigned default NULL,
  unit varchar(20) collate latin1_general_ci default NULL,
  param_upper int(10) unsigned default NULL,
  param_lower int(10) unsigned default NULL,
  PRIMARY KEY  (care_tz_arv_lab_param_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_referred'
--

CREATE TABLE care_tz_arv_referred (
  care_tz_arv_referred_id bigint(20) NOT NULL auto_increment,
  care_tz_arv_referred_code_id bigint(20) default NULL,
  care_tz_arv_visit_2_id bigint(20) NOT NULL,
  other varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_referred_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_referred_code'
--

CREATE TABLE care_tz_arv_referred_code (
  care_tz_arv_referred_code_id bigint(20) NOT NULL auto_increment,
  `code` tinyint(3) unsigned default NULL,
  description varchar(60) collate latin1_general_ci default NULL,
  other tinyint(1) NOT NULL,
  PRIMARY KEY  (care_tz_arv_referred_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_referred_from'
--

CREATE TABLE care_tz_arv_referred_from (
  care_tz_arv_referred_from_id int(10) unsigned NOT NULL auto_increment,
  care_tz_arv_referred_from_code_id int(10) unsigned NOT NULL,
  care_tz_arv_registration_id bigint(20) NOT NULL,
  other varchar(60) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_referred_from_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_referred_from_code'
--

CREATE TABLE care_tz_arv_referred_from_code (
  care_tz_arv_referred_from_code_id int(10) unsigned NOT NULL auto_increment,
  description varchar(30) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_referred_from_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_regimen'
--

CREATE TABLE care_tz_arv_regimen (
  care_tz_arv_regimen_id int(10) unsigned NOT NULL auto_increment,
  care_tz_arv_regimen_code_id bigint(20) default NULL,
  care_tz_arv_visit_2_id bigint(20) NOT NULL,
  other varchar(80) collate latin1_general_ci default NULL,
  regimen_days int(3) unsigned default NULL,
  PRIMARY KEY  (care_tz_arv_regimen_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_regimen_code'
--

CREATE TABLE care_tz_arv_regimen_code (
  care_tz_arv_regimen_code_id bigint(20) NOT NULL auto_increment,
  `code` varchar(10) collate latin1_general_ci default NULL,
  description varchar(60) collate latin1_general_ci default NULL,
  parent int(10) unsigned default NULL,
  other tinyint(1) NOT NULL,
  PRIMARY KEY  (care_tz_arv_regimen_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_registration'
--

CREATE TABLE care_tz_arv_registration (
  care_tz_arv_registration_id bigint(20) NOT NULL auto_increment,
  care_tz_arv_lab_id bigint(20) default NULL,
  care_tz_arv_functional_status_id int(10) unsigned default NULL,
  care_tz_arv_exposure_id int(10) unsigned default NULL,
  pid int(11) unsigned NOT NULL,
  ctc_id varchar(10) collate latin1_general_ci NOT NULL,
  ten_cell_leader varchar(60) collate latin1_general_ci default NULL,
  head_of_household varchar(60) collate latin1_general_ci default NULL,
  date_first_hiv_test datetime default NULL,
  date_confirmed_hiv datetime default NULL,
  date_eligible datetime default NULL,
  date_enrolled datetime default NULL,
  date_ready datetime default NULL,
  date_start_art datetime default NULL,
  status_clinical_stage int(10) unsigned default NULL,
  status_weight double default NULL,
  create_id varchar(35) collate latin1_general_ci default NULL,
  create_time bigint(35) default NULL,
  modify_id varchar(35) collate latin1_general_ci default NULL,
  modify_time timestamp NULL default NULL,
  history text collate latin1_general_ci,
  PRIMARY KEY  (care_tz_arv_registration_id),
  UNIQUE KEY pid (pid),
  UNIQUE KEY ctc_id (ctc_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_status'
--

CREATE TABLE care_tz_arv_status (
  care_tz_arv_status_id bigint(20) NOT NULL auto_increment,
  status_code tinyint(3) unsigned default NULL,
  status_text varchar(20) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_status_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_status_txt'
--

CREATE TABLE care_tz_arv_status_txt (
  care_tz_arv_status_txt_id bigint(20) unsigned NOT NULL auto_increment,
  care_tz_arv_visit_id bigint(20) NOT NULL,
  care_tz_arv_status_txt_code_id bigint(20) NOT NULL,
  notes varchar(80) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_status_txt_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_status_txt_code'
--

CREATE TABLE care_tz_arv_status_txt_code (
  care_tz_arv_status_txt_code_id bigint(50) NOT NULL auto_increment,
  status_code tinyint(3) unsigned default NULL,
  status_text varchar(50) collate latin1_general_ci default NULL,
  parent int(4) NOT NULL,
  PRIMARY KEY  (care_tz_arv_status_txt_code_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_tb_status'
--

CREATE TABLE care_tz_arv_tb_status (
  care_tz_arv_tb_status_id bigint(20) NOT NULL auto_increment,
  `code` varchar(10) collate latin1_general_ci default NULL,
  description varchar(70) collate latin1_general_ci default NULL,
  other tinyint(1) NOT NULL,
  PRIMARY KEY  (care_tz_arv_tb_status_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_treatment_supporter'
--

CREATE TABLE care_tz_arv_treatment_supporter (
  care_tz_arv_treatment_supporter_id int(10) unsigned NOT NULL auto_increment,
  care_tz_arv_registration_id bigint(20) default NULL,
  vname varchar(60) collate latin1_general_ci default NULL,
  nname varchar(60) collate latin1_general_ci default NULL,
  street varchar(60) collate latin1_general_ci default NULL,
  village varchar(60) collate latin1_general_ci default NULL,
  telephone varchar(10) collate latin1_general_ci default NULL,
  organisation varchar(30) collate latin1_general_ci default NULL,
  PRIMARY KEY  (care_tz_arv_treatment_supporter_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_visit'
--

CREATE TABLE care_tz_arv_visit (
  care_tz_arv_visit_id bigint(20) NOT NULL auto_increment,
  care_tz_arv_case_id bigint(20) unsigned NOT NULL,
  encounter_nr bigint(20) NOT NULL,
  care_tz_arv_status_id bigint(20) NOT NULL default '-1',
  weight double default NULL,
  test_TB tinyint(1) NOT NULL default '-1',
  test_Cotrimoxazole tinyint(1) NOT NULL default '-1',
  test_INH tinyint(1) NOT NULL default '-1',
  test_Difflucan tinyint(1) NOT NULL default '-1',
  other_problems varchar(80) collate latin1_general_ci default NULL,
  history text collate latin1_general_ci,
  create_id varchar(35) collate latin1_general_ci NOT NULL,
  create_time bigint(20) NOT NULL,
  modify_id varchar(35) collate latin1_general_ci default NULL,
  modify_time timestamp NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (care_tz_arv_visit_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_arv_visit_2'
--

CREATE TABLE care_tz_arv_visit_2 (
  care_tz_arv_visit_2_id bigint(20) NOT NULL auto_increment,
  care_tz_arv_registration_id bigint(20) NOT NULL,
  care_tz_arv_adher_code_id bigint(20) default NULL,
  care_tz_arv_functional_status_id int(10) unsigned default NULL,
  care_tz_arv_tb_status_id bigint(20) default NULL,
  care_tz_arv_status_id bigint(20) default NULL,
  encounter_nr bigint(20) NOT NULL,
  visit_date datetime default NULL,
  weight double default NULL,
  height double default NULL,
  clinical_stage tinyint(3) unsigned default NULL,
  pregnant tinyint(1) default NULL,
  date_of_delivery date default NULL,
  cotrim tinyint(1) default '-1',
  diflucan tinyint(1) default '-1',
  nutrition_support tinyint(1) unsigned default NULL,
  next_visit_date date default NULL,
  create_id varchar(35) collate latin1_general_ci default NULL,
  create_time bigint(20) default NULL,
  modify_id varchar(35) collate latin1_general_ci default NULL,
  modify_time timestamp NULL default CURRENT_TIMESTAMP,
  history text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (care_tz_arv_visit_2_id),
  KEY care_tz_arv_visit_FKIndex1 (care_tz_arv_functional_status_id),
  KEY care_tz_arv_visit_FKIndex2 (care_tz_arv_tb_status_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_billing'
--

CREATE TABLE care_tz_billing (
  nr bigint(20) NOT NULL auto_increment,
  encounter_nr bigint(20) NOT NULL default '0',
  first_date bigint(20) NOT NULL default '0',
  create_id varchar(35) NOT NULL default '',
  creation_date bigint(20) NOT NULL default '0',
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_billing_archive'
--

CREATE TABLE care_tz_billing_archive (
  id bigint(20) NOT NULL auto_increment,
  nr bigint(20) NOT NULL default '0',
  encounter_nr bigint(20) NOT NULL default '0',
  first_date bigint(20) NOT NULL default '0',
  create_id varchar(35) NOT NULL default '',
  creation_date bigint(20) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY nr (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_billing_archive_elem'
--

CREATE TABLE care_tz_billing_archive_elem (
  ID bigint(20) NOT NULL auto_increment,
  nr bigint(20) NOT NULL default '0',
  date_change bigint(20) NOT NULL default '0',
  is_labtest tinyint(4) NOT NULL default '0',
  is_medicine tinyint(4) NOT NULL default '0',
  is_comment tinyint(4) NOT NULL default '0',
  is_paid tinyint(4) NOT NULL default '0',
  amount bigint(20) NOT NULL default '0',
  price varchar(255) NOT NULL default '',
  balanced_insurance varchar(20) default NULL,
  insurance_id bigint(20) default NULL,
  description varchar(255) NOT NULL default '',
  item_number bigint(20) NOT NULL default '0',
  prescriptions_nr bigint(20) NOT NULL default '0',
  User_Id varchar(100) NOT NULL,
  signed_by_follower tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (ID),
  KEY nr (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_billing_elem'
--

CREATE TABLE care_tz_billing_elem (
  ID bigint(20) NOT NULL auto_increment,
  nr bigint(20) NOT NULL default '0',
  date_change bigint(20) NOT NULL default '0',
  is_labtest tinyint(4) NOT NULL default '0',
  is_medicine tinyint(4) NOT NULL default '0',
  is_comment tinyint(4) NOT NULL default '0',
  is_paid tinyint(4) NOT NULL default '0',
  amount bigint(20) NOT NULL default '0',
  amount_doc bigint(20) NOT NULL default '0',
  price varchar(255) NOT NULL default '',
  balanced_insurance varchar(20) default NULL,
  insurance_id bigint(20) default NULL,
  description varchar(255) NOT NULL default '',
  notes varchar(255) NOT NULL default '',
  item_number bigint(20) NOT NULL default '0',
  prescriptions_nr bigint(20) NOT NULL default '0',
  PRIMARY KEY  (ID),
  KEY nr (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_company'
--

CREATE TABLE care_tz_company (
  id bigint(20) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  contact varchar(255) NOT NULL default '',
  po_box varchar(255) NOT NULL default '',
  city varchar(255) NOT NULL default '',
  start_date bigint(20) NOT NULL default '0',
  end_date bigint(20) NOT NULL default '0',
  invoice_flag tinyint(4) NOT NULL default '0',
  credit_preselection_flag tinyint(4) NOT NULL default '0',
  hide_company_flag tinyint(4) NOT NULL default '0',
  prepaid_amount int(11) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_diagnosis'
--

CREATE TABLE care_tz_diagnosis (
  case_nr bigint(20) NOT NULL auto_increment,
  parent_case_nr bigint(20) NOT NULL default '-1',
  PID bigint(20) NOT NULL default '0',
  encounter_nr bigint(20) NOT NULL default '0',
  `timestamp` bigint(20) NOT NULL default '0',
  ICD_10_code varchar(10) NOT NULL default '',
  ICD_10_description varchar(50) NOT NULL default '',
  `type` varchar(25) NOT NULL default '',
  `comment` varchar(255) default NULL,
  doctor_name varchar(200) default NULL,
  PRIMARY KEY  (case_nr),
  KEY parent_case_nr (parent_case_nr,PID,encounter_nr,`timestamp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_district'
--

CREATE TABLE care_tz_district (
  district_id int(11) NOT NULL auto_increment,
  district_code int(10) NOT NULL,
  district_name varchar(100) collate latin1_general_ci NOT NULL,
  is_additional tinyint(4) NOT NULL,
  PRIMARY KEY  (district_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_drugliststruc'
--

CREATE TABLE care_tz_drugliststruc (
  item_id bigint(20) NOT NULL default '0',
  item_number varchar(5) NOT NULL default '',
  is_pediatric smallint(6) NOT NULL default '0',
  is_adult smallint(6) NOT NULL default '0',
  is_other smallint(6) NOT NULL default '0',
  is_consumable smallint(6) NOT NULL default '0',
  mems_item_code varchar(255) NOT NULL default '',
  mems_item_description varchar(255) NOT NULL default '',
  mems_pack_size varchar(255) NOT NULL default '',
  mems_price_per_pack_size double NOT NULL default '0',
  mems_sizes varchar(50) NOT NULL default '',
  item_description varchar(100) default NULL,
  item_full_description varchar(255) NOT NULL default '',
  dosage varchar(50) NOT NULL default '',
  unit_price varchar(50) default '0.00',
  purchasing_class varchar(50) NOT NULL default '',
  PRIMARY KEY  (item_number)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_drugsandservices'
--

CREATE TABLE `care_tz_drugsandservices` (
  `item_id` bigint(20) NOT NULL auto_increment,
  `item_number` varchar(50) NOT NULL default '',
  `is_pediatric` smallint(6) NOT NULL default '0',
  `is_adult` smallint(6) NOT NULL default '0',
  `is_other` smallint(6) NOT NULL default '0',
  `is_consumable` smallint(6) NOT NULL default '0',
  `is_labtest` tinyint(4) NOT NULL default '0',
  `item_description` varchar(255) NOT NULL default '',
  `item_full_description` varchar(255) NOT NULL default '',
  `unit_price` varchar(50) NOT NULL default '',
  `unit_price_1` varchar(50) default NULL,
  `unit_price_2` varchar(50) default NULL,
  `unit_price_3` varchar(50) default NULL,
  `purchasing_class` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`item_id`),
  KEY `IX_ITEM_NUMBER` (`item_number`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_drugsandservices_description'
--

CREATE TABLE care_tz_drugsandservices_description (
  ID bigint(20) NOT NULL auto_increment,
  Fieldname varchar(50) NOT NULL,
  ShowDescription varchar(50) NOT NULL,
  FullDescription varchar(255) NOT NULL,
  is_insurance_price tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (ID)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_icd10_quicklist'
--

CREATE TABLE care_tz_icd10_quicklist (
  ID bigint(20) NOT NULL auto_increment,
  parent bigint(20) NOT NULL default '0',
  description varchar(50) default NULL,
  diagnosis_code varchar(50) default NULL,
  PRIMARY KEY  (ID),
  KEY parent (parent)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_insurance'
--

CREATE TABLE care_tz_insurance (
  id bigint(20) NOT NULL auto_increment,
  parent bigint(20) NOT NULL default '0',
  company_parent int(11) NOT NULL,
  company_id bigint(20) NOT NULL default '0',
  PID bigint(20) NOT NULL default '0',
  ceiling varchar(255) NOT NULL default '',
  ceiling_startup_subtraction varchar(20) NOT NULL default '',
  plan varchar(255) NOT NULL default '',
  start_date bigint(20) NOT NULL default '0',
  end_date bigint(20) NOT NULL default '0',
  `timestamp` bigint(20) NOT NULL,
  cancel_flag tinyint(4) NOT NULL default '0',
  paid_flag tinyint(4) NOT NULL default '0',
  gets_company_credit tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY parent (parent,company_id,PID)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Table structure for table `care_tz_insurances_admin`
--

DROP TABLE IF EXISTS `care_tz_insurances_admin`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `care_tz_insurances_admin` (
  `insurance_ID` smallint(5) NOT NULL auto_increment,
  `insurer` smallint(5) NOT NULL default '-1',
  `name` varchar(30) default NULL,
  `max_pay` int(10) default NULL,
  `deleted` tinyint(1) NOT NULL default '1',
  `creation` text NOT NULL,
  `id_insurer_hist` text,
  `name_hist` text,
  `max_pay_hist` text,
  `deleted_hist` text,
  `contact_person` varchar(60) default NULL,
  `contact_person_hist` text NOT NULL,
  `po_box` varchar(50) default NULL,
  `po_box_hist` text NOT NULL,
  `city` varchar(60) default NULL,
  `city_hist` text NOT NULL,
  `phone` varchar(35) default NULL,
  `phone_hist` text NOT NULL,
  `email` varchar(60) default NULL,
  `email_hist` text NOT NULL,
  PRIMARY KEY  (`insurance_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `care_tz_insurances_admin`
--

LOCK TABLES `care_tz_insurances_admin` WRITE;
/*!40000 ALTER TABLE `care_tz_insurances_admin` DISABLE KEYS */;
INSERT INTO `care_tz_insurances_admin` VALUES (1,-1,'sss',0,1,'Creation 2008-12-23 13:23:20 Niemi \n','-1\n','sss \n','-\n','-\n','','-\n','','-\n','','-\n','','-\n','','-\n'),(2,-1,'sssa',0,1,'Creation 2008-12-23 13:23:36 Niemi \n','-1\n','sssa \n','0\n','-\n','','-\n','','-\n','','-\n','','-\n','','-\n'),(3,-1,'sssa',0,1,'Creation 2008-12-23 13:23:36 Niemi ','-1\n','sssa ','0\n','- ','','-\n','','-\n','','-\n','','-\n','','-\n'),(4,-1,'ddda',0,0,'Creation 2008-12-23 13:27:31 Niemi \n','-1\n','ddd \nUpdate from sssa (del) to ddda / 2008-12-23 13:29:37 Niemi \n','-\n','-\n','','-\n','','-\n','','-\n','','-\n','','-\n');
/*!40000 ALTER TABLE `care_tz_insurances_admin` ENABLE KEYS */;
UNLOCK TABLES;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_insurance_types'
--

CREATE TABLE care_tz_insurance_types (
  id bigint(20) NOT NULL auto_increment,
  ceiling varchar(20) NOT NULL default '0',
  prepaid_amount int(11) NOT NULL,
  `name` varchar(30) NOT NULL default '',
  `comment` varchar(255) NOT NULL default '',
  is_disabled tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_laboratory'
--

CREATE TABLE care_tz_laboratory (
  id bigint(20) NOT NULL auto_increment,
  encounter_nr bigint(20) NOT NULL default '0',
  care_tz_laboratory_tests_id bigint(20) NOT NULL default '0',
  `timestamp` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY encounter_nr (encounter_nr),
  KEY care_tz_laboratory_tests_id (care_tz_laboratory_tests_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_laboratory_param'
--

CREATE TABLE care_tz_laboratory_param (
  nr bigint(20) unsigned NOT NULL auto_increment,
  group_id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  shortname varchar(10) NOT NULL,
  id varchar(10) NOT NULL default '',
  msr_unit varchar(15) NOT NULL default '',
  median varchar(20) default NULL,
  hi_bound varchar(20) default NULL,
  lo_bound varchar(20) default NULL,
  hi_critical varchar(20) default NULL,
  lo_critical varchar(20) default NULL,
  hi_toxic varchar(20) default NULL,
  lo_toxic varchar(20) default NULL,
  add_type varchar(255) NOT NULL default '',
  add_label varchar(255) NOT NULL default '',
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  price varchar(10) NOT NULL,
  price_3 varchar(10) default NULL,
  price_2 varchar(10) default NULL,
  price_1 varchar(10) default NULL,
  PRIMARY KEY  (nr)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_laboratory_tests'
--

CREATE TABLE care_tz_laboratory_tests (
  id bigint(20) NOT NULL auto_increment,
  parent bigint(20) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  is_common tinyint(4) NOT NULL default '0',
  is_comment_required tinyint(4) NOT NULL default '0',
  `comment` varchar(255) NOT NULL default '',
  price double NOT NULL default '0',
  is_enabled tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_mtuha_cat'
--

CREATE TABLE care_tz_mtuha_cat (
  cat_ID int(50) NOT NULL auto_increment,
  description varchar(100) character set latin1 default NULL,
  PRIMARY KEY  (cat_ID)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_mtuha_cat_key'
--

CREATE TABLE care_tz_mtuha_cat_key (
  cat_ID int(50) NOT NULL,
  icd10_key varchar(50) character set latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_region'
--

CREATE TABLE care_tz_region (
  region_id int(11) NOT NULL auto_increment,
  region_code int(10) NOT NULL,
  region_name varchar(100) collate latin1_general_ci NOT NULL,
  is_additional tinyint(4) NOT NULL,
  PRIMARY KEY  (region_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_regions'
--

CREATE TABLE care_tz_regions (
  `CODE` varchar(6) default NULL,
  `NAME` varchar(30) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_religion'
--

CREATE TABLE care_tz_religion (
  nr bigint(20) NOT NULL auto_increment,
  `code` varchar(6) default NULL,
  `name` varchar(30) default NULL,
  is_additional tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (nr),
  KEY `CODE` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_stock_item_amount'
--

CREATE TABLE care_tz_stock_item_amount (
  ID bigint(20) NOT NULL auto_increment,
  Drugsandservices_id bigint(20) NOT NULL default '0',
  Amount bigint(20) NOT NULL default '0',
  Stock_place_id bigint(20) NOT NULL default '0',
  PRIMARY KEY  (ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_stock_item_properties'
--

CREATE TABLE care_tz_stock_item_properties (
  ID bigint(20) NOT NULL auto_increment,
  Drugsandservices_id bigint(20) NOT NULL default '0',
  Stock_place_id bigint(20) NOT NULL default '0',
  UnitOfIssue varchar(25) NOT NULL,
  Alternatives varchar(255) NOT NULL,
  Maximumlevel bigint(20) NOT NULL default '0',
  Reorderlevel bigint(20) NOT NULL default '0',
  Minimumlevel bigint(20) NOT NULL default '0',
  Orderquantity bigint(20) NOT NULL default '0',
  PRIMARY KEY  (ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_stock_place'
--

CREATE TABLE care_tz_stock_place (
  ID bigint(20) NOT NULL,
  Stockname varchar(255) NOT NULL,
  PRIMARY KEY  (ID)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_tribes'
--

CREATE TABLE care_tz_tribes (
  tribe_id bigint(20) NOT NULL auto_increment,
  tribe_code varchar(10) NOT NULL default '',
  tribe_name varchar(20) NOT NULL default '',
  is_additional tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (tribe_id),
  KEY tribe_id (tribe_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_tz_ward'
--

CREATE TABLE care_tz_ward (
  ward_id int(11) NOT NULL auto_increment,
  ward_code int(10) NOT NULL,
  ward_name varchar(100) collate latin1_general_ci NOT NULL,
  is_additional tinyint(4) NOT NULL,
  PRIMARY KEY  (ward_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table 'care_unit_measurement'
--

CREATE TABLE care_unit_measurement (
  nr smallint(5) unsigned NOT NULL auto_increment,
  unit_type_nr smallint(2) unsigned NOT NULL default '0',
  id varchar(15) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  LD_var varchar(35) NOT NULL default '',
  sytem varchar(35) NOT NULL default '',
  use_frequency bigint(20) default NULL,
  `status` varchar(25) NOT NULL default '',
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  UNIQUE KEY id (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_users'
--

CREATE TABLE care_users (
  `name` varchar(60) NOT NULL default '',
  login_id varchar(35) NOT NULL default '',
  `password` varchar(255) default NULL,
  personell_nr int(10) unsigned NOT NULL default '0',
  lockflag tinyint(3) unsigned default '0',
  permission text NOT NULL,
  exc tinyint(1) NOT NULL default '0',
  s_date date NOT NULL default '0000-00-00',
  s_time time NOT NULL default '00:00:00',
  expire_date date NOT NULL default '0000-00-00',
  expire_time time NOT NULL default '00:00:00',
  `status` varchar(15) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(35) NOT NULL default '',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(35) NOT NULL default '',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (login_id),
  KEY login_id (login_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_version'
--

CREATE TABLE care_version (
  `name` varchar(20) NOT NULL default '',
  `type` varchar(20) NOT NULL default '',
  number varchar(10) NOT NULL default '',
  build varchar(5) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  `time` time NOT NULL default '00:00:00',
  releaser varchar(30) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'care_ward'
--

CREATE TABLE care_ward (
  nr smallint(5) unsigned NOT NULL auto_increment,
  ward_id varchar(35) NOT NULL default '',
  `name` varchar(35) NOT NULL default '',
  is_temp_closed tinyint(1) NOT NULL default '0',
  date_create date NOT NULL default '0000-00-00',
  date_close date NOT NULL default '0000-00-00',
  description text,
  info tinytext,
  dept_nr smallint(5) unsigned NOT NULL default '0',
  room_nr_start smallint(6) NOT NULL default '0',
  room_nr_end smallint(6) NOT NULL default '0',
  roomprefix varchar(4) default NULL,
  `status` varchar(25) NOT NULL default '',
  history text NOT NULL,
  modify_id varchar(25) NOT NULL default '0',
  modify_time timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  create_id varchar(25) NOT NULL default '0',
  create_time timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (nr),
  KEY ward_id (ward_id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'mems_drug_list'
--

CREATE TABLE mems_drug_list (
  ID int(11) NOT NULL auto_increment,
  Ped_list varchar(255) default NULL,
  Adult_list varchar(255) default NULL,
  Other varchar(255) default NULL,
  Consumables varchar(255) default NULL,
  Item_No double default NULL,
  Item_Description varchar(255) default NULL,
  Pack_Size double default NULL,
  Price_Per_Pack_Size double default NULL,
  selling_price double default NULL,
  PRIMARY KEY  (ID),
  KEY Item_No (Item_No)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'mems_special_other'
--

CREATE TABLE mems_special_other (
  ID int(11) NOT NULL auto_increment,
  Ped_list varchar(255) default NULL,
  Adult_list varchar(255) default NULL,
  Other varchar(255) default NULL,
  Consumables varchar(255) default NULL,
  Item_No double default NULL,
  Item_Description varchar(255) default NULL,
  Pack_Size varchar(255) default NULL,
  Price_Per_Pack_Size double default NULL,
  selling_price double default NULL,
  PRIMARY KEY  (ID),
  KEY Item_No (Item_No)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'mems_supplies'
--

CREATE TABLE mems_supplies (
  ID int(11) NOT NULL auto_increment,
  Ped_list varchar(255) default NULL,
  Adult_list varchar(255) default NULL,
  Other varchar(255) default NULL,
  Consumables varchar(255) default NULL,
  Item_No double default NULL,
  Item_Description varchar(255) default NULL,
  Pack_Size double default NULL,
  Price_Per_Pack_Size double default NULL,
  selling_price double default NULL,
  PRIMARY KEY  (ID),
  KEY Item_No (Item_No)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'mems_supplies_labor'
--

CREATE TABLE mems_supplies_labor (
  ID int(11) NOT NULL auto_increment,
  Ped_list varchar(255) default NULL,
  Adult_list varchar(255) default NULL,
  Other varchar(255) default NULL,
  Consumables varchar(255) default NULL,
  Item_No double default NULL,
  Item_Description varchar(255) default NULL,
  Pack_Size double default NULL,
  Price_Per_Pack_Size double default NULL,
  selling_price varchar(255) default NULL,
  PRIMARY KEY  (ID),
  KEY Item_No (Item_No)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'sessions'
--

CREATE TABLE sessions (
  SESSKEY char(32) NOT NULL,
  EXPIRY int(11) unsigned NOT NULL,
  EXPIREREF varchar(64) default NULL,
  `DATA` text NOT NULL,
  PRIMARY KEY  (SESSKEY)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


# The preloaded data follows ################################################


--
-- Dumping data for table 'care_category_diagnosis'
--

INSERT INTO care_category_diagnosis (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'most_responsible', 'Most responsible', 'LDMostResponsible', 'M', 'LDMostResp_s', 'Most responsible diagnosis, must be only one per admission or visit', '0', '', '', '', '2003-05-25 12:09:56', '', '0000-00-00 00:00:00');
INSERT INTO care_category_diagnosis (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'associated', 'Associated', 'LDAssociated', 'A', 'LDAssociated_s', 'Associated diagnosis, can be several per  admission or visit', '0', '', '', '', '2003-05-25 12:10:05', '', '0000-00-00 00:00:00');
INSERT INTO care_category_diagnosis (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'nosocomial', 'Hospital acquired', 'LDNosocomial', 'N', 'LDNosocomial_s', 'Hospital acquired problem, can be several per admission or visit', '0', '', '', '', '2003-05-25 12:10:15', '', '0000-00-00 00:00:00');
INSERT INTO care_category_diagnosis (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(4, 'iatrogenic', 'Iatrogenic', 'LDIatrogenic', 'I', 'LDIatrogenic_s', 'Problem resulting from a procedural/surgical complication or medication mistake', '0', '', '', '', '2003-05-25 12:10:25', '', '0000-00-00 00:00:00');
INSERT INTO care_category_diagnosis (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(5, 'other', 'Other', 'LDOther', 'O', 'LDOther_s', 'Other  diagnosis', '0', '', '', '', '2003-05-25 12:10:33', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_category_disease'
--

INSERT INTO care_category_disease (nr, group_nr, category, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(1, 2, 'asphyxia', 'Asphyxia', 'LDAsphyxia', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_category_disease (nr, group_nr, category, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(2, 2, 'infection', 'Infection', 'LDInfection', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_category_disease (nr, group_nr, category, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(3, 2, 'congenital_abnomality', 'Congenital abnormality', 'LDCongenitalAbnormality', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_category_disease (nr, group_nr, category, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(4, 2, 'trauma', 'Trauma', 'LDTrauma', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_category_procedure'
--

INSERT INTO care_category_procedure (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'main', 'Main', 'LDMain', 'M', 'LDMain_s', 'Main procedure, must be only one per op or intervention visit', '0', '', '', '', '2003-06-14 01:35:08', '', '0000-00-00 00:00:00');
INSERT INTO care_category_procedure (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'supplemental', 'Supplemental', 'LDSupplemental', 'S', 'LDSupp_s', 'Supplemental procedure, can be several per  encounter op or intervention or visit', '0', '', '', '', '2003-06-14 01:53:24', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_classif_neonatal'
--

INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'jaundice', 'Neonatal jaundice', 'LDNeonatalJaundice', NULL, '', '', '2003-08-07 12:57:31', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'x_transfusion', 'Exchange transfusion', 'LDExchangeTransfusion', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'photo_therapy', 'Photo therapy', 'LDPhotoTherapy', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'h_i_encep', 'Hypoxic ischaemic encephalopathy', 'LDH_I_Encephalopathy', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'parenteral', 'Parenteral nutrition', 'LDParenteralNutrition', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'vent_support', 'Ventilatory support', 'LDVentilatorySupport', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(7, 'oxygen_therapy', 'Oxygen therapy', 'LDOxygenTherapy', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(8, 'cpap', 'CPAP', 'LDCPAP', 'Continuous positive airway pressure', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(9, 'congenital_abnormality', 'Congenital abnormality', 'LDCongenitalAbnormality', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(10, 'congenital_infection', 'Congenital infection', 'LDCongenitalInfection', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(11, 'acquired_infection', 'Acquired infection', 'LDAcquiredInfection', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(12, 'gbs_infection', 'GBS infection', 'LDGBSInfection', 'Group B Strep Infection', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(13, 'rds', 'Resp Distress Syndrome', 'LDRespDistressSyndrome', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(14, 'blood_transfusion', 'Blood transfusion', 'LDBloodTransfusion', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(15, 'antibiotic_therapy', 'Antibiotic therapy', 'LDAntibioticTherapy', NULL, '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_classif_neonatal (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(16, 'necrotising_enterocolitis', 'Necrotising enterocolitis', 'LDNecrotisingEnterocolitis', NULL, '', '', '2003-08-07 19:17:27', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_class_encounter'
--

INSERT INTO care_class_encounter (class_nr, class_id, name, LD_var, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'inpatient', 'Inpatient', 'LDStationary', 'Inpatient admission - stays at least in a ward and assigned a bed', 0, '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_encounter (class_nr, class_id, name, LD_var, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'outpatient', 'Outpatient', 'LDAmbulant', 'Outpatient visit - does not stay in a ward nor assigned a bed', 0, '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_class_ethnic_orig'
--

INSERT INTO care_class_ethnic_orig (nr, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'race', 'LDRace', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_ethnic_orig (nr, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'country', 'LDCountry', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_class_financial'
--

INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'care_c', 'care', 'c', 'common', 'LDcommon', 'Common nursing care services. (Non-private)', 'Patient with common health fund insurance policy.', '', '', '', '2002-12-29 11:40:50', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'care_pc', 'care', 'p/c', 'private + common', 'LDprivatecommon', 'Private services added to common services', 'Patient with common health fund insurance\r\npolicy with additional private insurance policy\r\nOR self paying components.', '', '', '', '2002-12-29 11:44:51', '', '2002-12-29 11:44:51');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'care_p', 'care', 'p', 'private', 'LDprivate', 'Private nursing care services', 'Patient with private insurance policy\r\nOR self paying.', 'LDprivate', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(4, 'care_pp', 'care', 'pp', 'private plus', 'LDprivateplus', '"Very private" nursing care services', 'Patient with private health insurance policy\r\nAND self paying components.', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(5, 'room_c', 'room', 'c', 'common', 'LDcommon', 'Common room services (non-private)', 'Patient with common health fund insurance policy. ', 'LDcommon', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(6, 'room_pc', 'room', 'p/c', 'private + common', '', 'Private services added to common services', 'Patient with common health fund insurance policy with additional private insurance policy OR self paying components.', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(7, 'room_p', 'room', 'p', 'private', '', 'Private room services', 'Patient with private insurance policy OR self paying. ', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(8, 'room_pp', 'room', 'pp', 'private plus', '', '"Very private" room services', 'Patient with private health insurance policy AND self paying components.', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(9, 'att_dr_c', 'att_dr', 'c', 'common', '', 'Common clinician services', 'Patient with common health fund insurance policy. ', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(10, 'att_dr_pc', 'att_dr', 'p/c', 'private + common', '', 'Private services added to common clinician services', 'Patient with common health fund insurance policy with additional private insurance policy OR self paying components.', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(11, 'att_dr_p', 'att_dr', 'p', 'private', '', 'Private clinician services', 'Patient with private insurance policy OR self paying.', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_financial (class_nr, class_id, type, code, name, LD_var, description, policy, status, history, modify_id, modify_time, create_id, create_time) VALUES(12, 'att_dr_pp', 'att_dr', 'pp', 'private plus', '', '"Very private" clinician services', 'Patient with private health insurance policy AND self paying components.', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_class_insurance'
--

INSERT INTO care_class_insurance (class_nr, class_id, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'private', 'Private', 'LDPrivate', 'Private insurance plan (paid by insured alone)', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_insurance (class_nr, class_id, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'common', 'Health Fund', 'LDInsurance', 'Public (common) health fund - usually paid both by the insured and his employer, eventually paid by the state', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_insurance (class_nr, class_id, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'self_pay', 'Self pay', 'LDSelfPay', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_class_therapy'
--

INSERT INTO care_class_therapy (nr, group_nr, class, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 2, 'photo', 'Phototherapy', 'LDPhototherapy', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_therapy (nr, group_nr, class, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 2, 'iv', 'IV Fluids', 'LDIVFluids', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_therapy (nr, group_nr, class, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 2, 'oxygen', 'Oxygen therapy', 'LDOxygenTherapy', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_therapy (nr, group_nr, class, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 2, 'cpap', 'CPAP', 'LDCPAP', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_therapy (nr, group_nr, class, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 2, 'ippv', 'IPPV', 'LDIPPV', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_therapy (nr, group_nr, class, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(6, 2, 'nec', 'NEC', 'LDNEC', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_therapy (nr, group_nr, class, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(7, 2, 'tpn', 'TPN', 'LDTPN', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_class_therapy (nr, group_nr, class, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(8, 2, 'hie', 'HIE', 'LDHIE', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_complication'
--

INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 1, 'Previous C/S', 'LDPreviousCS', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 1, 'Pre-eclampsia', 'LDPreEclampsia', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 1, 'Eclampsia', 'LDEclampsia', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 1, 'Other hypertension', 'LDOtherHypertension', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 1, 'Other proteinuria', 'LDProteinuria', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(6, 1, 'Cardiac', 'LDCardiac', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(7, 1, 'Anaemia < 8.5g', 'LDAnaemia', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(8, 1, 'Asthma', 'LDAsthma', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(9, 1, 'Epilepsy', 'LDEpilepsy', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(10, 1, 'Placenta praevia', 'LDPlacentaPraevia', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(11, 1, 'Abruptio placentae', 'LDAbruptioPlacentae', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(12, 1, 'Other APH', 'LDOtherAPH', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(13, 1, 'Diabetes', 'LDDiabetes', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(14, 1, 'Cord prolapse', 'LDCordProlapse', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(15, 1, 'Ruptured uterus', 'LDRupturedUterus', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_complication (nr, group_nr, name, LD_var, code, description, status, modify_id, modify_time, create_id, create_time) VALUES(16, 1, 'Extrauterine pregnancy', 'LDExtraUterinePregnancy', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_config_global'
--

INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('date_format', 'dd/MM/yyyy', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('time_format', 'HH.MM', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_reg_nr_adder', '10000000', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('main_info_police_nr', '112', '', '', '', '', '2005-06-29 05:59:43', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('main_info_fire_dept_nr', '112', '', '', '', '', '2005-06-29 05:59:43', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('main_info_emgcy_nr', '0744-299306', '', '', '', '', '2005-06-29 05:59:43', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('main_info_phone', ' 2509974, 2509975, 2503726', '', '', '', '', '2005-06-29 05:59:43', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('main_info_fax', '', '', '', '', '', '2005-06-29 05:59:43', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('main_info_address', 'Selian Lutheran Hospital\r\nP.O. BOX 3164\r\nARUSHA\r\nTANZANIA\r\n', '', '', '', '', '2005-06-29 05:59:43', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('main_info_email', 'selianlh@habari.co.tz', '', '', '', '', '2005-06-29 05:59:43', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_id_nr_adder', '10000000', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_outpatient_nr_adder', '500000', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_inpatient_nr_adder', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_name_2_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_name_3_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_name_middle_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_name_maiden_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_ethnic_orig_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_name_others_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_nat_id_nr_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_religion_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_cellphone_2_nr_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_phone_2_nr_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_citizenship_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_sss_nr_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('language_default', 'en', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('language_single', '1', '', '', '', '', '2005-02-04 07:37:37', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('mascot_hide', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('mascot_style', 'default', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('gui_frame_left_nav_width', '150', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('gui_frame_left_nav_border', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_fotos_path', 'fotos/news/', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_title_font_size', '5', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_title_font_face', 'arial,verdana,helvetica,sans serif', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_title_font_color', '#CC3333', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_preface_font_size', '2', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_preface_font_face', 'arial,verdana,helvetica,sans serif', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_preface_font_color', '#336666', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_body_font_size', '2', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_body_font_face', 'arial,verdana,helvetica,sans serif', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_body_font_color', '#000033', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_normal_preview_maxlen', '600', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_title_font_bold', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_headline_preface_font_bold', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('news_normal_display_width', '100%', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_fax_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_email_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_phone_1_nr_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_cellphone_1_nr_hide', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_foto_path', 'fotos/registration/', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_service_care_hide', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_service_room_hide', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_service_att_dr_hide', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_financial_class_single_result', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_name_2_show', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_name_3_show', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('patient_name_middle_show', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('theme_control_buttons', 'blue_aqua', '', '', '', '', '2005-06-29 11:02:52', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('gui_frame_left_nav_bdcolor', '#990000', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('theme_control_theme_list', 'default,blue_aqua', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('medocs_text_preview_maxlen', '100', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('personell_nr_adder', '100000', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('notes_preview_maxlen', '120', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_id_nr_init', '10000000', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('personell_nr_init', '100000', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('encounter_nr_init', '000000', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('encounter_nr_fullyear_prepend', '1', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('theme_mascot', 'default', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('pagin_address_list_max_block_rows', '20', '', '', '', '', '2006-01-10 06:41:39', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('pagin_address_search_max_block_rows', '25', '', '', '', '', '2006-01-10 06:42:28', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('pagin_insurance_list_max_block_rows', '30', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('pagin_insurance_search_max_block_rows', '25', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('pagin_personell_search_max_block_rows', '20', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('pagin_person_search_max_block_rows', '99', '', '', '', '', '2006-01-10 06:43:19', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('pagin_personell_list_max_block_rows', '20', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('pagin_patient_search_max_block_rows', '99', '', '', '', '', '2006-01-10 06:42:28', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('pagin_or_patient_search_max_block_rows', '5', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('timeout_inactive', '0', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('timeout_time', '004500', '', '', '', '', '2005-02-18 15:01:06', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_title_hide', '0', NULL, 'normal', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_bloodgroup_hide', '0', NULL, 'normal', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_civilstatus_hide', '0', NULL, 'normal', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_insurance_hide', '0', NULL, 'normal', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_config_global (type, value, notes, status, history, modify_id, modify_time, create_id, create_time) VALUES('person_other_his_nr_hide', '0', NULL, 'normal', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_config_user'
--

INSERT INTO care_config_user VALUES ('default', 'a:19:{s:4:"mask";s:1:"1";s:11:"idx_bgcolor";s:7:"#99ccff";s:12:"idx_txtcolor";s:7:"#000066";s:9:"idx_hover";s:7:"#ffffcc";s:9:"idx_alink";s:7:"#ffffff";s:11:"top_bgcolor";s:7:"#99ccff";s:12:"top_txtcolor";s:7:"#330066";s:12:"body_bgcolor";s:7:"#ffffff";s:13:"body_txtcolor";s:7:"#000066";s:10:"body_hover";s:7:"#cc0033";s:10:"body_alink";s:7:"#cc0000";s:11:"bot_bgcolor";s:7:"#cccccc";s:12:"bot_txtcolor";s:4:"gray";s:5:"bname";s:0:"";s:8:"bversion";s:0:"";s:2:"ip";s:0:"";s:3:"cid";s:0:"";s:5:"dhtml";s:1:"1";s:4:"lang";s:0:"";}', 'default values', 'normal', 'installed', 'auto-installer', 0, 'auto-installer', 0);

--
-- Dumping data for table 'care_currency'
--

INSERT INTO care_currency (item_no, short_name, long_name, info, status, modify_id, modify_time, create_id, create_time) VALUES(13, 'Ãƒâ€šÃ¢â€š', 'Euro', 'European currency', '', 'Elpidio Latorilla', '2005-06-29 06:53:26', '', '2002-11-26 18:05:34');
INSERT INTO care_currency (item_no, short_name, long_name, info, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'L', 'Pound', 'GB British Pound (ISO = GBP)', '', '', '2003-02-13 15:31:07', '', '2002-08-16 23:03:49');
INSERT INTO care_currency (item_no, short_name, long_name, info, status, modify_id, modify_time, create_id, create_time) VALUES(10, 'R', 'Rand', 'South African Rand (ISO = ZAR)', '', '', '2003-08-02 19:06:37', 'Elpidio Latorilla', '2002-08-17 17:18:05');
INSERT INTO care_currency (item_no, short_name, long_name, info, status, modify_id, modify_time, create_id, create_time) VALUES(8, 'R', 'Rupees', 'Indian Rupees (ISO = INR)', '', '', '2003-02-13 15:30:59', 'Elpidio Latorilla', '2002-09-20 23:43:06');
INSERT INTO care_currency (item_no, short_name, long_name, info, status, modify_id, modify_time, create_id, create_time) VALUES(14, 'Tsh', 'TzShilling', 'Tanzanian Shilling', 'main', '', '2005-06-29 06:53:26', 'Aklei G. Kessy', '2005-06-29 06:52:43');

--
-- Dumping data for table 'care_tz_arv_adher_code'
--

INSERT INTO care_tz_arv_adher_code (care_tz_arv_adher_code_id, code, description, other) VALUES
(1, 'G', '(good) fewer than 2 missed days ', 0),
(2, 'P', '(poor) 2 or more missed days', 0);

--
-- Dumping data for table 'care_tz_arv_adher_reas'
--

INSERT INTO care_tz_arv_adher_reas (care_tz_arv_adher_reas_id, care_tz_arv_visit_2_id, care_tz_arv_adher_reas_code_id, other) VALUES
(37, 135, 3, NULL);

--
-- Dumping data for table 'care_tz_arv_adher_reas_code'
--

INSERT INTO care_tz_arv_adher_reas_code (care_tz_arv_adher_reas_code_id, code, description, other) VALUES
(1, 1, 'TOXICITY ', 0),
(2, 2, 'SHARE WITH OTHERS ', 0),
(3, 3, 'FORGOT ', 0),
(4, 4, 'FELT BETTER ', 0),
(5, 5, 'TOO ILL ', 0),
(6, 6, 'STIGMA ', 0),
(7, 7, 'PHARMACY DRUG STOCK OUT ', 0),
(8, 8, 'PATIENT LOST / RAN OUT OF  PILLS ', 0),
(9, 9, 'DELIVERY 1 TRAVL PROBLEMS ', 0),
(10, 10, 'INABILITY TO  PAY ', 0),
(11, 11, 'ALCOHOL ', 0),
(12, 12, 'DEPRESSION ', 0),
(13, 13, 'OTHER (SPECIFY)', 1);

--
-- Dumping data for table 'care_tz_arv_allergies'
--

INSERT INTO care_tz_arv_allergies (care_tz_arv_allergies_id, care_tz_arv_registration_id, description) VALUES
(75, 82, 'beer');

--
-- Dumping data for table 'care_tz_arv_case'
--

INSERT INTO care_tz_arv_case (care_tz_arv_case_id, pid, datetime_first_hivtest, datetime_start_arv, arv_pid, district, village, street, balozi, chairman_of_village, head_of_family, name_of_secretary, secretary_phone, secretary_adress, history, create_id, create_time, modify_id, modify_time) VALUES
(1, 10022462, '2007-03-07 00:00:00', '2007-03-26 00:00:00', 1233455, 'ASDF', 'TRER', 'SDF', 'SDF', 'SADF', 'ASDF', 'G', '1122333', 'GFH', 'Created 2007-03-26 12:27:25 ;\n', '0000-00-00 00:00:00', 1174901245, NULL, NULL);

--
-- Dumping data for table 'care_tz_arv_chairman'
--

INSERT INTO care_tz_arv_chairman (care_tz_arv_chairman_id, care_tz_arv_registration_id, vname, nname, street, village, hamlet) VALUES
(35, 82, 'test', 'test', 'test', 'test', 'test');

--
-- Dumping data for table 'care_tz_arv_co_medi'
--

INSERT INTO care_tz_arv_co_medi (care_tz_arv_co_medi_id, care_tz_arv_co_medi_other_id, item_id, care_tz_arv_visit_2_id) VALUES
(51, NULL, 1090, 135);

--
-- Dumping data for table 'care_tz_arv_co_medi_other'
--


--
-- Dumping data for table 'care_tz_arv_education'
--

INSERT INTO care_tz_arv_education (care_tz_arv_education_id, care_tz_arv_education_topic_id, care_tz_arv_registration_id, comment, comment_date, create_id, modify_id, modify_time, history, care_tz_arv_education_group_id) VALUES
(96, 1, 82, 'test', '2007-07-25', 'Niemi', NULL, '0000-00-00 00:00:00', 'Created 2007-07-25 16:23:52 Niemi;\n', 1),
(97, 3, 82, 'test2', '2007-07-25', 'Niemi', NULL, '0000-00-00 00:00:00', 'Created 2007-07-25 16:24:10 Niemi;\n', 1),
(98, 29, 82, 'test', '2007-07-25', 'Niemi', NULL, '0000-00-00 00:00:00', 'Created 2007-07-25 16:24:24 Niemi;\n', 4);

--
-- Dumping data for table 'care_tz_arv_education_group'
--

INSERT INTO care_tz_arv_education_group (care_tz_arv_education_group_id, description) VALUES
(1, 'Education on basics, prevention, disclosure'),
(2, 'Progression, Rx'),
(3, 'ARV preparation, initiation, support, monitor'),
(4, 'Home-based care, support');

--
-- Dumping data for table 'care_tz_arv_education_topic'
--

INSERT INTO care_tz_arv_education_topic (care_tz_arv_education_topic_id, care_tz_arv_education_group_id, description) VALUES
(1, 1, 'Basic HIV education, transmission'),
(2, 1, 'Prevention: abstinence, safer sex, condoms'),
(3, 1, 'Prevention: household, precautions, what is safe'),
(4, 1, 'Post-test counselling: implications of results'),
(5, 1, 'Positive living'),
(6, 1, 'Testing partners'),
(7, 1, 'Disclosure'),
(8, 1, 'To whom disclosured (list)'),
(9, 1, 'Family/ living situation'),
(10, 1, 'Shared confidentially'),
(11, 1, 'Reproductive choices, prevention, MTCT'),
(12, 1, 'Child''s blood test'),
(13, 2, 'Progession of disease'),
(14, 2, 'Available treatment/prophylaxis'),
(15, 2, 'Follow-up appointments, care and treatment team'),
(16, 2, 'CTX, INH, prophylaxis'),
(17, 3, 'ART - educate on essentials (locally adapted)'),
(18, 3, 'Why complete adherance needed'),
(19, 3, 'Adherance preparation, indicate visits'),
(20, 3, 'Indicate when READY for ART: DATE/result, Care and treatment-team discussion'),
(21, 3, 'Explain dose, when to take'),
(22, 3, 'What can occur, how to manage side effects'),
(23, 3, 'What to do if one forgets dose'),
(24, 3, 'What to do when travelling'),
(25, 3, 'Adherance plan (schedule, aids, explain, diary)'),
(26, 3, 'Treatment-supporter preparation'),
(27, 3, 'Which doses, why missed'),
(28, 3, 'ARV support group'),
(29, 4, 'How to contact clinic'),
(30, 4, 'Symptoms management/palliative care at home'),
(31, 4, 'Caregiver Booklet'),
(32, 4, 'Home-based care - specify'),
(33, 4, 'Support groups'),
(34, 4, 'Community support');

--
-- Dumping data for table 'care_tz_arv_eligible_reason'
--

INSERT INTO care_tz_arv_eligible_reason (care_tz_arv_eligible_reason_id, care_tz_arv_eligible_reason_code_id, care_tz_arv_registration_id, care_tz_arv_lab_id) VALUES
(66, 1, 82, NULL);

--
-- Dumping data for table 'care_tz_arv_eligible_reason_code'
--

INSERT INTO care_tz_arv_eligible_reason_code (care_tz_arv_eligible_reason_code_id, description) VALUES
(1, 'Clinical only'),
(2, 'CD4 counts/%'),
(3, 'TLC');

--
-- Dumping data for table 'care_tz_arv_events'
--

INSERT INTO care_tz_arv_events (care_tz_arv_events_id, care_tz_arv_events_code_id, care_tz_arv_visit_id) VALUES
(1, 8, 1);

--
-- Dumping data for table 'care_tz_arv_events_code'
--

INSERT INTO care_tz_arv_events_code (care_tz_arv_events_code_id, who_code, who_code_text, parent) VALUES
(1, 0, 'WHO / Adults AIDS defining events', -1),
(2, 0, 'WHO Pediatric AIDS defining events', -1),
(3, 2, 'Mild Disease', 1),
(4, 3, 'Moderate Disease', 1),
(5, 4, 'Severe Disease (AIDS)', 1),
(6, 2, 'Mid Stage', 2),
(7, 3, 'Opportunistic infections and other AIDS defining events', 2),
(8, 201, 'Weight loss, < 10% of body weight', 3),
(9, 202, 'Minor mucocutaneous manifestations (seb dermatitis, prurigo, fungal nail infections, re oral ulcerations, angular Cheilitis)', 3),
(10, 203, 'Herpes zoster within the last five years', 3),
(11, 204, 'Recurrent upper respiratory tract infections bacterial Sinusitis)', 3),
(12, 211, 'Weight loss, > 10% of body weight', 4),
(13, 212, 'Unexplained chronic diarrhoea, > 1 month', 4),
(14, 213, 'Unexplained prolonged fever (intermittent) constant), > 1 month', 4),
(15, 214, 'Oral candidiasis (thrush)', 4),
(16, 215, 'Pulmonary tuberculosis', 4),
(17, 216, 'Severe bacterial infections (i.e. pneumonia pyomyositis )', 4),
(18, 217, 'Bedridden < 50% of the day during last mo', 4),
(19, 221, 'HIV wasting Syndrome', 5),
(20, 222, 'Pneumocystis carinii pneumonia', 5),
(21, 223, 'Toxoplasmosis of the brain', 5),
(22, 224, 'Cryptosporidiosis with diarrhoea>1 mnth', 5),
(23, 225, 'Cryptococcosis, extrapulmonary', 5),
(24, 226, 'Cytomegalovirus disease of an organ oth than liver, spieen or lymph node (ex:retinitis)', 5),
(25, 227, 'Herpes simplex virus infection, mucocutaneous (>1 month) or visceral', 5),
(26, 228, 'Progressive multifocal leucoencephalopa', 5),
(27, 229, 'Any disseminated endemic mycosis', 5),
(28, 230, 'Candidiasis of esophagus, trachea, bronchi', 5),
(29, 231, 'Atypical mycobacteriosis, disseminated or lungs', 5),
(30, 232, 'Non-typhoid Salmonella septicemia', 5),
(31, 233, 'Extrapulmonary tuberculosis', 5),
(32, 234, 'Lymphoma', 5),
(33, 235, 'Kaposi''s sarcoma', 5),
(34, 236, 'Bedridden > 50% of the day during last m', 5),
(35, 237, 'HIV encephalopathy', 5),
(36, 301, 'Chronic diarrhoea >30 days duration in absence of known etiology', 6),
(37, 302, 'Severe persistent or recurrent candidiasis outside the neonatal period', 6),
(38, 303, 'Weight loss or failure to thrive in the absence of known etiology', 6),
(39, 304, 'Persistent fever >30 days duration in the absence of known etiology', 6),
(40, 305, 'Recurrent severe bacterial infections other than septicemia or meningitis (e.g., Osteomyelitis, bacterial (non-TB) pneumania, abscesses)', 6),
(41, 311, 'AIDS defining opportunistic infections', 7),
(42, 312, 'Progressive encephalopathy', 7),
(43, 313, 'Malignancy', 7),
(44, 314, 'Recurrent septicaemia or pneumonia', 7),
(45, 315, 'Severe failure to thrive (''wasting") in the absence of known etiology', 7);

--
-- Dumping data for table 'care_tz_arv_exposure'
--

INSERT INTO care_tz_arv_exposure (care_tz_arv_exposure_id, description) VALUES
(1, 'NONE'),
(2, 'PRIOR THERAPY (transfer in without records)'),
(3, 'PMTCT MONOTHERAPY'),
(4, 'PMTCT COMINATION THERAPY'),
(5, 'TRANSFER IN (with records)');

--
-- Dumping data for table 'care_tz_arv_follow_status'
--

INSERT INTO care_tz_arv_follow_status (care_tz_arv_follow_status_id, care_tz_arv_follow_status_code_id, care_tz_arv_visit_2_id, other) VALUES
(43, 4, 135, NULL);

--
-- Dumping data for table 'care_tz_arv_follow_status_code'
--

INSERT INTO care_tz_arv_follow_status_code (care_tz_arv_follow_status_code_id, code, description, other) VALUES
(1, 'MISSAPP', '1 OR 2 MISSING APPOINTMENTS ', 0),
(2, 'LTF', 'LOST TO FOLLOW-UP (Not seen for 3 or more months since last scheduled appointmen', 0),
(3, 'OR', '3 or more missing appointments [pre-ART patients] with 2 attempts to follow-up) ', 0),
(4, 'STOP', 'PATIENT/PROVIDER DECISION TO STOP ART, ADD REASON CODE ', 0),
(5, 'TO', 'TRANSFER OUT', 1),
(6, 'DEAD', 'DIED ', 0),
(7, 'RESTART', 'Patient restarts ARVs after interruption from STOP or LOST TO FOLLOW-UP ', 0);

--
-- Dumping data for table 'care_tz_arv_functional_status'
--

INSERT INTO care_tz_arv_functional_status (care_tz_arv_functional_status_id, code, description, other) VALUES
(1, 'W', 'Working', 0),
(2, 'A', 'Ambulant', 0),
(3, 'B', 'Bedridden', 0);

--
-- Dumping data for table 'care_tz_arv_illness'
--

INSERT INTO care_tz_arv_illness (care_tz_arv_illness_id, care_tz_arv_illness_code_id, care_tz_arv_visit_2_id, other) VALUES
(136, 17, 135, NULL),
(137, 20, 135, NULL);

--
-- Dumping data for table 'care_tz_arv_illness_code'
--

INSERT INTO care_tz_arv_illness_code (care_tz_arv_illness_code_id, code, description, other) VALUES
(1, 'AB', 'Abdominal pain', 0),
(2, 'A', 'Anaemia ', 0),
(3, 'BN', 'Burning/Numb/tingling ', 0),
(4, 'CNS', 'dizzy, anxiety, nightmare, depression ', 0),
(5, 'COUGH', 'Cough ', 0),
(6, 'CM', 'Cryptococcal Meningitis ', 0),
(7, 'DB', 'Difficult Breathing ', 0),
(8, 'DE', 'Dementia ', 0),
(9, 'D', 'Diarrhoea ', 0),
(10, 'ENC', 'HIV Encephalopathy ', 0),
(11, 'FAT', 'Fat changes ', 0),
(12, 'F', 'Fatigue ', 0),
(13, 'FEVER', 'Fewer ', 0),
(14, 'GUD', 'Genital Ulcer Disease ', 0),
(15, 'H', 'Headache ', 0),
(16, 'IRIS', 'Immune Reconstitution Inflammatory ', 0),
(17, 'S', 'Syndrome ', 0),
(18, 'J', 'Jaundice ', 0),
(19, 'KS', 'Kaposi?s Sarcoma ', 0),
(20, 'M', 'Molluscum ', 0),
(21, 'N', 'Nausea ', 0),
(22, 'OC', 'Osephageal Candidiasis ', 0),
(23, 'PE', 'Parotid Enlargement ', 0),
(24, 'PID', 'Pelvic Inflammatory Disease ', 0),
(25, 'P', 'Pneumonia ', 0),
(26, 'PCP', 'PneumoCystis Pheumonia ', 0),
(27, 'PPE', 'Papular Pruritic Eruptions ', 0),
(28, 'R', 'Rash ', 0),
(29, 'THRUSH', 'Thrush oral/vaginal ', 0),
(30, 'UD', 'Urethral Discharge ', 0),
(31, 'ULCERS', 'Ulcers mouth or other ', 0),
(32, 'W', 'Weight loss ', 0),
(33, 'Z', 'Zoster ', 0),
(34, 'OTHER', ' if other, specify', 1);

--
-- Dumping data for table 'care_tz_arv_lab'
--

INSERT INTO care_tz_arv_lab (care_tz_arv_lab_id, nr, care_tz_arv_visit_2_id, value, date_analyse) VALUES
(241, 86, NULL, '10', NULL),
(242, 7, 135, '10', NULL),
(243, 86, 135, '10', NULL),
(244, 17, 135, '10', NULL),
(245, 102, 135, '10', NULL);

--
-- Dumping data for table 'care_tz_arv_lab_param'
--


--
-- Dumping data for table 'care_tz_arv_referred'
--

INSERT INTO care_tz_arv_referred (care_tz_arv_referred_id, care_tz_arv_referred_code_id, care_tz_arv_visit_2_id, other) VALUES
(44, 7, 135, NULL);

--
-- Dumping data for table 'care_tz_arv_referred_code'
--

INSERT INTO care_tz_arv_referred_code (care_tz_arv_referred_code_id, code, description, other) VALUES
(1, 1, 'PMTCT', 0),
(2, 2, 'HBC', 0),
(3, 3, 'PLHA SUPPORT GROUP / CLUB', 0),
(4, 4, 'ORPHAN AND VULNERABLE CHILDREN GROUP', 0),
(5, 5, 'MEDICAL SPECIALITY', 0),
(6, 6, 'NUTRITIONAL SUPPORT', 0),
(7, 7, 'LEGAL', 0),
(8, 8, 'OTHER (SPECIFY)', 1);

--
-- Dumping data for table 'care_tz_arv_referred_from'
--

INSERT INTO care_tz_arv_referred_from (care_tz_arv_referred_from_id, care_tz_arv_referred_from_code_id, care_tz_arv_registration_id, other) VALUES
(48, 1, 82, NULL);

--
-- Dumping data for table 'care_tz_arv_referred_from_code'
--

INSERT INTO care_tz_arv_referred_from_code (care_tz_arv_referred_from_code_id, description) VALUES
(1, 'OPD'),
(2, 'STI'),
(3, 'MCH /PMTCT'),
(4, 'PLHA GROUP'),
(5, 'SELF REFERRAL (INCLUDES VCT)'),
(6, 'OTHER (specify)'),
(7, 'INPATIENT'),
(8, 'TB /DOTS'),
(9, 'HBC');

--
-- Dumping data for table 'care_tz_arv_regimen'
--

INSERT INTO care_tz_arv_regimen (care_tz_arv_regimen_id, care_tz_arv_regimen_code_id, care_tz_arv_visit_2_id, other, regimen_days) VALUES
(58, 6, 135, NULL, 10);

--
-- Dumping data for table 'care_tz_arv_regimen_code'
--

INSERT INTO care_tz_arv_regimen_code (care_tz_arv_regimen_code_id, code, description, parent, other) VALUES
(1, '0', '1ST LINE', NULL, 0),
(2, '1a', 'd4T, 3TC, NVP (paediatric patients)', NULL, 0),
(3, '1a (30)', 'd4T (30), 3TC, NVP', NULL, 0),
(4, '1a (30) S', 'd4T (30), 3TC, NVP starting dose', NULL, 0),
(5, '1a (40)', 'd4T (40), 3TC, NVP ', NULL, 0),
(6, '1a (40) S', 'd4T (40), 3TC, NVP starting dose', NULL, 0),
(7, '1b', 'ZDV, 3TC, NVP ', NULL, 0),
(8, '1c', 'ZDV, 3TC, EFV ', NULL, 0),
(9, '1d (30)', 'd4T (30), 3TC, EFV ', NULL, 0),
(10, '1d (40)', 'd4T (40), 3TC, EFV ', NULL, 0),
(11, '0', '2ND LINE', NULL, 0),
(12, '2a', 'ABC, ddl, LPV/r ', NULL, 0),
(13, '2b', 'ABC, ddl, SQV/r ', NULL, 0),
(14, '2c', 'ABC, ddl, NFV ', NULL, 0),
(15, '99', 'OTHER (SPECIFY) ', NULL, 1);

--
-- Dumping data for table 'care_tz_arv_registration'
--

INSERT INTO care_tz_arv_registration (care_tz_arv_registration_id, care_tz_arv_lab_id, care_tz_arv_functional_status_id, care_tz_arv_exposure_id, pid, ctc_id, ten_cell_leader, head_of_household, date_first_hiv_test, date_confirmed_hiv, date_eligible, date_enrolled, date_ready, date_start_art, status_clinical_stage, status_weight, create_id, create_time, modify_id, modify_time, history) VALUES
(82, 241, 1, 1, 10000504, '0815', 'test', 'test', '2007-07-25 00:00:00', '2007-07-25 00:00:00', '2007-07-25 00:00:00', '2007-07-25 00:00:00', '2007-07-25 00:00:00', '2007-07-25 00:00:00', 1, 122, 'Niemi', 1185373277, NULL, NULL, 'Created 2007-07-25 16:21:17 Niemi;\n');

--
-- Dumping data for table 'care_tz_arv_status'
--


--
-- Dumping data for table 'care_tz_arv_status_txt'
--


--
-- Dumping data for table 'care_tz_arv_status_txt_code'
--

INSERT INTO care_tz_arv_status_txt_code (care_tz_arv_status_txt_code_id, status_code, status_text, parent) VALUES
(1, NULL, 'START ARV''s, codes for reasons to start', -1),
(2, NULL, 'CHANGE OR STOP ARV''s because of ADVERSE REACTIONS', -1),
(3, NULL, 'CHANGE or STOP ARV''s because of TREATMENT FAILURE', -1),
(4, NULL, 'CHANGE/STOP ARV''s, OTHER REASON', -1),
(5, 101, 'AdultCD4<200', 1),
(6, 102, 'Adult WHO Stage IV', 1),
(7, 103, 'Adult WHO Stage III, if CD4<350', 1),
(8, 104, 'Children Pediatric WHO Stage III', 1),
(9, 105, 'Children> 18 months, CD4%<15%', 1),
(10, 106, 'Infants< 18 months, CD4%<20%', 1),
(11, 107, 'Pregnant women for PMTCT (plus)', 1),
(12, 111, 'Nausea / vomiting', 2),
(13, 112, 'Diarrhoea', 2),
(14, 113, 'Headache', 2),
(15, 114, 'Fever', 2),
(16, 115, 'Skin rash', 2),
(17, 116, 'Peripheral neuropathy', 2),
(18, 117, 'Hepatitis', 2),
(19, 118, 'Jaundice', 2),
(20, 119, 'Dementia', 2),
(21, 120, 'Anaemia', 2),
(22, 121, 'Pancreatitis', 2),
(23, 122, 'CNS adverse event', 2),
(25, 123, 'Other adverse event', 2),
(26, 131, 'Treatment failure, clinical', 3),
(27, 132, 'Treatment failure, immunological', 3),
(28, 141, 'Poor adherence', 4),
(29, 142, 'Patient decision', 4),
(30, 143, 'Pregnancy', 4),
(31, 144, 'End of PMTCT (plus)', 4),
(32, 145, 'Transferred out, ', 4),
(33, 146, 'Lost to follow-up', 4),
(34, 147, 'Patient died', 4),
(35, 148, 'Stock-out', 4),
(36, 149, 'Other reason, specify', 4);

--
-- Dumping data for table 'care_tz_arv_tb_status'
--

INSERT INTO care_tz_arv_tb_status (care_tz_arv_tb_status_id, code, description, other) VALUES
(1, 'NO', 'not suspected / no signs or symptoms', 0),
(2, 'REFER', 'TB suspected and referred for avaluation', 0),
(3, 'SP', 'TB suspected and spulums sample sent or results recorded', 0),
(4, 'CONFIRM', 'TB confirmed', 0),
(5, 'INH', 'currently on INH prophylaxis (IPT)', 0),
(6, 'TB RX', 'currently on TB (record TB ID number)', 0);

--
-- Dumping data for table 'care_tz_arv_treatment_supporter'
--

INSERT INTO care_tz_arv_treatment_supporter (care_tz_arv_treatment_supporter_id, care_tz_arv_registration_id, vname, nname, street, village, telephone, organisation) VALUES
(21, 82, 'test', 'test', 'test', 'test', 'test', 'test');

--
-- Dumping data for table 'care_tz_arv_visit'
--

INSERT INTO care_tz_arv_visit (care_tz_arv_visit_id, care_tz_arv_case_id, encounter_nr, care_tz_arv_status_id, weight, test_TB, test_Cotrimoxazole, test_INH, test_Difflucan, other_problems, history, create_id, create_time, modify_id, modify_time) VALUES
(1, 1, 2007507389, 2, 23, 2, 2, 2, 2, '', 'Created 2007-03-26 12:29:34 ;\n', 'neema', 1174901374, NULL, '2007-03-26 11:29:34'),
(2, 1, 2007507389, 2, 23, 2, 2, 2, 2, '', 'Created 2007-03-26 12:29:34 ;\n', 'neema', 1174901374, NULL, '2007-03-26 11:29:34');

--
-- Dumping data for table 'care_tz_arv_visit_2'
--

INSERT INTO care_tz_arv_visit_2 (care_tz_arv_visit_2_id, care_tz_arv_registration_id, care_tz_arv_adher_code_id, care_tz_arv_functional_status_id, care_tz_arv_tb_status_id, care_tz_arv_status_id, encounter_nr, visit_date, weight, height, clinical_stage, pregnant, date_of_delivery, cotrim, diflucan, nutrition_support, next_visit_date, create_id, create_time, modify_id, modify_time, history) VALUES
(135, 82, 2, 2, 2, 4, 2007509013, '2007-07-25 00:00:00', 123, 900, 1, 1, '2007-07-25', 1, 1, 1, '2007-07-25', 'Niemi', 1185373418, NULL, '2007-07-25 16:23:38', 'Created 2007-07-25 16:23:38 Niemi;\n');

--
-- Dumping data for table 'care_tz_company'
--

INSERT INTO care_tz_company (id, name, contact, po_box, city, start_date, end_date, invoice_flag, credit_preselection_flag, hide_company_flag, prepaid_amount) VALUES
(1, ' AFAM', ' AFAM', '', '', 0, 0, 1, 0, 0, 0),
(2, 'A& KENT', 'A& KENT', '', '', 0, 0, 1, 0, 0, 0),
(3, 'AAR', 'AAR', '', '', 0, 0, 1, 0, 0, 0),
(4, 'AFRICA MASHARIKI GOLD MINE', 'AFRICA MASHARIKI GOLD MINE', '', '', 0, 0, 1, 0, 0, 0),
(5, 'ARUSHA AIRPORT AUTHORITY', 'ARUSHA AIRPORT AUTHORITY', '', '', 0, 0, 1, 0, 0, 0),
(6, 'ARUSHA CATHOLIC SEMINARY', 'ARUSHA CATHOLIC SEMINARY', '', '', 0, 0, 1, 0, 0, 0),
(7, 'ARUSHA COMMUNITY CHURCH', 'ARUSHA COMMUNITY CHURCH', '', '', 0, 0, 1, 0, 0, 0),
(8, 'ARUSHA REFFERAL SERVICES', 'ARUSHA REFFERAL SERVICES', '', '', 0, 0, 1, 0, 0, 0),
(9, 'ARUSHA VIEW HOTEL (GOLDEN ROSE)', 'ARUSHA VIEW HOTEL (GOLDEN ROSE)', '', '', 0, 0, 1, 0, 0, 0),
(10, 'AUWASA', 'AUWASA', '', '', 0, 0, 1, 0, 0, 0),
(11, 'CAFE BAMBOO', 'CAFE BAMBOO', '', '', 0, 0, 1, 0, 0, 0),
(12, 'COMMON WEALTH', 'COMMON WEALTH', '', '', 0, 0, 1, 0, 0, 0),
(13, 'CROSS CULTURAL SOLUTION', 'CROSS CULTURAL SOLUTION', '', '', 0, 0, 1, 0, 0, 0),
(14, 'ELCT HEAD OFFICE', 'ELCT HEAD OFFICE', '', '', 0, 0, 1, 0, 0, 0),
(15, 'ENGARENAROK LUTHERAN CHURCH', 'ENGARENAROK LUTHERAN CHURCH', '', '', 0, 0, 1, 0, 0, 0),
(16, 'ENKOKIDONGOI BAPTIST', 'ENKOKIDONGOI BAPTIST', '', '', 0, 0, 1, 0, 0, 0),
(17, 'GALILAYA STUDENT CENTRE', 'GALILAYA STUDENT CENTRE', '', '', 0, 0, 1, 0, 0, 0),
(18, 'HOOPOES TOURS AND SAFARIS', 'HOOPOES TOURS AND SAFARIS', '', '', 0, 0, 1, 0, 0, 0),
(19, 'INSTITUTO OIKOS', 'INSTITUTO OIKOS', '', '', 0, 0, 1, 0, 0, 0),
(20, 'JOSHUA FOUNDATION', 'JOSHUA FOUNDATION', '', '', 0, 0, 1, 0, 0, 0),
(21, 'KER&DOWNEY (PART)', 'KER&DOWNEY (PART)', '', '', 0, 0, 1, 0, 0, 0),
(22, 'KIGONGONI LODGE', 'KIGONGONI LODGE', '', '', 0, 0, 1, 0, 0, 0),
(23, 'KK GUARD (CASUAL LABORERS) ', 'KK GUARD (CASUAL LABORERS) ', '', '', 0, 0, 1, 0, 0, 0),
(24, 'MAKUMIRA UNIVERSITY', 'MAKUMIRA UNIVERSITY', '', '', 0, 0, 1, 0, 0, 0),
(25, 'MAMA NAOMI', 'MAMA NAOMI', '', '', 0, 0, 1, 0, 0, 0),
(26, 'MEDEX', 'MEDEX', '', '', 0, 0, 1, 0, 0, 0),
(27, 'MOSHI INTERNATIONAL SCHOOL', 'MOSHI INTERNATIONAL SCHOOL', '', '', 0, 0, 1, 0, 0, 0),
(28, 'MOUNT MERU UNIVERSITY', 'MOUNT MERU UNIVERSITY', '', '', 0, 0, 1, 0, 0, 0),
(29, 'MRINGA ESTATE', 'MRINGA ESTATE', '', '', 0, 0, 1, 0, 0, 0),
(30, 'MSG TRAINING', 'MSG TRAINING', '', '', 0, 0, 1, 0, 0, 0),
(31, 'NATIONAL INS. CORPORATION (NIC)', 'NATIONAL INS. CORPORATION (NIC)', '', '', 0, 0, 1, 0, 0, 0),
(32, 'NEW LIFE MINISTRY', 'NEW LIFE MINISTRY', '', '', 0, 0, 1, 0, 0, 0),
(33, 'OLMOTONYI BAPTIST', 'OLMOTONYI BAPTIST', '', '', 0, 0, 1, 0, 0, 0),
(34, 'SEDA (BRANCH & HQS)', 'SEDA (BRANCH & HQS)', '', '', 0, 0, 1, 0, 0, 0),
(35, 'SERENGETI SELECT SAFARIS', 'SERENGETI SELECT SAFARIS', '', '', 0, 0, 1, 0, 0, 0),
(36, 'SIBUSISO', 'SIBUSISO', '', '', 0, 0, 1, 0, 0, 0),
(37, 'STRATEGIES ', 'STRATEGIES ', '', '', 0, 0, 1, 0, 0, 0),
(38, 'TPRI', 'TPRI', '', '', 0, 0, 1, 0, 0, 0),
(39, 'TPRI STUDENT CENTRE', 'TPRI STUDENT CENTRE', '', '', 0, 0, 1, 0, 0, 0),
(40, 'UNICTR', 'UNICTR', '', '', 0, 0, 1, 0, 0, 0),
(41, 'USHARIKA WA NGARAMTONI', 'USHARIKA WA NGARAMTONI', '', '', 0, 0, 1, 0, 0, 0),
(42, 'WALEMAVU MONDULI', 'WALEMAVU MONDULI', '', '', 0, 0, 1, 0, 0, 0),
(43, 'WALEMAVU USARIVER', 'WALEMAVU USARIVER', '', '', 0, 0, 1, 0, 0, 0),
(44, 'WILSON INTERNATIONAL', 'WILSON INTERNATIONAL', '', '', 0, 0, 1, 0, 0, 0),
(45, 'AFRICAN ENVIRONMENT', 'AFRICAN ENVIRONMENT', '', '', 0, 0, 1, 0, 0, 0),
(46, 'AIR EXCEL', 'AIR EXCEL', '', '', 0, 0, 1, 0, 0, 0),
(47, 'BALTON TANZANIA', 'BALTON TANZANIA', '', '', 0, 0, 1, 0, 0, 0),
(48, 'CEDHA', 'CEDHA', '', '', 0, 0, 1, 0, 0, 0),
(49, 'CONSULATE OF THE NETHERLAND', 'CONSULATE OF THE NETHERLAND', '', '', 0, 0, 1, 0, 0, 0),
(50, 'CULTURAL HERITAGE', 'CULTURAL HERITAGE', '', '', 0, 0, 1, 0, 0, 0),
(51, 'DOROBO TOURS AND SAFARIS', 'DOROBO TOURS AND SAFARIS', '', '', 0, 0, 1, 0, 0, 0),
(52, 'ELCT - DIOCESE IN ARUSHA REGION', 'ELCT - DIOCESE IN ARUSHA REGION', '', '', 0, 0, 1, 0, 0, 0),
(53, 'H & H TANZANIA LTD', 'H & H TANZANIA LTD', '', '', 0, 0, 1, 0, 0, 0),
(54, 'KER AND DOWNEY', 'KER AND DOWNEY', '', '', 0, 0, 1, 0, 0, 0),
(55, 'KK GUARD', 'KK GUARD', '', '', 0, 0, 1, 0, 0, 0),
(56, 'MOIVARO LODGE', 'MOIVARO LODGE', '', '', 0, 0, 1, 0, 0, 0),
(57, 'ROBIN HART SAFARIS', 'ROBIN HART SAFARIS', '', '', 0, 0, 1, 0, 0, 0),
(58, 'SAND COUNTY FOUNDATION', 'SAND COUNTY FOUNDATION', '', '', 0, 0, 1, 0, 0, 0),
(59, 'SELIAN LUTHERAN HOSPITAL ', 'SELIAN LUTHERAN HOSPITAL ', '', '', 0, 0, 1, 0, 0, 0),
(60, 'SHADE OF AFRICA', 'SHADE OF AFRICA', '', '', 0, 0, 1, 0, 0, 0),
(61, 'TAN NATURAL RESOURCE FORUM', 'TAN NATURAL RESOURCE FORUM', '', '', 0, 0, 1, 0, 0, 0),
(62, 'TATO', 'TATO', '', '', 0, 0, 1, 0, 0, 0),
(63, 'THOMSON SAFARIS', 'THOMSON SAFARIS', '', '', 0, 0, 1, 0, 0, 0);

--
-- Dumping data for table 'care_tz_diagnosis'
--

INSERT INTO care_tz_diagnosis (case_nr, parent_case_nr, PID, encounter_nr, timestamp, ICD_10_code, ICD_10_description, type, comment, doctor_name) VALUES
(1, -1, 10022423, 2006502568, 1142578162, 'L63', 'Alopecia areata', 'new', '', NULL),
(2, -1, 10022423, 2006502568, 1142578214, 'L20', 'Atopic dermatitis', 'new', '', NULL),
(3, -1, 10018012, 2006502579, 1142581270, 'B34.9', 'Viral infection, unspecified', 'new', '', NULL),
(4, -1, 10015674, 2006502580, 1142581500, 'B34.9', 'Viral infection, unspecified', 'new', '', NULL),
(5, -1, 10015674, 2006502580, 1142581695, 'E11', 'Non-insulin-dependent diabetes mellitus', 'new', '', NULL),
(6, -1, 10023339, 2006502586, 1142583932, 'N39.0', 'Urinary tract infection, site not specified', 'new', '', NULL),
(7, -1, 10022121, 2006502589, 1142585305, 'B34.9', 'Viral infection, unspecified', 'new', '', NULL),
(8, -1, 10023392, 2006502575, 1142586297, 'R29.8', 'Other and unspecified symptoms and signs involving', 'new', '', NULL),
(9, -1, 10022742, 2006502618, 1142591601, 'B34.9', 'Viral infection, unspecified', 'new', '', NULL),
(10, -1, 10001014, 2006502657, 1142679595, 'B34.9', 'Viral infection, unspecified', 'new', '', NULL),
(11, -1, 10023222, 2006502674, 1142680868, 'M06.9', 'Rheumatoid arthritis, unspecified', 'new', '', NULL),
(12, -1, 10023032, 2006502775, 1142930379, 'B53.8', 'Malaria, BS+', 'new', '', NULL),
(13, -1, 10023032, 2006502775, 1142930379, 'J11', 'Influenza, virus not identified', 'new', '', NULL),
(14, -1, 10022883, 2006502863, 1143015254, 'B35', 'Tinea', 'new', '', NULL),
(15, -1, 10018457, 2006502963, 1143196434, 'M02', 'Arthritis, reactive\r\n', 'new', '', NULL),
(16, -1, 10022423, 2006503021, 1143443024, 'B53.8', 'Malaria, BS+', 'new', '', NULL),
(17, -1, 10022423, 2006503021, 1143456704, 'J42', 'Bronchitis, chronic', 'new', '', NULL),
(18, -1, 10023606, 2006503194, 1143617450, 'B53.8', 'Malaria, BS+', 'new', '', NULL),
(19, -1, 10023339, 2006504018, 1144822822, 'B24', 'HIV+', 'new', '', NULL),
(20, -1, 10004941, 2006504025, 1144824900, 'J42', 'Bronchitis, chronic', 'new', '', NULL),
(21, -1, 10023753, 2006504392, 1145435963, 'B24', 'HIV+', 'new', '', NULL),
(22, -1, 10022423, 2006505304, 1146569129, 'J00', 'Acute nasopharyngitis [common cold]', 'new', '', NULL),
(23, -1, 10022423, 2006505304, 1146569129, 'D53.9', 'Anaemia, nutritional', 'new', '', NULL),
(24, -1, 10014581, 2006507965, 1150198411, 'R07.3', 'Other chest pain', 'new', '', NULL),
(25, -1, 10022423, 2006508545, 1150971261, 'J20', 'Acute bronchitis', 'new patient', '', NULL),
(26, -1, 10022423, 2006508545, 1150971261, 'B24', 'HIV+', 'new', '', NULL),
(27, -1, 10025283, 2006508861, 1151476605, 'B24', 'HIV+', 'new', '', NULL),
(28, -1, 10025173, 2006508872, 1151488557, 'B24', 'HIV+', 'new', '', NULL),
(29, -1, 10019191, 2006509521, 1152684675, 'B24', 'HIV+', 'new', '', NULL),
(30, -1, 10025611, 2006509570, 1152693139, 'D64.9', 'Anaemia, unspecified', 'new', '', NULL),
(31, -1, 10025067, 2006510005, 1153895533, 'K29.7', 'Gastritis, unspecified', 'new', '', NULL),
(32, -1, 10024638, 2006510011, 1153900409, 'K04.0', 'Pulpitis', 'new', '', NULL),
(33, -1, 10025776, 2006510056, 1153922007, 'S93.0', 'Dislocation of ankle joint', 'new', '', NULL),
(34, -1, 10022423, 2006509998, 1153922211, 'S43.1', 'Dislocation of acromioclavicular joint', 'new', '', NULL),
(35, -1, 10025764, 2006510184, 1154090255, 'H00.0', 'Hordeolum and other deep inflammation of eyelid', 'new', '', NULL),
(36, -1, 10025834, 2006510247, 1154100084, 'L02.9', 'Abscess, cutaneous', 'new', '', NULL),
(37, -1, 10025839, 2006510398, 1154494034, 'B54', 'Malaria, BS - or not tested', 'new', '', NULL),
(38, -1, 10026088, 2006510878, 1155295279, 'L02.9', 'Abscess, cutaneous', 'new', 'jhhgjhjjjgj', NULL),
(39, -1, 10026088, 2006510878, 1155295279, 'J21', 'Acute bronchiolitis', 'new', 'jyghhgjhgjjjj', NULL),
(40, -1, 10026105, 2006510912, 1155376546, 'K29.7', 'Gastritis, unspecified', 'new', '', NULL),
(41, -1, 10015718, 2006510901, 1155379376, 'N34.1', 'Urethritis', 'new', '', NULL),
(42, -1, 10025842, 2006510928, 1155383199, 'L02.9', 'Abscess, cutaneous', 'new', 'dfthdfhdfhfd', NULL),
(43, -1, 10022933, 2006510937, 1155535966, 'B24', 'HIV+', 'new', '', NULL),
(44, -1, 10023684, 2006510948, 1155539001, 'B24', 'HIV+', 'new', '', NULL),
(45, -1, 10023764, 2006510949, 1155539397, 'B24', 'HIV+', 'new', '', NULL),
(46, -1, 10022372, 2006510955, 1155540298, 'B24', 'HIV+', 'new', '', NULL),
(47, -1, 10026144, 2006511044, 1155557750, 'L02.9', 'Abscess, cutaneous', 'new', 'cutaneous abscess', NULL),
(48, -1, 10026144, 2006511044, 1155557750, 'J04.0', 'Acute laryngitis', 'new', 'acute laryngitis', NULL),
(49, -1, 10026049, 2006511125, 1155712670, 'B24', 'HIV+', 'new', '', NULL),
(50, -1, 10026194, 2006511185, 1155804286, 'T14.9', 'Injury, unspecified', 'new', '', NULL),
(51, -1, 10026174, 2006511124, 1155804432, 'B24', 'HIV+', 'new', '', NULL),
(52, -1, 10025982, 2006511259, 1155887724, 'B24', 'HIV+', 'new', '', NULL),
(53, -1, 10026245, 2006511550, 1156317268, 'B24', 'HIV+', 'new', '', NULL),
(54, -1, 10026261, 2006511561, 1156320160, 'B24', 'HIV+', 'new', '', NULL),
(55, -1, 10022423, 2006512059, 1157027960, 'Z30', 'Contraceptive management', 'new', '', NULL),
(56, -1, 10019037, 2006512077, 1157090836, 'I10', 'Hypertension, essential', 'new', 'compliance is poor', NULL),
(57, -1, 10026143, 2006512115, 1157100369, 'B24', 'HIV+', 'new', '', NULL),
(58, -1, 10012091, 2006512224, 1157356079, 'K29.7', 'Gastritis, unspecified', 'new', '', NULL),
(59, -1, 10026530, 2006512255, 1157359914, 'J20', 'Acute bronchitis', 'new', '', NULL),
(60, -1, 10026530, 2006512255, 1157359914, 'B35', 'Tinea', 'new', '', NULL),
(61, -1, 10023572, 2006512361, 1157524190, 'B24', 'HIV+', 'new', '', NULL),
(62, -1, 10026597, 2006512698, 1158131976, 'B24', 'HIV+', 'new', '', NULL),
(63, -1, 10026179, 2006512792, 1158304588, 'B24', 'HIV+', 'new', 'continue with medicine.', NULL),
(64, -1, 10015958, 2006513001, 1158660002, 'R60.9', 'Oedema, unspecified', 'new', '', NULL),
(65, -1, 10026733, 2006513000, 1158660257, 'K29.7', 'Gastritis, unspecified', 'new', '', NULL),
(66, -1, 10026732, 2006512999, 1158661546, 'K29.7', 'Gastritis, unspecified', 'new', '', NULL),
(67, -1, 10026903, 2006513494, 1159517693, 'B53.8', 'Malaria, BS+', 'new', 'bring back not improving 4/3days', NULL),
(68, -1, 10024225, 2006513552, 1159853549, 'K02', 'Dental caries', 'new', '', NULL),
(69, 68, 10024225, 2006513552, 1159940207, 'K02', 'Dental caries', 'revisit', '', NULL),
(70, -1, 10024225, 2006513552, 1159940207, 'K05.3', 'Chronic periodontitis', 'new', '', NULL),
(71, -1, 10011855, 2006513717, 1160384045, 'J42', 'Bronchitis, chronic', 'new', '', NULL),
(72, -1, 10027333, 2006514609, 1161502354, 'J06.9', 'Acute upper respiratory infection, unspecified', 'new', '', NULL),
(73, -1, 10005346, 2006514610, 1161502619, 'J20', 'Acute bronchitis', 'new', '', NULL),
(74, -1, 10027333, 2006514609, 1161502660, 'J02', 'Acute pharyngitis', 'new', '', NULL),
(75, -1, 10014069, 2006514612, 1161503474, 'I50.0', 'Congestive heart failure', 'new', '', NULL),
(76, -1, 10014069, 2006514612, 1161503474, 'I10', 'Hypertension, essential', 'new', '', NULL),
(77, -1, 10008202, 2006514617, 1161583485, 'J45', 'Asthma', 'new', '', NULL),
(78, -1, 10008202, 2006514617, 1161583485, 'J18.9', 'Pneumonia, unspecified', 'new', '', NULL),
(79, -1, 10000212, 2006514680, 1161602333, 'N39.0', 'Urinary tract infection, site not specified', 'new', 'f/u after 7days', NULL),
(80, -1, 10027644, 2006515645, 1162879210, 'S02.6', 'Fracture of mandible', 'new', '', NULL),
(81, -1, 10022838, 2006515588, 1162880405, 'J18.9', 'Pneumonia, unspecified', 'new', '', NULL),
(82, -1, 10011136, 2006515670, 1162883235, 'H10', 'Conjunctivitis', 'new', '', NULL),
(83, -1, 10027653, 2006515682, 1162884213, 'K27', 'Peptic ulcer, site unspecified', 'new', '', NULL),
(84, -1, 10001051, 2006515684, 1162885526, 'E11', 'Diabetes mellitus, Non-insulin-dependent', 'new', '', NULL),
(85, -1, 10027655, 2006515685, 1162886458, 'K27', 'Peptic ulcer, site unspecified', 'new', '', NULL),
(86, -1, 10027656, 2006515689, 1162886867, 'A09', 'Diarrhoea and gastroenteritis', 'new', '', NULL),
(87, -1, 10026808, 2006515692, 1162888885, 'B24', 'HIV+', 'new', '', NULL),
(88, -1, 10005405, 2006515696, 1162889711, 'J04.0', 'Acute laryngitis', 'new', '', NULL),
(89, -1, 10000246, 2006515694, 1162890933, 'T78.4', 'Allergy, unspecified', 'new', '', NULL),
(90, -1, 10000246, 2006515694, 1162890933, 'A01.0', 'Typhoid fever', 'new', '', NULL),
(91, -1, 10025226, 2006515701, 1162891084, 'B24', 'HIV+', 'new', '', NULL),
(92, -1, 10023892, 2006515711, 1162965638, 'K08.3', 'Retained dental root', 'new', '', NULL),
(93, -1, 10023892, 2006515711, 1162965638, 'K00.1', 'Supernumerary teeth', 'new', '', NULL),
(94, -1, 10023348, 2006515713, 1162966102, 'B54', 'Malaria, BS - or not tested\r\n', 'new', 'ct  ART therapy', NULL),
(95, -1, 10027662, 2006515719, 1162966934, 'J18.9', 'Pneumonia, unspecified', 'new', 'Rtn after 7days', NULL),
(96, -1, 10018221, 2006515738, 1162970417, 'B24', 'HIV+', 'new', '', NULL),
(97, -1, 10027639, 2006515745, 1162972892, 'K05.1', 'Chronic gingivitis', 'new', '', NULL),
(98, -1, 10027639, 2006515745, 1162972921, 'K02.9', 'Dental caries, unspecified', 'new', '', NULL),
(99, -1, 10021851, 2006515724, 1162973258, 'N39.0', 'Urinary tract infection, site not specified', 'new', '', NULL),
(100, -1, 10022678, 2006515722, 1162973867, 'N92.5', 'DUB, Irregular menstruation', 'new', '', NULL),
(101, -1, 10027288, 2006515733, 1162975424, 'B24', 'HIV+', 'new', '', NULL),
(102, -1, 10027663, 2006515730, 1162976272, 'B54', 'Malaria, BS - or not tested\r\n', 'new', '', NULL),
(103, -1, 10025890, 2006515793, 1162986536, 'A23', 'Brucellosis', 'new', '', NULL),
(104, -1, 10025890, 2006515793, 1162986536, 'A06', 'Amoebiasis', 'new', '', NULL),
(105, -1, 10027664, 2006515731, 1162986723, 'L23', 'Allergic contact eczema', 'new', '', NULL),
(106, -1, 10024564, 2006515816, 1163151319, 'B24', 'HIV+', 'new', '', NULL),
(107, -1, 10014217, 2006516041, 1163231093, 'A09', 'Diarrhoea and gastroenteritis', 'new', '', NULL),
(108, -1, 10027109, 2006516098, 1163397121, 'B24', 'HIV+', 'new', '', NULL),
(109, -1, 10023105, 2006516097, 1163399165, 'B24', 'HIV+', 'new', '', NULL),
(110, -1, 10027624, 2006516105, 1163399862, 'B24', 'HIV+', 'new', '', NULL),
(111, -1, 10026624, 2006516119, 1163401827, 'B24', 'HIV+', 'new', '', NULL),
(112, -1, 10027746, 2006516100, 1163402286, 'J18.9', 'Pneumonia, unspecified', 'new', '', NULL),
(113, -1, 10027746, 2006516100, 1163402286, 'B53.8', 'Malaria, BS+', 'new', '', NULL),
(114, -1, 10012973, 2006516160, 1163404480, 'E11', 'Diabetes mellitus, Non-insulin-dependent', 'new', '', NULL),
(115, -1, 10026906, 2006516161, 1163405583, 'B24', 'HIV+', 'new', '', NULL),
(116, -1, 10001160, 2006516241, 1163485830, 'J04.0', 'Acute laryngitis', 'new', '', NULL),
(117, -1, 10027696, 2006516258, 1163499395, 'N39.0', 'Urinary tract infection, site not specified', 'new', '', NULL),
(118, -1, 10026962, 2006516339, 1163582538, 'B24', 'HIV+', 'new', '', NULL),
(119, -1, 10027427, 2006516476, 1163748192, 'A15.3', 'Tuberculosis of lung', 'new', 'Check CD4', NULL),
(120, -1, 10024953, 2006516482, 1163749468, 'A15.3', 'Tuberculosis of lung', 'new', 'cd4', NULL),
(121, -1, 10022365, 2006516502, 1163749881, 'J11', 'Influenza, virus not identified', 'new', '', NULL),
(122, -1, 10024216, 2006516488, 1163750997, 'B54', 'Malaria, BS - or not tested\r\n', 'new', '', NULL),
(123, -1, 10027846, 2006516504, 1163751792, 'S02.6', 'Fracture of mandible', 'new', '', NULL),
(124, -1, 10019362, 2006516525, 1163752669, 'M16', 'Arthrosis of hip', 'new', '', NULL),
(125, -1, 10027713, 2006516531, 1163754007, 'J18.9', 'Pneumonia, unspecified', 'new', 'Rtn after 14days', NULL),
(126, -1, 10027741, 2006516542, 1163756513, 'B24', 'HIV+', 'new', '', NULL),
(127, -1, 10027933, 2006516838, 1164196577, 'K02.9', 'Dental caries, unspecified', 'new', '', NULL),
(128, -1, 10027933, 2006516838, 1164196599, 'K05.0', 'Acute gingivitis', 'new', '', NULL),
(129, -1, 10024996, 2006516875, 1164196666, 'K05.1', 'Chronic gingivitis', 'new', '', NULL),
(130, -1, 10027880, 2006516854, 1164196771, 'K04.7', 'Periapical abscess without sinus', 'new', '', NULL),
(131, -1, 10005901, 2006516864, 1164196844, 'K05.1', 'Chronic gingivitis', 'new', '', NULL),
(132, -1, 10026438, 2006516910, 1164263686, 'B24', 'HIV+', 'new', '', NULL),
(133, -1, 10027951, 2006516925, 1164269410, 'Z32', 'Pregnancy examination and test', 'new', '', NULL),
(134, -1, 10027799, 2006516908, 1164274245, 'N39.0', 'Urinary tract infection, site not specified', 'new', '', NULL),
(135, -1, 10025758, 2006516944, 1164274435, 'J20', 'Acute bronchitis', 'new', '', NULL),
(136, -1, 10027474, 2006516986, 1164350648, 'B24', 'HIV+', 'new', '', NULL),
(137, -1, 10022423, 2006517278, 1164716604, 'M00', 'Arthritis, bacterial', 'new', '', NULL),
(138, -1, 10026426, 2006517298, 1164785535, 'B24', 'HIV+', 'new', '', NULL),
(139, -1, 10027098, 2006517303, 1164785758, 'B24', 'HIV+', 'new', '', NULL),
(140, -1, 10023359, 2006517314, 1164787232, 'B24', 'HIV+', 'new', '', NULL),
(141, -1, 10022102, 2006517348, 1164787807, 'B24', 'HIV+', 'new', '', NULL),
(142, -1, 10027999, 2006517326, 1164788565, 'B24', 'HIV+', 'new', '', NULL),
(143, -1, 10027732, 2006518211, 1165992108, 'B24', 'HIV+', 'new', '', ''),
(144, -1, 10022919, 2006518217, 1165993253, 'B24', 'HIV+', 'new', 'Rtn 12/01/07', 'Dr Kavumo'),
(145, -1, 10027760, 2006518221, 1165993769, 'B24', 'HIV+', 'new', 'Rtn 13/01/07', 'Kavumo'),
(146, -1, 10027479, 2006518220, 1165993921, 'B24', 'HIV+', 'new', 'Rtn 13/01/07', 'Kavumo'),
(147, -1, 10027171, 2006518236, 1165995262, 'B24', 'HIV+', 'new', 'Rtn 13/01/07', 'Kavumo'),
(148, -1, 10027762, 2006518223, 1165996788, 'B24', 'HIV+', 'new', 'Rtn 13/01/07', 'Kavumo'),
(149, 111, 10026624, 2006518237, 1165997106, 'B24', 'HIV+', 'revisit', 'Rtn 13/01/07', 'Kavumo'),
(150, -1, 10028051, 2006518255, 1166000069, 'M54.5', 'Pain, low back ', 'new', '', ''),
(151, -1, 10028051, 2006518255, 1166000069, 'R10', 'Pain, abdominal and pelvic', 'new', '', ''),
(152, -1, 10028245, 2006518253, 1166000515, 'B24', 'HIV+', 'new', '', ''),
(153, -1, 10028190, 2006518252, 1166001411, 'B24', 'HIV+', 'new', '', ''),
(154, -1, 10000771, 2006518817, 1166688888, 'J03', 'Acute tonsillitis', 'new', 'Rtn after 14days', 'kavumo'),
(155, -1, 10026750, 2006519019, 1167208095, 'B24', 'HIV+', 'new', 'Rtn after 14days', 'kavumo'),
(156, -1, 10028526, 2007500246, 1167984426, 'J00', 'Acute nasopharyngitis [common cold]', 'new', 'Rtn after 14days', ''),
(157, -1, 10028417, 2007500297, 1167986892, 'B37.0', 'Candidal stomatitis', 'new', 'cnsd ART regardless of CD4', ''),
(158, -1, 10028565, 2007500392, 1168075990, 'J18.9', 'Pneumonia, unspecified', 'new', '', ''),
(159, -1, 10028339, 2007500440, 1168239084, 'B24', 'HIV+', 'new', 'rtn after 30days', 'kavumo'),
(160, -1, 10028588, 2007500542, 1168329257, 'T95', 'Burn contracture (sequelae)', 'new', '', 'loy'),
(161, -1, 10028592, 2007500548, 1168330435, 'N39.0', 'Urinary tract infection, site not specified', 'new', '', 'loy'),
(162, -1, 10028621, 2007500650, 1168423445, 'T78.4', 'Allergy, unspecified', 'new', '', ''),
(163, -1, 10027718, 2007501609, 1169621013, 'B24', 'HIV+', 'new', 'rtn after 30days', 'Kavumo'),
(164, 56, 10019037, 2007501624, 1169621282, 'I10', 'Hypertension, essential', 'revisit', 'Rtn after 14days', 'kavumo'),
(165, -1, 10023990, 2007501628, 1169622294, 'B24', 'HIV+', 'new', 'rtn after 30days', 'kavumo'),
(166, -1, 10027584, 2007501796, 1169725739, 'B83', 'Worms, other intestinal', 'new', 'bring back not improving 4/3days', ''),
(167, -1, 10028970, 2007502897, 1170834950, 'B37', 'Candidiasis', 'new', 'Rtn after 14days', 'kavumo'),
(168, -1, 10029402, 2007503979, 1171780691, 'J06.9', 'Acute upper respiratory infection, unspecified', 'new', '', ''),
(169, -1, 10029400, 2007503977, 1171780882, 'J06.9', 'Acute upper respiratory infection, unspecified', 'new', '', ''),
(170, -1, 10024310, 2007503976, 1171784060, 'J11', 'Influenza, virus not identified', 'new', '', ''),
(171, -1, 10029117, 2007505277, 1173075966, 'B24', 'HIV+', 'new', 'rtn after 30days', 'kavumo'),
(172, -1, 10028251, 2007505528, 1173251421, 'B77', 'Ascariasis', 'new', '', ''),
(173, -1, 10015547, 2007506593, 1174115541, 'T14.9', 'Injury, unspecified', 'new', 'continue with medicine.', 'kavumo'),
(174, -1, 10018579, 2007509034, 1176710579, 'B00.2', 'Herpesviral gingivostomatitis and pharyngotonsilli', 'new', 'Rtn after 14days', 'kavumo'),
(175, 26, 10022423, 2007509211, 1176799616, 'B24', 'HIV+', 'revisit', '', ''),
(176, -1, 10023497, 2007509473, 1177056230, 'B24', 'HIV+', 'new', '', ''),
(177, -1, 10029787, 2007510925, 1178610225, 'J45', 'Asthma', 'new', 'continue with medicine.', 'kavumo'),
(178, -1, 10031073, 2007511531, 1179218806, 'B24', 'HIV+', 'new', 'rtn after 14d', 'winie'),
(179, -1, 10030830, 2007511586, 1179239390, 'I84', 'Haemorrhoids', 'new', '', ''),
(180, -1, 10031258, 2007512453, 1180080711, 'K02', 'Dental caries', 'new', '', ''),
(181, -1, 10031258, 2007512453, 1180080711, 'K04.6', 'Periapical abscess with sinus', 'new', '', ''),
(182, -1, 10023205, 2007512989, 1180594105, 'I10', 'Hypertension, essential', 'new', 'bring back not improving 4/3days', 'kavumo'),
(183, -1, 10031230, 2007513067, 1180680768, 'K00.1', 'Supernumerary teeth', 'new', '', ''),
(184, -1, 10031425, 2007513544, 1181287051, 'K02', 'Dental caries', 'new', '', ''),
(185, -1, 10031472, 2007513578, 1181289897, 'K04.4', 'Acute apical periodontitis of pulpal origin', 'new', '', ''),
(186, -1, 10031472, 2007513578, 1181289897, 'K02', 'Dental caries', 'new', '', ''),
(187, -1, 10031474, 2007513600, 1181291020, 'K05.3', 'Chronic periodontitis', 'new', '', ''),
(188, -1, 10008270, 2007514085, 1181890159, 'K02', 'Dental caries', 'new', '', ''),
(189, -1, 10031538, 2007514103, 1181890278, 'K02', 'Dental caries', 'new', '', ''),
(190, -1, 10015475, 2007514391, 1182234632, 'K02', 'Dental caries', 'new', '', ''),
(191, -1, 10031217, 2007514407, 1182239016, 'K04.0', 'Pulpitis', 'new', '', ''),
(192, -1, 10031679, 2007514682, 1182492919, 'K02', 'Dental caries', 'new', '', ''),
(193, -1, 10004941, 2007514681, 1182494133, 'K04.6', 'Periapical abscess with sinus', 'new', '', ''),
(194, -1, 10031719, 2007514663, 1182494706, 'K05', 'Gingivitis and periodontal diseases', 'new', '', ''),
(195, -1, 10025586, 2007514683, 1182496213, 'K04.7', 'Periapical abscess without sinus', 'new', '', ''),
(196, -1, 10006415, 2007514786, 1182506972, 'K05', 'Gingivitis and periodontal diseases', 'new', '', ''),
(197, -1, 10030713, 2007514873, 1182751624, 'K02.9', 'Dental caries, unspecified', 'new', '', ''),
(198, -1, 10001121, 2007514882, 1182754490, 'K08.3', 'Retained dental root', 'new', '', ''),
(199, -1, 10010784, 2007515755, 1183647925, 'T78.4', 'Allergy, unspecified', 'new', '', 'walter'),
(200, -1, 10014904, 2007517019, 1185186754, 'K05.2', 'Acute periodontitis', 'new', '', ''),
(201, -1, 10019852, 2007521543, 1190272577, 'A04.4', 'Other intestinal Escherichia coli infections', 'new', '', 'christopher'),
(202, -1, 10000097, 2007521604, 1190355067, 'I10', 'Hypertension, essential', 'new', '', ''),
(203, -1, 10031509, 2007522698, 1191488227, 'B53.8', 'Malaria, BS+', 'new', 'TREATED', 'Mlaki'),
(204, -1, 10033445, 2007522699, 1191491823, 'N39.0', 'Urinary tract infection, site not specified', 'new patient', 'treated', 'Mlaki'),
(205, -1, 10033446, 2007522700, 1191492365, 'D64.9', 'Anaemia, unspecified', 'new', '', ''),
(206, -1, 10033446, 2007522700, 1191492406, 'T78.4', 'Allergy, unspecified', 'new', '', ''),
(207, -1, 10025517, 2007522712, 1191493258, 'D64.9', 'Anaemia, unspecified', 'new patient', '', ''),
(208, -1, 10025517, 2007522712, 1191493258, 'J20', 'Acute bronchitis', 'new patient', '', ''),
(209, -1, 10025517, 2007522712, 1191493258, 'A06', 'Amoebiasis', 'new patient', '', ''),
(210, -1, 10017040, 2007522707, 1191494044, 'J20', 'Acute bronchitis', 'new patient', '', ''),
(211, -1, 10017040, 2007522707, 1191494044, 'B54', 'Malaria, BS - or not tested\r\n', 'new patient', '', ''),
(212, -1, 10019382, 2007522709, 1191494671, 'D64.9', 'Anaemia, unspecified', 'new', '', ''),
(213, -1, 10019382, 2007522709, 1191494671, 'B54', 'Malaria, BS - or not tested\r\n', 'new', '', ''),
(214, -1, 10019382, 2007522709, 1191494671, 'M25.5', 'Pain in joint', 'new', '', ''),
(215, -1, 10033452, 2007522715, 1191495926, 'E11', 'Diabetes mellitus, Non-insulin-dependent ', 'new', '', ''),
(216, -1, 10033334, 2007522742, 1191504491, 'K29', 'Gastritis and duodenitis', 'new', 'for EGD', 'Kisanga'),
(217, -1, 10033465, 2007522766, 1191568106, 'K02', 'Dental caries', 'new', '', ''),
(218, -1, 10033411, 2007522807, 1191568837, 'K02.9', 'Dental caries, unspecified', 'new', '', ''),
(219, -1, 10033458, 2007522757, 1191568955, 'K02.9', 'Dental caries, unspecified', 'new', '', ''),
(220, -1, 10033467, 2007522776, 1191571605, 'J20', 'Acute bronchitis', 'new', '', ''),
(221, -1, 10000002, 2007522839, 1194960891, 'I01.1', 'Acute rheumatic endocarditis', 'new patient', '', 'dr. balla'),
(222, -1, 10033476, 2008500000, 1205144771, 'D62', 'Anaemia, acute posthaemorrhagic', 'new', '', ''),
(223, -1, 10033476, 2008500000, 1205144771, 'J45', 'Asthma', 'new', '', 'marcel');

--
-- Dumping data for table 'care_tz_district'
--

INSERT INTO care_tz_district (district_id, district_code, district_name, is_additional) VALUES
(1, 1, 'Monduli', 1),
(2, 2, 'Arumeru', 1),
(3, 3, 'Arusha', 1),
(4, 4, 'Karatu', 1),
(5, 5, 'Ngorongoro', 1);

--
-- Dumping data for table 'care_tz_drugliststruc'
--

INSERT INTO care_tz_drugliststruc (item_id, item_number, is_pediatric, is_adult, is_other, is_consumable, mems_item_code, mems_item_description, mems_pack_size, mems_price_per_pack_size, mems_sizes, item_description, item_full_description, dosage, unit_price, purchasing_class) VALUES
(1, 'LH01', 1, 1, 0, 1, '1', '', '2', 3, '2', 'try why not comming', '', '', '405', '');

--
-- Dumping data for table 'care_tz_drugsandservices'
--

INSERT INTO care_tz_drugsandservices (item_id, item_number, is_pediatric, is_adult, is_other, is_consumable, item_description, item_full_description, unit_price, unit_price_1, unit_price_2, unit_price_3, purchasing_class) VALUES
(1, '4', 1, 0, 0, 0, 'Albendazole Suspension 20mg/ml, 20ml Bottle', 'Albendazole Suspension 20mg/ml, 20ml Bottle', '1000', NULL, NULL, NULL, 'drug_list'),
(2, '11', 1, 0, 0, 0, 'Amodiaquine Syrup, 100ML', 'Amodiaquine Syrup, 100ML', '800', NULL, NULL, NULL, 'drug_list'),
(3, '13', 1, 0, 0, 0, 'Amoxicillin 125mg/5ml Suspension, 100 ml', 'Amoxicillin 125mg/5ml Suspension, 100 ml', '1200', NULL, NULL, NULL, 'drug_list'),
(4, '16', 1, 0, 0, 0, 'Ampicilin-Cloxacilin Suspension 62.5mg/5ml+62.5mg/5mll, 100ml', 'Ampicilin-Cloxacilin Suspension 62.5mg/5ml+62.5mg/5mll, 100ml', '', NULL, NULL, NULL, 'drug_list'),
(5, '52', 1, 0, 0, 0, 'Cephalexin Suspension 125mg/5ml, 100ml', 'Cephalexin Suspension 125mg/5ml, 100ml', '3000', NULL, NULL, NULL, 'drug_list'),
(6, '59', 1, 0, 0, 0, 'Chloramphenicol Suspension 125mg/5ml, 100ml', 'Chloramphenicol Suspension 125mg/5ml, 100ml', '1500', '0', '0', '0', 'drug_list'),
(7, '61', 1, 0, 0, 0, 'Chlorpheniramine Maleate 2mg/5ml Syrup, 100ml', 'Chlorpheniramine Maleate 2mg/5ml Syrup, 100ml', '800', NULL, NULL, NULL, 'drug_list'),
(8, '76', 1, 0, 0, 0, 'Cloxacillin Suspension 125mg/5ml, 100ml', 'Cloxacillin Suspension 125mg/5ml, 100ml', '1500', '0', '0', '0', 'drug_list'),
(9, '78', 1, 0, 0, 0, 'Cotrimoxazole Suspension 240mg/5ml Suspension, 100ml', 'Cotrimoxazole Suspension 240mg/5ml Suspension, 100ml', '1000', NULL, NULL, NULL, 'drug_list'),
(10, '102', 1, 0, 0, 0, 'Ephedrine 0.5% Nasal Drops, 10ml Bottle', 'Ephedrine 0.5% Nasal Drops, 10ml Bottle', '1000', NULL, NULL, NULL, 'drug_list'),
(11, '109', 1, 0, 0, 0, 'Erythromycin Suspension 125mg/5ml, 100ml', 'Erythromycin Suspension 125mg/5ml, 100ml', '1500', NULL, NULL, NULL, 'drug_list'),
(12, '140', 1, 0, 0, 0, 'Ibuprofen Suspension 20mg/ml , 100ml', 'Ibuprofen Suspension 20mg/ml , 100ml', '1000', NULL, NULL, NULL, 'drug_list'),
(13, '164', 1, 0, 0, 0, 'Mebendazole Suspension 100mg/5ml, 30ml', 'Mebendazole Suspension 100mg/5ml, 30ml', '500', NULL, NULL, NULL, 'drug_list'),
(14, '174', 1, 0, 0, 0, 'Metronidazole Suspension 125mg/5ml, 100ml', 'Metronidazole Suspension 125mg/5ml, 100ml', '1000', '0', '0', '0', 'drug_list'),
(15, '178', 1, 0, 0, 0, 'Multi-Vitamin Syrup, 100ml', 'Multi-Vitamin Syrup, 100ml', '1200', '0', '0', '0', 'drug_list'),
(16, '197', 1, 0, 0, 0, 'Paracetamol 120mg/5ml Suspension, 100ml', 'Paracetamol 120mg/5ml Suspension, 100ml', '100', '0', '0', '0', 'drug_list'),
(17, '198', 1, 0, 0, 0, 'Paracetamol Suppositories 125mg', 'Paracetamol Suppositories 125mg', '100', NULL, NULL, NULL, 'drug_list'),
(18, '199', 1, 0, 0, 0, 'Paracetamol Tablet , Child, 100mg', 'Paracetamol Tablet , Child, 100mg', '50', NULL, NULL, NULL, 'drug_list'),
(19, '218', 1, 0, 0, 0, 'Promethazine 5mg/5ml Syrup, 100ml', 'Promethazine 5mg/5ml Syrup, 100ml', '1000', '0', '0', '0', 'drug_list'),
(20, '225', 1, 0, 0, 0, 'Quinine Bisulphate Suspension 50mg/5ml, 60ml Bottle', 'Quinine Bisulphate Suspension 50mg/5ml, 60ml Bottle', '1500', NULL, NULL, NULL, 'drug_list'),
(21, '231', 1, 0, 0, 0, 'Salbutamol Syrup 2mg/5ml, 100ml', 'Salbutamol Syrup 2mg/5ml, 100ml', '1000', NULL, NULL, NULL, 'drug_list'),
(22, '242', 1, 0, 0, 0, 'Sulphametopyrazine -Pyrimethamine Tablet 500mg+25mg', 'Sulphametopyrazine -Pyrimethamine Tablet 500mg+25mg', '100', NULL, NULL, NULL, 'drug_list'),
(23, '261', 1, 0, 0, 0, 'Vitamin B Complex Tablets', 'Vitamin B Complex Tablets', '15', '0', '0', '0', 'drug_list'),
(25, '9', 0, 1, 0, 0, 'Aminophylline Tablet 100mg', 'Aminophylline Tablet 100mg', '10', NULL, NULL, NULL, 'drug_list'),
(26, '10', 0, 1, 0, 0, 'Amitriptyline Tablet 25mg', 'Amitriptyline Tablet 25mg', '50', NULL, NULL, NULL, 'drug_list'),
(27, '20', 0, 1, 0, 0, 'Antacid Suspension, 100ml', 'Antacid Suspension, 100ml', '1000', NULL, NULL, NULL, 'drug_list'),
(28, '27', 0, 1, 0, 0, 'Artesunate Tablet 50mg', 'Artesunate Tablet 50mg', '500', '0', '0', '0', 'drug_list'),
(29, '28', 0, 1, 0, 0, 'Atenolol Tablet 50mg', 'Atenolol Tablet 50mg', '100', '0', '0', '0', 'drug_list'),
(30, '33', 0, 1, 0, 0, 'Bedrofluazide Tablet 5mg', 'Bedrofluazide Tablet 5mg', '25', '0', '0', '0', 'drug_list'),
(31, '38', 0, 1, 0, 0, 'Bisacodyl Tablet 5mg', 'Bisacodyl Tablet 5mg', '50', '0', '0', '0', 'drug_list'),
(32, '40', 0, 1, 0, 0, 'Bromocriptine Mesilate Tablet 2.5mg Tablet', 'Bromocriptine Mesilate Tablet 2.5mg Tablet', '400', '0', '0', '0', 'drug_list'),
(33, '45', 0, 1, 0, 0, 'Captopril Tablet 25mg', 'Captopril Tablet 25mg', '150', '0', '0', '0', 'drug_list'),
(34, '47', 0, 1, 0, 0, 'Carbimazole Tablet 5mg', 'Carbimazole Tablet 5mg', '200', '0', '0', '0', 'drug_list'),
(35, '56', 0, 1, 0, 0, 'Chloramphenicol Capsule 250mg', 'Chloramphenicol Capsule 250mg', '40', '0', '0', '0', 'drug_list'),
(36, '63', 0, 1, 0, 0, 'Chlorpromazine HCL Tablet 100mg', 'Chlorpromazine HCL Tablet 100mg', '50', NULL, NULL, NULL, 'drug_list'),
(37, '66', 0, 1, 0, 0, 'Chlorpropamide Tablet 250mg', 'Chlorpropamide Tablet 250mg', '75', NULL, NULL, NULL, 'drug_list'),
(38, '67', 0, 1, 0, 0, 'Cimetidine Tablet 200mg', 'Cimetidine Tablet 200mg', '60', NULL, NULL, NULL, 'drug_list'),
(39, '68', 0, 1, 0, 0, 'Cimetidine Tablet 400mg', 'Cimetidine Tablet 400mg', '75', '0', '0', '0', 'drug_list'),
(40, '70', 0, 1, 0, 0, 'Ciprofloxacin Tablet 500mg', 'Ciprofloxacin Tablet 500mg', '500', '0', '0', '0', 'drug_list'),
(41, '71', 0, 1, 0, 0, 'Clomiphene Capsule 50mg', 'Clomiphene Capsule 50mg', '500', NULL, NULL, NULL, 'drug_list'),
(42, '80', 0, 1, 0, 0, 'Cough Expectorant Syrup (Adult), 100ml', 'Cough Expectorant Syrup (Adult), 100ml', '800', NULL, NULL, NULL, 'drug_list'),
(43, '92', 0, 1, 0, 0, 'Diazepam Tablet 5mg', 'Diazepam Tablet 5mg', '20', '0', '0', '0', 'drug_list'),
(44, '97', 0, 1, 0, 0, 'Diclofenac Sodium Tablet 50mg', 'Diclofenac Sodium Tablet 50mg', '50', NULL, NULL, NULL, 'drug_list'),
(45, '99', 0, 1, 0, 0, 'Digoxin Tablet 0.25mg', 'Digoxin Tablet 0.25mg', '30', '0', '0', '0', 'drug_list'),
(46, '101', 0, 1, 0, 0, 'Doxycycline Tablet 100mg', 'Doxycycline Tablet 100mg', '25', NULL, NULL, NULL, 'drug_list'),
(47, '103', 0, 1, 0, 0, 'Ephedrine 1% Nasal Drops, 15ml Bottle', 'Ephedrine 1% Nasal Drops, 15ml Bottle', '1000', NULL, NULL, NULL, 'drug_list'),
(48, '108', 0, 1, 0, 0, 'Ergotamine + Caffeine Tablet (1mg+100mg)', 'Ergotamine + Caffeine Tablet (1mg+100mg)', '250', '0', '0', '0', 'drug_list'),
(49, '116', 0, 1, 0, 0, 'Fluconazole Tablet 150mg', 'Fluconazole Tablet 150mg', '600', '0', '0', '0', 'drug_list'),
(50, '120', 0, 1, 0, 0, 'Furosemide Tablet 40mg', 'Furosemide Tablet 40mg', '25', '0', '0', '0', 'drug_list'),
(51, '124', 0, 1, 0, 0, 'Glibeclamide Tablet 5mg', 'Glibeclamide Tablet 5mg', '300', '0', '0', '0', 'drug_list'),
(52, '127', 0, 1, 0, 0, 'Griseufulvin Tablet 500mg', 'Griseufulvin Tablet 500mg', '120', '0', '0', '0', 'drug_list'),
(53, '128', 0, 1, 0, 0, 'Haloperidol Tablet 5mg', 'Haloperidol Tablet 5mg', '120', NULL, NULL, NULL, 'drug_list'),
(54, '129', 0, 1, 0, 0, 'Haloperidol Tablets 1.5mg', 'Haloperidol Tablets 1.5mg', '60', NULL, NULL, NULL, 'drug_list'),
(55, '133', 0, 1, 0, 0, 'Hydralazine Tablet 25mg', 'Hydralazine Tablet 25mg', '50', NULL, NULL, NULL, 'drug_list'),
(56, '134', 0, 1, 0, 0, 'Hydrochlorothiazide Tablet 25mg', 'Hydrochlorothiazide Tablet 25mg', '20', NULL, NULL, NULL, 'drug_list'),
(57, '139', 0, 1, 0, 0, 'Hyoscine-N- Butylbromide 10 mg', 'Hyoscine-N- Butylbromide 10 mg', '40', NULL, NULL, NULL, 'drug_list'),
(58, '142', 0, 1, 0, 0, 'Ibuprofen Tablet 400mg', 'Ibuprofen Tablet 400mg', '15', NULL, NULL, NULL, 'drug_list'),
(59, '143', 0, 1, 0, 0, 'Indomethacin Capsule 25mg', 'Indomethacin Capsule 25mg', '20', '0', '0', '0', 'drug_list'),
(60, '150', 0, 1, 0, 0, 'Ketoconazole Tablet 200mg', 'Ketoconazole Tablet 200mg', '300', '0', '0', '0', 'drug_list'),
(61, '160', 0, 1, 0, 0, 'Loperamide Tablet 2mg', 'Loperamide Tablet 2mg', '30', NULL, NULL, NULL, 'drug_list'),
(62, '161', 0, 1, 0, 0, 'Magnesium Trisilicate Suspension, 100ml', 'Magnesium Trisilicate Suspension, 100ml', '1000', NULL, NULL, NULL, 'drug_list'),
(63, '162', 0, 1, 0, 0, 'Magnesium Trisilicate Tablets', 'Magnesium Trisilicate Tablets', '20', '0', '0', '0', 'drug_list'),
(64, '165', 0, 1, 0, 0, 'Mebendazole Tablet 100mg', 'Mebendazole Tablet 100mg', '30', '0', '0', '0', 'drug_list'),
(65, '168', 0, 1, 0, 0, 'Metfomin Tablet 500mg', 'Metfomin Tablet 500mg', '60', NULL, NULL, NULL, 'drug_list'),
(66, '170', 0, 1, 0, 0, 'Methyldopa Tablet 250mg', 'Methyldopa Tablet 250mg', '80', NULL, NULL, NULL, 'drug_list'),
(67, '172', 0, 1, 0, 0, 'Metoclopramide HCl Tablet 10mg', 'Metoclopramide HCl Tablet 10mg', '75', '0', '0', '0', 'drug_list'),
(68, '186', 0, 1, 0, 0, 'Nifedipine (Sustained Release) Tablets 20mg', 'Nifedipine (Sustained Release) Tablets 20mg', '80', NULL, NULL, NULL, 'drug_list'),
(69, '187', 0, 1, 0, 0, 'Nifedipine Tablet 10mg', 'Nifedipine Tablet 10mg', '60', NULL, NULL, NULL, 'drug_list'),
(70, '188', 0, 1, 0, 0, 'Nimesulide  Tablet 100mg', 'Nimesulide  Tablet 100mg', '100', '0', '0', '0', 'drug_list'),
(71, '189', 0, 1, 0, 0, 'Nitrofurantoin Tablet 100mg', 'Nitrofurantoin Tablet 100mg', '30', '0', '0', '0', 'drug_list'),
(72, '190', 0, 1, 0, 0, 'Norethisterone 5mg Tablets', 'Norethisterone 5mg Tablets', '400', NULL, NULL, NULL, 'drug_list'),
(73, '192', 0, 1, 0, 0, 'Nystatin Tablet 500000IU', 'Nystatin Tablet 500000IU', '100', NULL, NULL, NULL, 'drug_list'),
(74, '193', 0, 1, 0, 0, 'Omeprazole  Capsule 20mg', 'Omeprazole  Capsule 20mg', '150', '0', '0', '0', 'drug_list'),
(75, '200', 0, 1, 0, 0, 'Paracetamol Tablet 500mg', 'Paracetamol Tablet 500mg', '15', '0', '0', '0', 'drug_list'),
(76, '211', 0, 1, 0, 0, 'Phenytoin 100mg/tab', 'Phenytoin 100mg/tab', '20', NULL, NULL, NULL, 'drug_list'),
(77, '220', 0, 1, 0, 0, 'Promethazine Tablet 25mg', 'Promethazine Tablet 25mg', '15', '0', '0', '0', 'drug_list'),
(78, '222', 0, 1, 0, 0, 'Propranolol Tablet 40mg', 'Propranolol Tablet 40mg', '50', NULL, NULL, NULL, 'drug_list'),
(79, '228', 0, 1, 0, 0, 'Ranitidine Tablet 150mg', 'Ranitidine Tablet 150mg', '200', '0', '0', '0', 'drug_list'),
(80, '230', 0, 1, 0, 0, 'Salbutamol 0.1mg/dose Spray for Inhalation, 200 doses', 'Salbutamol 0.1mg/dose Spray for Inhalation, 200 doses', '3000', NULL, NULL, NULL, 'drug_list'),
(81, '239', 0, 1, 0, 0, 'Sucralfate Tablets 1g', 'Sucralfate Tablets 1g', '', NULL, NULL, NULL, 'drug_list'),
(82, '243', 0, 1, 0, 0, 'Suxamethonium Chloride Injection 50mg/ml, 2ml Vial', 'Suxamethonium Chloride Injection 50mg/ml, 2ml Vial', '500', NULL, NULL, NULL, 'drug_list'),
(83, '246', 0, 1, 0, 0, 'Tetracycline Eye Ointment 1%, 15g Tube', 'Tetracycline Eye Ointment 1%, 15g Tube', '500', '0', '0', '0', 'drug_list'),
(84, '249', 0, 1, 0, 0, 'Timolol Maleate Eye Drops 0.5%, 5ml', 'Timolol Maleate Eye Drops 0.5%, 5ml', '2000', NULL, NULL, NULL, 'drug_list'),
(85, '251', 0, 1, 0, 0, 'Tolbutamide Tablet 500mg', 'Tolbutamide Tablet 500mg', '', NULL, NULL, NULL, 'drug_list'),
(86, '253', 0, 1, 0, 0, 'Tramadol HCl Drops, 10ml', 'Tramadol HCl Drops, 10ml', '2000', NULL, NULL, NULL, 'drug_list'),
(87, '257', 0, 1, 0, 0, 'Vitamin A (Retinol) Capsule 50000IU', 'Vitamin A (Retinol) Capsule 50000IU', '50', '0', '0', '0', 'drug_list'),
(88, '264', 0, 1, 0, 0, 'Vitamin E Capsule', 'Vitamin E Capsule', '500', NULL, NULL, NULL, 'drug_list'),
(90, '8', 0, 0, 1, 0, 'Aminophylline  Injection 25mg/ml, 10ml Amp', 'Aminophylline  Injection 25mg/ml, 10ml Amp', '500', NULL, NULL, NULL, 'drug_list'),
(91, '15', 0, 0, 1, 0, 'Ampicilin -Cloxacilin 250mg+250mg/vial Injection', 'Ampicilin -Cloxacilin 250mg+250mg/vial Injection', '', NULL, NULL, NULL, 'drug_list'),
(92, '18', 0, 0, 1, 0, 'Ampicillin Dry Powder for Injection 500mg , Vial', 'Ampicillin Dry Powder for Injection 500mg , Vial', '400', NULL, NULL, NULL, 'drug_list'),
(93, '19', 0, 0, 1, 0, 'Ampicillin Dry Powder for Injection, 1g, Vial', 'Ampicillin Dry Powder for Injection, 1g, Vial', '600', NULL, NULL, NULL, 'drug_list'),
(94, '21', 0, 0, 1, 0, 'Antihaemorrhoidal  Suppositories with Hydrocortisone 5mg', 'Antihaemorrhoidal  Suppositories with Hydrocortisone 5mg', '1000', '0', '0', '0', 'drug_list'),
(95, '22', 0, 0, 1, 0, 'Antihaemorrhoidal Cream with steroid 30g, Tube', 'Antihaemorrhoidal Cream with steroid 30g, Tube', '2000', NULL, NULL, NULL, 'drug_list'),
(96, '23', 0, 0, 1, 0, 'Antihistamine Cream  25g tube', 'Antihistamine Cream  25g tube', '1200', '0', '0', '0', 'drug_list'),
(97, '24', 0, 0, 1, 0, 'Anti-Rabies Vaccine Injection, Vial', 'Anti-Rabies Vaccine Injection, Vial', '18000', NULL, NULL, NULL, 'drug_list'),
(98, '31', 0, 0, 1, 0, 'Atropine Sulphate Eye Drops 1%, 10ml Bottle', 'Atropine Sulphate Eye Drops 1%, 10ml Bottle', '3000', NULL, NULL, NULL, 'drug_list'),
(99, '34', 0, 0, 1, 0, 'Benzoic Acid-Salicylic Acid 6%+3% Ointment , 40g Tube', 'Benzoic Acid-Salicylic Acid 6%+3% Ointment , 40g Tube', '800', NULL, NULL, NULL, 'drug_list'),
(100, '35', 0, 0, 1, 0, 'Benzyl Benzoate Emulsion (BBE), 100ml', 'Benzyl Benzoate Emulsion (BBE), 100ml', '1000', NULL, NULL, NULL, 'drug_list'),
(101, '36', 0, 0, 1, 0, 'Betamethasone Valerate 0.1% Cream, 15g Tube', 'Betamethasone Valerate 0.1% Cream, 15g Tube', '800', NULL, NULL, NULL, 'drug_list'),
(102, '39', 0, 0, 1, 0, 'Boric Acid 2% E/N Drops, 10ml', 'Boric Acid 2% E/N Drops, 10ml', '1000', '0', '0', '0', 'drug_list'),
(103, '48', 0, 0, 1, 0, 'Cefotaxime Injection 1g, Vial', 'Cefotaxime Injection 1g, Vial', '4500', '0', '0', '0', 'drug_list'),
(104, '49', 0, 0, 1, 0, 'Cefotaxime Injection 500mg, Vial', 'Cefotaxime Injection 500mg, Vial', '1200', NULL, NULL, NULL, 'drug_list'),
(105, '50', 0, 0, 1, 0, 'Ceftriaxone Injection 250mg, Vial', 'Ceftriaxone Injection 250mg, Vial', '', NULL, NULL, NULL, 'drug_list'),
(106, '51', 0, 0, 1, 0, 'Ceftriaxone Injection, 1g, Vial', 'Ceftriaxone Injection, 1g, Vial', '1800', NULL, NULL, NULL, 'drug_list'),
(107, '54', 0, 0, 1, 0, 'Chloramphenicol 1% Eye Oint , 5g Tube', 'Chloramphenicol 1% Eye Oint , 5g Tube', '80', NULL, NULL, NULL, 'drug_list'),
(108, '55', 0, 0, 1, 0, 'Chloramphenicol 5% Ear Drops, 10ml Bottle', 'Chloramphenicol 5% Ear Drops, 10ml Bottle', '1000', NULL, NULL, NULL, 'drug_list'),
(109, '57', 0, 0, 1, 0, 'Chloramphenicol Dry Powder for Injection 1g vial', 'Chloramphenicol Dry Powder for Injection 1g vial', '1000', '0', '0', '0', 'drug_list'),
(110, '58', 0, 0, 1, 0, 'Chloramphenicol Eye Drops 0.5%, 10ml Bottle', 'Chloramphenicol Eye Drops 0.5%, 10ml Bottle', '1000', NULL, NULL, NULL, 'drug_list'),
(111, '69', 0, 0, 1, 0, 'Ciprofloxacin Injection 200mg/100ml, Vial  100 ml', 'Ciprofloxacin Injection 200mg/100ml, Vial 100 ml', '1600', '0', '0', '0', 'drug_list'),
(112, '72', 0, 0, 1, 0, 'Clotrimazole 1% Cream, 20g Tube', 'Clotrimazole 1% Cream, 20g Tube', '1000', '0', '0', '0', 'drug_list'),
(113, '73', 0, 0, 1, 0, 'Clotrimazole Pessaries, 100mg, (Pack of 6)', 'Clotrimazole Pessaries, 100mg, Pack of 6', '1000', '0', '0', '0', 'drug_list'),
(114, '75', 0, 0, 1, 0, 'Cloxacillin Dry Powder for Injection, 500mg, Vial', 'Cloxacillin Dry Powder for Injection, 500mg, Vial', '500', NULL, NULL, NULL, 'drug_list'),
(115, '81', 0, 0, 1, 0, 'Cromoglycate Eye Drops, 10ml Bottle', 'Cromoglycate Eye Drops, 10ml Bottle', '1200', NULL, NULL, NULL, 'drug_list'),
(116, '82', 0, 0, 1, 0, 'Dexamethasone 0.5% Ointment, 15g tube', 'Dexamethasone 0.5% Ointment, 15g tube', '800', NULL, NULL, NULL, 'drug_list'),
(117, '85', 0, 0, 1, 0, 'Dexamethasone-Gentamicin Eye Drops, 10ml', 'Dexamethasone-Gentamicin Eye Drops, 10ml', '1200', NULL, NULL, NULL, 'drug_list'),
(118, '86', 0, 0, 1, 0, 'Dexamethazone 1% Eye Drops, 10ml', 'Dexamethazone 1% Eye Drops, 10ml', '1000', NULL, NULL, NULL, 'drug_list'),
(119, '87', 0, 0, 1, 0, 'Dexamethazone-Neomycin Eye Drops, 10ml', 'Dexamethazone-Neomycin Eye Drops, 10ml', '1500', NULL, NULL, NULL, 'drug_list'),
(120, '88', 0, 0, 1, 0, 'Dextrose  50% Injection, 50ml Vial', 'Dextrose  50% Injection, 50ml Vial', '2500', NULL, NULL, NULL, 'drug_list'),
(121, '89', 0, 0, 1, 0, 'Dextrose 5% in Normal IV Solution , 500ml', 'Dextrose 5% in Normal IV Solution , 500ml', '600', NULL, NULL, NULL, 'drug_list'),
(122, '90', 0, 0, 1, 0, 'Dextrose 5% IV Solution, 500ml', 'Dextrose 5% IV Solution, 500ml', '700', '0', '0', '0', 'drug_list'),
(123, '91', 0, 0, 1, 0, 'Diazepam Injection 5mg/ml, 2ml Amp', 'Diazepam Injection 5mg/ml, 2ml Amp', '500', NULL, NULL, NULL, 'drug_list'),
(124, '94', 0, 0, 1, 0, 'Diclofenac Gel, 20g Tube', 'Diclofenac Gel, 20g Tube', '3000', '0', '0', '0', 'drug_list'),
(125, '95', 0, 0, 1, 0, 'Diclofenac Sodium Injection 25mg/ml, 3ml Amp', 'Diclofenac Sodium Injection 25mg/ml, 3ml Amp', '500', NULL, NULL, NULL, 'drug_list'),
(126, '119', 0, 0, 1, 0, 'Furosemide Injection 10mg/ml  2ml Amp', 'Furosemide Injection 10mg/ml  2ml Amp', '800', NULL, NULL, NULL, 'drug_list'),
(127, '121', 0, 0, 1, 0, 'Gentamycin 0.5% Eye Drops, 10ml Bottle', 'Gentamycin 0.5% Eye Drops, 10ml Bottle', '1000', NULL, NULL, NULL, 'drug_list'),
(128, '122', 0, 0, 1, 0, 'Gentamycine 40mg/ml Injection, 2ml Amp', 'Gentamycine 40mg/ml Injection, 2ml Amp', '500', NULL, NULL, NULL, 'drug_list'),
(129, '123', 0, 0, 1, 0, 'Gentason Cream (or equivalent), 10g Tube', 'Gentason Cream (or equivalent), 10g Tube', '2000', NULL, NULL, NULL, 'drug_list'),
(130, '131', 0, 0, 1, 0, 'Heparin 5000IU/ml/vial Injection, 10ml', 'Heparin 5000IU/ml/vial Injection, 10ml', '5000', NULL, NULL, NULL, 'drug_list'),
(131, '132', 0, 0, 1, 0, 'Hydralazine Injection 20mg/ml, 1ml Amp', 'Hydralazine Injection 20mg/ml, 1ml Amp', '3000', NULL, NULL, NULL, 'drug_list'),
(132, '135', 0, 0, 1, 0, 'Hydrocortisone 1% Cream, 15g Tube', 'Hydrocortisone 1% Cream, 15g Tube', '1500', '0', '0', '0', 'drug_list'),
(133, '136', 0, 0, 1, 0, 'Hydrocortisone Injection 100mg/vial, Vial', 'Hydrocortisone Injection 100mg/vial, Vial', '800', NULL, NULL, NULL, 'drug_list'),
(134, '137', 0, 0, 1, 0, 'Hyoscine Butylbromide 10mg/ml inj. 2ml Amp', 'Hyoscine Butylbromide 10mg/ml inj. 2ml Amp', '800', NULL, NULL, NULL, 'drug_list'),
(135, '144', 0, 0, 1, 0, 'Insulated Insulin 100iu Injection, 10ml Vial', 'Insulated Insulin 100iu Injection, 10ml Vial', '10000', NULL, NULL, NULL, 'drug_list'),
(136, '149', 0, 0, 1, 0, 'Ketoconazole Cream, 20g Tube', 'Ketoconazole Cream, 20g Tube', '', NULL, NULL, NULL, 'drug_list'),
(137, '159', 0, 0, 1, 0, 'Liniment ALBA Lotion, 100ml', 'Liniment ALBA Lotion, 100ml', '1200', '0', '0', '0', 'drug_list'),
(138, '163', 0, 0, 1, 0, 'Mannitol 20% Injection, 500ml', 'Mannitol 20% Injection, 500ml', '3000', NULL, NULL, NULL, 'drug_list'),
(139, '171', 0, 0, 1, 0, 'Methylprednisolone 40mg/2ml Inj. 2ml Vial', 'Methylprednisolone 40mg/2ml Inj. 2ml Vial', '12000', NULL, NULL, NULL, 'drug_list'),
(140, '173', 0, 0, 1, 0, 'Metronidazole Injection 5mg/ml, 100ml', 'Metronidazole Injection 5mg/ml, 100ml', '1000', NULL, NULL, NULL, 'drug_list'),
(141, '176', 0, 0, 1, 0, 'Morphine 5mg/5ml Syrup, 50ml', 'Morphine 5mg/5ml Syrup, 50ml', '1000', NULL, NULL, NULL, 'drug_list'),
(142, '201', 0, 0, 1, 0, 'Penicillin, Benzathine Benzyl 2.4 MU Dry Powder for Injection, Vial', 'Penicillin, Benzathine Benzyl 2.4 MU Dry Powder for Injection, Vial', '900', '0', '0', '0', 'drug_list'),
(143, '202', 0, 0, 1, 0, 'Penicillin, Benzyl 5 MU Dry Powder for  Inj. Vial', 'Penicillin, Benzyl 5 MU Dry Powder for  Inj. Vial', '800', NULL, NULL, NULL, 'drug_list'),
(144, '203', 0, 0, 1, 0, 'Penicillin, Phenoxymethyl (Pen V) Suspension 125mg/5ml, 100ml', 'Penicillin, Phenoxymethyl (Pen V) Suspension 125mg/5ml, 100ml', '1000', NULL, NULL, NULL, 'drug_list'),
(145, '204', 0, 0, 1, 0, 'Penicillin, Phenoxymethyl (Pen V) Tablet 250mg', 'Penicillin, Phenoxymethyl (Pen V) Tablet 250mg', '40', '0', '0', '0', 'drug_list'),
(146, '205', 0, 0, 1, 0, 'Penicillin, Procaine Benzyl 1MU/vial Inj. Vial', 'Penicillin, Procaine Benzyl 1MU/vial Inj. Vial', '', NULL, NULL, NULL, 'drug_list'),
(147, '206', 0, 0, 1, 0, 'Penicillin, Procaine Fortified 4mu/vial Inj. Vial', 'Penicillin, Procaine Fortified 4mu/vial Inj. Vial', '500', NULL, NULL, NULL, 'drug_list'),
(148, '207', 0, 0, 1, 0, 'Pethidine 100mg/2ml Inj. 2ml Ampoule', 'Pethidine 100mg/2ml Inj. 2ml Ampoule', '1000', NULL, NULL, NULL, 'drug_list'),
(149, '208', 0, 0, 1, 0, 'Pethidine 50mg//1ml Injection, 1ml Amp', 'Pethidine 50mg//1ml Injection, 1ml Amp', '800', NULL, NULL, NULL, 'drug_list'),
(150, '215', 0, 0, 1, 0, 'Prednisolone Eye 1% Eye Drops, 5ml Bottle', 'Prednisolone Eye 1% Eye Drops, 5ml Bottle', '1000', NULL, NULL, NULL, 'drug_list'),
(151, '219', 0, 0, 1, 0, 'Promethazine Injection 25mg/ml, 2ml Amp', 'Promethazine Injection 25mg/ml, 2ml Amp', '700', '0', '0', '0', 'drug_list'),
(152, '226', 0, 0, 1, 0, 'Quinine Dihydrocloride 300mg/ml Inj. 2ml Amp', 'Quinine Dihydrocloride 300mg/ml Inj. 2ml Amp', '500', NULL, NULL, NULL, 'drug_list'),
(153, '234', 0, 0, 1, 0, 'Silver Sulfadiazine 1% Cream, 50g Tube', 'Silver Sulfadiazine 1% Cream, 50g Tube', '2000', NULL, NULL, NULL, 'drug_list'),
(154, '235', 0, 0, 1, 0, 'Sodium Chloride 0.9% IV Solutiion, 500ml', 'Sodium Chloride 0.9% IV Solutiion, 500ml', '600', NULL, NULL, NULL, 'drug_list'),
(155, '236', 0, 0, 1, 0, 'Sodium Lactate (Ringer Lactate) IV Solution, 500ml', 'Sodium Lactate (Ringer Lactate) IV Solution, 500ml', '700', '0', '0', '0', 'drug_list'),
(156, '247', 0, 0, 1, 0, 'Thiopental Sodium Injection 500mg, Vial', 'Thiopental Sodium Injection 500mg, Vial', '3000', NULL, NULL, NULL, 'drug_list'),
(157, '250', 0, 0, 1, 0, 'Tinidazole  Tablet 500mg', 'Tinidazole  Tablet 500mg', '200', '0', '0', '0', 'drug_list'),
(158, '256', 0, 0, 1, 0, 'Verapamil Tablet 40mg', 'Verapamil Tablet 40mg', '50', NULL, NULL, NULL, 'drug_list'),
(159, '260', 0, 0, 1, 0, 'Vitamin B Complex Syrup, 100ml', 'Vitamin B Complex Syrup, 100ml', '1000', NULL, NULL, NULL, 'drug_list'),
(160, '266', 0, 0, 1, 0, 'Vitamin K1 (Phytomenadione) 10mg/tab', 'Vitamin K1 (Phytomenadione) 10mg/tab', '800', NULL, NULL, NULL, 'drug_list'),
(161, '4', 1, 0, 0, 0, 'Bifanazole 1% Cream, 20g Tube', 'Bifanazole 1% Cream, 20g Tube', '7000', NULL, NULL, NULL, 'special_others_list'),
(162, '7', 0, 0, 1, 0, 'Activated Charcoal 125mg/tab', 'Activated Chacoal 125mg/tab', '60', '0', '0', '0', 'special_others_list'),
(163, '12', 0, 0, 1, 0, 'Fluphenazine Decanoate Injection 25mg/ml, 10ml Vial', 'Fluphenazine Decanoate Injection 25mg/ml, 10ml Vial', '4500', '0', '0', '0', 'special_others_list'),
(164, '14', 0, 0, 1, 0, 'Insulin Actrapid HM 100 IU Inj, 10ml Vial', 'Insulin Actrapid HM 100 IU Inj, 10ml Vial', '', NULL, NULL, NULL, 'special_others_list'),
(165, '16', 0, 0, 1, 0, 'Levamisole Suspension 40mg/5ml, 10ml Bottle', 'Levamisole Suspension 40mg/5ml, 10ml Bottle', '', NULL, NULL, NULL, 'special_others_list'),
(166, '19', 0, 0, 1, 0, 'Norfloxacin Eye Drops, 5ml  Bottler', 'Norfloxacin Eye Drops, 5ml  Bottler', '1500', NULL, NULL, NULL, 'special_others_list'),
(167, '22', 0, 0, 1, 0, 'Pilocarpine Nitrate Eye Drops, 2% , 10ml Bottle', 'Pilocarpine Nitrate Eye Drops, 2% , 10ml Bottle', '3000', NULL, NULL, NULL, 'special_others_list'),
(168, '13', 0, 0, 0, 1, 'Bandage, Crepe, 10 cm (4', 'Bandage, Crepe, 10 cm (4") roll', '1200', '0', '0', '0', 'supplies'),
(169, '14', 0, 0, 0, 1, 'Bandage, Crepe, 6cm (2.5")  roll', 'Bandage, Crepe, 6cm (2.5")  roll', '', NULL, NULL, NULL, 'supplies'),
(170, '15', 0, 0, 0, 1, 'Bandage, Elastic Adhesive, 4cm x 4m, roll', 'Bandage, Elastic Adhesive, 4cm x 4m, roll', '1500', NULL, NULL, NULL, 'supplies'),
(171, '43', 0, 0, 0, 1, 'Catheter, Foley balloon,   5-15ml, 18G, sterile, 2-way', 'Catheter, Foley balloon,   5-15ml, 18G, sterile, 2-way', '1200', NULL, NULL, NULL, 'supplies'),
(172, '44', 0, 0, 0, 1, 'Catheter, Foley Balloon,  5-15ml, 6G, sterile, 2-way', 'Catheter, Foley Balloon,  5-15ml, 6G, sterile, 2-way', '1500', NULL, NULL, NULL, 'supplies'),
(173, '45', 0, 0, 0, 1, 'Catheter, Foley balloon, 30cc, 16G, 2-way, sterile', 'Catheter, Foley balloon, 30cc, 16G, 2-way, sterile', '1000', NULL, NULL, NULL, 'supplies'),
(174, '46', 0, 0, 0, 1, 'Catheter, Foley balloon, 30cc, 20G, 3-way, Sterile', 'Catheter, Foley balloon, 30cc, 20G, 3-way, Sterile', '5000', NULL, NULL, NULL, 'supplies'),
(175, '47', 0, 0, 0, 1, 'Catheter, Foley balloon, 30cc, 20G, 3-way, Sterile', 'Catheter, Foley balloon, 30cc, 20G, 3-way, Sterile', '5000', NULL, NULL, NULL, 'supplies'),
(176, '48', 0, 0, 0, 1, 'Catheter, Foley balloon, 5-15ml, 16G, 2-way, Sterile', 'Catheter, Foley balloon, 5-15ml, 16G, 2-way, Sterile', '1200', NULL, NULL, NULL, 'supplies'),
(177, '49', 0, 0, 0, 1, 'Catheter, Foley balloon, 5-15ml, 22G, sterile, 2-way', 'Catheter, Foley balloon, 5-15ml, 22G, sterile, 2-way', '1500', NULL, NULL, NULL, 'supplies'),
(178, '50', 0, 0, 0, 1, 'Catheter, Foley balloon, 5-15ml, 26G, 2-way, sterile', 'Catheter, Foley balloon, 5-15ml, 26G, 2-way, sterile', '1500', NULL, NULL, NULL, 'supplies'),
(179, '51', 0, 0, 0, 1, 'Catheter, Foley balloon, 5-15ml, 2-way, 18G, sterile', 'Catheter, Foley balloon, 5-15ml, 2-way, 18G, sterile', '1200', NULL, NULL, NULL, 'supplies'),
(180, '52', 0, 0, 0, 1, 'Catheter, Foley balloon, 5-15ml,20G, sterile, 2-way', 'Catheter, Foley balloon, 5-15ml,20G, sterile, 2-way', '1500', NULL, NULL, NULL, 'supplies'),
(181, '53', 0, 0, 0, 1, 'Catheter,Foley balloon,  30cc, 18G, 2-way, Sterile', 'Catheter,Foley balloon,  30cc, 18G, 2-way, Sterile', '1200', NULL, NULL, NULL, 'supplies'),
(182, '54', 0, 0, 0, 1, 'Catheter,Foley balloon,  30cc, 24G, sterile, 2-way', 'Catheter,Foley balloon,  30cc, 24G, sterile, 2-way', '1500', NULL, NULL, NULL, 'supplies'),
(183, '55', 0, 0, 0, 1, 'Catheter,Foley balloon,  5-15ml, 14G, 2-way, Sterile', 'Catheter,Foley balloon,  5-15ml, 14G, 2-way, Sterile', '1200', NULL, NULL, NULL, 'supplies'),
(184, '56', 0, 0, 0, 1, 'Chlorhexidine + Cetrimide Solution, 5L', 'Chlorhexidine + Cetrimide Solution, 5L', '15000', NULL, NULL, NULL, 'supplies'),
(185, '61', 0, 0, 0, 1, 'Contrast Media Injection, Vial, 10 ml,  Vial', 'Contrast Media Injection, Vial, 10 ml,  Vial', '8000', NULL, NULL, NULL, 'supplies'),
(186, '121', 0, 0, 0, 1, 'I.V. Butterfly set, 23G, sterile, P/100', 'I.V. Butterfly set, 23G, sterile, P/100', '20000', NULL, NULL, NULL, 'supplies'),
(187, '122', 0, 0, 0, 1, 'I.V. Butterfly set, 25G, sterile, P/100', 'I.V. Butterfly set, 25G, sterile, P/100', '20000', NULL, NULL, NULL, 'supplies'),
(188, '123', 0, 0, 0, 1, 'I.V. Cannula, 14G, sterile, P/100', 'I.V. Cannula, 14G, sterile, P/100', '50000', NULL, NULL, NULL, 'supplies'),
(189, '124', 0, 0, 0, 1, 'I.V. Cannula, 16G, sterile, P/100', 'I.V. Cannula, 16G, sterile, P/100', '50000', NULL, NULL, NULL, 'supplies'),
(190, '125', 0, 0, 0, 1, 'I.V. Cannula, 18G, sterile, P/100', 'I.V. Cannula, 18G, sterile, P/100', '50000', NULL, NULL, NULL, 'supplies'),
(191, '126', 0, 0, 0, 1, 'I.V. Cannula, 20G, sterile, P/100', 'I.V. Cannula, 20G, sterile, P/100', '50000', NULL, NULL, NULL, 'supplies'),
(192, '127', 0, 0, 0, 1, 'I.V. Cannula, 22G, sterile, P/100', 'I.V. Cannula, 22G, sterile, P/100', '50000', NULL, NULL, NULL, 'supplies'),
(193, '128', 0, 0, 0, 1, 'I.V. Cannula, 24G, sterile, P/100', 'I.V. Cannula, 24G, sterile, P/100', '50000', NULL, NULL, NULL, 'supplies'),
(194, '129', 0, 0, 0, 1, 'I.V. Giving Set, sterile, P/100', 'I.V. Giving Set, sterile, P/100', '40000', NULL, NULL, NULL, 'supplies'),
(195, '130', 0, 0, 0, 1, 'Iodine Tincture, 100ml', 'Iodine Tincture, 100ml', '1200', NULL, NULL, NULL, 'supplies'),
(196, '139', 0, 0, 0, 1, 'Nasogastric Tube,  6G, sterile, each', 'Nasogastric Tube,  6G, sterile, each', '500', NULL, NULL, NULL, 'supplies'),
(197, '140', 0, 0, 0, 1, 'Nasogastric Tube,  8G, sterile, each', 'Nasogastric Tube,  8G, sterile, each', '500', NULL, NULL, NULL, 'supplies'),
(198, '141', 0, 0, 0, 1, 'Nasogastric Tube, 10G, sterile, each', 'Nasogastric Tube, 10G, sterile, each', '1000', NULL, NULL, NULL, 'supplies'),
(199, '142', 0, 0, 0, 1, 'Nasogastric Tube, 14G, sterile, each', 'Nasogastric Tube, 14G, sterile, each', '800', NULL, NULL, NULL, 'supplies'),
(200, '143', 0, 0, 0, 1, 'Nasogastric Tube, 16G, sterile, each', 'Nasogastric Tube, 16G, sterile, each', '1000', NULL, NULL, NULL, 'supplies'),
(201, '144', 0, 0, 0, 1, 'Nasogastric Tube, 18G, sterile, each', 'Nasogastric Tube, 18G, sterile, each', '1000', NULL, NULL, NULL, 'supplies'),
(202, '145', 0, 0, 0, 1, 'Nasogastric Tube, 22G, sterile, each', 'Nasogastric Tube, 22G, sterile, each', '1000', NULL, NULL, NULL, 'supplies'),
(203, '146', 0, 0, 0, 1, 'Needle, disposable, hypodermic,  20G, sterile, P/100pcs', 'Needle, disposable, hypodermic,  20G, sterile, P/100pcs', '12000', NULL, NULL, NULL, 'supplies'),
(204, '183', 0, 0, 0, 1, 'Suction Catheter, sterile, G 12, each', 'Suction Catheter, sterile, G 12, each', '1200', NULL, NULL, NULL, 'supplies'),
(205, '184', 0, 0, 0, 1, 'Suction Catheter, sterile, G 14, each', 'Suction Catheter, sterile, G 14, each', '1500', NULL, NULL, NULL, 'supplies'),
(206, '185', 0, 0, 0, 1, 'Suction Catheter, sterile, G 16, each', 'Suction Catheter, sterile, G 16, each', '1500', NULL, NULL, NULL, 'supplies'),
(207, '186', 0, 0, 0, 1, 'Suction Catheter, sterile, G 18, each', 'Suction Catheter, sterile, G 18, each', '1500', NULL, NULL, NULL, 'supplies'),
(208, '187', 0, 0, 0, 1, 'Suction Catheter, sterile, G 20, each', 'Suction Catheter, sterile, G 20, each', '1500', NULL, NULL, NULL, 'supplies'),
(209, '188', 0, 0, 0, 1, 'Suction Catheter, sterile, G 6, each', 'Suction Catheter, sterile, G 6, each', '1200', NULL, NULL, NULL, 'supplies'),
(210, '189', 0, 0, 0, 1, 'Suction Catheter, sterile, G 8, each', 'Suction Catheter, sterile, G 8, each', '1200', NULL, NULL, NULL, 'supplies'),
(211, '190', 0, 0, 0, 1, 'Suction Catheter, sterile, G22, each', 'Suction Catheter, sterile, G22, each', '1500', NULL, NULL, NULL, 'supplies'),
(212, '191', 0, 0, 0, 1, 'Surgical Blade, size 10, sterile, P/100pcs', 'Surgical Blade, size 10, sterile, P/100pcs', '10000', NULL, NULL, NULL, 'supplies'),
(213, '211', 0, 0, 0, 1, 'Syringe Disposable, 5cc, sterile, P/100pcs', 'Syringe Disposable, 5cc, sterile, P/100pcs', '6000', NULL, NULL, NULL, 'supplies'),
(214, '212', 0, 0, 0, 1, 'Syringe disposable, 60 cc, sterile, each', 'Syringe disposable, 60 cc, sterile, each', '1500', NULL, NULL, NULL, 'supplies'),
(215, '213', 0, 0, 0, 1, 'Syringe,  disp., with 21G needle, 3 cc, sterile, P/100pcs', 'Syringe,  disp., with 21G needle, 3 cc, sterile, P/100pcs', '4500', NULL, NULL, NULL, 'supplies'),
(216, '214', 0, 0, 0, 1, 'Syringe, disposable with 21G needle, 2cc, P/100pcs', 'Syringe, disposable with 21G needle, 2cc, P/100pcs', '5000', NULL, NULL, NULL, 'supplies'),
(217, '215', 0, 0, 0, 1, 'Syringe, disposable with 21G needle, 5cc, sterile, P/100pcs', 'Syringe, disposable with 21G needle, 5cc, sterile, P/100pcs', '6000', NULL, NULL, NULL, 'supplies'),
(218, '216', 0, 0, 0, 1, 'Syringe, disposable with 21G needle,10 cc, sterile , P/100pcs', 'Syringe, disposable with 21G needle,10 cc, sterile , P/100pcs', '7500', NULL, NULL, NULL, 'supplies'),
(219, '217', 0, 0, 0, 1, 'Syringe, Disposable with 23G needle, 5cc, sterile, P/100pcs', 'Syringe, Disposable with 23G needle, 5cc, sterile, P/100pcs', '6000', NULL, NULL, NULL, 'supplies'),
(220, '218', 0, 0, 0, 1, 'Syringe, disposable with needle, Insulin, 100 IU, P/100pcs', 'Syringe, disposable with needle, Insulin, 100 IU, P/100pcs', '10000', NULL, NULL, NULL, 'supplies'),
(221, '219', 0, 0, 0, 1, 'Syringe, disposable with needle, Insulin, 40 IU, P/100pcs', 'Syringe, disposable with needle, Insulin, 40 IU, P/100pcs', '10000', NULL, NULL, NULL, 'supplies'),
(222, '220', 0, 0, 0, 1, 'Syringe, disposable, 2 cc, sterile, P/100pcs', 'Syringe, disposable, 2 cc, sterile, P/100pcs', '', NULL, NULL, NULL, 'supplies'),
(223, '221', 0, 0, 0, 1, 'Syringe, disposable, 20 cc, sterile, P/100pcs', 'Syringe, disposable, 20 cc, sterile, P/100pcs', '', NULL, NULL, NULL, 'supplies'),
(224, '222', 0, 0, 0, 1, 'Syringe, disposable, 50 cc, sterile, each', 'Syringe, disposable, 50 cc, sterile, each', '', NULL, NULL, NULL, 'supplies'),
(225, '223', 0, 0, 0, 1, 'Tape, Adhesive Sterile 10 cm x 5cm', 'Tape, Adhesive Sterile 10 cm x 5cm', '300', NULL, NULL, NULL, 'supplies'),
(226, '6', 0, 0, 0, 0, 'Allopurinol Tablet 100mg', 'Allopurinol Tablet 100mg', '100', '0', '0', '0', 'drug_list'),
(227, '7', 0, 0, 0, 0, 'Aluminium Hydroxide Tablet 500mg', 'Aluminium Hydroxide Tablet 500mg', '', NULL, NULL, NULL, 'drug_list'),
(228, '17', 0, 0, 0, 0, 'Ampicilin-Cloxacillin Capsule 250mg+250mg  Cap', 'Ampicilin-Cloxacillin Capsule 250mg+250mg  Cap', '50', NULL, NULL, NULL, 'drug_list'),
(229, '26', 0, 0, 0, 0, 'Artemether Tablet 50mg', 'Artemether Tablet 50mg', '7000', NULL, NULL, NULL, 'drug_list'),
(230, '29', 0, 0, 0, 0, 'Atenolol Tablets 100mg', 'Atenolol Tablets 100mg', '100', NULL, NULL, NULL, 'drug_list'),
(231, '30', 0, 0, 0, 0, 'Atropine Sulphate 1mg/ml Injection , Amp', 'Atropine Sulphate 1mg/ml Injection , Amp', '500', NULL, NULL, NULL, 'drug_list'),
(232, '37', 0, 0, 0, 0, 'Bisacodyl Suppositories, each', 'Bisacodyl Suppositories, each', '1200', NULL, NULL, NULL, 'drug_list'),
(233, '41', 0, 0, 0, 0, 'Bupivacaine 0.5% Injection, 20 ml', 'Bupivacaine 0.5% Injection, 20 ml', '5000', NULL, NULL, NULL, 'drug_list'),
(234, '42', 0, 0, 0, 0, 'Calamine Lotion, 100 ml', 'Calamine Lotion, 100 ml', '1000', '0', '0', '0', 'drug_list'),
(235, '43', 0, 0, 0, 0, 'Calcium Gluconate Injection 100mg/ml, 10ml Amp', 'Calcium Gluconate Injection 100mg/ml, 10ml Amp', '1000', '0', '0', '0', 'drug_list'),
(236, '44', 0, 0, 0, 0, 'Calcium Lactate Tablet 300mg', 'Calcium Lactate Tablet 300mg', '20', NULL, NULL, NULL, 'drug_list'),
(237, '60', 0, 0, 0, 0, 'Chlorpheniramine Injection 10mg/ml, Ampoule', 'Chlorpheniramine Injection 10mg/ml, Ampoule', '500', NULL, NULL, NULL, 'drug_list'),
(238, '64', 0, 0, 0, 0, 'Chlorpromazine Injection 25mg/ml , 2ml Ampoule', 'Chlorpromazine Injection 25mg/ml , 2ml Ampoule', '500', NULL, NULL, NULL, 'drug_list'),
(239, '65', 0, 0, 0, 0, 'Chlorpromazine Table 25mg', 'Chlorpromazine Table 25mg', '30', '0', '0', '0', 'drug_list'),
(240, '77', 0, 0, 0, 0, 'Codeine Phosphate 30mg Tablet', 'Codeine Phosphate 30mg Tablet', '', NULL, NULL, NULL, 'drug_list'),
(241, '83', 0, 0, 0, 0, 'Dexamethasone Injection 4mg/2ml, 2ml Amp', 'Dexamethasone Injection 4mg/2ml, 2ml Amp', '1000', '0', '0', '0', 'drug_list'),
(242, '84', 0, 0, 0, 0, 'Dexamethasone Tablet 0.5mg', 'Dexamethasone Tablet 0.5mg', '25', NULL, NULL, NULL, 'drug_list'),
(243, '93', 0, 0, 0, 0, 'Diclofenac Cream, 20g Tube', 'Diclofenac Cream, 20g Tube', '3000', NULL, NULL, NULL, 'drug_list'),
(244, '96', 0, 0, 0, 0, 'Diclofenac Sodium Tablet 25mg', 'Diclofenac Sodium Tablet 25mg', '', NULL, NULL, NULL, 'drug_list'),
(245, '98', 0, 0, 0, 0, 'Digoxin Injection  0.25mg/ml, 2ml Amp', 'Digoxin Injection  0.25mg/ml, 2ml Amp', '800', NULL, NULL, NULL, 'drug_list'),
(246, '100', 0, 0, 0, 0, 'Diltiazem HCL 60mg Tablets', 'Diltiazem HCL 60mg Tablets', '70', NULL, NULL, NULL, 'drug_list'),
(247, '104', 0, 0, 0, 0, 'Ephedrine Injection 30mg/ml, 1ml Amp', 'Ephedrine Injection 30mg/ml, 1ml Amp', '500', NULL, NULL, NULL, 'drug_list'),
(248, '105', 0, 0, 0, 0, 'Ephedrine Sulphate Injection 50mg/ml, Vial', 'Ephedrine Sulphate Injection 50mg/ml, Vial', '', NULL, NULL, NULL, 'drug_list'),
(249, '106', 0, 0, 0, 0, 'Ephedrine Tablet 30mg', 'Ephedrine Tablet 30mg', '10', NULL, NULL, NULL, 'drug_list'),
(250, '107', 0, 0, 0, 0, 'Ergometrine Maleate Injection  0.5mg/ml, 1ml Amp', 'Ergometrine Maleate Injection  0.5mg/ml, 1ml Amp', '500', NULL, NULL, NULL, 'drug_list'),
(251, '111', 0, 0, 0, 0, 'Ether pro Inhalation, 500ml', 'Ether pro Inhalation, 500ml', '5000', NULL, NULL, NULL, 'drug_list'),
(252, '112', 0, 0, 0, 0, 'Etofenamate Cream 5% , 50g Tube', 'Etofenamate Cream 5% , 50g Tube', '4500', NULL, NULL, NULL, 'drug_list'),
(253, '113', 0, 0, 0, 0, 'Ferrous Salt (Eqv 60mg Iron) 200mg/tab', 'Ferrous Salt (Eqv 60mg Iron) 200mg/tab', '10', NULL, NULL, NULL, 'drug_list'),
(254, '115', 0, 0, 0, 0, 'Fluconazole Injection 2mg/ml, 100ml', 'Fluconazole Injection 2mg/ml, 100ml', '5000', NULL, NULL, NULL, 'drug_list'),
(255, '117', 0, 0, 0, 0, 'Fluorescein Sodium Eye Drops 2% , 2ml Amp', 'Fluorescein Sodium Eye Drops 2% , 2ml Amp', '1000', NULL, NULL, NULL, 'drug_list'),
(256, '125', 0, 0, 0, 0, 'Glycerine Medicinal, 100ml', 'Glycerine Medicinal, 100ml', '', NULL, NULL, NULL, 'drug_list'),
(257, '126', 0, 0, 0, 0, 'Glyceryl Trinitrate (Nitroglycerin) 0.5mg, Sub-lingual Tablet', 'Glyceryl Trinitrate (Nitroglycerin) 0.5mg, Sub-lingual Tablet', '400', NULL, NULL, NULL, 'drug_list'),
(258, '130', 0, 0, 0, 0, 'Halothane Spray for Inhalation , 250ml Can', 'Halothane Spray for Inhalation , 250ml Can', '30000', '0', '0', '0', 'drug_list'),
(259, '138', 0, 0, 0, 0, 'Hyoscine Butylbromide Syrup, 60ml', 'Hyoscine Butylbromide Syrup, 60ml', '1000', NULL, NULL, NULL, 'drug_list'),
(260, '145', 0, 0, 0, 0, 'Insulin Soluble 100iu/ml Injection , 10ml Vial', 'Insulin Soluble 100iu/ml Injection , 10ml Vial', '12000', NULL, NULL, NULL, 'drug_list'),
(261, '146', 0, 0, 0, 0, 'Iron Dextran Injection 50mg, 2ml Amp', 'Iron Dextran Injection 50mg, 2ml Amp', '1000', NULL, NULL, NULL, 'drug_list'),
(262, '147', 0, 0, 0, 0, 'Isosorbide Dinitrate 20mg Tablets', 'Isosorbide Dinitrate 20mg Tablets', '100', NULL, NULL, NULL, 'drug_list'),
(263, '148', 0, 0, 0, 0, 'Ketamine Injection 50mg/ml, 10ml Vial', 'Ketamine Injection 50mg/ml, 10ml Vial', '1500', NULL, NULL, NULL, 'drug_list'),
(264, '151', 0, 0, 0, 0, 'Levamisole 40mg Tablets', 'Levamisole 40mg Tablets', '10', NULL, NULL, NULL, 'drug_list'),
(265, '152', 0, 0, 0, 0, 'Levothyroxin Tablets 50mcg', 'Levothyroxin Tablets 50mcg', '50', NULL, NULL, NULL, 'drug_list'),
(266, '153', 0, 0, 0, 0, 'Lidocaine HCL  Gel, 20g Tube', 'Lidocaine HCL  Gel, 20g Tube', '1500', NULL, NULL, NULL, 'drug_list'),
(267, '154', 0, 0, 0, 0, 'Lidocaine HCL 1% Injection, 50ml Vial', 'Lidocaine HCL 1% Injection, 50ml Vial', '800', NULL, NULL, NULL, 'drug_list'),
(268, '155', 0, 0, 0, 0, 'Lidocaine HCL 2% Injection, 50ml Vial', 'Lidocaine HCL 2% Injection, 50ml Vial', '1000', NULL, NULL, NULL, 'drug_list'),
(269, '156', 0, 0, 0, 0, 'Lidocaine HCL-Dextrose 5% Injection, 2ml Amp', 'Lidocaine HCL-Dextrose 5% Injection, 2ml Amp', '800', NULL, NULL, NULL, 'drug_list'),
(270, '157', 0, 0, 0, 0, 'Lignocaine HCL 2% Spray, 50ml Bottle', 'Lignocaine HCL 2% Spray, 50ml Bottle', '25000', NULL, NULL, NULL, 'drug_list'),
(271, '158', 0, 0, 0, 0, 'Lignocaine HCL-Adrenaline 2% Inj. 50ml Vial', 'Lignocaine HCL-Adrenaline 2% Inj. 50ml Vial', '1200', NULL, NULL, NULL, 'drug_list'),
(272, '166', 0, 0, 0, 0, 'Mefenamic Acid Tablet 250mg', 'Mefenamic Acid Tablet 250mg', '100', '0', '0', '0', 'drug_list'),
(273, '167', 0, 0, 0, 0, 'Mefloquine Table 250mg', 'Mefloquine Table 250mg', '1000', NULL, NULL, NULL, 'drug_list'),
(274, '169', 0, 0, 0, 0, 'Methyl Salicylate Cream, 20g Tube', 'Methyl Salicylate Cream, 20g Tube', '1000', NULL, NULL, NULL, 'drug_list'),
(275, '177', 0, 0, 0, 0, 'Morphine Sulphate Injection 10mg/ml, Amp', 'Morphine Sulphate Injection 10mg/ml, Amp', '500', NULL, NULL, NULL, 'drug_list'),
(276, '180', 0, 0, 0, 0, 'Nalidixic Acid 500mg tab', 'Nalidixic Acid 500mg tab', '100', NULL, NULL, NULL, 'drug_list'),
(277, '181', 0, 0, 0, 0, 'Naloxone HCl Injection 0.4mg/ml, 1ml Amp', 'Naloxone HCl Injection 0.4mg/ml, 1ml Amp', '4000', NULL, NULL, NULL, 'drug_list'),
(278, '182', 0, 0, 0, 0, 'Neostigmine Methylsulfate 0.25mg/ml, Amp', 'Neostigmine Methylsulfate 0.25mg/ml, Amp', '800', NULL, NULL, NULL, 'drug_list'),
(279, '183', 0, 0, 0, 0, 'Neostigmine Methylsulfate Injection 0.5mg/ml, Amp', 'Neostigmine Methylsulfate Injection 0.5mg/ml, Amp', '', NULL, NULL, NULL, 'drug_list'),
(280, '184', 0, 0, 0, 0, 'Neurobion Injection (or equivalent), Vial', 'Neurobion Injection (or equivalent), Vial', '800', NULL, NULL, NULL, 'drug_list'),
(281, '185', 0, 0, 0, 0, 'Niclosamide 500mg Tablets', 'Niclosamide 500mg Tablets', '100', '0', '0', '0', 'drug_list'),
(282, '195', 0, 0, 0, 0, 'Oxytocin 5iu/ml Injection, Ampoule', 'Oxytocin 5iu/ml Injection, Ampoule', '500', NULL, NULL, NULL, 'drug_list'),
(283, '196', 0, 0, 0, 0, 'Pancuronium Bromide Injection 2mg/ml, 2ml Amp', 'Pancuronium Bromide Injection 2mg/ml, 2ml Amp', '3000', NULL, NULL, NULL, 'drug_list'),
(284, '209', 0, 0, 0, 0, 'Phenobarbitone Injection 100mg/ml, 2ml Amp', 'Phenobarbitone Injection 100mg/ml, 2ml Amp', '1500', '0', '0', '0', 'drug_list'),
(285, '212', 0, 0, 0, 0, 'Piroxicam Tablet 20mg Tablets', 'Piroxicam Tablet 20mg Tablets', '20', NULL, NULL, NULL, 'drug_list'),
(286, '213', 0, 0, 0, 0, 'Potassium Chloride (Sustained Release) Tablet 600mg', 'Potassium Chloride (Sustained Release) Tablet 600mg', '50', NULL, NULL, NULL, 'drug_list'),
(287, '214', 0, 0, 0, 0, 'Praziquintel 600mg Tablets', 'Praziquintel 600mg Tablets', '200', NULL, NULL, NULL, 'drug_list'),
(288, '217', 0, 0, 0, 0, 'Proguanil Tablet 100mg', 'Proguanil Tablet 100mg', '120', NULL, NULL, NULL, 'drug_list'),
(289, '221', 0, 0, 0, 0, 'Propanthelline Tablet 15mg', 'Propanthelline Tablet 15mg', '', NULL, NULL, NULL, 'drug_list'),
(290, '223', 0, 0, 0, 0, 'Prostaglandin E2 tabs', 'Prostaglandin E2 tabs', '2000', NULL, NULL, NULL, 'drug_list'),
(291, '224', 0, 0, 0, 0, 'Quinapril Tablet 20mg', 'Quinapril Tablet 20mg', '', NULL, NULL, NULL, 'drug_list'),
(292, '229', 0, 0, 0, 0, 'Reserpine Tablets 0.25mg', 'Reserpine Tablets 0.25mg', '', NULL, NULL, NULL, 'drug_list'),
(293, '233', 0, 0, 0, 0, 'Silver Nitrate  Stick, Pack of 10', 'Silver Nitrate  Stick, Pack of 10', '3500', '0', '0', '0', 'drug_list'),
(294, '237', 0, 0, 0, 0, 'Spironolactone Tablet 25mg', 'Spironolactone Tablet 25mg', '90', NULL, NULL, NULL, 'drug_list'),
(295, '238', 0, 0, 0, 0, 'Spironolactone Table 100mg', 'Spironolactone Table 100mg', '100', '0', '0', '0', 'drug_list'),
(296, '240', 0, 0, 0, 0, 'Sulphadoxine-Pyrimethamine 500mg+25mg Tablet', 'Sulphadoxine-Pyrimethamine 500mg+25mg Tablet', '200', NULL, NULL, NULL, 'drug_list'),
(297, '244', 0, 0, 0, 0, 'Tetanus Toxoid (Single dose) 1ml Amp', 'Tetanus Toxoid (Single dose) 1ml Amp', '1500', NULL, NULL, NULL, 'drug_list'),
(298, '245', 0, 0, 0, 0, 'Tetracycline Capsule 250mg', 'Tetracycline Capsule 250mg', '30', '0', '0', '0', 'drug_list'),
(299, '248', 0, 0, 0, 0, 'Thioridazine Tablet 100mg', 'Thioridazine Tablet 100mg', '20', NULL, NULL, NULL, 'drug_list'),
(300, '252', 0, 0, 0, 0, 'Tramadol Capsule 50mg', 'Tramadol Capsule 50mg', '300', '0', '0', '0', 'drug_list'),
(301, '254', 0, 0, 0, 0, 'Tramadol HCl Injection 50mg/ml, 2ml Ampoule', 'Tramadol HCl Injection 50mg/ml, 2ml Ampoule', '2000', NULL, NULL, NULL, 'drug_list'),
(302, '255', 0, 0, 0, 0, 'Triple Antibiotic (N+P+B) Ointment, 10g Tube', 'Triple Antibiotic (N+P+B) Ointment, 10g Tube', '2000', NULL, NULL, NULL, 'drug_list'),
(303, '258', 0, 0, 0, 0, 'Vitamin A Capsule 200000IU', 'Vitamin A Capsule 200000IU', '50', NULL, NULL, NULL, 'drug_list'),
(304, '263', 0, 0, 0, 0, 'Vitamin C (Ascorbic Acid) 100mg/tab', 'Vitamin C (Ascorbic Acid) 100mg/tab', '10', NULL, NULL, NULL, 'drug_list'),
(305, '265', 0, 0, 0, 0, 'Vitamin K 1 (Phytomenadione) 10mg/ml, 1ml Amp', 'Vitamin K 1 (Phytomenadione) 10mg/ml, 1ml Amp', '2500', '0', '0', '0', 'drug_list'),
(306, '267', 0, 0, 0, 0, 'Warfarin Tablet 5mg', 'Warfarin Tablet 5mg', '200', '0', '0', '0', 'drug_list'),
(307, '268', 0, 0, 0, 0, 'Water For Injection, 5ml', 'Water For Injection, 5ml', '50', NULL, NULL, NULL, 'drug_list'),
(308, '269', 0, 0, 0, 0, 'Water For Injection 10ml/amp (INJ), 10ml', 'Water For Injection 10ml/amp (INJ), 10ml', '100', NULL, NULL, NULL, 'drug_list'),
(309, '1', 0, 0, 0, 0, 'Acetic acid,  glacial, GPR grade, 100ml', 'Acetic acid,  glacial, GPR grade, 100ml', '', NULL, NULL, NULL, 'supplies'),
(310, '2', 0, 0, 0, 0, 'Acetone, Technical grade, 500ml', 'Acetone, Technical grade, 500ml', '', NULL, NULL, NULL, 'supplies'),
(311, '3', 0, 0, 0, 0, 'Albumin & Glucose in Urine, reagent strips, 50 strips', 'Albumin & Glucose in Urine, reagent strips, 50 strips', '5000', NULL, NULL, NULL, 'supplies'),
(312, '4', 0, 0, 0, 0, 'Alcohol Disinfectant, Sterilium, 70% Propanol + detergent, 1 Litre', 'Alcohol Disinfectant, Sterilium, 70% Propanol + detergent, 1 Litre', '', NULL, NULL, NULL, 'supplies'),
(313, '5', 0, 0, 0, 0, 'Anti Human Globulin Serum, 10 ml', 'Anti Human Globulin Serum, 10 ml', '', NULL, NULL, NULL, 'supplies'),
(314, '6', 0, 0, 0, 0, 'Applicator stick with swab, sterile, 100 pcs', 'Applicator stick with swab, sterile, 100 pcs', '', NULL, NULL, NULL, 'supplies'),
(315, '7', 0, 0, 0, 0, 'Applicator stick, with swab,(non sterile) , 100pcs', 'Applicator stick, with swab,(non sterile) , 100pcs', '', NULL, NULL, NULL, 'supplies'),
(316, '8', 0, 0, 0, 0, 'Applicator stick, without swab, wood, 500pcs', 'Applicator stick, without swab, wood, 500pcs', '', NULL, NULL, NULL, 'supplies'),
(317, '9', 0, 0, 0, 0, 'Bag, blood collecting, 250 ml,   5 bags Pack', 'Bag, blood collecting, 250 ml,   5 bags Pack', '2000', NULL, NULL, NULL, 'supplies'),
(318, '10', 0, 0, 0, 0, 'Bags, blood collecting, 450 ml,   5 bags Pack', 'Bags, blood collecting, 450 ml,   5 bags Pack', '2000', NULL, NULL, NULL, 'supplies'),
(319, '11', 0, 0, 0, 0, 'Bandage, Conforming, 10 cm (4") , roll', 'Bandage, Conforming, 10 cm (4") , roll', '', NULL, NULL, NULL, 'supplies'),
(320, '12', 0, 0, 0, 0, 'Bandage, Crepe,  7.5 cm (3"), roll', 'Bandage, Crepe,  7.5 cm (3"), roll', '800', NULL, NULL, NULL, 'supplies'),
(321, '16', 0, 0, 0, 0, 'Bandage, Elastic, 8cm x 5m, roll', 'Bandage, Elastic, 8cm x 5m, roll', '700', NULL, NULL, NULL, 'supplies'),
(322, '17', 0, 0, 0, 0, 'Bandage, Hospital Quality, size 10cm x 4m, roll', 'Bandage, Hospital Quality, size 10cm x 4m, roll', '180', NULL, NULL, NULL, 'supplies'),
(323, '18', 0, 0, 0, 0, 'Bandage, Hospital Quality, size 15cm x 4m, roll', 'Bandage, Hospital Quality, size 15cm x 4m, roll', '300', NULL, NULL, NULL, 'supplies'),
(324, '19', 0, 0, 0, 0, 'Bandage, Hospital Quality, size 7.5 cm x 5m, roll', 'Bandage, Hospital Quality, size 7.5 cm x 5m, roll', '300', '0', '0', '0', 'supplies'),
(325, '20', 0, 0, 0, 0, 'Bandage, Plaster of Paris, 10cm (4"), roll', 'Bandage, Plaster of Paris, 10cm (4"), roll', '1500', NULL, NULL, NULL, 'supplies'),
(326, '21', 0, 0, 0, 0, 'Bandage, Plaster of Paris, 15 cm (6"), roll', 'Bandage, Plaster of Paris, 15 cm (6"), roll', '1800', NULL, NULL, NULL, 'supplies'),
(327, '22', 0, 0, 0, 0, 'Bandage, Plaster of Paris, 8" x 4yds, roll', 'Bandage, Plaster of Paris, 8" x 4yds, roll', '2000', NULL, NULL, NULL, 'supplies'),
(328, '23', 0, 0, 0, 0, 'Barium Sulphate, Powder, 1kg', 'Barium Sulphate, Powder, 1kg', '20000', NULL, NULL, NULL, 'supplies'),
(329, '24', 0, 0, 0, 0, 'Basic fuchsin, powder, 10g', 'Basic fuchsin, powder, 10g', '', NULL, NULL, NULL, 'supplies'),
(330, '25', 0, 0, 0, 0, 'Bleach Household Solution, 5L', 'Bleach Household Solution, 5L', '', NULL, NULL, NULL, 'supplies'),
(331, '26', 0, 0, 0, 0, 'Blood giving set, sterile, each', 'Blood giving set, sterile, each', '1000', NULL, NULL, NULL, 'supplies'),
(332, '27', 0, 0, 0, 0, 'Blood Group AntiSerum, AntiA, 10ml', 'Blood Group AntiSerum, AntiA, 10ml', '', NULL, NULL, NULL, 'supplies'),
(333, '28', 0, 0, 0, 0, 'Blood Group AntiSerum, AntiB, 10ml', 'Blood Group AntiSerum, AntiB, 10ml', '', NULL, NULL, NULL, 'supplies'),
(334, '29', 0, 0, 0, 0, 'Blood Group AntiSerum, AntiD, 10ml', 'Blood Group AntiSerum, AntiD, 10ml', '', NULL, NULL, NULL, 'supplies'),
(335, '30', 0, 0, 0, 0, 'Blood Group AntiSerum, O Serum, 10ml', 'Blood Group AntiSerum, O Serum, 10ml', '', NULL, NULL, NULL, 'supplies'),
(336, '31', 0, 0, 0, 0, 'Blood lancets,  P/200', 'Blood lancets,  P/200', '6000', NULL, NULL, NULL, 'supplies'),
(337, '32', 0, 0, 0, 0, 'Blood taking set single (without bag), each', 'Blood taking set single (without bag), each', '1000', NULL, NULL, NULL, 'supplies'),
(338, '33', 0, 0, 0, 0, 'Boric Acid, Powder, 500g', 'Boric Acid, Powder, 500g', '', NULL, NULL, NULL, 'supplies'),
(339, '34', 0, 0, 0, 0, 'Bottle, Specimen, Universal, Glass, metal screw cap, each', 'Bottle, Specimen, Universal, Glass, metal screw cap, each', '500', NULL, NULL, NULL, 'supplies'),
(340, '35', 0, 0, 0, 0, 'Bottles, Dropper, 100ml, Brown, each', 'Bottles, Dropper, 100ml, Brown, each', '', NULL, NULL, NULL, 'supplies'),
(341, '36', 0, 0, 0, 0, 'Brilliant Cresyl Blue, Powder, GPR grade, 5g', 'Brilliant Cresyl Blue, Powder, GPR grade, 5g', '', NULL, NULL, NULL, 'supplies'),
(342, '37', 0, 0, 0, 0, 'Brucella Antibodies Test Kit, for B. abortus and B. melliten, Kit', 'Brucella Antibodies Test Kit, for B. abortus and B. melliten, Kit', '15000', NULL, NULL, NULL, 'supplies'),
(343, '38', 0, 0, 0, 0, 'Brush, test tube, each', 'Brush, test tube, each', '1000', NULL, NULL, NULL, 'supplies'),
(344, '39', 0, 0, 0, 0, 'Capillary Tubes, Heparinized, 75 mm long  x 100 pcs', 'Capillary Tubes, Heparinized, 75 mm long  x 100 pcs', '10000', NULL, NULL, NULL, 'supplies'),
(345, '40', 0, 0, 0, 0, 'Caps, Bouffant, Regular, 53cm (21", Blue Polyester, each', 'Caps, Bouffant, Regular, 53cm (21", Blue Polyester, each', '', NULL, NULL, NULL, 'supplies'),
(346, '41', 0, 0, 0, 0, 'Cast Padding, 20cm (8"), roll', 'Cast Padding, 20cm (8"), roll', '1500', NULL, NULL, NULL, 'supplies'),
(347, '42', 0, 0, 0, 0, 'Catheter Foley balloon, 5-15ml, 3-way, 16G', 'Catheter Foley balloon, 5-15ml, 3-way, 16G', '5000', NULL, NULL, NULL, 'supplies'),
(348, '57', 0, 0, 0, 0, 'Chlorinated Lime, Powder, 1kg', 'Chlorinated Lime, Powder, 1kg', '5000', NULL, NULL, NULL, 'supplies'),
(349, '58', 0, 0, 0, 0, 'Chloroform , 100ml', 'Chloroform , 100ml', '', NULL, NULL, NULL, 'supplies'),
(350, '59', 0, 0, 0, 0, 'Chloroxylenol 5%, 5L', 'Chloroxylenol 5%, 5L', '', NULL, NULL, NULL, 'supplies'),
(351, '60', 0, 0, 0, 0, 'Condom Catheter, Male, External', 'Condom Catheter, Male, External', '2000', NULL, NULL, NULL, 'supplies'),
(352, '62', 0, 0, 0, 0, 'Copper Sulphate Crystals , 100g', 'Copper Sulphate Crystals , 100g', '', NULL, NULL, NULL, 'supplies'),
(353, '63', 0, 0, 0, 0, 'Cotton wool, absorbent, 500g, roll', 'Cotton wool, absorbent, 500g, roll', '2200', NULL, NULL, NULL, 'supplies'),
(354, '64', 0, 0, 0, 0, 'Cotton Wool, non absorbent, 400g, roll', 'Cotton Wool, non absorbent, 400g, roll', '2000', NULL, NULL, NULL, 'supplies'),
(355, '65', 0, 0, 0, 0, 'Coverglass, 20 x 26 x 0.4 mm, for counting chamber, pair', 'Coverglass, 20 x 26 x 0.4 mm, for counting chamber, pair', '3000', NULL, NULL, NULL, 'supplies');
INSERT INTO care_tz_drugsandservices (item_id, item_number, is_pediatric, is_adult, is_other, is_consumable, item_description, item_full_description, unit_price, unit_price_1, unit_price_2, unit_price_3, purchasing_class) VALUES
(356, '66', 0, 0, 0, 0, 'Coverslips, 22mm x 22mm, 100pcs', 'Coverslips, 22mm x 22mm, 100pcs', '3000', NULL, NULL, NULL, 'supplies'),
(357, '67', 0, 0, 0, 0, 'Cresol Saponated (Lysol) 50% , 5L', 'Cresol Saponated (Lysol) 50% , 5L', '25000', NULL, NULL, NULL, 'supplies'),
(358, '68', 0, 0, 0, 0, 'Cups Plastic, for taking Medicine 30ml', 'Cups Plastic, for taking Medicine 30ml', '', NULL, NULL, NULL, 'supplies'),
(359, '69', 0, 0, 0, 0, 'Cuvette, Plastic, Standard Size, 1cm, 5pcs', 'Cuvette, Plastic, Standard Size, 1cm, 5pcs', '', NULL, NULL, NULL, 'supplies'),
(360, '70', 0, 0, 0, 0, 'Disinfectant Tabs, active chlorine', 'Disinfectant Tabs, active chlorine', '', NULL, NULL, NULL, 'supplies'),
(361, '71', 0, 0, 0, 0, 'Dispensing Plastic Bag, Small,', 'Dispensing Plastic Bag, Small,', '15', NULL, NULL, NULL, 'supplies'),
(362, '72', 0, 0, 0, 0, 'Dispensing Plastic Bag,Medium', 'Dispensing Plastic Bag,Medium', '20', NULL, NULL, NULL, 'supplies'),
(363, '73', 0, 0, 0, 0, 'Drabkin''s Reagent, Powder, vials for 1liter, Vial', 'Drabkin''s Reagent, Powder, vials for 1liter, Vial', '', NULL, NULL, NULL, 'supplies'),
(364, '74', 0, 0, 0, 0, 'EDTA Powder, Dipotassium salt, GPR grade, 50g', 'EDTA Powder, Dipotassium salt, GPR grade, 50g', '2000', NULL, NULL, NULL, 'supplies'),
(365, '75', 0, 0, 0, 0, 'Endotracheal Tube, size  8.0, sterile', 'Endotracheal Tube, size  8.0, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(366, '76', 0, 0, 0, 0, 'Endotracheal Tube, size 2.5, sterile', 'Endotracheal Tube, size 2.5, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(367, '77', 0, 0, 0, 0, 'Endotracheal Tube, size 3.5, sterile', 'Endotracheal Tube, size 3.5, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(368, '78', 0, 0, 0, 0, 'Endotracheal Tube, size 4, sterile', 'Endotracheal Tube, size 4, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(369, '79', 0, 0, 0, 0, 'Endotracheal Tube, size 4.5, sterile', 'Endotracheal Tube, size 4.5, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(370, '80', 0, 0, 0, 0, 'Endotracheal Tube, size 5, sterile', 'Endotracheal Tube, size 5, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(371, '81', 0, 0, 0, 0, 'Endotracheal Tube, size 5.5, sterile', 'Endotracheal Tube, size 5.5, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(372, '82', 0, 0, 0, 0, 'Endotracheal Tube, size 6, sterile', 'Endotracheal Tube, size 6, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(373, '83', 0, 0, 0, 0, 'Endotracheal Tube, size 6.5, sterile', 'Endotracheal Tube, size 6.5, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(374, '84', 0, 0, 0, 0, 'Endotracheal Tube, size 7.5, sterile', 'Endotracheal Tube, size 7.5, sterile', '5000', NULL, NULL, NULL, 'supplies'),
(375, '85', 0, 0, 0, 0, 'Ethanol, 96% solution,  2.5L', 'Ethanol, 96% solution,  2.5L', '12000', NULL, NULL, NULL, 'supplies'),
(376, '86', 0, 0, 0, 0, 'Eusol Solution, 100ml', 'Eusol Solution, 100ml', '1200', '0', '0', '0', 'supplies'),
(377, '87', 0, 0, 0, 0, 'Field Stain A, Powder, 25g', 'Field Stain A, Powder, 25g', '15000', NULL, NULL, NULL, 'supplies'),
(378, '88', 0, 0, 0, 0, 'Field Stain B, Powder,  25g', 'Field Stain B, Powder,  25g', '15000', NULL, NULL, NULL, 'supplies'),
(379, '89', 0, 0, 0, 0, 'Filter paper, 150 mm diameter, Whatmann No 1, pack of 100', 'Filter paper, 150 mm diameter, Whatmann No 1, pack of 100', '', NULL, NULL, NULL, 'supplies'),
(380, '90', 0, 0, 0, 0, 'Formaldehyde Solution, 37%, Technical grade, 2.5L', 'Formaldehyde Solution, 37%, Technical grade, 2.5L', '10000', NULL, NULL, NULL, 'supplies'),
(381, '91', 0, 0, 0, 0, 'Gauze Absorbent, BPC 90cm x 100m, roll', 'Gauze Absorbent, BPC 90cm x 100m, roll', '10000', NULL, NULL, NULL, 'supplies'),
(382, '92', 0, 0, 0, 0, 'Gauze Paraffin Impregnated 10cm x 10cm, Sterile, Dozen', 'Gauze Paraffin Impregnated 10cm x 10cm, Sterile, Dozen', '2500', NULL, NULL, NULL, 'supplies'),
(383, '93', 0, 0, 0, 0, 'Gauze, Sponges, 2x2, 8ply, sterile', 'Gauze, Sponges, 2x2, 8ply, sterile', '2000', NULL, NULL, NULL, 'supplies'),
(384, '94', 0, 0, 0, 0, 'Gentian Violet Crystals, 25g', 'Gentian Violet Crystals, 25g', '15000', NULL, NULL, NULL, 'supplies'),
(385, '95', 0, 0, 0, 0, 'Gentian Violet Solution, 100ml', 'Gentian Violet Solution, 100ml', '1000', NULL, NULL, NULL, 'supplies'),
(386, '96', 0, 0, 0, 0, 'Gloves Powder,   2.5kg', 'Gloves Powder,   2.5kg', '', NULL, NULL, NULL, 'supplies'),
(387, '97', 0, 0, 0, 0, 'Gloves, Exam Latex, Non-Sterile, Disp., Medium, P/100', 'Gloves, Exam Latex, Non-Sterile, Disp., Medium, P/100', '4500', NULL, NULL, NULL, 'supplies'),
(388, '98', 0, 0, 0, 0, 'Gloves, exam., disp, non sterile, latex large size, P/100', 'Gloves, exam., disp, non sterile, latex large size, P/100', '4500', NULL, NULL, NULL, 'supplies'),
(389, '99', 0, 0, 0, 0, 'Gloves, Industrial Long, Pair', 'Gloves, Industrial Long, Pair', '5000', NULL, NULL, NULL, 'supplies'),
(390, '100', 0, 0, 0, 0, 'Gloves, Surgical, Latex, Rubber, Sterile, size 6, Pair', 'Gloves, Surgical, Latex, Rubber, Sterile, size 6, Pair', '500', NULL, NULL, NULL, 'supplies'),
(391, '101', 0, 0, 0, 0, 'Gloves, Surgical, Latex, Rubber, Sterile, size 6.5, Pair', 'Gloves, Surgical, Latex, Rubber, Sterile, size 6.5, Pair', '500', NULL, NULL, NULL, 'supplies'),
(392, '102', 0, 0, 0, 0, 'Gloves, Surgical, Latex, Rubber, Sterile, size 7, Pair', 'Gloves, Surgical, Latex, Rubber, Sterile, size 7, Pair', '500', NULL, NULL, NULL, 'supplies'),
(393, '103', 0, 0, 0, 0, 'Gloves, Surgical, Latex, Rubber, Sterile, size 7.5, Pair', 'Gloves, Surgical, Latex, Rubber, Sterile, size 7.5, Pair', '500', NULL, NULL, NULL, 'supplies'),
(394, '104', 0, 0, 0, 0, 'Gloves, Surgical, Latex, Rubber, Sterile, size 8, Pair', 'Gloves, Surgical, Latex, Rubber, Sterile, size 8, Pair', '500', NULL, NULL, NULL, 'supplies'),
(395, '105', 0, 0, 0, 0, 'Gloves, Surgical, Latex, Rubber, Sterile, size 8.5, Pair', 'Gloves, Surgical, Latex, Rubber, Sterile, size 8.5, Pair', '500', NULL, NULL, NULL, 'supplies'),
(396, '106', 0, 0, 0, 0, 'Gloves, Surgical, Latex, Rubber, Sterile, size 9, Pair', 'Gloves, Surgical, Latex, Rubber, Sterile, size 9, Pair', '500', NULL, NULL, NULL, 'supplies'),
(397, '107', 0, 0, 0, 0, 'Glucose in Blood, Test Strip (Polymade) P/50 strips', 'Glucose in Blood, Test Strip (Polymade) P/50 strips', '', NULL, NULL, NULL, 'supplies'),
(398, '108', 0, 0, 0, 0, 'Glucose in Blood, Test Strip, Accutrend, P/50 Strips', 'Glucose in Blood, Test Strip, Accutrend, P/50 Strips', '', NULL, NULL, NULL, 'supplies'),
(399, '109', 0, 0, 0, 0, 'Glucose in Blood, Test strip, Glucostix, P/50 Strips', 'Glucose in Blood, Test strip, Glucostix, P/50 Strips', '', NULL, NULL, NULL, 'supplies'),
(400, '110', 0, 0, 0, 0, 'Glucose in Blood, Test Strip, Hypoguard, P/50 Strips', 'Glucose in Blood, Test Strip, Hypoguard, P/50 Strips', '', NULL, NULL, NULL, 'supplies'),
(401, '111', 0, 0, 0, 0, 'Glucose in Blood, Test strip, One Touch, P/50strips', 'Glucose in Blood, Test strip, One Touch, P/50strips', '', NULL, NULL, NULL, 'supplies'),
(402, '112', 0, 0, 0, 0, 'Glucose in Blood, tests strips, Medi-Sense, P/50strips', 'Glucose in Blood, tests strips, Medi-Sense, P/50strips', '', NULL, NULL, NULL, 'supplies'),
(403, '113', 0, 0, 0, 0, 'Glucose in urine, reagents strips, P/50strips', 'Glucose in urine, reagents strips, P/50strips', '20000', NULL, NULL, NULL, 'supplies'),
(404, '114', 0, 0, 0, 0, 'Glutaraldehyde solution (CIDEX), with buffer, 1L Pack', 'Glutaraldehyde solution (CIDEX), with buffer, 1L Pack', '9000', NULL, NULL, NULL, 'supplies'),
(405, '115', 0, 0, 0, 0, 'Glycerol, GPR grade, 500ml', 'Glycerol, GPR grade, 500ml', '', NULL, NULL, NULL, 'supplies'),
(406, '116', 0, 0, 0, 0, 'H. I. V. 1 & 2 Test, Capillus, strip,   P/100strips', 'H. I. V. 1 & 2 Test, Capillus, strip,   P/100strips', '232000', NULL, NULL, NULL, 'supplies'),
(407, '117', 0, 0, 0, 0, 'H.I.V. Elisa, Test kit of 100 tests', 'H.I.V. Elisa, Test kit of 100 tests', '', NULL, NULL, NULL, 'supplies'),
(408, '118', 0, 0, 0, 0, 'Hepatitis BSAg, Test Kit, Kit of 100 tests', 'Hepatitis BSAg, Test Kit, Kit of 100 tests', '75000', NULL, NULL, NULL, 'supplies'),
(409, '119', 0, 0, 0, 0, 'Hydrogen Peroxide, 50%,   1L', 'Hydrogen Peroxide, 50%,   1L', '7500', NULL, NULL, NULL, 'supplies'),
(410, '120', 0, 0, 0, 0, 'I.V. Butterfly set size 21 G, sterile, P/100', 'I.V. Butterfly set size 21 G, sterile, P/100', '15000', NULL, NULL, NULL, 'supplies'),
(411, '131', 0, 0, 0, 0, 'Iodine, Resublimed Crystals, GPR grade, 50g', 'Iodine, Resublimed Crystals, GPR grade, 50g', '5000', NULL, NULL, NULL, 'supplies'),
(412, '132', 0, 0, 0, 0, 'K-Y Jelly, 82g tube', 'K-Y Jelly, 82g tube', '3500', '0', '0', '0', 'supplies'),
(413, '133', 0, 0, 0, 0, 'Methanol, Absolute, Technical grade, 250ml', 'Methanol, Absolute, Technical grade, 250ml', '', NULL, NULL, NULL, 'supplies'),
(414, '134', 0, 0, 0, 0, 'Methylated Spirit, 70%, solution, 5L', 'Methylated Spirit, 70%, solution, 5L', '10000', NULL, NULL, NULL, 'supplies'),
(415, '135', 0, 0, 0, 0, 'Methylene Blue, powder, 5g', 'Methylene Blue, powder, 5g', '2500', NULL, NULL, NULL, 'supplies'),
(416, '136', 0, 0, 0, 0, 'Microscope Oil, 100ml', 'Microscope Oil, 100ml', '8000', NULL, NULL, NULL, 'supplies'),
(417, '137', 0, 0, 0, 0, 'Microscope Slides, glass, 2.5cm x 7.5 cm, P/72pcs', 'Microscope Slides, glass, 2.5cm x 7.5 cm, P/72pcs', '5000', NULL, NULL, NULL, 'supplies'),
(418, '138', 0, 0, 0, 0, 'Nasogastric Tube,  5G, sterile, each', 'Nasogastric Tube,  5G, sterile, each', '500', NULL, NULL, NULL, 'supplies'),
(419, '147', 0, 0, 0, 0, 'Needle, Epidural, disposable, 18G, sterile, each', 'Needle, Epidural, disposable, 18G, sterile, each', '', NULL, NULL, NULL, 'supplies'),
(420, '148', 0, 0, 0, 0, 'Needle, hypodermic, disposable,  21G, sterile, P/100pcs', 'Needle, hypodermic, disposable,  21G, sterile, P/100pcs', '1500', NULL, NULL, NULL, 'supplies'),
(421, '149', 0, 0, 0, 0, 'Needle, hypodermic, disposable,  22G, sterile, P/100pcs', 'Needle, hypodermic, disposable,  22G, sterile, P/100pcs', '1500', NULL, NULL, NULL, 'supplies'),
(422, '150', 0, 0, 0, 0, 'Needle, hypodermic, disposable,  23G, sterile, P/100pcs', 'Needle, hypodermic, disposable,  23G, sterile, P/100pcs', '1500', NULL, NULL, NULL, 'supplies'),
(423, '151', 0, 0, 0, 0, 'Needle, hypodermic, disposable,  25G, sterile, P/100pcs', 'Needle, hypodermic, disposable,  25G, sterile, P/100pcs', '1500', NULL, NULL, NULL, 'supplies'),
(424, '152', 0, 0, 0, 0, 'Needle, hypodermic, disposable, 18G, sterile, P/100pcs', 'Needle, hypodermic, disposable, 18G, sterile, P/100pcs', '1500', NULL, NULL, NULL, 'supplies'),
(425, '153', 0, 0, 0, 0, 'Needle, hypodermic, disposable, 19G, sterile, P/100pcs', 'Needle, hypodermic, disposable, 19G, sterile, P/100pcs', '3000', NULL, NULL, NULL, 'supplies'),
(426, '154', 0, 0, 0, 0, 'Needle, Spinal , disposable, 22G, sterile, P/100pcs', 'Needle, Spinal , disposable, 22G, sterile, P/100pcs', '', NULL, NULL, NULL, 'supplies'),
(427, '155', 0, 0, 0, 0, 'Needle, Spinal, disposable, 23G, sterile, P/100pcs', 'Needle, Spinal, disposable, 23G, sterile, P/100pcs', '', NULL, NULL, NULL, 'supplies'),
(428, '156', 0, 0, 0, 0, 'Needle, Spinal, disposable, 24G,sterile, P/100pcs', 'Needle, Spinal, disposable, 24G,sterile, P/100pcs', '', NULL, NULL, NULL, 'supplies'),
(429, '157', 0, 0, 0, 0, 'Needle, Spinal, disposable, 25G, sterile, P/100pcs', 'Needle, Spinal, disposable, 25G, sterile, P/100pcs', '', NULL, NULL, NULL, 'supplies'),
(430, '158', 0, 0, 0, 0, 'Neubauer chamber, glass, improved, each', 'Neubauer chamber, glass, improved, each', '35000', NULL, NULL, NULL, 'supplies'),
(431, '159', 0, 0, 0, 0, 'Pad, Maternity, each', 'Pad, Maternity, each', '', NULL, NULL, NULL, 'supplies'),
(432, '160', 0, 0, 0, 0, 'Paraffin, soft white jelly , 50g', 'Paraffin, soft white jelly , 50g', '', NULL, NULL, NULL, 'supplies'),
(433, '161', 0, 0, 0, 0, 'Paraformaldehyde, tablets', 'Paraformaldehyde, tablets', '', NULL, NULL, NULL, 'supplies'),
(434, '162', 0, 0, 0, 0, 'Pasteur pipette, plastic, 3 ml, each', 'Pasteur pipette, plastic, 3 ml, each', '', NULL, NULL, NULL, 'supplies'),
(435, '163', 0, 0, 0, 0, 'Phenol Crystals, detached, GPR grade, 50g', 'Phenol Crystals, detached, GPR grade, 50g', '', NULL, NULL, NULL, 'supplies'),
(436, '164', 0, 0, 0, 0, 'Plaster Adhesive Dressing Sterile 6cm x 5cm, P/10', 'Plaster Adhesive Dressing Sterile 6cm x 5cm, P/10', '', NULL, NULL, NULL, 'supplies'),
(437, '165', 0, 0, 0, 0, 'Plaster for skin traction 10cm x 2.5 m, roll', 'Plaster for skin traction 10cm x 2.5 m, roll', '1500', NULL, NULL, NULL, 'supplies'),
(438, '166', 0, 0, 0, 0, 'Potassium dichromate, GPR grade, 100g', 'Potassium dichromate, GPR grade, 100g', '', NULL, NULL, NULL, 'supplies'),
(439, '167', 0, 0, 0, 0, 'Potassium Iodide, Powder, GPR grade, 100g', 'Potassium Iodide, Powder, GPR grade, 100g', '8000', NULL, NULL, NULL, 'supplies'),
(440, '168', 0, 0, 0, 0, 'Potassium Permanganate, Powder, 200g', 'Potassium Permanganate, Powder, 200g', '5000', NULL, NULL, NULL, 'supplies'),
(441, '169', 0, 0, 0, 0, 'Povidone Iodine, 1L', 'Povidone Iodine, 1L', '7500', NULL, NULL, NULL, 'supplies'),
(442, '170', 0, 0, 0, 0, 'Pregnancy, Test Strip, P/50strips', 'Pregnancy, Test Strip, P/50strips', '25000', NULL, NULL, NULL, 'supplies'),
(443, '171', 0, 0, 0, 0, 'Protein in urine, reagent strips, P/50strips', 'Protein in urine, reagent strips, P/50strips', '10000', NULL, NULL, NULL, 'supplies'),
(444, '172', 0, 0, 0, 0, 'QBC Tubes, Haematology, P/100 tubes', 'QBC Tubes, Haematology, P/100 tubes', '150000', NULL, NULL, NULL, 'supplies'),
(445, '173', 0, 0, 0, 0, 'QBC Tubes, Malaria, P/100 tubes', 'QBC Tubes, Malaria, P/100 tubes', '150000', NULL, NULL, NULL, 'supplies'),
(446, '174', 0, 0, 0, 0, 'Sodium bicarbonate,Powder, Technical grade, 25g', 'Sodium bicarbonate,Powder, Technical grade, 25g', '', NULL, NULL, NULL, 'supplies'),
(447, '175', 0, 0, 0, 0, 'Sodium Carbonate Powder, 25g', 'Sodium Carbonate Powder, 25g', '', NULL, NULL, NULL, 'supplies'),
(448, '176', 0, 0, 0, 0, 'Sodium chloride, powder,  100g', 'Sodium chloride, powder,  100g', '', NULL, NULL, NULL, 'supplies'),
(449, '177', 0, 0, 0, 0, 'Sodium citrate, powder, GPR grade, 200g', 'Sodium citrate, powder, GPR grade, 200g', '', NULL, NULL, NULL, 'supplies'),
(450, '178', 0, 0, 0, 0, 'Sodium Hypochlorite, powder, Technical grade, 5g', 'Sodium Hypochlorite, powder, Technical grade, 5g', '', NULL, NULL, NULL, 'supplies'),
(451, '179', 0, 0, 0, 0, 'Sodium metabisulphite, powder, GPR, 5g', 'Sodium metabisulphite, powder, GPR, 5g', '', NULL, NULL, NULL, 'supplies'),
(452, '180', 0, 0, 0, 0, 'Sodium Nitrite, 100g', 'Sodium Nitrite, 100g', '', NULL, NULL, NULL, 'supplies'),
(453, '181', 0, 0, 0, 0, 'Stool container, plastic, wide mouth, each', 'Stool container, plastic, wide mouth, each', '', NULL, NULL, NULL, 'supplies'),
(454, '182', 0, 0, 0, 0, 'Suction Catheter, sterile, G 10, each', 'Suction Catheter, sterile, G 10, each', '1200', NULL, NULL, NULL, 'supplies'),
(455, '192', 0, 0, 0, 0, 'Surgical Blade, size 20, sterile, P/100pcs', 'Surgical Blade, size 20, sterile, P/100pcs', '10000', NULL, NULL, NULL, 'supplies'),
(456, '193', 0, 0, 0, 0, 'Surgical Blade, size 23, sterile, P/100pcs', 'Surgical Blade, size 23, sterile, P/100pcs', '10000', NULL, NULL, NULL, 'supplies'),
(457, '194', 0, 0, 0, 0, 'Suture, Catgut chromic 0, needle, sterile', 'Suture, Catgut chromic 0, needle, sterile', '12000', NULL, NULL, NULL, 'supplies'),
(458, '195', 0, 0, 0, 0, 'Suture, catgut chromic 1, needle, sterile', 'Suture, catgut chromic 1, needle, sterile', '12000', NULL, NULL, NULL, 'supplies'),
(459, '196', 0, 0, 0, 0, 'Suture, Catgut Chromic, 2, needle, sterile', 'Suture, Catgut Chromic, 2, needle, sterile', '12000', NULL, NULL, NULL, 'supplies'),
(460, '197', 0, 0, 0, 0, 'Suture, Catgut Chromic, 2/0, needle, sterile', 'Suture, Catgut Chromic, 2/0, needle, sterile', '12000', NULL, NULL, NULL, 'supplies'),
(461, '198', 0, 0, 0, 0, 'Suture, Catgut Chromic, 2/0, round needle, sterile', 'Suture, Catgut Chromic, 2/0, round needle, sterile', '12000', NULL, NULL, NULL, 'supplies'),
(462, '199', 0, 0, 0, 0, 'Suture, Catgut chromic, 3/0, needle, sterile', 'Suture, Catgut chromic, 3/0, needle, sterile', '12000', NULL, NULL, NULL, 'supplies'),
(463, '200', 0, 0, 0, 0, 'Suture, coated vicryl 1/0, needle, sterile', 'Suture, coated vicryl 1/0, needle, sterile', '33000', NULL, NULL, NULL, 'supplies'),
(464, '201', 0, 0, 0, 0, 'Suture, coated vicryl 2/0, round needle', 'Suture, coated vicryl 2/0, round needle', '33000', NULL, NULL, NULL, 'supplies'),
(465, '202', 0, 0, 0, 0, 'Suture, coated vicryl 3/0, needle, sterile', 'Suture, coated vicryl 3/0, needle, sterile', '33000', NULL, NULL, NULL, 'supplies'),
(466, '203', 0, 0, 0, 0, 'Suture, Coated Vicryl,  0, needle, sterile', 'Suture, Coated Vicryl,  0, needle, sterile', '33000', NULL, NULL, NULL, 'supplies'),
(467, '204', 0, 0, 0, 0, 'Suture, Coated Vicryl,  1,  needle, sterile', 'Suture, Coated Vicryl,  1,  needle, sterile', '33000', NULL, NULL, NULL, 'supplies'),
(468, '205', 0, 0, 0, 0, 'Suture, Coated Vicryl,  2/0, cutting needle, sterile', 'Suture, Coated Vicryl,  2/0, cutting needle, sterile', '33000', NULL, NULL, NULL, 'supplies'),
(469, '206', 0, 0, 0, 0, 'Suture, Coated Vicryl, 3, needle, sterile', 'Suture, Coated Vicryl, 3, needle, sterile', '33000', NULL, NULL, NULL, 'supplies'),
(470, '207', 0, 0, 0, 0, 'Suture, Prolene, 2/0, needle, sterile', 'Suture, Prolene, 2/0, needle, sterile', '33000', NULL, NULL, NULL, 'supplies'),
(471, '208', 0, 0, 0, 0, 'Suture, Prolene, 3/0, needle, sterile', 'Suture, Prolene, 3/0, needle, sterile', '33000', NULL, NULL, NULL, 'supplies'),
(472, '209', 0, 0, 0, 0, 'Suture, Silk braided, 2, needle, sterile', 'Suture, Silk braided, 2, needle, sterile', '12000', NULL, NULL, NULL, 'supplies'),
(473, '210', 0, 0, 0, 0, 'Syringe Disposable, 10 cc, sterile, P/100pcs', 'Syringe Disposable, 10 cc, sterile, P/100pcs', '20000', NULL, NULL, NULL, 'supplies'),
(474, '224', 0, 0, 0, 0, 'Tape, Adhesive, 5cm x 5m, roll', 'Tape, Adhesive, 5cm x 5m, roll', '', NULL, NULL, NULL, 'supplies'),
(475, '225', 0, 0, 0, 0, 'Tape, Adhesive, 7.5cm x 5m, roll', 'Tape, Adhesive, 7.5cm x 5m, roll', '800', NULL, NULL, NULL, 'supplies'),
(476, '226', 0, 0, 0, 0, 'Tape, Plaster Adhesive Tape 2.5cm x 9.2m, roll', 'Tape, Plaster Adhesive Tape 2.5cm x 9.2m, roll', '', NULL, NULL, NULL, 'supplies'),
(477, '227', 0, 0, 0, 0, 'Tape, plastic adhesive microperforated, 2.5cm x 5m, roll', 'Tape, plastic adhesive microperforated, 2.5cm x 5m, roll', '', NULL, NULL, NULL, 'supplies'),
(478, '228', 0, 0, 0, 0, 'Tape, Sterilization Indicator, 1/2" wide, roll', 'Tape, Sterilization Indicator, 1/2" wide, roll', '7500', NULL, NULL, NULL, 'supplies'),
(479, '229', 0, 0, 0, 0, 'Test Tubes, Glass, 9ml, each', 'Test Tubes, Glass, 9ml, each', '', NULL, NULL, NULL, 'supplies'),
(480, '230', 0, 0, 0, 0, 'Thermometer, Clinical, each', 'Thermometer, Clinical, each', '1000', NULL, NULL, NULL, 'supplies'),
(481, '231', 0, 0, 0, 0, 'Tongue Depressor, disposable, Wooden/Plastic, P/100pcs', 'Tongue Depressor, disposable, Wooden/Plastic, P/100pcs', '2500', NULL, NULL, NULL, 'supplies'),
(482, '232', 0, 0, 0, 0, 'Tube, Mucous Extractors for baby, G10, sterile, each', 'Tube, Mucous Extractors for baby, G10, sterile, each', '', NULL, NULL, NULL, 'supplies'),
(483, '233', 0, 0, 0, 0, 'Ultrasound Ge, 1kg', 'Ultrasound Ge, 1kg', '9500', NULL, NULL, NULL, 'supplies'),
(484, '234', 0, 0, 0, 0, 'Uni-T-Pak, Coulter Reagent, 10L', 'Uni-T-Pak, Coulter Reagent, 10L', '', NULL, NULL, NULL, 'supplies'),
(485, '235', 0, 0, 0, 0, 'Uric Acid, Serum, Test Kit, kit of 100 tests', 'Uric Acid, Serum, Test Kit, kit of 100 tests', '', NULL, NULL, NULL, 'supplies'),
(486, '236', 0, 0, 0, 0, 'Urine Collection Bag for Adults, 2000ml, P/100pcs', 'Urine Collection Bag for Adults, 2000ml, P/100pcs', '50000', NULL, NULL, NULL, 'supplies'),
(487, '237', 0, 0, 0, 0, 'Urine Multiple Reagent Strip, 10 parameters, P/100strips', 'Urine Multiple Reagent Strip, 10 parameters, P/100strips', '30000', NULL, NULL, NULL, 'supplies'),
(488, '238', 0, 0, 0, 0, 'Urographin, 76% Solution, (for IVP, HSG), Vial,  20ml', 'Urographin, 76% Solution, (for IVP, HSG), Vial,  20ml', '8500', NULL, NULL, NULL, 'supplies'),
(489, '239', 0, 0, 0, 0, 'VDRL/RPR Kit, carbon antigen, kit of 100 tests', 'VDRL/RPR Kit, carbon antigen, kit of 100 tests', '20000', NULL, NULL, NULL, 'supplies'),
(490, '240', 0, 0, 0, 0, 'Virkon (k-peroxomonsulphate) powder, 5kg', 'Virkon (k-peroxomonsulphate) powder, 5kg', '', NULL, NULL, NULL, 'supplies'),
(491, '241', 0, 0, 0, 0, 'X-Ray Developer, Powder for 22.5 L,', 'X-Ray Developer, Powder for 22.5 L,', '15000', NULL, NULL, NULL, 'supplies'),
(492, '242', 0, 0, 0, 0, 'X-Ray Replenisher powder, pack for 6 L,', 'X-Ray Replenisher powder, pack for 6 L,', '5000', NULL, NULL, NULL, 'supplies'),
(493, '243', 0, 0, 0, 0, 'X-Ray, Developer, Pack for 10L', 'X-Ray, Developer, Pack for 10L', '5000', NULL, NULL, NULL, 'supplies'),
(494, '244', 0, 0, 0, 0, 'X-Ray, Envelope, for 25cm x 30cm film,', 'X-Ray, Envelope, for 25cm x 30cm film,', '', NULL, NULL, NULL, 'supplies'),
(495, '245', 0, 0, 0, 0, 'X-Ray, Envelope, for 35cm x 35cm film,', 'X-Ray, Envelope, for 35cm x 35cm film,', '', NULL, NULL, NULL, 'supplies'),
(496, '246', 0, 0, 0, 0, 'X-Ray, Film, 20cm x 25cm (8" x 10"), Blue sensitive, P/100films', 'X-Ray, Film, 20cm x 25cm (8" x 10"), Blue sensitive, P/100films', '50000', NULL, NULL, NULL, 'supplies'),
(497, '247', 0, 0, 0, 0, 'X-Ray, Film, 25cm x 30cm (10" x 12"), Blue sensitive, P/100films', 'X-Ray, Film, 25cm x 30cm (10" x 12"), Blue sensitive, P/100films', '75000', NULL, NULL, NULL, 'supplies'),
(498, '248', 0, 0, 0, 0, 'X-Ray, Film, 35cm x 35cm (14" x 14"), Blue Sensitive, P/100films', 'X-Ray, Film, 35cm x 35cm (14" x 14"), Blue Sensitive, P/100films', '85000', NULL, NULL, NULL, 'supplies'),
(499, '249', 0, 0, 0, 0, 'X-Ray, Film, 35cm x 43cm (14" x 17"), Blue Sensitive, P/100films', 'X-Ray, Film, 35cm x 43cm (14" x 17"), Blue Sensitive, P/100films', '120000', NULL, NULL, NULL, 'supplies'),
(500, '250', 0, 0, 0, 0, 'X-Ray, Film, 38cm x 15cm (15" x 6"), Blue Sensitive, P/100films', 'X-Ray, Film, 38cm x 15cm (15" x 6"), Blue Sensitive, P/100films', '50000', NULL, NULL, NULL, 'supplies'),
(501, '251', 0, 0, 0, 0, 'X-Ray, Fixer Powder,  Pack for 7.5 L', 'X-Ray, Fixer Powder,  Pack for 7.5 L', '7500', NULL, NULL, NULL, 'supplies'),
(502, '252', 0, 0, 0, 0, 'X-Ray, Fixer powder, pack for 22.5L', 'X-Ray, Fixer powder, pack for 22.5L', '15000', NULL, NULL, NULL, 'supplies'),
(503, '253', 0, 0, 0, 0, 'Xylene, Technical grade, 500ml', 'Xylene, Technical grade, 500ml', '', NULL, NULL, NULL, 'supplies'),
(504, '254', 0, 0, 0, 0, 'Zinc Oxide Plaster 2.5 cm x 5m, roll', 'Zinc Oxide Plaster 2.5 cm x 5m, roll', '', NULL, NULL, NULL, 'supplies'),
(505, '255', 0, 0, 0, 0, 'Zinc Oxide Plaster,  7.5 cm x 5m, roll', 'Zinc Oxide Plaster,  7.5 cm x 5m, roll', '2000', NULL, NULL, NULL, 'supplies'),
(506, '256', 0, 0, 0, 0, 'Zinc Oxide Plaster, 5cm x 5m, roll', 'Zinc Oxide Plaster, 5cm x 5m, roll', '1500', NULL, NULL, NULL, 'supplies'),
(507, '1', 0, 0, 0, 0, 'Acid Phosphatase,Test Kit,', 'Acid Phosphatase,Test Kit,', '', NULL, NULL, NULL, 'supplies_laboratory'),
(508, '2', 0, 0, 0, 0, 'Ammonia Solution, 500ml', 'Ammonia Solution, 500ml', '', NULL, NULL, NULL, 'supplies_laboratory'),
(509, '3', 0, 0, 0, 0, 'Amylase in blood, test strips, Reflotron, 25 Strips', 'Amylase in blood, test strips, Reflotron, 25 Strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(510, '4', 0, 0, 0, 0, 'Blood Culture, Bottles with Medium,  each', 'Blood Culture, Bottles with Medium,  each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(511, '5', 0, 0, 0, 0, 'Bottle, Bijou, Glass, 5ml, metal screw cap, each', 'Bottle, Bijou, Glass, 5ml, metal screw cap, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(512, '6', 0, 0, 0, 0, 'Buffer tablet, pH 7.2, for 100 ml,          B/50 tablets', 'Buffer tablet, pH 7.2, for 100 ml,          B/50 tablets', '', NULL, NULL, NULL, 'supplies_laboratory'),
(513, '7', 0, 0, 0, 0, 'Chek stix, strips for Quality control, Reflotron, 25 Strips', 'Chek stix, strips for Quality control, Reflotron, 25 Strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(514, '8', 0, 0, 0, 0, 'Creatinine in blood, test strips, Reflotron, 30 Strips', 'Creatinine in blood, test strips, Reflotron, 30 Strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(515, '9', 0, 0, 0, 0, 'Culture Media, Blood Agar Base,100g', 'Culture Media, Blood Agar Base,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(516, '10', 0, 0, 0, 0, 'Culture Media, CLED,100g', 'Culture Media, CLED,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(517, '11', 0, 0, 0, 0, 'Culture Media, DCA,100g', 'Culture Media, DCA,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(518, '12', 0, 0, 0, 0, 'Culture Media, GC Agar,100g', 'Culture Media, GC Agar,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(519, '13', 0, 0, 0, 0, 'Culture Media, Kligler Iron Agar,100g', 'Culture Media, Kligler Iron Agar,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(520, '14', 0, 0, 0, 0, 'Culture Media, MacConkey Agar,100g', 'Culture Media, MacConkey Agar,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(521, '15', 0, 0, 0, 0, 'Culture Media, Mueller Hinton Agar,100g', 'Culture Media, Mueller Hinton Agar,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(522, '16', 0, 0, 0, 0, 'Culture Media, Peptone Water,100g', 'Culture Media, Peptone Water,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(523, '17', 0, 0, 0, 0, 'Culture Media, SDA,100g', 'Culture Media, SDA,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(524, '18', 0, 0, 0, 0, 'Culture Media, Selenite Broth,100g', 'Culture Media, Selenite Broth,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(525, '19', 0, 0, 0, 0, 'Culture Media, SS Agar,100g', 'Culture Media, SS Agar,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(526, '20', 0, 0, 0, 0, 'Culture Media, Stuart Transport Medium,100g', 'Culture Media, Stuart Transport Medium,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(527, '21', 0, 0, 0, 0, 'Culture Media, Supplement, VCNT, 5ml,', 'Culture Media, Supplement, VCNT, 5ml,', '', NULL, NULL, NULL, 'supplies_laboratory'),
(528, '22', 0, 0, 0, 0, 'Culture Media, TCBS,100g', 'Culture Media, TCBS,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(529, '23', 0, 0, 0, 0, 'Culture Media, Triptone Soya broth,100g', 'Culture Media, Triptone Soya broth,100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(530, '24', 0, 0, 0, 0, 'Culture Media, XLD, 100g', 'Culture Media, XLD, 100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(531, '25', 0, 0, 0, 0, 'Dry Chemistry, Blood Urea Nitrogen, Strips, Johnson & Johnson, 25 strips', 'Dry Chemistry, Blood Urea Nitrogen, Strips, Johnson & Johnson, 25 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(532, '26', 0, 0, 0, 0, 'Dry Chemistry, Serum Potassium Strips, Johnson & Johnson,25 strips', 'Dry Chemistry, Serum Potassium Strips, Johnson & Johnson,25 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(533, '27', 0, 0, 0, 0, 'Dry Chemistry, Serum Sodium Strips, Johnson & Johnson autoanalyser, 25 strips', 'Dry Chemistry, Serum Sodium Strips, Johnson & Johnson autoanalyser, 25 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(534, '28', 0, 0, 0, 0, 'Dry Chemistry, Serum total Bilirubin, Strips, Johnson & Johnson, 25 strips', 'Dry Chemistry, Serum total Bilirubin, Strips, Johnson & Johnson, 25 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(535, '29', 0, 0, 0, 0, 'Dry Chemistry, SGOT Strips, Johnson & Johnson autoanalyser, 25 strips', 'Dry Chemistry, SGOT Strips, Johnson & Johnson autoanalyser, 25 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(536, '30', 0, 0, 0, 0, 'Dry Chemistry, SGPT Strips, Johnson & Johnson autoanalyser , 25 strips', 'Dry Chemistry, SGPT Strips, Johnson & Johnson autoanalyser , 25 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(537, '31', 0, 0, 0, 0, 'Giemsa Stain, powder, 12.5g', 'Giemsa Stain, powder, 12.5g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(538, '32', 0, 0, 0, 0, 'Glucose & Ketones in Urine, reagent strips, 50 strips', 'Glucose & Ketones in Urine, reagent strips, 50 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(539, '33', 0, 0, 0, 0, 'Glucose in blood, test strips, Reflotron, 30 strips', 'Glucose in blood, test strips, Reflotron, 30 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(540, '34', 0, 0, 0, 0, 'GOT in blood, test strips, Reflotron, 30 strips', 'GOT in blood, test strips, Reflotron, 30 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(541, '35', 0, 0, 0, 0, 'GPT in blood, test strips, Reflotron, 30 strips', 'GPT in blood, test strips, Reflotron, 30 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(542, '36', 0, 0, 0, 0, 'Haemoglobin scale, Talqvist, book, each', 'Haemoglobin scale, Talqvist, book, each', '25000', NULL, NULL, NULL, 'supplies_laboratory'),
(543, '37', 0, 0, 0, 0, 'Haemoglobin test strips, Reflotron, 25 strips', 'Haemoglobin test strips, Reflotron, 25 strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(544, '38', 0, 0, 0, 0, 'Helicobacter Pylori, kit of 100 tests', 'Helicobacter Pylori, kit of 100 tests', '150000', NULL, NULL, NULL, 'supplies_laboratory'),
(545, '39', 0, 0, 0, 0, 'India ink, 10ml', 'India ink, 10ml', '', NULL, NULL, NULL, 'supplies_laboratory'),
(546, '40', 0, 0, 0, 0, 'Lamps, solar, with panels, small, portable, each', 'Lamps, solar, with panels, small, portable, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(547, '41', 0, 0, 0, 0, 'Laryngoscope, complete, 2 blades, each', 'Laryngoscope, complete, 2 blades, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(548, '42', 0, 0, 0, 0, 'Laryngoscope, complete, 3 blades, each', 'Laryngoscope, complete, 3 blades, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(549, '43', 0, 0, 0, 0, 'Laryngoscope, complete, 4 blades, each', 'Laryngoscope, complete, 4 blades, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(550, '44', 0, 0, 0, 0, 'Laundry Scrubbing Brush , each', 'Laundry Scrubbing Brush , each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(551, '45', 0, 0, 0, 0, 'Linen White 36in x 25m, roll', 'Linen White 36in x 25m, roll', '', NULL, NULL, NULL, 'supplies_laboratory'),
(552, '46', 0, 0, 0, 0, 'Magnesium Carbonate, Light Powder, 100g', 'Magnesium Carbonate, Light Powder, 100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(553, '47', 0, 0, 0, 0, 'Magnesium Trisilicate, Powder, 100g', 'Magnesium Trisilicate, Powder, 100g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(554, '48', 0, 0, 0, 0, 'Net Tubular Dressing size 25m B, each', 'Net Tubular Dressing size 25m B, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(555, '49', 0, 0, 0, 0, 'Net Tubular Dressing Size 25m C, each', 'Net Tubular Dressing Size 25m C, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(556, '50', 0, 0, 0, 0, 'Phenol Solution, 85%,100ml', 'Phenol Solution, 85%,100ml', '', NULL, NULL, NULL, 'supplies_laboratory'),
(557, '51', 0, 0, 0, 0, 'Pipette, Bulb, 3way Rubber, each', 'Pipette, Bulb, 3way Rubber, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(558, '52', 0, 0, 0, 0, 'Pipette, Sahli, 20 uL, glass, each', 'Pipette, Sahli, 20 uL, glass, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(559, '53', 0, 0, 0, 0, 'Pipette, Westergren, Glass, each', 'Pipette, Westergren, Glass, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(560, '54', 0, 0, 0, 0, 'Plasma Potassium, test kit, kit of 100 tests', 'Plasma Potassium, test kit, kit of 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(561, '55', 0, 0, 0, 0, 'Plasma Sodium, test kit, kit of 100 tests', 'Plasma Sodium, test kit, kit of 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(562, '56', 0, 0, 0, 0, 'Potassium cyanide, Powder, GPR grade, 1g', 'Potassium cyanide, Powder, GPR grade, 1g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(563, '57', 0, 0, 0, 0, 'Potassium ferricyanide, powder, GPR grade, 2g', 'Potassium ferricyanide, powder, GPR grade, 2g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(564, '58', 0, 0, 0, 0, 'Printer Cards, Coulter, 100 Cards', 'Printer Cards, Coulter, 100 Cards', '', NULL, NULL, NULL, 'supplies_laboratory'),
(565, '59', 0, 0, 0, 0, 'PTT, Test Kit, Kit of 100 tests', 'PTT, Test Kit, Kit of 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(566, '60', 0, 0, 0, 0, 'Salicylic Acid, Powder, 50g', 'Salicylic Acid, Powder, 50g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(567, '61', 0, 0, 0, 0, 'Sensitivity Discs, Ampicillin, 10 mcg, 50 discs', 'Sensitivity Discs, Ampicillin, 10 mcg, 50 discs', '', NULL, NULL, NULL, 'supplies_laboratory'),
(568, '62', 0, 0, 0, 0, 'Sensitivity Discs, Chloramphenicol, 30 mcg,  50 discs', 'Sensitivity Discs, Chloramphenicol, 30 mcg,  50 discs', '', NULL, NULL, NULL, 'supplies_laboratory'),
(569, '63', 0, 0, 0, 0, 'Sensitivity Discs, Ciprofloxacin, 5 mcg,50 discs', 'Sensitivity Discs, Ciprofloxacin, 5 mcg,50 discs', '', NULL, NULL, NULL, 'supplies_laboratory'),
(570, '64', 0, 0, 0, 0, 'Sensitivity Discs, Doxycycline, 30 mcg, 50 discs', 'Sensitivity Discs, Doxycycline, 30 mcg, 50 discs', '', NULL, NULL, NULL, 'supplies_laboratory'),
(571, '65', 0, 0, 0, 0, 'Sensitivity Discs, Erythomycin, 30 mcg, 50 discs', 'Sensitivity Discs, Erythomycin, 30 mcg, 50 discs', '', NULL, NULL, NULL, 'supplies_laboratory'),
(572, '66', 0, 0, 0, 0, 'Sensitivity Discs, Gentamycin, 10 mcg, 50 discs', 'Sensitivity Discs, Gentamycin, 10 mcg, 50 discs', '', NULL, NULL, NULL, 'supplies_laboratory'),
(573, '67', 0, 0, 0, 0, 'Sensitivity Discs, Oxacillin, 1mcg,50 discs', 'Sensitivity Discs, Oxacillin, 1mcg,50 discs', '', NULL, NULL, NULL, 'supplies_laboratory'),
(574, '68', 0, 0, 0, 0, 'Sensitivity Discs, Penicillin, 10 IU, 50 discs', 'Sensitivity Discs, Penicillin, 10 IU, 50 discs', '', NULL, NULL, NULL, 'supplies_laboratory'),
(575, '69', 0, 0, 0, 0, 'Sensitivity Discs, Tetracycline, 30 mcg,  50 discs', 'Sensitivity Discs, Tetracycline, 30 mcg,  50 discs', '', NULL, NULL, NULL, 'supplies_laboratory'),
(576, '70', 0, 0, 0, 0, 'Serum Albumin, Test Kit, kit of 100 tests', 'Serum Albumin, Test Kit, kit of 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(577, '71', 0, 0, 0, 0, 'Serum alkaline phosphatase, Test kit, of 100 tests', 'Serum alkaline phosphatase, Test kit, of 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(578, '72', 0, 0, 0, 0, 'Serum alpha-Amylase, Test Kit, kit of 100 tests', 'Serum alpha-Amylase, Test Kit, kit of 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(579, '73', 0, 0, 0, 0, 'Serum Bilirubin, Test Kit, kit of 100 tests', 'Serum Bilirubin, Test Kit, kit of 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(580, '74', 0, 0, 0, 0, 'Serum Cholesterol, Test Kit, 100 tests', 'Serum Cholesterol, Test Kit, 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(581, '75', 0, 0, 0, 0, 'Serum Creatinine, Test Kit, kit of 100 tests', 'Serum Creatinine, Test Kit, kit of 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(582, '76', 0, 0, 0, 0, 'Serum Total Protein, Test Kit, kit of 100 tests', 'Serum Total Protein, Test Kit, kit of 100 tests', '', NULL, NULL, NULL, 'supplies_laboratory'),
(583, '77', 0, 0, 0, 0, 'SGOT, Test Kit, kit of 100 tests', 'SGOT, Test Kit, kit of 100 tests', '45000', NULL, NULL, NULL, 'supplies_laboratory'),
(584, '78', 0, 0, 0, 0, 'SGPT, Test Kit, kit of 100 tests', 'SGPT, Test Kit, kit of 100 tests', '45000', NULL, NULL, NULL, 'supplies_laboratory'),
(585, '79', 0, 0, 0, 0, 'Sodium azide, powder, GPR, 1g', 'Sodium azide, powder, GPR, 1g', '', NULL, NULL, NULL, 'supplies_laboratory'),
(586, '80', 0, 0, 0, 0, 'Sphygmomanometer, anaeroid,  each', 'Sphygmomanometer, anaeroid,  each', '35000', NULL, NULL, NULL, 'supplies_laboratory'),
(587, '81', 0, 0, 0, 0, 'Stethoscope, Litman type,each', 'Stethoscope, Litman type,each', '12000', NULL, NULL, NULL, 'supplies_laboratory'),
(588, '82', 0, 0, 0, 0, 'Suture, Nylon Monofilament 1, 100m, sterile, roll', 'Suture, Nylon Monofilament 1, 100m, sterile, roll', '15000', NULL, NULL, NULL, 'supplies_laboratory'),
(589, '83', 0, 0, 0, 0, 'Suture, Nylon Monofilament 2/0, 100m, sterile, roll', 'Suture, Nylon Monofilament 2/0, 100m, sterile, roll', '15000', NULL, NULL, NULL, 'supplies_laboratory'),
(590, '84', 0, 0, 0, 0, 'Suture, Prolene, 0, needle, sterile, dozen', 'Suture, Prolene, 0, needle, sterile, dozen', '35000', NULL, NULL, NULL, 'supplies_laboratory'),
(591, '85', 0, 0, 0, 0, 'Suture, Prolene, 1/0, needle, sterile, dozen', 'Suture, Prolene, 1/0, needle, sterile, dozen', '35000', NULL, NULL, NULL, 'supplies_laboratory'),
(592, '86', 0, 0, 0, 0, 'Suture, Prolene, 2/0, needle, sterile, dozen', 'Suture, Prolene, 2/0, needle, sterile, dozen', '35000', NULL, NULL, NULL, 'supplies_laboratory'),
(593, '87', 0, 0, 0, 0, 'Suture, Prolene, 3/0, needle, sterile, dozen', 'Suture, Prolene, 3/0, needle, sterile, dozen', '35000', NULL, NULL, NULL, 'supplies_laboratory'),
(594, '88', 0, 0, 0, 0, 'Suture, Prolene, 4, cutting needle, sterile, dozen', 'Suture, Prolene, 4, cutting needle, sterile, dozen', '35000', NULL, NULL, NULL, 'supplies_laboratory'),
(595, '89', 0, 0, 0, 0, 'Suture, Silk braided, 0, needle, sterile, dozen', 'Suture, Silk braided, 0, needle, sterile, dozen', '15000', NULL, NULL, NULL, 'supplies_laboratory'),
(596, '90', 0, 0, 0, 0, 'Suture, Silk braided, 1, needle, sterile, dozen', 'Suture, Silk braided, 1, needle, sterile, dozen', '15000', NULL, NULL, NULL, 'supplies_laboratory'),
(597, '91', 0, 0, 0, 0, 'Suture, Silk braided, 2, needle, sterile, dozen', 'Suture, Silk braided, 2, needle, sterile, dozen', '15000', NULL, NULL, NULL, 'supplies_laboratory'),
(598, '92', 0, 0, 0, 0, 'Suture, Silk braided, 2/0, needle, sterile, dozen', 'Suture, Silk braided, 2/0, needle, sterile, dozen', '15000', NULL, NULL, NULL, 'supplies_laboratory'),
(599, '93', 0, 0, 0, 0, 'Suture, Silk braided, 3/0, needle, sterile, dozen', 'Suture, Silk braided, 3/0, needle, sterile, dozen', '15000', NULL, NULL, NULL, 'supplies_laboratory'),
(600, '94', 0, 0, 0, 0, 'Syringe, disposable with 25G needle, 1 cc, sterile, /100', 'Syringe, disposable with 25G needle, 1 cc, sterile, /100', '7500', NULL, NULL, NULL, 'supplies_laboratory'),
(601, '95', 0, 0, 0, 0, 'Tape, Plastic Adhesive clear 75cm x 9.1m, roll', 'Tape, Plastic Adhesive clear 75cm x 9.1m, roll', '', NULL, NULL, NULL, 'supplies_laboratory'),
(602, '96', 0, 0, 0, 0, 'Test Tubes, Glass,Heat Resistant, 150mmx15mm, each', 'Test Tubes, Glass,Heat Resistant, 150mmx15mm, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(603, '97', 0, 0, 0, 0, 'Theatre Boots, Size 10, pair', 'Theatre Boots, Size 10, pair', '', NULL, NULL, NULL, 'supplies_laboratory'),
(604, '98', 0, 0, 0, 0, 'Theatre Boots, Size 11, pair', 'Theatre Boots, Size 11, pair', '', NULL, NULL, NULL, 'supplies_laboratory'),
(605, '99', 0, 0, 0, 0, 'Theatre Boots, Size 12, pair', 'Theatre Boots, Size 12, pair', '', NULL, NULL, NULL, 'supplies_laboratory'),
(606, '100', 0, 0, 0, 0, 'Theatre Boots, Size 8, pair', 'Theatre Boots, Size 8, pair', '', NULL, NULL, NULL, 'supplies_laboratory'),
(607, '101', 0, 0, 0, 0, 'Turk''s solution,500ml', 'Turk''s solution,500ml', '', NULL, NULL, NULL, 'supplies_laboratory'),
(608, '102', 0, 0, 0, 0, 'Typing antisera, Vibrio cholerae, Polyvalent,     2ml', 'Typing antisera, Vibrio cholerae, Polyvalent,     2ml', '', NULL, NULL, NULL, 'supplies_laboratory'),
(609, '103', 0, 0, 0, 0, 'Urea in Blood, Test Strips, 25 Strips', 'Urea in Blood, Test Strips, 25 Strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(610, '104', 0, 0, 0, 0, 'Urea in Blood, test strips, Reflotron, 25 Strips', 'Urea in Blood, test strips, Reflotron, 25 Strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(611, '105', 0, 0, 0, 0, 'Uric Acid in blood, test strips, Reflotron, 25 Strips', 'Uric Acid in blood, test strips, Reflotron, 25 Strips', '', NULL, NULL, NULL, 'supplies_laboratory'),
(612, '106', 0, 0, 0, 0, 'WBC Diluting Pipettes, Glass, each', 'WBC Diluting Pipettes, Glass, each', '', NULL, NULL, NULL, 'supplies_laboratory'),
(613, '107', 0, 0, 0, 0, 'Widal Test Kit, kit of 100 tests', 'Widal Test Kit, kit of 100 tests', '15000', NULL, NULL, NULL, 'supplies_laboratory'),
(614, '108', 0, 0, 0, 0, 'X-Ray, Dental Developer, Powder, Pack for 20 L,', 'X-Ray, Dental Developer, Powder, Pack for 20 L,', '35000', NULL, NULL, NULL, 'supplies_laboratory'),
(615, '1', 0, 0, 0, 0, 'Acetazolamide Tablet 250mg', 'Acetazolamide Tablet 250mg', '120', '0', '0', '0', 'special_others_list'),
(616, '2', 0, 0, 0, 0, 'Aethoxyskerol (Polidocanol) 1% Injection, 30ml Vial', 'Aethoxyskerol (Polidocanol) 1% Injection, 30ml Vial', '', NULL, NULL, NULL, 'special_others_list'),
(617, '3', 0, 0, 0, 0, 'Augmentin Suspension 400mg/5ml , 100ml', 'Augmentin Suspension 400mg/5ml , 100ml', '7500', NULL, NULL, NULL, 'special_others_list'),
(618, '5', 0, 0, 0, 0, 'Bifanazole 1% Solution, 15 ml Bottle', 'Bifanazole 1% Solution, 15 ml Bottle', '7000', NULL, NULL, NULL, 'special_others_list'),
(619, '6', 0, 0, 0, 0, 'Cefazolin Injection, 1g Vial', 'Cefazolin Injection, 1g Vial', '1500', NULL, NULL, NULL, 'special_others_list'),
(620, '8', 0, 0, 0, 0, 'Cyclophosphamide, 1g Vial', 'Cyclophosphamide, 1g Vial', '', NULL, NULL, NULL, 'special_others_list'),
(621, '9', 0, 0, 0, 0, 'Dextran 70% in Normal Saline (60mg+9mg): Plasma Expander, 500ml', 'Dextran 70% in Normal Saline (60mg+9mg): Plasma Expander, 500ml', '', NULL, NULL, NULL, 'special_others_list'),
(622, '10', 0, 0, 0, 0, 'Diclofenac Suppositories 500mg depo-caps', 'Diclofenac Suppositories 500mg depo-caps', '', NULL, NULL, NULL, 'special_others_list'),
(623, '11', 0, 0, 0, 0, 'Ethanolamine Injection, 5ml Ampoule', 'Ethanolamine Injection, 5ml Ampoule', '12000', NULL, NULL, NULL, 'special_others_list'),
(624, '13', 0, 0, 0, 0, 'H.I.B. Vaccine (Single dose), Ampoule', 'H.I.B. Vaccine (Single dose), Ampoule', '18500', NULL, NULL, NULL, 'special_others_list'),
(625, '15', 0, 0, 0, 0, 'Insulin Insulatard HM 100 IU Inj, 10ml Vial', 'Insulin Insulatard HM 100 IU Inj, 10ml Vial', '', NULL, NULL, NULL, 'special_others_list'),
(626, '17', 0, 0, 0, 0, 'Liquid Paraffin Medicinal, 100ml Bottle', 'Liquid Paraffin Medicinal, 100ml Bottle', '', NULL, NULL, NULL, 'special_others_list'),
(627, '18', 0, 0, 0, 0, 'M.M.R. Vaccine (Single dose) Ampoule', 'M.M.R. Vaccine (Single dose) Ampoule', '', NULL, NULL, NULL, 'special_others_list'),
(628, '20', 0, 0, 0, 0, 'Penicillin, Benzathine Benzyl 1.2MU/vial Injection , Vial', 'Penicillin, Benzathine Benzyl 1.2MU/vial Injection , Vial', '', NULL, NULL, NULL, 'special_others_list'),
(629, '21', 0, 0, 0, 0, 'Pilocarpine Nitrate 0.5% Eye Drops, 10ml Bottle', 'Pilocarpine Nitrate 0.5% Eye Drops, 10ml Bottle', '', NULL, NULL, NULL, 'special_others_list'),
(630, '23', 0, 0, 0, 0, 'Potassium Chloride Injection 8.4% , Vial', 'Potassium Chloride Injection 8.4% , Vial', '800', NULL, NULL, NULL, 'special_others_list'),
(631, '24', 0, 0, 0, 0, 'Sodium Bicarbonate 8.4% , 10ml Vial', 'Sodium Bicarbonate 8.4% , 10ml Vial', '800', NULL, NULL, NULL, 'special_others_list'),
(632, '25', 0, 0, 0, 0, 'Vitamin B1 (Thiamine HCl) Tablet 50mg', 'Vitamin B1 (Thiamine HCl) Tablet 50mg', '', NULL, NULL, NULL, 'special_others_list'),
(633, '26', 0, 0, 0, 0, 'Yellow Fever Vaccine, 20 doses, Vial', 'Yellow Fever Vaccine, 20 doses, Vial', '', NULL, NULL, NULL, 'special_others_list'),
(634, '1', 1, 1, 0, 0, 'Acetysalicylic Acid (Aspirin) Tablet 300mg', 'Acetysalicylic Acid (Aspirin) Tablet 300mg', '10', NULL, NULL, NULL, 'drug_list'),
(636, '12', 1, 1, 0, 0, 'Amodiaquine Tablet 200mg', 'Amodiaquine Tablet 200mg', '50', '0', '0', '0', 'drug_list'),
(637, '14', 1, 1, 0, 0, 'Amoxicillin Capsule 250mg', 'Amoxicillin Capsule 250mg', '50', '0', '0', '0', 'drug_list'),
(638, '32', 1, 1, 0, 0, 'Azithromycin Tablet 250mg', 'Azithromycin Tablet 250mg', '800', NULL, NULL, NULL, 'drug_list'),
(639, '46', 1, 1, 0, 0, 'Carbamazepine Tablet 200mg', 'Carbamazepine Tablet 200mg', '200', '0', '0', '0', 'drug_list'),
(640, '53', 1, 1, 0, 0, 'Cephalexin Tablets 250mg', 'Cephalexin Tablets 250mg', '300', '0', '0', '0', 'drug_list'),
(641, '62', 1, 1, 0, 0, 'Chlorpheniramine Maleate Tablet 4mg', 'Chlorpheniramine Maleate Tablet 4mg', '10', NULL, NULL, NULL, 'drug_list'),
(642, '74', 1, 1, 0, 0, 'Cloxacillin Capsule 250mg', 'Cloxacillin Capsule 250mg', '50', '0', '0', '0', 'drug_list'),
(643, '79', 1, 1, 0, 0, 'Cotrimoxazole Tablet 480mg', 'Cotrimoxazole Tablet 480mg', '25', '0', '0', '0', 'drug_list'),
(644, '110', 1, 1, 0, 0, 'Erythromycin Tablet 250mg', 'Erythromycin Tablet 250mg', '60', '0', '0', '0', 'drug_list'),
(645, '114', 1, 1, 0, 0, 'Ferrous Sulphate  -Folic Acid Tablet 200mg+0.25mg', 'Ferrous Sulphate  -Folic Acid Tablet 200mg+0.25mg', '20', '0', '0', '0', 'drug_list'),
(646, '118', 1, 1, 0, 0, 'Folic Acid Tablet 5mg', 'Folic Acid Tablet 5mg', '10', NULL, NULL, NULL, 'drug_list'),
(647, '141', 1, 1, 0, 0, 'Ibuprofen Tablet 200mg', 'Ibuprofen Tablet 200mg', '10', NULL, NULL, NULL, 'drug_list'),
(1074, '300', 0, 0, 0, 0, 'Depo Provera', '', '', NULL, NULL, NULL, 'drug_list'),
(1075, '301', 1, 1, 0, 0, 'Metronidazole tabl 200mg', '', '20', NULL, NULL, NULL, 'drug_list'),
(649, '179', 1, 1, 0, 0, 'Multi-Vitamin tabs', 'Multi-Vitamin tabs', '20', '0', '0', '0', 'drug_list'),
(650, '191', 1, 1, 0, 0, 'Nystatin 100000iu/ml Suspension, 30ml', 'Nystatin 100000iu/ml Suspension, 30ml', '2000', NULL, NULL, NULL, 'drug_list'),
(651, '194', 1, 1, 0, 0, 'Oral Rehydration Powder pro Liter Solution, Satchet', 'Oral Rehydration Powder pro Liter Solution, Satchet', '500', NULL, NULL, NULL, 'drug_list'),
(652, '210', 1, 1, 0, 0, 'Phenobarbitone Tablet 30mg', 'Phenobarbitone Tablet 30mg', '20', '0', '0', '0', 'drug_list'),
(653, '216', 1, 1, 0, 0, 'Prednisolone Tablet 5mg', 'Prednisolone Tablet 5mg', '25', NULL, NULL, NULL, 'drug_list'),
(654, '227', 1, 1, 0, 0, 'Quinine Sulphate Tablet 300mg', 'Quinine Sulphate Tablet 300mg', '40', NULL, NULL, NULL, 'drug_list'),
(655, '232', 1, 1, 0, 0, 'Salbutamol Tablet 4mg', 'Salbutamol Tablet 4mg', '20', '0', '0', '0', 'drug_list'),
(656, '241', 1, 1, 0, 0, 'Sulphadoxine-Pyrimethamine Suspension (250mg +12.5mg)/5ml, 15ml Bottle', 'Sulphadoxine-Pyrimethamine Suspension (250mg +12.5mg)/5ml, 15ml Bottle', '500', NULL, NULL, NULL, 'drug_list'),
(657, '259', 1, 1, 0, 0, 'Vitamin B Complex Injection, 10ml Vial', 'Vitamin B Complex Injection, 10ml Vial', '1000', NULL, NULL, NULL, 'drug_list'),
(658, '262', 1, 1, 0, 0, 'Vitamin B12 (Cyanocobalamine) Injection 1mg/ml, 1ml Ampoule', 'Vitamin B12 (Cyanocobalamine) Injection 1mg/ml, 1ml Ampoule', '500', NULL, NULL, NULL, 'drug_list'),
(661, 'P01', 0, 0, 0, 0, 'Bronchoscopy', '', '15000', NULL, NULL, NULL, 'smallop'),
(662, 'P02', 0, 0, 0, 0, 'Colonoscopy', '', '15000', NULL, NULL, NULL, 'smallop'),
(663, 'P03', 0, 0, 0, 0, 'Cystoscopy', '', '20000', NULL, NULL, NULL, 'smallop'),
(664, 'P04', 0, 0, 0, 0, 'Laryngoscopy', '', '5000', NULL, NULL, NULL, 'smallop'),
(665, 'P05', 0, 0, 0, 0, 'Proctosigmoidoscopy', '', '15000', NULL, NULL, NULL, 'smallop'),
(666, 'P06', 0, 0, 0, 0, 'Upper Gastointestinal', '', '15000', NULL, NULL, NULL, 'smallop'),
(667, 'P11', 0, 0, 0, 0, 'Lumbar Puncture', '', '3000', NULL, NULL, NULL, 'smallop'),
(668, 'P12', 0, 0, 0, 0, 'Thoracentesis', '', '5000', NULL, NULL, NULL, 'smallop'),
(669, 'P13', 0, 0, 0, 0, 'Paracentesis', '', '5000', NULL, NULL, NULL, 'smallop'),
(670, 'P14', 0, 0, 0, 0, 'Arthrocentesis', '', '5000', NULL, NULL, NULL, 'smallop'),
(671, 'P15', 0, 0, 0, 0, 'Suprapubic Tap', '', '3000', NULL, NULL, NULL, 'smallop'),
(672, 'P16', 0, 0, 0, 0, 'Needle Biopsy', '', '3000', NULL, NULL, NULL, 'smallop'),
(673, 'P21', 0, 0, 0, 0, 'Suturing 1 - 2 cm.', '', '4000', NULL, NULL, NULL, 'smallop'),
(674, 'P22', 0, 0, 0, 0, 'Suturing 2 -4 cm.', '', '6000', NULL, NULL, NULL, 'smallop'),
(675, 'P23', 0, 0, 0, 0, 'Suturing 4 -8 cm.', '', '8000', NULL, NULL, NULL, 'smallop'),
(676, 'P24', 0, 0, 0, 0, 'More than 8 cm', '', '10000', NULL, NULL, NULL, 'smallop'),
(677, 'P25', 0, 0, 0, 0, 'Suture removal', '', '2000', NULL, NULL, NULL, 'smallop'),
(678, 'P26', 0, 0, 0, 0, 'Gastric Lavage', '', '5000', NULL, NULL, NULL, 'smallop'),
(679, 'P27', 0, 0, 0, 0, 'Fracture  closed reduction', '', '5000', NULL, NULL, NULL, 'smallop'),
(680, 'P28', 0, 0, 0, 0, 'P O P (Roll)', '', '1000', NULL, NULL, NULL, 'smallop'),
(681, 'P29', 0, 0, 0, 0, 'Foreign body removal-Ear/N', '', '3000', NULL, NULL, NULL, 'smallop'),
(682, 'P30', 0, 0, 0, 0, 'Oxygen-anywhere per Day', '', '1000', NULL, NULL, NULL, 'smallop'),
(683, 'P31', 0, 0, 0, 0, 'Dressing Minor', '', '2000', NULL, NULL, NULL, 'smallop'),
(684, 'P32', 0, 0, 0, 0, 'Dressing Major', '', '3000', NULL, NULL, NULL, 'smallop'),
(685, 'P33', 0, 0, 0, 0, 'Dressing under anaesthesia', '', '5000', NULL, NULL, NULL, 'smallop'),
(686, 'R01', 0, 0, 0, 0, 'Registration-New ', 'Registration - New 1000Tsh', '1000', '0', '0', '0', 'service'),
(687, 'R02', 0, 0, 0, 0, 'Registration-Return', 'Registration - return 0 Tsh', '0', '0', '0', '0', 'service'),
(1021, '270', 1, 0, 0, 0, 'Azithromycin 200mg/5ml,30ml', '', '6000', NULL, NULL, NULL, 'drug_list'),
(689, 'R04', 0, 0, 0, 0, 'Specialist Visit outside of clinic times', 'Specialist Visit outside of clinic times', '4000', NULL, NULL, NULL, 'service'),
(690, 'R05', 0, 0, 0, 0, 'Special Charges (Doctor sets)', 'Special Charges (Doctor sets)', '0', NULL, NULL, NULL, 'service'),
(691, 'C01', 0, 0, 0, 0, 'Consultation - Specialty Clinic', 'Consultation - Specialty Clinic', '10000', NULL, NULL, NULL, 'service'),
(692, 'C02', 0, 0, 0, 0, 'Consultation - Eye', 'Consultation - Eye', '10000', NULL, NULL, NULL, 'service'),
(1040, '290', 0, 0, 0, 1, 'Niverapine 200mg', '', '0', NULL, NULL, NULL, 'drug_list'),
(1041, '291', 0, 0, 0, 1, 'Niverapine  Syrup 240ml', '', '0', NULL, NULL, NULL, 'drug_list'),
(695, 'C05', 0, 0, 0, 0, 'Consultation 4000', 'Consultation 4000', '4000', NULL, NULL, NULL, 'service'),
(696, 'C06', 0, 0, 0, 0, 'Consultation 7500', 'Consultation 7500', '7500', NULL, NULL, NULL, 'service'),
(697, 'C07', 0, 0, 0, 0, 'Consultation 10000', 'Consultation 10000', '10000', NULL, NULL, NULL, 'service'),
(1069, 'Dental 2', 0, 0, 0, 0, 'Temporary dressing', '', '8000', NULL, NULL, NULL, 'dental');
INSERT INTO care_tz_drugsandservices (item_id, item_number, is_pediatric, is_adult, is_other, is_consumable, item_description, item_full_description, unit_price, unit_price_1, unit_price_2, unit_price_3, purchasing_class) VALUES
(1037, '288', 0, 0, 0, 1, 'Lamivudine 150mg', '', '0', NULL, NULL, NULL, 'drug_list'),
(1039, '289', 0, 0, 0, 1, 'Lamivudine Syrup 100ml', '', '0', NULL, NULL, NULL, 'drug_list'),
(1042, '292', 0, 0, 0, 1, 'Stavudine 30mg', '', '0', NULL, NULL, NULL, 'drug_list'),
(1049, 'Dental 3', 0, 1, 0, 0, 'GIC restoration', 'Glass Ionomer Cements', '15000', NULL, NULL, NULL, 'dental'),
(1022, '271', 0, 1, 0, 0, 'Augumentin 625mg(pack of 14)', '', '30000', '0', '0', '0', 'drug_list'),
(1023, '272', 1, 0, 0, 0, 'Augumentin syrup', '', '6000', NULL, NULL, NULL, 'drug_list'),
(1070, 'Dental 1', 0, 0, 0, 0, 'Extraction, permanent', '', '8000', NULL, NULL, NULL, 'dental'),
(1073, '299', 0, 0, 0, 0, 'Primolut -N', '', '500', NULL, NULL, NULL, 'drug_list'),
(1044, '294', 0, 0, 0, 1, 'Triomune 30', '', '0', NULL, NULL, NULL, 'drug_list'),
(712, 'X01', 0, 0, 0, 0, 'Chest X-Ray', '', '7500', '0', '0', '0', 'xray'),
(713, 'X02', 0, 0, 0, 0, 'Upper Extremities', '', '7500', '0', '0', '0', 'xray'),
(714, 'X03', 0, 0, 0, 0, 'KUB', '', '7500', '0', '0', '0', 'xray'),
(715, 'X04', 0, 0, 0, 0, 'Upright Abdomen', '', '7500', '0', '0', '0', 'xray'),
(716, 'X05', 0, 0, 0, 0, 'Skull', '', '7500', '0', '0', '0', 'xray'),
(717, 'X06', 0, 0, 0, 0, 'Pelvis/Hip joint', '', '7500', '0', '0', '0', 'xray'),
(718, 'X07', 0, 0, 0, 0, 'IVP', '', '40000', '0', '0', '0', 'xray'),
(719, 'X08', 0, 0, 0, 0, 'Barium Enema', '', '30000', '0', '0', '0', 'xray'),
(720, 'X09', 0, 0, 0, 0, 'Cystogram', '', '30000', '0', '0', '0', 'xray'),
(721, 'X10', 0, 0, 0, 0, 'Utrasound', '', '10000', '0', '0', '0', 'xray'),
(722, 'X11', 0, 0, 0, 0, 'UGI', '', '30000', '0', '0', '0', 'xray'),
(723, 'X12', 0, 0, 0, 0, 'ECG', '', '10000', '0', '0', '0', 'xray'),
(724, 'OP02', 0, 0, 0, 0, 'Abdominal Laparoscopy', '', '35000', NULL, NULL, NULL, 'bigop'),
(725, 'OP03', 0, 0, 0, 0, 'Abdominal Wall Tumor Excision', '', '30000', NULL, NULL, NULL, 'bigop'),
(726, 'OP04', 0, 0, 0, 0, 'Abdomino-perineal resection', '', '70000', NULL, NULL, NULL, 'bigop'),
(727, 'OP05', 0, 0, 0, 0, 'Adrenalectomy', '', '60000', NULL, NULL, NULL, 'bigop'),
(728, 'OP06', 0, 0, 0, 0, 'Amputation - Above Knee', '', '40000', NULL, NULL, NULL, 'bigop'),
(729, 'OP07', 0, 0, 0, 0, 'Amputation - Below Knee', '', '40000', NULL, NULL, NULL, 'bigop'),
(730, 'OP08', 0, 0, 0, 0, 'Amputation - finger or toe', '', '15000', NULL, NULL, NULL, 'bigop'),
(731, 'OP09', 0, 0, 0, 0, 'Amputation - metacarpal', '', '20000', NULL, NULL, NULL, 'bigop'),
(732, 'OP10', 0, 0, 0, 0, 'Amputation - metasarsal', '', '20000', NULL, NULL, NULL, 'bigop'),
(733, 'OP11', 0, 0, 0, 0, 'Amputation - upper extremity, arm, hand', '', '40000', NULL, NULL, NULL, 'bigop'),
(734, 'OP12', 0, 0, 0, 0, 'Anal Condylomata Destruction', '', '10000', NULL, NULL, NULL, 'bigop'),
(735, 'OP13', 0, 0, 0, 0, 'Anal Tag Excision', '', '10000', NULL, NULL, NULL, 'bigop'),
(736, 'OP14', 0, 0, 0, 0, 'Appendectomy', '', '35000', NULL, NULL, NULL, 'bigop'),
(737, 'OP15', 0, 0, 0, 0, 'Appendectomy & drainage of abscess', '', '45000', NULL, NULL, NULL, 'bigop'),
(738, 'OP16', 0, 0, 0, 0, 'Arterotomy or Venotomy for thrombus removal', '', '30000', NULL, NULL, NULL, 'bigop'),
(739, 'OP17', 0, 0, 0, 0, 'Arthrodesis', '', '40000', NULL, NULL, NULL, 'bigop'),
(740, 'OP18', 0, 0, 0, 0, 'Arthrotomy', '', '20000', NULL, NULL, NULL, 'bigop'),
(741, 'OP19', 0, 0, 0, 0, 'Austin Moore Prosthesis', '', '250000', NULL, NULL, NULL, 'bigop'),
(742, 'OP20', 0, 0, 0, 0, 'Bartholin Cyst - Excision or marsupializatio', '', '20000', NULL, NULL, NULL, 'bigop'),
(743, 'OP21', 0, 0, 0, 0, 'Bladder Laceration - Repair', '', '35000', NULL, NULL, NULL, 'bigop'),
(744, 'OP22', 0, 0, 0, 0, 'Bladder Polyps - Excision', '', '30000', NULL, NULL, NULL, 'bigop'),
(745, 'OP23', 0, 0, 0, 0, 'Branchial cleft cyst - Excision', '', '30000', NULL, NULL, NULL, 'bigop'),
(746, 'OP24', 0, 0, 0, 0, 'Breast - Fine Needle Aspiration', '', '5000', NULL, NULL, NULL, 'bigop'),
(747, 'OP25', 0, 0, 0, 0, 'Breast - I&D', '', '8000', NULL, NULL, NULL, 'bigop'),
(748, 'OP26', 0, 0, 0, 0, 'Breast Biopsy - benign cysts', '', '15000', NULL, NULL, NULL, 'bigop'),
(749, 'OP27', 0, 0, 0, 0, 'Buccal mucosa  benign tumors or cysts - exci', '', '20000', NULL, NULL, NULL, 'bigop'),
(750, 'OP28', 0, 0, 0, 0, 'Burn Debridement under anesthesia - major', '', '10000', NULL, NULL, NULL, 'bigop'),
(751, 'OP29', 0, 0, 0, 0, 'Burn Debridement under anesthesia - simple', '', '5000', NULL, NULL, NULL, 'bigop'),
(752, 'OP30', 0, 0, 0, 0, 'Burr hole and evacuation of epidural clot.', '', '40000', NULL, NULL, NULL, 'bigop'),
(753, 'OP31', 0, 0, 0, 0, 'Caesarian Section - Emergency', '', '30000', NULL, NULL, NULL, 'bigop'),
(754, 'OP32', 0, 0, 0, 0, 'Caesarian Section - Elective', '', '40000', NULL, NULL, NULL, 'bigop'),
(755, 'OP33', 0, 0, 0, 0, 'Carpal Tunnel Release', '', '10000', NULL, NULL, NULL, 'bigop'),
(756, 'OP34', 0, 0, 0, 0, 'Cataract extraction', '', '45000', NULL, NULL, NULL, 'bigop'),
(757, 'OP35', 0, 0, 0, 0, 'Cautery of Hypertrophied Turbinates.', '', '8000', NULL, NULL, NULL, 'bigop'),
(758, 'OP36', 0, 0, 0, 0, 'Cerclage', '', '20000', NULL, NULL, NULL, 'bigop'),
(759, 'OP37', 0, 0, 0, 0, 'Cervical Biopsy', '', '10000', NULL, NULL, NULL, 'bigop'),
(760, 'OP38', 0, 0, 0, 0, 'Cervical Cautery', '', '10000', NULL, NULL, NULL, 'bigop'),
(761, 'OP39', 0, 0, 0, 0, 'Cholecystectomy', '', '60000', NULL, NULL, NULL, 'bigop'),
(762, 'OP40', 0, 0, 0, 0, 'Cholecystectomy & Common Bile Duct Explorati', '', '70000', NULL, NULL, NULL, 'bigop'),
(763, 'OP41', 0, 0, 0, 0, 'Cholecystostomy', '', '40000', NULL, NULL, NULL, 'bigop'),
(764, 'OP42', 0, 0, 0, 0, 'Circumcision - Adult', '', '10000', NULL, NULL, NULL, 'bigop'),
(765, 'OP43', 0, 0, 0, 0, 'Cleft Lip Plus Palate repair', '', '55000', NULL, NULL, NULL, 'bigop'),
(766, 'OP44', 0, 0, 0, 0, 'Cleft lip repair - unilateral', '', '30000', NULL, NULL, NULL, 'bigop'),
(767, 'OP45', 0, 0, 0, 0, 'Cleft Palate Repair', '', '45000', NULL, NULL, NULL, 'bigop'),
(768, 'OP46', 0, 0, 0, 0, 'Colectomy - Hemi', '', '55000', NULL, NULL, NULL, 'bigop'),
(769, 'OP47', 0, 0, 0, 0, 'Colectomy - Total', '', '65000', NULL, NULL, NULL, 'bigop'),
(770, 'OP48', 0, 0, 0, 0, 'Colostomy - End', '', '35000', NULL, NULL, NULL, 'bigop'),
(771, 'OP49', 0, 0, 0, 0, 'Colostomy - Loop', '', '30000', NULL, NULL, NULL, 'bigop'),
(772, 'OP50', 0, 0, 0, 0, 'Colostomy - Takedown', '', '45000', NULL, NULL, NULL, 'bigop'),
(773, 'OP51', 0, 0, 0, 0, 'Corporrhaphy - Anterior only', '', '30000', NULL, NULL, NULL, 'bigop'),
(774, 'OP52', 0, 0, 0, 0, 'Corporrhaphy - Posterior only', '', '30000', NULL, NULL, NULL, 'bigop'),
(775, 'OP53', 0, 0, 0, 0, 'Corporrhaphy (Anterior plus Posterior)', '', '50000', NULL, NULL, NULL, 'bigop'),
(776, 'OP54', 0, 0, 0, 0, 'Crainiotomy for subdural hematoma.', '', '50000', NULL, NULL, NULL, 'bigop'),
(777, 'OP55', 0, 0, 0, 0, 'Cystectomy - Partial', '', '40000', NULL, NULL, NULL, 'bigop'),
(778, 'OP56', 0, 0, 0, 0, 'Cystocoele-rectocoele repair', '', '45000', NULL, NULL, NULL, 'bigop'),
(779, 'OP57', 0, 0, 0, 0, 'Cystostomy - Tube', '', '25000', NULL, NULL, NULL, 'bigop'),
(780, 'OP58', 0, 0, 0, 0, 'Cystotomy for stone removal', '', '35000', NULL, NULL, NULL, 'bigop'),
(781, 'OP59', 0, 0, 0, 0, 'Delivery - complicated', '', '15000', NULL, NULL, NULL, 'bigop'),
(782, 'OP60', 0, 0, 0, 0, 'Dilatation &Currettage (diagnostic)', '', '10000', NULL, NULL, NULL, 'bigop'),
(783, 'OP61', 0, 0, 0, 0, 'Dilatation and Currettage for incomplete or', '', '15000', NULL, NULL, NULL, 'bigop'),
(784, 'OP62', 0, 0, 0, 0, 'Dislocation - Elbow Closed', '', '5000', NULL, NULL, NULL, 'bigop'),
(785, 'OP63', 0, 0, 0, 0, 'Dislocation - Finger Closed', '', '5000', NULL, NULL, NULL, 'bigop'),
(786, 'OP64', 0, 0, 0, 0, 'Dislocation - Hip Closed', '', '10000', NULL, NULL, NULL, 'bigop'),
(787, 'OP65', 0, 0, 0, 0, 'Dislocation - Patellar Closed', '', '5000', NULL, NULL, NULL, 'bigop'),
(788, 'OP66', 0, 0, 0, 0, 'Dislocation - Shoulder', '', '10000', NULL, NULL, NULL, 'bigop'),
(789, 'OP67', 0, 0, 0, 0, 'Dorsal slit for paraphimosis', '', '5000', NULL, NULL, NULL, 'bigop'),
(790, 'OP68', 0, 0, 0, 0, 'Dressings - Burn (requiring anaesthesia)', '', '7000', NULL, NULL, NULL, 'bigop'),
(791, 'OP69', 0, 0, 0, 0, 'Dressings - Major', '', '5000', NULL, NULL, NULL, 'bigop'),
(792, 'OP70', 0, 0, 0, 0, 'Dressings - Minor', '', '3000', NULL, NULL, NULL, 'bigop'),
(793, 'OP71', 0, 0, 0, 0, 'Duodenotomy and suture of  bleeding ulcer', '', '40000', NULL, NULL, NULL, 'bigop'),
(794, 'OP72', 0, 0, 0, 0, 'Elevation of depressed skull fracture.', '', '50000', NULL, NULL, NULL, 'bigop'),
(795, 'OP73', 0, 0, 0, 0, 'Enterolysis for obstruction', '', '50000', NULL, NULL, NULL, 'bigop'),
(796, 'OP74', 0, 0, 0, 0, 'Epiphyseal Destruction', '', '25000', NULL, NULL, NULL, 'bigop'),
(797, 'OP75', 0, 0, 0, 0, 'Esophageal Bouginage Dilitation', '', '20000', NULL, NULL, NULL, 'bigop'),
(798, 'OP76', 0, 0, 0, 0, 'Esophageal Fundoplication', '', '60000', NULL, NULL, NULL, 'bigop'),
(799, 'OP77', 0, 0, 0, 0, 'Excision of Benign Bone or Cartilaginous Tum', '', '35000', NULL, NULL, NULL, 'bigop'),
(800, 'OP78', 0, 0, 0, 0, 'Excision of ingrown toenail', '', '7000', NULL, NULL, NULL, 'bigop'),
(801, 'OP79', 0, 0, 0, 0, 'Eye lid tarrsorrhaphy', '', '10000', NULL, NULL, NULL, 'bigop'),
(802, 'OP80', 0, 0, 0, 0, 'Fasciotomy for Compartment Syndrome', '', '10000', NULL, NULL, NULL, 'bigop'),
(803, 'OP81', 0, 0, 0, 0, 'Fissurectomy & Sphincterotomy', '', '25000', NULL, NULL, NULL, 'bigop'),
(804, 'OP82', 0, 0, 0, 0, 'Fistulectomy - simple', '', '25000', NULL, NULL, NULL, 'bigop'),
(805, 'OP83', 0, 0, 0, 0, 'Fracture -  Open reduct & intl fix with  int', '', '40000', NULL, NULL, NULL, 'bigop'),
(806, 'OP84', 0, 0, 0, 0, 'Fracture -  Open reduct & intl fix with pins', '', '40000', NULL, NULL, NULL, 'bigop'),
(807, 'OP85', 0, 0, 0, 0, 'Fracture - Hip Pinning', '', '40000', NULL, NULL, NULL, 'bigop'),
(808, 'OP86', 0, 0, 0, 0, 'Fracture - Simple reduction & application of', '', '10000', NULL, NULL, NULL, 'bigop'),
(809, 'OP88', 0, 0, 0, 0, 'Ganglion Cyst Excision - finger', '', '5000', NULL, NULL, NULL, 'bigop'),
(810, 'OP89', 0, 0, 0, 0, 'Ganglion Cyst Excision - foot', '', '10000', NULL, NULL, NULL, 'bigop'),
(811, 'OP90', 0, 0, 0, 0, 'Ganglion Cyst Excision - other tendon site', '', '10000', NULL, NULL, NULL, 'bigop'),
(812, 'OP91', 0, 0, 0, 0, 'Ganglion Cyst Excision - wrist', '', '10000', NULL, NULL, NULL, 'bigop'),
(813, 'OP92', 0, 0, 0, 0, 'Gastrectomy - Partial', '', '65000', NULL, NULL, NULL, 'bigop'),
(814, 'OP93', 0, 0, 0, 0, 'Gastroenterostomy including Roux-en-Y.', '', '60000', NULL, NULL, NULL, 'bigop'),
(815, 'OP94', 0, 0, 0, 0, 'Gastrostomy', '', '30000', NULL, NULL, NULL, 'bigop'),
(816, 'OP95', 0, 0, 0, 0, 'Hartman Operation (sigmoid resection & colos', '', '65000', NULL, NULL, NULL, 'bigop'),
(817, 'OP96', 0, 0, 0, 0, 'Hemorrhoid - Excision of thrombosed', '', '25000', NULL, NULL, NULL, 'bigop'),
(818, 'OP97', 0, 0, 0, 0, 'Hemorrhoidectomy', '', '25000', NULL, NULL, NULL, 'bigop'),
(819, 'OP98', 0, 0, 0, 0, 'Hernia - Epigastric', '', '20000', NULL, NULL, NULL, 'bigop'),
(820, 'OP99', 0, 0, 0, 0, 'Hernia - Epigastric with bowel resection', '', '40000', NULL, NULL, NULL, 'bigop'),
(821, 'OP100', 0, 0, 0, 0, 'Hernia - Femoral', '', '25000', NULL, NULL, NULL, 'bigop'),
(822, 'OP101', 0, 0, 0, 0, 'Hernia - Femoral - with bowel resection', '', '50000', NULL, NULL, NULL, 'bigop'),
(823, 'OP102', 0, 0, 0, 0, 'Hernia - Inguinal UNILATERAL', '', '20000', NULL, NULL, NULL, 'bigop'),
(824, 'OP103', 0, 0, 0, 0, 'Hernia - Inguinal with bowel resection', '', '40000', NULL, NULL, NULL, 'bigop'),
(825, 'OP104', 0, 0, 0, 0, 'Hernia - Lumbar', '', '20000', NULL, NULL, NULL, 'bigop'),
(826, 'OP105', 0, 0, 0, 0, 'Hernia - Obturator', '', '25000', NULL, NULL, NULL, 'bigop'),
(827, 'OP106', 0, 0, 0, 0, 'Hernia - Obturator - with bowel resection', '', '50000', NULL, NULL, NULL, 'bigop'),
(828, 'OP107', 0, 0, 0, 0, 'Hernia - Umbilical', '', '15000', NULL, NULL, NULL, 'bigop'),
(829, 'OP108', 0, 0, 0, 0, 'Hernia - Umbilical - with bowel resection', '', '30000', NULL, NULL, NULL, 'bigop'),
(830, 'OP109', 0, 0, 0, 0, 'Hernia - Ventral or Incisional', '', '30000', NULL, NULL, NULL, 'bigop'),
(831, 'OP110', 0, 0, 0, 0, 'Hernia - Ventral or Incisional + bowel resec', '', '60000', NULL, NULL, NULL, 'bigop'),
(832, 'OP111', 0, 0, 0, 0, 'Hydrocoele or Spermatocoele Excision', '', '20000', NULL, NULL, NULL, 'bigop'),
(833, 'OP112', 0, 0, 0, 0, 'Hysterectomy - Subtotal', '', '50000', NULL, NULL, NULL, 'bigop'),
(834, 'OP113', 0, 0, 0, 0, 'Hysterectomy - Subtotal PLUS Bilateral Salpi', '', '55000', NULL, NULL, NULL, 'bigop'),
(835, 'OP114', 0, 0, 0, 0, 'Hysterectomy - Total', '', '65000', NULL, NULL, NULL, 'bigop'),
(836, 'OP115', 0, 0, 0, 0, 'Hysterectomy - Total PLUS Bilateral Salpingo', '', '70000', NULL, NULL, NULL, 'bigop'),
(837, 'OP116', 0, 0, 0, 0, 'Hysterectomy - Vag PLUS cystocoele-rectocoel', '', '70000', NULL, NULL, NULL, 'bigop'),
(838, 'OP117', 0, 0, 0, 0, 'Hysterectomy - Vaginal', '', '70000', NULL, NULL, NULL, 'bigop'),
(839, 'OP118', 0, 0, 0, 0, 'Hysterectomy PLUS Fibroid excision', '', '60000', NULL, NULL, NULL, 'bigop'),
(840, 'OP119', 0, 0, 0, 0, 'Ileostomy', '', '55000', NULL, NULL, NULL, 'bigop'),
(841, 'OP120', 0, 0, 0, 0, 'Ileotomy and removal of  foreign body', '', '40000', NULL, NULL, NULL, 'bigop'),
(842, 'OP121', 0, 0, 0, 0, 'Incision and drainage of subcutaneous absces', '', '5000', NULL, NULL, NULL, 'bigop'),
(843, 'OP122', 0, 0, 0, 0, 'Insertion of femoral or tibial pin for tract', '', '5000', NULL, NULL, NULL, 'bigop'),
(844, 'OP124', 0, 0, 0, 0, 'Keloid Surgery', '', '15000', NULL, NULL, NULL, 'bigop'),
(845, 'OP125', 0, 0, 0, 0, 'Kidney Laceration - Suture', '', '45000', NULL, NULL, NULL, 'bigop'),
(846, 'OP126', 0, 0, 0, 0, 'Lacrimal Duct Surgery', '', '30000', NULL, NULL, NULL, 'bigop'),
(847, 'OP127', 0, 0, 0, 0, 'Lid Tumors excision', '', '20000', NULL, NULL, NULL, 'bigop'),
(848, 'OP128', 0, 0, 0, 0, 'Lip lestions (cancer) - excision - complex', '', '25000', NULL, NULL, NULL, 'bigop'),
(849, 'OP129', 0, 0, 0, 0, 'Lip lestions (cancer) - excision - simple', '', '10000', NULL, NULL, NULL, 'bigop'),
(850, 'OP130', 0, 0, 0, 0, 'Liver -  Repair for traumatic laceration', '', '50000', NULL, NULL, NULL, 'bigop'),
(851, 'OP131', 0, 0, 0, 0, 'Liver - Partial resection of tumor', '', '50000', NULL, NULL, NULL, 'bigop'),
(852, 'OP132', 0, 0, 0, 0, 'Liver Excision and/or drainage of cysts', '', '50000', NULL, NULL, NULL, 'bigop'),
(853, 'OP133', 0, 0, 0, 0, 'Liver Incision and drainage of abscesses', '', '30000', NULL, NULL, NULL, 'bigop'),
(854, 'OP134', 0, 0, 0, 0, 'Liver Open biopsy', '', '15000', NULL, NULL, NULL, 'bigop'),
(855, 'OP135', 0, 0, 0, 0, 'Lymph node biopsy', '', '10000', NULL, NULL, NULL, 'bigop'),
(856, 'OP136', 0, 0, 0, 0, 'Mastectomy - Radical', '', '45000', NULL, NULL, NULL, 'bigop'),
(857, 'OP137', 0, 0, 0, 0, 'Mastectomy - Simple', '', '35000', NULL, NULL, NULL, 'bigop'),
(858, 'OP138', 0, 0, 0, 0, 'Meatotomy', '', '10000', NULL, NULL, NULL, 'bigop'),
(859, 'OP139', 0, 0, 0, 0, 'Muscle Abscess - Incision and  Drainage', '', '10000', NULL, NULL, NULL, 'bigop'),
(860, 'OP140', 0, 0, 0, 0, 'Nasal Polypectomy', '', '15000', NULL, NULL, NULL, 'bigop'),
(861, 'OP141', 0, 0, 0, 0, 'Nephrectomy', '', '45000', NULL, NULL, NULL, 'bigop'),
(862, 'OP142', 0, 0, 0, 0, 'Nephrolithotomy', '', '30000', NULL, NULL, NULL, 'bigop'),
(863, 'OP143', 0, 0, 0, 0, 'Nephrostomy', '', '35000', NULL, NULL, NULL, 'bigop'),
(864, 'OP144', 0, 0, 0, 0, 'Normal Vaginal Delivery', '', '12000', NULL, NULL, NULL, 'bigop'),
(865, 'OP145', 0, 0, 0, 0, 'Operation for removal of fixation devices', '', '25000', NULL, NULL, NULL, 'bigop'),
(866, 'OP146', 0, 0, 0, 0, 'Orchiectomy', '', '20000', NULL, NULL, NULL, 'bigop'),
(867, 'OP147', 0, 0, 0, 0, 'Osteotomy', '', '25000', NULL, NULL, NULL, 'bigop'),
(868, 'OP148', 0, 0, 0, 0, 'Ovaries - Wedge Resection', '', '40000', NULL, NULL, NULL, 'bigop'),
(869, 'OP149', 0, 0, 0, 0, 'Pancreas - Open needle or wedgy biopsy', '', '25000', NULL, NULL, NULL, 'bigop'),
(870, 'OP150', 0, 0, 0, 0, 'Pancreas - Surgery for Pseudocyst', '', '50000', NULL, NULL, NULL, 'bigop'),
(871, 'OP151', 0, 0, 0, 0, 'Paracentesis', '', '5000', NULL, NULL, NULL, 'bigop'),
(872, 'OP152', 0, 0, 0, 0, 'Parathyroidectomy', '', '55000', NULL, NULL, NULL, 'bigop'),
(873, 'OP153', 0, 0, 0, 0, 'Parotidectomy - Complete', '', '65000', NULL, NULL, NULL, 'bigop'),
(874, 'OP154', 0, 0, 0, 0, 'Parotidectomy - Partial', '', '60000', NULL, NULL, NULL, 'bigop'),
(875, 'OP155', 0, 0, 0, 0, 'Pedicle Grafts - 1st stage', '', '30000', NULL, NULL, NULL, 'bigop'),
(876, 'OP156', 0, 0, 0, 0, 'Pedicle Grafts - 2nd stage', '', '20000', NULL, NULL, NULL, 'bigop'),
(877, 'OP157', 0, 0, 0, 0, 'Penile biopsy', '', '5000', NULL, NULL, NULL, 'bigop'),
(878, 'OP158', 0, 0, 0, 0, 'Penis - amputation', '', '25000', NULL, NULL, NULL, 'bigop'),
(879, 'OP159', 0, 0, 0, 0, 'Penis Condylomata - Destruction', '', '10000', NULL, NULL, NULL, 'bigop'),
(880, 'OP160', 0, 0, 0, 0, 'Perianal abscess - I&D', '', '10000', NULL, NULL, NULL, 'bigop'),
(881, 'OP161', 0, 0, 0, 0, 'Perianal abscess - I&D Deep', '', '15000', NULL, NULL, NULL, 'bigop'),
(882, 'OP162', 0, 0, 0, 0, 'Uretheral Perineal Abscess - Drainage', '', '10000', NULL, NULL, NULL, 'bigop'),
(883, 'OP163', 0, 0, 0, 0, 'Peripheral  nerve repair', '', '30000', NULL, NULL, NULL, 'bigop'),
(884, 'OP164', 0, 0, 0, 0, 'Perirenal Abscess - Drainage', '', '45000', NULL, NULL, NULL, 'bigop'),
(885, 'OP165', 0, 0, 0, 0, 'Pilonial Sinus - Excision and Primary Closur', '', '35000', NULL, NULL, NULL, 'bigop'),
(886, 'OP166', 0, 0, 0, 0, 'Pilonidal Abscess - Incision and Drainage', '', '10000', NULL, NULL, NULL, 'bigop'),
(887, 'OP167', 0, 0, 0, 0, 'Polpectomy - by colonoscopy', '', '25000', NULL, NULL, NULL, 'bigop'),
(888, 'OP168', 0, 0, 0, 0, 'Polpectomy - by sigmoidoscopy', '', '15000', NULL, NULL, NULL, 'bigop'),
(889, 'OP169', 0, 0, 0, 0, 'POP Application', '', '3000', NULL, NULL, NULL, 'bigop'),
(890, 'OP170', 0, 0, 0, 0, 'POP Removal', '', '3000', NULL, NULL, NULL, 'bigop'),
(891, 'OP171', 0, 0, 0, 0, 'Prostate - Needle Biopsy', '', '5000', NULL, NULL, NULL, 'bigop'),
(892, 'OP172', 0, 0, 0, 0, 'Prostatectomy - supra or retropubic', '', '50000', NULL, NULL, NULL, 'bigop'),
(893, 'OP173', 0, 0, 0, 0, 'Recto-vaginal Fistula repair', '', '30000', NULL, NULL, NULL, 'bigop'),
(894, 'OP174', 0, 0, 0, 0, 'Release of Burn Contractures and Z plasty -', '', '30000', NULL, NULL, NULL, 'bigop'),
(895, 'OP175', 0, 0, 0, 0, 'Release of Burn Contractures and Z plasty -', '', '20000', NULL, NULL, NULL, 'bigop'),
(896, 'OP176', 0, 0, 0, 0, 'Repair laceration major artery or vein', '', '35000', NULL, NULL, NULL, 'bigop'),
(897, 'OP177', 0, 0, 0, 0, 'Repair of 2nd or 3rd degree tear', '', '30000', NULL, NULL, NULL, 'bigop'),
(898, 'OP178', 0, 0, 0, 0, 'Salpingectomy for ectopic pregnancy', '', '40000', NULL, NULL, NULL, 'bigop'),
(899, 'OP179', 0, 0, 0, 0, 'Salpingoophorectomy for cyst or tumor', '', '50000', NULL, NULL, NULL, 'bigop'),
(900, 'OP180', 0, 0, 0, 0, 'Saucerization & Currettment of bone - major', '', '35000', NULL, NULL, NULL, 'bigop'),
(901, 'OP181', 0, 0, 0, 0, 'Saucerization & Currettment of bone - minor', '', '15000', NULL, NULL, NULL, 'bigop'),
(902, 'OP182', 0, 0, 0, 0, 'Sigmoid Resection - Anterior', '', '50000', NULL, NULL, NULL, 'bigop'),
(903, 'OP183', 0, 0, 0, 0, 'Sigmoid Resection - Low Anterior', '', '55000', NULL, NULL, NULL, 'bigop'),
(904, 'OP184', 0, 0, 0, 0, 'Skin Graft - Full thickness - minor', '', '10000', NULL, NULL, NULL, 'bigop'),
(905, 'OP185', 0, 0, 0, 0, 'Skin Graft - Pinch', '', '10000', NULL, NULL, NULL, 'bigop'),
(906, 'OP186', 0, 0, 0, 0, 'Skin Graft - split thickness - major', '', '20000', NULL, NULL, NULL, 'bigop'),
(907, 'OP187', 0, 0, 0, 0, 'Skin Graft - split thickness - minor', '', '10000', NULL, NULL, NULL, 'bigop'),
(908, 'OP188', 0, 0, 0, 0, 'Small bowel resection & anastomosis', '', '60000', NULL, NULL, NULL, 'bigop'),
(909, 'OP189', 0, 0, 0, 0, 'Small Bowel Suture of perforation', '', '40000', NULL, NULL, NULL, 'bigop'),
(910, 'OP190', 0, 0, 0, 0, 'Spina bifida  -  meningomyelocoele repair', '', '40000', NULL, NULL, NULL, 'bigop'),
(911, 'OP191', 0, 0, 0, 0, 'Spleenectomy', '', '50000', NULL, NULL, NULL, 'bigop'),
(912, 'OP192', 0, 0, 0, 0, 'Squint Correction', '', '60000', NULL, NULL, NULL, 'bigop'),
(913, 'OP193', 0, 0, 0, 0, 'Steroid Injection - epidural', '', '10000', NULL, NULL, NULL, 'bigop'),
(914, 'OP194', 0, 0, 0, 0, 'Steroid Injection - joint', '', '5000', NULL, NULL, NULL, 'bigop'),
(915, 'OP195', 0, 0, 0, 0, 'Steroid Injection - scar or keloid', '', '5000', NULL, NULL, NULL, 'bigop'),
(916, 'OP196', 0, 0, 0, 0, 'Steroid Injection - tendon or muscle', '', '5000', NULL, NULL, NULL, 'bigop'),
(917, 'OP197', 0, 0, 0, 0, 'Steroid Injection - trigger points', '', '5000', NULL, NULL, NULL, 'bigop'),
(918, 'OP198', 0, 0, 0, 0, 'Subcutaneous cysts or tumors excisision 1 -', '', '5000', NULL, NULL, NULL, 'bigop'),
(919, 'OP199', 0, 0, 0, 0, 'Subcutaneous cysts or tumors excisision 2 -', '', '6000', NULL, NULL, NULL, 'bigop'),
(920, 'OP200', 0, 0, 0, 0, 'Subcutaneous cysts or tumors excisision 4 -', '', '8000', NULL, NULL, NULL, 'bigop'),
(921, 'OP201', 0, 0, 0, 0, 'Subcutaneous cysts or tumors excisision 6 cm', '', '10000', NULL, NULL, NULL, 'bigop'),
(922, 'OP202', 0, 0, 0, 0, 'Submaxillary Gland - excision', '', '30000', NULL, NULL, NULL, 'bigop'),
(923, 'OP203', 0, 0, 0, 0, 'Surgery of Club Foot', '', '50000', NULL, NULL, NULL, 'bigop'),
(924, 'OP204', 0, 0, 0, 0, 'Suture Removal', '', '2000', NULL, NULL, NULL, 'bigop'),
(925, 'OP205', 0, 0, 0, 0, 'Suturing Laceration 1 - 2 cm.', '', '4000', NULL, NULL, NULL, 'bigop'),
(926, 'OP206', 0, 0, 0, 0, 'Suturing Laceration 2 - 4 cm.', '', '6000', NULL, NULL, NULL, 'bigop'),
(927, 'OP207', 0, 0, 0, 0, 'Suturing Laceration 4 - 8 cm.', '', '8000', NULL, NULL, NULL, 'bigop'),
(928, 'OP208', 0, 0, 0, 0, 'Suturing Laceration more than  8 cm.', '', '10000', NULL, NULL, NULL, 'bigop'),
(929, 'OP209', 0, 0, 0, 0, 'Tendon Repair -  Wrist or Forearm', '', '35000', NULL, NULL, NULL, 'bigop'),
(930, 'OP210', 0, 0, 0, 0, 'Tendon Repair - Achilles', '', '35000', NULL, NULL, NULL, 'bigop'),
(931, 'OP211', 0, 0, 0, 0, 'Tendon Repair - Dorsiflexors of Foot', '', '30000', NULL, NULL, NULL, 'bigop'),
(932, 'OP212', 0, 0, 0, 0, 'Tendon Repair - Hand - extensor', '', '20000', NULL, NULL, NULL, 'bigop'),
(933, 'OP213', 0, 0, 0, 0, 'Tendon Repair - Hand - flexor', '', '30000', NULL, NULL, NULL, 'bigop'),
(934, 'OP214', 0, 0, 0, 0, 'Tendon Repair - Patellar or Quadriceps', '', '35000', NULL, NULL, NULL, 'bigop'),
(935, 'OP215', 0, 0, 0, 0, 'Tendon Transfer', '', '30000', NULL, NULL, NULL, 'bigop'),
(936, 'OP216', 0, 0, 0, 0, 'Testicular or Scrotal Abscess - Drainage', '', '5000', NULL, NULL, NULL, 'bigop'),
(937, 'OP217', 0, 0, 0, 0, 'Testis Torsion', '', '20000', NULL, NULL, NULL, 'bigop'),
(938, 'OP218', 0, 0, 0, 0, 'Thoracentesis', '', '5000', NULL, NULL, NULL, 'bigop'),
(939, 'OP219', 0, 0, 0, 0, 'Thoracotomy and drainage of empyema', '', '45000', NULL, NULL, NULL, 'bigop'),
(940, 'OP220', 0, 0, 0, 0, 'Thyroglossal duct cyst  Excision', '', '30000', NULL, NULL, NULL, 'bigop'),
(941, 'OP221', 0, 0, 0, 0, 'Thyroidectomy - Subtotal', '', '45000', NULL, NULL, NULL, 'bigop'),
(942, 'OP222', 0, 0, 0, 0, 'Thyroidectomy - Total', '', '50000', NULL, NULL, NULL, 'bigop'),
(943, 'OP223', 0, 0, 0, 0, 'Total Hip Replacement', '', '250000', NULL, NULL, NULL, 'bigop'),
(944, 'OP224', 0, 0, 0, 0, 'Total Knee Replacement', '', '250000', NULL, NULL, NULL, 'bigop'),
(945, 'OP225', 0, 0, 0, 0, 'Tracheostomy - emergency', '', '20000', NULL, NULL, NULL, 'bigop'),
(946, 'OP226', 0, 0, 0, 0, 'Tracheostomy - permanent', '', '20000', NULL, NULL, NULL, 'bigop'),
(947, 'OP227', 0, 0, 0, 0, 'Transfer Graft Rotation', '', '15000', NULL, NULL, NULL, 'bigop'),
(948, 'OP228', 0, 0, 0, 0, 'Transurethral Resection of the Prostate', '', '60000', NULL, NULL, NULL, 'bigop'),
(949, 'OP229', 0, 0, 0, 0, 'Tubal ligation for sterilization', '', '10000', NULL, NULL, NULL, 'bigop'),
(950, 'OP230', 0, 0, 0, 0, 'Tubal Surgery for Infertility', '', '60000', NULL, NULL, NULL, 'bigop'),
(951, 'OP231', 0, 0, 0, 0, 'Tube Thoracostomy', '', '15000', NULL, NULL, NULL, 'bigop'),
(952, 'OP232', 0, 0, 0, 0, 'Gastric Ulcer Perforation Repair', '', '40000', NULL, NULL, NULL, 'bigop'),
(953, 'OP233', 0, 0, 0, 0, 'Ureteral Anastomosis', '', '45000', NULL, NULL, NULL, 'bigop'),
(954, 'OP234', 0, 0, 0, 0, 'Uretheral Bougie dilatation of stricture', '', '10000', NULL, NULL, NULL, 'bigop'),
(955, 'OP235', 0, 0, 0, 0, 'Uretheral Carbuncle - Removal', '', '10000', NULL, NULL, NULL, 'bigop'),
(956, 'OP236', 0, 0, 0, 0, 'Ureteral Ileal Conduit', '', '60000', NULL, NULL, NULL, 'bigop'),
(957, 'OP237', 0, 0, 0, 0, 'Uretheral Trauma', '', '40000', NULL, NULL, NULL, 'bigop'),
(958, 'OP238', 0, 0, 0, 0, 'Ureterosigmoidostomy', '', '55000', NULL, NULL, NULL, 'bigop'),
(959, 'OP239', 0, 0, 0, 0, 'Ureterotomy for stone removal', '', '45000', NULL, NULL, NULL, 'bigop'),
(960, 'OP240', 0, 0, 0, 0, 'Urethroplasty for Fistula or Stricture', '', '45000', NULL, NULL, NULL, 'bigop'),
(961, 'OP241', 0, 0, 0, 0, 'Urethroplasty for Hypospadias', '', '55000', NULL, NULL, NULL, 'bigop'),
(962, 'OP242', 0, 0, 0, 0, 'Vagotomy & Pyloroplasty', '', '50000', NULL, NULL, NULL, 'bigop'),
(963, 'OP243', 0, 0, 0, 0, 'Varicocoelectomy', '', '20000', NULL, NULL, NULL, 'bigop'),
(964, 'OP244', 0, 0, 0, 0, 'Varicose Vein Ligations or Stripping', '', '30000', NULL, NULL, NULL, 'bigop'),
(965, 'OP245', 0, 0, 0, 0, 'Vasectomy for sterilization', '', '10000', NULL, NULL, NULL, 'bigop'),
(966, 'OP246', 0, 0, 0, 0, 'Vesico-vaginal Fistula repair', '', '40000', NULL, NULL, NULL, 'bigop'),
(967, 'OP247', 0, 0, 0, 0, 'Volvulus - Reduction', '', '30000', NULL, NULL, NULL, 'bigop'),
(968, 'OP248', 0, 0, 0, 0, 'Vulval or vaginal wall excision for tumors o', '', '65000', NULL, NULL, NULL, 'bigop'),
(969, 'OP249', 0, 0, 0, 0, 'Wound Debridement under anesthesia', '', '10000', NULL, NULL, NULL, 'bigop'),
(970, 'OP250', 0, 0, 0, 0, 'Wound Repair - complex (layer closure)', '', '20000', NULL, NULL, NULL, 'bigop'),
(971, 'OP251', 0, 0, 0, 0, 'SCLEROTHERAPY - INITIAL', '', '30000', NULL, NULL, NULL, 'bigop'),
(972, 'OP280', 0, 0, 0, 0, 'SCLEROTHERAPY - REPEAT', '', '15000', NULL, NULL, NULL, 'bigop'),
(973, 'OP252', 0, 0, 0, 0, 'INTUSSUCEPTION SURGERY - SIMPLE', '', '25000', NULL, NULL, NULL, 'bigop'),
(974, 'OP281', 0, 0, 0, 0, 'INTUSSUCEPTION - RESECT', '', '35000', NULL, NULL, NULL, 'bigop'),
(975, 'OP253', 0, 0, 0, 0, 'FISTULECTOMY - COMPLICATED', '', '35000', NULL, NULL, NULL, 'bigop'),
(976, 'OP254', 0, 0, 0, 0, 'DRAIN PERINEAL ABSCESS', '', '10000', NULL, NULL, NULL, 'bigop'),
(977, 'OP256', 0, 0, 0, 0, 'ORCHIOPEXY - UNILATERAL', '', '20000', NULL, NULL, NULL, 'bigop'),
(978, 'OP257', 0, 0, 0, 0, 'ORCHIOPEXY - BILATERAL', '', '30000', NULL, NULL, NULL, 'bigop'),
(979, 'OP258', 0, 0, 0, 0, 'CLEFT LIP REPAIR-BILATERAL', '', '40000', NULL, NULL, NULL, 'bigop'),
(980, 'OP259', 0, 0, 0, 0, 'RELEASE OF FRENULUM', '', '5000', NULL, NULL, NULL, 'bigop'),
(981, 'OP260', 0, 0, 0, 0, 'FOREIGN BODY REMOVAL EAR OR NOSE', '', '5000', NULL, NULL, NULL, 'bigop'),
(982, 'OP261', 0, 0, 0, 0, 'HERNIA - INGUINAL BILATERAL', '', '30000', NULL, NULL, NULL, 'bigop'),
(983, 'OP262', 0, 0, 0, 0, 'Skin Graft - Full - major', '', '20000', NULL, NULL, NULL, 'bigop'),
(984, 'OP263', 0, 0, 0, 0, 'Burn Contr. Release - sim', '', '25000', NULL, NULL, NULL, 'bigop'),
(985, 'OP264', 0, 0, 0, 0, 'Burn Contr Release - complicated', '', '40000', NULL, NULL, NULL, 'bigop'),
(986, 'OP265', 0, 0, 0, 0, 'Dilocation-finger open', '', '15000', NULL, NULL, NULL, 'bigop'),
(987, 'OP266', 0, 0, 0, 0, 'Dislocation-shoulder open', '', '35000', NULL, NULL, NULL, 'bigop'),
(988, 'OP267', 0, 0, 0, 0, 'Dislocation-elbow open', '', '25000', NULL, NULL, NULL, 'bigop'),
(989, 'OP268', 0, 0, 0, 0, 'Dislocation - hip open', '', '40000', NULL, NULL, NULL, 'bigop'),
(990, 'OP269', 0, 0, 0, 0, 'Dislocation-patellar open', '', '15000', NULL, NULL, NULL, 'bigop'),
(991, 'OP270', 0, 0, 0, 0, 'Ober-Young Release', '', '30000', NULL, NULL, NULL, 'bigop'),
(992, 'OP271', 0, 0, 0, 0, 'Girdlestone operation', '', '50000', NULL, NULL, NULL, 'bigop'),
(993, 'OP272', 0, 0, 0, 0, 'Surg Toilet Emerg Major', '', '35000', NULL, NULL, NULL, 'bigop'),
(994, 'OP273', 0, 0, 0, 0, 'Surg Toilet Emerg Minor', '', '25000', NULL, NULL, NULL, 'bigop'),
(995, 'OP274', 0, 0, 0, 0, 'Episiotomy Repair', '', '12000', NULL, NULL, NULL, 'bigop'),
(996, 'OP275', 0, 0, 0, 0, 'Eye Lid Repair', '', '20000', NULL, NULL, NULL, 'bigop'),
(997, 'OP276', 0, 0, 0, 0, 'Ptsosis Correction', '', '75000', NULL, NULL, NULL, 'bigop'),
(998, 'OP277', 0, 0, 0, 0, 'Corneal Repair', '', '25000', NULL, NULL, NULL, 'bigop'),
(999, 'OP278', 0, 0, 0, 0, 'Anoscopy', '', '5000', NULL, NULL, NULL, 'bigop'),
(1000, 'OP279', 0, 0, 0, 0, 'Exam under anaesthesia', '', '10000', NULL, NULL, NULL, 'bigop'),
(1024, '273', 0, 0, 1, 0, 'Cefazolin Injection, 1g Vial', '', '3000', NULL, NULL, NULL, 'drug_list'),
(1045, '295', 0, 0, 0, 1, 'Triomune 40', '', '0', NULL, NULL, NULL, 'drug_list'),
(1043, '293', 0, 0, 0, 1, 'Stavudine 40mg', '', '0', NULL, NULL, NULL, 'drug_list'),
(1025, '274', 0, 0, 0, 0, 'Dextrose 10% in Normal IV Solution , 500ml', '', '1000', NULL, NULL, NULL, 'supplies'),
(1026, '275', 0, 1, 0, 0, 'Imipramine 25mg', '', '100', '0', '0', '0', 'drug_list'),
(1027, '276', 0, 0, 1, 0, 'Irifone 5%gel, 50gm(Etofenamate)', '', '5000', NULL, NULL, NULL, 'drug_list'),
(1028, '277', 0, 0, 0, 0, 'Levothyroxin Tablets 50mcg', '', '75', NULL, NULL, NULL, 'drug_list'),
(1029, '278', 0, 0, 1, 0, 'Miconazole cream 2 % 20gm', 'Miconazole cream 2 % 20gm', '3000', '0', '0', '0', 'drug_list'),
(1030, '279', 0, 1, 0, 0, 'Multi-Vitamin with minerals tabs', '', '500', '0', '0', '0', 'drug_list'),
(1031, '280', 0, 0, 1, 0, 'Nimesulide  gel 30gm', '', '3000', NULL, NULL, NULL, 'drug_list'),
(1032, '281', 0, 0, 0, 0, 'Norethisterone 5mg Tablets (Primolut-', '', '500', NULL, NULL, NULL, 'drug_list'),
(1033, '282', 1, 0, 0, 0, 'Oral Rehydration Powder pro Liter Solutio', '', '500', NULL, NULL, NULL, 'drug_list'),
(1034, '284', 0, 0, 0, 1, 'Combivir/Duovir', '', '0', NULL, NULL, NULL, 'drug_list'),
(1035, '286', 0, 0, 0, 1, 'Efavirenz(Stocrin) 200mg', '', '0', NULL, NULL, NULL, 'drug_list'),
(1036, '287', 0, 0, 0, 1, 'Efavirenz(Stocrin) 600mg', '', '0', NULL, NULL, NULL, 'drug_list'),
(1046, '296', 0, 0, 0, 1, 'Zidovudine Syrup 100ml', '', '0', NULL, NULL, NULL, 'drug_list'),
(1050, 'Dental 4', 0, 1, 0, 0, 'Composite 1 surface', 'Composite filling materials', '20000', NULL, NULL, NULL, 'dental'),
(1051, 'Dental 5', 0, 1, 0, 0, 'Composite 2 surfaces', 'Composite venners', '30000', NULL, NULL, NULL, 'dental'),
(1079, 'Dental 6', 0, 0, 0, 0, 'Pulpotomy of anterior', 'Pulpotomy of a single canal', '10000', NULL, NULL, NULL, 'dental'),
(1053, 'Dental 7', 0, 1, 0, 0, 'Pulpotomy of a premolar', 'Pulpotomy of two canals', '15000', NULL, NULL, NULL, 'dental'),
(1054, 'Dental 8', 0, 1, 0, 0, 'Pulpotomy of a molar', 'Pulpotomy of three canals', '20000', NULL, NULL, NULL, 'dental'),
(1055, 'Dental 9', 0, 1, 0, 0, 'Fine Scaling,Root Planing and Polishing', 'Scaling per quadrant/visit', '24000', NULL, NULL, NULL, 'dental'),
(1056, 'Dental 10', 0, 1, 0, 0, 'Fluoride therapy', 'Fluoride therapy per visit', '6000', NULL, NULL, NULL, 'dental'),
(1057, 'Dental 11', 0, 1, 0, 0, 'Occlusal', 'One periapical radiograph', '10000', NULL, NULL, NULL, 'dental'),
(1058, 'Dental 12', 0, 1, 0, 0, 'Polishing', 'Polishing', '6000', NULL, NULL, NULL, 'dental'),
(1059, 'Dental 13', 0, 1, 0, 0, 'Irrigation of Pocket / Gingival Flap', 'Irrigation per visit', '4000', NULL, NULL, NULL, 'dental'),
(1060, 'Dental 14', 0, 1, 0, 0, 'Flapectomy', 'removal of a flap', '18000', NULL, NULL, NULL, 'dental'),
(1061, 'Dental 16', 0, 1, 0, 0, 'Infected socket management', 'Infected socket not originating from selian clinic', '12000', NULL, NULL, NULL, 'dental'),
(1062, 'Dental 17', 0, 1, 0, 0, 'Incision and drainage', 'Incision and drainage', '35000', NULL, NULL, NULL, 'dental'),
(1063, 'Dental 18', 0, 1, 0, 0, 'Inter Maxillary Fixation (IMF)', 'Intermaxillary fixation of fractures of the jaws', '45000', NULL, NULL, NULL, 'dental'),
(1064, 'Dental 19', 0, 1, 0, 0, 'Disimpaction', 'Disimpaction of last molars', '25000', NULL, NULL, NULL, 'dental'),
(1065, 'Dental 20', 0, 1, 0, 0, 'Extraction, difficult ', 'Difficult extractions', '15000', NULL, NULL, NULL, 'dental'),
(1066, 'Dental 21', 1, 0, 0, 0, 'Extraction - Deciduous', 'Extraction', '5000', NULL, NULL, NULL, 'dental'),
(1071, '297', 0, 0, 0, 0, 'Premarin', '', '500', NULL, NULL, NULL, 'drug_list'),
(1072, '298', 0, 0, 0, 0, 'Hemovit', '', '400', NULL, NULL, NULL, 'drug_list'),
(1076, '302', 0, 0, 0, 0, 'Hydrogen Peroxide 2% 200ml', '', '1000', NULL, NULL, NULL, 'drug_list'),
(1077, '303', 0, 0, 0, 0, 'Hydrogen Peroxide 6% 200ml', '', '3000', NULL, NULL, NULL, 'drug_list'),
(1078, '304', 0, 0, 0, 0, 'Potassium Permanganate 100ml', '', '500', NULL, NULL, NULL, 'drug_list'),
(1080, 'Dental 22', 0, 0, 0, 0, 'Other (25000)', '', '25000', NULL, NULL, NULL, 'dental'),
(1081, 'Dental 23', 0, 0, 0, 0, 'Bleeding socket management', '', '12000', NULL, NULL, NULL, 'dental'),
(1082, 'Dental 24', 0, 0, 0, 0, 'RCT - Anteriors', '', '35000', NULL, NULL, NULL, 'dental'),
(1083, 'Dental 25', 0, 0, 0, 0, 'RCT - Premolars', '', '40000', NULL, NULL, NULL, 'dental'),
(1084, 'Dental 26', 0, 0, 0, 0, 'RCT - Molars', '', '45000', NULL, NULL, NULL, 'dental'),
(1085, 'Dental 27', 0, 0, 0, 0, 'Other (5000)', '', '5000', NULL, NULL, NULL, 'dental'),
(1086, 'Dental 28', 0, 0, 0, 0, 'Other (10000)', '', '10000', NULL, NULL, NULL, 'dental'),
(1087, 'Dental 29', 0, 0, 0, 0, 'Other (15000)', '', '15000', NULL, NULL, NULL, 'dental'),
(1088, 'Dental 30', 0, 0, 0, 0, 'Other (20000)', '', '20000', NULL, NULL, NULL, 'dental'),
(1089, 'P34', 0, 0, 0, 0, 'IUCD', '', '0', NULL, NULL, NULL, 'smallop'),
(1090, '350', 0, 0, 0, 0, 'Acyclovir 200mg', '', '300', '0', '0', '0', 'drug_list'),
(1091, '500', 0, 1, 0, 0, 'Brustan', 'Brustan', '75', NULL, NULL, NULL, 'drug_list'),
(1092, '501', 0, 1, 0, 0, 'Miconazote 10mg', 'Miconzote 10mg', '100', NULL, NULL, NULL, 'drug_list'),
(1093, '502', 0, 1, 0, 0, '', '', '', NULL, NULL, NULL, ''),
(1094, '502', 0, 1, 0, 0, 'Albendazole200mg', 'Albendazole200mg', '200', '0', '0', '0', 'drug_list'),
(1095, '503', 0, 1, 0, 0, 'Albendazole400mg', 'Albendazole 400mg', '500', NULL, NULL, NULL, 'drug_list'),
(1096, '504', 0, 1, 0, 0, 'Zidovuduie300mg', 'Zidovuduie 300mg', '0', NULL, NULL, NULL, 'drug_list'),
(1097, '505', 0, 1, 0, 0, 'Zidovuduie100mg', 'Zidovuduie 100mg', '0', NULL, NULL, NULL, 'drug_list'),
(1098, 'Dental31', 0, 0, 0, 0, 'Deciduous', 'Deciduous', '5000', NULL, NULL, NULL, 'dental'),
(1100, 'Dental33', 0, 0, 1, 0, 'Pit and fissure sealant', 'Pit and fissure sealant', '5000', NULL, NULL, NULL, 'dental'),
(1101, 'Dental34', 0, 0, 1, 0, 'Amalgam 1 surface', 'Amalgam 1 surface', '15000', NULL, NULL, NULL, 'dental'),
(1102, 'Dental35', 0, 0, 1, 0, 'Amalgam 2 surface', 'Amalgam 1 surface', '20000', NULL, NULL, NULL, 'dental'),
(1103, 'Dental36', 0, 0, 1, 0, 'Amalgam 3 surface', 'Amalgam 3 surface', '25000', NULL, NULL, NULL, 'dental'),
(1104, 'Dental37', 0, 0, 1, 0, 'Composite 3 surfaces', 'Composite 3 surfaces', '40000', NULL, NULL, NULL, 'dental'),
(1105, 'Dental38', 0, 0, 1, 0, 'Composite veneer', 'Composite veneer', '40000', NULL, NULL, NULL, 'dental'),
(1106, 'Dental39', 0, 0, 1, 0, 'Crown refixing', 'Crown refixing', '15000', NULL, NULL, NULL, 'dental'),
(1107, 'Dental40', 0, 0, 1, 0, 'Post & Core', 'Post & Core', '25000', NULL, NULL, NULL, 'dental'),
(1108, 'Dental41', 0, 0, 1, 0, 'Gross Scaling I', 'Gross Scaling I', '16000', NULL, NULL, NULL, 'dental'),
(1109, 'Dental42', 0, 0, 1, 0, 'Gross Scaling II', 'Gross Scaling II\r\n', '24000', NULL, NULL, NULL, 'dental'),
(1110, 'Dental43', 0, 0, 1, 0, 'Desensitizer Application - per visit', 'Desensitizer Application - per visit\r\n', '12000', NULL, NULL, NULL, 'dental'),
(1111, 'Dental44', 0, 0, 1, 0, 'Periapical', 'Periapical\r\n', '5000', NULL, NULL, NULL, 'dental'),
(1113, 'Dental46', 0, 0, 1, 0, 'Stitch Removal', 'Stitch Removal\r\n', '4000', NULL, NULL, NULL, 'dental'),
(1114, 'Dental47', 0, 0, 1, 0, 'TMJ reduction', 'TMJ reduction\r\n', '14000', NULL, NULL, NULL, 'dental'),
(1116, 'Dental49', 0, 0, 1, 0, 'Small tumor removal', 'Small tumor removal\r\n', '15000', NULL, NULL, NULL, 'dental'),
(1117, 'X13', 0, 0, 0, 0, 'Lower Extremities', '', '7500', '0', '0', '0', 'xray'),
(1118, 'X14', 0, 0, 0, 0, 'Barium Meel', '', '30000', '0', '0', '0', 'xray'),
(1119, 'X15', 0, 0, 0, 0, 'Barium Swallow', '', '30000', '0', '0', '0', 'xray'),
(1120, 'C08', 0, 0, 0, 0, 'Consultation - A.R.T', 'Consultation- ART', '0', '0', '0', '0', 'service'),
(1121, 'C09', 0, 0, 0, 0, 'Consultation - Bill ( 2000)', 'Consultation- Bill(2000)', '2000', '0', '0', '0', 'service'),
(1122, '509', 0, 0, 0, 0, 'Augumentin 325mg(pack of 14)', 'Augumentin 325mg(pack of 14)', '26000', '0', '0', '0', 'drug_list'),
(1123, '510', 0, 0, 0, 0, 'Glyceryl Trinitrate', 'Glyceryl Trinitrate', '400', '0', '0', '0', 'drug_list'),
(1124, '511', 0, 0, 0, 0, 'haloperidol tablet 10mg', 'haloperidol tablet 10mg', '100', '0', '0', '0', 'drug_list'),
(1125, 'c10', 0, 0, 0, 0, 'Dressing Minor - 1000', 'Dressing Minor - 1000', '1000', '0', '0', '0', 'service'),
(1126, 'c11', 0, 0, 0, 0, 'Dressing Minor - 2000', 'Dressing Minor - 2000', '2000', '0', '0', '0', 'service'),
(1127, '512', 0, 0, 0, 0, 'Aldomet 250 mg', 'Aldomet 250 mg', '75', '0', '0', '0', 'drug_list'),
(1128, '513', 0, 0, 0, 0, 'Arinate 100 mg (packet of 6)', 'Arinate 100 mg (packet of 6)', '6000', '0', '0', '0', 'drug_list'),
(1129, '514', 0, 0, 0, 0, 'Arinate 50 mg (packet of 6)', 'Arinate 50 mg (packet of 6)', '5000', '0', '0', '0', 'drug_list'),
(1130, '515', 0, 0, 0, 0, 'Artane 2 mg', 'Artane 2mg', '200', '0', '0', '0', 'drug_list'),
(1131, '516', 0, 0, 0, 0, 'Ascobic Acid 250 mg', 'Ascorbic Acid 250 mg', '10', '0', '0', '0', 'drug_list'),
(1132, '518', 0, 0, 0, 0, 'Aspirin 300 mg', 'Aspirin 300 mg', '10', '0', '0', '0', 'drug_list'),
(1133, '519', 0, 0, 0, 0, 'Brufen 200 mg', 'Brufen 200 mg', '20', '0', '0', '0', 'drug_list'),
(1134, '520', 0, 0, 0, 0, 'Buscopan 10 mg', 'Buscopan 10 mg', '50', '0', '0', '0', 'drug_list'),
(1135, '521', 0, 0, 0, 0, 'Captopril 25 mg', 'Captopril 25 mg', '150', '0', '0', '0', 'drug_list'),
(1136, '522', 0, 0, 0, 0, 'Cephalexin 500 mg', 'Cephalexin 500 mg capsule', '500', '0', '0', '0', 'drug_list'),
(1137, '523', 0, 0, 0, 0, 'Cetrizine 10 mg', 'Cetrizine 10 mg', '150', '0', '0', '0', 'drug_list'),
(1138, '524', 0, 0, 0, 0, 'Chlorpherinamine Mal-', 'Chlorpherinamine Mal-', '10', '0', '0', '0', 'drug_list'),
(1139, '525', 0, 0, 0, 0, 'Clarithromycin 500 mg', 'Clarithromycin 500 mg', '1000', '0', '0', '0', 'drug_list'),
(1140, '526', 0, 0, 0, 0, 'Claritine 10 mg', 'Claritine 10 mg', '100', '0', '0', '0', 'drug_list'),
(1141, '527', 0, 0, 0, 0, 'Clomid 50 mg', 'Clomid 50 mg tab', '300', '0', '0', '0', 'drug_list'),
(1142, '528', 0, 0, 0, 0, 'Coartem- Adult (Artesunate + Alufantrine)-1 packet', 'Coartem- Adult (Artesunate + Alufantrine) I packet', '500', '0', '0', '0', 'drug_list'),
(1143, '529', 0, 0, 0, 0, 'Coartem- Paed(Artesunate + Alufantrine)-1 packet', 'Coartem- Paed(Artesunate + Alufantrine) I packet', '500', '0', '0', '0', 'drug_list'),
(1144, '530', 0, 0, 0, 0, 'Dexamethazone 5 mg', 'Dexamethazone 5 mg tab', '50', '0', '0', '0', 'drug_list'),
(1145, '531', 0, 0, 0, 0, 'Diclofenac 100 mg(OLFEN SR)', 'Diclofenac 100 mg(OLFEN SR)', '1000', '0', '0', '0', 'drug_list'),
(1146, '532', 0, 0, 0, 0, 'Ephedrine', 'Ephedrine Tab', '20', '0', '0', '0', 'drug_list'),
(1147, '533', 0, 0, 0, 0, 'Ergotamine 1 mg', 'Ergotamine 1 mg', '250', '0', '0', '0', 'drug_list'),
(1148, '534', 0, 0, 0, 0, 'Fansidar 500 mg', 'Fansidar 500 mg', '40', '0', '0', '0', 'drug_list'),
(1149, '535', 0, 0, 0, 0, 'FerrousSulphate 200 mg', 'FerrousSulphate 200 mg', '10', '0', '0', '0', 'drug_list'),
(1150, '536', 0, 0, 0, 0, 'Flucamox Cap', 'Flucamox Cap', '400', '0', '0', '0', 'drug_list'),
(1151, '537', 0, 0, 0, 0, 'Hydralazine -HCL 40 mg', 'Hydralazine -HCL 40 mg', '100', '0', '0', '0', 'drug_list'),
(1152, '538', 0, 0, 0, 0, 'Hydralazine -HCL 80 mg', 'Hydralazine -HCL 80 mg', '150', '0', '0', '0', 'drug_list'),
(1153, '539', 0, 0, 0, 0, 'Hydrochlothiazide 50 mg', 'Hydrochlothiazide 50 mg', '25', '0', '0', '0', 'drug_list'),
(1154, '540', 0, 0, 0, 0, 'Lansoprazole 30 mg ', 'Lansoprazole 30 mg cap', '120', '0', '0', '0', 'drug_list'),
(1155, '541', 0, 0, 0, 0, 'Lisinopril 10 mg', 'Lisinopril 10 mg', '200', '0', '0', '0', 'drug_list'),
(1156, '542', 0, 0, 0, 0, 'Loperamide HCL 20 mg', 'Loperamide HCL 20 mg', '100', '0', '0', '0', 'drug_list'),
(1157, '543', 0, 0, 0, 0, 'Metformin  Tab ', 'Metformin  Tab ', '200', '0', '0', '0', 'drug_list'),
(1158, '544', 0, 0, 0, 0, 'Metronidazole 250 mg', 'Metronidazole 250 mg ', '20', '0', '0', '0', 'drug_list'),
(1159, '545', 0, 0, 0, 0, 'Mycostatin O.ral', 'Mycostatin O.ral', '100', '0', '0', '0', 'drug_list'),
(1160, '546', 0, 0, 0, 0, 'Neurobion Forte', 'Neurobion Forte', '100', '0', '0', '0', 'drug_list'),
(1161, '547', 0, 0, 0, 0, 'Nystatin Pessary(Packet of 14)', 'Nystatin Pessary(Packet of 14)', '1000', '0', '0', '0', 'drug_list'),
(1162, '548', 0, 0, 0, 0, 'Paludrine 100 mg', 'Paludrine 100 mg', '300', '0', '0', '0', 'drug_list'),
(1163, '549', 0, 0, 0, 0, 'Phenytoin-Sodium tab', 'Phenytoin-Sodium tab', '20', '0', '0', '0', 'drug_list'),
(1164, '550', 0, 0, 0, 0, 'Pot Chloride 600 mg (Slow - K)', 'Pot Chloride 600 mg (Slow - K)', '80', '0', '0', '0', 'drug_list'),
(1165, '551', 0, 0, 0, 0, 'Quinine 300 mg', 'Quinine 300 mg', '50', '0', '0', '0', 'drug_list'),
(1166, '552', 0, 0, 0, 0, 'Thioridazine- HCL 25 mg', 'Thioridazine- HCL 25 mg', '150', '0', '0', '0', 'drug_list'),
(1167, '553', 0, 0, 0, 0, 'Thyroxin .05 mg ( 500 MCG)', 'Thyroxin .05 mg ( 500 MCG)', '100', '0', '0', '0', 'drug_list'),
(1168, '554', 0, 0, 0, 0, 'Verapamil 80 mg', 'Verapamil 80 mg', '200', '0', '0', '0', 'drug_list'),
(1169, '555', 0, 0, 0, 0, 'Vitamin B Complex', 'Vitamin B Complex', '15', '0', '0', '0', 'drug_list'),
(1170, '556', 0, 0, 0, 0, 'Vitamin E 400ui Cap', 'Vitamin E 400ui Capsule', '800', '0', '0', '0', 'drug_list'),
(1171, '557', 0, 0, 0, 0, 'Azithromycin (Zithromax ) 200 mg/5 ml  , 15 ml', 'Azithromycin (Zithromax ) 200 mg/5 ml  , 15 ml', '8000', '0', '0', '0', 'drug_list'),
(1172, '558', 0, 0, 0, 0, 'Broncholin Syrup, 100 ml', 'Broncholin Syrup, 100 ml', '1000', '0', '0', '0', 'drug_list'),
(1173, '559', 0, 0, 0, 0, 'Cough Expectorant- Adult  , 100 ml', 'Cough Expectorant- Adult  , 100 ml', '1000', '0', '0', '0', 'drug_list'),
(1174, '560', 0, 0, 0, 0, 'Cough Expectorant- Paed , 100 ml', 'Cough Expectorant- Paed , 100 ml', '800', '0', '0', '0', 'drug_list'),
(1175, '561', 0, 0, 0, 0, 'Erythromycine 125 mg / 5 ml ,  100 ml', 'Erythromycine 125 mg / 5 ml ,  100 ml', '1800', '0', '0', '0', 'drug_list'),
(1176, '562', 0, 0, 0, 0, 'Fansidar Syrup ,  15 ml', 'Fansidar Syrup ,  15 ml', '1000', '0', '0', '0', 'drug_list'),
(1177, '563', 0, 0, 0, 0, 'Haemovit Suspension , 200 ml', 'Haemovit Suspension , 200 ml', '5000', '0', '0', '0', 'drug_list'),
(1178, '564', 0, 0, 0, 0, 'Koflyn Syrup , 100 ml', 'Koflyn Syrup , 100 ml', '1200', '0', '0', '0', 'drug_list'),
(1179, '565', 0, 0, 0, 0, 'Mebendazole, 100 mg / 5 ml  , 100 ml', 'Mebendazole, 100 mg / 5 ml , 100 ml', '1000', '0', '0', '0', 'drug_list'),
(1180, '566', 0, 0, 0, 0, 'Nystatin 100,000 iu /ml,  30 ml', 'Nystatin 100,000 iu /ml,  30 ml', '2500', '0', '0', '0', 'drug_list'),
(1181, '567', 0, 0, 0, 0, 'Salbutamol 2 mg / 5 ml ,  100 ml', 'Salbutamol 2 mg / 5 ml ,  100 ml', '1000', '0', '0', '0', 'drug_list'),
(1182, '568', 0, 0, 0, 0, 'Vitamin B Complex ,  100 ml', 'Vitamin B Complex ,  100 ml', '1000', '0', '0', '0', 'drug_list'),
(1183, '569', 0, 0, 0, 0, 'Adrenalline 1 mg / ml  , 1 ml  amp', 'Adrenalline 1 mg / ml  , 1 ml amp', '500', '0', '0', '0', 'drug_list'),
(1184, '570', 0, 0, 0, 0, 'Ampicilline  500 mg vial', 'Ampicilline  500 mg vial', '700', '0', '0', '0', 'drug_list'),
(1185, '571', 0, 0, 0, 0, 'Atropine , amp', 'Atropine , amp', '500', '0', '0', '0', 'drug_list'),
(1186, '572', 0, 0, 0, 0, 'ATS   ,  amp ', 'ATS   ,  amp ', '5000', '0', '0', '0', 'drug_list'),
(1187, '573', 0, 0, 0, 0, 'Rabbies Vaccine( 1 dose)', 'Rabbies Vaccine( 1 dose)', '20000', '0', '0', '0', 'drug_list'),
(1188, '574', 0, 0, 0, 0, 'DPT Vaccine ,vial ', 'DPT Vaccine ,vial ', '30000', '0', '0', '0', 'drug_list'),
(1189, '575', 0, 0, 0, 0, 'Haemo-Infuenza B ,vial ', 'Haemo-Infuenza B ,vial ', '30000', '0', '0', '0', 'drug_list'),
(1190, '576', 0, 0, 0, 0, 'Hepatitis  B Vaccine( adult)  ,vial ', 'Hepatitis  B Vaccine( adult)  ,vial ', '20000', '0', '0', '0', 'drug_list'),
(1191, '577', 0, 0, 0, 0, 'Hepatitis  B Vaccine( paed)  ,vial ', 'Hepatitis  B Vaccine( paed)  ,vial ', '15000', '0', '0', '0', 'drug_list'),
(1192, '578', 0, 0, 0, 0, 'Mumps-Measles rubella  ,vial ', 'Mumps-Measles rubella  ,vial ', '30000', '0', '0', '0', 'drug_list'),
(1193, '579', 0, 0, 0, 0, 'Cloxacillin 500 mg  ,vial ', 'Cloxacillin 500 mg  ,vial ', '700', '0', '0', '0', 'drug_list'),
(1194, '580', 0, 0, 0, 0, 'Diazepam 5 mg / ml  , 2 mls , amp', 'Cloxacillin 500 mg  ,amp', '500', '0', '0', '0', 'drug_list'),
(1195, '581', 0, 0, 0, 0, 'Dextrose  50 % (50 ml )  , vial  ', 'Dextrose  50 % (50 ml )  , vial', '5000', '0', '0', '0', 'drug_list'),
(1196, '582', 0, 0, 0, 0, 'Diclofenac Sod.  75  mg  , amp', 'Diclofenac Sod.  75  mg  , amp', '500', '0', '0', '0', 'drug_list'),
(1197, '583', 0, 0, 0, 0, 'Atropine Oint   ,tube ', 'Atropine Oint   ,tube ', '1000', '0', '0', '0', 'drug_list'),
(1198, '584', 0, 0, 0, 0, 'Chloramphnicol 15 gm  ,tube ', 'Chloramphnicol 15 gm  ,tube ', '800', '0', '0', '0', 'drug_list'),
(1199, '585', 0, 0, 0, 0, 'Dexamethazone/ Neomycin D  , 5 ml', 'Dexamethazone/ Neomycin D  , 5 ml', '1500', '0', '0', '0', 'drug_list'),
(1200, '586', 0, 0, 0, 0, 'Dexamethazone/ Gentam  , 5 ml', 'Dexamethazone/ Gentam  , 5 ml', '1500', '0', '0', '0', 'drug_list'),
(1201, '587', 0, 0, 0, 0, 'Gentamycin Eye Drops , 5 ml', 'Gentamycin Eye Drops , 5 ml', '1000', '0', '0', '0', 'drug_list'),
(1202, '588', 0, 0, 0, 0, 'Hydrocortisone 1 % Eye drops   ,  5  ml', 'Hydrocortisone 1 % Eye drops   ,  5  ml', '1200', '0', '0', '0', 'drug_list'),
(1203, '589', 0, 0, 0, 0, 'Prednisolone Eye/ Ear  ,  10 ml', 'Prednisolone Eye/ Ear  ,  10 ml', '1200', '0', '0', '0', 'drug_list'),
(1204, '590', 0, 0, 0, 0, 'Pilocarpine 2 %  ,  10 ml', 'Pilocarpine 2 %  ,  10 ml', '1200', '0', '0', '0', 'drug_list'),
(1205, '591', 0, 0, 0, 0, 'Ephedrine Nasal Drops,  10 ml', 'Ephedrine Nasal Drops,  10 ml', '1000', '0', '0', '0', 'drug_list'),
(1206, '592', 0, 0, 1, 0, 'Dextrose 10 % , 500 ml', 'Dextrose 10 % , 500 ml', '1500', '0', '0', '0', 'drug_list'),
(1207, '593', 0, 0, 1, 0, 'Dextrose Saline  , 500 ml', 'Dextrose Saline  , 500 ml', '700', '0', '0', '0', 'drug_list'),
(1208, '594', 0, 0, 1, 0, 'Normal Saline  , 500 ml', 'Normal Saline  , 500 ml', '700', '0', '0', '0', 'drug_list'),
(1209, '595', 0, 0, 1, 0, 'O.R.S   , satchet to make 1 litre', 'O.R.S   , satchet to make 1 litre', '500', '0', '0', '0', 'drug_list'),
(1210, '596', 0, 0, 1, 0, 'Betamethasone tube ', 'Betamethasone  ', '1200', '0', '0', '0', 'drug_list'),
(1211, '597', 0, 0, 1, 0, 'B.B.E 100 ml', 'B.B.E  , 100 ml ', '1000', '0', '0', '0', 'drug_list'),
(1212, '598', 0, 0, 1, 0, 'Clotrimazole Vaginal Cream', 'Clotrimazole  Vaginal Cream  , tube', '3500', '0', '0', '0', 'drug_list'),
(1213, '599', 0, 0, 1, 0, 'Dolobene Gel , 20 gm', 'Dolobene Gel , 20 gm', '5000', '0', '0', '0', 'drug_list'),
(1214, '600', 0, 0, 1, 0, 'Gentrisone cream , 10 gm', 'Gentrisone cream , 10 gm', '2500', '0', '0', '0', 'drug_list'),
(1215, '601', 0, 0, 1, 0, 'Lidocaine 2 % jelly  , tube  ,', 'Lidocaine 2 % jelly  , tube  ', '5000', '0', '0', '0', 'drug_list'),
(1216, '602', 0, 0, 1, 0, 'Nystatin 20 gm tube ', 'Nystatin 20 gm tube ', '2000', '0', '0', '0', 'drug_list'),
(1217, '603', 0, 0, 1, 0, 'Nystatin 20 gm tube ', 'Nystatin 20 gm tube \r\n', '2000', '0', '0', '0', 'drug_list'),
(1218, '604', 0, 0, 1, 0, 'Whitfield   25 gm', 'Whitfield   25 gm\r\n', '1000', '0', '0', '0', 'drug_list'),
(1219, '605', 0, 0, 1, 0, 'Sulfadiazine cream  1 %  , tube', 'Sulfadiazine cream  1 %  , tube', '4500', '0', '0', '0', 'drug_list'),
(1220, '606', 0, 0, 1, 0, 'Ergometrine 0.2 mg / ml , injection', 'Ergometrine 0.2 mg / ml , injection', '500', '0', '0', '0', 'drug_list'),
(1221, '607', 0, 0, 1, 0, 'Epherdine 30 mg/ ml , injection, amp', 'Epherdine 30 mg/ ml , injection, amp', '500', '0', '0', '0', 'drug_list'),
(1222, '608', 0, 0, 1, 0, 'EthanolAmine Oleate injection , amp', 'EthanolAmine Oleate injection , amp', '25000', '0', '0', '0', 'drug_list'),
(1223, '609', 0, 0, 1, 0, 'Furosemide 20 mg /2 ml injection , amp', 'Furosemide 20 mg /2 ml injection , amp', '25000', '0', '0', '0', 'drug_list'),
(1224, '610', 0, 0, 1, 0, 'Hydrocortisone 100 mg injection , vial ', 'Hydrocortisone 100 mg injection , vial', '800', '0', '0', '0', 'drug_list'),
(1225, '611', 0, 0, 1, 0, 'Haloperidol 5 mg/ ml injection , 2 ml amp ', 'Haloperidol 5 mg/ ml injection , 2 ml amp', '1500', '0', '0', '0', 'drug_list'),
(1226, '612', 0, 0, 1, 0, 'Hyoscine Butylbromide 20 mg/ ml injection , amp ', 'Hyoscine Butylbromide 20 mg/ ml injection , amp ', '1000', '0', '0', '0', 'drug_list'),
(1227, '613', 0, 0, 1, 0, 'heparin 5ui / ml injection , 10 ml vial ', 'Heparin 5ui / ml injection , 10 ml vial ', '5000', '0', '0', '0', 'drug_list'),
(1228, '614', 0, 0, 1, 0, 'Ketamine 50 mg /ml  injection, 10 ml  vial', 'Ketamine 50 mg /ml  injection, 10 ml  vial', '1500', '0', '0', '0', 'drug_list'),
(1229, '615', 0, 0, 1, 0, 'Lignocaine ( 2 ml)  5 % dext.. 7.5 % , 2ml injection amp', 'Lignocaine ( 2 ml)  5 % dext.. 7.5 % , 2ml injection amp', '1500', '0', '0', '0', 'drug_list'),
(1230, '616', 0, 0, 1, 0, 'Lignocaine (30 ml) 2 % 50 ml injection vial', 'Lignocaine (30 ml) 2 % 50 ml injection vial', '2500', '0', '0', '0', 'drug_list'),
(1231, '617', 0, 0, 1, 0, 'Neostigmine 2.5 mg / ml injection amp', 'Neostigmine 2.5 mg / ml injection amp', '500', '0', '0', '0', 'drug_list'),
(1232, '618', 0, 0, 1, 0, 'Lignocaine  2 %/ADR(10 ml) injection vial', 'Lignocaine  2 %/ADR(10 ml) injection vial', '500', '0', '0', '0', 'drug_list');
INSERT INTO care_tz_drugsandservices (item_id, item_number, is_pediatric, is_adult, is_other, is_consumable, item_description, item_full_description, unit_price, unit_price_1, unit_price_2, unit_price_3, purchasing_class) VALUES
(1233, '619', 0, 0, 1, 0, 'Pethidine 100 mg /2 ml injection amp', 'Pethidine 100 mg /2 ml injection amp', '2000', '0', '0', '0', 'drug_list'),
(1234, '620', 0, 0, 1, 0, 'Pethidine 50 mg /1 ml injection amp', 'Pethidine 50 mg /1 ml injection amp', '1500', '0', '0', '0', 'drug_list'),
(1235, '621', 0, 0, 1, 0, 'P.P.F-4 MU injection vial', 'P.P.F-4 MU injection vial', '600', '0', '0', '0', 'drug_list'),
(1236, '622', 0, 0, 1, 0, 'Pitocin 5 ui / ml, 1 ml injection  AMP', 'Pitocin 5 ui / ml, 1 ml injection  AMP', '800', '0', '0', '0', 'drug_list'),
(1237, '623', 0, 0, 1, 0, 'Quinine 300 mg / ml , 2ml injection  amp', 'Quinine 300 mg / ml , 2ml injection  amp', '600', '0', '0', '0', 'drug_list'),
(1238, '624', 0, 0, 1, 0, 'Rocephin 1 gm injection vial ', 'Rocephin 1 gm injection vial ', '5000', '0', '0', '0', 'drug_list'),
(1239, '625', 0, 0, 1, 0, 'Rocephin 500 mg  injection vial ', 'Rocephin 500 mg  injection vial ', '3500', '0', '0', '0', 'drug_list'),
(1240, '626', 0, 0, 1, 0, 'Rocephin 250 mg  injection vial ', 'Rocephin 250 mg  injection vial ', '2800', '0', '0', '0', 'drug_list'),
(1241, '627', 0, 0, 1, 0, 'Sodium Bicarbonate (20 ml) injection, amp', 'Rocephin 250 mg  injection vial ', '1200', '0', '0', '0', 'drug_list'),
(1242, '628', 0, 0, 1, 0, 'Suxamethonium cl. 50 mg / ml ,2 ml injection, amp', 'Suxamethonium cl. 50 mg / ml ,2 ml injection, amp', '1500', '0', '0', '0', 'drug_list'),
(1243, '629', 0, 0, 1, 0, 'Solumedrol 4o mg /ml injection  amp', 'Solumedrol 4o mg /ml injection  amp', '25000', '0', '0', '0', 'drug_list'),
(1244, '630', 0, 0, 1, 0, 'Depomedrol 80 mg /ml injection  amp', 'Depomedrol 80 mg /ml injection  amp', '25000', '0', '0', '0', 'drug_list'),
(1245, '631', 0, 0, 1, 0, 'Triamcinolone 40 mg / ml  injection ,vial', 'Triamcinolone 40 mg / ml  injection ,vial', '15000', '0', '0', '0', 'drug_list'),
(1246, '632', 0, 0, 1, 0, 'Suramin 1 gm injection vial', 'Suramin 1 gm injection vial', '20000', '0', '0', '0', 'drug_list'),
(1247, '633', 0, 0, 1, 0, 'Thiopental Sodium  injection vial', 'Thiopental Sodium  injection vial', '4500', '0', '0', '0', 'drug_list'),
(1248, '634', 0, 0, 0, 0, 'Vitamin-K injection amp', 'Vitamin-K injection amp', '1500', '0', '0', '0', 'drug_list'),
(1249, '635', 0, 0, 1, 0, 'Vitamin-K injection amp', 'Vitamin-K injection amp', '1500', '0', '0', '0', 'drug_list'),
(1250, '636', 0, 0, 1, 0, 'Vitamin B Complex injection ,amp', 'Vitamin B Complex injection ,amp', '1000', '0', '0', '0', 'drug_list'),
(1251, '637', 0, 0, 1, 0, 'Water for inj (10 ml) injection ,amp', 'Water for inj (10 ml) injection ,amp', '100', '0', '0', '0', 'drug_list'),
(1252, '638', 0, 0, 0, 0, 'Anusol Suppository', 'Anusol Suppository', '800', '0', '0', '0', 'drug_list'),
(1253, '639', 0, 0, 0, 0, 'Paraffin Gauze PCT', 'Paraffin Gauze PCT', '1500', '0', '0', '0', 'supplies'),
(1254, '640', 0, 0, 0, 0, 'Gloves Sterile No 6 ..... No 8 pair', 'Gloves Sterile No 6 ..... No 8 pair', '800', '0', '0', '0', 'supplies'),
(1255, '641', 0, 0, 0, 0, 'Gloves Sterile No 6 ..... No 8 pair', 'Gloves Sterile No 6 ..... No 8 pair', '400', '0', '0', '0', 'supplies'),
(1256, '642', 0, 0, 0, 0, 'Gloves Latex(b / 100 pcs)', 'Gloves Latex(b / 100 pcs)', '4500', '0', '0', '0', 'supplies'),
(1257, '643', 0, 0, 0, 0, 'Formalin .37 % ,litre', 'Formalin .37 % ,litre', '3000', '0', '0', '0', 'supplies'),
(1258, '644', 0, 0, 0, 0, 'Glutaraldehyde 37 % ,litre', 'Glutaraldehyde 37 % ,litre', '9000', '0', '0', '0', 'supplies'),
(1259, '645', 0, 0, 0, 0, 'Hydrogen Peroxide 6 % ,ltre', 'Hydrogen Peroxide 6 % ,ltre', '2000', '0', '0', '0', 'supplies'),
(1260, '646', 0, 0, 0, 0, 'Iodine Povidone ,  100 ml', 'Iodine Povidone ,  100 ml', '2000', '0', '0', '0', 'supplies'),
(1261, '647', 0, 0, 0, 0, 'Lysol 50 % ,litre', 'Lysol 50 % ,litre', '3000', '0', '0', '0', 'supplies'),
(1262, '648', 0, 0, 0, 0, 'Methylated Spirit , 1 litre', 'Methylated Spirit , 1 litre', '2000', '0', '0', '0', 'supplies'),
(1263, '649', 0, 0, 0, 0, 'Savlon ,  1 litre', 'Savlon ,  1 litre', '4500', '0', '0', '0', 'supplies'),
(1264, '650', 0, 0, 0, 0, 'Salbutamol Spray  , 1 bottle', 'Salbutamol Spray  , 1 bottle', '3000', '0', '0', '0', 'drug_list'),
(1265, '651', 0, 0, 0, 0, 'Salbutamol for Nebulizer , amp', 'Salbutamol for Nebulizer , amp', '1000', '0', '0', '0', 'drug_list'),
(1266, 'c12', 0, 0, 0, 0, 'Consultation-Return Spec Clinic', '', '7500', '0', '0', '0', 'service');

--
-- Dumping data for table 'care_tz_drugsandservices_description'
--

INSERT INTO care_tz_drugsandservices_description (ID, Fieldname, ShowDescription, FullDescription, is_insurance_price) VALUES
(1, 'unit_price', 'Selians price', 'TSH (e.g. 1200,00 or 1200) - Standard price for item ', 0),
(2, 'unit_price_1', 'Insured price', 'TSH (e.g. 1200,00 or 1200) - price for insured people', 0),
(3, 'unit_price_2', 'Private', 'TSH (e.g. 1200,00 or 1200) - price for self paying people', 0),
(4, 'unit_price_3', 'Company', 'TSH (e.g. 1200,00 or 1200) - price for Companies', 0);

--
-- Dumping data for table 'care_tz_icd10_quicklist'
--

INSERT INTO care_tz_icd10_quicklist (ID, parent, description, diagnosis_code) VALUES
(282, 163, 'Fracture of upper end of radius', 'S52.1'),
(281, 163, 'Fracture of upper end of humerus', 'S42.2'),
(280, 163, 'Fracture of thoracic vertebra', 'S22.0'),
(279, 163, 'Fracture of talus', 'S92.1'),
(163, -1, 'ORTHOPEDIC', NULL),
(5972, 5029, 'Whooping cough due to Bordetella pertussis', 'A37.0'),
(5971, 5029, 'Meningitis, viral', 'A87.9'),
(5842, 288, 'Warts', 'B07'),
(5843, 288, 'Worms, other intestinal', 'B83'),
(5844, 288, 'Malaria, BS - or not tested\r\n', 'B54'),
(5841, 288, 'Viral infection, unspecified', 'B34.9'),
(160, -1, 'DENTAL DIAGNOSIS', NULL),
(5840, 288, 'Urinary tract infection, site not specified', 'N39.0'),
(278, 163, 'Fracture of shafts of both ulna and radius', 'S52.4'),
(277, 163, 'Fracture of shaft of ulna', 'S52.2'),
(274, 163, 'Fracture of shaft of femur', 'S72.3'),
(275, 163, 'Fracture of shaft of humerus', 'S42.3'),
(276, 163, 'Fracture of shaft of radius', 'S52.3'),
(273, 163, 'Fracture of other toe', 'S92.5'),
(272, 163, 'Fracture of other tarsal bone(s)', 'S92.2'),
(271, 163, 'Fracture of other parts of neck', 'S12.8'),
(268, 163, 'Fracture of metatarsal bone', 'S92.3'),
(269, 163, 'Fracture of navicular [scaphoid] bone of hand', 'S62.0'),
(270, 163, 'Fracture of neck of femur', 'S72.0'),
(267, 163, 'Fracture of lumbar vertebra', 'S32.0'),
(266, 163, 'Fracture of lower end of radius', 'S52.5'),
(265, 163, 'Fracture of lower end of humerus', 'S42.4'),
(264, 163, 'Fracture of great toe', 'S92.4'),
(262, 163, 'Fracture of clavicle', 'S42.0'),
(263, 163, 'Fracture of fibula alone', 'S82.4'),
(261, 163, 'Fracture of calcaneus', 'S92.0'),
(260, 163, 'Dislocation of toe(s)', 'S93.1'),
(259, 163, 'Dislocation of shoulder joint', 'S43.0'),
(258, 163, 'Dislocation of knee', 'S83.1'),
(256, 163, 'Dislocation of elbow, unspecified', 'S53.1'),
(257, 163, 'Dislocation of hip', 'S73.0'),
(255, 163, 'Dislocation of ankle joint', 'S93.0'),
(254, 163, 'Dislocation of acromioclavicular joint', 'S43.1'),
(283, 163, 'Fracture of upper end of ulna', 'S52.0'),
(284, 163, 'Pertrochanteric fracture', 'S72.1'),
(285, 163, 'Subtrochanteric fracture', 'S72.2'),
(286, 163, 'Tear of meniscus, current', 'S83.2'),
(287, 163, 'Sprain and strain of ankle', 'S93.4'),
(288, -1, 'INFECTIONS', NULL),
(5839, 288, 'Urethritis', 'N34.1'),
(5838, 288, 'Tuberculous pleurisy', 'A16.5'),
(5837, 288, 'Tuberculous peripheral lymphadenopathy', 'A18.2'),
(5836, 288, 'Tuberculosis, miliary', 'A19'),
(5835, 288, 'Tuberculosis of lung', 'A15.3'),
(5834, 288, 'Tinea', 'B35'),
(5833, 288, 'Stomatitis and related lesions', 'K12'),
(5832, 288, 'Septicaemia, unspecified', 'A41.9'),
(5831, 288, 'Scabies', 'B86'),
(5830, 288, 'Pneumonia, unspecified', 'J18.9'),
(5829, 288, 'Pediculosis, unspecified', 'B85.2'),
(5826, 288, 'Measles', 'B05'),
(5827, 288, 'Molluscum contagiosum', 'B08.1'),
(5828, 288, 'Otitis externa', 'H60'),
(5824, 288, 'Malaria, BS+', 'B53.8'),
(5825, 288, 'Malaria, complicated', 'B50.8'),
(5823, 288, 'Influenza, virus not identified', 'J11'),
(5822, 288, 'Impetigo', 'L01'),
(5821, 288, 'HIV+', 'B24'),
(5817, 288, 'Giardiasis', 'A07.1'),
(5818, 288, 'Gonococcal infection', 'A54'),
(5819, 288, 'Hepatitis, unspecified viral', 'B19'),
(5820, 288, 'Herpesviral gingivostomatitis and pharyngotonsilli', 'B00.2'),
(5816, 288, 'Early syphilis', 'A51'),
(5815, 288, 'Diarrhoea and gastroenteritis', 'A09'),
(5814, 288, 'Chlamydia, sexually transmitted', 'A56'),
(5813, 288, 'Cellulitis', 'L03'),
(5812, 288, 'Candidiasis', 'B37'),
(5811, 288, 'Candidal stomatitis', 'B37.0'),
(5810, 288, 'Brucellosis', 'A23'),
(5809, 288, 'Bronchitis, chronic', 'J42'),
(5808, 288, 'Ascariasis', 'B77'),
(5807, 288, 'Amoebiasis', 'A06'),
(5806, 288, 'Acute tonsillitis', 'J03'),
(5805, 288, 'Acute sinusitis', 'J01'),
(5804, 288, 'Acute pyelonephritis', 'N10'),
(758, -1, 'SYMPTOMS, OTHER CAUSES', NULL),
(7387, 160, 'Loss of teeth due to accident, extraction or local', 'K08.1'),
(7386, 160, 'Leukoplakia and other disturbances of oral epithel', 'K13.2'),
(5695, 995, 'Rheumatic heart disease, acute', 'I01.9'),
(5694, 995, 'Urinary incontinence', 'R32'),
(5693, 995, 'Thyrotoxicosis [hyperthyroidism]', 'E05'),
(5692, 995, 'Tension headache', 'G44.2'),
(5691, 995, 'Tendinitis', 'M77.9'),
(5690, 995, 'Rheumatoid arthritis, unspecified', 'M06.9'),
(5689, 995, 'Polyarthrosis', 'M15'),
(5688, 995, 'Peptic ulcer, site unspecified', 'K27'),
(5687, 995, 'Osteomyelitis, chronic', 'M86.6'),
(5686, 995, 'Osteomyelitis, acute', 'M86.1'),
(5684, 995, 'Hypothyroidism', 'E03'),
(5685, 995, 'Osteogenesis imperfecta', 'Q78.0'),
(5683, 995, 'Hypertension, essential', 'I10'),
(5682, 995, 'Haemorrhoids', 'I84'),
(5681, 995, 'Goitre, nontoxic', 'E04'),
(5896, 4309, 'Corneal abrasion or njury of conjunctiva\r\n', 'S05.0'),
(995, -1, 'COMMON NON-INFECTIOUS', NULL),
(1657, -1, 'OBSTETRIC-GYNEGOLOGICAL', NULL),
(5893, 758, 'Abdominal and pelvic swelling, mass and lump', 'R19.0'),
(5892, 758, 'Syncope and collapse', 'R55'),
(5680, 995, 'Gastritis, unspecified', 'K29.7'),
(5679, 995, 'Fluorosis, skeletal', 'M85.1'),
(5678, 995, 'Epilepsy', 'G40'),
(5677, 995, 'Diverticular disease of intestine', 'K57'),
(5676, 995, 'Diabetes mellitus, Non-insulin-dependent', 'E11'),
(5675, 995, 'Diabetes mellitus, Insulin-dependent', 'E10'),
(5673, 995, 'Bursitis\r\n', 'M71.9'),
(5669, 995, 'Arthrosis of knee', 'M17'),
(5670, 995, 'Arthrosis, unspecified\r\n', 'M19'),
(5674, 995, 'Congestive heart failure', 'I50.0'),
(5672, 995, 'Atopic eczema', 'L20'),
(5671, 995, 'Asthma', 'J45'),
(5668, 995, 'Arthrosis of hip', 'M16'),
(5667, 995, 'Arthrosis of first carpometacarpal joint', 'M18'),
(5666, 995, 'Arthritis, reactive\r\n', 'M02'),
(5664, 995, 'Angina pectoris', 'I20'),
(5665, 995, 'Arthritis, bacterial', 'M00'),
(5663, 995, 'Anaemia, unspecified', 'D64.9'),
(5662, 995, 'Anaemia, nutritional', 'D53.9'),
(5660, 995, 'Allergic contact eczema', 'L23'),
(5661, 995, 'Anaemia, acute posthaemorrhagic', 'D62'),
(5891, 758, 'Surgical follow-up care\r\n', 'Z48'),
(5890, 758, 'Splenomegaly', 'R16.1'),
(5889, 758, 'Palpitations', 'R00.2'),
(5888, 758, 'Palliative care', 'Z51.5'),
(5887, 758, 'Pain, low back', 'M54.5'),
(5886, 758, 'Pain, abdominal and pelvic', 'R10'),
(5885, 758, 'Pain in joint', 'M25.5'),
(5884, 758, 'Pain in chest', 'R07.4'),
(5883, 758, 'Nausea and vomiting', 'R11'),
(5882, 758, 'Laboratory examination', 'Z01.7'),
(5881, 758, 'Heartburn', 'R12'),
(5880, 758, 'Headache', 'R51'),
(5879, 758, 'Fever of unknown origin', 'R50'),
(5878, 758, 'Febrile convulsions', 'R56.0'),
(5877, 758, 'Examination, General medical', 'Z00.0'),
(5876, 758, 'Examination,  driving license, work etc', 'Z02'),
(5874, 758, 'Epistaxis', 'R04.0'),
(5875, 758, 'Examination of blood pressure', 'Z01.3'),
(5906, 1657, 'Pregnancy examination and test', 'Z32'),
(5907, 1657, 'Malaria during pregnancy', 'O98.6'),
(5908, 1657, 'Supervision of high-risk pregnancy', 'Z35'),
(5909, 1657, 'Supervision of other normal pregnancy', 'Z34.8'),
(5910, 1657, 'Urinary tract infection, site not specified', 'N39.0'),
(5799, 288, 'Acute lymphadenitis', 'L04'),
(5905, 1657, 'Pre-eclampsia, unspecified', 'O14.9'),
(5903, 1657, 'DUB, Irregular menstruation', 'N92.5'),
(5904, 1657, 'Postpartum care and examination', 'Z39'),
(5802, 288, 'Acute otitis media', 'H66.0'),
(5803, 288, 'Acute pharyngitis', 'J02'),
(5801, 288, 'Acute obstructive laryngitis [croup]', 'J05.0'),
(5800, 288, 'Acute nasopharyngitis [common cold]', 'J00'),
(5029, -1, 'PEDIATRIC RARE', NULL),
(4395, -1, 'PEDIATRIC GENERAL', NULL),
(5970, 5029, 'Varicella [chickenpox]', 'B01'),
(5901, 1657, 'PID, Pelvic inflammatory diseases', 'N73'),
(5902, 1657, 'Other parasitologically confirmed malaria', 'B53'),
(5900, 1657, 'Gynaecological examination (general)(routine)', 'Z01.4'),
(5899, 1657, 'Female infertility, unspecified', 'N97.9'),
(5898, 1657, 'Contraceptive management', 'Z30'),
(5897, 1657, 'Acute vaginitis', 'N76.0'),
(2450, -1, 'UNSPECIFIED MTUHA DG', NULL),
(5999, 2450, 'Musculoscletal and neurological, unspecified\r\n', 'R29.8'),
(5998, 2450, 'Infectious diseases, unspecified', 'B99'),
(5997, 2450, 'Mental disorder, not otherwise specified', 'F99'),
(5996, 2450, 'Malignant neoplasm without specification of site', 'C80'),
(5994, 2450, 'Injury, unspecified', 'T14.9'),
(5995, 2450, 'Liver disease, unspecified', 'K76.9'),
(5993, 2450, 'Heart disease, unspecified', 'I51.9'),
(5992, 2450, 'Urinary system, unspecified', 'N39.9'),
(5991, 2450, 'Ear disease, unspecified', 'H93.9'),
(5990, 2450, 'Burn and corrosion, body region unspecified', 'T30'),
(5989, 2450, 'Benign neoplasm of other and unspecified sites', 'D36'),
(5988, 2450, 'Allergy, unspecified', 'T78.4'),
(7385, 160, 'Glossitis', 'K14.0'),
(7384, 160, 'Gingivitis and periodontal diseases', 'K05'),
(7383, 160, 'Fractures of other skull and facial bones', 'S02.8'),
(7382, 160, 'Fracture of tooth', 'S02.5'),
(7381, 160, 'Fracture of mandible', 'S02.6'),
(7380, 160, 'Fracture of malar and maxillary bones', 'S02.4'),
(7379, 160, 'Excessive attrition of teeth', 'K03.0'),
(7378, 160, 'Erosion of teeth', 'K03.2'),
(7377, 160, 'Embedded and impacted teeth', 'K01'),
(7376, 160, 'Disturbances in tooth formation', 'K00.4'),
(7375, 160, 'Disturbances in tooth eruption', 'K00.6'),
(7374, 160, 'Dislocation of jaw', 'S03.0'),
(7373, 160, 'Disease of jaws, unspecified', 'K10.9'),
(7372, 160, 'Developmental odontogenic cysts', 'K09.0'),
(7371, 160, 'Developmental (nonodontogenic) cysts of oral regio', 'K09.1'),
(7370, 160, 'Deposits [accretions] on teeth', 'K03.6'),
(7369, 160, 'Dentofacial functional abnormalities', 'K07.5'),
(7368, 160, 'Dental caries, unspecified', 'K02.9'),
(7367, 160, 'Dental caries', 'K02'),
(7366, 160, 'Chronic periodontitis', 'K05.3'),
(7365, 160, 'Chronic gingivitis', 'K05.1'),
(7364, 160, 'Cheek and lip biting', 'K13.1'),
(7363, 160, 'Cellulitis and abscess of mouth', 'K12.2'),
(7362, 160, 'Caries limited to enamel', 'K02.0'),
(7361, 160, 'Benign neoplasm: Lower jaw bone', 'D16.5'),
(7360, 160, 'Arrested dental caries', 'K02.3'),
(7359, 160, 'Anomalies of tooth position', 'K07.3'),
(7358, 160, 'Anomalies of jaw-cranial base relationship', 'K07.1'),
(7357, 160, 'Anomalies of dental arch relationship', 'K07.2'),
(7356, 160, 'Anodontia', 'K00.0'),
(7355, 160, 'Alveolitis of jaws', 'K10.3'),
(7354, 160, 'Acute periodontitis', 'K05.2'),
(7353, 160, 'Acute gingivitis', 'K05.0'),
(7352, 160, 'Acute apical periodontitis of pulpal origin', 'K04.4'),
(7351, 160, 'Abrasion of teeth', 'K03.1'),
(7350, 160, 'Abnormal hard tissue formation in pulp', 'K04.3'),
(5796, 288, 'Acute bronchiolitis', 'J21'),
(5797, 288, 'Acute bronchitis', 'J20'),
(5798, 288, 'Acute laryngitis', 'J04.0'),
(5795, 288, 'Abscess, cutaneous', 'L02.9'),
(5873, 758, 'Dysuria', 'R30.0'),
(5871, 758, 'Cough', 'R05'),
(5872, 758, 'Counselling, HIV\r\n', 'Z71.7'),
(5870, 758, 'Blood donor', 'Z52.0'),
(5869, 758, 'Ascites', 'R18'),
(4309, -1, 'EYE DISEASES', NULL),
(5895, 4309, 'Hordeolum and other deep inflammation of eyelid', 'H00.0'),
(5894, 4309, 'Conjunctivitis', 'H10'),
(4316, -1, 'SKIN DISEASES', NULL),
(6000, 2450, 'Other disease, not specified', 'R69'),
(5987, 4316, 'Warts', 'B07'),
(5986, 4316, 'Urticaria', 'L50'),
(5985, 4316, 'Seborrhoeic eczema', 'L21'),
(5984, 4316, 'Scabies', 'B86'),
(5979, 4316, 'Eczema, unspecified', 'L30.9'),
(5980, 4316, 'Tinea', 'B35'),
(5981, 4316, 'Impetigo', 'L01'),
(5982, 4316, 'Molluscum contagiosum', 'B08.1'),
(5983, 4316, 'Pediculosis, unspecified', 'B85.2'),
(5978, 4316, 'Abscess, cutaneous', 'L02.9'),
(5977, 4316, 'Atopic eczema', 'L20'),
(5976, 4316, 'Alopecia areata', 'L63'),
(5975, 4316, 'Allergy, unspecified', 'T78.4'),
(5941, 4395, 'Dehydration', 'E86'),
(5940, 4395, 'Undescended testicle', 'Q53'),
(5973, 4316, 'Acne', 'L70'),
(5974, 4316, 'Allergic contact eczema', 'L23'),
(5939, 4395, 'Septicaemia, unspecified', 'A41.9'),
(5937, 4395, 'Rheumatic fever with heart involvement', 'I01'),
(5938, 4395, 'Rheumatic fever without mention of heart involveme', 'I00'),
(5936, 4395, 'Phimosis and paraphimosis', 'N47'),
(5933, 4395, 'Obesity', 'E66'),
(5934, 4395, 'Preterm infants', 'P07.3'),
(5935, 4395, 'Arthritis, bacterial', 'M00'),
(5932, 4395, 'Marasmus', 'E41'),
(5931, 4395, 'Fluorosis, teeth', 'K00.3'),
(5930, 4395, 'Marasmic kwashiorkor', 'E42'),
(5929, 4395, 'Kwashiorkor', 'E40'),
(5921, 4395, 'Abuse, drugs\r\n', 'Z72.2'),
(5922, 4395, 'Epilepsy', 'G40'),
(5928, 4395, 'Juvenile rheumatoid arthritis', 'M08.0'),
(5927, 4395, 'Anaemia, iron deficiency', 'D50'),
(5926, 4395, 'Diabetes mellitus, Insulin-dependent', 'E10'),
(5925, 4395, 'Inguinal hernia', 'K40'),
(5924, 4395, 'Adenoid hypertrophy', 'J35.2'),
(5923, 4395, 'Haemangioma, any site', 'D18.0'),
(5920, 4395, 'Disturbance of activity and attention', 'F90.0'),
(5915, 4395, 'Burn of second degree, body region unspecified', 'T30.2'),
(5919, 4395, 'Constipation', 'K59.0'),
(5918, 4395, 'Concussion', 'S06.0'),
(5917, 4395, 'Cerebral palsy', 'G80'),
(5916, 4395, 'Burn of third degree, body region unspecified', 'T30.3'),
(5914, 4395, 'Burn of first degree, body region unspecified', 'T30.1'),
(5912, 4395, 'Asthma', 'J45'),
(5913, 4395, 'Bitten or struck by dog', 'W54'),
(5911, 4395, 'Anxiety disorder, unspecified', 'F41.9'),
(5969, 5029, 'Developmental disorder', 'F89'),
(5968, 5029, 'Undescended testicle', 'Q53'),
(5967, 5029, 'Clubfoot, Talipes equinovarus', 'Q66.0'),
(5966, 5029, 'Sprain and strain of ankle', 'S93.4'),
(5964, 5029, 'Sickle-cell anaemia without crisis', 'D57.1'),
(5965, 5029, 'Sickle-cell disorders', 'D57'),
(5963, 5029, 'Sickle-cell anaemia with crisis', 'D57.0'),
(5962, 5029, 'Abuse, sexual', 'T74.2'),
(5960, 5029, 'Scarlet fever', 'A38'),
(5961, 5029, 'Rickets, sequelae', 'E64.3'),
(5959, 5029, 'Rickets, active', 'E55.0'),
(5957, 5029, 'Rheumatic fever with heart involvement', 'I01'),
(5958, 5029, 'Rheumatic fever without mention of heart involveme', 'I00'),
(5954, 5029, 'Mumps', 'B26'),
(5955, 5029, 'Abuse, physical', 'T74.1'),
(5956, 5029, 'Phimosis and paraphimosis', 'N47'),
(5953, 5029, 'Microcephaly', 'Q02'),
(5952, 5029, 'Lymphangitis', 'I89.1'),
(5951, 5029, 'Geographic tongue', 'K14.1'),
(5950, 5029, 'Gastro-oesophageal reflux disease', 'K21'),
(5949, 5029, 'Disturbance of activity and attention', 'F90.0'),
(5948, 5029, 'Congenital malformation of heart, unspecified', 'Q24.9'),
(5947, 5029, 'Pyloric stenosis, congenital', 'Q40.0'),
(5946, 5029, 'Cerebral palsy', 'G80'),
(5945, 5029, 'Meningitis, bacterial unspecified', 'G00.9'),
(5944, 5029, 'Anxiety disorder, unspecified', 'F41.9'),
(5943, 5029, 'Anthrax', 'A22'),
(5942, 5029, 'Acute appendicitis', 'K35'),
(6001, -1, 'SURGERY, ABD AND UROGENITAL', NULL),
(6736, 6001, 'Undescended testicle', 'Q53'),
(6735, 6001, 'Torsion of testis', 'N44'),
(6734, 6001, 'Stone of kidney', 'N20.0'),
(6733, 6001, 'Stone in bladder', 'N21.0'),
(6732, 6001, 'Sigmoid Volvulus', 'K56.2'),
(6731, 6001, 'Retractile testis ', 'Q55.2'),
(6730, 6001, 'Pyloric stenosis, congenital', 'Q40.0'),
(6728, 6001, 'Prostatic stone', 'N42.0'),
(6729, 6001, 'Pyloric stenosis, adult hypertrophic ', 'K31.1'),
(6727, 6001, 'Peritonitis', 'K65'),
(6726, 6001, 'Paraphimosis', 'N47'),
(6725, 6001, 'Intussusception', 'K56.1'),
(6724, 6001, 'Intestinal obstruction', 'K56.6'),
(6723, 6001, 'Intestinal adhesions', 'K66.0'),
(6722, 6001, 'Injury of urethra', 'S37.3'),
(6721, 6001, 'Hydrocele', 'N43.3'),
(6720, 6001, 'Haemorrhoids', 'I84'),
(6719, 6001, 'Gastro-oesophageal reflux disease', 'K21'),
(6718, 6001, 'Gastritis and duodenitis', 'K29'),
(6717, 6001, 'Gastric ulcer', 'K25'),
(6716, 6001, 'Esophageal varices', 'I85'),
(6715, 6001, 'Echinococcus multilocularis infection of liver', 'B67.5'),
(6714, 6001, 'Duodenal ulcer, acute with perforation', 'K26.1'),
(6713, 6001, 'Duodenal ulcer', 'K26'),
(6712, 6001, 'Cholelithiasis', 'K80'),
(6711, 6001, 'Cholecystitis', 'K81'),
(6710, 6001, 'Carcinoma of prostate', 'C61'),
(6709, 6001, 'Carcinoma of pancreas', 'C25'),
(6708, 6001, 'Cancer of oesophagus', 'C15'),
(6707, 6001, 'Bladder-neck stricture', 'N32.0'),
(6706, 6001, 'Benign hypertrophy of prostata', 'N40'),
(6705, 6001, 'Anal fistula', 'K60.3'),
(6704, 6001, 'Anal fissure, unspecified', 'K60.2'),
(6703, 6001, 'Acute pancreatitis', 'K85'),
(6701, 6001, 'Abscess of liver', 'K75.0'),
(6702, 6001, 'Acute appendicitis', 'K35'),
(6737, 6001, 'Cancer of colon', 'C18'),
(6738, -1, 'SURGERY, OTHERS', NULL),
(7348, 6738, 'Ventral hernia', 'K43'),
(7347, 6738, 'Varicose veins of lower extremities', 'I83'),
(7346, 6738, 'Umbilical hernia', 'K42'),
(7345, 6738, 'Tonsillitis, chronic', 'J35.0'),
(7344, 6738, 'Tongue tie ', 'Q38.1'),
(7343, 6738, 'Spina bifida', 'Q05'),
(7342, 6738, 'Rupture of spleen', 'S36.0'),
(7341, 6738, 'Pneumothorax, traumatic ', 'S27.0'),
(7340, 6738, 'Pleural effusion', 'J90'),
(7339, 6738, 'Lipoma', 'D17'),
(7338, 6738, 'Injury of spinal cord, level unspecified', 'T09.3'),
(7337, 6738, 'Ingrowing nail', 'L60.0'),
(7336, 6738, 'Haemothorax, traumatic ', 'S27.1'),
(7335, 6738, 'Goitre, single nodule', 'E04.1'),
(7334, 6738, 'Goitre, simple', 'E04'),
(7332, 6738, 'Fracture of skull and facial bones', 'S02.9'),
(7333, 6738, 'Goitre, multinodular', 'E04.2'),
(7331, 6738, 'Fracture of base of skull', 'S02.1'),
(7330, 6738, 'Fibroadenoma of breast', 'D24'),
(7328, 6738, 'Deep vein thrombosis NOS', 'I80.2'),
(7329, 6738, 'Empyema pleurae', 'J86'),
(7326, 6738, 'Cut/laceration wound, unspecified body region', 'T14.1'),
(7327, 6738, 'Cysts of skin and subcutaneous tissue', 'L72.8'),
(7325, 6738, 'Contusion', 'S06.2'),
(7320, 6738, 'Burn of third degree, body region unspecified', 'T30.3'),
(7324, 6738, 'Concussion', 'S06.0'),
(7322, 6738, 'Cleft lip', 'Q36'),
(7323, 6738, 'Cleft palate', 'Q35'),
(7321, 6738, 'Carcinoma of larynx', 'C32'),
(7319, 6738, 'Burn of second degree, body region unspecified', 'T30.2'),
(7317, 6738, 'Adenoma of parotid gland', 'D11.0'),
(7318, 6738, 'Burn contracture (sequelae)', 'T95'),
(7316, 6738, 'Abscess of skin', 'L02'),
(7349, 6738, 'Surgical follow-up care\r\n', 'Z48'),
(7388, 160, 'Major anomalies of jaw size', 'K07.0'),
(7389, 160, 'Median rhomboid glossitis', 'K14.2'),
(7390, 160, 'Fluorosis, teeth', 'K00.3'),
(7391, 160, 'Multiple fractures involving skull and facial bone', 'S02.7'),
(7392, 160, 'Necrosis of pulp', 'K04.1'),
(7393, 160, 'Other cysts of jaw', 'K09.2'),
(7394, 160, 'Other dental caries', 'K02.8'),
(7395, 160, 'Periapical abscess with sinus', 'K04.6'),
(7396, 160, 'Periapical abscess without sinus', 'K04.7'),
(7397, 160, 'Plicated tongue', 'K14.5'),
(7398, 160, 'Pulp degeneration', 'K04.2'),
(7399, 160, 'Pulpitis', 'K04.0'),
(7400, 160, 'Recurrent oral aphthae', 'K12.0'),
(7401, 160, 'Retained dental root', 'K08.3'),
(7402, 160, 'Sialoadenitis', 'K11.2'),
(7403, 160, 'Supernumerary teeth', 'K00.1'),
(7404, 160, 'Temporomandibular joint disorders', 'K07.6'),
(7405, 4309, 'Stye, hordeolum and chalazion', 'H00'),
(7406, 4309, 'Strabismus, unspecified', 'H50.9'),
(7407, 4309, 'Senile cataract', 'H25'),
(7408, 4309, 'Retinal disorder, unspecified', 'H35.9'),
(7409, 4309, 'Pterygium', 'H11.0'),
(7410, 4309, 'Presbyopia', 'H52.4'),
(7411, 4309, 'Other disorders of refraction', 'H52.6'),
(7412, 4309, 'Other cataract', 'H26'),
(7413, 4309, 'Mucopurulent conjunctivitis', 'H10.0'),
(7414, 4309, 'Myopia', 'H52.1'),
(7415, 4309, 'Malignant neoplasm of eye and adnexa', 'C69'),
(7416, 4309, 'Keratitis', 'H16'),
(7417, 4309, 'Keratoconjunctivitis', 'H16.2'),
(7418, 4309, 'Iridocyclitis', 'H20'),
(7419, 4309, 'Hypermetropia', 'H52.0'),
(7420, 4309, 'Injury of eye and orbit', 'S05'),
(7421, 4309, 'Hordeolum and other deep inflammation of eyelid', 'H00.0'),
(7422, 4309, 'Foreign body in cornea', 'T15.0'),
(7423, 4309, 'Glaucoma', 'H40'),
(7424, 4309, 'Gonococcal infection of eye', 'A54.3'),
(7425, 4309, 'Degeneration of macula and posterior pole', 'H35.3'),
(7426, 4309, 'Disorder of eye and adnexa, unspecified', 'H57.9'),
(7427, 4309, 'Disorders of lacrimal system', 'H04'),
(7428, 4309, 'Disorders of optic [2nd] nerve and visual pathways', 'H48'),
(7429, 4309, 'Disorders of refraction and accommodation', 'H52'),
(7430, 4309, 'Entropion and trichiasis of eyelid', 'H02.0'),
(7431, 4309, 'Corneal abrasion or njury of conjunctiva', 'S05.0'),
(7432, 4309, 'Corneal scar and opacity, unspecified', 'H17.9'),
(7433, 4309, 'H10', 'Conjunctivitis'),
(7434, 4309, 'Congenital cataract', 'Q12.0'),
(7435, 4309, 'Acute atopic conjunctivitis', 'H10.1');

--
-- Dumping data for table 'care_tz_insurance'
--

INSERT INTO care_tz_insurance (id, parent, company_parent, company_id, PID, ceiling, ceiling_startup_subtraction, plan, start_date, end_date, timestamp, cancel_flag, paid_flag, gets_company_credit) VALUES
(1, -1, 0, 1, 0, '', '0', '-1', 1167598800, 1199048400, 1179914557, 0, 0, 0),
(2, -1, 0, 2, 0, '', '0', '-1', 1167598800, 1199048400, 1179914564, 0, 0, 0),
(3, -1, 0, 3, 0, '', '0', '-1', 1167598800, 1199048400, 1179914571, 0, 0, 0),
(4, -1, 0, 4, 0, '', '0', '-1', 1167598800, 1199048400, 1179914578, 0, 0, 0),
(5, -1, 0, 5, 0, '', '0', '-1', 1167598800, 1199048400, 1179914585, 0, 0, 0),
(6, -1, 0, 6, 0, '', '0', '-1', 1167598800, 1199048400, 1179914592, 0, 0, 0),
(7, -1, 0, 8, 0, '', '0', '-1', 1167598800, 1199048400, 1179914608, 0, 0, 0),
(8, -1, 0, 9, 0, '', '0', '-1', 1167598800, 1199048400, 1179914622, 0, 0, 0),
(9, -1, 0, 10, 0, '', '0', '-1', 1167598800, 1199048400, 1179914629, 0, 0, 0),
(10, -1, 0, 11, 0, '', '0', '-1', 1167598800, 1199048400, 1179914638, 0, 0, 0),
(11, -1, 0, 12, 0, '', '0', '-1', 1167598800, 1199048400, 1179914645, 0, 0, 0),
(12, -1, 0, 13, 0, '', '0', '-1', 1167598800, 1199048400, 1179914652, 0, 0, 0),
(13, -1, 0, 14, 0, '', '0', '-1', 1167598800, 1199048400, 1179914659, 0, 0, 0),
(14, -1, 0, 15, 0, '', '0', '-1', 1167598800, 1199048400, 1179914666, 0, 0, 0),
(15, -1, 0, 16, 0, '', '0', '-1', 1167598800, 1199048400, 1179914673, 0, 0, 0),
(16, -1, 0, 17, 0, '', '0', '-1', 1167598800, 1199048400, 1179914681, 0, 0, 0),
(17, -1, 0, 18, 0, '', '0', '-1', 1167598800, 1199048400, 1179914688, 0, 0, 0),
(18, -1, 0, 19, 0, '', '0', '-1', 1167598800, 1199048400, 1179914695, 0, 0, 0),
(19, -1, 0, 20, 0, '', '0', '-1', 1167598800, 1199048400, 1179914702, 0, 0, 0),
(20, -1, 0, 21, 0, '', '0', '-1', 1167598800, 1199048400, 1179914710, 0, 0, 0),
(21, -1, 0, 22, 0, '', '0', '-1', 1167598800, 1199048400, 1179914717, 0, 0, 0),
(22, -1, 0, 23, 0, '', '0', '-1', 1167598800, 1199048400, 1179914726, 0, 0, 0),
(23, -1, 0, 24, 0, '', '0', '-1', 1167598800, 1199048400, 1179914733, 0, 0, 0),
(24, -1, 0, 25, 0, '', '0', '-1', 1167598800, 1199048400, 1179914739, 0, 0, 0),
(25, -1, 0, 26, 0, '', '0', '-1', 1167598800, 1199048400, 1179914747, 0, 0, 0),
(26, -1, 0, 27, 0, '', '0', '-1', 1167598800, 1199048400, 1179914757, 0, 0, 0),
(27, -1, 0, 28, 0, '', '0', '-1', 1167598800, 1199048400, 1179914764, 0, 0, 0),
(28, -1, 0, 29, 0, '', '0', '-1', 1167598800, 1199048400, 1179914772, 0, 0, 0),
(29, -1, 0, 30, 0, '', '0', '-1', 1167598800, 1199048400, 1179914779, 0, 0, 0),
(30, -1, 0, 31, 0, '', '0', '-1', 1167598800, 1199048400, 1179914787, 0, 0, 0),
(31, -1, 0, 32, 0, '', '0', '-1', 1167598800, 1199048400, 1179914795, 0, 0, 0),
(32, -1, 0, 33, 0, '', '0', '-1', 1167598800, 1199048400, 1179914803, 0, 0, 0),
(33, -1, 0, 34, 0, '', '0', '-1', 1167598800, 1199048400, 1179914810, 0, 0, 0),
(34, -1, 0, 35, 0, '', '0', '-1', 1167598800, 1199048400, 1179914819, 0, 0, 0),
(35, -1, 0, 36, 0, '', '0', '-1', 1167598800, 1199048400, 1179914826, 0, 0, 0),
(36, -1, 0, 37, 0, '', '0', '-1', 1167598800, 1199048400, 1179914834, 0, 0, 0),
(37, -1, 0, 38, 0, '', '0', '-1', 1167598800, 1199048400, 1179914842, 0, 0, 0),
(38, -1, 0, 39, 0, '', '0', '-1', 1167598800, 1199048400, 1179914849, 0, 0, 0),
(39, -1, 0, 40, 0, '', '0', '-1', 1167598800, 1199048400, 1179914857, 0, 0, 0),
(40, -1, 0, 41, 0, '', '0', '-1', 1167598800, 1199048400, 1179914865, 0, 0, 0),
(41, -1, 0, 42, 0, '', '0', '-1', 1167598800, 1199048400, 1179914873, 0, 0, 0),
(42, -1, 0, 43, 0, '', '0', '-1', 1167598800, 1199048400, 1179914880, 0, 0, 0),
(43, -1, 0, 44, 0, '', '0', '-1', 1167598800, 1199048400, 1179914887, 0, 0, 0),
(44, -1, 0, 45, 0, '', '0', '-1', 1167598800, 1199048400, 1179914895, 0, 0, 0),
(45, -1, 0, 46, 0, '', '0', '-1', 1167598800, 1199048400, 1179914904, 0, 0, 0),
(46, -1, 0, 47, 0, '', '0', '-1', 1167598800, 1199048400, 1179914911, 0, 0, 0),
(47, -1, 0, 48, 0, '', '0', '-1', 1167598800, 1199048400, 1179914919, 0, 0, 0),
(48, -1, 0, 49, 0, '', '0', '-1', 1167598800, 1199048400, 1179914928, 0, 0, 0),
(49, -1, 0, 50, 0, '', '0', '-1', 1167598800, 1199048400, 1179914937, 0, 0, 0),
(50, -1, 0, 51, 0, '', '0', '-1', 1167598800, 1199048400, 1179914945, 0, 0, 0),
(51, -1, 0, 52, 0, '', '0', '-1', 1167598800, 1199048400, 1179914952, 0, 0, 0),
(52, -1, 0, 53, 0, '', '0', '-1', 1167598800, 1199048400, 1179914961, 0, 0, 0),
(53, -1, 0, 54, 0, '', '0', '-1', 1167598800, 1199048400, 1179914975, 0, 0, 0),
(54, -1, 0, 55, 0, '', '0', '-1', 1167598800, 1199048400, 1179914984, 0, 0, 0),
(55, -1, 0, 56, 0, '', '0', '-1', 1167598800, 1199048400, 1179914991, 0, 0, 0),
(56, -1, 0, 57, 0, '', '0', '-1', 1167598800, 1199048400, 1179915000, 0, 0, 0),
(57, -1, 0, 58, 0, '', '0', '-1', 1167598800, 1199048400, 1179915007, 0, 0, 0),
(58, -1, 0, 59, 0, '', '0', '-1', 1167598800, 1199048400, 1179915015, 0, 0, 0),
(59, -1, 0, 60, 0, '', '0', '-1', 1167598800, 1199048400, 1179915023, 0, 0, 0),
(60, -1, 0, 61, 0, '', '0', '-1', 1167598800, 1199048400, 1179915032, 0, 0, 0),
(61, -1, 0, 62, 0, '', '0', '-1', 1167598800, 1199048400, 1179915039, 0, 0, 0),
(62, -1, 0, 63, 0, '', '0', '-1', 1167598800, 1199048400, 1179915046, 0, 0, 0);

--
-- Dumping data for table 'care_tz_insurance_types'
--

INSERT INTO care_tz_insurance_types (id, ceiling, prepaid_amount, name, comment, is_disabled) VALUES
(1, '100000', 0, 'Selian Silver', '', 0),
(2, '100000', 0, 'Selian Silver \nPremium', '', 0),
(3, '150000', 0, 'Selian Gold', '', 0),
(4, '150000', 0, 'Selian Gold \nPremium', '', 0);

--
-- Dumping data for table 'care_tz_laboratory'
--


--
-- Dumping data for table 'care_tz_laboratory_param'
--

INSERT INTO care_tz_laboratory_param (nr, group_id, name, shortname, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, add_type, add_label, status, history, modify_id, modify_time, create_id, create_time, price, price_3, price_2, price_1) VALUES
(1, '1', 'Amylase', 'Amyl', '9', 'md/ld', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:10:26 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:10:26', '', '0000-00-00 00:00:00', '10000,00', NULL, NULL, NULL),
(2, '1', 'Bilirubin', 'Bil', '10', 'mg/dl', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 08:55:33 Winnie\r\n'')', 'Winnie', '2006-11-01 11:15:04', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(3, '1', 'Acid Phosphotate', 'AcPhos', '11', 'mrs unit', 'median', 'ub', 'lb', 'uc', 'lc', 'ut', 'lt', 'radio', '', '', 'CONCAT(history,''Update 2007-11-26 09:42:30 Niemi\n'')', 'Niemi', '2007-11-26 09:42:30', '', '0000-00-00 00:00:00', '100,00', '400,00', '300,00', '200,00'),
(4, '1', 'Total Protein', 'TotProt', '12', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 09:14:34 Winnie\r\n'')', 'Winnie', '2006-11-01 11:16:09', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(5, '1', 'Creatinine', 'Creat', '13', 'mg/dl', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:11:52 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:11:52', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(6, '1', 'HDL', '', '14', 'mg/dl', '', '', '', '', '', '', '', 'radio', '', '', 'CONCAT(history,''Update 2007-01-08 11:18:25 Niemi\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '20000,00', NULL, NULL, NULL),
(7, '1', 'LDL', '', '15', 'mg/dl', '', '', '', '', '', '', '', 'radio', '', '', 'CONCAT(history,''Update 2007-01-08 11:18:39 Niemi\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '20000,00', NULL, NULL, NULL),
(8, '1', 'Potassium K+', 'K+', '16', 'mmol/l', '', '', '', '', '', '', '', 'radio', '', '', 'CONCAT(history,''Update 2007-04-14 16:12:15 sophy\n'')', 'sophy', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(9, '1', 'SGOT/AST', 'ASAT', '17', 'u/l', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 08:50:00 Winnie\r\n'')', 'Winnie', '2006-11-01 11:47:34', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(10, '1', 'Cholesterol', 'Chol', '18', 'mg/dl', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 08:56:16 Winnie\r\n'')', 'Winnie', '2006-11-01 11:17:15', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(11, '1', 'Sodium Na+', 'Na+', '19', 'mmol/l', '', '', '', '', '', '', '', 'radio', '', '', 'CONCAT(history,''Update 2007-04-14 16:11:42 sophy\n'')', 'sophy', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(12, '1', 'Uric acid', 'U acid', '20', 'mg/dl', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 09:00:39 Winnie\r\n'')', 'Winnie', '2006-11-01 11:17:56', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(13, '2', 'Urine Sugar', 'U sug', '21', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 10:45:47 Niemi\r\n'')', 'Niemi', '2006-11-01 11:18:15', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(14, '2', 'Urine Dip Stick', 'U DipSt', '22', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 10:46:13 Niemi\r\n'')', 'Niemi', '2006-11-01 11:18:37', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(15, '2', 'Routine Urine Analysis w Micro', 'U anal', '23', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 10:45:34 Niemi\r\n'')', 'Niemi', '2006-11-01 11:18:55', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(16, '3', 'Complete blood count (CBC)', 'CBC', '24', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 08:55:06 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 07:55:06', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(17, '3', 'Hemoglobin (Hb)', 'Hb', '25', 'g/dl', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 08:56:17 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 07:56:17', '', '0000-00-00 00:00:00', '2000,00', NULL, NULL, NULL),
(18, '3', 'White blood count (WBC)', 'WBC', '26', 'mm/3', '', '', '', '', '', '', '', 'radio', '', '', 'CONCAT(history,''Update 2007-10-03 09:29:05 sekunda shirima\n'')', 'sekunda shirima', '2007-10-03 08:29:05', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(19, '3', 'Red Blood Cell Count', 'RBC', '27', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 09:21:21 Winnie\r\n'')', 'Winnie', '2006-11-01 11:20:24', '', '0000-00-00 00:00:00', '2500,00', NULL, NULL, NULL),
(20, '3', 'Platelet count', 'Platelet c', '28', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 08:56:39 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 07:56:39', '', '0000-00-00 00:00:00', '2500,00', NULL, NULL, NULL),
(21, '3', 'Reticulocyte count', 'Retic', '29', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 09:19:35 Winnie\r\n'')', 'Winnie', '2006-11-01 11:21:13', '', '0000-00-00 00:00:00', '3000,00', NULL, NULL, NULL),
(22, '3', 'ESR', '', '30', 'mm/hr', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-01-16 14:00:30 Gladnes\n'')', 'Gladnes', '2006-01-16 01:00:30', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(23, '3', 'Sickle cell test', 'SCT', '31', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 09:21:59 Winnie\r\n'')', 'Winnie', '2006-11-01 11:21:29', '', '0000-00-00 00:00:00', '3000,00', NULL, NULL, NULL),
(24, '3', 'Type and Screen Donors', 'Donor T&S', '32', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 09:23:46 Winnie\r\n'')', 'Winnie', '2006-11-01 11:50:31', '', '0000-00-00 00:00:00', '4000,00', NULL, NULL, NULL),
(26, '3', 'Coomb''s Test', 'Coomb''s', '34', '', '', '', '', '', '', '', '', 'text', 'specify site', '', 'CONCAT(history,''Update 2006-02-07 09:19:01 Winnie\r\n'')', 'Winnie', '2006-11-01 11:22:46', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(27, '3', 'Type and Cross Match Patient', 'PatientT&C', '35', '', '', '', '', '', '', '', '', 'text', 'specify site', '', 'CONCAT(history,''Update 2007-05-28 08:58:20 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 07:58:20', '', '0000-00-00 00:00:00', '10000,00', NULL, NULL, NULL),
(28, '4', 'HIV - Private request', 'HIV priv', '36', '', '', '', '', '', '', '', '', '', 'Positive', '', 'CONCAT(history,''Update 2007-05-25 08:48:06 Winnie Dunstan\n'')', 'Winnie Dunstan', '2007-05-25 07:48:06', '', '0000-00-00 00:00:00', '0,00', NULL, NULL, NULL),
(29, '4', 'Widal Test', 'Widal', '37', '', '', '', '', '', '', '', '', '', 'Positive', '', 'CONCAT(history,''Update 2007-05-25 08:47:10 Winnie Dunstan\n'')', 'Winnie Dunstan', '2007-05-25 07:47:10', '', '0000-00-00 00:00:00', '3000,00', NULL, NULL, NULL),
(30, '4', 'HBsAg', '', '38', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:02:47 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:02:47', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(31, '4', 'HIV - Patient', 'HIV pat', '39', '', '', '', '', '', '', '', '', '', 'Positive', '', 'CONCAT(history,''Update 2007-05-25 08:48:22 Winnie Dunstan\n'')', 'Winnie Dunstan', '2007-05-25 07:48:22', '', '0000-00-00 00:00:00', '0,00', NULL, NULL, NULL),
(32, '4', 'Brucellosis', 'Bruc', '40', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 10:42:29 Niemi\r\n'')', 'Niemi', '2006-11-01 11:25:42', '', '0000-00-00 00:00:00', '2000,00', NULL, NULL, NULL),
(33, '4', 'H. pylori', 'H.pyl', '41', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 10:42:58 Niemi\r\n'')', 'Niemi', '2006-11-01 11:26:01', '', '0000-00-00 00:00:00', '10000,00', NULL, NULL, NULL),
(34, '5', 'Haematest', 'Haemat', '42', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 10:50:44 Niemi\r\n'')', 'Niemi', '2006-11-01 11:26:23', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(35, '5', 'Stool for O&P', 'Stool O&P', '43', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-01-16 14:11:06 Gladnes\r\n'')', 'Gladnes', '2006-11-01 11:27:02', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(36, '6', 'AFB (tuberculosis) No. 1', 'AFB no1', '44', '', '', '', '', '', '', '', '', 'radio', 'Positivie', '', 'CONCAT(history,''Update 2006-02-18 14:12:09 Niemi\r\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '0,00', NULL, NULL, NULL),
(37, '6', 'Gram Stain', 'Gram st', '45', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:17:47 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:17:47', '', '0000-00-00 00:00:00', '2000,00', NULL, NULL, NULL),
(40, '6', 'HVS/URETHRA WET', 'C&S', '48', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-06-19 17:18:45 Gladness John\n'')', 'Gladness John', '2007-06-19 16:18:45', '', '0000-00-00 00:00:00', '2000,00', NULL, NULL, NULL),
(41, '6', 'KOH Stain', 'KOH', '49', '', '', '', '', '', '', '', '', 'text', 'specify site', '', 'CONCAT(history,''Update 2005-11-15 10:48:38 Niemi\r\n'')', 'Niemi', '2006-11-01 11:30:19', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(42, '7', 'Malaria - QBC', 'Mal QBC', '50', '', '', '', '', '', '', '', '', 'radio', 'Positive', '', 'CONCAT(history,''Update 2006-02-18 14:13:37 Niemi\r\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '3000,00', NULL, NULL, NULL),
(43, '7', 'Malaria Smear', 'Mal smear', '51', '', '', '', '', '', '', '', '', 'radio', 'Positive', '', 'CONCAT(history,''Update 2006-02-18 14:13:48 Niemi\r\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(44, '7', 'Leishmaniasis', 'Leishm', '52', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 11:17:41 Niemi\r\n'')', 'Niemi', '2006-11-01 11:31:18', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(45, '7', 'Schistosomiasis', 'Schisto', '53', '', '', '', '', '', '', '', '', 'text', 'specify site', '', 'CONCAT(history,''Update 2005-11-15 11:18:22 Niemi\r\n'')', 'Niemi', '2006-11-01 11:46:11', '', '0000-00-00 00:00:00', '3000,00', NULL, NULL, NULL),
(46, '8', 'Pregnancy Test', 'Pregn', '54', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 11:00:58 Niemi\r\n'')', 'Niemi', '2006-11-01 11:31:54', '', '0000-00-00 00:00:00', '2500,00', NULL, NULL, NULL),
(47, '8', 'CSF (Full Exam)', 'CSF-full', '55', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 11:01:29 Niemi\r\n'')', 'Niemi', '2006-11-01 11:32:20', '', '0000-00-00 00:00:00', '3500,00', NULL, NULL, NULL),
(48, '8', 'Effusion (same as CSF Screen)', 'Effusion', '56', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 11:02:09 Niemi\r\n'')', 'Niemi', '2006-11-01 11:32:40', '', '0000-00-00 00:00:00', '3500,00', NULL, NULL, NULL),
(53, '8', 'Bleed Time', 'Bl time', '61', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:07:30 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:07:30', '', '0000-00-00 00:00:00', '2000,00', NULL, NULL, NULL),
(56, '8', 'Rheumatoid Factor', 'Rh fact', '64', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 11:59:23 Niemi\r\n'')', 'Niemi', '2006-11-01 11:33:20', '', '0000-00-00 00:00:00', '3000,00', NULL, NULL, NULL),
(58, '8', 'CD4', '', '66', '+lymph/m/3', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 11:59:32 Niemi\n'')', 'Niemi', '2006-02-05 22:59:32', '', '0000-00-00 00:00:00', '15000,00', NULL, NULL, NULL),
(59, '8', 'Thyroid Function', 'Thyr funct', '67', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-25 08:50:20 Winnie Dunstan\n'')', 'Winnie Dunstan', '2007-05-25 07:50:20', '', '0000-00-00 00:00:00', '45000,00', NULL, NULL, NULL),
(61, '8', 'Glucometer Glucose', 'BG Glucom', '69', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-25 08:49:48 Winnie Dunstan\n'')', 'Winnie Dunstan', '2007-05-25 07:49:48', '', '0000-00-00 00:00:00', '2500,00', NULL, NULL, NULL),
(63, '8', 'Semen Analysis', 'Semen', '71', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 11:04:02 Niemi\r\n'')', 'Niemi', '2006-11-01 11:40:38', '', '0000-00-00 00:00:00', '3000,00', NULL, NULL, NULL),
(64, '8', 'PPT', '', '72', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 12:08:06 Niemi\n'')', 'Niemi', '2006-02-05 23:08:06', '', '0000-00-00 00:00:00', '3000,00', NULL, NULL, NULL),
(65, '8', 'HVS', '', '73', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 11:02:39 Niemi\n'')', 'Niemi', '2005-11-14 22:02:22', '', '0000-00-00 00:00:00', '1000,00', NULL, NULL, NULL),
(69, '8', 'PT', '', '77', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 11:05:19 Niemi\n'')', 'Niemi', '2005-11-14 22:05:02', '', '0000-00-00 00:00:00', '3000,00', NULL, NULL, NULL),
(71, '6', 'AFB (tuberculosis) No. 2', 'AFB no2', '80', '', '', '', '', '', '', '', '', 'radio', 'Positive', '', 'CONCAT(history,''Update 2006-02-18 14:12:24 Niemi\r\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '0,00', NULL, NULL, NULL),
(72, '6', 'AFB (tuberculosis) No. 3', 'AFB no3', '81', '', '', '', '', '', '', '', '', 'radio', 'Positive', '', 'CONCAT(history,''Update 2006-02-18 14:12:34 Niemi\r\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '0,00', NULL, NULL, NULL),
(73, '1', 'Albumin', 'Alb', '82', 'md/dl', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 09:08:34 Winnie\r\n'')', 'Winnie', '2006-11-01 11:43:21', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(74, '1', 'Blood Urea Nitrogen', 'BUN', '83', 'md/dl', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 09:05:00 Winnie\r\n'')', 'Winnie', '2006-11-01 11:43:00', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(75, '1', 'GGT', '', '84', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:12:57 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:12:57', '', '0000-00-00 00:00:00', '10000,00', NULL, NULL, NULL),
(76, '1', 'Alkaline Phosphate', 'Al Phos', '85', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 10:37:16 Niemi\r\n'')', 'Niemi', '2006-11-01 11:44:39', '', '0000-00-00 00:00:00', '2000,00', NULL, NULL, NULL),
(77, '1', 'Glucose Tolerance Test', 'Gluc TT', '86', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-07 09:16:40 Winnie\r\n'')', 'Winnie', '2006-11-01 11:44:02', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(78, '1', 'Fasting Blood Sugar', 'FBS', '87', 'mg/dl', '500', '400', '600', '', '', '', '', 'radio', '', '', 'CONCAT(history,''Update 2007-11-13 14:31:12 Niemi\n'')', 'Niemi', '2007-11-13 14:31:12', '', '0000-00-00 00:00:00', '2000,00', NULL, NULL, NULL),
(79, '1', 'Random Blood Sugar', 'RBS', '88', 'mg/dl', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-01-16 13:57:45 Gladnes\r\n'')', 'Gladnes', '2006-11-01 11:40:04', '', '0000-00-00 00:00:00', '2000,00', NULL, NULL, NULL),
(80, '4', 'VDRL', '', '89', '', '', '', '', '', '', '', '', 'radio', 'Positive', '', 'CONCAT(history,''Update 2006-02-18 14:14:32 Niemi\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '2000,00', NULL, NULL, NULL),
(81, '4', 'Syphillis by Determine', 'Syph Det', '90', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2005-11-15 10:43:45 Niemi\r\n'')', 'Niemi', '2006-11-01 11:39:40', '', '0000-00-00 00:00:00', '1500,00', NULL, NULL, NULL),
(82, '4', 'Strept - Rapid Test', 'Strept RT', '91', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 11:53:43 Niemi\r\n'')', 'Niemi', '2006-11-01 11:39:21', '', '0000-00-00 00:00:00', '10000,00', NULL, NULL, NULL),
(83, '4', 'IgE (allergy)', 'IGE', '92', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 11:55:48 Niemi\r\n'')', 'Niemi', '2006-11-01 11:53:13', '', '0000-00-00 00:00:00', '10000,00', NULL, NULL, NULL),
(84, '4', 'Rheumatoid factor', 'RF', '93', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:03:48 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:03:48', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(85, '4', 'Chlamydia', 'Chlam', '94', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2007-05-28 09:02:19 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:02:19', '', '0000-00-00 00:00:00', '10000,00', NULL, NULL, NULL),
(86, '4', 'CD4', '', '95', '+lymph/m/3', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:01:33 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:01:33', '', '0000-00-00 00:00:00', '30000,00', NULL, NULL, NULL),
(87, '4', 'ASOT', '', '96', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:00:36 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:00:36', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(88, '6', 'Body fluids C/S', 'BF C/S', '97', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 12:02:28 Niemi\r\n'')', 'Niemi', '2006-11-01 11:36:27', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(89, '6', 'HVS,Urethreal swap C/S', 'HVS, Ur sw', '98', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 12:03:12 Niemi\r\n'')', 'Niemi', '2006-11-01 11:36:07', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(90, '6', 'CSF Analysis C/S', 'CSFanalC/S', '99', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 12:03:52 Niemi\r\n'')', 'Niemi', '2006-11-01 11:51:15', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(91, '6', 'Blood C/S', '', '100', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:18:34 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:18:34', '', '0000-00-00 00:00:00', '10000,00', NULL, NULL, NULL),
(92, '6', 'Stool C/S', '', '101', '', '', '', '', '', '', '', '', 'checkbox', '', '', 'CONCAT(history,''Update 2007-05-28 09:16:14 Moye Masenga\n'')', 'Moye Masenga', '2007-05-28 08:16:14', '', '0000-00-00 00:00:00', '10000,00', NULL, NULL, NULL),
(93, '6', 'Pus C/S', '', '102', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 12:04:49 Niemi\n'')', 'Niemi', '2006-02-05 23:04:49', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(94, '6', 'Urine C/S', '', '103', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-06 12:05:08 Niemi\n'')', 'Niemi', '2006-02-05 23:05:08', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(95, '1', 'SGPT/ALAT', 'ALAT', '104', 'u/l', '', '', '', '', '', '', '', 'radio', '', '', 'CONCAT(history,''Update 2006-11-20 11:20:50 Niemi\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(96, '1', 'TRYGLYCERIDE', 'Trigly', '105', '', '', '', '', '', '', '', '', 'radio', '', '', 'CONCAT(history,''Update 2007-01-10 11:18:39 Niemi\n'')', 'Niemi', '2007-05-24 09:00:21', '', '0000-00-00 00:00:00', '20000,00', NULL, NULL, NULL),
(97, '1', 'ACP', '', '106', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-10 15:58:08 Rehema\n'')', 'Rehema', '2006-02-10 02:58:08', '', '0000-00-00 00:00:00', '5000.00', NULL, NULL, NULL),
(98, '1', 'B/GLUCOSE ANALYSER', 'Bgluc anal', '107', 'mg/dl', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2006-02-14 10:38:06 Winnie\r\n'')', 'Winnie', '2006-11-01 11:34:49', '', '0000-00-00 00:00:00', '5000,00', NULL, NULL, NULL),
(99, '1', 'Red blood cells mophorlogy', '', '108', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2007-01-20 11:36:37 Winnie Dunstan\n'')', 'Winnie Dunstan', '2007-01-20 09:36:37', '', '0000-00-00 00:00:00', '2500.00', NULL, NULL, NULL),
(100, '1', 'Blood Group', '', '109', '', '', '', '', '', '', '', '', '', '', '', 'CONCAT(history,''Update 2007-03-22 09:20:51 Winnie Dunstan\n'')', 'Winnie Dunstan', '2007-03-22 07:20:51', '', '0000-00-00 00:00:00', '1000', NULL, NULL, NULL);

--
-- Dumping data for table 'care_tz_laboratory_tests'
--

INSERT INTO care_tz_laboratory_tests (id, parent, name, is_common, is_comment_required, comment, price, is_enabled) VALUES
(1, -1, 'Chemistries', 0, 0, '', 0, 1),
(2, -1, 'Urinalysis', 0, 0, '', 0, 1),
(3, -1, 'Hematology', 0, 0, '', 0, 1),
(4, -1, 'Serology', 0, 0, '', 0, 1),
(5, -1, 'Stool', 0, 0, '', 0, 1),
(6, -1, 'Bacteriology', 0, 0, '', 0, 1),
(7, -1, 'Parasitology', 0, 0, '', 0, 1),
(8, -1, 'Other', 0, 0, '', 0, 1),
(9, 1, 'Amylase', 0, 0, '', 0, 1),
(10, 1, 'Bilirubin', 0, 0, '', 0, 1),
(11, 1, 'Acid Phosphotate', 0, 0, '', 0, 0),
(12, 1, 'Total Protein', 0, 0, '', 0, 1),
(13, 1, 'Creatinine', 0, 0, '', 0, 1),
(14, 1, 'HDL', 0, 0, '', 0, 1),
(15, 1, 'LDL', 0, 0, '', 0, 1),
(16, 1, 'Potassium K+', 0, 0, '', 0, 1),
(17, 1, 'SGOT/AST', 0, 0, '', 0, 1),
(18, 1, 'Cholesterol', 0, 0, '', 0, 1),
(19, 1, 'Sodium Na+', 0, 0, '', 0, 1),
(20, 1, 'Uric acid', 0, 0, '', 0, 1),
(21, 2, 'Urine Sugar', 0, 0, '', 0, 1),
(22, 2, 'Urine Dip Stick', 0, 0, '', 0, 1),
(23, 2, 'Routine Urine Analysis w Micro', 0, 0, '', 0, 1),
(24, 3, 'Complete blood count (CBC)', 0, 0, '', 0, 1),
(25, 3, 'Hemoglobin (Hb)', 0, 0, '', 0, 1),
(26, 3, 'White blood count (WBC)', 0, 0, '', 0, 1),
(27, 3, 'Red Bllod Cell Count', 0, 0, '', 0, 1),
(28, 3, 'Platelet count', 0, 0, '', 0, 1),
(29, 3, 'Reticulocyte count', 0, 0, '', 0, 1),
(30, 3, 'ESR', 0, 0, '', 0, 1),
(31, 3, 'Sickle cell test', 0, 0, '', 0, 1),
(32, 3, 'Type and Screen Donors', 0, 0, '', 0, 1),
(34, 3, 'Coomb''s Test', 0, 1, '', 0, 1),
(35, 3, 'Type and Cross Match Patient', 0, 1, '', 0, 1),
(36, 4, 'HIV - Private request', 0, 0, '', 0, 1),
(37, 4, 'Widal Test', 0, 0, '', 0, 1),
(38, 4, 'HBsAg', 0, 0, '', 0, 1),
(39, 4, 'HIV - Patient', 0, 0, '', 0, 1),
(40, 4, 'Brucellosis', 0, 0, '', 0, 1),
(41, 4, 'H. pylori', 0, 0, '', 0, 1),
(42, 5, 'Haematest', 0, 0, '', 0, 1),
(43, 5, 'Stool for O&P', 0, 0, '', 0, 1),
(44, 6, 'AFB (tuberculosis) No. 1', 0, 0, '', 0, 1),
(45, 6, 'Gram Stain', 0, 0, '', 0, 1),
(48, 6, 'HVS/URETHRA WET', 0, 0, '', 0, 1),
(49, 6, 'KOH Stain', 0, 1, '', 0, 1),
(50, 7, 'Malaria - QBC', 0, 1, '', 0, 1),
(51, 7, 'Malaria Smear', 0, 0, '', 0, 1),
(52, 7, 'Leishmoniasis', 0, 0, '', 0, 1),
(53, 7, 'Schistosomiasis', 0, 1, '', 0, 1),
(54, 8, 'Pregnancy Test', 0, 0, '', 0, 1),
(55, 8, 'CSF (Full Exam)', 0, 0, '', 0, 1),
(56, 8, 'Effusion (same as CSF Screen)', 0, 0, '', 0, 1),
(61, 8, 'Bleed Time', 0, 0, '', 0, 1),
(64, 8, 'Rheumatoid Factor', 0, 0, '', 0, 0),
(66, 8, 'CD4', 0, 0, '', 0, 0),
(67, 8, 'Thyroid Function', 0, 0, '', 0, 1),
(69, 8, 'Glucometer Glucose', 0, 0, '', 0, 1),
(71, 8, 'Semen Analysis', 0, 0, '', 0, 1),
(72, 8, 'PPT', 0, 0, '', 0, 1),
(73, 8, 'HVS', 0, 0, '', 0, 1),
(77, 8, 'PT', 0, 0, '', 0, 1),
(80, 6, 'AFB (tuberculosis) No. 2', 0, 0, '', 0, 1),
(81, 6, 'AFB (tuberculosis) No. 3', 0, 0, '', 0, 1),
(82, 1, 'Albumin', 0, 0, '', 0, 1),
(83, 1, 'Blood Urea Nitrogen', 0, 0, '', 0, 1),
(84, 1, 'GGT', 0, 0, '', 0, 1),
(85, 1, 'Alkaline Phosphate', 0, 0, '', 0, 1),
(86, 1, 'Glucose Tolerance Test', 0, 0, '', 0, 1),
(87, 1, 'Fasting Blood Sugar', 0, 0, '', 0, 1),
(88, 1, 'Random Blood Sugar', 0, 0, '', 0, 1),
(89, 4, 'VDRL', 0, 0, '', 0, 1),
(90, 4, 'Syphillis by Determine', 0, 0, '', 0, 1),
(91, 4, 'Strept - Rapid Test', 0, 0, '', 0, 1),
(92, 4, 'IgE (allergy)', 0, 0, '', 0, 1),
(93, 4, 'Rheumatoid factor', 0, 0, '', 0, 1),
(94, 4, 'Chlamydia', 0, 0, '', 0, 1),
(95, 4, 'CD4', 0, 0, '', 0, 1),
(96, 4, 'ASOT', 0, 0, '', 0, 1),
(97, 6, 'Body fluids C/S', 0, 0, '', 0, 1),
(98, 6, 'HVS,Urethreal swap C/S', 0, 0, '', 0, 1),
(99, 6, 'CSF Analysis C/S', 0, 0, '', 0, 1),
(100, 6, 'Blood C/S', 0, 0, '', 0, 1),
(101, 6, 'Stool C/S', 0, 0, '', 0, 1),
(102, 6, 'Pus C/S', 0, 0, '', 0, 1),
(103, 6, 'Urine C/S', 0, 0, '', 0, 1),
(104, 1, 'SGPT/ALAT', 0, 0, '', 0, 1),
(105, 1, 'TRYGLYCERIDE', 0, 0, '', 0, 1),
(106, 1, 'ACP', 0, 0, '', 0, 1),
(107, 1, 'B/GLUCOSE ANALYSER', 0, 0, '', 0, 1),
(108, 1, 'Red blood cells mophorlogy', 0, 0, '', 0, 1),
(109, 1, 'Blood Group', 0, 0, '', 0, 1);

--
-- Dumping data for table 'care_tz_mtuha_cat'
--

INSERT INTO care_tz_mtuha_cat (cat_ID, description) VALUES
(1, 'Acute Respiratory Infections'),
(2, 'Diarrhoeal Diseases- bacterial'),
(3, 'Diarrhoeal Diseases- non-bacterial'),
(4, 'Hepatitis HAV'),
(5, 'Hepatitis HBV'),
(6, 'Hepatitis Others'),
(7, 'Intestinal Worms'),
(8, 'Leprosy'),
(9, 'Malaria - severe, complicated'),
(10, 'Malaria - uncomplicated'),
(11, 'Schistosomiasis'),
(12, 'Tuberculosis'),
(13, 'Genital Discharge Syndrome'),
(14, 'Genital Ulcers Disease'),
(15, 'Sex trans. dise (others)'),
(16, 'Severe Protein Energy Malnutrition'),
(17, 'Nutritional Disorders'),
(18, 'Anaemia, Sickle cell'),
(19, 'Anaemia, Others'),
(20, 'Neuroses'),
(21, 'Psychoses'),
(22, 'Epilepsy'),
(23, 'Ear Infetions'),
(24, 'Eye Infections'),
(25, 'Other eye diseases, Cataract'),
(26, 'Other eye diseases, other non inf'),
(27, 'Vitamin A Defic/Xerophtalmia'),
(28, 'Cardiov Dis, Cardiac Failure'),
(29, 'Cardiov Dis, Hypertension'),
(30, 'Cardiov Dis, Others'),
(31, 'Rheumatic fever'),
(32, 'Asthma'),
(33, 'Pneumonia'),
(34, 'Respiratory Diseases, Others'),
(35, 'Non inf GI diseases, Peptic ulcer'),
(36, 'Non inf GI diseases, Others'),
(37, 'Non inf liver diseases'),
(38, 'Gynecological disorders, PID'),
(39, 'Gynecological disorders, Others'),
(40, 'UTI'),
(41, 'Non-infectious kidney diseases'),
(42, 'Skin Diseases, Infectious'),
(43, 'Skin Diseases, Non-infectious'),
(44, 'Rheumatoid or Joint Diseases'),
(45, 'Perinatal, neonatal Conditions'),
(46, 'Snake and Insect bites'),
(47, 'Burns'),
(48, 'Poisonings'),
(49, 'Clinical AIDS'),
(50, 'Neoplasms'),
(51, 'Thyroid Diseases'),
(52, 'Diabetes Mellitus'),
(53, 'Haematological diseases (excl anaemias)'),
(54, 'Osteomyelitis'),
(55, 'Congenital diseases'),
(56, 'Fractures, dislocations'),
(57, 'Ill defined symptoms, no diagnosis'),
(58, 'Diagnosis, others');

--
-- Dumping data for table 'care_tz_mtuha_cat_key'
--

INSERT INTO care_tz_mtuha_cat_key (cat_ID, icd10_key) VALUES
(1, 'J00'),
(1, 'J01'),
(1, 'J02'),
(1, 'J03'),
(1, 'J04'),
(1, 'J05'),
(1, 'J06'),
(1, 'J10'),
(1, 'J11'),
(1, 'J20'),
(1, 'J21'),
(1, 'J22'),
(2, 'A00'),
(2, 'A01'),
(2, 'A02'),
(2, 'A03'),
(2, 'A04'),
(2, 'A05'),
(3, 'A06'),
(3, 'A07'),
(3, 'A08'),
(3, 'A09'),
(4, 'B15'),
(5, 'B16'),
(6, 'B17'),
(6, 'B18'),
(6, 'B19'),
(7, 'B66'),
(7, 'B67'),
(7, 'B68'),
(7, 'B69'),
(7, 'B70'),
(7, 'B71'),
(7, 'B75'),
(7, 'B76'),
(7, 'B77'),
(7, 'B78'),
(7, 'B79'),
(7, 'B80'),
(7, 'B81'),
(7, 'B82'),
(8, 'A30'),
(9, 'B50.0'),
(9, 'B50.8'),
(10, 'B50.9'),
(10, 'B52'),
(10, 'B53'),
(10, 'B54'),
(11, 'B65'),
(12, 'A15'),
(12, 'A16'),
(12, 'A17'),
(12, 'A18'),
(12, 'A19'),
(12, 'M49.0'),
(12, 'M90.0'),
(12, 'P37.0'),
(13, 'N76.0'),
(13, 'N76.1'),
(13, 'N76.2'),
(13, 'N76.3'),
(14, 'N76.5'),
(14, 'N76.6'),
(15, 'A50'),
(15, 'A51'),
(15, 'A52'),
(15, 'A53'),
(15, 'A54'),
(15, 'A55'),
(15, 'A56'),
(15, 'A57'),
(15, 'A58'),
(15, 'A59'),
(15, 'A60'),
(15, 'A61'),
(15, 'A62'),
(15, 'A63'),
(15, 'A64'),
(16, 'E40'),
(16, 'E41'),
(16, 'E42'),
(16, 'E43'),
(17, 'E44'),
(17, 'E45'),
(17, 'E46'),
(17, 'E51'),
(17, 'E52'),
(17, 'E53'),
(17, 'E54'),
(17, 'E55'),
(17, 'E56'),
(17, 'E57'),
(17, 'E58'),
(17, 'E59'),
(17, 'E60'),
(17, 'E61'),
(17, 'E62'),
(17, 'E63'),
(17, 'E64'),
(18, 'D57'),
(19, 'D50'),
(19, 'D51'),
(19, 'D52'),
(19, 'D53'),
(19, 'D54'),
(19, 'D55'),
(19, 'D56'),
(19, 'D58'),
(19, 'D59'),
(19, 'D60'),
(19, 'D61'),
(19, 'D62'),
(19, 'D63'),
(19, 'D64'),
(20, 'F40'),
(20, 'F41'),
(20, 'F42'),
(20, 'F43'),
(20, 'F44'),
(20, 'F45'),
(20, 'F46'),
(20, 'F47'),
(20, 'F48'),
(21, 'F20'),
(21, 'F21'),
(21, 'F22'),
(21, 'F23'),
(21, 'F24'),
(21, 'F25'),
(21, 'F26'),
(21, 'F27'),
(21, 'F28'),
(21, 'F29'),
(21, 'F30.2'),
(21, 'F31.5'),
(21, 'F32.3'),
(21, 'F33.3'),
(22, 'G40'),
(22, 'G41'),
(23, 'H60'),
(23, 'H65'),
(23, 'H67'),
(23, 'H68'),
(23, 'H70'),
(23, 'H73.0'),
(23, 'H73.1'),
(23, 'H75'),
(24, 'A53.3'),
(24, 'H00.0'),
(24, 'H03.1'),
(24, 'H04.3'),
(24, 'H05.0'),
(24, 'H10.0'),
(24, 'H16'),
(25, 'Q12.0'),
(25, 'H25'),
(25, 'H26'),
(26, 'H00'),
(26, 'H01'),
(26, 'H02'),
(26, 'H03'),
(26, 'H04'),
(26, 'H05'),
(26, 'H06'),
(26, 'H07'),
(26, 'H08'),
(26, 'H09'),
(26, 'H10'),
(26, 'H11'),
(26, 'H12'),
(26, 'H13'),
(26, 'H14'),
(26, 'H15'),
(26, 'H16'),
(26, 'H17'),
(26, 'H18'),
(26, 'H19'),
(26, 'H20'),
(26, 'H21'),
(26, 'H22'),
(26, 'H23'),
(26, 'H24'),
(26, 'H25'),
(26, 'H26'),
(26, 'H27'),
(26, 'H28'),
(26, 'H29'),
(26, 'H30'),
(26, 'H31'),
(26, 'H32'),
(26, 'H33'),
(26, 'H34'),
(26, 'H35'),
(26, 'H36'),
(26, 'H37'),
(26, 'H38'),
(26, 'H39'),
(26, 'H40'),
(26, 'H41'),
(26, 'H42'),
(26, 'H43'),
(26, 'H44'),
(26, 'H45'),
(26, 'H46'),
(26, 'H47'),
(26, 'H48'),
(26, 'H49'),
(26, 'H50'),
(26, 'H51'),
(26, 'H52'),
(26, 'H53'),
(26, 'H54'),
(26, 'H55'),
(26, 'H56'),
(26, 'H57'),
(26, 'H58'),
(26, 'H59'),
(27, 'E50'),
(28, 'I50'),
(29, 'I10'),
(29, 'I11'),
(29, 'I12'),
(29, 'I13'),
(29, 'I14'),
(29, 'I15'),
(30, 'I20'),
(30, 'I21'),
(30, 'I22'),
(30, 'I23'),
(30, 'I24'),
(30, 'I25'),
(30, 'I26'),
(30, 'I27'),
(30, 'I28'),
(30, 'I29'),
(30, 'I30'),
(30, 'I31'),
(30, 'I32'),
(30, 'I33'),
(30, 'I34'),
(30, 'I35'),
(30, 'I36'),
(30, 'I37'),
(30, 'I38'),
(30, 'I39'),
(30, 'I40'),
(30, 'I41'),
(30, 'I42'),
(30, 'I43'),
(30, 'I44'),
(30, 'I45'),
(30, 'I46'),
(30, 'I47'),
(30, 'I48'),
(30, 'I49'),
(30, 'I51'),
(30, 'I52'),
(30, 'I53'),
(30, 'I54'),
(30, 'I55'),
(30, 'I56'),
(30, 'I57'),
(30, 'I58'),
(30, 'I59'),
(30, 'I60'),
(30, 'I61'),
(30, 'I62'),
(30, 'I63'),
(30, 'I64'),
(30, 'I65'),
(30, 'I66'),
(30, 'I67'),
(30, 'I68'),
(30, 'I69'),
(30, 'I70'),
(30, 'I71'),
(30, 'I72'),
(30, 'I73'),
(30, 'I74'),
(30, 'I75'),
(30, 'I76'),
(30, 'I77'),
(30, 'I78'),
(30, 'I79'),
(30, 'I80'),
(30, 'I81'),
(30, 'I82'),
(30, 'I83'),
(30, 'I84'),
(30, 'I85'),
(30, 'I86'),
(30, 'I87'),
(30, 'I88'),
(30, 'I89'),
(30, 'I90'),
(30, 'I91'),
(30, 'I92'),
(30, 'I93'),
(30, 'I94'),
(30, 'I95'),
(30, 'I96'),
(30, 'I97'),
(30, 'I98'),
(30, 'I99'),
(31, 'I00'),
(31, 'I01'),
(31, 'I02'),
(31, 'I03'),
(31, 'I04'),
(31, 'I05'),
(31, 'I06'),
(31, 'I07'),
(31, 'I08'),
(31, 'I00'),
(32, 'J45'),
(32, 'J46'),
(33, 'J12'),
(33, 'J13'),
(33, 'J14'),
(33, 'J15'),
(33, 'J16'),
(33, 'J17'),
(33, 'J18'),
(34, 'J30'),
(34, 'J31'),
(34, 'J32'),
(34, 'J33'),
(34, 'J34'),
(34, 'J35'),
(34, 'J36'),
(34, 'J37'),
(34, 'J38'),
(34, 'J39'),
(34, 'J40'),
(34, 'J41'),
(34, 'J42'),
(34, 'J43'),
(34, 'J44'),
(34, 'J47'),
(34, 'J48'),
(34, 'J49'),
(34, 'J50'),
(34, 'J51'),
(34, 'J52'),
(34, 'J53'),
(34, 'J54'),
(34, 'J55'),
(34, 'J56'),
(34, 'J57'),
(34, 'J58'),
(34, 'J59'),
(34, 'J60'),
(34, 'J61'),
(34, 'J62'),
(34, 'J63'),
(34, 'J64'),
(34, 'J65'),
(34, 'J66'),
(34, 'J67'),
(34, 'J68'),
(34, 'J69'),
(34, 'J70'),
(34, 'J71'),
(34, 'J72'),
(34, 'J73'),
(34, 'J74'),
(34, 'J75'),
(34, 'J76'),
(34, 'J77'),
(34, 'J78'),
(34, 'J79'),
(34, 'J80'),
(34, 'J81'),
(34, 'J82'),
(34, 'J83'),
(34, 'J84'),
(34, 'J85'),
(34, 'J86'),
(34, 'J87'),
(34, 'J88'),
(34, 'J89'),
(34, 'J90'),
(34, 'J91'),
(34, 'J92'),
(34, 'J93'),
(34, 'J94'),
(34, 'J95'),
(34, 'J96'),
(34, 'J97'),
(34, 'J98'),
(34, 'J99'),
(35, 'K25'),
(35, 'K26'),
(35, 'K27'),
(35, 'K28'),
(36, 'K00'),
(36, 'K01'),
(36, 'K02'),
(36, 'K03'),
(36, 'K04'),
(36, 'K05'),
(36, 'K06'),
(36, 'K07'),
(36, 'K08'),
(36, 'K09'),
(36, 'K10'),
(36, 'K11'),
(36, 'K12'),
(36, 'K13'),
(36, 'K14'),
(36, 'K15'),
(36, 'K16'),
(36, 'K17'),
(36, 'K18'),
(36, 'K19'),
(36, 'K20'),
(36, 'K21'),
(36, 'K22'),
(36, 'K23'),
(36, 'K29'),
(36, 'K30'),
(36, 'K31'),
(36, 'K32'),
(36, 'K33'),
(36, 'K34'),
(36, 'K35'),
(36, 'K36'),
(36, 'K37'),
(36, 'K38'),
(36, 'K39'),
(36, 'K40'),
(36, 'K41'),
(36, 'K42'),
(36, 'K43'),
(36, 'K44'),
(36, 'K45'),
(36, 'K46'),
(36, 'K47'),
(36, 'K48'),
(36, 'K49'),
(36, 'K50'),
(36, 'K51'),
(36, 'K52'),
(36, 'K53'),
(36, 'K54'),
(36, 'K55'),
(36, 'K56'),
(36, 'K57'),
(36, 'K58'),
(36, 'K59'),
(36, 'K60'),
(36, 'K61'),
(36, 'K62'),
(36, 'K63'),
(36, 'K64'),
(36, 'K65'),
(36, 'K66'),
(36, 'K67'),
(36, 'K80'),
(36, 'K81'),
(36, 'K82'),
(36, 'K83'),
(36, 'K84'),
(36, 'K85'),
(36, 'K86'),
(36, 'K87'),
(36, 'K88'),
(36, 'K89'),
(36, 'K90'),
(36, 'K91'),
(36, 'K92'),
(36, 'K93'),
(37, 'K70'),
(37, 'K71'),
(37, 'K72'),
(37, 'K74'),
(37, 'K76'),
(37, 'K77'),
(38, 'N73'),
(39, 'N70'),
(39, 'N71'),
(39, 'N72'),
(39, 'N74'),
(39, 'N75'),
(39, 'N76'),
(39, 'N77'),
(39, 'N78'),
(39, 'N79'),
(39, 'N80'),
(39, 'N80'),
(39, 'N81'),
(39, 'N82'),
(39, 'N83'),
(39, 'N84'),
(39, 'N85'),
(39, 'N86'),
(39, 'N87'),
(39, 'N88'),
(39, 'N89'),
(39, 'N90'),
(39, 'N91'),
(39, 'N92'),
(39, 'N93'),
(39, 'N94'),
(39, 'N95'),
(39, 'N96'),
(39, 'N97'),
(39, 'N98'),
(40, 'N10'),
(40, 'N11'),
(40, 'N12'),
(40, 'N30'),
(40, 'N34.1'),
(40, 'N39.0'),
(41, 'N00'),
(41, 'N01'),
(41, 'N02'),
(41, 'N03'),
(41, 'N04'),
(41, 'N05'),
(41, 'N06'),
(41, 'N07'),
(41, 'N08'),
(41, 'N09'),
(41, 'N13'),
(41, 'N14'),
(41, 'N15'),
(41, 'N16'),
(41, 'N17'),
(41, 'N18'),
(41, 'N19'),
(41, 'N20'),
(41, 'N21'),
(41, 'N22'),
(41, 'N23'),
(41, 'N24'),
(41, 'N25'),
(41, 'N26'),
(41, 'N27'),
(41, 'N28'),
(41, 'N29'),
(42, 'L00'),
(42, 'L01'),
(42, 'L02'),
(42, 'L03'),
(42, 'L04'),
(42, 'L05'),
(42, 'L06'),
(42, 'L07'),
(42, 'L08'),
(43, 'L10'),
(43, 'L11'),
(43, 'L12'),
(43, 'L13'),
(43, 'L14'),
(43, 'L15'),
(43, 'L16'),
(43, 'L17'),
(43, 'L18'),
(43, 'L19'),
(43, 'L20'),
(43, 'L21'),
(43, 'L22'),
(43, 'L23'),
(43, 'L24'),
(43, 'L25'),
(43, 'L26'),
(43, 'L27'),
(43, 'L28'),
(43, 'L29'),
(43, 'L30'),
(43, 'L31'),
(43, 'L32'),
(43, 'L33'),
(43, 'L34'),
(43, 'L35'),
(43, 'L36'),
(43, 'L37'),
(43, 'L38'),
(43, 'L39'),
(43, 'L40'),
(43, 'L41'),
(43, 'L42'),
(43, 'L43'),
(43, 'L44'),
(43, 'L45'),
(43, 'L46'),
(43, 'L47'),
(43, 'L48'),
(43, 'L49'),
(43, 'L50'),
(43, 'L51'),
(43, 'L52'),
(43, 'L53'),
(43, 'L54'),
(43, 'L55'),
(43, 'L56'),
(43, 'L57'),
(43, 'L58'),
(43, 'L59'),
(43, 'L60'),
(43, 'L61'),
(43, 'L62'),
(43, 'L63'),
(43, 'L64'),
(43, 'L65'),
(43, 'L66'),
(43, 'L67'),
(43, 'L68'),
(43, 'L69'),
(43, 'L70'),
(43, 'L71'),
(43, 'L72'),
(43, 'L73'),
(43, 'L74'),
(43, 'L75'),
(43, 'L76'),
(43, 'L77'),
(43, 'L78'),
(43, 'L79'),
(43, 'L80'),
(43, 'L81'),
(43, 'L82'),
(43, 'L83'),
(43, 'L84'),
(43, 'L85'),
(43, 'L86'),
(43, 'L87'),
(43, 'L88'),
(43, 'L89'),
(43, 'L90'),
(43, 'L91'),
(43, 'L92'),
(43, 'L93'),
(43, 'L94'),
(43, 'L95'),
(43, 'L96'),
(43, 'L97'),
(43, 'L98'),
(43, 'L99'),
(44, 'M00'),
(44, 'M01'),
(44, 'M02'),
(44, 'M03'),
(44, 'M04'),
(44, 'M05'),
(44, 'M06'),
(44, 'M07'),
(44, 'M08'),
(44, 'M09'),
(44, 'M10'),
(44, 'M11'),
(44, 'M12'),
(44, 'M13'),
(44, 'M14'),
(44, 'M15'),
(44, 'M16'),
(44, 'M17'),
(44, 'M18'),
(44, 'M19'),
(44, 'M20'),
(44, 'M21'),
(44, 'M22'),
(44, 'M23'),
(44, 'M24'),
(44, 'M25'),
(45, 'P00'),
(45, 'P01'),
(45, 'P02'),
(45, 'P03'),
(45, 'P04'),
(45, 'P05'),
(45, 'P06'),
(45, 'P07'),
(45, 'P08'),
(45, 'P09'),
(45, 'P10'),
(45, 'P11'),
(45, 'P12'),
(45, 'P13'),
(45, 'P14'),
(45, 'P15'),
(45, 'P16'),
(45, 'P17'),
(45, 'P18'),
(45, 'P19'),
(45, 'P20'),
(45, 'P21'),
(45, 'P22'),
(45, 'P23'),
(45, 'P24'),
(45, 'P25'),
(45, 'P26'),
(45, 'P27'),
(45, 'P28'),
(45, 'P29'),
(45, 'P30'),
(45, 'P31'),
(45, 'P32'),
(45, 'P33'),
(45, 'P34'),
(45, 'P35'),
(45, 'P36'),
(45, 'P37'),
(45, 'P38'),
(45, 'P39'),
(45, 'P40'),
(45, 'P41'),
(45, 'P42'),
(45, 'P43'),
(45, 'P44'),
(45, 'P45'),
(45, 'P46'),
(45, 'P47'),
(45, 'P48'),
(45, 'P49'),
(45, 'P50'),
(45, 'P51'),
(45, 'P52'),
(45, 'P53'),
(45, 'P54'),
(45, 'P55'),
(45, 'P56'),
(45, 'P57'),
(45, 'P58'),
(45, 'P59'),
(45, 'P60'),
(45, 'P61'),
(45, 'P62'),
(45, 'P63'),
(45, 'P64'),
(45, 'P65'),
(45, 'P66'),
(45, 'P67'),
(45, 'P68'),
(45, 'P69'),
(45, 'P70'),
(45, 'P71'),
(45, 'P72'),
(45, 'P73'),
(45, 'P74'),
(45, 'P75'),
(45, 'P76'),
(45, 'P77'),
(45, 'P78'),
(45, 'P79'),
(45, 'P80'),
(45, 'P81'),
(45, 'P82'),
(45, 'P83'),
(45, 'P84'),
(45, 'P85'),
(45, 'P86'),
(45, 'P87'),
(45, 'P88'),
(45, 'P89'),
(45, 'P90'),
(45, 'P91'),
(45, 'P92'),
(45, 'P93'),
(45, 'P94'),
(45, 'P95'),
(45, 'P96'),
(46, 'X20'),
(46, 'X21'),
(46, 'X22'),
(46, 'X23'),
(47, 'T20'),
(47, 'T21'),
(47, 'T22'),
(47, 'T23'),
(47, 'T24'),
(47, 'T25'),
(47, 'T26'),
(47, 'T27'),
(47, 'T28'),
(47, 'T29'),
(47, 'T30'),
(47, 'T31'),
(47, 'T32'),
(48, 'X60'),
(48, 'X61'),
(48, 'X62'),
(48, 'X63'),
(48, 'X64'),
(48, 'X65'),
(48, 'X66'),
(48, 'X67'),
(48, 'X68'),
(48, 'X69'),
(48, 'Y10'),
(48, 'Y11'),
(48, 'Y12'),
(48, 'Y13'),
(48, 'Y14'),
(48, 'Y15'),
(48, 'Y16'),
(48, 'Y17'),
(48, 'Y18'),
(48, 'Y19'),
(49, 'B20'),
(49, 'B21'),
(49, 'B22'),
(49, 'B23'),
(49, 'B24'),
(50, 'C00'),
(50, 'D48'),
(51, 'E00'),
(51, 'E01'),
(51, 'E02'),
(51, 'E03'),
(51, 'E04'),
(51, 'E05'),
(51, 'E06'),
(51, 'E07'),
(52, 'E10'),
(52, 'E11'),
(52, 'E12'),
(52, 'E13'),
(52, 'E14'),
(53, 'D65'),
(53, 'D66'),
(53, 'D67'),
(53, 'D68'),
(53, 'D69'),
(53, 'D70'),
(53, 'D71'),
(53, 'D72'),
(53, 'D73'),
(53, 'D74'),
(53, 'D75'),
(53, 'D76'),
(53, 'D77'),
(53, 'D78'),
(53, 'D79'),
(53, 'D80'),
(53, 'D81'),
(53, 'D82'),
(53, 'D83'),
(53, 'D84'),
(53, 'D85'),
(53, 'D86'),
(53, 'D87'),
(53, 'D88'),
(53, 'D89'),
(54, 'M86'),
(54, 'M46.2'),
(55, 'Q00'),
(55, 'Q01'),
(55, 'Q02'),
(55, 'Q03'),
(55, 'Q04'),
(55, 'Q05'),
(55, 'Q06'),
(55, 'Q07'),
(55, 'Q08'),
(55, 'Q09'),
(55, 'Q10'),
(55, 'Q11'),
(55, 'Q12'),
(55, 'Q13'),
(55, 'Q14'),
(55, 'Q15'),
(55, 'Q16'),
(55, 'Q17'),
(55, 'Q18'),
(55, 'Q19'),
(55, 'Q20'),
(55, 'Q21'),
(55, 'Q22'),
(55, 'Q23'),
(55, 'Q24'),
(55, 'Q25'),
(55, 'Q26'),
(55, 'Q27'),
(55, 'Q28'),
(55, 'Q29'),
(55, 'Q30'),
(55, 'Q31'),
(55, 'Q32'),
(55, 'Q33'),
(55, 'Q34'),
(55, 'Q35'),
(55, 'Q36'),
(55, 'Q37'),
(55, 'Q38'),
(55, 'Q39'),
(55, 'Q40'),
(55, 'Q41'),
(55, 'Q42'),
(55, 'Q43'),
(55, 'Q44'),
(55, 'Q45'),
(55, 'Q46'),
(55, 'Q47'),
(55, 'Q48'),
(55, 'Q49'),
(55, 'Q50'),
(55, 'Q51'),
(55, 'Q52'),
(55, 'Q53'),
(55, 'Q54'),
(55, 'Q55'),
(55, 'Q56'),
(55, 'Q57'),
(55, 'Q58'),
(55, 'Q59'),
(55, 'Q60'),
(55, 'Q61'),
(55, 'Q62'),
(55, 'Q63'),
(55, 'Q64'),
(55, 'Q65'),
(55, 'Q66'),
(55, 'Q67'),
(55, 'Q68'),
(55, 'Q69'),
(55, 'Q70'),
(55, 'Q71'),
(55, 'Q72'),
(55, 'Q73'),
(55, 'Q74'),
(55, 'Q75'),
(55, 'Q76'),
(55, 'Q77'),
(55, 'Q78'),
(55, 'Q79'),
(55, 'Q80'),
(55, 'Q81'),
(55, 'Q82'),
(55, 'Q83'),
(55, 'Q84'),
(55, 'Q85'),
(55, 'Q86'),
(55, 'Q87'),
(55, 'Q88'),
(55, 'Q89'),
(55, 'Q90'),
(55, 'Q91'),
(55, 'Q92'),
(55, 'Q93'),
(55, 'Q94'),
(55, 'Q95'),
(55, 'Q96'),
(55, 'Q97'),
(55, 'Q98'),
(55, 'Q99'),
(56, 'S02'),
(56, 'S03'),
(56, 'S12'),
(56, 'S13'),
(56, 'S22'),
(56, 'S23'),
(56, 'S32'),
(56, 'S33'),
(56, 'S42'),
(56, 'S43'),
(56, 'S52'),
(56, 'S53'),
(56, 'S62'),
(56, 'S63'),
(56, 'S72'),
(56, 'S73'),
(56, 'S82'),
(56, 'S83'),
(56, 'S92'),
(56, 'S93'),
(56, 'T01'),
(56, 'T02'),
(56, 'T12'),
(56, 'T13'),
(57, 'R00'),
(57, 'R01'),
(57, 'R02'),
(57, 'R03'),
(57, 'R04'),
(57, 'R05'),
(57, 'R06'),
(57, 'R07'),
(57, 'R08'),
(57, 'R09'),
(57, 'R10'),
(57, 'R11'),
(57, 'R12'),
(57, 'R13'),
(57, 'R14'),
(57, 'R15'),
(57, 'R16'),
(57, 'R17'),
(57, 'R18'),
(57, 'R19'),
(57, 'R20'),
(57, 'R21'),
(57, 'R22'),
(57, 'R23'),
(57, 'R24'),
(57, 'R25'),
(57, 'R26'),
(57, 'R27'),
(57, 'R28'),
(57, 'R29'),
(57, 'R30'),
(57, 'R31'),
(57, 'R32'),
(57, 'R33'),
(57, 'R34'),
(57, 'R35'),
(57, 'R36'),
(57, 'R37'),
(57, 'R38'),
(57, 'R39'),
(57, 'R40'),
(57, 'R41'),
(57, 'R42'),
(57, 'R43'),
(57, 'R44'),
(57, 'R45'),
(57, 'R46'),
(57, 'R47'),
(57, 'R48'),
(57, 'R49'),
(57, 'R50'),
(57, 'R51'),
(57, 'R52'),
(57, 'R53'),
(57, 'R54'),
(57, 'R55'),
(57, 'R56'),
(57, 'R57'),
(57, 'R58'),
(57, 'R59'),
(57, 'R60'),
(57, 'R61'),
(57, 'R62'),
(57, 'R63'),
(57, 'R64'),
(57, 'R65'),
(57, 'R66'),
(57, 'R67'),
(57, 'R68'),
(57, 'R69'),
(57, 'R70'),
(57, 'R71'),
(57, 'R72'),
(57, 'R73'),
(57, 'R74'),
(57, 'R75'),
(57, 'R76'),
(57, 'R77'),
(57, 'R78'),
(57, 'R79'),
(57, 'R80'),
(57, 'R81'),
(57, 'R82'),
(57, 'R83'),
(57, 'R84'),
(57, 'R85'),
(57, 'R86'),
(57, 'R87'),
(57, 'R88'),
(57, 'R89'),
(57, 'R90'),
(57, 'R91'),
(57, 'R92'),
(57, 'R93'),
(57, 'R94'),
(57, 'R95'),
(57, 'R96'),
(57, 'R97'),
(57, 'R98'),
(57, 'R99');

--
-- Dumping data for table 'care_tz_region'
--

INSERT INTO care_tz_region (region_id, region_code, region_name, is_additional) VALUES
(1, 1, 'Arusha', 0);

--
-- Dumping data for table 'care_tz_regions'
--

INSERT INTO care_tz_regions (CODE, NAME) VALUES
('ARU', 'Arusha'),
('DSM', 'Dar-es-salaam'),
('DOD', 'Dodoma'),
('BKB', 'Bukoba'),
('KIL', 'Kilimanjaro'),
('MTW', 'Mtwara'),
('SON', 'Songea'),
('LIN', 'Lindi'),
('SIN', 'Singida'),
('TAB', 'Tabora'),
('SHI', 'Shinyanga'),
('MWA', 'Mwanza'),
('KIG', 'Kigoma'),
('MUS', 'Musoma'),
('TAN', 'Tanga'),
('MBE', 'Mbeya'),
('IRI', 'Iringa'),
('MOR', 'Morogoro'),
('MAF', 'Mafia'),
('PWA', 'Pwani');

--
-- Dumping data for table 'care_tz_religion'
--

INSERT INTO care_tz_religion (nr, code, name, is_additional) VALUES
(1, 'LUT', 'LUTHERAN', 0),
(3, 'MUS', 'MUSLIM', 0),
(5, 'ADV', 'ADVENTIST', 0),
(6, 'RC', 'ROMAN CATHOLIC', 0),
(9, 'PAG', 'PAGAN', 0),
(10, 'PENT', 'PENTECOSTAL', 0),
(16, 'AG', 'ASSEMBLES OF GOD', 0),
(20, 'AC', 'OTHER CHRISTIAN', 0),
(24, 'JEHOVA', 'JEHOVA', 0),
(27, 'BANJ', 'OTHERS', 0),
(28, 'HINDU', 'HINDU', 0),
(30, 'NONE', 'NO RELIGION', 0);

--
-- Dumping data for table 'care_tz_stock_item_amount'
--


--
-- Dumping data for table 'care_tz_stock_item_properties'
--


--
-- Dumping data for table 'care_tz_stock_place'
--


--
-- Dumping data for table 'care_tz_tribes'
--

INSERT INTO care_tz_tribes (tribe_id, tribe_code, tribe_name, is_additional) VALUES
(1, 'MC', 'CHAGGA', 0),
(2, 'MN', 'NYAKYUSA', 0),
(3, 'MNY', 'NYIRAMBA', 0),
(4, 'MR', 'LANGI', 0),
(344, 'WANDA', 'WANDA', 0),
(8, 'MM', 'MERU', 0),
(349, 'ZINZA', 'ZINZA', 0),
(10, 'MP', 'PARE', 0),
(345, 'WARE', 'WARE', 0),
(13, 'MSA', 'SAMBAA', 0),
(14, 'MG', 'GOGO', 0),
(15, 'MJI', 'HAYA', 0),
(16, 'MB', 'BENA', 0),
(17, 'MK', 'MAKONDE', 0),
(18, 'MSU', 'SUKUMA', 0),
(19, 'NYAMWE', 'NYAMWEZI', 0),
(21, 'MKU', 'KURIA', 0),
(341, 'SHUBI', 'SHUBI', 0),
(23, 'MZIG', 'ZIGULA', 0),
(26, 'MNYATU', 'NYATURU', 0),
(331, 'NGINDO', 'NGINDO', 0),
(30, 'MWI', 'IRAQW', 0),
(302, 'DOE', 'DOE', 0),
(296, 'AAS', 'AASAX', 0),
(35, 'MSAN', 'SANDAWE', 0),
(36, 'MHE', 'HEHE', 0),
(37, 'MZA', 'ZANAKI', 0),
(336, 'PIMBWE', 'PIMBWE', 0),
(41, 'MUA', 'NYASA', 0),
(43, 'MSO', 'SONJO', 0),
(333, 'NINDI', 'NINDI', 0),
(332, 'NGULU', 'NGULU', 0),
(52, 'MBO', 'BONDEI', 0),
(53, 'AME', 'FOREIGNER', 0),
(54, 'MKWA', 'KWAYA', 0),
(55, 'MKW', 'KWERE', 0),
(56, 'MMBU', 'MBUGWE', 0),
(57, 'MWA', 'WASI', 0),
(59, 'MF', 'FIPA', 0),
(346, 'VIDUNDA', 'VIDUNDA', 0),
(62, 'MANG', 'HANGAZA', 0),
(65, 'MKE', 'KEREWE', 0),
(340, 'SAGALA', 'SAGALA', 0),
(307, 'KACHCHI', 'KACHCHI', 0),
(308, 'KAHE', 'KAHE', 0),
(72, 'MPO', 'POGOLO', 0),
(330, 'NGASA', 'NGASA', 0),
(76, 'MKAG', 'KAGULU', 0),
(306, 'KABWA', 'KABWA', 0),
(80, 'MNYIZ', 'NYISANZU', 0),
(82, 'MMK', 'MAKUA', 0),
(84, 'MJA', 'LUO', 0),
(85, 'MWAR', 'ARAB', 0),
(87, 'MZAR', 'ZARAMO', 0),
(88, 'MSHA', 'SHASHI', 0),
(303, 'GUJARATI', 'GUJARATI', 0),
(338, 'RUFIJI', 'RUFIJI', 0),
(339, 'RUNGWA', 'RUNGWA', 0),
(329, 'NDONDE', 'NDONDE HAMBA', 0),
(313, 'KISI', 'KISI', 0),
(314, 'KONONGO', 'KONONGO', 0),
(335, 'OKIEK', 'OKIEK', 0),
(106, 'MSF', 'SAFWA', 0),
(310, 'KARA', 'KARA', 0),
(311, 'KIMBU', 'KIMBU', 0),
(312, 'KISANKASA', 'KISANKASA', 0),
(112, 'LUM', 'LUGURU', 0),
(116, 'KYO', 'OTHER', 0),
(119, 'MBURU', 'BURUNGE', 0),
(315, 'KUTU', 'KUTU', 0),
(122, 'MGWE', 'GWENO', 0),
(123, 'MSG', 'SANGU', 0),
(134, 'AFR', 'AFRICAN', 0),
(328, 'NDENDEULE', 'NDENDEULE', 0),
(140, 'MNYIH', 'NYIHA', 0),
(142, 'MNYAM', 'NYAMBO', 0),
(143, 'MKIN', 'KINGA', 0),
(146, 'MNDA', 'NDAMBA', 0),
(337, 'ROMBO', 'ROMBO', 0),
(149, 'MDI', 'DIGO', 0),
(327, 'MWERA', 'MWERA', 0),
(156, 'KIS', 'MAASAI', 0),
(347, 'VINZA', 'VINZA', 0),
(163, 'MNDE', 'NDENGEREKO', 0),
(167, 'MTA', 'MATUMBI', 0),
(326, 'MPOTO', 'MPOTO', 0),
(325, 'MOSIRO', 'MOSIRO', 0),
(324, 'MOCHI', 'MOCHI', 0),
(323, 'MEDIAK', 'MEDIAK', 0),
(300, 'BUNGU', 'BUNGU', 0),
(301, 'DHAISO', 'DHAISO', 0),
(196, 'BARB', 'DATOOGA', 0),
(348, 'VUNJO', 'VUNJO', 0),
(202, 'IND', 'INDIAN', 0),
(319, 'MALILA', 'MALILA', 0),
(320, 'MAMBWE-LUN', 'MAMBWE-LUNGU', 0),
(321, 'MARABA', 'MARABA', 0),
(322, 'MBUGU', 'MBUGU', 0),
(213, 'MZANZ', 'SWAHILI', 0),
(226, 'MPAN', 'PANGWA', 0),
(334, 'NYAMWANGA', 'NYAMWANGA', 0),
(309, 'KAMI', 'KAMI', 0),
(232, 'MDA', 'NDALI', 0),
(235, 'MWANJI', 'WANJI', 0),
(239, 'MNG', 'NGURIMI', 0),
(248, 'MSUMBA', 'SUMBWA', 0),
(250, 'MMB', 'MBUNGA', 0),
(255, 'MSE', 'SEGEJU', 0),
(256, 'MSUB', 'SUBA', 0),
(258, 'MNATA', 'IKOMA', 0),
(318, 'MAGOMA', 'MAGOMA', 0),
(304, 'HA', 'HA', 0),
(305, 'HADZA', 'HADZA', 0),
(267, 'MHI', 'YAO', 0),
(268, 'MMAT', 'MATENGO', 0),
(342, 'SUBI', 'SUBI', 0),
(343, 'TONGWE', 'TONGWE', 0),
(297, 'ARA', 'ARAMANIK', 0),
(298, 'BEMBE', 'BEMBE', 0),
(299, 'BENDE', 'BENDE', 0),
(277, 'GOR', 'FIOME', 0),
(317, 'MACHINGA', 'MACHINGA', 0),
(286, 'MWK', 'IKIZU', 0),
(316, 'LAMBYA', 'LAMBYA', 0),
(294, 'MGOL', 'NGONI', 0);

--
-- Dumping data for table 'care_tz_ward'
--

INSERT INTO care_tz_ward (ward_id, ward_code, ward_name, is_additional) VALUES
(1, 12, 'Monduli Mjini - Urban Ward', 1),
(2, 23, 'Engutoto - Mixed Ward', 1),
(3, 31, 'Monduli Juu - Rural Ward', 1),
(4, 41, 'Sepeko - Rural Ward', 1),
(5, 51, 'Lolkisale - Rural Ward', 1),
(6, 61, 'Moita - Rural Ward', 1),
(7, 71, 'Makuyuni - Rural Ward', 1),
(8, 81, 'Elisalei - Rural Ward', 1),
(9, 93, 'Mto wa Mbu - Mixed Ward', 1),
(10, 101, 'Selela - Rural Ward', 1),
(11, 111, 'Engaruka - Rural Ward', 1),
(12, 121, 'Kitumbeine - Rural Ward', 1),
(13, 131, 'Gelai Meirugoi - Rural Ward', 1),
(14, 141, 'Gelai Lumbwa - Rural Ward', 1),
(15, 151, 'Engarenaibor - Rural Ward', 1),
(16, 161, 'Matale - Rural Ward', 1),
(17, 173, 'Namanga - Mixed Ward', 1),
(18, 183, 'Longido - Mixed Ward', 1),
(19, 191, 'Tingatinga - Rural Ward', 1),
(20, 201, 'Olmolog - Rural Ward', 1),
(21, 11, 'Oldonyosambu - Rural Ward', 2),
(22, 21, 'Ngarenanyuki - Rural Ward', 2),
(23, 31, 'Leguruki - Rural Ward', 2),
(24, 43, 'King ori - Mixed Ward', 2),
(25, 53, 'Kikatiti - Mixed Ward', 2),
(26, 61, 'Maroroni - Rural Ward', 2),
(27, 73, 'Makiba - Mixed Ward', 2),
(28, 83, 'Mbuguni - Mixed Ward', 2),
(29, 91, 'Bwawani - Rural Ward', 2),
(30, 101, 'Kikwe - Rural Ward', 2),
(31, 113, 'Maji ya Chai - Mixed Ward', 2),
(32, 123, 'USA River - Mixed Ward', 2),
(33, 133, 'Nkoaranga - Mixed Ward', 2),
(34, 141, 'Songoro - Rural Ward', 2),
(35, 153, 'Poli - Mixed Ward', 2),
(36, 161, 'Singisi - Rural Ward', 2),
(37, 173, 'Akheri - Mixed Ward', 2),
(38, 181, 'Nkoarisambu - Rural Ward', 2),
(39, 191, 'Nkanrua - Rural Ward', 2),
(40, 201, 'Moshono - Rural Ward', 2),
(41, 211, 'Mlangarini - Rural Ward', 2),
(42, 221, 'Nduruma - Rural Ward', 2),
(43, 231, 'Oljoro - Rural Ward', 2),
(44, 243, 'Murieti - Mixed Ward', 2),
(45, 253, 'Mateves - Mixed Ward', 2),
(46, 261, 'Kisongo - Rural Ward', 2),
(47, 273, 'Kiranyi - Mixed Ward', 2),
(48, 283, 'Kimnyaki - Mixed Ward', 2),
(49, 293, 'Moivo - Mixed Ward', 2),
(50, 301, 'Oltroto - Rural Ward', 2),
(51, 313, 'Sokoni II - Mixed Ward', 2),
(52, 321, 'Oltrumet - Rural Ward', 2),
(53, 331, 'Musa - Rual Ward', 2),
(54, 341, 'Mwandeti - Rural Ward', 2),
(55, 351, 'Olkokola - Rual Ward', 2),
(56, 361, 'Ilkiding a - Rural Ward', 2),
(57, 371, 'Bangata - Rural Ward', 2),
(58, 12, 'Kati - Urban Ward', 3),
(59, 22, 'Kaloleni - Urban Ward', 3),
(60, 32, 'Sekei ‘A’ - Urban Ward', 3),
(61, 42, 'Kimandolu - Urban Ward', 3),
(62, 52, 'Baraa  - Urban Ward', 3),
(63, 62, 'Oloirien - Urban Ward', 3),
(64, 72, 'Themi  - Urban Ward', 3),
(65, 82, 'Lemara - Urban Ward', 3),
(66, 91, 'Terrat - Rural Ward', 3),
(67, 103, 'Sokoni - Mixed Ward', 3),
(68, 112, 'Daraja Mbili - Urban Ward', 3),
(69, 122, 'Unga Ltd - Urban Ward', 3),
(70, 132, 'Sombetini - Urban Ward', 3),
(71, 142, 'Ngarenaro - Urban Ward', 3),
(72, 152, 'Levolosi - Urban Ward', 3),
(73, 162, 'Engutoto - Urban Ward', 3),
(74, 172, 'Elerae - Urban Ward', 3),
(75, 13, 'Karatu - Mixed Ward', 4),
(76, 21, 'Endamarariek - Rural Ward', 4),
(77, 31, 'Buger - Rural Ward', 4),
(78, 41, 'Endabash - Rural Ward', 4),
(79, 51, 'Kansay - Rural Ward', 4),
(80, 61, 'Baray - Rural Ward', 4),
(81, 71, 'Mang ola - Rural Ward', 4),
(82, 81, 'Daa - Rural Ward', 4),
(83, 91, 'Oldeani - Rural Ward', 4),
(84, 101, 'Qurus - Rural Ward', 4),
(85, 111, 'Ganako - Rural Ward', 4),
(86, 121, 'Rhotia - Rural Ward', 4),
(87, 131, 'Mbulumbulu - Rural Ward', 4),
(88, 13, 'Orgosorok - Mixed Ward', 5),
(89, 21, 'Digodigo - Rural Ward', 5),
(90, 31, 'Oldonyo - Sambu - Rural Ward', 5),
(91, 41, 'Pinyinyi - Rural Ward', 5),
(92, 51, 'Sale - Rural Ward', 5),
(93, 61, 'Malambo - Rural Ward', 5),
(94, 71, 'Naiyobi - Rural Ward', 5),
(95, 81, 'Nainokanoka - Rural Ward', 5),
(96, 91, 'Olbalbal - Rural Ward', 5),
(97, 103, 'Ngorongoro - Mixed Ward', 5),
(98, 111, 'Enduleni - Rural Ward', 5),
(99, 121, 'Kakesio - Rural Ward', 5),
(100, 131, 'Arash - Rural Ward', 5),
(101, 141, 'Soitisambu - Rural Ward', 5);


--
-- Dumping data for table 'care_department'
--

INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'pr', '2', 'Public Relations', 'PR', 'Press Relations', 'LDPressRelations', '', 0, 0, 1, 1, 0, 1, 0, 0, '', '', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:21:08', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'cafe', '2', 'Cafeteria', 'Cafe', 'Canteen', 'LDCafeteria', '', 0, 0, 1, 1, 0, 1, 0, 0, '', '', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:09:15', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'general_surgery', '1', 'General Surgery', 'General', 'General', 'LDGeneralSurgery', '', 1, 1, 1, 1, 1, 1, 0, 0, '8.30 - 21.00', '12.30 - 15.00 , 19.00 - 21.00', 0, 0, '', '', '', '', '', '', '', '2003-08-28 11:43:27', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(4, 'emergency_surgery', '1', 'Emergency Surgery', 'Emergency', '', 'LDEmergencySurgery', '', 1, 1, 1, 1, 1, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:17:35', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(5, 'plastic_surgery', '1', 'Plastic Surgery', 'Plastic', 'Aesthetic Surgery', 'LDPlasticSurgery', '', 1, 1, 1, 1, 1, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:21:11', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(6, 'ent', '1', 'Ear-Nose-Throath', 'ENT', 'HNO', 'LDEarNoseThroath', 'Ear-Nose-Throath, in german Hals-Nasen-Ohren. The department with  very old traditions that date back to the early beginnings of premodern medicine.', 1, 1, 1, 1, 1, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, NULL, '', 'kope akjdielj asdlkasdf', '', 'hidden', 'Update: 2003-08-13 23:24:16 Elpidio Latorilla\r\nUpdate: 2003-08-13 23:25:27 Elpidio Latorilla\r\nUpdate: 2003-08-13 23:29:05 Elpidio Latorilla\r\nUpdate: 2003-08-13 23:30:21 Elpidio Latorilla\r\nUpdate: 2003-08-13 23:31:52 Elpidio Latorilla\r\nUpdate: 2003-08-13 23:34:08 Elpidio Latorilla\r\n', 'Aklei G. Kessy', '2005-06-29 11:17:09', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(7, 'opthalmology', '1', 'Opthalmology', 'Opthalmology', 'Eye Department', 'LDOpthalmology', '', 1, 1, 1, 1, 1, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 0, 0, NULL, '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(8, 'pathology', '1', 'Pathology', 'Pathology', 'Patho', 'LDPathology', '', 0, 0, 1, 1, 0, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:20:33', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(9, 'ob_gyn', '1', 'Ob-Gynecology', 'Ob-Gyne', 'Gyn', 'LDObGynecology', '', 1, 1, 1, 1, 1, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 0, 0, NULL, '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(10, 'physical_therapy', '1', 'Physical Therapy', 'Physical', 'PT', 'LDPhysicalTherapy', 'Physical therapy department with on-call therapists. Day care clinics, training, rehab.', 1, 0, 1, 1, 0, 1, 1, 16, '8:00 - 15:00', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:21:15', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(11, 'internal_med', '1', 'Internal Medicine', 'Internal Med', 'InMed', 'LDInternalMedicine', '', 1, 1, 1, 1, 0, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 0, 0, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(12, 'imc', '1', 'Intermediate Care Unit', 'IMC', 'Intermediate', 'LDIntermediateCareUnit', '', 1, 1, 1, 1, 0, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:18:22', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(13, 'icu', '1', 'Intensive Care Unit', 'ICU', 'Intensive', 'LDIntensiveCareUnit', '', 1, 1, 1, 1, 0, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:18:23', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(14, 'emergency_ambulatory', '1', 'Emergency Ambulatory', 'Emergency', 'Emergency Amb', 'LDEmergencyAmbulatory', '', 0, 1, 1, 1, 0, 1, 1, 4, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', 'Update: 2003-09-23 00:06:27 Elpidio Latorilla\n', 'Aklei G. Kessy', '2005-06-29 11:17:36', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(15, 'general_ambulatory', '1', 'General Ambulatory', 'Ambulatory', 'General Amb', 'LDGeneralAmbulatory', '', 0, 1, 1, 1, 0, 1, 1, 3, 'round the clock', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:17:33', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(16, 'inmed_ambulatory', '1', 'Internal Medicine Ambulatory', 'InMed Ambulatory', 'InMed Amb', 'LDInternalMedicineAmbulatory', '', 0, 1, 1, 1, 0, 1, 1, 11, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:19:51', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(17, 'sonography', '1', 'Sonography', 'Sono', 'Ultrasound diagnostics', 'LDSonography', '', 0, 1, 1, 1, 0, 1, 1, 11, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:21:51', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(18, 'nuclear_diagnostics', '1', 'Nuclear Diagnostics', 'Nuclear', 'Nuclear Testing', 'LDNuclearDiagnostics', '', 0, 1, 1, 1, 0, 1, 1, 19, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:19:32', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(19, 'pediatric', '1', 'Pediatric clinic', 'Pediatric clinic', 'Pediatric clinic', 'LDPediatric', '', 0, 1, 1, 1, 0, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 0, 0, '', '', '', '', '', '', '', '2006-01-24 11:41:02', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(20, 'oncology', '1', 'Oncology', 'Oncology', 'Cancer Department', 'LDOncology', '', 1, 1, 1, 1, 1, 1, 0, 11, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:20:16', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(21, 'neonatal', '1', 'Neonatal', 'Neonatal', 'Newborn Department', 'LDNeonatal', '', 1, 1, 1, 1, 1, 1, 1, 9, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, NULL, '343', '', '', 'hidden', 'Update: 2003-08-13 22:32:07 Elpidio Latorilla\nUpdate: 2003-08-13 22:33:10 Elpidio Latorilla\nUpdate: 2003-08-13 22:43:39 Elpidio Latorilla\nUpdate: 2003-08-13 22:43:59 Elpidio Latorilla\nUpdate: 2003-08-13 22:44:19 Elpidio Latorilla\n', 'Aklei G. Kessy', '2005-06-29 11:19:35', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(22, 'central_lab', '1', 'Central Laboratory', 'Central Lab', 'General Lab', 'LDCentralLaboratory', '', 0, 1, 1, 1, 0, 1, 0, 0, '', '12.30 - 15.00 , 19.00 - 21.00', 0, 0, '', '', 'kdkdododospdfjdasljfda\r\nasdflasdjf\r\nasdfklasdjflasdjf', '', '', 'Update: 2003-08-13 23:12:30 Elpidio Latorilla\r\nUpdate: 2003-08-13 23:14:59 Elpidio Latorilla\r\nUpdate: 2003-08-13 23:15:28 Elpidio Latorilla\r\n', 'Elpidio Latorilla', '2007-05-11 09:49:57', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(23, 'serological_lab', '1', 'Serological Laboratory', 'Serological Lab', 'Serum Lab', 'LDSerologicalLaboratory', '', 0, 1, 1, 1, 0, 1, 1, 22, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(24, 'chemical_lab', '1', 'Chemical Laboratory', 'Chemical Lab', 'Chem Lab', 'LDChemicalLaboratory', '', 0, 1, 1, 1, 0, 1, 1, 22, '', '12.30 - 15.00 , 19.00 - 21.00', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:09:28', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(25, 'bacteriological_lab', '1', 'Bacteriological Laboratory', 'Bacteriological Lab', 'Bacteria Lab', 'LDBacteriologicalLaboratory', '', 0, 1, 1, 1, 0, 1, 1, 22, '', '12.30 - 15.00 , 19.00 - 21.00', 0, 0, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(26, 'tech', '2', 'Technical Maintenance', 'Tech', 'Technical Support', 'LDTechnicalMaintenance', '', 0, 0, 1, 1, 0, 1, 0, 0, '', '', 0, 0, '', '', '', 'jpg', '', 'Update: 2003-08-10 23:42:30 Elpidio Latorilla\n', 'Elpidio Latorilla', '2003-08-10 23:42:30', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(27, 'it', '2', 'IT Department', 'IT', 'EDP', 'LDITDepartment', '', 0, 0, 1, 1, 0, 1, 0, 0, '', '', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:19:43', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(28, 'management', '2', 'Management', 'Management', 'Busines Administration', 'LDManagement', '', 0, 0, 1, 1, 0, 1, 0, 0, '', '', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:19:40', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(29, 'exhibition', '3', 'Exhibitions', 'Exhibit', 'Showcases', 'LDExhibitions', '', 0, 0, 1, 1, 1, 1, 0, 0, '', '', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:17:34', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(30, 'edu', '3', 'Education', 'Edu', 'Training', 'LDEducation', 'Education news bulletin of the hospital.', 0, 0, 1, 1, 0, 1, 0, 0, '', '', 1, 0, '', '', '', '', 'hidden', 'Update: 2003-08-13 22:44:45 Elpidio Latorilla\nUpdate: 2003-08-13 23:00:37 Elpidio Latorilla\n', 'Aklei G. Kessy', '2005-06-29 11:17:12', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(31, 'study', '3', 'Studies', 'Studies', 'Advance studies or on-the-job training', 'LDStudies', '', 0, 0, 1, 1, 1, 1, 0, 0, '', '', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:21:48', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(32, 'health_tip', '3', 'Health Tips', 'Tips', 'Health Information', 'LDHealthTips', '', 0, 0, 1, 1, 1, 1, 0, 0, '', '', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:18:27', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(33, 'admission', '2', 'Admission', 'Admit', 'Admission information', 'LDAdmission', '', 0, 0, 1, 1, 1, 0, 1, 0, '', '', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:08:29', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(34, 'news_headline', '3', 'Headline', 'News head', 'Major news', 'LDHeadline', '', 0, 0, 1, 1, 1, 1, 0, 0, '', '', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:18:03', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(35, 'cafenews', '3', 'Cafe News', 'Cafe news', 'Cafeteria news', 'LDCafeNews', '', 0, 0, 1, 1, 1, 0, 0, 0, '', '', 1, 0, NULL, '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:09:16', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(36, 'nursing', '3', 'Nursing', 'Nursing', 'Nursing care', 'LDNursing', '', 1, 1, 1, 1, 1, 1, 1, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(37, 'doctors', '3', 'Doctors', 'Doctors', 'Medical personell', 'LDDoctors', '', 0, 0, 1, 1, 1, 1, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(38, 'pharmacy', '2', 'Pharmacy', 'Pharma', 'Drugstore', 'LDPharmacy', '', 0, 0, 1, 1, 1, 1, 0, 0, '', '', 0, 0, NULL, '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(39, 'anaesthesiology', '1', 'Anesthesiology', 'ana', 'Anesthesia Department', 'LDAnesthesiology', 'Anesthesiology', 0, 0, 1, 1, 1, 1, 0, 0, '', '', 1, 0, '', '', '', '', 'hidden', '', 'Aklei G. Kessy', '2005-06-29 11:08:31', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(40, 'general_ambulant', '1', 'General Outpatient Clinic', 'General Clinic', 'General Ambulatory Clinic', 'LDGeneralOutpatientClinic', 'Outpatient/Ambulant Clinic for general/internal medicine', 0, 1, 1, 1, 0, 0, 1, 16, 'round the clock', '8:30 AM - 11:30 AM , 2:00 PM - 5:30 PM', 0, 0, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(41, 'blood_bank', '1', 'Blood Bank', 'Blood Blank', 'Blood Lab', 'LDBloodBank', '', 0, 1, 1, 1, 0, 1, 0, 0, '', '', 0, 0, '', '', '', '', '', '', '', '2007-05-11 09:50:38', '', '0000-00-00 00:00:00');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(42, 'arv_clinic', '1', 'ARV Clinic', 'ARV Clinic', 'ARV lab', 'LDARVClinic', '', 0, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '', 'Create: 2005-06-29 12:14:02 Aklei G. Kessy', 'Aklei G. Kessy', '2005-06-29 11:14:02', 'Aklei G. Kessy', '2005-06-29 11:14:02');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(43, 'dental_clinic', '1', 'Dental Clinic', 'Dental Clinic', 'Dental Lab', 'LDDentalClinic', '', 0, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '', 'Create: 2005-06-29 12:15:54 Aklei G. Kessy', 'Aklei G. Kessy', '2005-06-29 11:15:54', 'Aklei G. Kessy', '2005-06-29 11:15:54');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(44, 'ortho_clinic', '1', 'Orthopedic Clinic', '', NULL, 'LDOrthopedic', '', 0, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '', 'Create: 2007-01-29 09:30:30 Niemi', 'Niemi', '2007-01-29 07:30:30', 'Niemi', '2007-01-29 07:30:30');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(45, 'dressing', '1', 'Dressing', '', NULL, 'LDDressing', '', 1, 1, 1, 1, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '', 'Create: 2007-01-29 09:34:18 Niemi', 'Niemi', '2007-01-29 07:34:18', 'Niemi', '2007-01-29 07:34:18');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(46, 'surgery', '1', 'Plastic Surgery', '', NULL, 'LDPSurgery', '', 1, 1, 1, 1, 1, 1, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '', 'Create: 2007-01-29 09:47:13 NiemiUpdate: 2007-01-29 09:47:29 Niemi\n', 'Niemi', '2007-01-29 07:47:29', 'Niemi', '2007-01-29 07:47:13');
INSERT INTO care_department (nr, id, type, name_formal, name_short, name_alternate, LD_var, description, admit_inpatient, admit_outpatient, has_oncall_doc, has_oncall_nurse, does_surgery, this_institution, is_sub_dept, parent_dept_nr, work_hours, consult_hours, is_inactive, sort_order, address, sig_line, sig_stamp, logo_mime_type, status, history, modify_id, modify_time, create_id, create_time) VALUES(47, 'tb', '1', 'TB', '', NULL, 'LDTb', '', 0, 1, 1, 1, 0, 1, 0, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, '', 'Create: 2007-01-30 16:12:08 Niemi', 'Niemi', '2007-01-30 14:12:08', 'Niemi', '2007-01-30 14:12:08');

--
-- Dumping data for table 'care_effective_day'
--

INSERT INTO care_effective_day (eff_day_nr, name, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'entire stay', 'effective starting from admission date & ending on discharge date', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_effective_day (eff_day_nr, name, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'admission day', 'Effective only on admission day', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_effective_day (eff_day_nr, name, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'discharge day', 'Effective only on discharge day', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_effective_day (eff_day_nr, name, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(4, 'op day', 'Effective only on operation day', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_effective_day (eff_day_nr, name, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(5, 'transfer day', 'Effective only on transfer day', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_effective_day (eff_day_nr, name, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(6, 'period', 'defined start and end dates', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_group'
--

INSERT INTO care_group (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'pregnancy', 'Pregnancy', 'LDPregnancy', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_group (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'neonatal', 'Neonatal', 'LDNeonatal', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_group (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'encounter', 'Encounter', 'LDEncounter', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_group (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'op', 'OP', 'LDOP', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_group (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'anesthesia', 'Anesthesia', 'LDAnesthesia', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_group (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'prescription', 'Prescription', 'LDPrescription', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_menu_main'
--

INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(1, 1, 'Home', 'LDHome', 'main/startframe.php', 1, '', '', '2003-09-22 13:20:15', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(2, 5, 'Registration', 'LDPatient', 'modules/registration_admission/patient_register_pass.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(3, 10, 'Admission', 'LDAdmission', 'modules/registration_admission/aufnahme_list.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(4, 15, 'Ambulatory', 'LDAmbulatory', 'modules/ambulatory/ambulatory.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(5, 20, 'Medocs', 'LDMedocs', 'modules/medocs/medocs_pass.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(6, 25, 'Doctors', 'LDDoctors', 'modules/doctors/doctors.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(7, 35, 'Nursing', 'LDNursing', 'modules/nursing/nursing.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(8, 40, 'OR', 'LDOR', 'main/op-doku.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(9, 45, 'Laboratories', 'LDLabs', 'modules/laboratory/labor.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(10, 50, 'Radiology', 'LDRadiology', 'modules/radiology/radiolog.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(11, 55, 'Pharmacy', 'LDPharmacy', 'modules/pharmacy_tz/pharmacy_tz_pass.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(12, 60, 'Medical Depot', 'LDMedDepot', 'modules/med_depot/medlager.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(13, 65, 'Directory', 'LDDirectory', 'modules/phone_directory/phone.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(14, 70, 'Tech Support', 'LDTechSupport', 'modules/tech/technik.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(15, 72, 'System Admin', 'LDEDP', 'modules/system_admin/edv.php', 1, '', '', '2003-09-22 13:20:15', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(16, 75, 'Intranet Email', 'LDIntraEmail', 'modules/intranet_email/intra-email-pass.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(17, 80, 'Internet Email', 'LDInterEmail', 'modules/nocc/index.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(18, 85, 'Special Tools', 'LDSpecials', 'main/spediens.php', 0, '', '', '2008-03-10 11:04:43', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(23, 91, 'Logout', 'LDLogout', 'main/logout_confirm.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(20, 7, 'Appointments', 'LDAppointments', 'modules/appointment_scheduler/appt_main_pass.php', 1, '', '', '2008-03-10 11:08:47', '2003-04-04 13:01:45');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(21, 16, 'Inpatient', 'LDInpatient', 'modules/inpatient/inpatient.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(22, 46, 'Laboratories TZ', 'LDLabs', 'modules/laboratory_tz/labor.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(24, 90, 'Login', 'LDLogin', 'main/login.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(25, 58, 'Billing', 'LDBilling', 'modules/billing_tz/billing_tz_pass.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');
INSERT INTO care_menu_main (nr, sort_nr, name, LD_var, url, is_visible, hide_by, status, modify_id, modify_time) VALUES(27, 59, 'Reporting', 'LDreporting', 'modules/reporting_tz/reporting_tz_pass.php', 1, '', '', '2008-03-10 11:08:47', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_menu_sub'
--

INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(3, 0, 2, 0, '', '', '', '', '../gui/img/common/default/new_group.gif', '../gui/img/common/default/new_group.gif', '1', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(70, 0, 7, 0, '', '', '', '', '../gui/img/common/default/nurse.gif', '../gui/img/common/default/nurse.gif', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(20, 0, 1, 0, '', '', '', '', '../gui/img/common/default/articles.gif', '../gui/img/common/default/home.gif', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(30, 0, 20, 0, '', '', '', '', '../gui/img/common/default/calendar.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(130, 1, 2, 1, 'Search', 'LDSearch', '../modules/registration_admission/patient_register_pass.php', '&target=search', '../gui/img/common/default/findnew.gif', '../gui/img/common/default/findnew.gif', '1', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(135, 2, 2, 1, 'Advanced Search', 'LDArchive', '../modules/registration_admission/patient_register_pass.php', '&target=archiv', '', '', '1', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(140, 3, 2, 1, 'Search Admission', 'LDSearch', '../modules/registration_admission/aufnahme_pass.php', '&target=search', '../gui/img/common/default/findnew.gif', '../gui/img/common/default/findnew.gif', '1', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(71, 1, 7, 1, 'Wards', '', '../modules/nursing/nursing.php', '', '../gui/img/common/default/bul_arrowgrnsm.gif', '../gui/img/common/default/bul_arrowgrnsm.gif', '', '', '[station]', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(40, 0, 3, 0, '', '', '', '', '../gui/img/common/default/bn.gif', '../gui/img/common/default/bn.gif', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(165, 0, 13, 0, '', '', '', '', '../gui/img/common/default/violet_phone.gif', '../gui/img/common/default/violet_phone.gif', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(7, 3, 7, 1, 'Search', '', '../modules/nursing/nursing-patient-such-start.php', '', '../gui/img/common/default/findnew.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(72, 2, 7, 1, 'Quick view', '', '../modules/nursing/nursing-schnellsicht.php', '', '../gui/img/common/default/eye_s.gif', '', '1', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(50, 0, 4, 0, '', '', '', '', '../gui/img/common/default/disc_unrd.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(120, 0, 6, 0, '', '', '', '', '../gui/img/common/default/forums.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(160, 0, 17, 0, '', '', '', '', '../gui/img/common/default/c-mail.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(190, 0, 16, 0, '', '', '', '', '../gui/img/common/default/bubble2.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(195, 0, 10, 0, '', '', '', '', '../gui/img/common/default/torso.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(200, 0, 18, 0, '', '', '', '', '../gui/img/common/default/settings_tree.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(205, 0, 11, 0, '', '', '', '', '../gui/img/common/default/add.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(160, 0, 19, 0, '', '', '', '', '../gui/img/common/default/padlock.gif', '../gui/img/common/default/bul_arrowgrnsm.gif', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(215, 0, 15, 0, '', '', '', '', '../gui/img/common/default/sections.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(220, 0, 12, 0, '', '', '', '', '../gui/img/common/default/storage.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(225, 0, 8, 0, '', '', '', '', '../gui/img/common/default/people_search_online.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(230, 0, 9, 0, '', '', '', '', '../gui/img/common/default/chart.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(235, 0, 14, 0, '', '', '', '', '../gui/img/common/default/settings_tree.gif', '', '', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(138, 4, 2, 1, 'Discharge', 'LDDischarge', '../modules/ambulatory/amb_clinic_patients_discharge_pass.php', '&target=discharge', '../gui/img/common/default/bestell.gif', '', '1', '', '', '', '0001-01-01 00:00:00');
INSERT INTO care_menu_sub (s_nr, s_sort_nr, s_main_nr, s_ebene, s_name, s_LD_var, s_url, s_url_ext, s_image, s_open_image, s_is_visible, s_hide_by, s_status, s_modify_id, s_modify_time) VALUES(240, 25, 19, 1, 'Insurance', 'LDInsurance', '../modules/billing_tz/insurance_tz.php', '', '', '../gui/img/common/default/bul_arrowgrnsm.gif', '1', '', '', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_method_induction'
--

INSERT INTO care_method_induction (nr, group_nr, method, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 1, 'prostaglandin', 'Prostaglandin', 'LDProstaglandin', '', '', '', '2003-08-05 19:12:47', '', '0000-00-00 00:00:00');
INSERT INTO care_method_induction (nr, group_nr, method, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 1, 'oxytocin', 'Oxytocin', 'LDOxytocin', '', '', '', '2003-08-05 19:12:54', '', '0000-00-00 00:00:00');
INSERT INTO care_method_induction (nr, group_nr, method, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 1, 'arom', 'AROM', 'LDAROM', '', '', '', '2003-08-05 19:13:02', '', '0000-00-00 00:00:00');
INSERT INTO care_method_induction (nr, group_nr, method, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 1, 'unknown', 'Unknown', 'LDUnknown', '', '', '', '2003-08-05 19:12:40', '', '0000-00-00 00:00:00');
INSERT INTO care_method_induction (nr, group_nr, method, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 1, 'not_induced', 'Not induced', 'LDNotInduced', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_mode_delivery'
--

INSERT INTO care_mode_delivery (nr, group_nr, mode, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 2, 'normal', 'Normal', 'LDNormal', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_mode_delivery (nr, group_nr, mode, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 2, 'breech', 'Breech', 'LDBreech', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_mode_delivery (nr, group_nr, mode, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 2, 'caesarian', 'Caesarian', 'LDCaesarian', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_mode_delivery (nr, group_nr, mode, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 2, 'forceps', 'Forceps', 'LDForceps', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_mode_delivery (nr, group_nr, mode, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 2, 'vacuum', 'Vacuum', 'LDVacuum', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_registry'
--

INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('amb', 'modules/ambulatory/ambulatory.php', 'modules/news/newscolumns.php', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('dept', 'modules/news/departments.php', 'modules/news/newscolumns.php', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('radiology', 'modules/radiology/radiolog.php', 'modules/news/newscolumns.php', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('doctors', 'modules/doctors/doctors.php', 'modules/news/newscolumns.php', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('nursing', 'modules/nursing/pflege.php', 'modules/news/newscolumns.php', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('edp', 'modules/admin/edv.php', 'modules/news/newscolumns.php', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('pharmacy', 'modules/pharmacy/apotheke.php', 'modules/news/newscolumns.php', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('pr', 'modules/news/start_page.php', 'modules/news/start_page.php', 'modules/news/headline-edit.php', 'modules/news/headline-read.php', 'modules/news/editor-pass.php', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('cafe', 'modules/cafeteria/cafenews.php', 'modules/cafeteria/cafenews.php', 'modules/cafenews/cafenews-edit.php', 'modules/cafenews/cafenews-read.php', 'modules/cafenews/cafenews-edit-pass.php', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('main_start', 'modules/news/start_page.php', 'modules/news/start_page.php', 'modules/news/headline-edit-select-art.php', 'modules/news/headline-read.php', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('it', 'modules/system_admin/edv.php', 'modules/news/newscolumns.php', 'modules/news/editor-4plus1-select-art.php', 'modules/news/editor-4plus1-read.php', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_registry (registry_id, module_start_script, news_start_script, news_editor_script, news_reader_script, passcheck_script, composite, status, modify_id, modify_time, create_id, create_time) VALUES('admission_module', 'modules/admission/aufnahme_start.php', '', '', '', 'modules/admission/aufnahme_pass.php', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_role_person'
--

INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(1, 3, 'contact', 'Contact person', 'LDContactPerson', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(2, 3, 'guarantor', 'Guarantor', 'LDGuarantor', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(3, 3, 'doctor_att', 'Attending doctor', 'LDAttDoctor', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(4, 3, 'supervisor', 'Supervisor', 'LDSupervisor', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(5, 3, 'doctor_admit', 'Admitting doctor', 'LDAdmittingDoctor', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(6, 3, 'doctor_consult', 'Consulting doctor', 'LDConsultingDoctor', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(7, 4, 'surgeon', 'Surgeon', 'LDSurgeon', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(8, 4, 'surgeon_asst', 'Assisting surgeon', 'LDAssistingSurgeon', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(9, 4, 'nurse_scrub', 'Scrub nurse', 'LDScrubNurse', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(10, 4, 'nurse_rotating', 'Rotating nurse', 'LDRotatingNurse', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(11, 4, 'nurse_anesthesia', 'Anesthesia nurse', 'LDAnesthesiaNurse', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(12, 4, 'anesthesiologist', 'Anesthesiologist', 'LDAnesthesiologist', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(13, 4, 'anesthesiologist_asst', 'Assisting anesthesiologist', 'LDAssistingAnesthesiologist', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(14, 0, 'nurse_on_call', 'Nurse On Call', 'LDNurseOnCall', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(15, 0, 'doctor_on_call', 'Doctor On Call', 'LDDoctorOnCall', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(16, 0, 'nurse', 'Nurse', 'LDNurse', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_role_person (nr, group_nr, role, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(17, 0, 'doctor', 'Doctor', 'LDDoctor', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_room'
--

INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 2, '2003-04-27', '0000-00-00', 0, 1, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 17:54:59', '', '2003-04-27 17:54:59');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 2, '2003-04-27', '0000-00-00', 0, 2, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 17:57:04', '', '2003-04-27 17:56:31');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 2, '2003-04-27', '0000-00-00', 0, 3, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 17:58:13', '', '2003-04-27 17:57:27');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(4, 2, '2003-04-27', '0000-00-00', 0, 4, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:00:21', '', '2003-04-27 17:58:46');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(5, 2, '2003-04-27', '0000-00-00', 0, 5, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:01:32', '', '2003-04-27 17:59:27');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(6, 2, '2003-04-27', '0000-00-00', 0, 6, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:01:22', '', '2003-04-27 18:01:05');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(7, 2, '2003-04-27', '0000-00-00', 0, 7, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:03:10', '', '2003-04-27 18:03:10');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(8, 2, '2003-04-27', '0000-00-00', 0, 8, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:03:50', '', '2003-04-27 18:03:50');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(9, 2, '2003-04-27', '0000-00-00', 0, 9, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:04:33', '', '2003-04-27 18:04:33');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(10, 2, '2003-04-27', '0000-00-00', 0, 10, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:05:03', '', '2003-04-27 18:05:03');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(11, 2, '2003-04-27', '0000-00-00', 0, 11, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:06:36', '', '2003-04-27 18:06:36');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(12, 2, '2003-04-27', '0000-00-00', 0, 12, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:07:59', '', '2003-04-27 18:07:59');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(13, 2, '2003-04-27', '0000-00-00', 0, 13, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:08:26', '', '2003-04-27 18:08:26');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(14, 2, '2003-04-27', '0000-00-00', 0, 14, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:08:52', '', '2003-04-27 18:08:52');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(15, 2, '2003-04-27', '0000-00-00', 0, 15, 0, 0, 1, '', NULL, '', '', '', '2003-04-27 18:09:18', '', '2003-04-27 18:09:18');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(16, 1, '2005-02-02', '0000-00-00', 0, 1, 1, 0, 2, '', 'left', '', 'Created: 2005-02-02 14:04:01 admin\n', '', '2008-03-17 10:59:28', 'admin', '2005-02-02 12:04:01');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(17, 1, '2005-02-02', '0000-00-00', 0, 2, 1, 0, 2, '', 'right', '', 'Created: 2005-02-02 14:04:01 admin\n', '', '2008-03-17 10:59:28', 'admin', '2005-02-02 12:04:01');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(18, 1, '2005-02-25', '0000-00-00', 0, 1, 2, 0, 2, '', 'none', '', 'Created: 2005-02-25 14:52:12 admin\n', '', '2005-02-25 12:52:12', 'admin', '2005-02-25 12:52:12');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(19, 1, '2005-02-25', '0000-00-00', 0, 2, 2, 0, 2, '', 'none', '', 'Created: 2005-02-25 14:52:12 admin\n', '', '2005-02-25 12:52:12', 'admin', '2005-02-25 12:52:12');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(20, 1, '2008-03-17', '0000-00-00', 0, 1, 3, 0, 4, '', ' ', '', 'Created: 2008-03-17 10:22:24 marcel\n', '', '2008-03-17 10:28:24', 'marcel', '2008-03-17 10:22:24');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(21, 1, '2008-03-17', '0000-00-00', 0, 2, 3, 0, 5, '', ' ', '', 'Created: 2008-03-17 10:22:24 marcel\n', '', '2008-03-17 10:28:24', 'marcel', '2008-03-17 10:22:24');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(22, 1, '2008-03-17', '0000-00-00', 0, 3, 3, 0, 6, '', ' ', '', 'Created: 2008-03-17 10:22:24 marcel\n', '', '2008-03-17 10:28:24', 'marcel', '2008-03-17 10:22:24');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(23, 1, '2008-03-17', '0000-00-00', 0, 1, 4, 0, 3, '', 's', '', 'Created: 2008-03-17 11:07:36 marcel\n', '', '2008-03-17 11:07:36', 'marcel', '2008-03-17 11:07:36');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(24, 1, '2008-03-17', '0000-00-00', 0, 2, 4, 0, 2, '', 'd', '', 'Created: 2008-03-17 11:07:36 marcel\n', '', '2008-03-17 11:07:36', 'marcel', '2008-03-17 11:07:36');
INSERT INTO care_room (nr, type_nr, date_create, date_close, is_temp_closed, room_nr, ward_nr, dept_nr, nr_of_beds, closed_beds, info, status, history, modify_id, modify_time, create_id, create_time) VALUES(25, 1, '2008-03-17', '0000-00-00', 0, 3, 4, 0, 10, '', 'd', '', 'Created: 2008-03-17 11:07:36 marcel\n', '', '2008-03-17 11:07:36', 'marcel', '2008-03-17 11:07:36');

--
-- Dumping data for table 'care_test_group'
--

INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'priority', 'Priority', 5, '', '', '2003-07-11 16:44:56', '', '2003-07-11 16:44:02');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'clinical_chem', 'Clinical chemistry', 10, '', '', '2003-07-11 16:46:07', '', '2003-07-11 16:45:49');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'liquor', 'Liquor', 15, '', '', '2003-07-11 16:46:47', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'coagulation', 'Coagulationnn', 20, '', '', '2005-03-01 09:31:07', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'hematology', 'Hematology', 25, '', '', '2003-07-11 16:47:51', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'blood_sugar', 'Blood sugar', 30, '', '', '2003-07-11 16:48:35', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(7, 'neonate', 'Neonate', 35, '', '', '2003-07-11 16:49:28', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(8, 'proteins', 'Proteins', 40, '', '', '2003-07-11 16:49:51', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(9, 'thyroid', 'Thyroid', 45, '', '', '2003-07-11 16:50:13', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(10, 'hormones', 'Hormones', 50, '', '', '2003-07-11 16:50:32', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(11, 'tumor_marker', 'Tumor marker', 55, '', '', '2003-07-11 16:50:52', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(12, 'tissue_antibody', 'Tissue antibody', 60, '', '', '2003-07-11 16:52:00', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(13, 'rheuma_factor', 'Rheuma factor', 65, '', '', '2003-07-11 16:52:20', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(14, 'hepatitis', 'Hepatitis', 70, '', '', '2003-07-11 16:52:59', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(15, 'biopsy', 'Biopsy', 75, '', '', '2003-07-11 16:54:32', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(16, 'infection_serology', 'Infection serology', 80, '', '', '2003-07-11 16:55:13', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(17, 'medicines', 'Medicines', 85, '', '', '2003-07-11 16:55:35', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(18, 'prenatal', 'Prenatal', 90, '', '', '2003-07-11 16:55:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(19, 'stool', 'Stool', 95, '', '', '2003-07-11 16:56:46', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(20, 'rare', 'Rare', 100, '', '', '2003-07-11 16:57:58', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(21, 'urine', 'Urine', 105, '', '', '2003-07-11 16:58:17', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(22, 'total_urine', 'Total urine', 110, '', '', '2003-07-11 16:58:48', '', '0000-00-00 00:00:00');
INSERT INTO care_test_group (nr, group_id, name, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(23, 'special_params', 'Special', 115, '', '', '2003-07-11 17:00:05', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_test_param'
--

INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'priority', 'Quick', '00q', 'mm/s', '', '', '15', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'priority', 'PTT', '00ptt', 'mm/s', '', '350', '', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'priority', 'Hb', '00hb', 'g/dl', '', '18', '12', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(4, 'priority', 'Hk', '00hc', '%', '48', '58', '36', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(5, 'priority', 'Platelets', '00pla', 'c/cmm', '', '500000', '200000', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(6, 'priority', 'RBC', '00rbc', 'mil/cmm', '', '5.5', '4.5', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(7, 'priority', 'WBC', '00wbc', 'c/ccm', '', '9000', '5000', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(8, 'priority', 'Calcium', '00ca', 'mEq/ml', '', '', '', '67', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(9, 'priority', 'Sodium', '00na', 'mEq/ml', '', '100', '20', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(10, 'priority', 'Potassium', '00k', 'mEq/ml', '', '100', '10', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(11, 'priority', 'Blood sugar', '00sug', 'mg/dL', '', '140', '', '260', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(12, 'clinical_chem', 'Alk. Ph.', '0aph', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(13, 'clinical_chem', 'Alpha GT', '0agt', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(14, 'clinical_chem', 'Ammonia', '0amm', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(15, 'clinical_chem', 'Amylase', '0amy', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(16, 'clinical_chem', 'Bili total', '0bit', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(17, 'clinical_chem', 'Bili direct', '0bid', '', '56', '', '', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(18, 'clinical_chem', 'Calcium', '0ca', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(19, 'clinical_chem', 'Chloride', '0chl', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(20, 'clinical_chem', 'Chol', '0cho', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(21, 'clinical_chem', 'Cholinesterase', '0chol', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(22, 'clinical_chem', 'CKMB', '0ccmb', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(23, 'clinical_chem', 'CPK', '0cpc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(24, 'clinical_chem', 'CRP', '0crp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(25, 'clinical_chem', 'Iron', '0fe', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(26, 'clinical_chem', 'RBC', '0rbc', 'c/ccm', '', '', '', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(27, 'clinical_chem', 'free HgB', '0fhb', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(28, 'clinical_chem', 'GLDH', '0gldh', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(29, 'clinical_chem', 'GOT', '0got', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(30, 'clinical_chem', 'GPT', '0gpt', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(31, 'clinical_chem', 'Uric acid', '0ucid', '', '', '', '', '', '', '', '', '', 'Update 2003-09-05 17:34:05 Elpidio Latorilla\n', 'Elpidio Latorilla', '2003-09-05 17:34:05', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(32, 'clinical_chem', 'Urea', '0urea', '', '', '', '', '', '', '', '', '', 'Update 2003-09-05 17:34:33 Elpidio Latorilla\n', 'Elpidio Latorilla', '2003-09-05 17:34:33', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(33, 'clinical_chem', 'HBDH', '0hbdh', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(34, 'clinical_chem', 'HDL Chol', '0hdlc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(35, 'clinical_chem', 'Potassium', '0pot', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(36, 'clinical_chem', 'Creatinine', '0cre', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(37, 'clinical_chem', 'Copper', '0co', '', '', '', '', '', '', '', '', '', 'Update 2003-09-05 17:22:10 Elpidio Latorilla\n', 'Elpidio Latorilla', '2003-09-05 17:22:10', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(38, 'clinical_chem', 'Lactate i.P.', '0lac', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(39, 'clinical_chem', 'LDH', '0ldh', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(40, 'clinical_chem', 'LDL Chol', '0ldlc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(41, 'clinical_chem', 'Lipase', '0lip', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(42, 'clinical_chem', 'Lipid Elpho', '0lpid', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(43, 'clinical_chem', 'Magnesium', '0mg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(44, 'clinical_chem', 'Myoglobin', '0myo', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(45, 'clinical_chem', 'Sodium', '0na', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(46, 'clinical_chem', 'Osmolal.', '0osm', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(47, 'clinical_chem', 'Phosphor', '0pho', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(48, 'clinical_chem', 'Serum sugar', '0glo', 'mg/dL', '', '140', '', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(49, 'clinical_chem', 'Tri', '0tri', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(50, 'clinical_chem', 'Troponin T', '0tro', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(51, 'liquor', 'Liquor status', '1stat', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(52, 'liquor', 'Liquor elpho', '1elp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(53, 'liquor', 'Oligoclonales IgG', '1oli', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(54, 'liquor', 'Reiber Scheme', '1sch', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(55, 'liquor', 'A1', '1a1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(56, 'coagulation', 'Fibrinolysis', '2fiby', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(57, 'coagulation', 'Quick', '2q', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(58, 'coagulation', 'PTT', '2ptt', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(59, 'coagulation', 'PTZ', '2ptz', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(60, 'coagulation', 'Fibrinogen', '2fibg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(61, 'coagulation', 'Sol.Fibr.mon.', '2fibs', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(62, 'coagulation', 'FSP dimer', '2fsp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(63, 'coagulation', 'Thr.Coag.', '2coag', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(64, 'coagulation', 'AT III', '2at3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(65, 'coagulation', 'Faktor VII', '2f8', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:53', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(66, 'coagulation', 'APC Resistance', '2apc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(67, 'coagulation', 'Protein C', '2prc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(68, 'coagulation', 'Protein S', '2prs', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(69, 'coagulation', 'Bleeding time', '2bt', 'ml/s', '', '', '', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(70, 'hematology', 'Retikulocytes', '3ret', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(71, 'hematology', 'Malaria', '3mal', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(72, 'hematology', 'Hb Elpho', '3hbe', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(73, 'hematology', 'HLA B 27', '3hla', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(74, 'hematology', 'Platelets AB', '3tab', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(75, 'hematology', 'WBC Phosp.', '3wbp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(76, 'blood_sugar', 'Blood sugar fasting', '4bsf', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(77, 'blood_sugar', 'Blood sugar 9:00', '4bs9', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(78, 'blood_sugar', 'Blood sugar p.prandial', '4bsp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(79, 'blood_sugar', 'Bl15:00', '4bs15', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(80, 'blood_sugar', 'Blood sugar 1', '4bs1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(81, 'blood_sugar', 'Blood sugar 2', '4bs2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(82, 'blood_sugar', 'Glucose stress.', '4glo', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(83, 'blood_sugar', 'Lactose stress', '4lac', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(84, 'blood_sugar', 'HBA 1c', '4hba', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(85, 'blood_sugar', 'Fructosamine', '4fru', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(86, 'neonate', 'Neonate bilirubin', '5bil', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(87, 'neonate', 'Cord bilirubin', '5bilc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(88, 'neonate', 'Bilirubin direct', '5bild', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(89, 'neonate', 'Neonate sugar 1', '5glo1', 'mg/dL', '', '', '', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(90, 'neonate', 'Neonate sugar 2', '5glo2', 'mg/DL', '', '', '30', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(91, 'neonate', 'Reticulocytes', '5ret', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(92, 'neonate', 'B1', '5b1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(93, 'proteins', 'Total proteins', '6tot', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(94, 'proteins', 'Albumin', '6alb', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(95, 'proteins', 'Elpho', '6elp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(96, 'proteins', 'Immune fixation', '6imm', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(97, 'proteins', 'Beta2 Microglobulin.i.S', '6b2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(98, 'proteins', 'Immune globulin quant.', '6img', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(99, 'proteins', 'IgE', '6ige', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(100, 'proteins', 'Haptoglobin', '6hap', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(101, 'proteins', 'Transferrin', '6tra', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(102, 'proteins', 'Ferritin', '6fer', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(103, 'proteins', 'Coeruloplasmin', '6coe', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(104, 'proteins', 'Alpha 1 Antitrypsin', '6alp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(105, 'proteins', 'AFP Grav.', '6afp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(106, 'proteins', 'SSW:', '6ssw', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(107, 'proteins', 'Alpha 1 Microglobulin', '6mic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(108, 'thyroid', 'T3', '7t3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(109, 'thyroid', 'Thyroxin/T4', '7t4', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(110, 'thyroid', 'TSH basal', '7tshb', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(111, 'thyroid', 'TSH stim.', '7tshs', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(112, 'thyroid', 'TAB', '7tab', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(113, 'thyroid', 'MAB', '7mab', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(114, 'thyroid', 'TRAB', '7trab', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(115, 'thyroid', 'Thyreoglobulin', '7glob', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(116, 'thyroid', 'Thyroxinbind.Glob.', '7thx', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(117, 'thyroid', 'free T3', '7ft3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(118, 'thyroid', 'free T4', '7ft4', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(119, 'hormones', 'ACTH', '8acth', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(120, 'hormones', 'Aldosteron', '8ald', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(121, 'hormones', 'Calcitonin', '8cal', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(122, 'hormones', 'Cortisol', '8cor', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(123, 'hormones', 'Cortisol day', '8dcor', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(124, 'hormones', 'FSH', '8fsh', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(125, 'hormones', 'Gastrin', '8gas', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(126, 'hormones', 'HCG', '8hcg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(127, 'hormones', 'Insulin', '8ins', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(128, 'hormones', 'Catecholam.i.P.', '8cat', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(129, 'hormones', 'LH', '8lh', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(130, 'hormones', 'Ostriol', '8osd', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(131, 'hormones', 'SSW:', '8ssw', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:54', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(132, 'hormones', 'Parat hormone', '8par', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(133, 'hormones', 'Progesteron', '8prg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(134, 'hormones', 'Prolactin I', '8pr1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(135, 'hormones', 'Prolactin II', '8pr2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(136, 'hormones', 'Renin', '8ren', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(137, 'hormones', 'Serotonin', '8ser', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(138, 'hormones', 'Somatomedin C', '8som', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(139, 'hormones', 'Testosteron', '8tes', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(140, 'hormones', 'C1', '8c1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(141, 'tumor_marker', 'AFP', '9afp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(142, 'tumor_marker', 'CA. 15 3', '9c153', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(143, 'tumor_marker', 'CA. 19 9', '9c199', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(144, 'tumor_marker', 'CA. 125', '9c125', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(145, 'tumor_marker', 'CEA', '9cea', '', '', '', '', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(146, 'tumor_marker', 'Cyfra. 21 2', '9c212', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(147, 'tumor_marker', 'HCG', '9hcg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(148, 'tumor_marker', 'NSE', '9nse', 'test', '', '', '', '', '', '', '', '', '', 'Elpidio Latorilla', '2003-08-06 03:32:27', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(149, 'tumor_marker', 'PSA', '9psa', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(150, 'tumor_marker', 'SCC', '9scc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(151, 'tumor_marker', 'TPA', '9tpa', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(152, 'tissue_antibody', 'ANA', '10ana', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(153, 'tissue_antibody', 'AMA', 'ama', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(154, 'tissue_antibody', 'DNS AB', '10dnsab', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(155, 'tissue_antibody', 'ASMA', '10asm', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(156, 'tissue_antibody', 'ENA', '10ena', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(157, 'tissue_antibody', 'ANCA', '10anc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(158, 'rheuma_factor', 'Anti Strepto Titer', '11ast', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(159, 'rheuma_factor', 'Lat. RF', '11lrf', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(160, 'rheuma_factor', 'Streptozym', '11stz', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(161, 'rheuma_factor', 'Waaler Rose', '11waa', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(162, 'hepatitis', 'Anti HAV', '12hav', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(163, 'hepatitis', 'Anti HAV IgM', '12hai', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(164, 'hepatitis', 'Hbs Antigen', '12hba', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(165, 'hepatitis', 'Anti HBs Titer', '12hbt', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(166, 'hepatitis', 'Anti HBe', '12hbe', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(167, 'hepatitis', 'Anti HBc', '12hbc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(168, 'hepatitis', 'Anti HBc.IgM', '12hci', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(169, 'hepatitis', 'Anti HCV', '12hcv', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(170, 'hepatitis', 'Hep.D Delta A.', '12hda', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(171, 'hepatitis', 'Anti HEV', '12hev', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(172, 'biopsy', 'Protein i.biopsy', '13pro', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(173, 'biopsy', 'LDH i.biopsy', '13ldh', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(174, 'biopsy', 'Chol.i.biopsy', '13cho', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(175, 'biopsy', 'CEA i.biopsy', '13cea', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(176, 'biopsy', 'AFP i.biopsy', '13afp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(177, 'biopsy', 'Uric acid.i.biopsy', '13ure', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(178, 'biopsy', 'Rheuma fact.i.biopsy', '13rhe', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(179, 'biopsy', 'D1', '13d1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(180, 'biopsy', 'D2', '13d2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(181, 'infection_serology', 'Antistaph.Titer', '14stap', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(182, 'infection_serology', 'Adenovirus AB', '14ade', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(183, 'infection_serology', 'Borrelia AB', '14bor', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(184, 'infection_serology', 'Borr.Immunoblot', '14bori', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(185, 'infection_serology', 'Brucellia AB', '14bru', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(186, 'infection_serology', 'Campylob. AB', '14cam', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(187, 'infection_serology', 'Candida AB', '14can', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(188, 'infection_serology', 'Cardiotr.Virus', '14car', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(189, 'infection_serology', 'Chlamydia AB', '14chl', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(190, 'infection_serology', 'C.psittaci AB', '14psi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(191, 'infection_serology', 'Coxsack. AB', '14cox', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(192, 'infection_serology', 'Cox.burn. AB(Q fever)', '14qf', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(193, 'infection_serology', 'Cytomegaly AB', '14cyt', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(194, 'infection_serology', 'EBV AB', '14ebv', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(195, 'infection_serology', 'Echinococcus AB', '14ecc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(196, 'infection_serology', 'Echo Virus AB', '14ecv', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(197, 'infection_serology', 'FSME AB', '14fsme', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:55', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(198, 'infection_serology', 'Herpes simp. I AB', '14hs1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(199, 'infection_serology', 'Herpes simp. II AB', '14hs2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(200, 'infection_serology', 'HIV1/HIV2 AB', '14hiv', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(201, 'infection_serology', 'Influenza A AB', '14ina', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(202, 'infection_serology', 'Influenza B AB', '14inb', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(203, 'infection_serology', 'LCM AB', '14lcm', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(204, 'infection_serology', 'Leg.pneum AB', '14leg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(205, 'infection_serology', 'Leptospiria AB', '14lep', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(206, 'infection_serology', 'Listeria AB', '14lis', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(207, 'infection_serology', 'Masern AB', '14mas', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(208, 'infection_serology', 'Mononucleose', '14mon', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(209, 'infection_serology', 'Mumps AB', '14mum', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(210, 'infection_serology', 'Mycoplas.pneum AB', '14myc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(211, 'infection_serology', 'Neutrop Virus AB', '14neu', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(212, 'infection_serology', 'Parainfluenza II AB', '14pi2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(213, 'infection_serology', 'Parainfluenza III AB', '14pi3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(214, 'infection_serology', 'Picorna Virus AB', '14pic', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(215, 'infection_serology', 'Rickettsia AB', '14vric', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(216, 'infection_serology', 'RÃƒÆ’Ã‚Â¶teln AB', '14rot', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(217, 'infection_serology', 'RÃƒÆ’Ã‚Â¶teln Immune status', '14roi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(218, 'infection_serology', 'RS Virus AB', '14rsv', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(219, 'infection_serology', 'Shigella/Salm AB', '14shi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(220, 'infection_serology', 'Toxoplasma AB', '14tox', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(221, 'infection_serology', 'TPHA', '14tpha', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(222, 'infection_serology', 'Varicella AB', '14vrc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(223, 'infection_serology', 'Yersinia AB', '14yer', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(224, 'infection_serology', 'E1', '14e1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(225, 'infection_serology', 'E2', '14e2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(226, 'infection_serology', 'E3', '14e3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(227, 'infection_serology', 'E4', '14e4', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(228, 'medicines', 'Amiodaron', '15ami', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(229, 'medicines', 'Barbiturate.i.S.', '15bar', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(230, 'medicines', 'Benzodiazep.i.S.', '15ben', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(231, 'medicines', 'Carbamazepin', '15car', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(232, 'medicines', 'Clonazepam', '15clo', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(233, 'medicines', 'Digitoxin', '15dig', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(234, 'medicines', 'Digoxin', '15dgo', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(235, 'medicines', 'Gentamycin', '15gen', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(236, 'medicines', 'Lithium', '15lit', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(237, 'medicines', 'Phenobarbital', '15phe', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(238, 'medicines', 'Phenytoin', '15pny', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(239, 'medicines', 'Primidon', '15pri', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(240, 'medicines', 'Salicylic acid', '15sal', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(241, 'medicines', 'Theophyllin', '15the', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(242, 'medicines', 'Tobramycin', '15tob', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(243, 'medicines', 'Valproin acid', '15val', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(244, 'medicines', 'Vancomycin', '15van', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(245, 'medicines', 'Amphetamine.i.u.', '15amp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(246, 'medicines', 'Antidepressant.i.u.', '15ant', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(247, 'medicines', 'Barbiturate.i.u.', '15bau', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(248, 'medicines', 'Benzodiazep.i.u.', '15beu', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(249, 'medicines', 'Cannabinol.i.u.', '15can', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(250, 'medicines', 'Cocain.i.u', '15coc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(251, 'medicines', 'Methadon.i.u.', '15met', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(252, 'medicines', 'Opiate.i.u.', '15opi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(253, 'prenatal', 'Chlamyd.cult./SSW', '16chl', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(254, 'prenatal', 'SSW:', '16ssw', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(255, 'prenatal', 'Down Screening', '16dow', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(256, 'prenatal', 'Strep B quick test', '16stb', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(257, 'prenatal', 'TPHA', '16tpha', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(258, 'prenatal', 'HBs Ag', '16hbs', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(259, 'prenatal', 'HIV1/HIV2 AV', '16hiv', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(260, 'stool', 'Chymotrypsin', '17chy', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(261, 'stool', 'Occult blood 1', '17ob1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(262, 'stool', 'Occult blood 2', '17ob2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(263, 'stool', 'Occult blood 3', '17ob3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(264, 'rare', 'Rare H.', '18rh', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(265, 'rare', 'Rare E.', '18re', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:56', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(266, 'rare', 'Rare S.', '18rs', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(267, 'rare', 'Urine rare', '18uri', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(268, 'rare', 'F1', '18f1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(269, 'rare', 'F2', '18f2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(270, 'rare', 'F3', '18f3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(271, 'urine', 'Urine amylase', '19amy', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(272, 'urine', 'Urine sugar', '19sug', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(273, 'urine', 'Protein.i.u.', '19pro', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(274, 'urine', 'Albumin.i.u.', '19alb', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(275, 'urine', 'Osmol.i.u.', '19osm', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(276, 'urine', 'Pregnancy test.', '19pre', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(277, 'urine', 'Cytomeg.i.urine', '19cym', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(278, 'urine', 'Urine cytology', '19cyt', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(279, 'urine', 'Bence Jones', '19bj', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(280, 'urine', 'Urine elpho', '19elp', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(281, 'urine', 'Beta2 microglobulin.i.u.', '19bm2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(282, 'total_urine', 'Addis Count', '20adc', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(283, 'total_urine', 'Sodium i.u.', '20na', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(284, 'total_urine', 'Potass. i.u.', '20k', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(285, 'total_urine', 'Calcium i.u.', '20ca', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(286, 'total_urine', 'Phospor i.u.', '20pho', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(287, 'total_urine', 'Uric acid i.u.', '20ura', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(288, 'total_urine', 'Creatinin i.u.', '20cre', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(289, 'total_urine', 'Porphyrine i.u.', '20por', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(290, 'total_urine', 'Cortisol i.u.', '20cor', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(291, 'total_urine', 'Hydroxyprolin i.u.', '20hyd', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(292, 'total_urine', 'Catecholamins i.u.', '20cat', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(293, 'total_urine', 'Pancreol.', '20pan', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(294, 'total_urine', 'Gamma AminolÃƒÆ’Ã‚Â¤bulinsre.i.u.', '20gam', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(295, 'special_params', 'Blood alcohol', '21bal', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(296, 'special_params', 'CDT', '21cdt', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(297, 'special_params', 'Vitamin B12', '21vb12', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(298, 'special_params', 'Folic acid', '21fol', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(299, 'special_params', 'Insulin AB', '21inab', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(300, 'special_params', 'Intrinsic AB', '21iab', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(301, 'special_params', 'Stone analysis', '21sto', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(302, 'special_params', 'ACE', '21ace', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(303, 'special_params', 'G1', '21g1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(304, 'special_params', 'G2', '21g2', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(305, 'special_params', 'G3', '21g3', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(306, 'special_params', 'G4', '21g4', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(307, 'special_params', 'G5', '21g5', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(308, 'special_params', 'G6', '21g6', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(309, 'special_params', 'G7', '21g7', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(310, 'special_params', 'G8', '21g8', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(311, 'special_params', 'G9', '21g9', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');
INSERT INTO care_test_param (nr, group_id, name, id, msr_unit, median, hi_bound, lo_bound, hi_critical, lo_critical, hi_toxic, lo_toxic, status, history, modify_id, modify_time, create_id, create_time) VALUES(312, 'special_params', 'G10', '21g10', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2003-07-11 17:21:57', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_anaesthesia'
--

INSERT INTO care_type_anaesthesia (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'none', 'None', 'LDNone', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_anaesthesia (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'unknown', 'Unknown', 'LDUnknown', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_anaesthesia (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'general', 'General', 'LDGeneral', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_anaesthesia (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'spinal', 'Spinal', 'LDSpinal', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_anaesthesia (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'epidural', 'Epidural', 'LDEpidural', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_anaesthesia (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'pudendal', 'Pudendal', 'LDPudendal', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_application'
--

INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 5, 'ita', 'ITA', 'LDITA', 'Intratracheal anesthesia', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 5, 'la', 'LA', 'LDLA', 'Locally applied anesthesia', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 5, 'as', 'AS', 'LDAS', 'Analgesic sedation', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 5, 'mask', 'Mask', 'LDMask', 'Gas anesthesia through breathing mask', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 6, 'oral', 'Oral', 'LDOral', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(6, 6, 'iv', 'Intravenous', 'LDIntravenous', '', '', '', '0000-00-00 00:00:00', 'preload', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(7, 6, 'sc', 'Subcutaneous', 'LDSubcutaneous', '', '', '', '0000-00-00 00:00:00', 'preload', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(8, 6, 'im', 'Intramuscular', 'LDIntramuscular', '', '', '', '0000-00-00 00:00:00', 'preload', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(9, 6, 'sublingual', 'Sublingual', 'LDSublingual', 'Applied under the tounge', '', '', '0000-00-00 00:00:00', 'preload', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(10, 6, 'ia', 'Intraarterial', 'LDIntraArterial', '', '', '', '0000-00-00 00:00:00', 'preload', '0000-00-00 00:00:00');
INSERT INTO care_type_application (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(11, 6, 'pre_admit', 'Pre-admission', 'LDPreAdmission', '', '', '', '0000-00-00 00:00:00', 'preload', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_assignment'
--

INSERT INTO care_type_assignment (type_nr, type, name, LD_var, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'ward', 'Ward', 'LDWard', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_assignment (type_nr, type, name, LD_var, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'dept', 'Department', 'LDDepartment', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_assignment (type_nr, type, name, LD_var, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'firm', 'Firm', 'LDFirm', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_assignment (type_nr, type, name, LD_var, status, history, modify_id, modify_time, create_id, create_time) VALUES(4, 'clinic', 'Clinic', 'LDClinic', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_cause_opdelay'
--

INSERT INTO care_type_cause_opdelay (type_nr, type, cause, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'patient', 'Patient was delayed', 'LDPatientDelayed', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_cause_opdelay (type_nr, type, cause, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'nurse', 'Nurses were delayed', 'LDNursesDelayed', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_cause_opdelay (type_nr, type, cause, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'surgeon', 'Surgeons were delayed', 'LDSurgeonsDelayed', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_cause_opdelay (type_nr, type, cause, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'cleaning', 'Cleaning delayed', 'LDCleaningDelayed', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_cause_opdelay (type_nr, type, cause, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'anesthesia', 'Anesthesiologist was delayed', 'LDAnesthesiologistDelayed', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_cause_opdelay (type_nr, type, cause, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'other', 'Other causes', 'LDOtherCauses', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_color'
--

INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('yellow', 'yellow', 'LDyellow', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('black', 'black', 'LDblack', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('blue_pale', 'pale blue', 'LDpaleblue', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('brown', 'brown', 'LDbrown', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('pink', 'pink', 'LDpink', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('yellow_pale', 'pale yellow', 'LDpaleyellow', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('red', 'red', 'LDred', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('green_pale', 'pale green', 'LDpalegreen', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('violet', 'violet', 'LDviolet', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('blue', 'blue', 'LDblue', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('biege', 'biege', 'LDbiege', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('orange', 'orange', 'LDorange', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('green', 'green', 'LDgreen', '', '', '0000-00-00 00:00:00');
INSERT INTO care_type_color (color_id, name, LD_var, status, modify_id, modify_time) VALUES('rose', 'rose', 'LDrose', '', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_department'
--

INSERT INTO care_type_department (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'medical', 'Medical', 'LDMedical', 'Medical, Nursing, Diagnostics, Labs, OR', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_department (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'support', 'Support (non-medical)', 'LDSupport', 'non-medical departments', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_department (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'news', 'News', 'LDNews', 'News group or category', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_discharge'
--

INSERT INTO care_type_discharge (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'regular', 'Regular discharge', 'LDRegularRelease', '', '', '2003-04-15 01:05:55', '', '2003-04-13 12:12:26');
INSERT INTO care_type_discharge (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'own', 'Patient left hospital on his own will', 'LDSelfRelease', '', '', '2003-04-15 01:06:06', '', '2003-04-13 12:13:17');
INSERT INTO care_type_discharge (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'emergency', 'Emergency discharge', 'LDEmRelease', '', '', '2003-04-15 01:06:17', '', '2003-04-13 12:14:52');
INSERT INTO care_type_discharge (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'change_ward', 'Change of ward', 'LDChangeWard', '', '', '0000-00-00 00:00:00', '', '2003-04-13 12:15:26');
INSERT INTO care_type_discharge (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'change_bed', 'Change of bed', 'LDChangeBed', '', '', '2003-04-15 00:09:42', '', '2003-04-13 12:16:19');
INSERT INTO care_type_discharge (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(7, 'death', 'Death of patient', 'LDPatientDied', '', '', '2003-04-15 01:06:42', '', '0000-00-00 00:00:00');
INSERT INTO care_type_discharge (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'change_room', 'Change of room', 'LDChangeRoom', '', '', '2003-04-15 01:06:59', '', '0000-00-00 00:00:00');
INSERT INTO care_type_discharge (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(8, 'change_dept', 'Change of department', 'LDChangeDept', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_duty'
--

INSERT INTO care_type_duty (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'regular', 'Regular duty', 'LDRegularDuty', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_duty (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'standby', 'Standby duty', 'LDStandbyDuty', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_duty (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'morning', 'Morning duty', 'LDMorningDuty', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_duty (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'afternoon', 'Afternoon duty', 'LDAfternoonDuty', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_duty (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'night', 'Night duty', 'LDNightDuty', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_encounter'
--

INSERT INTO care_type_encounter (type_nr, type, name, LD_var, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'referral', 'Referral', 'LDEncounterReferral', 'Referral admission or visit', 0, '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_encounter (type_nr, type, name, LD_var, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'emergency', 'Emergency', 'LDEmergency', 'Emergency admission or visit', 0, '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_encounter (type_nr, type, name, LD_var, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'birth_delivery', 'Birth delivery', 'LDBirthDelivery', 'Admission or visit for birth delivery', 0, '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_encounter (type_nr, type, name, LD_var, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(4, 'walk_in', 'Walk-in', 'LDWalkIn', 'Walk -in admission or visit (non-referred)', 0, '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_encounter (type_nr, type, name, LD_var, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(5, 'accident', 'Accident', 'LDAccident', 'Emergency admission due to accident', 0, '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_ethnic_orig'
--

INSERT INTO care_type_ethnic_orig (nr, class_nr, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(1, 1, 'asian', 'LDAsian', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_ethnic_orig (nr, class_nr, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(2, 1, 'black', 'LDBlack', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_ethnic_orig (nr, class_nr, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(3, 1, 'caucasian', 'LDCaucasian', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_ethnic_orig (nr, class_nr, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(4, 1, 'white', 'LDWhite', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_feeding'
--

INSERT INTO care_type_feeding (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 2, 'breast', 'Breast', 'LDBreast', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_feeding (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 2, 'formula', 'Formula', 'LDFormula', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_feeding (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 2, 'both', 'Both', 'LDBoth', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_feeding (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 2, 'parenteral', 'Parenteral', 'LDParenteral', '', '', '', '2003-07-27 22:13:51', '', '0000-00-00 00:00:00');
INSERT INTO care_type_feeding (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 2, 'never_fed', 'Never fed', 'LDNeverFed', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_immunization'
--


--
-- Dumping data for table 'care_type_insurance'
--

INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'medical_main', 'Medical insurance', 'LDMedInsurance', 'Main (default) medical insurance', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'medical_extra', 'Extra medical insurance', 'LDExtraMedInsurance', 'Extra medical insurance (evt. pays extra services)', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'dental', 'Dental insurance', 'LDDentalInsurance', 'Separate dental plan in case not included in medical plan or simply additional private plan', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(4, 'disability', 'Disability plan', 'LDDisabilityPlan', 'Disability insurance plan - general , both long term & short term', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(5, 'disability_short', 'Disability plan (short term)', 'LDDisabilityPlanShort', 'Short term disability plan', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(6, 'disability_long', 'Disability plan (long term)', 'LDDisabilityPlanLong', 'Long term disability plan', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(7, 'retirement_income', 'Retirement  income plan (general)', 'LDRetirementIncomePlan', 'Retirement income plan - either private or income/employer supported', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(8, 'edu_reimbursement', 'Educational Reimbursement Plan', 'LDEduReimbursementPlan', 'Reimbursement plan for education, either private or employer supported', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(9, 'retirement_medical', 'Retirement medical plan', 'LDRetirementMedPlan', 'Medical plan in retirement  - might include other care services', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(10, 'liability', 'Liability Insurance Plan', 'LDLiabilityPlan', 'General liability insurance - either private or employer supported', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(11, 'malpractice', 'Malpractice Insurance Plan', 'LDMalpracticeInsurancePlan', 'Insurance plan against possible malpractice', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_insurance (type_nr, type, name, LD_var, description, status, history, modify_id, modify_time, create_id, create_time) VALUES(12, 'unemployment', 'Unemployment Insurance Plan', 'LDUnemploymentPlan', 'Unemployment insurance , in case compulsory unemployment funds are guaranteed by the state, this plan is usually privately paid by the insured', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_localization'
--

INSERT INTO care_type_localization (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(1, 'left', 'Left', 'LDLeft', 'L', 'LDLeft_s', '', '0', '', '', '', '2003-05-25 15:04:14', '', '2003-05-25 15:04:14');
INSERT INTO care_type_localization (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(2, 'right', 'Right', 'LDRight', 'R', 'LDRight_s', '', '0', '', '', '', '2003-05-25 15:05:22', '', '2003-05-25 15:05:00');
INSERT INTO care_type_localization (nr, category, name, LD_var, short_code, LD_var_short_code, description, hide_from, status, history, modify_id, modify_time, create_id, create_time) VALUES(3, 'both_side', 'Both sides', 'LDBothSides', 'B', 'LDBothSides_s', '', '0', '', '', '', '2003-05-25 15:06:18', '', '2003-05-25 15:06:18');

--
-- Dumping data for table 'care_type_location'
--

INSERT INTO care_type_location (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'dept', 'Department', 'LDDepartment', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_location (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'ward', 'Ward', 'LDWard', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_location (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'firm', 'Firm', 'LDFirm', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_location (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'room', 'Room', 'LDRoom', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_location (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'bed', 'Bed', 'LDBed', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_location (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'clinic', 'Clinic', 'LDClinic', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_measurement'
--

INSERT INTO care_type_measurement (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'bp_systolic', 'Systolic', 'LDSystolic', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_measurement (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'bp_diastolic', 'Diastolic', 'LDDiastolic', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_measurement (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'temp', 'Temperature', 'LDTemperature', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_measurement (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'fluid_intake', 'Fluid intake', 'LDFluidIntake', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_measurement (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'fluid_output', 'Fluid output', 'LDFluidOutput', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_measurement (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'weight', 'Weight', 'LDWeight', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_measurement (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(7, 'height', 'Height', 'LDHeight', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_measurement (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(8, 'bp_composite', 'Sys/Dias', 'LDSysDias', '', '', '2003-04-19 14:39:20', '', '2003-04-19 14:39:20');
INSERT INTO care_type_measurement (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(9, 'head_circumference', 'Head circumference', 'LDHeadCircumference', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_notes'
--

INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'histo_physical', 'Admission History and Physical', 'LDAdmitHistoPhysical', 5, '', '', '2003-05-17 18:29:39', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'daily_doctor', 'Doctor''s daily notes', 'LDDoctorDailyNotes', 55, '', '', '2003-05-17 18:38:35', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'discharge', 'Discharge summary', 'LDDischargeSummary', 50, '', '', '2003-05-17 18:37:07', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'consult', 'Consultation notes', 'LDConsultNotes', 25, '', '', '2003-05-17 18:31:51', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'op', 'Operation notes', 'LDOpNotes', 100, '', '', '2003-05-17 18:43:14', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'daily_ward', 'Daily ward''s notes', 'LDDailyNurseNotes', 30, '', '', '2003-05-17 18:32:12', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(7, 'daily_chart_notes', 'Chart notes', 'LDChartNotes', 20, '', '', '2003-05-17 18:31:41', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(8, 'chart_notes_etc', 'PT,ATG,etc. daily notes', 'LDPTATGetc', 115, '', '', '2003-05-17 18:43:56', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(9, 'daily_iv_notes', 'IV daily notes', 'LDIVDailyNotes', 75, '', '', '2003-05-17 18:40:24', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(10, 'daily_anticoag', 'Anticoagulant daily notes', 'LDAnticoagDailyNotes', 15, '', '', '2003-05-17 18:31:17', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(11, 'lot_charge_nr', 'Material LOT, Charge Nr.', 'LDMaterialLOTChargeNr', 80, '', '', '2003-05-17 18:40:39', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(12, 'text_diagnosis', 'Diagnosis text', 'LDDiagnosis', 40, '', '', '2003-05-17 18:35:30', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(13, 'text_therapy', 'Therapy text', 'LDTherapy', 120, '', '', '2003-05-17 18:44:08', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(14, 'chart_extra', 'Extra notes on therapy & diagnosis', 'LDExtraNotes', 65, '', '', '2003-05-17 18:39:12', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(15, 'nursing_report', 'Nursing care report', 'LDNursingReport', 85, '', '', '2003-05-17 18:41:41', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(16, 'nursing_problem', 'Nursing problem report', 'LDNursingProblemReport', 95, '', '', '2003-05-17 18:42:08', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(17, 'nursing_effectivity', 'Nursing effectivity report', 'LDNursingEffectivityReport', 90, '', '', '2003-05-17 18:41:56', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(18, 'nursing_inquiry', 'Inquiry to doctor', 'LDInquiryToDoctor', 70, '', '', '2003-05-17 18:39:51', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(19, 'doctor_directive', 'Doctor''s directive', 'LDDoctorDirective', 60, '', '', '2003-05-17 18:38:59', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(20, 'problem', 'Problem', 'LDProblem', 110, '', '', '2003-05-17 18:43:45', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(21, 'development', 'Development', 'LDDevelopment', 35, '', '', '2003-05-17 18:32:28', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(22, 'allergy', 'Allergy', 'LDAllergy', 10, '', '', '2003-05-17 18:44:39', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(23, 'daily_diet', 'Diet plan', 'LDDietPlan', 45, '', '', '2003-05-17 18:35:45', '', '0000-00-00 00:00:00');
INSERT INTO care_type_notes (nr, type, name, LD_var, sort_nr, status, modify_id, modify_time, create_id, create_time) VALUES(99, 'other', 'Other', 'LDOther', 105, '', '', '2003-05-17 18:43:31', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_outcome'
--

INSERT INTO care_type_outcome (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 2, 'alive', 'Alive', 'LDAlive', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_outcome (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 2, 'stillborn', 'Stillborn', 'LDStillborn', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_outcome (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 2, 'early_neonatal_death', 'Early neonatal death', 'LDEarlyNeonatalDeath', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_outcome (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 2, 'late_neonatal_death', 'Late neonatal death', 'LDLateNeonatalDeath', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_outcome (nr, group_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 2, 'death_uncertain_timing', 'Death uncertain timing', 'LDDeathUncertainTiming', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_perineum'
--

INSERT INTO care_type_perineum (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'intact', 'Intact', 'LDIntact', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_perineum (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, '1_degree', '1st degree tear', 'LDFirstDegreeTear', '', '', '', '2003-07-27 21:22:19', '', '0000-00-00 00:00:00');
INSERT INTO care_type_perineum (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, '2_degree', '2nd degree tear', 'LDSecondDegreeTear', '', '', '', '2003-07-27 21:22:31', '', '0000-00-00 00:00:00');
INSERT INTO care_type_perineum (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, '3_degree', '3rd degree tear', 'LDThirdDegreeTear', '', '', '', '2003-07-27 21:22:42', '', '0000-00-00 00:00:00');
INSERT INTO care_type_perineum (nr, id, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'episiotomy', 'Episiotomy', 'LDEpisiotomy', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_prescription'
--

INSERT INTO care_type_prescription (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'anticoag', 'Anticoagulant', 'LDAnticoagulant', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_prescription (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'hemolytic', 'Hemolytic', 'LDHemolytic', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_prescription (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'diuretic', 'Diuretic', 'LDDiuretic', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_prescription (nr, type, name, LD_var, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'antibiotic', 'Antibiotic', 'LDAntibiotic', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_room'
--

INSERT INTO care_type_room (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'ward', 'Ward room', 'LDWard', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_room (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'op', 'Operating room', 'LDOperatingRoom', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_test'
--

INSERT INTO care_type_test (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'chemlabor', 'Chemical-Serology Lab', 'LDChemSerologyLab', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_test (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'patho', 'Pathological Lab', 'LDPathoLab', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_test (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'baclabor', 'Bacteriological Lab', 'LDBacteriologicalLab', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_test (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'radio', 'Radiological Lab', 'LDRadiologicalLab', 'Lab for X-ray, Mammography, Computer Tomography, NMR', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_test (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'blood', 'Blood test & product', 'LDBloodTestProduct', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_test (type_nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'generic', 'Generic test program', 'LDGenericTestProgram', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_time'
--

INSERT INTO care_type_time (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'patient_entry_exit', 'Patient entry/exit', 'LDPatientEntryExit', 'Times when patient entered and left the op room', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_time (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'op_start_end', 'OP start/end', 'LDOPStartEnd', 'Times when op started (1st incision) and ended (last suture)', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_time (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'delay', 'Delay time', 'LDDelayTime', 'Times when the op was delayed due to any reason', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_time (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'plaster_cast', 'Plaster cast', 'LDPlasterCast', 'Times when the plaster cast was made', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_time (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'reposition', 'Reposition', 'LDReposition', 'Times when a dislocated joint(s) was repositioned (non invasive op)', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_time (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(6, 'coro', 'Coronary catheter', 'LDCoronaryCatheter', 'Times when a coronary catherer op was done (minimal invasive op)', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_time (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(7, 'bandage', 'Bandage', 'LDBandage', 'Times when the bandage was made', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

--
-- Dumping data for table 'care_type_unit_measurement'
--

INSERT INTO care_type_unit_measurement (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(1, 'volume', 'Volume', 'LDVolume', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_unit_measurement (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(2, 'weight', 'Weight', 'LDWeight', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_unit_measurement (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(3, 'length', 'Length', 'LDLength', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_unit_measurement (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(4, 'pressure', 'Pressure', 'LDPressure', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');
INSERT INTO care_type_unit_measurement (nr, type, name, LD_var, description, status, modify_id, modify_time, create_id, create_time) VALUES(5, 'temperature', 'Temperature', 'LDTemperature', '', '', '', '2003-04-19 14:47:24', '', '2003-04-19 14:47:24');


# copy all values to pricetable
INSERT into care_tz_drugsandservices (
  `item_number` ,
  `is_pediatric` ,
  `is_adult` ,
  `is_other` ,
  `is_consumable` ,
  `is_labtest` ,
  `item_description` ,
  `item_full_description` ,
  `unit_price` ,
  `unit_price_1` ,
  `unit_price_2` ,
  `unit_price_3` ,
  `purchasing_class` )
select
  	CONCAT('LAB',tests.id) as item_number,
  	0 as `is_pediatric`,
	0 as `is_adult`,
	0 as `is_other`,
	1 as `is_consumable`,
	1 as `is_labtest`,
	tests.name as item_description,
  	tests.name as item_full_description,
  	param.price as `unit_price`,
  	0 as `unit_price1`,
	0 as `unit_price2`,
	0 as `unit_price3`,
  	'labtest' as purchasing_class
FROM
	care_tz_laboratory_tests tests,
	care_tz_laboratory_param param
where tests.id = param.id AND parent<>-1
;

insert into care_users values('Admin','admin',md5('haydom'),0,0,'System_Admin',0,'2004-07-17','12:41:46','2006-10-03','00:00:00','normal','','','2006-07-03 07:25:34','Aklei G.Kessy','2004-07-17 08:41:46');
