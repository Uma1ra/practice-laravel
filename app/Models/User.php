<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ["lastname", "firstname", "age", "prefecture", "city", "address", "phone_number", "gender", "password"];
    // プロパティ達、あるものにフィルしてく

    public function hobbies() {
        return $this->hasMany(Hobby::class);
    }

    public function getFullnameAttribute() {
        return $this->lastname . " " . $this->firstname;
    }

    public function has_hobbies() {
        return $this->hobbies()->exists();
    }

}
