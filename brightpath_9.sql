-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 06:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brightpath_9`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Student_ID` int(15) DEFAULT NULL,
  `Percentage` int(10) NOT NULL,
  `medical_exemption_description` varchar(255) NOT NULL,
  `medical_approved_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_ID` int(15) NOT NULL,
  `Class_Name` varchar(10) NOT NULL,
  `Department_ID` int(11) DEFAULT NULL,
  `Faculty_ID` int(15) DEFAULT NULL,
  `Student_ID` int(15) DEFAULT NULL,
  `Total_Students` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_ID`, `Class_Name`, `Department_ID`, `Faculty_ID`, `Student_ID`, `Total_Students`) VALUES
(1, 'CE-4A', 502, 105, 230502001, 5),
(1, 'CE-4A', 502, 105, 230502002, 5),
(1, 'CE-4A', 502, 105, 230502003, 5),
(1, 'CE-4A', 502, 105, 230502004, 5),
(1, 'CE-4A', 502, 105, 230502005, 5),
(2, 'CE-4B', 502, 106, 230502006, 6),
(2, 'CE-4B', 502, 106, 230502007, 6),
(2, 'CE-4B', 502, 106, 230502008, 6),
(2, 'CE-4B', 502, 106, 230502009, 6),
(2, 'CE-4B', 502, 106, 230502010, 6),
(3, 'CE-4C', 502, 107, 230502011, 5),
(3, 'CE-4C', 502, 107, 230502012, 5),
(3, 'CE-4C', 502, 107, 230502013, 5),
(3, 'CE-4C', 502, 107, 230502014, 5),
(3, 'CE-4C', 502, 107, 230502015, 5),
(4, 'CE-4D', 502, 108, 230502016, 6),
(4, 'CE-4D', 502, 108, 230502017, 6),
(4, 'CE-4D', 502, 108, 230502018, 6),
(4, 'CE-4D', 502, 108, 230502019, 6),
(4, 'CE-4D', 502, 108, 230502020, 6),
(5, 'CE-4E', 502, 109, 230502021, 5),
(5, 'CE-4E', 502, 109, 230502022, 5),
(5, 'CE-4E', 502, 109, 230502023, 5),
(5, 'CE-4E', 502, 109, 230502024, 5),
(5, 'CE-4E', 502, 109, 230502025, 5),
(6, 'CE-4F', 502, 110, 230502026, 6),
(6, 'CE-4F', 502, 110, 230502027, 6),
(6, 'CE-4F', 502, 110, 230502028, 6),
(6, 'CE-4F', 502, 110, 230502029, 6),
(6, 'CE-4F', 502, 110, 230502030, 6),
(7, 'IT-4A', 504, 111, 230504001, 5),
(7, 'IT-4A', 504, 111, 230504002, 5),
(7, 'IT-4A', 504, 111, 230504003, 5),
(7, 'IT-4A', 504, 111, 230504004, 5),
(7, 'IT-4A', 504, 111, 230504005, 5),
(8, 'IT-4B', 504, 112, 230504006, 5),
(8, 'IT-4B', 504, 112, 230504007, 5),
(8, 'IT-4B', 504, 112, 230504008, 5),
(8, 'IT-4B', 504, 112, 230504009, 5),
(8, 'IT-4B', 504, 112, 230504010, 5),
(9, 'IT-4C', 504, 113, 230504011, 5),
(9, 'IT-4C', 504, 113, 230504012, 5),
(9, 'IT-4C', 504, 113, 230504013, 5),
(9, 'IT-4C', 504, 113, 230504014, 5),
(9, 'IT-4C', 504, 113, 230504015, 5),
(10, 'IT-4D', 504, 114, 230504016, 5),
(10, 'IT-4D', 504, 114, 230504017, 5),
(10, 'IT-4D', 504, 114, 230504018, 5),
(10, 'IT-4D', 504, 114, 230504019, 5),
(10, 'IT-4D', 504, 114, 230504020, 5),
(11, 'IT-4E', 504, 115, 230504021, 5),
(11, 'IT-4E', 504, 115, 230504022, 5),
(11, 'IT-4E', 504, 115, 230504023, 5),
(11, 'IT-4E', 504, 115, 230504024, 5),
(11, 'IT-4E', 504, 115, 230504025, 5),
(2, 'CE-4B', 502, 106, 230502031, 6),
(4, 'CE-4D', 502, 108, 230502032, 6),
(12, 'CE-4f', 502, 108, 230502033, 1),
(6, 'CE-4F', 502, 110, 230502034, 6);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` int(15) NOT NULL,
  `Course_Name` varchar(25) NOT NULL,
  `Department_ID` int(15) DEFAULT NULL,
  `Credits` int(5) NOT NULL,
  `HOD_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course_ID`, `Course_Name`, `Department_ID`, `Credits`, `HOD_ID`) VALUES
