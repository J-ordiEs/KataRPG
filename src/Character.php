<?php

namespace App;

class Character
{
    private int $health;
    private int $level;
    private bool $alive;
    private int $damage;

    function __construct()
    {
        $this->health = 1000;
        $this->level = 1;
        $this->alive = true;
        $this->damage = 100;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }

    public function attacks($oponent)
    {
       $oponent->health -=  $this->damage;
       if ($oponent->health <= 0) 
        {
            $oponent->alive = false;
            $oponent->health = 0;
        }
    }

    public function heal($friend, $healing)
    {
        if ($friend->isAlive() == true) 
        {
            $friend->health +=  $healing;
        }
    }
}
