<?php

namespace App\Models;

use App\Trait\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use Commentable;

    protected $primaryKey = 'article_id';

    protected $table = 'MY_ARTICLE';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category',
        'article_creation_datetime',
        'article_update_datetime',
        'article_delete_datetime'
    ];
    
}
