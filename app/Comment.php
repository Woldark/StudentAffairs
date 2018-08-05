<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Comment
 *
 * @property int $id
 * @property int|null $post_id
 * @property int|null $image_id
 * @property string $body
 * @property string|null $answer
 * @property string $name
 * @property string|null $email
 * @property string|null $website
 * @property int $confirm
 * @property string $create_date
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Image|null $image
 * @property-read \App\Post|null $post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereConfirm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Comment whereWebsite($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function image()
    {
        return $this->belongsTo('App\Image');
    }
}
