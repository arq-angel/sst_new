-- --------------------------------------------------------

--
-- Table structure for table `coursesubject`
--

DROP TABLE IF EXISTS `coursesubject`;
CREATE TABLE IF NOT EXISTS `coursesubject` (
    `courseSubjectId` bigint NOT NULL,
    `courseId` bigint NOT NULL,
    `subjectId` bigint NOT NULL,
    PRIMARY KEY (`courseId`,`subjectId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstapplication`
--

DROP TABLE IF EXISTS `sstapplication`;
CREATE TABLE IF NOT EXISTS `sstapplication` (
    `applicationId` bigint NOT NULL AUTO_INCREMENT,
    `studentId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    `applicantCountry` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `courseId` bigint NOT NULL,
    `branchId` bigint DEFAULT NULL,
    `unitId` bigint DEFAULT NULL,
    `applicationDate` date DEFAULT NULL,
    `applicationStatus` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `applicationDocuments` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `applicationDocumentsPath` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `applicationComments` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `applicationReviewedBy` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `applicationReviewedAt` timestamp NULL DEFAULT NULL,
    `applicationCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `applicationUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`applicationId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstbranch`
--

DROP TABLE IF EXISTS `sstbranch`;
CREATE TABLE IF NOT EXISTS `sstbranch` (
    `branchId` bigint NOT NULL AUTO_INCREMENT,
    `branchName` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `branchCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `branchLocation` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `branchEstdDate` date DEFAULT NULL,
    `collegeId` bigint NOT NULL,
    `branchDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `branchContact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `branchEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `branchPhone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    `branchFacilities` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `branchCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `branchUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`branchId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstcollege`
--

DROP TABLE IF EXISTS `sstcollege`;
CREATE TABLE IF NOT EXISTS `sstcollege` (
    `collegeId` bigint NOT NULL AUTO_INCREMENT,
    `collegeName` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `collegeAbbreviation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegeWebsite` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegeAddress` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegeCountry` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegeDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `collegeAffiliation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegeAccreditationBody` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegeCampusLocation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegeTotalStudents` int DEFAULT NULL,
    `collegeContact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegeEmail` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegePhone` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegePublicEmail` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `CollegeAdmissionWebsite` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `collegeCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `collegeUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`collegeId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstcourse`
--

DROP TABLE IF EXISTS `sstcourse`;
CREATE TABLE IF NOT EXISTS `sstcourse` (
    `courseId` bigint NOT NULL AUTO_INCREMENT,
    `collegeId` bigint DEFAULT NULL,
    `courseName` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `courseCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `durationId` bigint DEFAULT NULL,
    `courseLevel` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `courseFacultyId` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `courseDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `courseSyllabus` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `courseTotalCredits` int DEFAULT NULL,
    `courseFees` decimal(10,2) NOT NULL DEFAULT '0.00',
    `scholarshipId` bigint DEFAULT NULL,
    `courseDelivery` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `courseCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `courseUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`courseId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstcrm`
--

DROP TABLE IF EXISTS `sstcrm`;
CREATE TABLE IF NOT EXISTS `sstcrm` (
    `customerId` bigint NOT NULL AUTO_INCREMENT,
    `userId` bigint NOT NULL,
    `customerName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `customerEmail` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `customerPhone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `customerAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `customerCity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `customerCountry` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `customerMessage` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `customerCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `customerUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`customerId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstfaculty`
--

DROP TABLE IF EXISTS `sstfaculty`;
CREATE TABLE IF NOT EXISTS `sstfaculty` (
    `facultyId` bigint NOT NULL AUTO_INCREMENT,
    `collegeId` bigint NOT NULL,
    `facultyName` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `facultyAbbreviation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `facultyAbbreviation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `facultyHOD` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `facultyDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `facultyContact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `facultyEmail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `facultyPhone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `facultyCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `facultyUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`facultyId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstduration`
--

DROP TABLE IF EXISTS `sstduration`;
CREATE TABLE IF NOT EXISTS `sstduration` (
    `durationId` bigint NOT NULL AUTO_INCREMENT,
    `durationName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `durationDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `durationTime` int NOT NULL,
    `durationCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `durationUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`durationId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstlog`
--

DROP TABLE IF EXISTS `sstlog`;
CREATE TABLE IF NOT EXISTS `sstlog` (
    `logId` bigint NOT NULL AUTO_INCREMENT,
    `logQuery` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `logDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `queryExecutionTime` decimal(10,4) DEFAULT NULL,
    `queryisSuccessful` tinyint DEFAULT NULL,
    `queryerrorMessage` text COLLATE utf8mb4_unicode_ci,
    `queryCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `queryUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`logId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstmember`
--

DROP TABLE IF EXISTS `sstmember`;
CREATE TABLE IF NOT EXISTS `sstmember` (
    `memberId` bigint NOT NULL AUTO_INCREMENT,
    `memberEmail` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `memberPassword` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `memberIsActive` tinyint DEFAULT NULL,
    `memberIsVerified` tinyint DEFAULT NULL,
    `memberIsBlocked` tinyint DEFAULT NULL,
    `memberLaPaChanged` date DEFAULT NULL,
    `memberCreated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `memberUpdated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`memberId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstnotification`
--

DROP TABLE IF EXISTS `sstnotification`;
CREATE TABLE IF NOT EXISTS `sstnotification` (
    `notificationId` bigint NOT NULL AUTO_INCREMENT,
    `notificationMessage` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `userRoleId` bigint DEFAULT NULL,
    `notificationCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `notificationUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`notificationId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstprofile`
--

DROP TABLE IF EXISTS `sstprofile`;
CREATE TABLE IF NOT EXISTS `sstprofile` (
    `profileId` bigint NOT NULL AUTO_INCREMENT,
    `associatingId` bigint NOT NULL COMMENT 'ID associated with sstuser and sststudent table',
    `profileName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `profilePhone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `profileAddress` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `profileCountry` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `profileCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `profileUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`profileId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstscholarship`
--

DROP TABLE IF EXISTS `sstscholarship`;
CREATE TABLE IF NOT EXISTS `sstscholarship` (
    `scholarshipId` bigint NOT NULL AUTO_INCREMENT,
    `scholarshipName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `scholarshipDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `scholarshipAmount` decimal(10,2) NOT NULL,
    `eligibilityCriteria` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `applicationDeadline` date DEFAULT NULL,
    `awardDate` date DEFAULT NULL,
    `scholarshipCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `scholarshipUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`scholarshipId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstsession`
--

DROP TABLE IF EXISTS `sstsession`;
CREATE TABLE IF NOT EXISTS `sstsession` (
    `sessionId` bigint NOT NULL AUTO_INCREMENT,
    `sessionName` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `sessionFee` decimal(10,2) NOT NULL DEFAULT '0.00',
    `courseId` bigint DEFAULT NULL,
    `termId` bigint DEFAULT NULL,
    `sessionDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `sessionYear` int DEFAULT NULL,
    `sessionStartDate` date DEFAULT NULL,
    `sessionEndDate` date DEFAULT NULL,
    `sessionCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `sessionUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`sessionId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sststudent`
--

DROP TABLE IF EXISTS `sststudent`;
CREATE TABLE IF NOT EXISTS `sststudent` (
    `studentSN` bigint NOT NULL AUTO_INCREMENT,
    `studentId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    `studentFirstName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `studentLastName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `studentRollNumber` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `studentEmail` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `studentPassword` varchar(248) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `studentPhone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `studentAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `studentCity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `studentCountry` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `studentBirthDate` date DEFAULT NULL,
    `studentGender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `studentIsActive` tinyint DEFAULT NULL,
    `studentIsVerified` tinyint DEFAULT NULL,
    `studentIsBlocked` tinyint DEFAULT NULL,
    `studentCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `studentUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`studentId`),
    UNIQUE KEY `uniqueStudentSN` (`studentSN`),
    UNIQUE KEY `uniqueStudentId` (`studentId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstsubject`
--

DROP TABLE IF EXISTS `sstsubject`;
CREATE TABLE IF NOT EXISTS `sstsubject` (
    `subjectId` bigint NOT NULL,
    `subjectName` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `subjectDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `subjectCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `subjectUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`subjectId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstterm`
--

DROP TABLE IF EXISTS `sstterm`;
CREATE TABLE IF NOT EXISTS `sstterm` (
    `termId` bigint NOT NULL AUTO_INCREMENT,
    `termName` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `termStartDate` date DEFAULT NULL,
    `termEndDate` date DEFAULT NULL,
    `termAcademicYear` int DEFAULT NULL,
    `termCapacity` int DEFAULT NULL,
    `termDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `termCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `termUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`termId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstunit`
--

DROP TABLE IF EXISTS `sstunit`;
CREATE TABLE IF NOT EXISTS `sstunit` (
    `unitId` bigint NOT NULL AUTO_INCREMENT,
    `unitName` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `unitCode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `facultyId` bigint DEFAULT NULL,
    `unitCapacity` int DEFAULT NULL,
    `unitDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `unitCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `unitUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`unitId`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sstuser`
--

DROP TABLE IF EXISTS `sstuser`;
CREATE TABLE IF NOT EXISTS `sstuser` (
    `userSN` bigint NOT NULL AUTO_INCREMENT,
    `userId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    `userFirstName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `userLastName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `userEmail` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `userPassword` varchar(248) COLLATE utf8mb4_unicode_ci NOT NULL,
    `userPhone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `userAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `userCity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `userCountry` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `userBirthDate` date DEFAULT NULL,
    `userAge` int DEFAULT NULL,
    `userGender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `userIsActive` tinyint DEFAULT NULL,
    `userIsVerified` tinyint DEFAULT NULL,
    `userIsBlocked` tinyint DEFAULT NULL,
    `userLaPaChanged` date DEFAULT NULL,
    `isAdmin` tinyint DEFAULT '0',
    `userCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `userUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`userId`),
    UNIQUE KEY `uniqueUserSN` (`userSN`),
    UNIQUE KEY `uniqueUserId` (`userId`)
    ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sstuser`
--

INSERT INTO `sstuser` (`userSN`, `userId`, `userFirstName`, `userLastName`, `userEmail`, `userPassword`, `userPhone`, `userAddress`, `userCity`, `userCountry`, `userBirthDate`, `userAge`, `userGender`, `userIsActive`, `userIsVerified`, `userIsBlocked`, `userLaPaChanged`, `isAdmin`, `userCreatedAt`, `userUpdatedAt`)
VALUES
    (2, 'I0000001', 'Colby', 'Sampson', 'fituwa@mailinator.com', 'Pa$$w0rd!', '+1 (765) 703-83', 'Illum delectus et', NULL, 'Australia', NULL, 23, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-11 12:45:25', '2024-03-11 12:45:25'),
    (16, 'I0000002', 'Ora', 'Ferrell', 'colahypef@mailinator.com', 'Pa$$w0rd!', '+1 (385) 234-49', 'Velit incidunt aut', NULL, 'India', NULL, 44, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-11 13:03:44', '2024-03-11 13:03:44'),
    (14, 'I0000003', 'Liberty', 'Hale', 'lufujehig@mailinator.com', 'Pa$$w0rd!', '+1 (823) 399-91', 'Cillum impedit mini', NULL, 'Philippines', NULL, 43, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-11 13:02:46', '2024-03-11 13:02:46'),
    (13, 'I0000004', 'Liberty', 'Hale', 'lufujehig@mailinator.com', 'Pa$$w0rd!', '+1 (823) 399-91', 'Cillum impedit mini', NULL, 'Philippines', NULL, 43, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-11 13:02:46', '2024-03-11 13:02:46'),
    (10, 'I0000005', 'Otto', 'Tran', 'xysanorute@mailinator.com', 'Pa$$w0rd!', '+1 (738) 856-62', 'Qui culpa expedita q', NULL, 'Nepal', NULL, 39, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-11 13:00:47', '2024-03-11 13:00:47'),
    (11, 'I0000006', 'Peter', 'Heath', 'bofih@mailinator.com', 'Pa$$w0rd!', '+1 (381) 446-20', 'Quas autem esse est', NULL, 'Philippines', NULL, 26, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-11 13:00:58', '2024-03-11 13:00:58'),
    (12, 'I0000007', 'Peter', 'Heath', 'bofih@mailinator.com', 'Pa$$w0rd!', '+1 (381) 446-20', 'Quas autem esse est', NULL, 'Philippines', NULL, 26, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-11 13:00:58', '2024-03-11 13:00:58'),
    (15, 'I0000008', 'Ora', 'Ferrell', 'colahypef@mailinator.com', 'Pa$$w0rd!', '+1 (385) 234-49', 'Velit incidunt aut', NULL, 'India', NULL, 44, NULL, NULL, NULL, NULL, NULL, 0, '2024-03-11 13:03:44', '2024-03-11 13:03:44'),
    (1, 'I1000001', 'Arjun', '', 'abc@def.com', 'abc123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-03-06 12:13:02', '2024-03-06 12:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `sstuserrole`
--

DROP TABLE IF EXISTS `sstuserrole`;
CREATE TABLE IF NOT EXISTS `sstuserrole` (`userRoleId` bigint NOT NULL AUTO_INCREMENT,`userRole` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `userRoleDescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
    `userRoleCreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `userRoleUpdatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`userRoleId`)
    ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sstuserrole`
--

INSERT INTO `sstuserrole` (`userRoleId`, `userRole`, `userRoleDescription`, `userRoleCreatedAt`, `userRoleUpdatedAt`)
VALUES
    (1, 'Admin', 'Administrative role with full access.', '2024-03-05 04:25:28', '2024-03-05 04:25:28'),
    (2, 'Teacher', 'Educator or instructor role.', '2024-03-05 04:25:28', '2024-03-05 04:25:28'),
    (3, 'Student', 'Enrolled student role.', '2024-03-05 04:25:28', '2024-03-05 04:25:28'),
    (4, 'Staff', 'Non-teaching staff role with administrative responsibilities.', '2024-03-05 04:25:28', '2024-03-05 04:25:28'),
    (5, 'Consultant', 'Education consultant role with advisory responsibilities.', '2024-03-05 04:25:28', '2024-03-05 04:25:28'),
    (6, 'Client', 'Client or customer role seeking educational services.', '2024-03-05 04:25:28', '2024-03-05 04:25:28'),
    (7, 'Support', 'Support staff role providing assistance to clients.', '2024-03-05 04:25:28', '2024-03-05 04:25:28');
COMMIT;
