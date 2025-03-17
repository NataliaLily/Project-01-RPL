<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'post_title',
        'post_content',
        'post_image',
        'category_id'
    ];
        
        protected $primaryKey = 'id';
    
        public function category()
        {
            return $this->belongsTo(Category::class,
        'category_id','id');
        }
    }

