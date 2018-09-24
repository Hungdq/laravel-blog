<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
    	// $user_id = 3;
    	// $this->comments()->create(compact('body', 'user_id'));
    	$comment = new Comment;

    	$comment->body = $body;
    	$comment->post_id = $this->id;
    	$comment->user_id = 2;

    	$comment->save();
    }

    public function scopeFilter($abc, $filters) 
    {
        if ($month = $filters['month'] ?? false) {
            $abc->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year'] ?? false) {
            $abc->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) as published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
