<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Post;

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
        return $this->hasMany(Post::class);
    }

    public function folowers(){
        return $this->belongsToMany(User::class, 'follows','followed_id','follower_id');

    }

    public function folowersPosts(){
        return $this->belongsToMany(Post::class, 'follows','followed_id','follower_id');
    }

    public function userPosts(){
        return false;
    }

    public function follow($id)
    {
        return $this->folowers()->where('follower_id',$id)->exists();      
    }
}
