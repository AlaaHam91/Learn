<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Profile extends Model
{
    //
    protected $fillable=['name','about','picture','user_id'];
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
