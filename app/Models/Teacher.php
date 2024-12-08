<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
     
    protected $fillable = [
        'name',
        'subject'
    ];
    
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
