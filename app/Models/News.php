<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelGet;

class News extends Model
{
    use HasFactory;
    use ModelGet;

    public $table = 'news';

    /**
     * Get all of the comments for the News
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'new_id', 'id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }

    public function commentsCount(){
        $numberComments = $this->comments()->count();
        if ($numberComments == 0){
            return 'нет комментариев';
        }
        else if ((int) $numberComments % 100 / 10 == 1 ){
            return $numberComments. ' комментариев';
        }
        else if ((int) $numberComments % 10 ==1 ){
            return $numberComments. ' комментарий';
        }
        else if ((int)  $numberComments % 10 >= 2 && $numberComments % 10 <= 4){
            return  $numberComments.' комментария';
        }
        else if ((int)  $numberComments % 10 >= 5 && $numberComments % 10 <= 9){
            return $numberComments.' комментариев';
        }
    }
}
