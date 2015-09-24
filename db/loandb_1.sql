-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2015 at 08:36 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `CID` varchar(45) DEFAULT NULL COMMENT 'Group/individual',
  `first_name_english` varchar(150) DEFAULT NULL,
  `last_name_english` varchar(150) DEFAULT NULL,
  `nick_name_english` varchar(150) DEFAULT NULL,
  `first_name_khmer` varchar(150) DEFAULT NULL,
  `last_name_khmer` varchar(150) DEFAULT NULL,
  `nick_name_khmer` varchar(150) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `identity_card_passport` varchar(150) DEFAULT NULL,
  `job` varchar(150) DEFAULT NULL,
  `income_per_month` decimal(15,3) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `province` varchar(150) DEFAULT NULL,
  `khan_district` varchar(150) DEFAULT NULL,
  `sangkat_commune` varchar(150) DEFAULT NULL,
  `village` varchar(150) DEFAULT NULL,
  `home_number` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `marrital_status` varchar(45) DEFAULT NULL,
  `account_type` varchar(45) DEFAULT NULL COMMENT 'Group/individual'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `CID`, `first_name_english`, `last_name_english`, `nick_name_english`, `first_name_khmer`, `last_name_khmer`, `nick_name_khmer`, `gender`, `identity_card_passport`, `job`, `income_per_month`, `phone_number`, `province`, `khan_district`, `sangkat_commune`, `village`, `home_number`, `email`, `date_of_birth`, `marrital_status`, `account_type`) VALUES
(1, '0000001', 'chhing', 'hem', 'abc', 'ឈីង', 'ហែម', 'ចែឈីង', 'Female', NULL, 'Teacher', '150.000', '0972792217', 'Takeo', 'Traing', 'Khvav', 'Dounpher', '0326363800', 'chhing@gmail.com', '1990-02-01 00:00:00', 'Single', NULL),
(2, '0000002', 'saorin', 'phan', 'ddd', 'សៅរិន', 'ផាន', 'ចែរិន', 'Male', NULL, 'Developer', '150.000', '0972792217', 'Takeo', 'Traing', 'Khvav', 'Khvav', '0326363800', 'chhing@gmail.com', '1991-02-01 00:00:00', 'Single', NULL),
(3, '0000003', 'thida', 'pen', 'ada', 'សៅរិន', 'ផាន', 'ចែរិន', 'Female', NULL, 'Designer', '170.000', '0972792211', 'BB', 'Traing', 'Khvav', 'Khvav', '0326363800', 'chhing@gmail.com', '1992-03-23 00:00:00', 'Single', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
`id` int(11) NOT NULL,
  `maturity_date` datetime DEFAULT NULL,
  `loan_account` varchar(150) DEFAULT NULL,
  `account_status` varchar(45) DEFAULT 'pending' COMMENT '- Pending\\n- Approved\\n- Cancel?',
  `duration_loan` varchar(45) DEFAULT NULL,
  `duration_loan_type` varchar(45) DEFAULT NULL COMMENT 'Day/Month',
  `customer_id` int(11) DEFAULT NULL,
  `product_type_title` varchar(150) DEFAULT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `repayment_type` varchar(45) DEFAULT NULL,
  `ownership_type` varchar(45) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL COMMENT '- Riel KH\n- USD $',
  `amount_freg` int(11) DEFAULT NULL COMMENT 'Amount of repayment freg, Example: 1 week, 10 days, 15 days',
  `repayment_freg` varchar(45) DEFAULT NULL COMMENT '- Daily\n- Weekly\n- Monthly',
  `loan_amount` decimal(15,3) DEFAULT NULL,
  `loan_amount_in_word` varchar(150) DEFAULT NULL,
  `first_repayment` datetime DEFAULT NULL,
  `renew_installment` int(11) DEFAULT NULL,
  `interest_rate` decimal(15,3) DEFAULT NULL,
  `penalty_rate` decimal(15,3) DEFAULT NULL,
  `installment_amount` decimal(15,3) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `maturity_date`, `loan_account`, `account_status`, `duration_loan`, `duration_loan_type`, `customer_id`, `product_type_title`, `product_type_id`, `repayment_type`, `ownership_type`, `currency`, `amount_freg`, `repayment_freg`, `loan_amount`, `loan_amount_in_word`, `first_repayment`, `renew_installment`, `interest_rate`, `penalty_rate`, `installment_amount`, `deleted`) VALUES
