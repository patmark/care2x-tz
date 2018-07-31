-- --------------------------------------------------------

--
-- Table structure for table `care_encounter_drugsheet`
--

DROP TABLE IF EXISTS `care_encounter_drugsheet`;
CREATE TABLE `care_encounter_drugsheet` (
  `prescr_nr` int(11) NOT NULL,
  `chart_date` date NOT NULL,
  `chart_time` varchar(8) NOT NULL,
  `amount` decimal(4,0) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_id` varchar(100) NOT NULL,
  `modify_id` varchar(255) NOT NULL,
  `modify_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `care_encounter_drugsheet`
--
ALTER TABLE `care_encounter_drugsheet`
  ADD PRIMARY KEY (`prescr_nr`,`chart_date`,`chart_time`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `care_encounter_drugsheet`
--
ALTER TABLE `care_encounter_drugsheet`
  ADD CONSTRAINT `care_encounter_drugsheet_ibfk_1` FOREIGN KEY (`prescr_nr`) REFERENCES `care_encounter_prescription` (`nr`) ON UPDATE CASCADE;