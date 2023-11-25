<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patients extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = "global";
    protected $table = "patients";

    protected $fillable = [];
    protected $with = ['insurance'];

    public function gender(): Attribute
    {
        return Attribute::make(get: fn ($value) => $value == "0" ? "Female" : "Male");
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function insurance()
    {
        return $this->hasOne(InsuranceProfile::class, 'patient_id');
    }

    public function visits() {
        return $this->hasMany(Visit::class, 'patient_id');
    }
}
