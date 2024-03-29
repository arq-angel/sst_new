<?php

declare(strict_types=1);

namespace App\config;

class DBConstants
{


// FORMNAMES : initial assignment of various form names
    const FORMNAMES = [
        'coursesubject' => 'coursesubject',
        'application' => 'application',
        'branch' => 'branch',
        'college' => 'college',
        'course' => 'course',
        'crm' => 'crm',
        'faculty' => 'faculty',
        'duration' => 'duration',
        'log' => 'log',
        'member' => 'member',
        'notification' => 'notification',
        'profile' => 'profile',
        'scholarship' => 'scholarship',
        'session' => 'session',
        'student' => 'student',
        'subject' => 'subject',
        'term' => 'term',
        'unit' => 'unit',
        'user' => 'user',
        'userrole' => 'userrole',

    ];

// DBTABLELIST : database table names with corresponding form names
    const DBTABLELIST = [
        'coursesubjects' => self::FORMNAMES['coursesubject'],
        'sstapplication' => self::FORMNAMES['application'],
        'sstbranch' => self::FORMNAMES['branch'],
        'sstcourse' => self::FORMNAMES['course'],
        'sstsubject' => self::FORMNAMES['subject'],
        'sstduration' => self::FORMNAMES['duration'],
        'sstterm' => self::FORMNAMES['term'],
        'sstunit' => self::FORMNAMES['unit'],
        'sstnotification' => self::FORMNAMES['notification'],
        'sstprofile' => self::FORMNAMES['profile'],
        'sstscholarship' => self::FORMNAMES['scholarship'],
        'sstsession' => self::FORMNAMES['session'],
        'sstlog' => self::FORMNAMES['log'],
        'sstfaculty' => self::FORMNAMES['faculty'],
        'sstcrm' => self::FORMNAMES['crm'],
        'sstcollege' => self::FORMNAMES['college'],
        'sststudent' => self::FORMNAMES['student'],
        'sstmember' => self::FORMNAMES['member'],
        'sstuser' => self::FORMNAMES['user'],
        'sstuserrole' => self::FORMNAMES['userrole'],
    ];

