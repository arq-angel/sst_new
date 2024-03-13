<?php

declare(strict_types=1);

namespace App\Config;

class Fields
{

    const NAMEASSOC = [
        'collegeId' => [
            'fieldId' => 'collegeId',
            'fieldName' => 'collegeName',
            'controller' => 'college',
        ],
        'branchId' => [
            'fieldId' => 'branchId',
            'fieldName' => 'branchName',
            'controller' => 'branch',
        ],
        'facultyId' => [
            'fieldId' => 'facultyId',
            'fieldName' => 'facultyName',
            'controller' => 'faculty',
        ],
        'durationId' => [
            'fieldId' => 'durationId',
            'fieldName' => 'durationName',
            'controller' => 'duration',
        ],
        'courseId' => [
            'fieldId' => 'courseId',
            'fieldName' => 'courseName',
            'controller' => 'course',
        ],
        'unitId' => [
            'fieldId' => 'unitId',
            'fieldName' => 'unitName',
            'controller' => 'unit',
        ],
        'termId' => [
            'fieldId' => 'termId',
            'fieldName' => 'termName',
            'controller' => 'term',
        ],
        'sessionId' => [
            'fieldId' => 'sessionId',
            'fieldName' => 'sessionName',
            'controller' => 'session',
        ],
        'scholarshipId' => [
            'fieldId' => 'scholarshipId',
            'fieldName' => 'scholarshipName',
            'controller' => 'scholarship',
        ],
        'notificationId' => [
            'fieldId' => 'notificationId',
            'fieldName' => 'notificationName',
            'controller' => 'notification',
        ],
        'applicationId' => [
            'fieldId' => 'applicationId',
            'fieldName' => 'applicationName',
            'controller' => 'application',
        ],
        'studentId' => [
            'fieldId' => 'studentSN',
            // execeptional case for students viewAll
            'fieldName' => 'studentId',
            'controller' => 'student'
        ],
        'userId' => [
            'fieldId' => 'userSN',
            'fieldName' => 'userEmail',
            'controller' => 'user'
        ],
    ];

// add fieldNames here to omit from the add or edit form
    const HIDDENNAMEASSOC = [
        'studentId' => [
            'fieldId' => 'studentSN',
            'fieldName' => 'studentName',
            'controller' => 'student'
        ],
        'userId' => [
            'fieldId' => 'userSN',
            'fieldName' => 'userEmail',
            'controller' => 'user'
        ],
    ];



// add the fields in the following array to check the duplicate
    const UNIQUEFIELDS = [
        'college' => ['collegeName', 'collegeEmail', 'collegePublicEmail'],
        'branch' => [],
        'faculty' => [],
        'duration' => [],
        'course' => ['courseName', 'courseCode'],
        'unit' => [],
        'term' => [],
        'session' => [],
        'scholarship' => [],
        'notification' => [],
        'student' => ['studentId'],
        'application' => []
    ];

    const ACTIONS = ['add', 'edit', 'update', 'delete'];

