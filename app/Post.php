<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property mixed $user
 * @property mixed $category
 * @property mixed $comments
 * @property int $id
 * @property int|null $category_id
 * @property int $user_id
 * @property string $title
 * @property string $body
 * @property int $like
 * @property int $dislike
 * @property string $slug
 * @property string|null $thumbnail
 * @property int $confirm
 * @property string|null $tags
 * @property string|null $tags_id
 * @property int $seen
 * @property string $create_date
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereConfirm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDislike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereLike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSeen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTagsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
