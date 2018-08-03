-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 01, 2018 at 11:21 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 5.6.36-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_allergies`
--

CREATE TABLE `care_tb_allergies` (
  `care_tb_allergies_id` int(11) NOT NULL,
  `district_regno` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `allergy_description` varchar(200) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `care_tb_allergies`
--

INSERT INTO `care_tb_allergies` (`care_tb_allergies_id`, `district_regno`, `allergy_description`) VALUES
(28, '454535/r6767', 'dzfxdcvfds'),
(29, '454535/r6767', 'sulphur'),
(30, '454535/r6767', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_classification_byhistory`
--

CREATE TABLE `care_tb_classification_byhistory` (
  `classification_byhistoryid` smallint(2) NOT NULL,
  `classification_byhistory_descripton` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_classification_byhistory`
--

INSERT INTO `care_tb_classification_byhistory` (`classification_byhistoryid`, `classification_byhistory_descripton`) VALUES
(1, 'New'),
(2, 'Relapse'),
(3, 'Return'),
(4, 'Failure'),
(5, 'Lost to follow up'),
(6, 'Others (Specify)');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_classification_bysite`
--

CREATE TABLE `care_tb_classification_bysite` (
  `classification_bysite_id` smallint(2) NOT NULL,
  `classification_bysite` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_classification_bysite`
--

INSERT INTO `care_tb_classification_bysite` (`classification_bysite_id`, `classification_bysite`) VALUES
(1, 'Pulmonary (AFB +)'),
(2, 'Pulmonary (AFB -)'),
(3, 'Extra-pulmonary (EPTB)');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_dotoptions`
--

CREATE TABLE `care_tb_dotoptions` (
  `dotoption_id` smallint(2) NOT NULL,
  `dotoption_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_dotoptions`
--

INSERT INTO `care_tb_dotoptions` (`dotoption_id`, `dotoption_description`) VALUES
(1, 'Health Facility DOT'),
(2, 'Home-based DOT');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_drclassification_bysite`
--

CREATE TABLE `care_tb_drclassification_bysite` (
  `classification_bysite_id` smallint(2) NOT NULL,
  `classification_bysite` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_drclassification_bysite`
--

INSERT INTO `care_tb_drclassification_bysite` (`classification_bysite_id`, `classification_bysite`) VALUES
(1, 'Pulmonary (PTB)'),
(2, 'Extra-pulmonary (EPTB)'),
(3, 'Both (PTB & EPTB)');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_drdrugs`
--

CREATE TABLE `care_tb_drdrugs` (
  `drugid` int(10) NOT NULL,
  `drugname` varchar(200) NOT NULL,
  `drugabbreviation` varchar(25) NOT NULL,
  `drug_class_id` smallint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_drdrugs`
--

INSERT INTO `care_tb_drdrugs` (`drugid`, `drugname`, `drugabbreviation`, `drug_class_id`) VALUES
(1, 'Amikacin', 'Am', 2),
(2, 'Capreomycin', 'Cm', 2),
(3, 'Ofloxacin', 'Ofx', 2),
(4, 'Levofloxacin', 'Lfx', 2),
(5, 'Cycloserine', 'Cs', 2),
(6, 'Ethionamide', 'Eto', 2),
(7, 'p-aminosalicylic acid', 'PAS', 2),
(8, 'Bedaquiline', 'BDQ', 2),
(9, 'Delamanid', 'DLM', 2),
(10, 'Clofazimine', 'CfZ', 2),
(11, 'HighdoseINH', 'HHigh-NH', 2),
(12, 'Linezolid', 'ILzd', 2),
(13, 'Kanamyacin', 'Km', 2),
(14, 'Moxyfloxacin', 'Mfx', 2),
(15, 'Prothionamide', 'Pto', 2),
(21, 'Isoniazid', 'H', 1),
(22, 'Rifampicin', 'R', 1),
(23, 'Ethambutol', 'E', 1),
(24, 'Pyrazinamide', 'Z', 1),
(25, 'Streptomycin', 'S', 1);

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_drdrugs_firstline`
--

CREATE TABLE `care_tb_drdrugs_firstline` (
  `firstline_drugid` int(10) NOT NULL,
  `firstline_drugname` varchar(200) NOT NULL,
  `firstline_drugabbrev` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_drdrugs_firstline`
--

INSERT INTO `care_tb_drdrugs_firstline` (`firstline_drugid`, `firstline_drugname`, `firstline_drugabbrev`) VALUES
(1, 'Isoniazid', 'H'),
(2, 'Rifampicin', 'R'),
(3, 'Ethambutol', 'E'),
(4, 'Pyrazinamide', 'Z'),
(5, 'Streptomycin', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_drpatient_treatment_episodes`
--

CREATE TABLE `care_tb_drpatient_treatment_episodes` (
  `patient_treatment_phaseid` int(11) NOT NULL,
  `drtb_regno` varchar(50) NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `regimen` varchar(10) NOT NULL,
  `end_date` varchar(25) DEFAULT NULL,
  `treatment_outcomeid` smallint(2) DEFAULT NULL,
  `remarks` text,
  `create_id` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_id` varchar(100) NOT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_drtb_reg_group`
--

CREATE TABLE `care_tb_drtb_reg_group` (
  `drtb_reg_groupid` smallint(2) NOT NULL,
  `drtb_reg_group` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_drtb_reg_group`
--

INSERT INTO `care_tb_drtb_reg_group` (`drtb_reg_groupid`, `drtb_reg_group`) VALUES
(1, 'New'),
(2, 'Replace'),
(3, 'After Lost to follow-up'),
(4, 'After failure of first line drugs (New patient regimen)'),
(5, 'After failure of first line drugs (Retreatment regimen)'),
(6, 'Transfer in (from another 2nd line treatment center)'),
(7, 'Other (Please specify)');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_drtreatment_review`
--

CREATE TABLE `care_tb_drtreatment_review` (
  `trreatment_review_id` int(11) NOT NULL,
  `drtb_regno` varchar(50) NOT NULL,
  `review_date` date NOT NULL,
  `encounter_nr` bigint(20) NOT NULL,
  `issue_decision` text NOT NULL,
  `next_date` date DEFAULT NULL,
  `create_id` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_drug_classes`
--

CREATE TABLE `care_tb_drug_classes` (
  `drug_class_id` smallint(2) NOT NULL,
  `drug_class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_drug_classes`
--

INSERT INTO `care_tb_drug_classes` (`drug_class_id`, `drug_class`) VALUES
(1, 'First-line Drug'),
(2, 'Second-line Drug');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_dr_patient`
--

CREATE TABLE `care_tb_dr_patient` (
  `pid` int(11) UNSIGNED NOT NULL,
  `drtb_regno` varchar(50) NOT NULL,
  `date_drtbreg` date DEFAULT NULL,
  `district_tbregno` varchar(50) NOT NULL,
  `date_districttb_reg` date DEFAULT NULL,
  `next_ofkin` varchar(100) DEFAULT NULL,
  `next_ofkin_add` varchar(200) DEFAULT NULL,
  `telephone` varchar(25) DEFAULT NULL,
  `classification_bysiteid` smallint(2) NOT NULL,
  `eptb_site` varchar(200) DEFAULT NULL,
  `drtb_reg_groupid` smallint(2) DEFAULT NULL,
  `drtb_reg_group_other` varchar(255) DEFAULT NULL,
  `used_second_line_drugs` tinyint(1) NOT NULL DEFAULT '0',
  `second_line_drugs` varchar(200) DEFAULT NULL,
  `hiv_status` tinyint(1) NOT NULL,
  `hiv_regno` varchar(25) DEFAULT NULL,
  `cd4_cell_count` int(10) DEFAULT NULL,
  `cd4_cell_count_date` date DEFAULT NULL,
  `on_cpt` tinyint(1) NOT NULL DEFAULT '0',
  `date_start_cpt` date DEFAULT NULL,
  `on_art` tinyint(1) NOT NULL DEFAULT '0',
  `date_start_art` date DEFAULT NULL,
  `create_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_id` varchar(100) DEFAULT NULL,
  `history` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_hiv_status`
--

CREATE TABLE `care_tb_hiv_status` (
  `hiv_status_id` tinyint(1) NOT NULL,
  `hiv_status_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_hiv_status`
--

INSERT INTO `care_tb_hiv_status` (`hiv_status_id`, `hiv_status_description`) VALUES
(1, 'Positive'),
(2, 'Negative'),
(3, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_med_interruption_reasons`
--

CREATE TABLE `care_tb_med_interruption_reasons` (
  `interruption_reasonid` smallint(2) NOT NULL,
  `interruption_reason` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_med_interruption_reasons`
--

INSERT INTO `care_tb_med_interruption_reasons` (`interruption_reasonid`, `interruption_reason`) VALUES
(1, 'Failure'),
(2, 'Tuberculosis/Interaction'),
(3, 'Adverse effects'),
(4, 'Pregnancy'),
(5, 'Stock out'),
(6, 'Dose change'),
(7, 'Patient refusal'),
(8, 'PMTCT ended'),
(9, 'Other (specify)');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_microscopy_tech`
--

CREATE TABLE `care_tb_microscopy_tech` (
  `microscopy_techid` tinyint(1) NOT NULL,
  `micro_technique` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_microscopy_tech`
--

INSERT INTO `care_tb_microscopy_tech` (`microscopy_techid`, `micro_technique`) VALUES
(1, 'Ziehl-Neelsen'),
(2, 'Fluorescence'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_patient`
--

CREATE TABLE `care_tb_patient` (
  `pid` int(11) UNSIGNED NOT NULL,
  `district_regno` varchar(50) NOT NULL,
  `placeofwork_id` int(10) NOT NULL,
  `placeofwork_other` varchar(255) DEFAULT NULL,
  `area_leader` varchar(100) NOT NULL,
  `contact_telephone` varchar(25) DEFAULT NULL,
  `nationalid` varchar(50) DEFAULT NULL,
  `referrer_id` int(10) NOT NULL,
  `referrer_other` varchar(100) DEFAULT NULL,
  `dotoption_id` smallint(2) NOT NULL,
  `classification_bysiteid` smallint(2) NOT NULL,
  `eptb_site` varchar(200) DEFAULT NULL,
  `classification_byhistoryid` smallint(2) DEFAULT NULL,
  `classification_byhistory_other` varchar(255) DEFAULT NULL,
  `hiv_status` tinyint(1) NOT NULL,
  `hiv_regno` varchar(25) DEFAULT NULL,
  `on_cpt` tinyint(1) NOT NULL DEFAULT '0',
  `date_start_cpt` date DEFAULT NULL,
  `on_art` tinyint(1) NOT NULL DEFAULT '0',
  `date_start_art` date DEFAULT NULL,
  `create_id` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_id` varchar(100) DEFAULT NULL,
  `history` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_patient`
--

INSERT INTO `care_tb_patient` (`pid`, `district_regno`, `placeofwork_id`, `placeofwork_other`, `area_leader`, `contact_telephone`, `nationalid`, `referrer_id`, `referrer_other`, `dotoption_id`, `classification_bysiteid`, `eptb_site`, `classification_byhistoryid`, `classification_byhistory_other`, `hiv_status`, `hiv_regno`, `on_cpt`, `date_start_cpt`, `on_art`, `date_start_art`, `create_id`, `create_date`, `modify_id`, `history`) VALUES
(10070261, '454535/r6767', 3, 'Store', 'Test Test', '43535435345', '45435545', 4, 'rtyujghfgc', 1, 3, 'upper kkk', 6, 'Unspecified', 3, '727676757', 1, '2005-03-07', 1, '2018-07-30', 'test test2 test3', '2018-08-01 18:28:08', 'test test2 test3', 'Created 2018-08-01 21:28:08: test test2 test3;\nUpdate 2018-08-01 23:23:39 test test2 test3;\nUpdate 2018-08-01 23:25:25 test test2 test3;\nUpdate 2018-08-01 23:34:13 test test2 test3;\nUpdate 2018-08-01 23:37:04 test test2 test3;\nUpdate 2018-08-01 23:37:28 test test2 test3;\nUpdate 2018-08-01 23:38:56 test test2 test3;\nUpdate 2018-08-01 23:42:09 test test2 test3;\nUpdate 2018-08-02 00:07:28 test test2 test3;\nUpdate 2018-08-02 00:10:02 test test2 test3;\n');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_patient_household`
--

CREATE TABLE `care_tb_patient_household` (
  `patient_household_contactid` int(11) NOT NULL,
  `pid` int(11) UNSIGNED NOT NULL,
  `household_contact_name` varchar(200) NOT NULL,
  `household_contact_age` smallint(3) NOT NULL,
  `household_contact_sex` varchar(10) NOT NULL,
  `is_screened` tinyint(1) NOT NULL DEFAULT '0',
  `outcome` varchar(100) NOT NULL,
  `started_medication` tinyint(1) NOT NULL DEFAULT '0',
  `medication` varchar(100) DEFAULT NULL,
  `create_id` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_id` varchar(100) DEFAULT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_patient_instructions`
--

CREATE TABLE `care_tb_patient_instructions` (
  `patient_instruction_id` int(10) NOT NULL,
  `patient_instruction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_patient_instructions`
--

INSERT INTO `care_tb_patient_instructions` (`patient_instruction_id`, `patient_instruction`) VALUES
(1, 'Tunza kadi yako'),
(2, 'Kifua kikuu ni ugonjwa wa kuambukiza na siyo kulogwa'),
(3, 'Matibabu ya Kifua kikuu yanatolewa bila malipo'),
(4, 'Tiba huchukua miezi 6 au 8 kukamilika'),
(5, 'Mgonjwa wa Kifua kikuu hupona akitumia dawa kila siku hata kama ana maambukizi ya VVU'),
(6, 'Ni muhimu kwa waonjwa wa Kifua kikuu kupima VVU'),
(7, 'TB haitibiki kwa tiba mbadala. Hivyo fuata masharti ya daktari ili upone'),
(8, 'Funika mdomo na pua  unapokohoa'),
(9, 'Tumia dawa zako kila siku kama ulivyoelekezwa ili upone');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_patient_treatment_phases`
--

CREATE TABLE `care_tb_patient_treatment_phases` (
  `patient_treatment_phaseid` int(11) NOT NULL,
  `pid` int(11) UNSIGNED NOT NULL,
  `phase_id` smallint(2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `start_encounter_nr` bigint(20) UNSIGNED NOT NULL,
  `treatment_outcomeid` smallint(2) DEFAULT NULL,
  `outcome_date` date DEFAULT NULL,
  `remarks` text,
  `create_id` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_id` varchar(100) NOT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_phases`
--

CREATE TABLE `care_tb_phases` (
  `phase_id` smallint(2) NOT NULL,
  `phase_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_phases`
--

INSERT INTO `care_tb_phases` (`phase_id`, `phase_description`) VALUES
(1, 'Intensive Phase'),
(2, 'Continuation Phase');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_placeofwork`
--

CREATE TABLE `care_tb_placeofwork` (
  `placeofwork_id` int(10) NOT NULL,
  `placeofwork` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_placeofwork`
--

INSERT INTO `care_tb_placeofwork` (`placeofwork_id`, `placeofwork`) VALUES
(1, 'Hfacility'),
(2, 'Mines'),
(3, 'Other (Specify)');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_referrer`
--

CREATE TABLE `care_tb_referrer` (
  `referrer_id` int(11) NOT NULL,
  `referrer_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_referrer`
--

INSERT INTO `care_tb_referrer` (`referrer_id`, `referrer_description`) VALUES
(1, 'Self'),
(2, 'Community'),
(3, 'CTC'),
(4, 'Others (Specify)');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_treatment_outcomes`
--

CREATE TABLE `care_tb_treatment_outcomes` (
  `treatment_outcome_id` smallint(2) NOT NULL,
  `treatment_outcome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_treatment_outcomes`
--

INSERT INTO `care_tb_treatment_outcomes` (`treatment_outcome_id`, `treatment_outcome`) VALUES
(1, 'Cured'),
(2, 'Treatment completed'),
(3, 'Treatment failure'),
(4, 'Died'),
(5, 'Lost to follow up');

-- --------------------------------------------------------

--
-- Table structure for table `care_tb_treatment_supporter`
--

CREATE TABLE `care_tb_treatment_supporter` (
  `treatment_supporterid` int(11) NOT NULL,
  `pid` int(11) UNSIGNED NOT NULL,
  `treatment_supporter_name` varchar(200) NOT NULL,
  `treatment_supporter_address` varchar(255) DEFAULT NULL,
  `treatment_supporter_phone` varchar(15) NOT NULL,
  `is_current` tinyint(1) NOT NULL DEFAULT '1',
  `create_id` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_id` varchar(100) DEFAULT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_tb_treatment_supporter`
--

INSERT INTO `care_tb_treatment_supporter` (`treatment_supporterid`, `pid`, `treatment_supporter_name`, `treatment_supporter_address`, `treatment_supporter_phone`, `is_current`, `create_id`, `create_date`, `modify_id`, `history`) VALUES
(1, 10070261, 'test test test', 'test test testoooo', '97686567878', 1, '', '2018-08-01 23:23:40', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `care_tb_allergies`
--
ALTER TABLE `care_tb_allergies`
  ADD PRIMARY KEY (`care_tb_allergies_id`);

--
-- Indexes for table `care_tb_classification_byhistory`
--
ALTER TABLE `care_tb_classification_byhistory`
  ADD PRIMARY KEY (`classification_byhistoryid`);

--
-- Indexes for table `care_tb_classification_bysite`
--
ALTER TABLE `care_tb_classification_bysite`
  ADD PRIMARY KEY (`classification_bysite_id`);

--
-- Indexes for table `care_tb_dotoptions`
--
ALTER TABLE `care_tb_dotoptions`
  ADD PRIMARY KEY (`dotoption_id`);

--
-- Indexes for table `care_tb_drclassification_bysite`
--
ALTER TABLE `care_tb_drclassification_bysite`
  ADD PRIMARY KEY (`classification_bysite_id`);

--
-- Indexes for table `care_tb_drdrugs`
--
ALTER TABLE `care_tb_drdrugs`
  ADD PRIMARY KEY (`drugid`),
  ADD KEY `drug_class_id` (`drug_class_id`);

--
-- Indexes for table `care_tb_drdrugs_firstline`
--
ALTER TABLE `care_tb_drdrugs_firstline`
  ADD PRIMARY KEY (`firstline_drugid`);

--
-- Indexes for table `care_tb_drpatient_treatment_episodes`
--
ALTER TABLE `care_tb_drpatient_treatment_episodes`
  ADD PRIMARY KEY (`patient_treatment_phaseid`),
  ADD KEY `phase_id` (`drtb_regno`),
  ADD KEY `treatment_outcomeid` (`treatment_outcomeid`);

--
-- Indexes for table `care_tb_drtb_reg_group`
--
ALTER TABLE `care_tb_drtb_reg_group`
  ADD PRIMARY KEY (`drtb_reg_groupid`);

--
-- Indexes for table `care_tb_drtreatment_review`
--
ALTER TABLE `care_tb_drtreatment_review`
  ADD PRIMARY KEY (`trreatment_review_id`);

--
-- Indexes for table `care_tb_drug_classes`
--
ALTER TABLE `care_tb_drug_classes`
  ADD PRIMARY KEY (`drug_class_id`);

--
-- Indexes for table `care_tb_dr_patient`
--
ALTER TABLE `care_tb_dr_patient`
  ADD PRIMARY KEY (`drtb_regno`),
  ADD KEY `pid` (`pid`,`district_tbregno`,`classification_bysiteid`,`drtb_reg_groupid`) USING BTREE,
  ADD KEY `classification_bysiteid` (`classification_bysiteid`),
  ADD KEY `classification_byhistoryid` (`drtb_reg_groupid`),
  ADD KEY `hiv_status` (`hiv_status`);

--
-- Indexes for table `care_tb_hiv_status`
--
ALTER TABLE `care_tb_hiv_status`
  ADD PRIMARY KEY (`hiv_status_id`);

--
-- Indexes for table `care_tb_med_interruption_reasons`
--
ALTER TABLE `care_tb_med_interruption_reasons`
  ADD PRIMARY KEY (`interruption_reasonid`);

--
-- Indexes for table `care_tb_microscopy_tech`
--
ALTER TABLE `care_tb_microscopy_tech`
  ADD PRIMARY KEY (`microscopy_techid`);

--
-- Indexes for table `care_tb_patient`
--
ALTER TABLE `care_tb_patient`
  ADD PRIMARY KEY (`district_regno`),
  ADD KEY `pid` (`pid`,`district_regno`,`placeofwork_id`,`referrer_id`,`dotoption_id`,`classification_bysiteid`,`classification_byhistoryid`) USING BTREE,
  ADD KEY `placeofwork_id` (`placeofwork_id`),
  ADD KEY `referrer_id` (`referrer_id`),
  ADD KEY `dotoption_id` (`dotoption_id`),
  ADD KEY `classification_bysiteid` (`classification_bysiteid`),
  ADD KEY `classification_byhistoryid` (`classification_byhistoryid`),
  ADD KEY `hiv_status` (`hiv_status`);

--
-- Indexes for table `care_tb_patient_household`
--
ALTER TABLE `care_tb_patient_household`
  ADD PRIMARY KEY (`patient_household_contactid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `care_tb_patient_instructions`
--
ALTER TABLE `care_tb_patient_instructions`
  ADD PRIMARY KEY (`patient_instruction_id`);

--
-- Indexes for table `care_tb_patient_treatment_phases`
--
ALTER TABLE `care_tb_patient_treatment_phases`
  ADD PRIMARY KEY (`patient_treatment_phaseid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `phase_id` (`phase_id`),
  ADD KEY `treatment_outcomeid` (`treatment_outcomeid`),
  ADD KEY `start_encounter_nr` (`start_encounter_nr`);

--
-- Indexes for table `care_tb_phases`
--
ALTER TABLE `care_tb_phases`
  ADD PRIMARY KEY (`phase_id`);

--
-- Indexes for table `care_tb_placeofwork`
--
ALTER TABLE `care_tb_placeofwork`
  ADD PRIMARY KEY (`placeofwork_id`);

--
-- Indexes for table `care_tb_referrer`
--
ALTER TABLE `care_tb_referrer`
  ADD PRIMARY KEY (`referrer_id`);

--
-- Indexes for table `care_tb_treatment_outcomes`
--
ALTER TABLE `care_tb_treatment_outcomes`
  ADD PRIMARY KEY (`treatment_outcome_id`);

--
-- Indexes for table `care_tb_treatment_supporter`
--
ALTER TABLE `care_tb_treatment_supporter`
  ADD PRIMARY KEY (`treatment_supporterid`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `care_tb_allergies`
--
ALTER TABLE `care_tb_allergies`
  MODIFY `care_tb_allergies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `care_tb_classification_byhistory`
--
ALTER TABLE `care_tb_classification_byhistory`
  MODIFY `classification_byhistoryid` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `care_tb_classification_bysite`
--
ALTER TABLE `care_tb_classification_bysite`
  MODIFY `classification_bysite_id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `care_tb_dotoptions`
--
ALTER TABLE `care_tb_dotoptions`
  MODIFY `dotoption_id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `care_tb_drclassification_bysite`
--
ALTER TABLE `care_tb_drclassification_bysite`
  MODIFY `classification_bysite_id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `care_tb_drdrugs`
--
ALTER TABLE `care_tb_drdrugs`
  MODIFY `drugid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `care_tb_drdrugs_firstline`
--
ALTER TABLE `care_tb_drdrugs_firstline`
  MODIFY `firstline_drugid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `care_tb_drpatient_treatment_episodes`
--
ALTER TABLE `care_tb_drpatient_treatment_episodes`
  MODIFY `patient_treatment_phaseid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `care_tb_drtb_reg_group`
--
ALTER TABLE `care_tb_drtb_reg_group`
  MODIFY `drtb_reg_groupid` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `care_tb_drtreatment_review`
--
ALTER TABLE `care_tb_drtreatment_review`
  MODIFY `trreatment_review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `care_tb_drug_classes`
--
ALTER TABLE `care_tb_drug_classes`
  MODIFY `drug_class_id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `care_tb_hiv_status`
--
ALTER TABLE `care_tb_hiv_status`
  MODIFY `hiv_status_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `care_tb_med_interruption_reasons`
--
ALTER TABLE `care_tb_med_interruption_reasons`
  MODIFY `interruption_reasonid` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `care_tb_microscopy_tech`
--
ALTER TABLE `care_tb_microscopy_tech`
  MODIFY `microscopy_techid` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `care_tb_patient_household`
--
ALTER TABLE `care_tb_patient_household`
  MODIFY `patient_household_contactid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `care_tb_patient_instructions`
--
ALTER TABLE `care_tb_patient_instructions`
  MODIFY `patient_instruction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `care_tb_patient_treatment_phases`
--
ALTER TABLE `care_tb_patient_treatment_phases`
  MODIFY `patient_treatment_phaseid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `care_tb_phases`
--
ALTER TABLE `care_tb_phases`
  MODIFY `phase_id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `care_tb_placeofwork`
--
ALTER TABLE `care_tb_placeofwork`
  MODIFY `placeofwork_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `care_tb_referrer`
--
ALTER TABLE `care_tb_referrer`
  MODIFY `referrer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `care_tb_treatment_outcomes`
--
ALTER TABLE `care_tb_treatment_outcomes`
  MODIFY `treatment_outcome_id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `care_tb_treatment_supporter`
--
ALTER TABLE `care_tb_treatment_supporter`
  MODIFY `treatment_supporterid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `care_tb_drdrugs`
--
ALTER TABLE `care_tb_drdrugs`
  ADD CONSTRAINT `care_tb_drdrugs_ibfk_1` FOREIGN KEY (`drug_class_id`) REFERENCES `care_tb_drug_classes` (`drug_class_id`);

--
-- Constraints for table `care_tb_patient`
--
ALTER TABLE `care_tb_patient`
  ADD CONSTRAINT `care_tb_patient_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `care_person` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `care_tb_patient_ibfk_2` FOREIGN KEY (`placeofwork_id`) REFERENCES `care_tb_placeofwork` (`placeofwork_id`),
  ADD CONSTRAINT `care_tb_patient_ibfk_3` FOREIGN KEY (`referrer_id`) REFERENCES `care_tb_referrer` (`referrer_id`),
  ADD CONSTRAINT `care_tb_patient_ibfk_4` FOREIGN KEY (`dotoption_id`) REFERENCES `care_tb_dotoptions` (`dotoption_id`),
  ADD CONSTRAINT `care_tb_patient_ibfk_5` FOREIGN KEY (`classification_bysiteid`) REFERENCES `care_tb_classification_bysite` (`classification_bysite_id`),
  ADD CONSTRAINT `care_tb_patient_ibfk_6` FOREIGN KEY (`classification_byhistoryid`) REFERENCES `care_tb_classification_byhistory` (`classification_byhistoryid`),
  ADD CONSTRAINT `care_tb_patient_ibfk_8` FOREIGN KEY (`hiv_status`) REFERENCES `care_tb_hiv_status` (`hiv_status_id`);

--
-- Constraints for table `care_tb_patient_treatment_phases`
--
ALTER TABLE `care_tb_patient_treatment_phases`
  ADD CONSTRAINT `care_tb_patient_treatment_phases_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `care_person` (`pid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `care_tb_patient_treatment_phases_ibfk_2` FOREIGN KEY (`phase_id`) REFERENCES `care_tb_phases` (`phase_id`),
  ADD CONSTRAINT `care_tb_patient_treatment_phases_ibfk_3` FOREIGN KEY (`treatment_outcomeid`) REFERENCES `care_tb_treatment_outcomes` (`treatment_outcome_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `care_tb_patient_treatment_phases_ibfk_4` FOREIGN KEY (`start_encounter_nr`) REFERENCES `care_encounter` (`encounter_nr`) ON UPDATE CASCADE;

--
-- Constraints for table `care_tb_treatment_supporter`
--
ALTER TABLE `care_tb_treatment_supporter`
  ADD CONSTRAINT `care_tb_treatment_supporter_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `care_person` (`pid`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