(25020401, 'DS', 502, 7, 100),
(25020402, 'CSO', 502, 3, 100),
(25020403, 'WT', 502, 6, 100),
(25020404, 'ADBMS', 502, 7, 100),
(25020405, 'SE', 502, 6, 100),
(25020406, 'MS', 502, 2, 100),
(25040401, 'DS', 504, 7, 101),
(25040402, 'ICT', 504, 3, 101),
(25040403, 'WT', 504, 6, 101),
(25040404, 'ADBMS', 504, 7, 101),
(25040405, 'SE', 504, 6, 101),
(25040406, 'MS', 504, 2, 101);

--
-- Triggers `course`
--
DELIMITER $$
CREATE TRIGGER `After_Insert_Course` AFTER INSERT ON `course` FOR EACH ROW BEGIN
    -- Step 1: Insert into cvallow if the Course_ID does not exist
    INSERT INTO cvallow (Course_ID, Status) 
    VALUES (NEW.Course_ID, 'Not-Allow')
    ON DUPLICATE KEY UPDATE Status = Status;  

    -- Step 2: Handle history_course record (Update EDate if exists, otherwise insert)
    IF (SELECT COUNT(*) FROM history_course WHERE Course_ID = NEW.Course_ID) > 0 THEN
        UPDATE history_course 
        SET EDate = NULL , SDate = CURDATE()
        WHERE Course_ID = NEW.Course_ID;
    ELSE
        INSERT INTO history_course (Course_ID, Course_Name, Department_ID, Credits, HOD_ID, SDate, EDate)
        VALUES (NEW.Course_ID, NEW.Course_Name, NEW.Department_ID, NEW.Credits, NEW.HOD_ID, CURDATE(), NULL);
    END IF;

    -- Step 3: Insert matching records from subject_material_history into subject_material
    INSERT INTO subject_material
    SELECT * FROM subject_material_history WHERE course_id = NEW.course_id;

    -- Step 4: Delete inserted records from subject_material_history
    DELETE FROM subject_material_history WHERE course_id = NEW.course_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_course` BEFORE DELETE ON `course` FOR EACH ROW BEGIN
    -- Step 1: Delete records from cvallow
    DELETE FROM cvallow WHERE Course_ID = OLD.Course_ID;

    -- Step 2: Insert subject materials into subject_material_history
    INSERT INTO subject_material_history 
    SELECT * FROM subject_material WHERE course_id = OLD.course_id;

    -- Step 3: Delete records from subject_material
    DELETE FROM subject_material WHERE course_id = OLD.course_id;

    -- Step 4: Update history_course to set EDate to the current date
    UPDATE history_course 
    SET EDate = CURDATE() 
    WHERE Course_ID = OLD.Course_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cvallow`
--

