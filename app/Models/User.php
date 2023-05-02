<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User
 *
 * @property string $id_user
 * @property string $username
 * @property string $password
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @property int $canComment
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCanComment($value)
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    use HasFactory;
    use HasUuids;
    
    protected $table = "users",
        $primaryKey = "id_user",
        $keyType = "string",
        $fillable = ["username", "password", "description"];
    public $timestamps = false;

    public static function validate(string $id_user): bool
    {
        return User::whereIdUser($id_user)->first() !== null;
    }
}