(1, '2015-01-03 00:00:00', '8888-00000001-1', 'approved', '1', 'year', 1, '100000 Riel - 200000 Riel', 2, 'Anuilty', 'Single', 'KHR', 1, 'weekly', '100000.000', NULL, '2015-01-07 00:00:00', 1, '2.000', NULL, '15800.000', 0),
(2, '2015-01-06 00:00:00', '8888-00000002-2', 'pending', '1', 'year', 2, '100000 Riel - 200000 Riel', 2, 'Anuilty', 'Single', 'KHR', 1, 'monthly', '100000.000', NULL, '2015-02-06 00:00:00', 1, '2.000', NULL, '15800.000', 0),
(3, '2015-10-01 00:00:00', '8888-00000003-3', 'pending', '1', 'week', 3, '100000 Riel - 200000 Riel', 2, 'Anuilty', 'Single', 'KHR', 1, 'weekly', '40000.000', 'hhh', '2015-10-08 00:00:00', 1, '2.000', '0.000', '1.000', 0),
(4, '2015-01-23 00:00:00', '8888-00000004-3', 'pending', '6', 'month', 3, '100000 Riel - 200000 Riel', 2, 'Anuilty', 'Single', 'KHR', 15, 'daily', '400000.000', 'hhh', '2015-10-08 00:00:00', 1, '2.000', '0.000', '1.000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE IF NOT EXISTS `product_types` (
`id` int(11) NOT NULL,
  `product_type_title` varchar(200) DEFAULT NULL,
  `start_range` decimal(15,3) DEFAULT NULL,
  `end_range` decimal(15,3) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `product_type_title`, `start_range`, `end_range`) VALUES
(1, '10000 Riel - 1000000 Riel', '10000.000', '100000.000'),
(2, '100000 Riel - 200000 Riel', '100000.000', '200000.000');

-- --------------------------------------------------------

--
-- Table structure for table `spouse_informations`
--

CREATE TABLE IF NOT EXISTS `spouse_informations` (
`id` int(11) NOT NULL,
  `first_name_english` varchar(150) DEFAULT NULL,
  `last_name_english` varchar(150) DEFAULT NULL,
  `nick_name_english` varchar(150) DEFAULT NULL,
  `first_name_khmer` varchar(150) DEFAULT NULL,
  `last_name_khmer` varchar(150) DEFAULT NULL,
  `nick_name_khmer` varchar(150) DEFAULT NULL,
  `identity_card_passport` varchar(150) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `income_per_month` decimal(15,3) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `full_name`, `username`, `password`, `user_type_id`) VALUES
(1, 'chhing', 'hem', 'chhing hem', 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'saorin', 'phan', 'saorin phan', 'saorin.php', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
`id` int(11) NOT NULL,
  `user_type` varchar(150) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE IF NOT EXISTS `vouchers` (
`id` int(11) NOT NULL,
  `voucher_code` varchar(45) DEFAULT NULL,
  `loan_id` int(11) DEFAULT NULL,
  `disbur_location` varchar(255) DEFAULT NULL,
  `contract_no` varchar(45) DEFAULT NULL,
  `disbursement_date` datetime DEFAULT NULL,
  `payer` int(11) DEFAULT NULL COMMENT 'Full name of who pay the money\n',
  `gl_code` varchar(45) DEFAULT NULL COMMENT 'Code of account',
  `amount_received` decimal(15,3) DEFAULT NULL,
  `amount_received_in_word` varchar(150) DEFAULT NULL,
  `payee` int(11) DEFAULT NULL COMMENT 'full name of who get the money\nCustomer_ID',
  `gender` varchar(45) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `arranged_by` int(11) DEFAULT NULL COMMENT 'ID of a person who arranged this loan',
  `arranged_date` datetime DEFAULT NULL,
  `treasured_by` int(11) DEFAULT NULL COMMENT 'ID of a person who treasured on this loan',
  `treasured_date` datetime DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL COMMENT 'ID of who approved on this loan',
  `approved_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_loans_customers1_idx` (`customer_id`), ADD KEY `fk_loans_product_types1_idx` (`product_type_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spouse_informations`
--
ALTER TABLE `spouse_informations`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_spouse_informations_customers_idx` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD KEY `fk_users_user_types1_idx` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_vouchers_loans1_idx` (`loan_id`), ADD KEY `fk_vouchers_users1_idx` (`payer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spouse_informations`
--
ALTER TABLE `spouse_informations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
ADD CONSTRAINT `fk_loans_customers1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_loans_product_types1` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `spouse_informations`
--
ALTER TABLE `spouse_informations`
ADD CONSTRAINT `fk_spouse_informations_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_users_user_types1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
ADD CONSTRAINT `fk_vouchers_loans1` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_vouchers_users1` FOREIGN KEY (`payer`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
