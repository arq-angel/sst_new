<?php

declare(strict_types=1);

namespace Modules\Services;

use App\Config\Fields;
use App\Config\Site;
use Modules\CRUD\StudentCreateRecord;
use Modules\HelperWebsite;

class ValidateStudentForm
{

    public static function loadValidateStudentForm(array $params): array
    {
        $errors = [];
        $controller = $params['controller'];
        $formData = $params['data'];

        $randomStudentId = StudentCreateRecord::addRandomId('student');
        $randomStudentId = $randomStudentId['studentId'];

        $formData['studentId'] = $randomStudentId;

//        dd($formData);

        if (array_key_exists($controller, Fields::UNIQUEFIELDS)) {
            $columnNames = Fields::UNIQUEFIELDS[$controller];

            $databaseInfo = HelperWebsite::getFetchColumn($controller, $columnNames);

            if (isset(Fields::FIELD[$controller])) {
                foreach (Fields::FIELD[$controller] as $fieldName => $fieldConfig) {


                    if (isset($formData[$fieldName])) {
                        $fieldErrors = self::validateStudentField($fieldName, $formData[$fieldName], $fieldConfig);
                        $errors = array_merge($errors, $fieldErrors);

                        if (in_array($fieldName, Fields::UNIQUEFIELDS[$controller])) {
                            $databaseErrors = self::validateStudentDatabase(
                                $fieldName,
                                $formData[$fieldName],
                                $fieldConfig,
                                $databaseInfo
                            );

                            $errors = array_merge($errors, $databaseErrors);
                        }

                        $studentName = ($formData['studentFirstName'] ?? '') . ($formData['studentLastName'] ?? '');
                        $dataOfBirth = $formData['studentBirthDate'] ?? '';

                        // Assuming 'fileField' is the name of your file input field
                        if (isset($_FILES['studentDocuments'])) {
                            $fileUpload = self::handleFileUpload(
                                'studentDocuments',
                                $_FILES['studentDocuments'],
                                $randomStudentId,
                                $studentName,
                                $dataOfBirth
                            );

                            $fileUploadErrors = $fileUpload['errors'] ?? [];
                            $filePath = $fileUpload['filePaths'] ?? [];

                            $filePath = serialize($filePath);
                            $formData['studentFilePath'] = $filePath;

                            $errors = array_merge($errors, $fileUploadErrors);
                        }
                    }
                }

                return [
                    'errors' => $errors,
                    'data' => $formData,
                    ];
            }
        }
    }

    public static function validateStudentDatabase($fieldName, $fieldValue, $fieldConfig, $databaseInfo)
    {
        $errors = [];

        $savedInfo = $databaseInfo;

        foreach ($savedInfo as $rows) {
            if ($fieldValue === $rows[$fieldName]) {
                $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . " already exists!";
            }
        }

        return $errors;
    }

    // Function to validate a field based on its configuration
    public static function validateStudentField($fieldName, $fieldValue, $fieldConfig): array|string
    {
        $errors = [];

        // Check if the field is required
        if ($fieldConfig['isRequired'] && empty($fieldValue)) {
            $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' is required.';
        }

        // Check field type
        switch ($fieldConfig['type']) {
            case 'number':
                // Validate numeric fields
                if (!is_numeric($fieldValue)) {
                    $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' must be a number.';
                } elseif (isset($fieldConfig['min']) && $fieldValue < $fieldConfig['min']) {
                    $errors[$fieldName] = rtrim(
                            $fieldConfig['label'],
                            ":"
                        ) . ' must be at least ' . $fieldConfig['min'] . '.';
                } elseif (isset($fieldConfig['max']) && $fieldValue > $fieldConfig['max']) {
                    $errors[$fieldName] = rtrim(
                            $fieldConfig['label'],
                            ":"
                        ) . ' cannot exceed ' . $fieldConfig['max'] . '.';
                }
                break;

            case 'email':
                // Validate email fields
                if (!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
                    $errors[$fieldName] = 'Invalid email format for ' . rtrim($fieldConfig['label'], ":") . '.';
                }
                break;

            case 'password':
                // Validate password fields
                if (strlen($fieldValue) < 8) {
                    $errors[$fieldName] = 'Password must be at least 8 characters for ' . rtrim(
                            $fieldConfig['label'],
                            ":"
                        ) . '.';
                }
                break;

            case 'date':
                // Validate date fields
                if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $fieldValue)) {
                    $errors[$fieldName] = 'Invalid date format for ' . rtrim(
                            $fieldConfig['label'],
                            ":"
                        ) . '. Use YYYY-MM-DD.';
                }
                break;

