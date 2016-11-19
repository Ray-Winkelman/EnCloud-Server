<?php

namespace EnCloud\User;

use EnCloud\UserModel;

class UserFile extends UserModel
{
    protected $fillable = ['contents', 'filename'];
}
