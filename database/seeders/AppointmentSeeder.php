<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Document;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $employees = Employee::all();
        $documents = Document::all();

        foreach ($documents as $document) {
            $employee = $employees->random();

            $appointment = new Appointment();
            $appointment->employee_id = $employee->id;
            $appointment->document_id = $document->id;
            $appointment->start_time = Carbon::now();
            $appointment->end_time = Carbon::now()->addHour();
            $appointment->save();

            $document->status = 'appointed';
            $document->save();
        }
    }
}
