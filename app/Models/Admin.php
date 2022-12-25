<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = "admin";

    protected $fillable = [
        'name',
        'email',
        'lang_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the language that owns the Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(language::class, 'lang_id', 'id');
    }
}