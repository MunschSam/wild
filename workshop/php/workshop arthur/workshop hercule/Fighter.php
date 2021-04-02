<?php

class Fighter
{
    private int $MAX_LIFE =100;
    private string $name ;
    private int $dexterity;
    private int $life;

    public function __construct(string $name, int $strength, int $dexterity)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->life = self::MAX_LIFE;
    }
}




?>