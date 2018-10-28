<?php

namespace Edmonds;

/**
 * Represents multiplication table of a given size.
 */
class MultiplicationTable
{
    /** @var int $size contains the desired size of the table*/
    private $size;

    /**
     * Pass the desired size of the table.
     * 
     * @param int $size
     */
    public function __construct(int $size)
    {
        $this->size = $size;
    }

    /**
     * Returns the size.
     * 
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Returns a two dimensional array of values.
     * 
     * @return array 
     */
    public function getValues()
    {
        $table = [];

        for ($row=1; $row<=$this->size; $row++) {
            for ($col=1; $col<=$this->size; $col++) {
                $table[$row][] = $row*$col;
            }
        }

        return $table;
    }
}
