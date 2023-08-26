<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showAssignment($filename)
{
    $cleanedFilename = basename(urldecode($filename)); // Decode the URL-encoded filename
    $filePath = public_path('storage/assignments/' . $cleanedFilename);
    if (file_exists($filePath)) {
        return response()->file($filePath);
    } else {
        return response()->json(['error' => 'File not found'], 404);
    }
}

}