    const FIELDTYPES = [
        'id' => ['type' => 'number', 'min' => 0, 'isRequired' => true],
        'text' => ['type' => 'text', 'isRequired' => true],
        'email' => ['type' => 'email', 'isRequired' => true],
        'password' => ['type' => 'password', 'isRequired' => true],
        'number' => ['type' => 'number', 'min' => 0, 'isRequired' => true],
        'ageNumber' => ['type' => 'number', 'min' => 15, 'max' => 150, 'isRequired' => true],
        'phoneNumber' => ['type' => 'tel', 'min' => 10, 'max' => 15, 'isRequired' => true],
        'money' => ['type' => 'number', 'min' => 0, 'step' => 0.01, 'isRequired' => true, 'placeholder' => 0.00],
        'months' => ['type' => 'number', 'min' => 12, 'isRequired' => true, 'placeholder' => 'months'],
        'year' => ['type' => 'number', 'min' => 2024, 'isRequired' => true],
        'date' => ['type' => 'date', 'isRequired' => true],
        'textarea' => ['type' => 'textarea', 'isRequired' => false],
        'select' => ['type' => 'select', 'isRequired' => true],
        'checkbox' => ['type' => 'checkbox', 'isRequired' => true],
        'radio' => ['type' => 'radio', 'isRequired' => true],
        'file' => ['type' => 'file', 'isRequired' => false, 'isMultiple' => true],
        'submit' => ['type' => 'submit', 'isRequired' => true],
        'reset' => ['type' => 'reset', 'isRequired' => false],
        'button' => ['type' => 'button', 'isRequired' => false],
        'hidden' => ['type' => 'hidden', 'isRequired' => false],
        'color' => ['type' => 'color', 'isRequired' => true],
        'time' => ['type' => 'time', 'isRequired' => true],
        'datetime' => ['type' => 'datetime', 'isRequired' => true],
        'month' => ['type' => 'month', 'isRequired' => true],
        'week' => ['type' => 'week', 'isRequired' => true],
        'url' => ['type' => 'url', 'isRequired' => true],
        'search' => ['type' => 'search', 'isRequired' => true],

    ];

