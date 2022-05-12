<?php

namespace GildedRoseKata;

class GildedRoseKata
{
    /**
     * @var string
     */
    public static $AGED_BRIE = "Aged Brie";

    /**
     * @var string
     */
    public static $SULFURAS = "Sulfuras, Hand of Ragnaros";

    /**
     * @var string
     */
    public static $BACKSTAGE_PASSES = "Backstage passes to a TAFKAL80ETC concert";

    /**
     * @var string
     */
    public static $CONJURED = "Conjured";
    
    /**
     * @var array
     */
    private $items;

    /**
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality()
    {
        for ($i = 0; $i < count($this->items); $i++) {
            if ($this->items[$i]->name != self::$AGED_BRIE && $this->items[$i]->name != self::$BACKSTAGE_PASSES) {
                if ($this->items[$i]->quality > 0) {
                    if ($this->items[$i]->name != self::$SULFURAS) {
                        $this->items[$i]->quality = $this->items[$i]->quality - 1;
                    }
                }
            } else {
                if ($this->items[$i]->quality < 50) {
                    $this->items[$i]->quality = $this->items[$i]->quality + 1;
                    if ($this->items[$i]->name == self::$BACKSTAGE_PASSES) {
                        if ($this->items[$i]->sell_in < 11) {
                            if ($this->items[$i]->quality < 50) {
                                $this->items[$i]->quality = $this->items[$i]->quality + 1;
                            }
                        }
                        if ($this->items[$i]->sell_in < 6) {
                            if ($this->items[$i]->quality < 50) {
                                $this->items[$i]->quality = $this->items[$i]->quality + 1;
                            }
                        }
                    }
                }
            }
            if ($this->items[$i]->name != self::$SULFURAS) {
                $this->items[$i]->sell_in = $this->items[$i]->sell_in - 1;
            }
            if ($this->items[$i]->sell_in < 0) {
                if ($this->items[$i]->name != self::$AGED_BRIE) {
                    if ($this->items[$i]->name != self::$BACKSTAGE_PASSES) {
                        if ($this->items[$i]->quality > 0) {
                            if ($this->items[$i]->name != self::$SULFURAS) {
                                $this->items[$i]->quality = $this->items[$i]->quality - 1;
                            }
                        }
                    } else {
                        $this->items[$i]->quality = $this->items[$i]->quality - $this->items[$i]->quality;
                    }
                } else {
                    if ($this->items[$i]->quality < 50) {
                        $this->items[$i]->quality = $this->items[$i]->quality + 1;
                    }
                }
            }
        }
    }
}