<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\V1\QueryFilters;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'age',
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function user():belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function scopeFilter(Builder $builder, QueryFilters $filters){
        return $filters->apply($builder);
    }
}
