<?php

namespace App;

class Character
{
    private int $health;

    function __construct()
    {
        $this->health = 1000;
    }

    public function getHealth()
    {
        return $this->health;
    }
}
