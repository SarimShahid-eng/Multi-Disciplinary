<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;

class FileUpload
{
    /**
     * Upload a single file to the specified destination.
     *
     * @param string $destination Path to upload the file.
     * @param \Illuminate\Http\UploadedFile $file Uploaded file instance.
     * @param string $fieldName Field name for validation error messages.
     * @return string|array New filename on success or error message.
     */
    public function uploadFile(string $destination, $file, string $fieldName)
    {
        // Validate the file
        $validationResult = $this->validateFile($file, $fieldName);
        if (isset($validationResult['error'])) {
            return $validationResult; // Return validation error
        }

        // Generate a unique file name
        $newName = $this->generateFileName($file);

        // Save the file
        if (!$this->saveFile($file, $destination, $newName)) {
            return ['error' => "Failed to upload $fieldName."]; // Return error if saving fails
        }

        return $newName; // Return the generated filename on success
    }

    /**
     * Validate the uploaded file.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $fieldName
     * @return array Validation result.
     */
    private function validateFile($file, string $fieldName): array
    {
        $allowedFormats = ['pdf', 'tex', 'docx']; // Supported file formats
        $maxFileSize = 2048; // Maximum file size in KB (2MB)

        $validator = Validator::make(
            ['file' => $file],
            [
                'file' => "required|mimes:" . implode(',', $allowedFormats) . "|max:$maxFileSize"
            ],
            [
                'file.required' => "The $fieldName is required.",
                'file.mimes' => "The $fieldName must be a file of type: " . implode(', ', $allowedFormats) . ".",
                'file.max' => "The $fieldName may not be greater than $maxFileSize KB."
            ]
        );

        if ($validator->fails()) {
            return ['error' => $validator->errors()->first('file')];
        }

        return ['success' => true];
    }

    /**
     * Generate a unique file name for the uploaded file.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return string Generated file name.
     */
    private function generateFileName($file): string
    {
        $ext = strtolower($file->getClientOriginalExtension());
        return md5(rand(0, 100000)) . '.' . $ext;
    }

    /**
     * Save the uploaded file to the specified destination.
     *

     * @param string $destination
     * @param string $newName
     * @return bool True if the file was saved successfully, false otherwise.
     */
    private function saveFile($file, string $destination, string $newName): bool
    {
        try {
            $file->move(public_path($destination), $newName);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
