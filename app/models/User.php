<?php

namespace App\Models;

class User
{
    public function getUserData()
    {
        return [
            "nome" => "Raphael David Leforte",
            "idade" => 27,
            "email" => "teste@teste.com"
        ];
    }
}