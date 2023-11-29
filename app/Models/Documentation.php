<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    protected $connection = "global";
    protected $table = "documentations";

    protected $with = [
        'complaints', 'tests', 'diagnosis', 'prescriptions'
    ];

    public function complaints() {
        return $this->morphMany(Complaints::class, 'documentable');
    }

    public function tests() {
        return $this->morphMany(Tests::class, 'testable');
    }

    public function diagnosis() {
        return $this->morphMany(Diagnosis::class, 'diagnosable');
    }

    public function prescriptions() {
        return $this->morphMany(Prescription::class, 'prescriptionable');
    }
}
