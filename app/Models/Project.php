<?php

namespace App\Models;

use App\Models\ProjectFile;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function file()
    {
    	return $this->hasOne(ProjectFile::class);
    }
}
