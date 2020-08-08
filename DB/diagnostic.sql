-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 07:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnostic`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about`) VALUES
(1, 'more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `add_bed`
--

CREATE TABLE `add_bed` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bed_type` varchar(200) NOT NULL,
  `bed_qty` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `add_client`
--

CREATE TABLE `add_client` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `nid` varchar(500) NOT NULL,
  `image` varchar(50) NOT NULL,
  `previous_due` varchar(200) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `add_package`
--

CREATE TABLE `add_package` (
  `record_id` int(11) NOT NULL,
  `package_name` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `block_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `record_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `admin_unique_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`record_id`, `name`, `designation`, `mobile`, `image`, `admin_unique_id`, `password`) VALUES
(1, 'admin', '', '', '', 'admin', 'plz258');

-- --------------------------------------------------------

--
-- Table structure for table `admission_fee_invoice`
--

CREATE TABLE `admission_fee_invoice` (
  `record_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `admission_fee` float NOT NULL,
  `advance_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_fee_invoice`
--

INSERT INTO `admission_fee_invoice` (`record_id`, `patient_id`, `admission_fee`, `advance_amount`) VALUES
(2, 280, 0, 0),
(3, 277, 500, 50000),
(4, 281, 300, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `admission_patient`
--

CREATE TABLE `admission_patient` (
  `record_id` int(11) NOT NULL,
  `admit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `anesthesia_id` int(11) NOT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `operation_price` float NOT NULL,
  `operation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_patient`
--

INSERT INTO `admission_patient` (`record_id`, `admit_id`, `patient_id`, `category_id`, `operation_id`, `doctor_id`, `anesthesia_id`, `diagnosis`, `relation`, `operation_price`, `operation_date`) VALUES
(5, 3, 277, 23, 142, 45, 45, 'abc', 'none', 20200700, '2020-07-28'),
(6, 2, 280, 24, 138, 47, 48, 'nbvcc', 'none', 20200700, '2020-07-28'),
(7, 2, 280, 21, 140, 47, 32, 'abc', 'none', 20200700, '2020-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `advance_payment`
--

CREATE TABLE `advance_payment` (
  `record_id` int(15) NOT NULL,
  `date` date NOT NULL,
  `patient_id` varchar(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `age` int(12) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `doctor` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `room_no` int(200) NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `payment_amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_info`
--

CREATE TABLE `appointment_info` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `mobile` int(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `doctor_fee` varchar(200) NOT NULL,
  `appointment_time` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_info`
--

INSERT INTO `appointment_info` (`record_id`, `date`, `patient_id`, `patient_name`, `mobile`, `address`, `age`, `doctor_name`, `doctor_fee`, `appointment_time`, `status`, `department`, `designation`) VALUES
(3, '2020-07-13', 277, 'Masud Rana', 1619180956, 'Mirpur1', '45 Yrs', 'Dr.Md. Rukunuzzaman', '300', '15:30', 0, '', 'MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)');

-- --------------------------------------------------------

--
-- Table structure for table `asset_info`
--

CREATE TABLE `asset_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `asset_type` varchar(200) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `credit_debit` varchar(100) NOT NULL,
  `asset_from` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `balance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign_bed`
--

CREATE TABLE `assign_bed` (
  `record_id` int(11) NOT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `assign_date` date NOT NULL,
  `patient_id` varchar(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `bed_type` varchar(200) NOT NULL,
  `room_no` varchar(300) NOT NULL,
  `charge` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `discharge_date` date NOT NULL,
  `guardian_name` varchar(200) NOT NULL,
  `relation` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_deposit`
--

CREATE TABLE `bank_deposit` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `responsible_person` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank_withdraw`
--

CREATE TABLE `bank_withdraw` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `responsible_person` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `base_data`
--

CREATE TABLE `base_data` (
  `id` int(12) NOT NULL,
  `base_id` int(11) NOT NULL,
  `generic_name` varchar(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bed_no`
--

CREATE TABLE `bed_no` (
  `record_id` int(11) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `bed_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bed_type`
--

CREATE TABLE `bed_type` (
  `record_id` int(11) NOT NULL,
  `bed_type` varchar(200) NOT NULL,
  `bed_qty` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `room_no` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `billing_service`
--

CREATE TABLE `billing_service` (
  `record_id` int(11) NOT NULL,
  `service_name` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `block_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `birth_report`
--

CREATE TABLE `birth_report` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `child_name` varchar(50) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `doctor_id` varchar(200) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `case_patient`
--

CREATE TABLE `case_patient` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `case_manager_id` int(11) NOT NULL,
  `case_manager` varchar(200) NOT NULL,
  `ref_doctor` varchar(200) NOT NULL,
  `hospital` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `consultancy`
--

CREATE TABLE `consultancy` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `doctor_fee` varchar(200) NOT NULL,
  `discount` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `company_commission` int(11) NOT NULL,
  `doctor_commission` int(11) NOT NULL,
  `appointment_time` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultancy`
--

INSERT INTO `consultancy` (`record_id`, `date`, `patient_id`, `patient_name`, `mobile`, `address`, `age`, `doctor_name`, `doctor_fee`, `discount`, `sub_total`, `company_commission`, `doctor_commission`, `appointment_time`, `status`, `department`, `designation`) VALUES
(1, '2020-07-12', 277, 'Masud Rana', '01619180956', 'Mirpur1', '45 Yrs', 'Dr.Md. Rukunuzzaman', '300', 0, 300, 150, 150, '17:30', 0, '', 'MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(100) NOT NULL,
  `c_name` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `address` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `email` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `email2` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `email3` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `web` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `hotline` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `hotline2` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `hotline3` varchar(1000) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `c_name`, `address`, `email`, `email2`, `email3`, `web`, `hotline`, `hotline2`, `hotline3`) VALUES
(1, 'GREEN Pathology Complex', 'Mirpur-1, Dhaka-1216.', 'greensoftwaretech@gmail.com', 'cse.limon.33@gmail.com', '', 'greensoftechbd.com', '01619180956', '01719180956', '');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter_id` int(10) NOT NULL,
  `count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter_id`, `count`) VALUES
(1, 9747);

-- --------------------------------------------------------

--
-- Table structure for table `create_bank_name`
--

CREATE TABLE `create_bank_name` (
  `record_id` int(11) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `create_bill`
--

CREATE TABLE `create_bill` (
  `record_id` int(11) NOT NULL,
  `invoice_no` int(200) NOT NULL,
  `date` date NOT NULL,
  `particular` varchar(500) NOT NULL,
  `patient_id` varchar(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `discount` float NOT NULL,
  `sub_total` float NOT NULL,
  `paid` float NOT NULL,
  `due` float NOT NULL,
  `advance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_bill`
--

INSERT INTO `create_bill` (`record_id`, `invoice_no`, `date`, `particular`, `patient_id`, `patient_name`, `amount`, `discount`, `sub_total`, `paid`, `due`, `advance`) VALUES
(211, 0, '2020-07-12', 'Pay Test Due', '278', 'Gias Uddin', 0, 0, 0, 0, 0, 0),
(212, 0, '2020-07-12', 'Pay Test Due', '277', 'Masud Rana', 0, 0, 0, 0, 0, 0),
(213, 1, '2020-07-12', 'Sales Test', '277', 'Masud Rana', 500, 0, 0, 500, 0, 0),
(214, 2, '2020-07-12', 'Sales Test', '278', 'Gias Uddin', 900, 0, 0, 0, 900, 0),
(215, 3, '2020-07-12', 'Sales Test', '278', 'Gias Uddin', 100, 0, 0, 50, 50, 0),
(216, 0, '2020-07-12', 'Pay Test Due', '278', 'Gias Uddin', 0, 0, 0, 0, 0, 0),
(217, 0, '2020-07-12', 'Pay Test Due', '278', 'Gias Uddin', 0, 0, 0, 950, 0, 0),
(218, 4, '2020-07-12', 'Sales Test', '279', 'Nadia ', 500, 0, 0, 0, 500, 0),
(219, 5, '2020-07-12', 'Sales Test', '280', 'Saadman Alvy', 400, 0, 0, 0, 400, 0),
(220, 0, '2020-07-12', 'Pay Test Due', '280', 'Saadman Alvy', 0, 0, 0, 400, 0, 0),
(221, 6, '2020-07-13', 'Sales Test', '278', 'Gias Uddin', 400, 50, 0, 0, 350, 0),
(222, 7, '2020-07-13', 'Sales Test', '280', 'Saadman Alvy', 600, 0, 0, 0, 600, 0),
(224, 8, '2020-07-13', 'Sales Test', '278', 'Gias Uddin', 1500, 0, 0, 0, 1500, 0),
(225, 9, '2020-07-13', 'Sales Test', '277', 'Masud Rana', 400, 0, 0, 0, 400, 0),
(226, 10, '2020-07-13', 'Sales Test', '', '', 500, 99, 0, 0, 401, 0),
(227, 0, '2020-07-13', 'Pay Test Due', '278', 'Gias Uddin', 0, 0, 0, 1200, 650, 0),
(228, 11, '2020-07-14', 'Sales Test', '277', 'Masud Rana', 850, 0, 0, 0, 850, 0),
(229, 12, '2020-07-16', 'Sales Test', '281', 'Test Patient', 500, 0, 0, 500, 0, 0),
(230, 0, '2020-07-16', 'Pay Test Due', '280', 'Saadman Alvy', 0, 0, 0, 600, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `create_salary_sheet`
--

CREATE TABLE `create_salary_sheet` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(200) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `employee_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `salary_scale` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `create_salary_sheet`
--

INSERT INTO `create_salary_sheet` (`record_id`, `date`, `month`, `employee_id`, `employee_name`, `designation`, `account_no`, `salary_scale`) VALUES
(5, '2020-07-14', 'January 2020', '5', 'Soma Roy', 'Medical Promotion Officer(MPO)', '1223', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `create_sms`
--

CREATE TABLE `create_sms` (
  `record_id` int(11) NOT NULL,
  `create_date` varchar(200) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `body` varchar(10000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `record_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `death_report`
--

CREATE TABLE `death_report` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `patient_id` varchar(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `gender` text NOT NULL,
  `description` varchar(1000) NOT NULL,
  `doctor_id` varchar(200) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `record_id` int(11) NOT NULL,
  `department` varchar(500) NOT NULL,
  `sub_dept` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `record_id` int(11) NOT NULL,
  `designation` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`record_id`, `designation`) VALUES
(29, 'Managing Director'),
(30, 'Director'),
(33, 'Manager'),
(34, 'Medical Officer'),
(35, 'Medical Technologist(Lab. Medicine)'),
(36, 'Medical Technologist( Radiology & Imaging)'),
(38, 'Medical Promotion Officer(MPO)'),
(40, 'Laboratory Assistant'),
(42, 'MLSS'),
(43, 'Computer Operator'),
(44, 'Office Attendant'),
(45, 'MLSS'),
(46, 'MBBS,BCS(H)'),
(47, 'MBBS,BCS(H),EOCT(O/G)'),
(48, 'MBBS, EOCT (O/G)'),
(49, 'MBBS, BCS(H), FCPS(O/G), P-1'),
(50, 'MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)'),
(51, 'MBBS,BCS(H), FCPS(ENT), P-1'),
(52, 'MBBS, BCS(H),UH & FPO'),
(53, 'MBBS, BCS(H), EX. UH & FPO'),
(54, 'BPT(Dhaka),DPT(CRP)'),
(55, 'DMF(Dhaka)'),
(56, 'SACMO'),
(57, ' Diploma in paramedical'),
(58, 'RMP, P/C'),
(59, 'LMAF'),
(60, 'DPH, Pharmacist'),
(61, 'P/C'),
(62, 'SSN'),
(63, 'Midwife'),
(64, 'FWV'),
(65, 'DMA'),
(66, 'DMT (Dental)'),
(67, 'LMAFP'),
(68, 'DDT'),
(69, 'MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)'),
(70, 'MBBS,BCS(H), RMO-UHC,Tetulia'),
(71, 'Self'),
(72, 'Marketing officer'),
(73, 'MO-UHC-Tetulia.'),
(74, 'L.M.A.F, '),
(75, 'Dr.Md.Fozlul Haque,P/C'),
(76, 'Biochemist');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `name` varchar(200) NOT NULL,
  `record_id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `department` varchar(50) NOT NULL,
  `frees` int(200) NOT NULL,
  `doctors_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`name`, `record_id`, `designation`, `mobile`, `address`, `department`, `frees`, `doctors_time`) VALUES
('Dr.Md. Rukunuzzaman', 22, 'MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)', '+8801619180956', 'Mirpur1', '', 300, '16:00:00'),
('Dr. Md. Rezaul Bari', 23, 'MBBS, BCS(H), EX. UH & FPO', '+8801619180956', 'Mirpur1', '', 300, '09:00:00'),
('Dr.Md. Harun -Or-Rosid', 25, 'MBBS,BCS(H), FCPS(ENT), P-1', '+8801619180956', 'Mirpur1', '', 300, '16:00:00'),
('Dr. Md. Mahbubul Alam Bhuiyan', 32, 'MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)', '+8801619180956', 'Mirpur1', '', 300, '15:00:00'),
('Dr. Md. Raziul Haque,', 43, 'DMF(Dhaka)', '+8801619180956', 'Mirpur1', '', 200, '00:00:00'),
('Dr. Md.Shahidul Haque Mondol, ', 45, 'DMF(Dhaka)', '+8801619180956', 'Mirpur1', '', 200, '00:00:00'),
('Md. Abdus Sattar Khan', 47, 'RMP, P/C', '+8801619180956', 'Mirpur1', '', 200, '00:00:00'),
('Md. Abu Saidur Rahman Sayed', 48, 'RMP, P/C', '+8801619180956', 'Mirpur1', '', 200, '00:00:00'),
('Dentist. Md. Saeed Kabir.', 50, 'DMT (Dental)', '+8801619180956', 'Mirpur1', '', 200, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `staff_type` varchar(200) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `start_time` varchar(200) NOT NULL,
  `end_time` varchar(200) NOT NULL,
  `per_patient_time` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `record_id` int(12) NOT NULL,
  `expenditure_title` varchar(200) NOT NULL,
  `expenditure_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenditure`
--

INSERT INTO `expenditure` (`record_id`, `expenditure_title`, `expenditure_rate`) VALUES
(1, 'fdgsghfdhejdfgsd', 200),
(2, 'mnfgggh', 800);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `head` varchar(200) NOT NULL,
  `voucher_no` varchar(200) NOT NULL,
  `quantity` int(15) NOT NULL,
  `amount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`record_id`, `date`, `head`, `voucher_no`, `quantity`, `amount`) VALUES
(19, '2020-07-12', 'Stationary', '101', 1, 500),
(20, '2020-07-12', 'House Rent', '230089', 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `expense_head`
--

CREATE TABLE `expense_head` (
  `record_id` int(11) NOT NULL,
  `head` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense_head`
--

INSERT INTO `expense_head` (`record_id`, `head`) VALUES
(8, 'Tea Bill'),
(12, 'House Rent'),
(13, 'Stationary'),
(14, 'Paper Bill'),
(15, 'Rubber Stamp Seal'),
(16, 'Electric Bill');

-- --------------------------------------------------------

--
-- Table structure for table `generic_name`
--

CREATE TABLE `generic_name` (
  `record_id` int(11) NOT NULL,
  `generic_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `generic_name`
--

INSERT INTO `generic_name` (`record_id`, `generic_name`) VALUES
(1, 'Metronidazole'),
(2, 'Paracetamol'),
(3, 'Esomeprazole');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `head` varchar(200) NOT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `quantity` int(15) NOT NULL,
  `amount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`record_id`, `date`, `head`, `invoice_no`, `quantity`, `amount`) VALUES
(10, '2020-07-12', 'Wastage Product Sales', '501', 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `income_head`
--

CREATE TABLE `income_head` (
  `record_id` int(11) NOT NULL,
  `head` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `income_head`
--

INSERT INTO `income_head` (`record_id`, `head`) VALUES
(9, 'Bank Interest'),
(10, 'Wastage Product Sales');

-- --------------------------------------------------------

--
-- Table structure for table `insert_medicine_info`
--

CREATE TABLE `insert_medicine_info` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `medicine_name` varchar(500) NOT NULL,
  `types_of_medicine` varchar(500) NOT NULL,
  `medicine_presentation` varchar(500) NOT NULL,
  `generic_name` varchar(500) NOT NULL,
  `manufacture_company` varchar(500) NOT NULL,
  `store_type` varchar(500) NOT NULL,
  `unit_type` varchar(50) NOT NULL,
  `drug_indication` varchar(500) NOT NULL,
  `purchase_price` float NOT NULL,
  `selling_price` float NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_purchase_price` int(11) NOT NULL,
  `total_sales_price` int(11) NOT NULL,
  `reminder_level` int(11) NOT NULL,
  `medicine_shelf` varchar(200) NOT NULL,
  `shelf_details` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insert_medicine_info`
--

INSERT INTO `insert_medicine_info` (`record_id`, `date`, `medicine_name`, `types_of_medicine`, `medicine_presentation`, `generic_name`, `manufacture_company`, `store_type`, `unit_type`, `drug_indication`, `purchase_price`, `selling_price`, `total_qty`, `total_purchase_price`, `total_sales_price`, `reminder_level`, `medicine_shelf`, `shelf_details`, `image`, `expired_date`) VALUES
(2, '2019-01-12', 'Amodis 400', '', 'Tablet', 'Metronidazole', 'E-Store BD', '', 'Box', '', 10, 12, 10, 100, 120, 1, '', '', '2.jpg', '2019-01-31'),
(3, '2019-01-12', 'Paracetamol', '', 'Capsule', 'Paracetamol', 'E-Store BD', '', 'Box', '', 10, 12, 8, 100, 120, 1, '', '', '3.jpg', '2019-01-31'),
(4, '2019-01-23', 'Esomeprazole', '', 'Tablet', 'Esomeprazole', 'E-Store BD', '', 'Bottle', '', 1, 12, 10, 10, 120, 1, '', '', '4.jpg', '2018-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `insert_notice`
--

CREATE TABLE `insert_notice` (
  `record_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `particular` varchar(100) CHARACTER SET utf8 NOT NULL,
  `details` varchar(5000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `insert_product_info`
--

CREATE TABLE `insert_product_info` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `types_of_product` varchar(500) NOT NULL,
  `product_presentation` varchar(500) NOT NULL,
  `product_category` varchar(500) NOT NULL,
  `manufacture_company` varchar(500) NOT NULL,
  `store_type` varchar(500) NOT NULL,
  `unit_type` varchar(50) NOT NULL,
  `drug_indication` varchar(500) NOT NULL,
  `purchase_price` float NOT NULL,
  `selling_price` float NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_purchase_price` int(11) NOT NULL,
  `total_sales_price` int(11) NOT NULL,
  `reminder_level` int(11) NOT NULL,
  `medicine_shelf` varchar(200) NOT NULL,
  `shelf_details` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insert_product_info`
--

INSERT INTO `insert_product_info` (`record_id`, `date`, `product_name`, `types_of_product`, `product_presentation`, `product_category`, `manufacture_company`, `store_type`, `unit_type`, `drug_indication`, `purchase_price`, `selling_price`, `total_qty`, `total_purchase_price`, `total_sales_price`, `reminder_level`, `medicine_shelf`, `shelf_details`, `image`, `expired_date`) VALUES
(2, '2019-01-12', 'Sterile Surgical Gloves', '', '', 'Surgical Product', 'E-Store BD', '', 'Box', '', 10, 12, 10, 100, 120, 1, '', '', '2.jpg', '2019-01-31'),
(3, '2019-01-23', 'Sterile Surgical Gloves', '', '', 'Surgical Product', 'E-Store BD', '', 'Box', '', 1, 12, 10, 100, 120, 1, '', '', '3.jpg', '2019-01-31'),
(4, '2019-01-23', 'Sterile Surgical Gloves', '', '', 'Surgical Product', 'E-Store BD', '', 'Bottle', '', 1, 12, 10, 100, 120, 1, '', '', '4.jpg', '2019-01-31'),
(5, '2019-01-26', 'Nasacort OTC', '', '', 'Nasal Products', 'E-Store BD', '', 'meter (m)', '', 100, 120, 10, 1000, 1200, 1, '', '', '5.jpg', '2019-01-26'),
(6, '2019-07-03', 'Sterile Surgical Gloves', '', '', 'Surgical Product', 'Green Mart', '', 'meter (m)', '', 100, 150, 10, 1000, 1500, 5, '', '', '6.jpg', '2019-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_report`
--

CREATE TABLE `investigation_report` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `patient_id` varchar(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `doctor_id` varchar(200) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_report`
--

INSERT INTO `investigation_report` (`record_id`, `date`, `title`, `image`, `patient_id`, `patient_name`, `gender`, `description`, `doctor_id`, `doctor_name`, `status`) VALUES
(1, '2020-03-19', '', '1.jpg', '56', 'Ashim Kumar', 'female', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_id`
--

CREATE TABLE `invoice_id` (
  `record_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_product_use_in`
--

CREATE TABLE `lab_product_use_in` (
  `record_id` int(200) NOT NULL,
  `date` date NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `unit_price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab_product_use_in`
--

INSERT INTO `lab_product_use_in` (`record_id`, `date`, `product_name`, `qty`, `unit_price`, `total_price`) VALUES
(4, '2019-01-31', 'Bio Chemistry Analyzer', 1, 0, 0),
(5, '2019-01-31', 'Cell Counter Machine', 1, 0, 0),
(6, '2020-04-11', 'Sterile Surgical Gloves', 20, 5, 100),
(7, '2020-07-13', 'Glucose', 1, 4500, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `lab_product_use_out`
--

CREATE TABLE `lab_product_use_out` (
  `date` date NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `record_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab_product_use_out`
--

INSERT INTO `lab_product_use_out` (`date`, `product_name`, `qty`, `record_id`) VALUES
('2019-01-31', 'Bio Chemistry Analyzer', 1, 6),
('2019-02-03', 'Acetic acid', 1, 7),
('2020-04-11', 'Sterile Surgical Gloves', 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `liability_info`
--

CREATE TABLE `liability_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `liability_type` varchar(200) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `credit_debit` varchar(100) NOT NULL,
  `liability_from` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `balance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manufacture_company`
--

CREATE TABLE `manufacture_company` (
  `record_id` int(11) NOT NULL,
  `manufacture_company` varchar(500) NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `previous_due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacture_company`
--

INSERT INTO `manufacture_company` (`record_id`, `manufacture_company`, `mobile_no`, `address`, `previous_due`) VALUES
(1, 'Green Mart', '01719000000', 'Dhaka', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_name`
--

CREATE TABLE `medicine_name` (
  `record_id` int(11) NOT NULL,
  `medicine_name` varchar(500) NOT NULL,
  `generic_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_name`
--

INSERT INTO `medicine_name` (`record_id`, `medicine_name`, `generic_name`) VALUES
(6, 'Napa 500', 'Paracetamol'),
(7, 'Exium 20', 'Esomeprazole'),
(8, 'Amodis 400', 'Metronidazole');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_presentation`
--

CREATE TABLE `medicine_presentation` (
  `record_id` int(11) NOT NULL,
  `medicine_presentation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_presentation`
--

INSERT INTO `medicine_presentation` (`record_id`, `medicine_presentation`) VALUES
(6, 'Tablet'),
(7, 'Capsule'),
(8, 'Syrup'),
(9, 'Ointment');

-- --------------------------------------------------------

--
-- Table structure for table `new_msg`
--

CREATE TABLE `new_msg` (
  `record_id` int(11) NOT NULL,
  `news` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_msg`
--

INSERT INTO `new_msg` (`record_id`, `news`) VALUES
(20, 'testing khkak');

-- --------------------------------------------------------

--
-- Table structure for table `operation_category`
--

CREATE TABLE `operation_category` (
  `record_id` int(12) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operation_category`
--

INSERT INTO `operation_category` (`record_id`, `category_name`) VALUES
(21, 'Internel'),
(23, 'Orthopredic'),
(24, 'External');

-- --------------------------------------------------------

--
-- Table structure for table `operation_details`
--

CREATE TABLE `operation_details` (
  `record_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `anesthesia_id` int(11) NOT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `operation_date` date NOT NULL,
  `operation_price` float NOT NULL,
  `total_price` float NOT NULL,
  `sub_total` float NOT NULL,
  `payable_amount` float NOT NULL,
  `discount` float NOT NULL,
  `due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operation_details`
--

INSERT INTO `operation_details` (`record_id`, `patient_id`, `category_id`, `operation_id`, `doctor_id`, `anesthesia_id`, `diagnosis`, `operation_date`, `operation_price`, `total_price`, `sub_total`, `payable_amount`, `discount`, `due`) VALUES
(10, 277, 23, 142, 48, 47, 'abc', '2020-08-13', 6000, 7000, 7000, 7000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `operation_equipment`
--

CREATE TABLE `operation_equipment` (
  `record_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `expenditure_id` int(11) NOT NULL,
  `new_expenditure_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operation_equipment`
--

INSERT INTO `operation_equipment` (`record_id`, `invoice_id`, `expenditure_id`, `new_expenditure_price`) VALUES
(7, 10, 1, 200),
(8, 10, 2, 800);

-- --------------------------------------------------------

--
-- Table structure for table `operation_name`
--

CREATE TABLE `operation_name` (
  `record_id` int(12) NOT NULL,
  `category_id` int(11) NOT NULL,
  `operation_name` varchar(200) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operation_name`
--

INSERT INTO `operation_name` (`record_id`, `category_id`, `operation_name`, `rate`) VALUES
(138, 24, 'external head operation', 600),
(140, 21, 'piles operation', 15000),
(141, 23, 'finger broken operation', 5000),
(142, 23, 'leg broken operation', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `operation_report`
--

CREATE TABLE `operation_report` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `patient_id` varchar(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `gender` varchar(12) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `doctor_id` varchar(200) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation_report`
--

INSERT INTO `operation_report` (`record_id`, `date`, `title`, `patient_id`, `patient_name`, `gender`, `description`, `doctor_id`, `doctor_name`, `status`) VALUES
(1, '2019-01-24', 'Liver cancer', '6', 'Arif Khan', 'Male', ' The liver continuously filters blood that circulates through the body', '2', 'Dr.Ashik', 1),
(3, '2019-01-24', 'HIV/AIDS', '8', 'Saiful Abir', 'Male', 'Human immunodeficiency virus infection and acquired immune deficiency syndrome (HIV/AIDS)', '2', 'Dr.Ashik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `our_service`
--

CREATE TABLE `our_service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(1000) NOT NULL,
  `service_rate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `record_id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`record_id`, `unique_id`, `name`, `age`, `mobile`, `weight`, `height`, `address`) VALUES
(277, 0, 'Masud Rana', '45 Yrs', '01619180956', '70', '5.5\"', 'Mirpur1'),
(278, 0, 'Gias Uddin', '50 Yrs', '01619180956', '75', '6.00 F', 'Mirpur1'),
(280, 0, 'Saadman Alvy', '20', '+8801818234596', '70', '5 feet', '7/2 Khodadad Khan Road, Kushtia'),
(281, 0, 'Test Patient', '25', '+8801773080682', '65', '5.5\"', 'kolabagan');

-- --------------------------------------------------------

--
-- Table structure for table `patient_admission`
--

CREATE TABLE `patient_admission` (
  `record_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `department` varchar(200) NOT NULL,
  `room_no` varchar(200) NOT NULL,
  `total_day` int(11) NOT NULL,
  `single_day_price` float NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(300) NOT NULL,
  `doctor_name` varchar(500) NOT NULL,
  `age` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `discount` float NOT NULL,
  `sub_total` float NOT NULL,
  `pay` float NOT NULL,
  `due` float NOT NULL,
  `advance` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay_service_due`
--

CREATE TABLE `pay_service_due` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patient_id` varchar(300) NOT NULL,
  `patient_name` varchar(300) NOT NULL,
  `previous_due` float NOT NULL,
  `pay` float NOT NULL,
  `due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay_test_due`
--

CREATE TABLE `pay_test_due` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `patient_id` varchar(300) NOT NULL,
  `patient_name` varchar(300) NOT NULL,
  `previous_due` float NOT NULL,
  `pay` float NOT NULL,
  `due` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_test_due`
--

INSERT INTO `pay_test_due` (`record_id`, `date`, `patient_id`, `patient_name`, `previous_due`, `pay`, `due`) VALUES
(1, '2020-07-07', '73', 'Topu', 1300, 1300, 0),
(2, '2020-07-08', '82', 'Mokseda', 1000, 1000, 0),
(3, '2020-07-08', '78', 'Mokseda', 0, 1000, -1000),
(4, '2020-07-08', '81', 'Mokseda', 0, 1000, -1000),
(5, '2020-07-08', '103', 'Basudeb', 500, 500, 0),
(6, '2020-07-09', '105', 'Md. Forhad', 700, 700, 0),
(7, '2020-07-09', '105', 'Md. Forhad', 0, 0, 0),
(8, '2020-07-09', '107', 'Md.Mostofa', 0, 800, -800),
(9, '2020-07-09', '108', 'Md.Mozibor', 100, 50, 50),
(10, '2020-07-10', '163', 'Nazma', 1100, 950, 150),
(11, '2020-07-11', '214', 'Rahena +', 580, 450, 130),
(12, '2020-07-12', '268', 'Shahalom', 120, 120, 0),
(13, '2020-07-12', '276', 'Amena', 600, 600, 0),
(14, '2020-07-12', '274', 'Saidur Rahman', 600, 600, 0),
(15, '2020-07-12', '274', 'Saidur Rahman', 600, 600, 0),
(16, '2020-07-12', '278', 'Gias Uddin', 0, 0, 0),
(17, '2020-07-12', '277', 'Masud Rana', 0, 0, 0),
(18, '2020-07-12', '278', 'Gias Uddin', 950, 0, 0),
(19, '2020-07-12', '278', 'Gias Uddin', 950, 950, 0),
(20, '2020-07-12', '280', 'Saadman Alvy', 400, 400, 0),
(21, '2020-07-13', '278', 'Gias Uddin', 1850, 1200, 650),
(22, '2020-07-16', '280', 'Saadman Alvy', 600, 600, 0);

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE `photo_gallery` (
  `record_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`record_id`, `title`, `image`) VALUES
(1, 'Ultrasonography', '1.jpg'),
(2, 'Cardiac Test', '2.jpg'),
(3, 'Microbiology', '3.jpg'),
(4, 'Clinical Pathology', '4.jpg'),
(5, 'Immunological Test', '5.jpg'),
(6, 'Biochemical Test', '6.jpg'),
(7, 'sdafsfagddf', '3_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `record_id` int(11) NOT NULL,
  `prescription_id` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `dr_name` varchar(200) NOT NULL,
  `dr_mobile` varchar(50) NOT NULL,
  `designation` varchar(300) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `age` varchar(500) NOT NULL,
  `weight` varchar(500) NOT NULL,
  `height` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `per_day_dose` varchar(50) NOT NULL,
  `meal_type` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `no_of_days` varchar(50) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  `test_description` varchar(1000) NOT NULL,
  `test_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_name`
--

CREATE TABLE `product_name` (
  `record_id` int(11) NOT NULL,
  `product_category` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_name`
--

INSERT INTO `product_name` (`record_id`, `product_category`, `product_name`) VALUES
(2, 'Chemical', 'Acetic acid'),
(6, 'Laboratory Products', 'Bio Chemistry Analyzer'),
(7, 'Laboratory Products', 'Cell Counter Machine'),
(8, 'Surgical Product', 'Sterile Surgical Gloves'),
(9, 'Nasal Products', 'Nasacort OTC'),
(10, 'Nasal Products', 'Saline nasal spray'),
(11, 'Vitamin Supplements', 'Multivitamin'),
(12, 'Reagent', 'Glucose');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_medicine`
--

CREATE TABLE `purchase_medicine` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(500) NOT NULL,
  `medicine_name` varchar(500) NOT NULL,
  `manufacture_company` varchar(500) NOT NULL,
  `purchase_price` float NOT NULL,
  `selling_price` float NOT NULL,
  `medicine_qty` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_product`
--

CREATE TABLE `purchase_product` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `manufacture_company` varchar(500) NOT NULL,
  `purchase_price` float NOT NULL,
  `selling_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_biochemistry`
--

CREATE TABLE `report_biochemistry` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `referenced_by` varchar(200) NOT NULL,
  `bl_gl_fa` varchar(200) NOT NULL,
  `bl_gl_fa_sugar` varchar(200) NOT NULL,
  `bl_gl_2h` varchar(200) NOT NULL,
  `bl_gl_2h_sugar` varchar(200) NOT NULL,
  `bl_gl_1h_75` varchar(200) NOT NULL,
  `bl_gl_1h_75_sugar` varchar(200) NOT NULL,
  `bl_gl_2h_75` varchar(200) NOT NULL,
  `bl_gl_2h_75_sugar` varchar(200) NOT NULL,
  `se_cr` varchar(200) NOT NULL,
  `se_bi` varchar(200) NOT NULL,
  `se_bi_di` varchar(200) NOT NULL,
  `se_bi_in` varchar(200) NOT NULL,
  `sopt` varchar(200) NOT NULL,
  `se_ur_ac` varchar(200) NOT NULL,
  `se_ca` varchar(200) NOT NULL,
  `se_am` varchar(200) NOT NULL,
  `sgpt` varchar(200) NOT NULL,
  `se_al_ph` varchar(200) NOT NULL,
  `se_ur` varchar(200) NOT NULL,
  `hba1c` varchar(200) NOT NULL,
  `se_ch` varchar(200) NOT NULL,
  `tri_gl` varchar(200) NOT NULL,
  `hdl` varchar(200) NOT NULL,
  `ldl` varchar(200) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `sodium` varchar(200) NOT NULL,
  `potassium` varchar(200) NOT NULL,
  `chloride` varchar(200) NOT NULL,
  `OGTT` varchar(200) NOT NULL,
  `lipid_profile` varchar(200) NOT NULL,
  `urea_nitrogen` varchar(200) NOT NULL,
  `se_albumin` varchar(200) NOT NULL,
  `se_globulin` varchar(200) NOT NULL,
  `se_protein` varchar(200) NOT NULL,
  `se_lipase` varchar(200) NOT NULL,
  `RBS` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_biochemistry`
--

INSERT INTO `report_biochemistry` (`record_id`, `patient_id`, `patient_name`, `date`, `age`, `sex`, `referenced_by`, `bl_gl_fa`, `bl_gl_fa_sugar`, `bl_gl_2h`, `bl_gl_2h_sugar`, `bl_gl_1h_75`, `bl_gl_1h_75_sugar`, `bl_gl_2h_75`, `bl_gl_2h_75_sugar`, `se_cr`, `se_bi`, `se_bi_di`, `se_bi_in`, `sopt`, `se_ur_ac`, `se_ca`, `se_am`, `sgpt`, `se_al_ph`, `se_ur`, `hba1c`, `se_ch`, `tri_gl`, `hdl`, `ldl`, `test_inserted_id`, `report_date`, `sodium`, `potassium`, `chloride`, `OGTT`, `lipid_profile`, `urea_nitrogen`, `se_albumin`, `se_globulin`, `se_protein`, `se_lipase`, `RBS`) VALUES
(1, 65, 'Bidhan Krishna Samanta', '2020-07-06', '36  Yrs', 'Male', 'Dr.Md.Mahbubul Alam Bhuiyan [Medical Officer ]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '5.6', '', '', '', '', 2, '2020-07-06', '', '', '', '', '', '', '', '', '', '', ''),
(2, 105, 'Md. Forhad', '2020-07-09', '25years', '', 'Dr.Md. Abul Bashar [SACMO]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '138.0', '113.9', '33.3', '81.9', 8, '2020-07-09', '', '', '', '', '', '', '', '', '', '', ''),
(3, 202, 'Rupia Khatun', '2020-07-11', '35 Yrs.', 'Female', 'Dr. Md. Mostafizur Rahman [LMAF]', '', '', '', '', '', '', '', '', '', '0.7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 11, '2020-07-11', '', '', '', '', '', '', '', '', '', '', ''),
(4, 250, 'Md. Abdul Hamid', '2020-07-11', '54 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '', '', '', '', '', '', '', '', '1.0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 19, '2020-07-11', '', '', '', '', '', '', '', '', '', '', ''),
(5, 278, 'Gias Uddin', '2020-07-12', '50 Yrs', 'Male', 'Dr. Md. Raziul Haque, [DMF(Dhaka)]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '6', '', '', '', '', 29, '2020-07-12', '', '', '', '', '', '', '', '', '', '', ''),
(6, 279, 'Nadia ', '2020-07-12', '4 yrs', 'Female', 'Dr. Md. Mahbubul Alam Bhuiyan [MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 30, '2020-07-12', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `report_blood_group`
--

CREATE TABLE `report_blood_group` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(100) NOT NULL,
  `patient_name` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `referenced_by` varchar(10) NOT NULL,
  `ABO_group` varchar(10) NOT NULL,
  `Rh_type` varchar(10) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_cross_matching`
--

CREATE TABLE `report_cross_matching` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `referenced_by` varchar(200) NOT NULL,
  `ABO_group` varchar(200) NOT NULL,
  `Rh_type` varchar(200) NOT NULL,
  `doner_name` varchar(200) NOT NULL,
  `doner_abo` varchar(200) NOT NULL,
  `rh_types` varchar(200) NOT NULL,
  `cross_matching` varchar(200) NOT NULL,
  `age_d` varchar(200) NOT NULL,
  `sex_d` varchar(200) NOT NULL,
  `scr_test` varchar(200) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_crp_aso`
--

CREATE TABLE `report_crp_aso` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `referenced_by` varchar(200) NOT NULL,
  `ASO` varchar(200) NOT NULL,
  `CRP` varchar(200) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_haematology`
--

CREATE TABLE `report_haematology` (
  `record_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `referenced_by` varchar(300) NOT NULL,
  `hemoglobin` varchar(200) NOT NULL,
  `esr` varchar(200) NOT NULL,
  `total_wbc` varchar(200) NOT NULL,
  `neutrophils` varchar(200) NOT NULL,
  `lymphocytes` varchar(200) NOT NULL,
  `monocytes` varchar(200) NOT NULL,
  `eosinophils` varchar(200) NOT NULL,
  `basophils` varchar(200) NOT NULL,
  `others_cell` varchar(200) NOT NULL,
  `total_eosinophils` varchar(200) NOT NULL,
  `platelet_count` varchar(200) NOT NULL,
  `mpv` varchar(200) NOT NULL,
  `pdw` varchar(200) NOT NULL,
  `pct` varchar(200) NOT NULL,
  `rbc_count` varchar(200) NOT NULL,
  `hct_pcv` varchar(200) NOT NULL,
  `mcv` varchar(200) NOT NULL,
  `mch` varchar(200) NOT NULL,
  `mchc` varchar(200) NOT NULL,
  `rdw_cv` varchar(200) NOT NULL,
  `rdw_sd` varchar(200) NOT NULL,
  `p_lcr` varchar(200) NOT NULL,
  `bt` varchar(200) NOT NULL,
  `ct` varchar(200) NOT NULL,
  `hb_cyan` varchar(200) NOT NULL,
  `pbf` varchar(2000) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `note` varchar(2000) NOT NULL,
  `report_date` date NOT NULL,
  `mp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_haematology`
--

INSERT INTO `report_haematology` (`record_id`, `patient_id`, `patient_name`, `date`, `age`, `sex`, `referenced_by`, `hemoglobin`, `esr`, `total_wbc`, `neutrophils`, `lymphocytes`, `monocytes`, `eosinophils`, `basophils`, `others_cell`, `total_eosinophils`, `platelet_count`, `mpv`, `pdw`, `pct`, `rbc_count`, `hct_pcv`, `mcv`, `mch`, `mchc`, `rdw_cv`, `rdw_sd`, `p_lcr`, `bt`, `ct`, `hb_cyan`, `pbf`, `test_inserted_id`, `note`, `report_date`, `mp`) VALUES
(1, 65, 'Bidhan Krishna Samanta', '2020-07-06', '36  Yrs', 'Male', 'Dr.Md.Mahbubul Alam Bhuiyan [Medical Officer ]', '12.5', '20', '7.8', '55', '40', '02', '03', '00', '00', '', '244', '9.5', '13.6', '0.29', '4.5', '38.4', '76.0', '27.3', '32.0', '12.5', '40.5', '38.0', '', '', '', '', 1, '', '2020-07-06', ''),
(2, 70, 'roni', '2020-07-07', '10 Ys.', '', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '', '', '', '', '', '', '', '', '', '', '220', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '', '2020-07-07', ''),
(3, 75, 'topu', '2020-07-07', '20 Yrs.', '', 'Dr. Md. Rezaul Bari [MBBS, BCS(H), EX. UH & FPO]', '12.5', '', '12.5', '55', '40', '', '', '', '', '', '', '', '', '', '3.9', '38', '75', '28', '33', '12', '42', '', '', '', '', '', 4, '', '2020-07-07', ''),
(4, 103, 'Basudeb', '2020-07-08', '28 Yrs.', 'Male', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '12.5', '20', '7.8', '55', '40', '02', '03', '00', '00', '', '244', '9.5', '13.6', '0.29', '4.8', '38.4', '76.0', '27.3', '32.0', '12.5', '40.5', '38.0', '', '', '', '', 5, '', '2020-07-08', ''),
(5, 107, 'Md.Mostofa', '2020-07-09', '19 Years', 'Male', 'Dr. Easer Habib [MBBS,BCS(H)]', '16.1', '20', '6.4', '56', '35', '04', '05', '00', '00', '', '113', '12.2', '17.3', '0.14', '5.5', '47.0', '84.1', '28.8', '34.3', '12.1', '39.2', '42.4', '', '', '', '', 8, '', '2020-07-09', ''),
(6, 134, 'Jui', '2020-07-09', '19 Yrs.', 'Female', 'Mrs. Shahera Khatun [SSN]', ' ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11.6 gm/dl 71 %', '', 9, '', '2020-07-09', ''),
(7, 163, 'Nazma', '2020-07-10', '28 Yrs.', 'Female', 'Dr. Md. Rezaul Bari [MBBS, BCS(H), EX. UH & FPO]', '13.6', '30', '9.6', '56', '35', '04', '05', '00', '', '', '', '', '', '', '4.6', '40.3', '87.4', '29.5', '33.7', '12.7', '43.9', '', '', '', '', '', 10, '', '2020-07-10', ''),
(8, 244, 'Mozaffar Hossain', '2020-07-11', '42 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '14.0', '15', '6.2', '34', '56', '04', '06', '00', '00', '', '189', '10.5', '14.7', '0.20', '5.2', '41.7', '79.7', '26.8', '33.6', '12.6', '38.4', '30.8', '', '', '', '', 24, '', '2020-07-11', ''),
(9, 278, 'Gias Uddin', '2020-07-13', '50 Yrs', '', 'Md. Abdus Sattar Khan', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '5', '8', '', '', '', '', '', '', '', '', '', '', 30, '', '2020-07-13', ''),
(10, 277, 'Masud Rana', '2020-07-14', '45 Yrs', 'Male', 'Dr.Md. Harun -Or-Rosid [MBBS,BCS(H), FCPS(ENT), P-1]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 31, '', '2020-07-14', ''),
(11, 277, 'Masud Rana', '2020-07-14', '45 Yrs', '', 'Dr.Md. Harun -Or-Rosid [MBBS,BCS(H), FCPS(ENT), P-1]', '7.5', '', '', '', '', '5', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 32, '', '2020-07-14', ''),
(12, 281, 'Test Patient', '2020-07-16', '25', 'Male', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25', '', '', '', '22', '', '', '', '', '', '', '', 33, '', '2020-07-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `report_immunology`
--

CREATE TABLE `report_immunology` (
  `record_id` int(50) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` int(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `referenced_by` varchar(10) NOT NULL,
  `HbA1c` varchar(200) NOT NULL,
  `TSH` varchar(200) NOT NULL,
  `T4` varchar(200) NOT NULL,
  `T3` varchar(200) NOT NULL,
  `Troponin_I` varchar(200) NOT NULL,
  `CRP` varchar(200) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `FT3` varchar(200) NOT NULL,
  `FT4` varchar(200) NOT NULL,
  `se_ige` varchar(200) NOT NULL,
  `se_igg` varchar(200) NOT NULL,
  `se_prolectin` varchar(200) NOT NULL,
  `psa` varchar(200) NOT NULL,
  `testosterone` varchar(200) NOT NULL,
  `hcg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_kidney_profile`
--

CREATE TABLE `report_kidney_profile` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `referenced_by` varchar(200) NOT NULL,
  `bun` varchar(200) NOT NULL,
  `serum_urea` varchar(200) NOT NULL,
  `serum_creatinine` varchar(200) NOT NULL,
  `serum_uric_acid` varchar(200) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_liver_function`
--

CREATE TABLE `report_liver_function` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `referenced_by` varchar(10) NOT NULL,
  `serum_bilirubin_total` varchar(10) NOT NULL,
  `SGPT` varchar(100) NOT NULL,
  `AST` varchar(200) NOT NULL,
  `alkaline_phos` varchar(100) NOT NULL,
  `control` varchar(100) NOT NULL,
  `patient` varchar(100) NOT NULL,
  `INR` varchar(100) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_mt`
--

CREATE TABLE `report_mt` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `referenced_by` varchar(100) NOT NULL,
  `MT` varchar(100) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_pregnancy_test`
--

CREATE TABLE `report_pregnancy_test` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `referenced_by` varchar(100) NOT NULL,
  `pregnancy_test` varchar(10) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_semen_analysis_report`
--

CREATE TABLE `report_semen_analysis_report` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `referenced_by` varchar(50) NOT NULL,
  `Amount` varchar(200) NOT NULL,
  `Colour` varchar(200) NOT NULL,
  `Viscosity` varchar(200) NOT NULL,
  `TC_of_Sperm` varchar(200) NOT NULL,
  `Active_Motile` varchar(200) NOT NULL,
  `Weakly_Motile` varchar(200) NOT NULL,
  `Non_Motile` varchar(200) NOT NULL,
  `Morphologically_Normal` varchar(200) NOT NULL,
  `Morphologically_Abnormal` varchar(200) NOT NULL,
  `Pus_Cell` varchar(200) NOT NULL,
  `Epithelial_Cell` varchar(200) NOT NULL,
  `RBC` varchar(200) NOT NULL,
  `Fructose` varchar(200) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `collection_place` varchar(200) NOT NULL,
  `ejaculation_time` varchar(200) NOT NULL,
  `examination_time` varchar(200) NOT NULL,
  `abstinence_period` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_serological`
--

CREATE TABLE `report_serological` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `referenced_by` varchar(50) NOT NULL,
  `RA_Test` varchar(200) NOT NULL,
  `CRP` varchar(200) NOT NULL,
  `HBsAg` varchar(200) NOT NULL,
  `VDRL` varchar(200) NOT NULL,
  `Blood_group` varchar(200) NOT NULL,
  `Widal_Test` varchar(200) NOT NULL,
  `ASO_Titre` varchar(200) NOT NULL,
  `Typhoid_Paratyphoid` varchar(200) NOT NULL,
  `Typhus_Fever` varchar(200) NOT NULL,
  `Brucellosis` varchar(200) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL,
  `HBsAg_con` varchar(200) NOT NULL,
  `TPHA` varchar(200) NOT NULL,
  `Aldehyde` varchar(200) NOT NULL,
  `Typhoid` varchar(200) NOT NULL,
  `TB` varchar(200) NOT NULL,
  `Failaria` varchar(200) NOT NULL,
  `Kala_Azar` varchar(200) NOT NULL,
  `Malaria` varchar(200) NOT NULL,
  `HIV` varchar(200) NOT NULL,
  `HCV` varchar(200) NOT NULL,
  `Dengu_ns1` varchar(200) NOT NULL,
  `Dengu_igg_igm` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_serological`
--

INSERT INTO `report_serological` (`record_id`, `patient_id`, `patient_name`, `date`, `age`, `sex`, `referenced_by`, `RA_Test`, `CRP`, `HBsAg`, `VDRL`, `Blood_group`, `Widal_Test`, `ASO_Titre`, `Typhoid_Paratyphoid`, `Typhus_Fever`, `Brucellosis`, `test_inserted_id`, `report_date`, `HBsAg_con`, `TPHA`, `Aldehyde`, `Typhoid`, `TB`, `Failaria`, `Kala_Azar`, `Malaria`, `HIV`, `HCV`, `Dengu_ns1`, `Dengu_igg_igm`) VALUES
(1, 104, 'Abdus Samad', '2020-07-09', '65', 'Male', 'Dr. Md. Rayhan Kabir [MBBS,BCS(H)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 6, '2020-07-09', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 104, 'Abdus Samad', '2020-07-09', '65', 'Male', 'Dr. Md. Rayhan Kabir [MBBS,BCS(H)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 7, '2020-07-09', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 164, 'Tahera', '2020-07-10', '55yrs', 'Female', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 11, '2020-07-10', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 164, 'Tahera', '2020-07-10', '55yrs', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 12, '2020-07-10', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 170, 'Habubur', '2020-07-10', '28 Yrs.', '', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(', '', '', 'Neagtive', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 14, '2020-07-10', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 169, 'Habubur', '2020-07-10', '28 Yrs.', '', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '200', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 15, '2020-07-10', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 170, 'Habubur', '2020-07-10', '28 Yrs.', '', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(', 'Negative', '', 'Negative', 'Non-reactive', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 16, '2020-07-10', '', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 'Negative', '', '', '', ''),
(8, 170, 'Habubur', '2020-07-10', '28 Yrs.', '', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(', '', '', 'Neagtive', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 17, '2020-07-10', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 214, 'Rahena +', '2020-07-11', '28 Yrs.', 'Female', 'Mrs. Shahera Khatun [SSN]', '', '', '', '', 'O (+ve)', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 13, '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 235, 'Arobi', '2020-07-11', '15 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 16, '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 235, 'Arobi', '2020-07-11', '15 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', '\r\n                ', '\r\n                ', '\r\n          ', 17, '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 235, 'Arobi', '2020-07-11', '15 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', '', '', '', 18, '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 246, 'Mozaffar Hossain', '2020-07-11', '42 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 21, '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 246, 'Mozaffar Hossain', '2020-07-11', '42 Yrs.', 'Male', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', 'TO-1:320   TH-1:160\r\nAH-1:80     BH-1:80\r\nAO-1:80     BO-1:80\r\n                ', 'Proteus OXK      1:40\r\nProteus OX2      1:40\r\nProteus OX19    1:40\r\n                ', 'Brucella Abortus       1:40\r\nBrucella Melitansis   1:40\r\n                ', 25, '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 246, 'Mozaffar Hossain', '2020-07-11', '42 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '', '', '', '', '', 'TO-1:80   TH-1:80\r\nAH-1:80   BH-1:80\r\nAO-1:80   BO-1:80\r\n                ', '', '', '', '', 26, '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `report_skin_scraping`
--

CREATE TABLE `report_skin_scraping` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `referenced_by` varchar(50) NOT NULL,
  `SKIN` varchar(2000) NOT NULL,
  `THROAT` varchar(2000) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_stool_rme`
--

CREATE TABLE `report_stool_rme` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `referenced_by` varchar(10) NOT NULL,
  `consistency` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `blood` varchar(200) NOT NULL,
  `mucus` varchar(200) NOT NULL,
  `worm` varchar(200) NOT NULL,
  `reaction` varchar(200) NOT NULL,
  `reducing_substance` varchar(200) NOT NULL,
  `occult_blood` varchar(200) NOT NULL,
  `ascaris` varchar(200) NOT NULL,
  `ankylostoma` varchar(200) NOT NULL,
  `trichuris` varchar(200) NOT NULL,
  `giardia` varchar(200) NOT NULL,
  `e_histolytica` varchar(200) NOT NULL,
  `e_coli` varchar(200) NOT NULL,
  `vegetable_cells` varchar(200) NOT NULL,
  `epithelial_cells` varchar(200) NOT NULL,
  `pus_cells` varchar(200) NOT NULL,
  `RBC` varchar(200) NOT NULL,
  `fat_globules` varchar(200) NOT NULL,
  `muscle_cells` varchar(200) NOT NULL,
  `starch_granules` varchar(200) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_urinerme`
--

CREATE TABLE `report_urinerme` (
  `record_id` int(200) NOT NULL,
  `patient_id` int(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(200) NOT NULL,
  `referenced_by` varchar(200) NOT NULL,
  `report_date` date NOT NULL,
  `Colour` varchar(200) NOT NULL,
  `Appearance` varchar(200) NOT NULL,
  `Sediment` varchar(200) NOT NULL,
  `Specific_gravity` varchar(200) NOT NULL,
  `PH` varchar(200) NOT NULL,
  `Protein` varchar(200) NOT NULL,
  `Reducing_Substance` varchar(200) NOT NULL,
  `Ex_Phosphate` varchar(200) NOT NULL,
  `Ketones` varchar(200) NOT NULL,
  `Bilirubin` varchar(200) NOT NULL,
  `Urobilinogen` varchar(200) NOT NULL,
  `Nitrate` varchar(200) NOT NULL,
  `Blood` varchar(200) NOT NULL,
  `Leukocyte` varchar(200) NOT NULL,
  `Epithelial_Cell` varchar(200) NOT NULL,
  `Pus_Cell` varchar(200) NOT NULL,
  `RBC` varchar(200) NOT NULL,
  `Hyaline` varchar(200) NOT NULL,
  `Granular` varchar(200) NOT NULL,
  `WBC` varchar(200) NOT NULL,
  `RBC_cast` varchar(200) NOT NULL,
  `Calcium_Oxalate` varchar(200) NOT NULL,
  `Amor_Phosphate` varchar(200) NOT NULL,
  `Triple_Phosphate` varchar(200) NOT NULL,
  `Uric_Acid` varchar(200) NOT NULL,
  `pregnancy` varchar(500) NOT NULL,
  `test_inserted_id` int(11) NOT NULL,
  `Photocoagulation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_urinerme`
--

INSERT INTO `report_urinerme` (`record_id`, `patient_id`, `patient_name`, `date`, `age`, `sex`, `referenced_by`, `report_date`, `Colour`, `Appearance`, `Sediment`, `Specific_gravity`, `PH`, `Protein`, `Reducing_Substance`, `Ex_Phosphate`, `Ketones`, `Bilirubin`, `Urobilinogen`, `Nitrate`, `Blood`, `Leukocyte`, `Epithelial_Cell`, `Pus_Cell`, `RBC`, `Hyaline`, `Granular`, `WBC`, `RBC_cast`, `Calcium_Oxalate`, `Amor_Phosphate`, `Triple_Phosphate`, `Uric_Acid`, `pregnancy`, `test_inserted_id`, `Photocoagulation`) VALUES
(1, 164, 'Tahera', '2020-07-10', '55yrs', 'Male', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '2020-07-10', 'Straw', 'Clear', 'Absent', '1.025', '6.5', 'Absent', 'Absent', 'Absent', 'Absent', 'Not done', 'Not done', 'Not done', '', '', '00-02', '00-02', 'Nil', 'Nil', 'Nil', 'Nil', 'Nil', 'Nil', 'Nil', 'Nil', 'Nil', '', 13, ''),
(2, 202, 'Rupia Khatun', '2020-07-11', '35 Yrs.', 'Female', 'Dr. Md. Mostafizur Rahman [LMAF]', '2020-07-11', 'Straw', 'Clear', 'Absent', '1.010', '6.0', 'Absent', 'Absent', 'Absent', 'Absent', 'Absent', 'Absent', 'Absent', '', '', '02-03', '00-03', 'Nil', 'Absent', 'Absent', '', 'Absent', 'Absent', 'Absent', 'Absent', '', '', 12, ''),
(3, 202, 'Rupia Khatun', '2020-07-11', '35 Yrs.', 'Female', 'Dr. Md. Mostafizur Rahman [LMAF]', '2020-07-11', 'Straw', 'Clear', 'Absent', '1.010', '6.0', 'Absent', 'Absent', 'Absent', 'Absent', 'Not Done', 'Not Done', 'Not Done', '', '', '02-03', '00-03', 'Nil', 'Absent', 'Absent', '', 'Absent', 'Absent', 'Absent', 'Absent', '', '', 13, ''),
(4, 202, 'Rupia Khatun', '2020-07-11', '35 Yrs.', 'Female', 'Dr. Md. Mostafizur Rahman [LMAF]', '2020-07-11', 'Straw', 'Clear', 'Absent', '1.010', '6.0', 'Absent', 'Absent', 'Absent', 'Absent', 'Not Done', 'Not Done', 'Not Done', '', '', '02-03', '00-03', 'Absent ', 'Absent', 'Absent', '', 'Absent', 'Absent', 'Absent', 'Absent', '', '', 12, ''),
(5, 202, 'Rupia Khatun', '2020-07-11', '35 Yrs.', 'Female', 'Dr. Md. Mostafizur Rahman [LMAF]', '2020-07-11', 'Straw', 'Clear', 'Absent', '1.010', '6.0', 'Absent', 'Absent', 'Absent', 'Absent', 'Not Done', 'Not Done', 'Not Done', '', '', '02-03', '00-03', 'Absent ', 'Absent', 'Absent', '', 'Absent', '', 'Absent', 'Absent', '', '', 12, ''),
(6, 233, 'Anjuna', '2020-07-11', '20 Yrs.', 'Female', 'Md. Shahinur Rahman Sagor [RMP, P/C]', '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Negativer ', 14, ''),
(7, 233, 'Anjuna', '2020-07-11', '20 Yrs.', 'Female', 'Md. Shahinur Rahman Sagor [RMP, P/C]', '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Negative ', 14, ''),
(8, 233, 'Anjuna', '2020-07-11', '20 Yrs.', 'Female', 'Md. Shahinur Rahman Sagor [RMP, P/C]', '2020-07-11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Negative ', 15, ''),
(9, 251, 'Md. Abdul Hamid', '2020-07-11', '54 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '2020-07-11', 'Straw', 'Clear', 'Absent', '1.010', '6.0', 'Absent', 'Absent', 'Absent', 'Absent', 'Not Done', 'Not Done', 'Not Done', '', '', '00-02', '00-03', 'Absent ', 'Absent', 'Absent', '', 'Absent', 'Absent', 'Absent', 'Absent', '', '', 20, ''),
(10, 251, 'Md. Abdul Hamid', '2020-07-11', '54 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '2020-07-11', 'Straw', 'Clear', 'Absent', '1.010', '6.0', 'Absent', 'Absent', 'Absent', 'Not Done ', 'Not Done', 'Not Done', 'Not Done', '', '', '00-02', '00-03', 'Absent ', 'Absent', 'Absent', '', 'Absent', 'Absent', 'Absent', 'Absent', '', '', 22, ''),
(11, 245, 'Mozaffar Hossain', '2020-07-11', '42 Yrs.', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', '2020-07-11', 'Straw', 'Clear', 'Absent', '1.010', '6.0', 'Absent', 'Absent', 'Absent', 'Not Done ', 'Not Done', 'Not Done', 'Not Done', '', '', '00-02', '00-03', 'Absent ', 'Absent', 'Absent', '', 'Absent', 'Absent', 'Absent', 'Absent', '', '', 23, ''),
(12, 255, 'Jomir Hosen', '2020-07-11', '32 Yrs.', 'Male', 'Dr. Arifa Begum Promi [MBBS,BCS(H)]', '2020-07-11', 'Straw', 'Clear', 'Absent', '1.015', '6.0', 'Absent', 'Absent', 'Not Done ', 'Not Done ', 'Not Done', 'Not Done', 'Not Done', '', '', '00-02', '01-02', 'Absent ', 'Absent', 'Absent', '', 'Absent', 'Absent', 'Absent', 'Absent', '', '', 27, ''),
(13, 265, 'Taifa', '2020-07-12', '6yrs', 'Female', 'Dr. Md.Shahidul Haque Mondol,  [DMF(Dhaka)]', '2020-07-12', 'Straw', 'Clear', 'Absent', '1.015', '6.0', 'Absent', 'Absent', 'Not Done ', 'Not Done ', 'Not Done', 'Not Done', 'Not Done', '', '', '00-02', '00-03', ' Nil', 'Absent', 'Absent', '', 'Absent', 'Absent', 'Absent', 'Absent', '', '', 28, '');

-- --------------------------------------------------------

--
-- Table structure for table `returned_product_info`
--

CREATE TABLE `returned_product_info` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(1000) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `returned_qty` int(100) NOT NULL,
  `returned_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `record_id` int(11) NOT NULL,
  `room_no` varchar(300) NOT NULL,
  `floor_no` varchar(1000) NOT NULL,
  `department` varchar(200) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `room_condition` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`record_id`, `room_no`, `floor_no`, `department`, `room_type`, `room_condition`, `status`) VALUES
(3, '1001', '1st Floor', 'General Surgery', 'Cabin', 'AC', 0),
(4, '1002', '1st Floor', 'General Surgery', 'General Bed', 'Non AC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_due`
--

CREATE TABLE `sales_due` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(300) CHARACTER SET utf8 NOT NULL,
  `client_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `client_id` varchar(500) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `delete_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_service`
--

CREATE TABLE `sales_service` (
  `record_id` int(12) NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(12) NOT NULL,
  `patient_name` varchar(300) NOT NULL,
  `doctor_name` varchar(300) NOT NULL,
  `age` int(12) NOT NULL,
  `mobile` int(12) NOT NULL,
  `service` varchar(300) NOT NULL,
  `service_price` float NOT NULL,
  `amount` float NOT NULL,
  `discount` float NOT NULL,
  `sub_total` float NOT NULL,
  `pay` float NOT NULL,
  `due` float NOT NULL,
  `advance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_test`
--

CREATE TABLE `sales_test` (
  `record_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(300) NOT NULL,
  `doctor_name` varchar(500) NOT NULL,
  `age` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `test_category` varchar(200) NOT NULL,
  `test_name` varchar(500) NOT NULL,
  `test_price` float NOT NULL,
  `amount` float NOT NULL,
  `discount` float NOT NULL,
  `sub_total` float NOT NULL,
  `pay` float NOT NULL,
  `due` float NOT NULL,
  `advance` float NOT NULL,
  `doctor_commission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_test`
--

INSERT INTO `sales_test` (`record_id`, `invoice_no`, `date`, `patient_id`, `patient_name`, `doctor_name`, `age`, `mobile`, `test_category`, `test_name`, `test_price`, `amount`, `discount`, `sub_total`, `pay`, `due`, `advance`, `doctor_commission`) VALUES
(412, 1, '2020-07-12', 277, 'Masud Rana', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '45 Yrs', '01619180956', 'Haematology', 'CBC with ESR', 400, 500, 0, 500, 500, 0, 0, 100),
(413, 1, '2020-07-12', 277, 'Masud Rana', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '45 Yrs', '01619180956', 'Haematology', 'Total Circulating Eosinophils', 100, 500, 0, 500, 500, 0, 0, 20),
(414, 2, '2020-07-12', 278, 'Gias Uddin', 'Dr. Md. Rezaul Bari [MBBS, BCS(H), EX. UH & FPO]', '50 Yrs', '01619180956', 'Biochemistry', 'FBS/RBS/2HABF', 100, 900, 0, 900, 0, 900, 0, 20),
(415, 2, '2020-07-12', 278, 'Gias Uddin', 'Dr. Md. Rezaul Bari [MBBS, BCS(H), EX. UH & FPO]', '50 Yrs', '01619180956', 'Biochemistry', 'HbA1c', 800, 900, 0, 900, 0, 900, 0, 200),
(416, 3, '2020-07-12', 278, 'Gias Uddin', 'Dr. Md. Raziul Haque, [DMF(Dhaka)]', '50 Yrs', '01619180956', 'Biochemistry', 'FBS/RBS/2HABF', 100, 100, 0, 100, 50, 50, 0, 50),
(417, 4, '2020-07-12', 279, 'Nadia ', 'Dr. Md. Mahbubul Alam Bhuiyan [MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)]', '4 yrs', '01713927578', 'Biochemistry', 'Serum Creatinine', 300, 500, 0, 500, 0, 500, 0, 0),
(418, 4, '2020-07-12', 279, 'Nadia ', 'Dr. Md. Mahbubul Alam Bhuiyan [MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)]', '4 yrs', '01713927578', 'Biochemistry', 'Serum Bilirubin (Total)', 200, 500, 0, 500, 0, 500, 0, 0),
(419, 5, '2020-07-12', 280, 'Saadman Alvy', 'Dr. Md. Mahbubul Alam Bhuiyan [MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)]', '20', '+8801818234596', 'Haematology', 'Total Platelet count', 100, 400, 0, 400, 0, 400, 0, 0),
(420, 5, '2020-07-12', 280, 'Saadman Alvy', 'Dr. Md. Mahbubul Alam Bhuiyan [MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)]', '20', '+8801818234596', 'Haematology', 'TC/DC/ESR/HB', 200, 400, 0, 400, 0, 400, 0, 0),
(421, 5, '2020-07-12', 280, 'Saadman Alvy', 'Dr. Md. Mahbubul Alam Bhuiyan [MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)]', '20', '+8801818234596', 'Haematology', 'Hb%', 50, 400, 0, 400, 0, 400, 0, 0),
(422, 5, '2020-07-12', 280, 'Saadman Alvy', 'Dr. Md. Mahbubul Alam Bhuiyan [MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)]', '20', '+8801818234596', 'Haematology', 'Hb%', 50, 400, 0, 400, 0, 400, 0, 150),
(423, 6, '2020-07-13', 278, 'Gias Uddin', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '50 Yrs', '01619180956', 'Haematology', 'CBC with ESR', 400, 400, 50, 350, 0, 350, 0, 100),
(424, 7, '2020-07-13', 280, 'Saadman Alvy', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '20', '+8801818234596', 'Haematology', 'TC/DC/ESR/HB', 200, 600, 0, 600, 0, 600, 0, 10),
(425, 7, '2020-07-13', 280, 'Saadman Alvy', 'Dr. Md. Rezaul Bari [MBBS, BCS(H), EX. UH & FPO]', '20', '+8801818234596', 'Haematology', 'CBC with ESR', 400, 600, 0, 600, 0, 600, 0, 20),
(428, 8, '2020-07-13', 278, 'Gias Uddin', 'Dr. Md. Rezaul Bari [MBBS, BCS(H), EX. UH & FPO]', '50 Yrs', '01619180956', 'Digital X-Ray', 'X-Ray Lt. Hand B/V', 500, 1500, 0, 1500, 0, 1500, 0, 0),
(429, 8, '2020-07-13', 278, 'Gias Uddin', 'Dr. Md. Rezaul Bari [MBBS, BCS(H), EX. UH & FPO]', '50 Yrs', '01619180956', 'Digital X-Ray', 'Cervical spine (C/S) B/V', 700, 1500, 0, 1500, 0, 1500, 0, 0),
(430, 8, '2020-07-13', 278, 'Gias Uddin', 'Md. Abdus Sattar Khan', '50 Yrs', '01619180956', 'Biochemistry', 'OGTT', 300, 1500, 0, 1500, 0, 1500, 0, 0),
(431, 9, '2020-07-13', 277, 'Masud Rana', 'Dentist. Md. Saeed Kabir. [DMT (Dental)]', '45 Yrs', '01619180956', 'Haematology', 'CBC with ESR', 400, 400, 0, 400, 0, 400, 0, 99),
(432, 10, '2020-07-13', 0, '', 'Dr. Md. Mahbubul Alam Bhuiyan [MBBS, BCS(H), FCPS(M) P-1, D-Card(Incourse)]', '', '', 'Haematology', 'CBC with ESR', 400, 500, 99, 401, 0, 401, 0, 0),
(433, 10, '2020-07-13', 0, '', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '45 Yrs', '01619180956', 'Biochemistry', 'FBS/RBS/2HABF', 100, 500, 99, 401, 0, 401, 0, 0),
(434, 11, '2020-07-14', 277, 'Masud Rana', 'Dr.Md. Harun -Or-Rosid [MBBS,BCS(H), FCPS(ENT), P-1]', '45 Yrs', '01619180956', 'Haematology', 'CBC with ESR', 400, 850, 0, 850, 0, 850, 0, 0),
(435, 11, '2020-07-14', 277, 'Masud Rana', 'Dr.Md. Harun -Or-Rosid [MBBS,BCS(H), FCPS(ENT), P-1]', '45 Yrs', '01619180956', 'Haematology', 'TC/DC/ESR/HB', 200, 850, 0, 850, 0, 850, 0, 0),
(436, 11, '2020-07-14', 277, 'Masud Rana', 'Dr.Md. Harun -Or-Rosid [MBBS,BCS(H), FCPS(ENT), P-1]', '45 Yrs', '01619180956', 'Haematology', 'Malaria Parasite (MP)', 250, 850, 0, 850, 0, 850, 0, 0),
(437, 12, '2020-07-16', 281, 'Test Patient', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '25', '+8801773080682', 'Haematology', 'Total Circulating Eosinophils', 100, 500, 0, 500, 500, 0, 0, 20),
(438, 12, '2020-07-16', 281, 'Test Patient', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', '25', '+8801773080682', 'Haematology', 'CBC with ESR', 400, 500, 0, 500, 500, 0, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `sell_product`
--

CREATE TABLE `sell_product` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(500) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `sales_type` varchar(50) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `price_per_unit` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `discount` int(100) NOT NULL,
  `sub_total` float NOT NULL,
  `customer_name` varchar(1000) NOT NULL,
  `mobile_no` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `sold_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `record_id` int(11) NOT NULL,
  `service` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`record_id`, `service`) VALUES
(6, 'Fooding Expense'),
(7, 'Medicine Expense'),
(8, 'Doctor Visit'),
(9, 'Bed Expense'),
(10, 'Cabin Expense');

-- --------------------------------------------------------

--
-- Table structure for table `single_page_content`
--

CREATE TABLE `single_page_content` (
  `record_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(20) NOT NULL,
  `details` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `single_page_content`
--

INSERT INTO `single_page_content` (`record_id`, `title`, `image`, `details`) VALUES
(4, '4', '4.jpg', 'he term originally referred to messages sent using the Short Message Service (SMS). It has grown beyond alphanumeric text to include multimedia messages (known as MMS) containing digital images, videos, and sound content, as well as ideograms known as emoji (happy faces, sad faces, and other icons).'),
(7, '8', '7.jpg', 'ultrasonography'),
(16, '', '16.jpg', 'X-rays are a type of radiation called electromagnetic waves. X-ray imaging creates pictures of the inside of your body. The images show the parts of your body in different shades of black and white. ... Calcium in bones absorbs x-rays the most, so bones look white. Fat and other soft tissues absorb less and look gray.'),
(17, '9', '17.jpg', 'Modern device for everything you need. Free software, 3D Live mode. Choice of various transducers.  Possibility of using matrix transducers. Тransesophageal…'),
(26, '2', '26.jpg', 'GREEN SOFTWARE & TECHNOLOGY is a leading customized software solutions provider for online and desktop based applications, established in 2014. The company has been promoted by some highly experienced, professional and dedicated team to provide total IT solutions under one roof.'),
(28, '1', '28.jpg', 'GREEN Pathology Complex. No doubt the company has been able to make a name for itself in a relatively short span of time because of its ability and commitments.');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `record_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `joining_date` date NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `staff_type` varchar(100) NOT NULL,
  `department` varchar(200) NOT NULL,
  `visiting_hour` varchar(500) NOT NULL,
  `doctor_fee` varchar(500) NOT NULL,
  `available_days` varchar(2000) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `total_salary` int(15) NOT NULL,
  `image` varchar(30) NOT NULL,
  `hr_access` int(11) NOT NULL,
  `inventory_access` int(11) NOT NULL,
  `billing_access` int(11) NOT NULL,
  `accounting_access` int(11) NOT NULL,
  `sales_access` int(11) NOT NULL,
  `createOption_access` varchar(200) NOT NULL,
  `webpart_access` varchar(200) NOT NULL,
  `laboratory_access` varchar(200) NOT NULL,
  `information_access` varchar(200) NOT NULL,
  `block_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`record_id`, `name`, `doctor_name`, `joining_date`, `username`, `password`, `staff_type`, `department`, `visiting_hour`, `doctor_fee`, `available_days`, `mobile`, `address`, `designation`, `bank_name`, `account_no`, `total_salary`, `image`, `hr_access`, `inventory_access`, `billing_access`, `accounting_access`, `sales_access`, `createOption_access`, `webpart_access`, `laboratory_access`, `information_access`, `block_status`) VALUES
(4, 'Bidhan Krishna Samanta', '', '2009-02-01', 'admin', '123', 'Staff', '', '', '', '', '01619180956', 'Mirpur-1, Dhaka-1216.', 'Managing Director', 'DBBL', '132613', 15000, '4.jpg', 1, 0, 1, 1, 1, '1', '1', '1', '', 0),
(5, 'Soma Roy', '', '2015-01-01', 'Soma', 'Soma', 'Staff', '', '', '', '', '01619180956', 'Mirpur-1, Dhaka-1216.', 'Director', 'RKUB', '1223', 12000, '5.jpg', 1, 0, 1, 1, 1, '1', '1', '1', '', 0),
(6, 'Basudeb Roy', '', '2013-12-01', 'basudeb', 'basudeb', 'Staff', '', '', '', '', '01619180956', 'Mirpur-1, Dhaka-1216.', 'Manager', 'DBBL', '132514', 9500, '6.jpg', 0, 0, 1, 0, 1, '1', '0', '1', '', 0),
(7, 'Md. Habibur Rahman Hizal', '', '2019-09-01', 'habibur', 'habibur', 'Staff', '', '', '', '', '01619180956', 'Mirpur-1, Dhaka-1216.', 'Medical Technologist(Lab. Medicine)', 'DBBL', '132515', 8500, '7.jpg', 0, 0, 1, 0, 0, '0', '0', '1', '', 0),
(8, 'Md. Ismail Hosen', '', '2020-06-14', 'ismail', 'ismail', 'Staff', '', '', '', '', '01619180956', 'Mirpur-1, Dhaka-1216.', 'Medical Technologist( Radiology & Imaging)', 'DBBL', '132616', 10000, '8.jpg', 0, 0, 0, 0, 0, '0', '0', '1', '', 0),
(9, 'Md. Tanbin Hasan Topu', '', '2014-06-01', 'topu', 'topu', 'Staff', '', '', '', '', '01619180956', 'Mirpur-1, Dhaka-1216.', 'Marketing officer', 'DBBL', '132517', 5000, '9.jpg', 0, 0, 1, 0, 1, '1', '0', '1', '', 0),
(11, 'Mrs. Poly Begum', '', '2019-04-01', '', '', 'Staff', '', '', '', '', '01619180956', 'Mirpur-1, Dhaka-1216.', 'Office Attendant', 'DBBL', '133928', 4000, '11.jpg', 0, 0, 0, 0, 0, '0', '0', '0', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `store_type`
--

CREATE TABLE `store_type` (
  `record_id` int(11) NOT NULL,
  `store_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test_category`
--

CREATE TABLE `test_category` (
  `record_id` int(12) NOT NULL,
  `test_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_category`
--

INSERT INTO `test_category` (`record_id`, `test_category`) VALUES
(1, 'Haematology'),
(2, 'Biochemistry'),
(3, 'Immunology'),
(4, 'MT'),
(5, 'Urine Examination'),
(6, 'Stool Examination'),
(7, 'Cross Matching'),
(8, 'Semen Analysis'),
(9, 'Skin Scraping Test'),
(10, 'Serological Test'),
(11, 'Ultrasonogram'),
(12, 'Digital X-Ray'),
(13, 'ECG'),
(14, 'Nebulization'),
(15, 'Dental X-Ray'),
(16, 'X-Ray online Report Fee(Single view)'),
(17, 'X-Ray online Report Fee(Both view)'),
(18, 'Serum Electrolyte');

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE `test_name` (
  `record_id` int(12) NOT NULL,
  `test_category` varchar(200) NOT NULL,
  `test_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_name`
--

INSERT INTO `test_name` (`record_id`, `test_category`, `test_name`) VALUES
(1, 'Haematology', 'CBC with ESR'),
(2, 'Haematology', 'Total Circulating Eosinophils'),
(3, 'Haematology', 'Total Platelet count'),
(4, 'Haematology', 'TC/DC/ESR/HB'),
(5, 'Haematology', 'Hb%'),
(6, 'Haematology', 'BT, CT'),
(7, 'Haematology', 'Malaria Parasite (MP)'),
(8, 'Haematology', 'Peripheral Blood Film (PBF)'),
(9, 'Biochemistry', 'FBS/RBS/2HABF'),
(10, 'Biochemistry', 'OGTT'),
(11, 'Biochemistry', 'HbA1c'),
(12, 'Biochemistry', 'Serum Creatinine'),
(13, 'Biochemistry', 'Serum Urea'),
(14, 'Biochemistry', 'Serum Cholesterol'),
(15, 'Biochemistry', 'Serum Triglycerides'),
(16, 'Biochemistry', 'Serum HDL-Cholesterol'),
(17, 'Biochemistry', 'Serum LDL-Cholesterol'),
(18, 'Biochemistry', 'Lipid Profile'),
(19, 'Biochemistry', 'Serum Bilirubin (Total)'),
(20, 'Biochemistry', 'Serum Bilirubin (Direct)'),
(21, 'Biochemistry', 'Serum Bilirubin (Indirect)'),
(22, 'Biochemistry', 'Blood Urea Nitrogen'),
(23, 'Biochemistry', 'Serum Albumin'),
(24, 'Biochemistry', 'Serum Globulin'),
(25, 'Biochemistry', 'Serum Protein'),
(26, 'Biochemistry', 'Serum Calcium'),
(27, 'Biochemistry', 'SGPT'),
(28, 'Biochemistry', 'SGOT'),
(29, 'Biochemistry', 'Serum Alkaline Phosphatase (ALP)'),
(30, 'Biochemistry', 'Serum Amylase'),
(31, 'Biochemistry', 'Serum Lipase'),
(32, 'Biochemistry', 'Serum Uric Acid'),
(33, 'Immunology', 'TSH'),
(34, 'Immunology', 'T3 (Total Tri Iodothyronine)'),
(35, 'Immunology', 'FT3'),
(36, 'Immunology', 'T4 (Total Thyroxin)'),
(37, 'Immunology', 'FT4'),
(38, 'Immunology', 'Troponine-I'),
(39, 'Immunology', 'Serum IgE'),
(40, 'Immunology', 'Serum IgG'),
(41, 'Immunology', 'Serum Prolectin'),
(42, 'Immunology', 'PSA'),
(43, 'Immunology', 'Testosterone'),
(44, 'Immunology', 'Beta HCG (Human Chorionic Gonadotropin) Hormone'),
(45, 'Immunology', 'CRP (Qualitative & Quantitative Test)'),
(46, 'MT', 'Mantoux Test'),
(47, 'Urine Examination', 'Urine for R/M/E'),
(48, 'Urine Examination', 'Urine for Pregnancy Test'),
(49, 'Urine Examination', 'Urine Keton bodies'),
(50, 'Urine Examination', 'Urine for 24-hours Protein'),
(51, 'Stool Examination', 'Stool for R/M/E'),
(52, 'Stool Examination', 'Stool for Reducing Substance'),
(53, 'Stool Examination', 'Occult Blood Test (OBT)'),
(54, 'Cross Matching', 'Cross Matching & Screening'),
(55, 'Semen Analysis', 'Semen Analysis'),
(56, 'Skin Scraping Test', 'Skin Scraping Test'),
(57, 'Serological Test', 'Widal Test'),
(58, 'Serological Test', 'ASO-Titre'),
(59, 'Serological Test', 'VDRL'),
(60, 'Serological Test', 'HBsAg (Rapid Test)'),
(61, 'Serological Test', 'HBsAg (Confirmatory Test)'),
(62, 'Serological Test', 'TPHA'),
(63, 'Serological Test', 'RA/RF Test'),
(64, 'Serological Test', 'Blood Group & Rh Factor'),
(65, 'Serological Test', 'Aldehyde Test'),
(66, 'Serological Test', 'ICT for Typhoid'),
(67, 'Serological Test', 'ICT for TB'),
(68, 'Serological Test', 'ICT for Failaria'),
(69, 'Serological Test', 'ICT for Kala Azar'),
(70, 'Serological Test', 'ICT for Malaria'),
(71, 'Serological Test', 'HIV (Screening)'),
(72, 'Serological Test', 'Anti HCV (Screening)'),
(73, 'Serological Test', 'ICT for Dengu (NS1)'),
(74, 'Serological Test', 'ICT for Dengu (IgG & IgM)'),
(75, 'Urine Examination', 'Heat Coagulation Test (HCT)'),
(76, 'Ultrasonogram', 'USG  Of W/A'),
(77, 'Ultrasonogram', 'USG  Of L/A'),
(78, 'Ultrasonogram', 'USG Of KUB'),
(79, 'Ultrasonogram', 'USG  Of Pregnancy Profile'),
(80, 'Ultrasonogram', 'USG  Of Breast'),
(81, 'Ultrasonogram', 'USG Of HBS'),
(82, 'Ultrasonogram', 'USG of Scrotum'),
(83, 'Ultrasonogram', 'USG of Pelvic Organs'),
(84, 'Ultrasonogram', 'USG of Genito urinary system'),
(85, 'Ultrasonogram', 'USG of Testis'),
(86, 'Digital X-Ray', 'X-Ray chest P/A'),
(87, 'Digital X-Ray', 'X-Ray chest A /P'),
(88, 'Digital X-Ray', 'X-Ray chest lateral view'),
(89, 'Digital X-Ray', 'X-Ray Plain KUB'),
(90, 'Digital X-Ray', 'X-Ray Plain abdomen E/P'),
(91, 'Digital X-Ray', 'X-Ray PNS (OM view)'),
(92, 'Digital X-Ray', 'X-Ray Pelvic AP view'),
(93, 'Digital X-Ray', 'X-Ray Skull B/V'),
(94, 'Digital X-Ray', 'Cervical spine (C/S) B/V'),
(95, 'Digital X-Ray', 'X-Ray Lumbo-Sacral spine (LSS/LS) B/V'),
(96, 'Digital X-Ray', 'X-Ray Thoracic lumber spine B/V'),
(97, 'Digital X-Ray', 'X-Ray Dorsal lumber spine B/V'),
(98, 'Digital X-Ray', 'X-Ray Rt. Hand B/V'),
(99, 'Digital X-Ray', 'X-Ray Lt. Hand B/V'),
(100, 'Digital X-Ray', 'X-Ray Rt. knee joint B/V'),
(101, 'Digital X-Ray', 'X-Ray Lt. Knee joint B/V'),
(102, 'Digital X-Ray', 'X-Ray Rt. Foot B/V'),
(103, 'Digital X-Ray', 'X-Ray Lt. foot B/V'),
(104, 'Digital X-Ray', 'X-Ray Rt. ankle joint B/V'),
(105, 'Digital X-Ray', 'X-Ray Lt. ankle joint B/V'),
(106, 'Digital X-Ray', 'X-Ray Rt. Thigh B/V'),
(107, 'Digital X-Ray', 'X-Ray Lt. Thigh B/V'),
(108, 'Digital X-Ray', 'X-Ray Rt. shoulder joint B/V'),
(109, 'Digital X-Ray', 'X-Ray Lt. shoulder joint B/V'),
(110, 'Digital X-Ray', 'X-Ray Rt. elbow joint B/V'),
(111, 'Digital X-Ray', 'X-Ray Lt. elbow joint B/V'),
(112, 'Digital X-Ray', 'X-Ray Rt. wrist joint B/V'),
(113, 'Digital X-Ray', 'X-Ray Lt. wrist joint B/V'),
(114, 'Digital X-Ray', 'X-Ray Rt. wrist & Forearm B/V'),
(115, 'Digital X-Ray', 'X-Ray Lt. wrist & forearm B/V'),
(116, 'Dental X-Ray', 'Dental X-Ray'),
(117, 'ECG', 'ECG'),
(118, 'Biochemistry', 'S.Uric Acid'),
(119, 'Biochemistry', 'RBS'),
(120, 'Biochemistry', 'FBS'),
(121, 'Biochemistry', '2HABF'),
(122, 'Urine Examination', 'Corresponding urine sugar (CUS)'),
(123, 'X-Ray online Report Fee(Single view)', '50'),
(124, 'X-Ray online Report Fee(Both view)', '100'),
(125, 'Nebulization', '40'),
(126, 'Digital X-Ray', 'Online report (Single view)'),
(127, 'Digital X-Ray', 'Online report (Both view)'),
(128, 'Nebulization', 'Nebulizer'),
(129, 'ECG', 'Online report ( ECG All Leads)'),
(130, 'Urine Examination', 'Heat Coagulation Test (HCT)'),
(131, 'Biochemistry', 'Albumin : Globulin'),
(132, 'Serological Test', 'Febrile Antigen/ Triple Antigen'),
(133, 'Serum Electrolyte', 'Serum Electrolyte(Sodium, Potassium, Chloride)'),
(134, 'Digital X-Ray', 'Rt. Hip joint B/V'),
(135, 'Digital X-Ray', 'Lt. Hip joint B/V');

-- --------------------------------------------------------

--
-- Table structure for table `test_price`
--

CREATE TABLE `test_price` (
  `record_id` int(12) NOT NULL,
  `test_name` varchar(500) NOT NULL,
  `test_id` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_price`
--

INSERT INTO `test_price` (`record_id`, `test_name`, `test_id`, `description`, `price`) VALUES
(1, 'CBC with ESR', '1', '', 400),
(2, 'Total Circulating Eosinophils', '2', '', 100),
(3, 'Total Platelet count', '3', '', 100),
(4, 'TC/DC/ESR/HB', '4', '', 200),
(5, 'Hb%', '5', '', 50),
(6, 'BT, CT', '6', '', 200),
(7, 'Malaria Parasite (MP)', '7', '', 250),
(8, 'Peripheral Blood Film (PBF)', '8', '', 500),
(9, 'FBS/RBS/2HABF', '9', '', 100),
(10, 'OGTT', '10', '', 300),
(11, 'HbA1c', '11', '', 800),
(12, 'Serum Creatinine', '12', '', 300),
(13, 'Serum Urea', '13', '', 200),
(14, 'Serum Cholesterol', '14', '', 200),
(15, 'Serum Triglycerides', '15', '', 200),
(16, 'Serum HDL-Cholesterol', '16', '', 200),
(17, 'Serum LDL-Cholesterol', '17', '', 200),
(18, 'Lipid Profile', '18', '', 700),
(19, 'Serum Bilirubin (Total)', '19', '', 200),
(20, 'Serum Bilirubin (Direct)', '20', '', 200),
(21, 'Serum Bilirubin (Indirect)', '21', '', 200),
(22, 'Blood Urea Nitrogen', '22', '', 200),
(23, 'Serum Albumin', '23', '', 300),
(24, 'Serum Globulin', '24', '', 300),
(25, 'Serum Protein', '25', '', 300),
(26, 'Serum Calcium', '26', '', 300),
(27, 'SGPT', '27', '', 450),
(28, 'SGOT', '28', '', 450),
(29, 'Serum Alkaline Phosphatase (ALP)', '29', '', 300),
(30, 'Serum Amylase', '30', '', 500),
(31, 'Serum Lipase', '31', '', 500),
(32, 'Serum Uric Acid', '32', '', 500),
(33, 'TSH', '33', '', 800),
(34, 'T3 (Total Tri Iodothyronine)', '34', '', 800),
(35, 'FT3', '35', '', 800),
(36, 'T4 (Total Thyroxin)', '36', '', 800),
(37, 'FT4', '37', '', 800),
(38, 'Troponine-I', '38', '', 1000),
(39, 'Serum IgE', '39', '', 800),
(40, 'Serum IgG', '40', '', 800),
(41, 'Serum Prolectin', '41', '', 1000),
(42, 'PSA', '42', '', 1000),
(43, 'Testosterone', '43', '', 1000),
(44, 'Beta HCG (Human Chorionic Gonadotropin) Hormone', '44', '', 1000),
(45, 'CRP (Qualitative & Quantitative Test)', '45', '', 500),
(46, 'Mantoux Test', '46', '', 200),
(47, 'Urine for R/M/E', '47', '', 100),
(48, 'Urine for Pregnancy Test', '48', '', 120),
(49, 'Urine Keton bodies', '49', '', 100),
(50, 'Urine for 24-hours Protein', '50', '', 200),
(51, 'Stool for R/M/E', '51', '', 200),
(52, 'Stool for Reducing Substance', '52', '', 100),
(53, 'Occult Blood Test (OBT)', '53', '', 300),
(54, 'Cross Matching & Screening', '54', '', 500),
(55, 'Semen Analysis', '55', '', 500),
(56, 'Skin Scraping Test', '56', '', 300),
(57, 'Widal Test', '57', '', 250),
(58, 'ASO-Titre', '58', '', 200),
(59, 'VDRL', '59', '', 200),
(60, 'HBsAg (Rapid Test)', '60', '', 350),
(61, 'HBsAg (Confirmatory Test)', '61', '', 600),
(62, 'TPHA', '62', '', 300),
(63, 'RA/RF Test', '63', '', 200),
(64, 'Blood Group & Rh Factor', '64', '', 80),
(65, 'Aldehyde Test', '65', '', 200),
(66, 'ICT for Typhoid', '66', '', 400),
(67, 'ICT for TB', '67', '', 600),
(68, 'ICT for Failaria', '68', '', 450),
(69, 'ICT for Kala Azar', '69', '', 450),
(70, 'ICT for Malaria', '70', '', 350),
(71, 'HIV (Screening)', '71', '', 500),
(72, 'Anti HCV (Screening)', '72', '', 350),
(73, 'ICT for Dengu (NS1)', '73', '', 500),
(74, 'ICT for Dengu (IgG & IgM)', '74', '', 500),
(75, 'Heat Coagulation Test (HCT)', '75', '', 0),
(76, 'ECG', '117', '', 200),
(77, 'ECG', '117', '', 200),
(78, 'RBS', '119', '', 100),
(79, 'FBS', '120', '', 100),
(80, '2HABF', '121', '', 100),
(81, 'Corresponding urine sugar (CUS)', '122', '', 50),
(82, 'Online report (Single view)', '126', '', 50),
(83, 'Online report (Both view)', '127', '', 100),
(84, 'Dental X-Ray', '116', '', 150),
(85, 'Nebulizer', '128', '', 40),
(86, 'Online report ( ECG All Leads)', '129', '', 100),
(87, 'Heat Coagulation Test (HCT)', '130', '', 100),
(88, 'USG  Of W/A', '76', '', 500),
(89, 'USG  Of L/A', '77', '', 500),
(90, 'USG Of KUB', '78', '', 500),
(91, 'USG  Of Pregnancy Profile', '79', '', 500),
(92, 'USG  Of Breast', '80', '', 500),
(93, 'USG Of HBS', '81', '', 500),
(94, 'USG of Scrotum', '82', '', 500),
(95, 'USG of Pelvic Organs', '83', '', 500),
(96, 'USG of Genito urinary system', '84', '', 500),
(97, 'USG of Testis', '85', '', 500),
(98, 'X-Ray chest P/A', '86', '', 500),
(99, 'X-Ray chest A /P', '87', '', 500),
(100, 'X-Ray chest lateral view', '88', '', 500),
(101, 'X-Ray Plain KUB', '89', '', 500),
(102, 'X-Ray Plain abdomen E/P', '90', '', 500),
(103, 'X-Ray PNS (OM view)', '91', '', 500),
(104, 'X-Ray Pelvic AP view', '92', '', 500),
(105, 'X-Ray Skull B/V', '93', '', 500),
(106, 'Cervical spine (C/S) B/V', '94', '', 700),
(107, 'X-Ray Lumbo-Sacral spine (LSS/LS) B/V', '95', '', 700),
(108, 'X-Ray Thoracic lumber spine B/V', '96', '', 700),
(109, 'X-Ray Dorsal lumber spine B/V', '97', '', 700),
(110, 'X-Ray Rt. Hand B/V', '98', '', 500),
(111, 'X-Ray Lt. Hand B/V', '99', '', 500),
(112, 'X-Ray Rt. knee joint B/V', '100', '', 500),
(113, 'X-Ray Lt. Knee joint B/V', '101', '', 500),
(114, 'X-Ray Rt. Foot B/V', '102', '', 500),
(115, 'X-Ray Lt. foot B/V', '103', '', 500),
(116, 'X-Ray Rt. ankle joint B/V', '104', '', 500),
(117, 'X-Ray Lt. Knee joint B/V', '101', '', 500),
(118, 'X-Ray Rt. Thigh B/V', '106', '', 500),
(119, 'X-Ray Lt. Thigh B/V', '107', '', 500),
(120, 'X-Ray Rt. shoulder joint B/V', '108', '', 500),
(121, 'X-Ray Rt. shoulder joint B/V', '108', '', 500),
(122, 'X-Ray Lt. shoulder joint B/V', '109', '', 500),
(123, 'X-Ray Rt. elbow joint B/V', '110', '', 500),
(124, 'X-Ray Lt. elbow joint B/V', '111', '', 500),
(125, 'X-Ray Rt. wrist joint B/V', '112', '', 500),
(126, 'X-Ray Lt. wrist & forearm B/V', '115', '', 500),
(127, 'X-Ray Rt. wrist & Forearm B/V', '114', '', 500),
(128, 'X-Ray Lt. wrist & forearm B/V', '115', '', 500),
(129, 'Albumin : Globulin', '131', '', 700),
(130, 'Serum Electrolyte(Sodium, Potassium, Chloride)', '133', '', 800),
(131, 'Rt. Hip joint B/V', '134', '', 500),
(132, 'Lt. Hip joint B/V', '135', '', 500),
(133, 'HbA1c', '11', '', 1200),
(134, 'CBC with ESR', '1', '', 400);

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `record_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `unique_id` int(11) NOT NULL,
  `patient_id` varchar(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `age` varchar(500) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `test_category` varchar(200) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  `test_result` float NOT NULL,
  `report_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`record_id`, `date`, `unique_id`, `patient_id`, `patient_name`, `age`, `sex`, `mobile`, `doctor_name`, `test_category`, `test_name`, `test_result`, `report_date`) VALUES
(11, '2020-07-11', 0, '202', 'Rupia Khatun', '35 Yrs.', 'Female', '', 'Dr. Md. Mostafizur Rahman [LMAF]', 'Biochemistry', 'Serum Bilirubin (Total)', 0, '2020-07-11'),
(12, '2020-07-11', 0, '202', 'Rupia Khatun', '35 Yrs.', 'Female', '', 'Dr. Md. Mostafizur Rahman [LMAF]', 'Urine Examination', 'Urine for R/M/E', 0, '2020-07-11'),
(13, '2020-07-11', 0, '214', 'Rahena +', '28 Yrs.', 'Female', '', 'Mrs. Shahera Khatun [SSN]', 'Serological Test', 'Blood Group & Rh Factor', 0, '2020-07-11'),
(14, '2020-07-11', 0, '233', 'Anjuna', '20 Yrs.', 'Female', '', 'Md. Shahinur Rahman Sagor [RMP, P/C]', 'Urine Examination', 'Urine for Pregnancy Test', 0, '2020-07-11'),
(15, '2020-07-11', 0, '233', 'Anjuna', '20 Yrs.', 'Female', '', 'Md. Shahinur Rahman Sagor [RMP, P/C]', 'Urine Examination', 'Urine for Pregnancy Test', 0, '2020-07-11'),
(16, '2020-07-11', 0, '235', 'Arobi', '15 Yrs.', '', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Serological Test', 'Widal Test', 0, '2020-07-11'),
(17, '2020-07-11', 0, '235', 'Arobi', '15 Yrs.', '', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Serological Test', 'Widal Test', 0, '2020-07-11'),
(18, '2020-07-11', 0, '235', 'Arobi', '15 Yrs.', '', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Serological Test', 'Widal Test', 0, '2020-07-11'),
(19, '2020-07-11', 0, '250', 'Md. Abdul Hamid', '54 Yrs.', '', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Biochemistry', 'Serum Creatinine', 0, '2020-07-11'),
(20, '2020-07-11', 0, '251', 'Md. Abdul Hamid', '54 Yrs.', '', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Urine Examination', 'Urine for R/M/E', 0, '2020-07-11'),
(21, '2020-07-11', 0, '246', 'Mozaffar Hossain', '42 Yrs.', '', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Serological Test', 'Widal Test', 0, '2020-07-11'),
(22, '2020-07-11', 0, '251', 'Md. Abdul Hamid', '54 Yrs.', '', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Urine Examination', 'Urine for R/M/E', 0, '2020-07-11'),
(23, '2020-07-11', 0, '245', 'Mozaffar Hossain', '42 Yrs.', '', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Urine Examination', 'Urine for R/M/E', 0, '2020-07-11'),
(25, '2020-07-11', 0, '246', 'Mozaffar Hossain', '42 Yrs.', 'Male', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Serological Test', 'Widal Test', 0, '2020-07-11'),
(26, '2020-07-11', 0, '246', 'Mozaffar Hossain', '42 Yrs.', '', '', 'Dr.Md. Nazrul Islam [DMF(Dhaka)]', 'Serological Test', 'Widal Test', 0, '2020-07-11'),
(27, '2020-07-11', 0, '255', 'Jomir Hosen', '32 Yrs.', 'Male', '', 'Dr. Arifa Begum Promi [MBBS,BCS(H)]', 'Urine Examination', 'Urine for R/M/E', 0, '2020-07-11'),
(28, '2020-07-12', 0, '265', 'Taifa', '6yrs', 'Female', '', 'Dr. Md.Shahidul Haque Mondol,  [DMF(Dhaka)]', 'Urine Examination', 'Urine for R/M/E', 0, '2020-07-12'),
(29, '2020-07-12', 0, '278', 'Gias Uddin', '50 Yrs', 'Male', '', 'Dr. Md. Raziul Haque, [DMF(Dhaka)]', 'Biochemistry', 'HbA1c', 0, '2020-07-12'),
(30, '2020-07-13', 0, '278', 'Gias Uddin', '50 Yrs', '', '', 'Md. Abdus Sattar Khan', 'Haematology', 'CBC with ESR', 0, '2020-07-13'),
(31, '2020-07-14', 0, '277', 'Masud Rana', '45 Yrs', 'Male', '', 'Dr.Md. Harun -Or-Rosid [MBBS,BCS(H), FCPS(ENT), P-1]', 'Haematology', 'CBC with ESR', 0, '2020-07-14'),
(32, '2020-07-14', 0, '277', 'Masud Rana', '45 Yrs', '', '', 'Dr.Md. Harun -Or-Rosid [MBBS,BCS(H), FCPS(ENT), P-1]', 'Haematology', 'CBC with ESR', 0, '2020-07-14'),
(33, '2020-07-16', 0, '281', 'Test Patient', '25', 'Male', '', 'Dr.Md. Rukunuzzaman [MBBS,BCS(H), CCD(BIRDEM),CMU(Ultra)]', 'Haematology', 'Total Circulating Eosinophils', 0, '2020-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `test_type`
--

CREATE TABLE `test_type` (
  `record_id` int(11) NOT NULL,
  `test_name` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `rate` varchar(200) NOT NULL,
  `block_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types_of_product`
--

CREATE TABLE `types_of_product` (
  `record_id` int(11) NOT NULL,
  `types_of_product` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types_of_product`
--

INSERT INTO `types_of_product` (`record_id`, `types_of_product`) VALUES
(10, 'Reagent'),
(11, 'Test'),
(12, 'HbA1c');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `approval_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `approval_status`) VALUES
(1, 'admin', 'abc12345', 'admin', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_bed`
--
ALTER TABLE `add_bed`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `add_client`
--
ALTER TABLE `add_client`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `add_package`
--
ALTER TABLE `add_package`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `admission_fee_invoice`
--
ALTER TABLE `admission_fee_invoice`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `admission_patient`
--
ALTER TABLE `admission_patient`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `advance_payment`
--
ALTER TABLE `advance_payment`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `appointment_info`
--
ALTER TABLE `appointment_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `asset_info`
--
ALTER TABLE `asset_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_bed`
--
ALTER TABLE `assign_bed`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `bank_withdraw`
--
ALTER TABLE `bank_withdraw`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `base_data`
--
ALTER TABLE `base_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed_no`
--
ALTER TABLE `bed_no`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `bed_type`
--
ALTER TABLE `bed_type`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `billing_service`
--
ALTER TABLE `billing_service`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `birth_report`
--
ALTER TABLE `birth_report`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `case_patient`
--
ALTER TABLE `case_patient`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `consultancy`
--
ALTER TABLE `consultancy`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_bank_name`
--
ALTER TABLE `create_bank_name`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `create_bill`
--
ALTER TABLE `create_bill`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `create_salary_sheet`
--
ALTER TABLE `create_salary_sheet`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `create_sms`
--
ALTER TABLE `create_sms`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `death_report`
--
ALTER TABLE `death_report`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `expense_head`
--
ALTER TABLE `expense_head`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `generic_name`
--
ALTER TABLE `generic_name`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `income_head`
--
ALTER TABLE `income_head`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `insert_medicine_info`
--
ALTER TABLE `insert_medicine_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `insert_notice`
--
ALTER TABLE `insert_notice`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `insert_product_info`
--
ALTER TABLE `insert_product_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `investigation_report`
--
ALTER TABLE `investigation_report`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `invoice_id`
--
ALTER TABLE `invoice_id`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `lab_product_use_in`
--
ALTER TABLE `lab_product_use_in`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `lab_product_use_out`
--
ALTER TABLE `lab_product_use_out`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `liability_info`
--
ALTER TABLE `liability_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacture_company`
--
ALTER TABLE `manufacture_company`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `medicine_name`
--
ALTER TABLE `medicine_name`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `medicine_presentation`
--
ALTER TABLE `medicine_presentation`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `new_msg`
--
ALTER TABLE `new_msg`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `operation_category`
--
ALTER TABLE `operation_category`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `operation_details`
--
ALTER TABLE `operation_details`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `operation_equipment`
--
ALTER TABLE `operation_equipment`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `operation_name`
--
ALTER TABLE `operation_name`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `operation_report`
--
ALTER TABLE `operation_report`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `our_service`
--
ALTER TABLE `our_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `patient_admission`
--
ALTER TABLE `patient_admission`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `pay_service_due`
--
ALTER TABLE `pay_service_due`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `pay_test_due`
--
ALTER TABLE `pay_test_due`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `product_name`
--
ALTER TABLE `product_name`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `purchase_medicine`
--
ALTER TABLE `purchase_medicine`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `purchase_product`
--
ALTER TABLE `purchase_product`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_biochemistry`
--
ALTER TABLE `report_biochemistry`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_blood_group`
--
ALTER TABLE `report_blood_group`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_cross_matching`
--
ALTER TABLE `report_cross_matching`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_crp_aso`
--
ALTER TABLE `report_crp_aso`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_haematology`
--
ALTER TABLE `report_haematology`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_immunology`
--
ALTER TABLE `report_immunology`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_kidney_profile`
--
ALTER TABLE `report_kidney_profile`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_liver_function`
--
ALTER TABLE `report_liver_function`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_mt`
--
ALTER TABLE `report_mt`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_pregnancy_test`
--
ALTER TABLE `report_pregnancy_test`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_semen_analysis_report`
--
ALTER TABLE `report_semen_analysis_report`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_serological`
--
ALTER TABLE `report_serological`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_skin_scraping`
--
ALTER TABLE `report_skin_scraping`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_stool_rme`
--
ALTER TABLE `report_stool_rme`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `report_urinerme`
--
ALTER TABLE `report_urinerme`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `returned_product_info`
--
ALTER TABLE `returned_product_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `sales_due`
--
ALTER TABLE `sales_due`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `sales_service`
--
ALTER TABLE `sales_service`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `sales_test`
--
ALTER TABLE `sales_test`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `sell_product`
--
ALTER TABLE `sell_product`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `single_page_content`
--
ALTER TABLE `single_page_content`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `store_type`
--
ALTER TABLE `store_type`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `test_category`
--
ALTER TABLE `test_category`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `test_name`
--
ALTER TABLE `test_name`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `test_price`
--
ALTER TABLE `test_price`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `test_type`
--
ALTER TABLE `test_type`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `types_of_product`
--
ALTER TABLE `types_of_product`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `add_bed`
--
ALTER TABLE `add_bed`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_package`
--
ALTER TABLE `add_package`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_fee_invoice`
--
ALTER TABLE `admission_fee_invoice`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admission_patient`
--
ALTER TABLE `admission_patient`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `advance_payment`
--
ALTER TABLE `advance_payment`
  MODIFY `record_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment_info`
--
ALTER TABLE `appointment_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `asset_info`
--
ALTER TABLE `asset_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assign_bed`
--
ALTER TABLE `assign_bed`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_deposit`
--
ALTER TABLE `bank_deposit`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_withdraw`
--
ALTER TABLE `bank_withdraw`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `base_data`
--
ALTER TABLE `base_data`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bed_no`
--
ALTER TABLE `bed_no`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bed_type`
--
ALTER TABLE `bed_type`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `billing_service`
--
ALTER TABLE `billing_service`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `birth_report`
--
ALTER TABLE `birth_report`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_patient`
--
ALTER TABLE `case_patient`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultancy`
--
ALTER TABLE `consultancy`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_bank_name`
--
ALTER TABLE `create_bank_name`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `create_bill`
--
ALTER TABLE `create_bill`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `create_salary_sheet`
--
ALTER TABLE `create_salary_sheet`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `create_sms`
--
ALTER TABLE `create_sms`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `death_report`
--
ALTER TABLE `death_report`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `record_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `expense_head`
--
ALTER TABLE `expense_head`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `generic_name`
--
ALTER TABLE `generic_name`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `income_head`
--
ALTER TABLE `income_head`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `insert_notice`
--
ALTER TABLE `insert_notice`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investigation_report`
--
ALTER TABLE `investigation_report`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_id`
--
ALTER TABLE `invoice_id`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_product_use_in`
--
ALTER TABLE `lab_product_use_in`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lab_product_use_out`
--
ALTER TABLE `lab_product_use_out`
  MODIFY `record_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `liability_info`
--
ALTER TABLE `liability_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacture_company`
--
ALTER TABLE `manufacture_company`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_name`
--
ALTER TABLE `medicine_name`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine_presentation`
--
ALTER TABLE `medicine_presentation`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `new_msg`
--
ALTER TABLE `new_msg`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `operation_category`
--
ALTER TABLE `operation_category`
  MODIFY `record_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `operation_details`
--
ALTER TABLE `operation_details`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `operation_equipment`
--
ALTER TABLE `operation_equipment`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `operation_name`
--
ALTER TABLE `operation_name`
  MODIFY `record_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `operation_report`
--
ALTER TABLE `operation_report`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `our_service`
--
ALTER TABLE `our_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `patient_admission`
--
ALTER TABLE `patient_admission`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_service_due`
--
ALTER TABLE `pay_service_due`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_test_due`
--
ALTER TABLE `pay_test_due`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_name`
--
ALTER TABLE `product_name`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase_medicine`
--
ALTER TABLE `purchase_medicine`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_product`
--
ALTER TABLE `purchase_product`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_biochemistry`
--
ALTER TABLE `report_biochemistry`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `report_blood_group`
--
ALTER TABLE `report_blood_group`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_cross_matching`
--
ALTER TABLE `report_cross_matching`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_crp_aso`
--
ALTER TABLE `report_crp_aso`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_haematology`
--
ALTER TABLE `report_haematology`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report_immunology`
--
ALTER TABLE `report_immunology`
  MODIFY `record_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_kidney_profile`
--
ALTER TABLE `report_kidney_profile`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_liver_function`
--
ALTER TABLE `report_liver_function`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_mt`
--
ALTER TABLE `report_mt`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_pregnancy_test`
--
ALTER TABLE `report_pregnancy_test`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_semen_analysis_report`
--
ALTER TABLE `report_semen_analysis_report`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_serological`
--
ALTER TABLE `report_serological`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `report_skin_scraping`
--
ALTER TABLE `report_skin_scraping`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_stool_rme`
--
ALTER TABLE `report_stool_rme`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_urinerme`
--
ALTER TABLE `report_urinerme`
  MODIFY `record_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `returned_product_info`
--
ALTER TABLE `returned_product_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_due`
--
ALTER TABLE `sales_due`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_service`
--
ALTER TABLE `sales_service`
  MODIFY `record_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_test`
--
ALTER TABLE `sales_test`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;

--
-- AUTO_INCREMENT for table `sell_product`
--
ALTER TABLE `sell_product`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `single_page_content`
--
ALTER TABLE `single_page_content`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `store_type`
--
ALTER TABLE `store_type`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_category`
--
ALTER TABLE `test_category`
  MODIFY `record_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `test_name`
--
ALTER TABLE `test_name`
  MODIFY `record_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `test_price`
--
ALTER TABLE `test_price`
  MODIFY `record_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `test_type`
--
ALTER TABLE `test_type`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types_of_product`
--
ALTER TABLE `types_of_product`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
