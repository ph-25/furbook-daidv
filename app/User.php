<?php

namespace Furbook;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Furbook\Cat;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    /**
     * Check user logged is owns?
     *
     * @param Cat $cat
     * @return boolean
     */
    public function owns(Cat $cat)
    {
        return $this->id == $cat->user_id;
    }

    /**
     * Check permission can edit
     *
     * @param Cat $cat
     * @return boolean
     */
    public function canEdit(Cat $cat)
    {
        return $this->is_admin || $this->owns($cat);
    }

    /**
     * Check user logged is admin?
     *
     * @return boolean
     */
    public function isAdministrator()
    {
        return $this->getAttribute('is_admin');
    }
}
