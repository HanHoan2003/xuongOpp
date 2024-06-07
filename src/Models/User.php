<?php

namespace   Hp\XuongOop\Models;

use Hp\XuongOop\Commons\Helper;
use Hp\XuongOop\Commons\Model;

class User extends  Model
{
    protected string $tableName = 'users';


    public function findByEmail($email)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();
    }
}
