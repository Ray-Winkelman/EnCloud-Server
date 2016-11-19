<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function __construct($contents)
    {
        $this->contents = $contents;
    }


}
