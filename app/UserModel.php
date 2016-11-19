<?php

namespace EnCloud;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public function __construct()
    {
        $this->table = 'EnCloudUser_' . Auth::id();
    }
}
