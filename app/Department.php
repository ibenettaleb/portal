<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     public $table = "department";
     protected $fillable = ['name','color'];
     public function projects() {
    	return $this->belongsToMany(Project::class);
    }
}
