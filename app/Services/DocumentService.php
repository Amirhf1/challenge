<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\Document;
use App\Models\Employee;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class DocumentService extends BaseService
{
    public function assignAppointment(Document $document, Employee $employee, $startTime, $endTime)
    {
        $existingAppointment = $document->appointments()->where('end_time', '>', now())->first();

        if ($existingAppointment) {
            return false; // Document already has an active appointment
        }

        $appointment = new Appointment();
        $appointment->employee_id = $employee->id;
        $appointment->document_id = $document->id;
        $appointment->start_time = $startTime;
        $appointment->end_time = $endTime;
        $appointment->save();

        $document->status = 'appointed';
        $document->save();

        return true;
    }

    public function withdrawAppointment(Appointment $appointment)
    {
        $document = $appointment->document;
        $document->status = 'basic';
        $document->save();

        $appointment->delete();
    }

    public function updateDocumentStatus(Document $document)
    {
        if ($document->status !== 'basic') {
            return; // Status is already updated
        }

        $existingAppointment = $document->appointments()->where('end_time', '>', now())->first();

        if ($existingAppointment) {
            return; // Document has an active appointment
        }

        $document->status = 'post-appointment';
        $document->save();
    }

    public function create(array $param)
    {
        $document = Document::findOrFail($param['document_id']);
        $employee = Employee::findOrFail($param['employee_id']);
        $startTime = Carbon::parse($param['start_time']);
        $endTime = Carbon::parse($param['end_time']);

        $success = $this->assignAppointment($document, $employee, $startTime, $endTime);

        if ($success) {
            return $this->successResponse(null, 'Appointment created successfully.', ResponseAlias::HTTP_CREATED);
        } else {
            return $this->errorResponse('Failed to create appointment. Another appointment is already active for the document.', Response::HTTP_BAD_REQUEST);
        }
    }

    public function getCurrentAppointments(): \Symfony\Component\HttpFoundation\JsonResponse
    {
        $currentAppointments = Appointment::where('end_time', '>', now())
            ->paginate(config('pagination.items_per_page'));

        return $this->successResponse($currentAppointments);
    }
}
