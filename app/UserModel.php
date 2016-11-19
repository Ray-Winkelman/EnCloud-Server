<?php

namespace EnCloud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UserModel extends Model
{
    public function __construct($attributes = array())
    {
        parent::__construct($attributes);

        $db = 'EnCloudUser_' . Auth::id();

        Config::set('database.connections.' . $db, array(
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => $db,
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ));

        $this->setConnection($db);
    }
}
