<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

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
