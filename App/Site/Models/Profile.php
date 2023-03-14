<?php

namespace App\Site\Models;

use Lib\Foxy\Core\Base\Model;

class Profile extends Model
{
    public function __construct()
    {
        parent::__construct("profiles");
    }
}