CREATE TABLE `cvallow` (
  `Course_ID` int(11) DEFAULT NULL,
  `Status` enum('Allow','Not-Allow') NOT NULL DEFAULT 'Not-Allow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cvallow`
--

INSERT INTO `cvallow` (`Course_ID`, `Status`) VALUES
(25020402, 'Allow'),
(25020403, 'Allow'),
(25020404, 'Allow'),
(25020405, 'Allow'),
(25020406, 'Allow'),
(25040401, 'Allow'),
(25040402, 'Allow'),
(25040403, 'Allow'),
(25040404, 'Allow'),
(25040405, 'Allow'),
(25040406, 'Allow'),
(25020401, 'Allow');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` int(15) NOT NULL,
  `Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Name`) VALUES
(502, 'CE'),
(504, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Faculty_ID` int(15) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Department_ID` int(15) DEFAULT NULL,
  `Password` varchar(10) NOT NULL,
  `HOD_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Faculty_ID`, `Name`, `Email`, `Department_ID`, `Password`, `HOD_ID`) VALUES
(105, 'Avi Shah', 'shahavi@gmail.com', 502, '105', 100),
(106, 'Sonal Patel', 'patelsonal@gmail.com', 502, '106', 100),
(107, 'Palak Shah', 'shahpalak@gmail.com', 502, '107', 100),
(108, 'Priyansh Patel', 'patelpriyansh@gmail.com', 502, '108', 100),
(109, 'Shweta Bhatt', 'bhattshweta@gmail.com', 502, '109', 100),
(110, 'Dhwani Gamit', 'gamitdhwani@gmail.com', 502, '110', 100),
(111, 'Vishvani Gamit', 'gamitvishvani@gmail.com', 504, '111', 101),
(112, 'Parchi Shah', 'shahparchi@gmail.com', 504, '112', 101),
(113, 'Nihar Patel', 'patelnihar@gmail.com', 504, '113', 101),
(114, 'Dharmik Patel', 'pateldharmik@gmail.com', 504, '114', 101),
(115, 'Tejas Shah', 'shahtejas@gmail.com', 504, '115', 101);

--
-- Triggers `faculty`
--
DELIMITER $$
CREATE TRIGGER `after_insert_faculty_assign` AFTER INSERT ON `faculty` FOR EACH ROW BEGIN
    DECLARE cid INT DEFAULT 0;

    -- Get a class ID with NULL Faculty_ID
    SELECT class_ID INTO cid
    FROM class
    WHERE Faculty_ID IS NULL
    LIMIT 1;

    -- If such class found, assign the new faculty to it
    IF cid IS NOT NULL AND cid != 0 THEN
        UPDATE class
        SET Faculty_ID = NEW.Faculty_ID
        WHERE Class_ID = cid;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete_faculty` BEFORE DELETE ON `faculty` FOR EACH ROW BEGIN
    INSERT INTO faculty_backup (Faculty_ID, Name, Email, Department_ID, password)
    VALUES (OLD.Faculty_ID, OLD.Name, OLD.Email, OLD.Department_ID, OLD.password);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_backup`
--

CREATE TABLE `faculty_backup` (
  `Faculty_ID` int(15) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Department_ID` int(15) DEFAULT NULL,
  `Password` varchar(10) NOT NULL,
  `HOD_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fpath`
--

CREATE TABLE `fpath` (
  `course_id` int(15) DEFAULT NULL,
  `path` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fpath`
--

INSERT INTO `fpath` (`course_id`, `path`) VALUES
(25020401, 'DS Assignment.pdf'),
(25020401, 'DS_Notes.pdf'),
(25020401, 'DS_Notes_Unit-1-2-4-5.pdf'),
(25020402, 'CSO NOTES.pdf'),
(25020403, 'WT Assignments.pdf'),
(25020403, 'WT Notes.pdf'),
(25020404, 'ADBMS Assignment.pdf'),
(25020404, 'ADBMS Notes.pdf'),
(25020405, 'SE Assignment-Even 2025.pdf'),
(25020405, 'SE Notes.pdf'),
(25020406, 'MS_QB.pdf'),
(25040401, 'DS Assignment.pdf'),
(25040401, 'DS_Notes.pdf'),
(25040401, 'DS_Notes_Unit-1-2-4-5.pdf'),
(25040403, 'WT Assignments.pdf'),
(25040403, 'WT Notes.pdf'),
(25040404, 'ADBMS Assignment.pdf'),
(25040404, 'ADBMS Notes.pdf'),
(25040405, 'SE Assignment-Even 2025.pdf'),
(25040405, 'SE Notes.pdf'),
(25040406, 'MS_QB.pdf'),
(25040402, 'ICT NOTES');

-- --------------------------------------------------------

--
-- Table structure for table `history_course`
--

CREATE TABLE `history_course` (
  `Course_ID` int(15) NOT NULL,
  `Course_Name` varchar(25) NOT NULL,
  `Department_ID` int(15) DEFAULT NULL,
  `Credits` int(5) NOT NULL,
  `HOD_ID` int(15) DEFAULT NULL,
  `SDate` varchar(10) DEFAULT NULL,
  `EDate` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_course`
--

INSERT INTO `history_course` (`Course_ID`, `Course_Name`, `Department_ID`, `Credits`, `HOD_ID`, `SDate`, `EDate`) VALUES
(25020401, 'DS', 502, 7, 100, '2025-03-10', NULL),
(25020402, 'CSO', 502, 3, 100, '2025-03-10', NULL),
(25020403, 'WT', 502, 6, 100, '2025-03-10', NULL),
(25020404, 'ADBMS', 502, 7, 100, '2025-03-10', NULL),
(25020405, 'SE', 502, 6, 100, '2025-03-10', NULL),
(25020406, 'MS', 502, 2, 100, '2025-03-10', NULL),
(25040401, 'DS', 504, 7, 101, '2025-03-10', NULL),
(25040402, 'ICT', 504, 3, 101, '2025-03-10', NULL),
(25040403, 'WT', 504, 6, 101, '2025-03-10', NULL),
(25040404, 'ADBMS', 504, 7, 101, '2025-03-10', NULL),
(25040405, 'SE', 504, 6, 101, '2025-03-10', NULL),
(25040406, 'MS', 504, 2, 101, '2025-03-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `HOD_ID` int(15) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Department_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`HOD_ID`, `Name`, `Email`, `Password`, `Department_ID`) VALUES
(100, 'Nilesh Vaghela', 'vaghelanilesh@gmail.com', '100', 502),
(101, 'Rahul Pancholi ', 'pancholirahul@gmail.com', '101', 504);

-- --------------------------------------------------------

--
-- Table structure for table `ipath`
--

CREATE TABLE `ipath` (
  `course_id` int(15) DEFAULT NULL,
  `path` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ipath`
--

INSERT INTO `ipath` (`course_id`, `path`) VALUES
(25040404, 'ADBMS.png'),
(25020404, 'ADBMS.png'),
(25020402, 'CSO.png'),
(25020401, 'DS.png'),
(25040401, 'DS.png'),
(25040402, 'ICT.png'),
(25020406, 'MS.png'),
(25040406, 'MS.png'),
(25020405, 'SE.png'),
(25040405, 'SE.png'),
(25040403, 'WT.png'),
(25020403, 'WT.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_ID` int(15) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Department_ID` int(15) DEFAULT NULL,
  `Password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_ID`, `Name`, `Email`, `Department_ID`, `Password`) VALUES
(230502001, 'Shreya Bhavsar', 'shreyabhavsar@gmail.com', 502, 230502001),
(230502002, 'Vraj Bhavsar', 'vrajbhavsar@gmail.com', 502, 230502002),
(230502003, 'Kritika Patel', 'kritikapatel@gmail.com', 502, 230502003),
(230502004, 'Rohti Rana', 'rohtirana@gmail.com', 502, 230502004),
(230502005, 'Varnu Parmar', 'varnuparmar@gmail.com', 502, 230502005),
(230502006, 'Diya Bhatt', 'diyabhatt@gmail.com', 502, 230502006),
(230502007, 'Moksha Dargi', 'mokshadargi@gmail.com', 502, 230502007),
(230502008, 'Jay Prajapati', 'jayprajapati@gmail.com', 502, 230502008),
(230502009, 'Vidhi Dave', 'vidhidave@gmail.com', 502, 230502009),
(230502010, 'Jasika Gupta', 'jasikagupta@gmail.com', 502, 230502010),
(230502011, 'Hiral Kosti', 'hiralkosti@gmail.com', 502, 230502011),
(230502012, ' Tina Jain', 'tinajain@gmail.com', 502, 230502012),
(230502013, 'Raj Patel', 'rajpatel@gmail.com', 502, 230502013),
(230502014, 'Hanee More', 'haneemore@gmail.com', 502, 230502014),
(230502015, 'Anjli Patel', 'anjlipatel@gmail.com', 502, 230502015),
(230502016, 'Krisha Patel', 'krishapatel@gmail.com', 502, 230502016),
(230502017, 'Krishna Parmar', 'krishnaparmar@gmail.com', 502, 230502017),
(230502018, 'Bhavy Patel', 'bhavypatel@gmail.com', 502, 230502018),
(230502019, 'Ram Parmar', 'ramparmar@gmail.com', 502, 230502019),
(230502020, 'Rudhra Patel', 'rudhrapatel@gmail.com', 502, 230502020),
(230502021, 'Navya Shah', 'navyashah@gmail.com', 502, 230502021),
(230502022, ' Pooja Bharti', 'poojabharti@gmail.com', 502, 230502022),
(230502023, ' Khushi Rajput', 'khushirajput@gmail.com', 502, 230502023),
(230502024, 'Tarang Ranipa', 'tarangranipa@gmail.com', 502, 230502024),
(230502025, ' Anjli Prajapati', 'anjliprajapati@gmail.com', 502, 230502025),
(230502026, ' Pratvi Shah', 'pratvishah@gmail.com', 502, 230502026),
(230502027, '  Honey Dave', 'honeydave@gmail.com', 502, 230502027),
(230502028, '   Khushi Shah', 'khushishah@gmail.com', 502, 230502028),
(230502029, '   Devika Prajapati ', 'devikaprajapati@gmail.com', 502, 230502029),
(230502030, '   Vedika Prajapati ', 'vedikaprajapati@gmail.com', 502, 230502030),
(230502031, 'a', 'h@gmail.com', 502, 230502031),
(230502032, 'ParshvaShah', 'p@gmail.co', 502, 230502032),
(230502033, 'par', 'p@gmail.co', 502, 230502033),
(230502034, 'Parshva Shah', 'p@gmail.co', 502, 230502034),
(230504001, '   Hiral Shah ', 'hiralshah@gmail.com', 504, 230504001),
(230504002, '   Aayush Shah ', 'aayushshah@gmail.com', 504, 230504002),
(230504003, 'Vinesh Parikh', 'vineshparikh@gmail.com', 504, 230504003),
(230504004, 'Neev Patle', 'neevpatle@gmail.com', 504, 230504004),
(230504005, ' Moksh Shah', 'mokshshah@gmail.com', 504, 230504005),
(230504006, 'Ved Prajapati', 'vedprajapati@gmail.com', 504, 230504006),
(230504007, 'Riya Thakkar', 'riyathakkar@gmail.com', 504, 230504007),
(230504008, 'Riyanshi Popat', 'riyanshipopat@gmail.com', 504, 230504008),
(230504009, 'Arya Shah', 'aryashah@gmail.com', 504, 230504009),
(230504010, 'Arya Sharma', 'aryasharma@gmail.com', 504, 230504010),
(230504011, 'Pransi Shah', 'pransishah@gmail.com', 504, 230504011),
(230504012, 'Krrish Rana', 'krrishrana@gmail.com', 504, 230504012),
(230504013, 'Dhruvansh Porwal', 'dhruvanshporwal@gmail.com', 504, 230504013),
(230504014, 'Mahi Porwal', 'mahiporwal@gmail.com', 504, 230504014),
(230504015, 'Pooja Rana', 'poojarana@gmail.com', 504, 230504015),
(230504016, ' Ashish Parmar', 'ashishparmar@gmail.com', 504, 230504016),
(230504017, 'Jaydeep Solanki', 'jaydeepsolanki@gmail.com', 504, 230504017),
(230504018, ' Hardik Parmar', 'hardikparmar@gmail.com', 504, 230504018),
(230504019, 'Panthi Sarshiya', 'panthisarshiya@gmail.com', 504, 230504019),
(230504020, 'Vedanshi Patel', 'vedanshipatel@gmail.com', 504, 230504020),
(230504021, 'Disha Praram', 'dishapraram@gmail.com', 504, 230504021),
(230504022, 'Isha Bharti', 'ishabharti@gmail.com', 504, 230504022),
(230504023, 'Ansh Bharti', 'anshbharti@gmail.com', 504, 230504023),
(230504024, 'Smit Vyas', 'smitvyas@gmail.com', 504, 230504024),
(230504025, 'Ansh Vyas', 'anshvyas@gmail.com', 504, 230504025);

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `before_delete_students` BEFORE DELETE ON `students` FOR EACH ROW BEGIN
    INSERT INTO students_backup (Student_ID, Name, Email, Department_ID, password)
    VALUES (OLD.Student_ID, OLD.Name, OLD.Email, OLD.Department_ID, OLD.password);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_class_on_student_remove` BEFORE DELETE ON `students` FOR EACH ROW BEGIN
    DELETE FROM class WHERE Student_ID = OLD.Student_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `students_backup`
--

CREATE TABLE `students_backup` (
  `Student_ID` int(15) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Department_ID` int(15) DEFAULT NULL,
  `Password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject_material`
--

CREATE TABLE `subject_material` (
  `Material_ID` int(15) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Upload_Date` varchar(10) NOT NULL,
  `Faculty_ID` int(15) DEFAULT NULL,
  `Course_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_material`
--

INSERT INTO `subject_material` (`Material_ID`, `Title`, `Upload_Date`, `Faculty_ID`, `Course_ID`) VALUES
(50201, 'DS Notes', '3-11-25', 105, 25020401),
(50202, 'DS Assignment', '3-11-25', 105, 25020401),
(50203, 'CSO Notes', '3-11-25', 109, 25020402),
(50204, 'CSO Assignment', '3-11-25', 109, 25020402),
(50205, 'WT Notes', '3-11-25', 107, 25020403),
(50206, 'WT Assignment ', '3-11-25', 107, 25020403),
(50207, 'ADBMS Notes', '3-11-25', 106, 25020404),
(50208, 'ADBMS Assignment', '3-11-25', 106, 25020404),
(50209, 'SE Notes', '3-11-25', 112, 25020405),
(50210, 'SE Assignment ', '3-11-25', 112, 25020405),
(50401, 'DS Notes', '3-11-25', 105, 25040401),
(50402, 'DS Assignment', '3-11-25', 105, 25040401),
(50403, 'ICT Notes', '3-11-25', 111, 25040402),
(50404, 'ICT Assignment', '3-11-25', 111, 25040402),
(50405, 'WT Notes', '3-11-25', 114, 25040403),
(50406, 'WT Assignment', '3-11-25', 114, 25040403),
(50407, 'ADBMS Notes', '3-11-25', 115, 25040404),
(50408, 'ADBMS Assignment', '3-11-25', 115, 25040404),
(50409, 'SE Notes', '3-11-25', 112, 25040405),
(50410, 'SE Assignment', '3-11-25', 112, 25040405);

-- --------------------------------------------------------

--
-- Table structure for table `subject_material_history`
--

CREATE TABLE `subject_material_history` (
  `Material_ID` int(15) NOT NULL,
  `Title` varchar(20) NOT NULL,
  `Upload_Date` varchar(10) NOT NULL,
  `Faculty_ID` int(15) DEFAULT NULL,
  `Course_ID` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD KEY `Faculty_ID` (`Faculty_ID`),
  ADD KEY `Student_ID` (`Student_ID`),
  ADD KEY `fk_class_department` (`Department_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `HOD_ID` (`HOD_ID`);

--
-- Indexes for table `cvallow`
--
ALTER TABLE `cvallow`
  ADD KEY `Course_ID` (`Course_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Faculty_ID`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `HOD_ID` (`HOD_ID`);

--
-- Indexes for table `fpath`
--
ALTER TABLE `fpath`
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`HOD_ID`),
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `ipath`
--
ALTER TABLE `ipath`
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `subject_material`
--
ALTER TABLE `subject_material`
  ADD PRIMARY KEY (`Material_ID`),
  ADD KEY `Faculty_ID` (`Faculty_ID`),
  ADD KEY `Course_ID` (`Course_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`Student_ID`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`Faculty_ID`) REFERENCES `faculty` (`Faculty_ID`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`Student_ID`) REFERENCES `students` (`Student_ID`),
  ADD CONSTRAINT `fk_class_department` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`HOD_ID`) REFERENCES `hod` (`HOD_ID`);

--
-- Constraints for table `cvallow`
--
ALTER TABLE `cvallow`
  ADD CONSTRAINT `cvallow_ibfk_1` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`) ON DELETE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`),
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`HOD_ID`) REFERENCES `hod` (`HOD_ID`);

--
-- Constraints for table `fpath`
--
ALTER TABLE `fpath`
  ADD CONSTRAINT `fpath_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`Course_ID`);

--
-- Constraints for table `hod`
--
ALTER TABLE `hod`
  ADD CONSTRAINT `hod_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`);

--
-- Constraints for table `ipath`
--
ALTER TABLE `ipath`
  ADD CONSTRAINT `ipath_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`Course_ID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`);

--
-- Constraints for table `subject_material`
--
ALTER TABLE `subject_material`
  ADD CONSTRAINT `subject_material_ibfk_1` FOREIGN KEY (`Faculty_ID`) REFERENCES `faculty` (`Faculty_ID`),
  ADD CONSTRAINT `subject_material_ibfk_2` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
