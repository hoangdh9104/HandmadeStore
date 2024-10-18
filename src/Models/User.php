<?php

namespace Dell\Asmphp2\Models;

use Dell\Asmphp2\Commons\Model;

class User extends Model
{
    protected string $tableName = 'users';

    public function findByEmail($email){

        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();
    }
}