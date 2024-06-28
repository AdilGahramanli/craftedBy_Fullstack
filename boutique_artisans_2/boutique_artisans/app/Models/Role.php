<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, HasUuids;

    public function permissions()
        {
            return $this->belongsToMany(Permission::class);
        }

        public function users()
        {
            return $this->belongsToMany(User::class);
        }
}
