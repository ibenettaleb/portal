<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Project extends Model
{
    public function departments() {
    	return $this->belongsToMany(Department::class)->withPivot('id');
    }
}
