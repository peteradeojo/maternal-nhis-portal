<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model {
    protected $connection = "global";
    protected $table = "documented_diagnoses";
}
