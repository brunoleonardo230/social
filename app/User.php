<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cpf','address','photo','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
    * Opcional, informar a coluna deleted_at como um Mutator de data
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = ['is_admin'];

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
