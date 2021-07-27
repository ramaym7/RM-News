<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = ['due_date'];
    public function due_date()
    {
        return Carbon::createFromDate($this->due_date);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
