<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    protected $fillable = [
        'name',
    ];
    
    public function students()
    {
        return $this->morphedByMany(Student::class, 'taggable');
    }

    public function teachers()
    {
        return $this->morphedByMany(Teacher::class, 'taggable');
    }
}
