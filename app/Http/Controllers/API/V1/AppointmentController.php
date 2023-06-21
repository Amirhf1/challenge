<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAppointmentRequest;
use App\Models\Appointment;
use App\Services\DocumentService;

class AppointmentController extends Controller
{
    protected $documentService;

    public function __construct(DocumentService $documentAppointmentService)
    {
        $this->documentService = $documentAppointmentService;
    }

    public function create(CreateAppointmentRequest $request)
    {
        return $this->documentService->create($request->toArray());
    }


    public function getCurrentAppointments()
    {
        return $this->documentService->getCurrentAppointments();
    }


}
