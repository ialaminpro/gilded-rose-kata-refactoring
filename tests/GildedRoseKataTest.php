<?php

namespace Tests;

use GildedRoseKata\GildedRoseKata;
use GildedRoseKata\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseKataTest extends TestCase
{
    public function testItem(): void
    {
        $items = [new Item('Aged Brie', 2, 0)];
        $gildedRose = new GildedRoseKata($items);

        $gildedRose->updateQuality();
        $this->assertSame('Aged Brie', $items[0]->name);
    }
}
