<?php

namespace App\Http\Controllers;

use App\Helpers\FileUpload;
use App\Helpers\FileUploadMimeTypes;
use App\Http\Requests\TabPane\AuthorTabPaneRequest;
use App\Http\Requests\TabPane\ManuscriptTabPaneRequest;
use App\Http\Requests\TabPane\ReviewerTabPaneRequest;
use Illuminate\Validation\ValidationException;

class tabPaneValidationController extends Controller
{
    public function manuscriptValidation(FileUploadMimeTypes $fileUpload, ManuscriptTabPaneRequest $request)
    {
        // $result =  $fileUpload->uploadFile('/uploads', $request->file('file')[0], 'file', ['application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
        $result = $fileUpload->validateFile($request->file('file')[0], 'file', ['application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
        if (is_array($result) && array_key_exists("error", $result)) {
            throw ValidationException::withMessages([
                'error' => $result['error']
            ]);
        }
        return response()->json([
            'message' => 'success'
        ]);
    }
    public function authorValidation(AuthorTabPaneRequest $request)
    {
        return response()->json([
            'message' => 'success'
        ]);
    }
    public function reviewerValidation(ReviewerTabPaneRequest $request)
    {
        return response()->json([
            'message' => 'success'
        ]);
    }
}
