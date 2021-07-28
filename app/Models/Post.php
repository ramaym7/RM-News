<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        // your other new column
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