    // primary key / id of the table
    const IDIDENTIFIER = [
        'coursesubject' => 'coursesubjectsId',
        'application' => 'applicationId',
        'branch' => 'branchId',
        'college' => 'collegeId',
        'course' => 'courseId',
        'crm' => 'crmId',
        'faculty' => 'facultyId',
        'duration' => 'durationId',
        'logs' => 'logId',
        'member' => 'memberId',
        'notification' => 'notificationId',
        'profile' => 'profileId',
        'scholarship' => 'scholarshipId',
        'session' => 'sessionId',
        'student' => 'studentSN',
        'subject' => 'subjectId',
        'term' => 'termId',
        'unit' => 'unitId',
        'user' => 'userSN',
        'userrole' => 'userroleId',
    ];

// DBFIELDLIST : field list assigned to form names received from DBTABLELIST that receives from FORMNAMES
// with all field names listed
    const DBFIELDLIST = [
        self::DBTABLELIST['coursesubjects'] => [
            'courseId' => 'courseId',
            'subjectId' => 'subjectId',
        ],
        self::DBTABLELIST['sstapplication'] => [
            'applicationId' => 'applicationId',
            'studentId' => 'studentId',
            'applicantCountry' => 'applicantCountry',
            'courseId' => 'courseId',
            'branchId' => 'branchId',
            'unitId' => 'unitId',
            'applicationDate' => 'applicationDate',
            'applicationStatus' => 'applicationStatus',
            'applicationDocuments' => 'applicationDocuments',
            'applicationDocumentsPath' => 'applicationDocumentsPath',
            'applicationComments' => 'applicationComments',
            'applicationReviewedBy' => 'applicationReviewedBy',
            'applicationReviewedAt' => 'applicationReviewedAt',
//            'applicationCreatedAt' => 'applicationCreatedAt',
            'applicationUpdatedAt' => 'applicationUpdatedAt',
        ],
        self::DBTABLELIST['sstbranch'] => [
            'branchId' => 'branchId',
            'branchName' => 'branchName',
            'branchCode' => 'branchCode',
            'branchLocation' => 'branchLocation',
            'branchEstdDate' => 'branchEstdDate',
            'collegeId' => 'collegeId',
            'branchDescription' => 'branchDescription',
            'branchContact' => 'branchContact',
            'branchEmail' => 'branchEmail',
            'branchPhone' => 'branchPhone',
            'branchFacilities' => 'branchFacilities',
//            'branchCreatedAt' => 'branchCreatedAt',
            'branchUpdatedAt' => 'branchUpdatedAt',
        ],
        self::DBTABLELIST['sstcollege'] => [
            'collegeId' => 'collegeId',
            'collegeName' => 'collegeName',
            'collegeAbbreviation' => 'collegeAbbreviation',
            'collegeWebsite' => 'collegeWebsite',
            'collegeAddress' => 'collegeAddress',
            'collegeCountry' => 'collegeCountry',
            'collegeDescription' => 'collegeDescription',
            'collegeAffiliation' => 'collegeAffiliation',
            'collegeAccreditationBody' => 'collegeAccreditationBody',
            'collegeCampusLocation' => 'collegeCampusLocation',
            'collegeTotalStudents' => 'collegeTotalStudents',
            'collegeContact' => 'collegeContact',
            'collegeEmail' => 'collegeEmail',
            'collegePhone' => 'collegePhone',
            'collegePublicEmail' => 'collegePublicEmail',
            'CollegeAdmissionWebsite' => 'CollegeAdmissionWebsite',
//            'collegeCreatedAt' => 'collegeCreatedAt',
            'collegeUpdatedAt' => 'collegeUpdatedAt',
        ],
        self::DBTABLELIST['sstcourse'] => [
            'courseId' => 'courseId',
            'collegeId' => 'collegeId',
            'courseName' => 'courseName',
            'courseCode' => 'courseCode',
            'durationId' => 'durationId',
            'courseLevel' => 'courseLevel',
            'courseFacultyId' => 'courseFacultyId',
            'courseDescription' => 'courseDescription',
            'courseSyllabus' => 'courseSyllabus',
            'courseTotalCredits' => 'courseTotalCredits',
            'courseFees' => 'courseFees',
            'scholarshipId' => 'scholarshipId',
            'courseDelivery' => 'courseDelivery',
//            'courseCreatedAt' => 'courseCreatedAt',
            'courseUpdatedAt' => 'courseUpdatedAt',
        ],
        self::DBTABLELIST['sstcrm'] => [
            'customerId' => 'customerId',
            'userId' => 'userId',
            'customerName' => 'customerName',
            'customerEmail' => 'customerEmail',
            'customerPhone' => 'customerPhone',
            'customerAddress' => 'customerAddress',
            'customerCity' => 'customerCity',
            'customerCountry' => 'customerCountry',
            'customerMessage' => 'customerMessage',
//            'customerCreatedAt' => 'customerCreatedAt',
            'customerUpdatedAt' => 'customerUpdatedAt',
        ],
        self::DBTABLELIST['sstfaculty'] => [
            'facultyId' => 'facultyId',
            'collegeId' => 'collegeId',
            'facultyName' => 'facultyName',
            'facultyAbbreviation' => 'facultyAbbreviation',
            'facultyHOD' => 'facultyHOD',
            'facultyDescription' => 'facultyDescription',
            'facultyContact' => 'facultyContact',
            'facultyEmail' => 'facultyEmail',
            'facultyPhone' => 'facultyPhone',
//            'facultyCreatedAt' => 'facultyCreatedAt',
            'facultyUpdatedAt' => 'facultyUpdatedAt',
        ],
        self::DBTABLELIST['sstduration'] => [
            'durationId' => 'durationId',
            'durationName' => 'durationName',
            'durationDescription' => 'durationDescription',
            'durationTime' => 'durationTime',
//            'durationCreatedAt' => 'durationCreatedAt',
            'durationUpdatedAt' => 'durationUpdatedAt',
        ],
        self::DBTABLELIST['sstlog'] => [
            'logId' => 'logId',
            'logQuery' => 'logQuery',
            'logDate' => 'logDate',
            'queryExecutionTime' => 'queryExecutionTime',
            'queryisSuccessful' => 'queryisSuccessful',
            'queryerrorMessage' => 'queryerrorMessage',
//            'queryCreatedAt' => 'queryCreatedAt',
            'queryUpdatedAt' => 'queryUpdatedAt',
        ],
        self::DBTABLELIST['sstmember'] => [
            'memberId' => 'memberId',
            'memberEmail' => 'memberEmail',
            'memberPassword' => 'memberPassword',
            'memberIsActive' => 'memberIsActive',
            'memberIsVerified' => 'memberIsVerified',
            'memberIsBlocked' => 'memberIsBlocked',
            'memberLaPaChanged' => 'memberLaPaChanged',
//            'memberCreated_at' => 'memberCreated_at',
            'memberUpdated_at' => 'memberUpdated_at',
        ],
        self::DBTABLELIST['sstnotification'] => [
            'notificationId' => 'notificationId',
            'notificationMessage' => 'notificationMessage',
            'userRoleId' => 'userRoleId',
//            'notificationCreatedAt' => 'notificationCreatedAt',
            'notificationUpdatedAt' => 'notificationUpdatedAt',
        ],
        self::DBTABLELIST['sstprofile'] => [
            'profileId' => 'profileId',
            'associatingId' => 'associatingId',
            'profileName' => 'profileName',
            'profilePhone' => 'profilePhone',
            'profileAddress' => 'profileAddress',
            'profileCountry' => 'profileCountry',
//            'profileCreatedAt' => 'profileCreatedAt',
            'profileUpdatedAt' => 'profileUpdatedAt',
        ],
        self::DBTABLELIST['sstscholarship'] => [
            'scholarshipId' => 'scholarshipId',
            'scholarshipName' => 'scholarshipName',
            'scholarshipDescription' => 'scholarshipDescription',
            'scholarshipAmount' => 'scholarshipAmount',
            'eligibilityCriteria' => 'eligibilityCriteria',
            'applicationDeadline' => 'applicationDeadline',
            'awardDate' => 'awardDate',
//            'scholarshipCreatedAt' => 'scholarshipCreatedAt',
            'scholarshipUpdatedAt' => 'scholarshipUpdatedAt',
        ],
        self::DBTABLELIST['sstsession'] => [
            'sessionId' => 'sessionId',
            'sessionName' => 'sessionName',
            'sessionFee' => 'sessionFee',
            'courseId' => 'courseId',
            'termId' => 'termId',
            'sessionDescription' => 'sessionDescription',
            'sessionYear' => 'sessionYear',
            'sessionStartDate' => 'sessionStartDate',
            'sessionEndDate' => 'sessionEndDate',
//            'sessionCreatedAt' => 'sessionCreatedAt',
            'sessionUpdatedAt' => 'sessionUpdatedAt',
        ],
        self::DBTABLELIST['sststudent'] => [
//        'studentSN' => 'studentSN',
            'studentId' => 'studentId',
            'studentFirstName' => 'studentFirstName',
            'studentLastName' => 'studentLastName',
            'studentRollNumber' => 'studentRollNumber',
            'studentEmail' => 'studentEmail',
            'studentPassword' => 'studentPassword',
            'studentPhone' => 'studentPhone',
            'studentAddress' => 'studentAddress',
            'studentCity' => 'studentCity',
            'studentCountry' => 'studentCountry',
            'studentBirthDate' => 'studentBirthDate',
            'studentGender' => 'studentGender',
            'studentFilePath' => 'studentFilePath',
            'studentIsActive' => 'studentIsActive',
            'studentIsVerified' => 'studentIsVerified',
            'studentIsBlocked' => 'studentIsBlocked',
//            'studentCreatedAt' => 'studentCreatedAt',
            'studentUpdatedAt' => 'studentUpdatedAt',
        ],
        self::DBTABLELIST['sstsubject'] => [
            'subjectId' => 'subjectId',
            'subjectName' => 'subjectName',
            'subjectDescription' => 'subjectDescription',
//            'subjectCreatedAt' => 'subjectCreatedAt',
            'subjectUpdatedAt' => 'subjectUpdatedAt',
        ],
        self::DBTABLELIST['sstterm'] => [
            'termId' => 'termId',
            'termName' => 'termName',
            'termStartDate' => 'termStartDate',
            'termEndDate' => 'termEndDate',
            'termAcademicYear' => 'termAcademicYear',
            'termCapacity' => 'termCapacity',
            'termDescription' => 'termDescription',
//            'termCreatedAt' => 'termCreatedAt',
            'termUpdatedAt' => 'termUpdatedAt',
        ],
        self::DBTABLELIST['sstunit'] => [
            'unitId' => 'unitId',
            'unitName' => 'unitName',
            'unitCode' => 'unitCode',
            'facultyId' => 'facultyId',
            'unitCapacity' => 'unitCapacity',
            'unitDescription' => 'unitDescription',
//            'unitCreatedAt' => 'unitCreatedAt',
            'unitUpdatedAt' => 'unitUpdatedAt',
        ],
        self::DBTABLELIST['sstuser'] => [
            'userSN' => 'userSN',
            'userId' => 'userId',
            'userFirstName' => 'userFirstName',
            'userLastName' => 'userLastName',
            'userEmail' => 'userEmail',
            'userPassword' => 'userPassword',
            'userPhone' => 'userPhone',
            'userAddress' => 'userAddress',
            'userCity' => 'userCity',
            'userCountry' => 'userCountry',
            'userBirthDate' => 'userBirthDate',
            'userAge' => 'userAge',
            'userGender' => 'userGender',
            'userIsActive' => 'userIsActive',
            'userIsVerified' => 'userIsVerified',
            'userIsBlocked' => 'userIsBlocked',
            'userLaPaChanged' => 'userLaPaChanged',
            'isAdmin' => 'isAdmin',
//            'userCreatedAt' => 'userCreatedAt',
            'userUpdatedAt' => 'userUpdatedAt'
        ],
        self::DBTABLELIST['sstuserrole'] => [
            'userRoleId' => 'userRoleId',
            'userRole' => 'userRole',
            'userRoleDescription' => 'userRoleDescription',
//            'userRoleCreatedAt' => 'userRoleCreatedAt',
            'userRoleUpdatedAt' => 'userRoleUpdatedAt',
        ],
    ];

}
