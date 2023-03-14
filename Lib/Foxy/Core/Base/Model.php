<?php

namespace Lib\Foxy\Core\Base;

class Model
{
    protected $tableName;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
    }
}