    // don't leave trialing white space in 'label' value it is to trim properly during validation error messages
    const FIELD = [
        'college' => [
            'collegeName' => [
                'label' => 'Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'collegeAddress' => [
                'label' => 'Address:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'collegeCountry' => [
                'label' => 'Country:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'collegeEmail' => [
                'label' => 'Email:',
                'type' => self::FIELDTYPES['email']['type'],
                'isRequired' => self::FIELDTYPES['email']['isRequired'],
            ],
            'collegePhone' => [
                'label' => 'Phone:',
                'type' => self::FIELDTYPES['phoneNumber']['type'],
                'min' => self::FIELDTYPES['phoneNumber']['min'],
                'max' => self::FIELDTYPES['phoneNumber']['max'],
                'isRequired' => self::FIELDTYPES['phoneNumber']['isRequired'],
            ],
            'collegePublicEmail' => [
                'label' => 'Public Email:',
                'type' => self::FIELDTYPES['email']['type'],
                'isRequired' => self::FIELDTYPES['email']['isRequired'],
            ],
        ],
        'branch' => [
            'collegeId' => [
                'label' => 'College:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'branchName' => [
                'label' => 'Branch Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'branchLocation' => [
                'label' => 'Address:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'branchContact' => [
                'label' => 'Contact Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'branchPhone' => [
                'label' => 'Phone:',
                'min' => self::FIELDTYPES['phoneNumber']['min'],
                'max' => self::FIELDTYPES['phoneNumber']['max'],
                'type' => self::FIELDTYPES['phoneNumber']['type'],
                'isRequired' => self::FIELDTYPES['phoneNumber']['isRequired'],
            ],
            'branchEmail' => [
                'label' => 'Email:',
                'type' => self::FIELDTYPES['email']['type'],
                'isRequired' => self::FIELDTYPES['email']['isRequired'],
            ],
            'branchEstdDate' => [
                'label' => 'Establishment Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'branchFacilities' => [
                'label' => 'Facilities:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'branchDescription' => [
                'label' => 'Description:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
        ],
        'faculty' => [
            'collegeId' => [
                'label' => 'College:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'facultyName' => [
                'label' => 'Faculty Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'facultyAbbreviation' => [
                'label' => 'Abbreviation:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'facultyHOD' => [
                'label' => 'Head of Faculty:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'facultyContact' => [
                'label' => 'Contact Person:',
                'min' => self::FIELDTYPES['phoneNumber']['min'],
                'max' => self::FIELDTYPES['phoneNumber']['max'],
                'type' => self::FIELDTYPES['phoneNumber']['type'],
                'isRequired' => self::FIELDTYPES['phoneNumber']['isRequired'],
            ],
            'facultyPhone' => [
                'label' => 'Phone:',
                'min' => self::FIELDTYPES['phoneNumber']['min'],
                'max' => self::FIELDTYPES['phoneNumber']['max'],
                'type' => self::FIELDTYPES['phoneNumber']['type'],
                'isRequired' => self::FIELDTYPES['phoneNumber']['isRequired'],
            ],
            'facultyEmail' => [
                'label' => 'Email:',
                'type' => self::FIELDTYPES['email']['type'],
                'isRequired' => self::FIELDTYPES['email']['isRequired'],
            ],
            'facultyDescription' => [
                'label' => 'Description:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
        ],
        'duration' => [
            'durationName' => [
                'label' => 'Duration Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'durationValue' => [
                'label' => 'Duration Months:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'durationDescription' => [
                'label' => 'Duration Description:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
        ],
        'course' => [
            'collegeId' => [
                'label' => 'College:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'courseName' => [
                'label' => 'Course:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'courseCode' => [
                'label' => 'Code:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'courseDescription' => [
                'label' => 'Description:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'durationId' => [
                'label' => 'Duration:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'courseLevel' => [
                'label' => 'Level:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'courseDelivery' => [
                'label' => 'Delivery:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'courseFacultyId' => [
                'label' => 'Faculty:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'courseFees' => [
                'label' => 'Fee:',
                'type' => self::FIELDTYPES['money']['type'],
                'min' => self::FIELDTYPES['money']['min'],
                'step' => self::FIELDTYPES['money']['step'],
                'isRequired' => self::FIELDTYPES['money']['isRequired'],
                'placeholder' => self::FIELDTYPES['money']['placeholder'],
            ],
            'scholarshipId' => [
                'label' => 'Scholarship:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
        ],
        'student' => [
            'studentId' => [
                'label' => 'ID:',
                'type' => 'hidden',
                'isRequired' => self::FIELDTYPES['hidden']['isRequired'],
            ],
            'studentFirstName' => [
                'label' => 'First Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentLastName' => [
                'label' => 'Last Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentEmail' => [
                'label' => 'Email:',
                'type' => self::FIELDTYPES['email']['type'],
                'isRequired' => self::FIELDTYPES['email']['isRequired'],
            ],
            'studentPhone' => [
                'label' => 'Phone:',
                'min' => self::FIELDTYPES['phoneNumber']['min'],
                'max' => self::FIELDTYPES['phoneNumber']['max'],
                'type' => self::FIELDTYPES['phoneNumber']['type'],
                'isRequired' => self::FIELDTYPES['phoneNumber']['isRequired'],
            ],
            'studentAddress' => [
                'label' => 'Address:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentCity' => [
                'label' => 'City:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentCountry' => [
                'label' => 'Country:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentBirthDate' => [
                'label' => 'Birth Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'studentGender' => [
                'label' => 'Gender:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentDocuments' => [
                'label' => 'Documents:',
                'type' => self::FIELDTYPES['file']['type'],
                'isRequired' => self::FIELDTYPES['file']['isRequired'],
                'isMultiple' => self::FIELDTYPES['file']['isMultiple'],
            ],
        ],
        'unit' => [
            'facultyId' => [
                'label' => 'Faculty:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'unitName' => [
                'label' => 'Unit Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'unitCode' => [
                'label' => 'Unit Code:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'unitDescription' => [
                'label' => 'Unit Description:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'unitCapacity' => [
                'label' => 'Unit Capacity:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
        ],
        'term' => [
            'termName' => [
                'label' => 'Term Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'termCapacity' => [
                'label' => 'Term Capacity:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'termDescription' => [
                'label' => 'Term Description:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'termStartDate' => [
                'label' => 'Term Start Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'termEndDate' => [
                'label' => 'Term End Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'termAcademicYear' => [
                'label' => 'Term Academic Year:',
                'type' => self::FIELDTYPES['year']['type'],
                'min' => self::FIELDTYPES['year']['min'],
                'isRequired' => self::FIELDTYPES['year']['isRequired'],
            ],
        ],
        'session' => [
            'courseId' => [
                'label' => 'Course:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'termId' => [
                'label' => 'Term:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'sessionName' => [
                'label' => 'Session Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'sessionFee' => [
                'label' => 'Fee:',
                'type' => self::FIELDTYPES['money']['type'],
                'min' => self::FIELDTYPES['money']['min'],
                'step' => self::FIELDTYPES['money']['step'],
                'isRequired' => self::FIELDTYPES['money']['isRequired'],
                'placeholder' => self::FIELDTYPES['money']['placeholder'],
            ],
            'sessionDescription' => [
                'label' => 'Session Description:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'sessionStartDate' => [
                'label' => 'Session Start Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'sessionEndDate' => [
                'label' => 'Session End Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'sessionYear' => [
                'label' => 'Session Year:',
                'type' => self::FIELDTYPES['year']['type'],
                'min' => self::FIELDTYPES['year']['min'],
                'isRequired' => self::FIELDTYPES['year']['isRequired'],
            ],
        ],
        'scholarship' => [
            'scholarshipName' => [
                'label' => 'Scholarship Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'scholarshipAmount' => [
                'label' => 'Scholarship Amount:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'scholarshipDescription' => [
                'label' => 'Scholarship Description:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'eligibilityCriteria' => [
                'label' => 'Eligibility Criteria:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'awardDate' => [
                'label' => 'Award Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'applicationDeadline' => [
                'label' => 'ApplicationService Deadline:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
        ],
        'notification' => [
            'notificationMessage' => [
                'label' => 'Notification Message:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
        ],
        'viewApplication' => [
            'studentName' => [
                'label' => 'Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'applicantCountry' => [
                'label' => 'Country:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'courseId' => [
                'label' => 'Course:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'branchId' => [
                'label' => 'Branch:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'applicationDate' => [
                'label' => 'Applied Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'applicationStatus' => [
                'label' => 'Status:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
        ],
        'addApplication' => [
            'studentFirstName' => [
                'label' => 'First Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentLastName' => [
                'label' => 'Last Name:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentEmail' => [
                'label' => 'Email:',
                'type' => self::FIELDTYPES['email']['type'],
                'isRequired' => self::FIELDTYPES['email']['isRequired'],
            ],
            'studentPhone' => [
                'label' => 'Phone:',
                'min' => self::FIELDTYPES['phoneNumber']['min'],
                'max' => self::FIELDTYPES['phoneNumber']['max'],
                'type' => self::FIELDTYPES['phoneNumber']['type'],
                'isRequired' => self::FIELDTYPES['phoneNumber']['isRequired'],
            ],
            'studentAddress' => [
                'label' => 'Address:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentCity' => [
                'label' => 'City:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'applicantCountry' => [
                'label' => 'Country:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentBirthDate' => [
                'label' => 'Birth Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'studentGender' => [
                'label' => 'Gender:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
            'studentDocuments' => [
                'label' => 'Documents:',
                'type' => self::FIELDTYPES['file']['type'],
                'isRequired' => self::FIELDTYPES['file']['isRequired'],
                'isMultiple' => self::FIELDTYPES['file']['isMultiple'],
            ],
            'courseId' => [
                'label' => 'Course:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'branchId' => [
                'label' => 'Branch:',
                'type' => self::FIELDTYPES['number']['type'],
                'min' => self::FIELDTYPES['number']['min'],
                'isRequired' => self::FIELDTYPES['number']['isRequired'],
            ],
            'applicationDate' => [
                'label' => 'Applied Date:',
                'type' => self::FIELDTYPES['date']['type'],
                'isRequired' => self::FIELDTYPES['date']['isRequired'],
            ],
            'applicationStatus' => [
                'label' => 'Status:',
                'type' => self::FIELDTYPES['text']['type'],
                'isRequired' => self::FIELDTYPES['text']['isRequired'],
            ],
        ],
    ];


}
