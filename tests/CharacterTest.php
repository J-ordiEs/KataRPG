<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;



class CharacterTest extends TestCase
{

	public function test_Health_starting_at_1000()
	{

		$sonGoku = new Character();

		$result = $sonGoku->getHealth();

		$this->assertEquals(1000, $result);
	}

	public function test_Level_starting_at_1()
	{

		$sonGoku = new Character();

		$result = $sonGoku->getLevel();

		$this->assertEquals(1, $result);
	}

	public function test_starting_Alive()
	{

		$sonGoku = new Character();

		$result = $sonGoku->isAlive();

		$this->assertEquals(true, $result);
	}

	public function test_damage_is_substracted_from_health()
	{
		//given escenario

		$char1 = new Character();
		$char2 = new Character();

		// action

		$char1->attacks($char2);

		//then
		$result = $char2->getHealth();

		$this->assertEquals(900, $result);
	}

	public function test_char_dies_when_health_is_0()
	{
		//given escenario

		$char1 = new Character();
		$char2 = new Character();

		// action

		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		
		//then
		$result = $char2->getHealth();
		$alive = $char2->isAlive();

		$this->assertEquals(0, $result);
		$this->assertEquals(false, $alive);
		
	}

	public function test_char_can_heal()
	{
		//given escenario

		$char1 = new Character();
		$char2 = new Character();

		// action

		$char1->heal($char2, 50);	
		
		//then
		$result = $char2->getHealth();	

		$this->assertEquals(1050, $result);
	}

	public function test_dead_char_cannot_be_healed()
	{
		//given escenario

		$char1 = new Character();
		$char2 = new Character();

		// action

		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		$char1->attacks($char2);
		
		$char1->heal($char2, 50);
		//then
		$result = $char2->getHealth();
		$alive = $char2->isAlive();

		$this->assertEquals(0, $result);
		$this->assertEquals(false, $alive);
		
	}
}

