<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'subject'
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
