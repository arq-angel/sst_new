<?php

declare(strict_types=1);

namespace App\Config;

class FormValueConstants
{

    const COURSEDELIVERY = [
        'On Campus',
        'Online',
        'Hybrid',
    ];

    const COUNTRIES = [
        'Australia',
        'India',
        'Bangladesh',
        'Pakistan',
        'Nepal',
        'Philippines',
        'Thailand',
        'Indonesia',
    ];

    const NATIONALITIES = [
        'Australian',
        'Indian',
        'Bangladeshi',
        'Pakistani',
        'Nepali',
        'Filipino',
        'Thai',
        'Indonesian',
    ];

    const MULTIPLESELECTIONFIELDS = [
      'durationId' => 'durationId',

    ];

    const SCHOLARSHIPELIGIBILITY = [
        'minimumGPA' => 3.5,
        'residency' => 'Domestic',
        'minimumAge' => 18,
        'maximumAge' => 25,
        'requiredFieldsOfStudy' => ['Science', 'Engineering', 'Mathematics'],
        'communityServiceHoursRequired' => 100,
    ];

    const BRANCHFACILITIES = [

    ];


}
