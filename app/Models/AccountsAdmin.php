<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountsAdmin extends Model
{
    use HasFactory;

    protected $table = 'accountslogin';

    protected $fillable = ['name', 'email', 'password'];
=======
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class AccountsAdmin extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table = 'accountslogin';

    protected $fillable = ['name', 'email', 'password', 'manager', 'team_lead', 'role'];

>>>>>>> old-repo/master
}
