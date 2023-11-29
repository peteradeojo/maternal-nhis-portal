<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use HasFactory;

    protected $connection = "global";

    public function patient() {
        return $this->belongsTo(Patients::class, 'patient_id');
    }

    public function documentations() {
        return $this->hasMany(Documentation::class);
    }
}
