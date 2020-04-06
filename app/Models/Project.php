<?php declare(strict_types=1);

namespace App\Models;

use App\Models\Category;
use App\Models\ProjectFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = [
    	'deleted_at',
    ];

    protected $appends = [
    	'project_file_url'
    ];

    public function file()
    {
    	return $this->hasOne(ProjectFile::class)->withDefault('project_files');
    }

    public function categories(): BelongsToMany
    {
    	return $this->belongsToMany(Category::class);
    }

    public function getProjectFileUrlAttribute()
    {
    	if (! is_null($this->file->filename)) {
    		return asset('storage/uploads/project/'
	    			.$this->file->filename
	    		);
    	}
    }

    public function scopeProjectActive($query)
    {
    	return $query->where('status', true);
    }
}
