/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  pat
 * Created: Jul 31, 2018
 */

ALTER TABLE `care_test_request_chemlabor` ADD `is_tb_request` TINYINT(1) NOT NULL DEFAULT '0' AFTER `bill_status`;

ALTER TABLE `care_test_request_chemlabor` ADD `tb_request_month` VARCHAR(25) NOT NULL DEFAULT '0' AFTER `is_tb_request`;

ALTER TABLE `care_test_request_chemlabor`  
ADD `exam_reasonid` SMALLINT(2) NULL AFTER `is_tb_request`,  
ADD `tb_anatomical_site` VARCHAR(200) NULL  AFTER `exam_reasonid`,  
ADD `sample_qualityid` TINYINT(1) NULL DEFAULT '1'  AFTER `tb_anatomical_site`,  
ADD `sample_received_by` VARCHAR(200) NULL  AFTER `sample_quality`;

ALTER TABLE `care_test_request_chemlabor` ADD `sample_quality_reason` VARCHAR(255) NULL AFTER `sample_qualityid`;


ALTER TABLE `care_test_request_chemlabor` 
ADD FOREIGN KEY (`sample_qualityid`) 
REFERENCES `care_test_sample_quality`(`sample_qualityid`) 
ON DELETE RESTRICT ON UPDATE CASCADE;


ALTER TABLE `care_test_request_chemlabor` ADD `specimen_appearance` VARCHAR(200) NULL AFTER `specimen_container`;
--
-- Table structure for table `care_test_exam_reason`
--

CREATE TABLE `care_test_exam_reason` (
  `exam_reasonid` smallint(2) NOT NULL,
  `exam_reason_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `care_test_exam_reason`
--
ALTER TABLE `care_test_exam_reason`
  ADD PRIMARY KEY (`exam_reasonid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `care_test_exam_reason`
--
ALTER TABLE `care_test_exam_reason`
  MODIFY `exam_reasonid` smallint(2) NOT NULL AUTO_INCREMENT;


ALTER TABLE `care_test_request_chemlabor` 
ADD FOREIGN KEY (`exam_reasonid`) REFERENCES `care_test_exam_reason`(`exam_reasonid`) 
ON DELETE RESTRICT ON UPDATE RESTRICT;


ALTER TABLE `care_test_findings_chemlabor_sub` 
ADD `modify_id` VARCHAR(50) NULL AFTER `create_time`, 
ADD `modify_time` DATETIME NULL AFTER `modify_id`;

ALTER TABLE `care_test_findings_chemlabor_sub` 
ADD `microscopy_techid` TINYINT(1) NULL AFTER `status`;

ALTER TABLE `care_test_findings_chemlabor_sub` 
ADD FOREIGN KEY (`microscopy_techid`) 
REFERENCES `care_tb_microscopy_tech`(`microscopy_techid`) 
ON DELETE RESTRICT ON UPDATE CASCADE;


ALTER TABLE `care_test_request_chemlabor_sub` 
ADD `specimen_number` VARCHAR(50) NULL AFTER `bill_status`;


ALTER TABLE `care_encounter_prescription` ADD `tb_interruption_reasonid` SMALLINT(2) NULL AFTER `is_stopped`;