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
        if ($item->name == self::$SULFURAS) {
            $this->updateItem($item, 'sulfurasUpdateQuality', 'sulfurasUpdateExpired');
        } elseif ($item->name == self::$AGED_BRIE) {

            $this->updateItem($item, 'agedBrieUpdateQuality', 'agedBrieUpdateExpired');

        } elseif ($item->name == self::$BACKSTAGE_PASSES) {
            $this->updateItem($item, 'backstagePassesUpdateQuality', 'backstagePassesUpdateExpired');

        } elseif (substr($item->name, 0, 8) == self::$CONJURED) {
            $this->updateItem($item, 'conjuredUpdateQuality', 'conjuredUpdateExpired');
        } else {
            $this->updateItem($item, 'decrementQuality', 'decrementQuality');
        }
    }

    public function updateItem(Item $item, $updateQuality, $updateExpired)
    {
        $this->$updateQuality($item);
        $this->updateSellIn($item);
        if ($item->sell_in < 0) {
            $this->$updateExpired($item);
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

    public function updateSellIn(Item $item)
    {
        $item->sell_in--;
    }

    public function sulfurasUpdateExpired(Item $item)
    {
    }

    public function sulfurasUpdateQuality(Item $item)
    {
    }

    public function agedBrieUpdateExpired(Item $item)
    {
        $this->incrementQuality($item);
    }

    public function agedBrieUpdateQuality(Item $item)
    {
        $this->incrementQuality($item);
    }

    public function backstagePassesUpdateExpired(Item $item)
    {
        $item->quality = 0;
    }

    public function backstagePassesUpdateQuality(Item $item)
    {
        $this->incrementQuality($item);
        if ($item->sell_in < 11) {
            $this->incrementQuality($item);
        }
        if ($item->sell_in < 6) {
            $this->incrementQuality($item);
        }
    }

    public function conjuredUpdateExpired(Item $item)
    {
        $this->decrementQuality($item);
    }

    public function conjuredUpdateQuality(Item $item)
    {
        $this->decrementQuality($item);
    }

}