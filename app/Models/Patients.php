<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $connection = "global";
    protected $table = "patients";

    protected $fillable = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function insurance()
    {
        return $this->hasOne(InsuranceProfile::class, 'patient_id');
    }
}
