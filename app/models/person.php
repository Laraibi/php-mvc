<?php

namespace App\Models;

class person extends Model
{
    protected static $tableName = "personnes";
    public $id;
    public $firstName;
    public $lastName;
    public $dateOfBirth;
}
