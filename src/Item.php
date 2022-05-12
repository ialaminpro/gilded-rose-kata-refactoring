<?php

/**------------------------------------------------------------------------
 * @Title          :  Gilded Rose Kata Refactoring
 * @author         :  Al Amin
 * @email          :  ialamin.pro@gmail.com
 * @repo           :  https://github.com/ialaminpro/gilded-rose-kata-refactoring
 * @createdOn      :  12/05/2022
 * @description    :  Gilded Rose Kata Refactoring
 *------------------------------------------------------------------------**/
namespace GildedRoseKata;

class Item
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sell_in;

    /**
     * @var int
     */
    public $quality;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}
