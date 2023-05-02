<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Comment
 *
 * @property string $id_user
 * @property int $id_post
 * @property string $comment
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIdPost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @property int $id_comment
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIdComment($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    use HasFactory;
    protected $table = "comments",
        $primaryKey = "id_comment",
        $hidden = ["updated_at"],
        $fillable = ["id_user", "id_post", "comment"];
}