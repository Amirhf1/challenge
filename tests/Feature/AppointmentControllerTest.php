<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\Document;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetAllAppointment()
    {
        $response = $this->getJson(route('get-current-appointments'));
        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'current_page',
                    'data' => [
                        '*' => [
                            'id',
                            'employee_id',
                            'document_id',
                            'start_time',
                            'end_time',
                            'created_at',
                            'updated_at',
                        ],
                    ],
                    'first_page_url',
                    'from',
                    'last_page',
                    'last_page_url',
                    'links' => [
                        '*' => [
                            'url',
                            'label',
                            'active',
                        ],
                    ],
                    'next_page_url',
                    'path',
                    'per_page',
                    'prev_page_url',
                    'to',
                    'total',
                ],
            ]);
    }

    public function testCreateAppointment()
    {
        $document = Document::factory()->create();
        $employee = Employee::factory()->create();

        $startTime = now()->addHour();
        $endTime = now()->addHours(2);

        $payload = [
            'document_id' => $document->id,
            'employee_id' => $employee->id,
            'start_time' => $startTime->format('Y-m-d H:i:s'),
            'end_time' => $endTime->format('Y-m-d H:i:s'),
        ];

        $response = $this->post(route('appointment.create'), $payload);

        $response->assertStatus(201);

        $this->assertDatabaseHas('appointments', [
            'document_id' => $document->id,
            'employee_id' => $employee->id,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);
    }

    public function testCanNotCreateAppointment()
    {
        $document = Document::factory()->create();
        $employee = Employee::factory()->create();

        $startTime = now()->addHour();
        $endTime = now()->addHours(2);

        $payload = [
            'document_id' => 99,
            'employee_id' => 99,
            'start_time' => $startTime->format('Y-m-d H:i:s'),
            'end_time' => $endTime->format('Y-m-d H:i:s'),
        ];

        $response = $this->postJson('/api/v1/appointments', $payload);

        $response->assertStatus(422);

        $this->assertDatabaseMissing('appointments', [
            'document_id' => $document->id,
            'employee_id' => $employee->id,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);
    }

}
