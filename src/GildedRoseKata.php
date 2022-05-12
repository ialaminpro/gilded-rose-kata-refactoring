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
        foreach ($this->items as $item) {
            $this->updateItemQuality($item);
        }
    }

    public function updateItemQuality($item)
    {
        if ($item->name != self::$AGED_BRIE and $item->name != self::$BACKSTAGE_PASSES) {
            if ($item->name != self::$SULFURAS) {
                $this->decrementQuality($item);
            }
        } else {
            if ($item->quality < 50) {
                $item->quality++;
                if ($item->name == self::$BACKSTAGE_PASSES) {
                    if ($item->sell_in < 11) {
                        $this->incrementQuality($item);
                    }
                    if ($item->sell_in < 6) {
                        $this->incrementQuality($item);
                    }
                }
            }
        }

        if ($item->name != self::$SULFURAS) {
            $item->sell_in--;
        }

        if ($item->sell_in < 0) {
            if ($item->name != self::$AGED_BRIE) {
                if ($item->name != self::$BACKSTAGE_PASSES) {

                    if ($item->name != self::$SULFURAS) {
                        $this->decrementQuality($item);
                    }

                } else {
                    $item->quality = 0;
                }
            } else {
                $this->incrementQuality($item);
            }
        }
    }

    public function incrementQuality(Item $item)
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
    }

    public function decrementQuality(Item $item)
    {
        if ($item->quality > 0) {
            $item->quality--;
        }
    }

}