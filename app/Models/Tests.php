<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model {
    protected $connection = "global";
    protected $table = "documentation_tests";

    public function testable() {
        return $this->morphTo();
    }
}
