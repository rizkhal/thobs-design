<?php declare(strict_types=1);

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function file(): HasOne
    {
    	return $this->hasOne(ProjectFile::class)->withDefault('project_files');
    }

    public function category(): HasOne
    {
    	return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getProjectFileUrlAttribute()
    {
    	if (! is_null($this->file->filename)) {
    		return asset('storage/uploads/project/'
	    			.$this->file->filename
	    		);
    	}
    }

    public function scopeActive($query)
    {
    	return $query->where('status', true);
    }
}