            case 'text':
                // Validate text fields
                if (strlen($fieldValue) < 3) {
                    $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' must be at least 3 characters.';
                }
                break;

            case 'textarea':
                // Validate textarea fields
                if (strlen($fieldValue) < 10) {
                    $errors[$fieldName] = rtrim($fieldConfig['label'], ":") . ' must be at least 10 characters.';
                }
                break;

            case 'checkbox':
                // Validate checkbox fields
                if ($fieldValue !== '1') {
                    $errors[$fieldName] = 'You must agree to ' . rtrim($fieldConfig['label'], ":") . '.';
                }
                break;

            case 'url':
                // Validate URL fields
                if (!filter_var($fieldValue, FILTER_VALIDATE_URL)) {
                    $errors[$fieldName] = 'Invalid URL format for ' . rtrim($fieldConfig['label'], ":") . '.';
                }
                break;


            default:
                // Default case for text fields
                // You might want to add additional validation for other field types
                break;
        }

        return $errors;
    }

    // Method to handle file uploads
    public static function handleFileUpload($fieldName, $files, $studentId, $studentName, $dateOfBirth)
    {

        $errors = [];
        $filePaths = []; // Array to store the paths of uploaded files
        $targetDir = Site::ROOT_DIR . 'storage/uploads/students/'; // Ensure this directory exists and is writable
        $allowedTypes = ['pdf', 'jpg', 'jpeg']; // Allow PDF and JPG files

        // Ensure the target directory exists
        if (!file_exists($targetDir)) {
            if (!mkdir($targetDir, 0755, true)) {
                $errors[$fieldName][] = "Failed to create directory for uploads.";
                return ['errors' => $errors, 'filePaths' => $filePaths]; // Exit the function early if the directory can't be created
            }
        }

        // Loop through each file
        foreach ($files['name'] as $key => $name) {
            $fileTmpName = $files['tmp_name'][$key];
            $fileSize = $files['size'][$key];
            $fileError = $files['error'][$key];
            $fileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            // Sanitize the original filename
            $sanitizedName = preg_replace("/[^a-zA-Z0-9.]/", "_", basename($name));

            // Generate new filename with sanitized original name
            $newFileName = $studentId . '_' . $studentName . '_' . $dateOfBirth . '_' . $sanitizedName;
            // Further sanitize the entire filename to ensure it's safe
            $safeFileName = preg_replace("/[^a-zA-Z0-9._-]/", "_", $newFileName);
            $targetFile = $targetDir . $safeFileName;

            // Detailed error handling based on $fileError
            if ($fileError !== UPLOAD_ERR_OK) {
                $errorMessage = "Error uploading file: $sanitizedName - ";
                switch ($fileError) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        $errorMessage .= "File is too large.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        $errorMessage .= "File was only partially uploaded.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        $errorMessage .= "No file was uploaded.";
                        break;
                    case UPLOAD_ERR_NO_TMP_DIR:
                        $errorMessage .= "Missing a temporary folder.";
                        break;
                    case UPLOAD_ERR_CANT_WRITE:
                        $errorMessage .= "Failed to write file to disk.";
                        break;
                    case UPLOAD_ERR_EXTENSION:
                        $errorMessage .= "A PHP extension stopped the file upload.";
                        break;
                    default:
                        $errorMessage .= "Unknown upload error.";
                        break;
                }
                $errors[$fieldName][] = $errorMessage;
                continue;
            }

            // Check if file type is allowed
            if (!in_array($fileType, $allowedTypes)) {
                $errors[$fieldName][] = "Sorry, only PDF and JPG files are allowed. File: $sanitizedName";
                continue;
            }

            // Check file size (e.g., 5MB limit for PDFs, 2MB for images)
            $maxSize = ($fileType === 'pdf') ? 5000000 : 2000000; // 5MB for PDF, 2MB for JPG
            if ($fileSize > $maxSize) {
                $fileTypeName = ($fileType === 'pdf') ? 'PDF' : 'Image';
                $errors[$fieldName][] = "Sorry, your $fileTypeName file is too large. File: $sanitizedName";
                continue;
            }

            // Attempt to move the uploaded file to its new location
            if (move_uploaded_file($fileTmpName, $targetFile)) {
                $filePaths[] = $targetFile; // Add the file path to the array of uploaded file paths
            } else {
                $errors[$fieldName][] = "Sorry, there was an error uploading your file. File: $sanitizedName";
            }
        }

        return ['errors' => $errors, 'filePaths' => $filePaths];
    }


}
