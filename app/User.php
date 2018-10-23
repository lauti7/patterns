<?php

namespace App;

use App\Presenters\UserPresenter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany(Messages::class);
    }

    public function note()
    {
        return $this->morphOne(Note::class, 'notable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    public function hasRoles(array $roles)
    {

        //Funciones solamente para colleciones de eloquent.
        //->intersect() compara dos arrays y devuelve las coincidencias.
        return  $this->roles->pluck('key')->intersect($roles)->count();
        //foreach ($roles as $role) {
            //return $this->roles->pluck('key')->contanins($role);
            // Si no contiene el primer role pasado por parametro retornara falso entonces no sitve
        //}
        //dd($roles);

        //dd(auth()->user()->role); // == dd($this->role)
        //foreach ($roles as $role) {
            //if (auth()->user()->role->key === $role ) {
                //return true;
            //}
        //}
        //return false;
        //dd($this->roles);

        //foreach ($roles as $role)
        //{
            //foreach ($this->roles as $userRole)
            //{
                //if ($userRole->key === $role)
                //{
                    //return true;
                //}
            //}
        //}
        //return false;
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function present()
    {
        return new UserPresenter($this);
    }
}
