<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class Appointment
 *
 * @property int id
 * @property int employee_id
 * @property int document_id
 * @property \DateTime start_time
 * @property \DateTime end_time
 * @property \DateTime created_at
 * @property \DateTime updated_at
 **/
class Appointment extends Model
{
    use HasFactory;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmployeeId(): int
    {
        return $this->employee_id;
    }

    public function setEmployeeId(int $employee_id): void
    {
        $this->employee_id = $employee_id;
    }

    public function getDocumentId(): int
    {
        return $this->document_id;
    }

    public function setDocumentId(int $document_id): void
    {
        $this->document_id = $document_id;
    }

    public function getStartTime(): \DateTime
    {
        return $this->start_time;
    }

    public function setStartTime(\DateTime $start_time): void
    {
        $this->start_time = $start_time;
    }

    public function getEndTime(): \DateTime
    {
        return $this->end_time;
    }

    public function setEndTime(\DateTime $end_time): void
    {
        $this->end_time = $end_time;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function document(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}
