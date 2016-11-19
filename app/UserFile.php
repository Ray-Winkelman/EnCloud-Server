<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    public $contents;
    public $filename;

    public function __construct($contents)
    {
        $this->contents = $contents;
    }


}
