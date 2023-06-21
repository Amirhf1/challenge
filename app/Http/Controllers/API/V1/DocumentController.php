<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Employee;
use App\Services\DocumentService;

class DocumentController extends Controller
{
    public function assignDocumentToEmployee(DocumentService $documentService)
    {
        $document = Document::find(1);
        $employee = Employee::find(1);

        $documentService->assignDocumentToEmployee($document, $employee);

        return response()->json(['message' => 'Document assigned successfully']);
    }

    public function withdrawDocument(DocumentService $documentService)
    {
        $document = Document::find(1);

        $documentService->withdrawDocument($document);

        return response()->json(['message' => 'Document withdrawn successfully']);
    }

    public function processDocumentStatus(DocumentService $documentService)
    {
        $document = Document::find(1);

        $documentService->processDocumentStatus($document);

        return response()->json(['message' => 'Document status processed']);
    }
}
