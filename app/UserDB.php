<?php

namespace EnCloud;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class UserDB
{
    public static function create(User $user)
    {
        $userDB = 'EnCloudUser_' . $user->id;

        DB::connection()->statement('CREATE DATABASE ' . $userDB);

        Schema::create($userDB . '.userfile', function (Blueprint $table){
            $table->increments('id');
            $table->longText('contents');
            $table->string('filename');
            $table->timestamps();
        });
    }
}
