<?php
declare(strict_types=1);

namespace Edmonds;

/**
 * Represents multiplication values of a given size.
 */
class Multiplicationvalues
{
    /** @var int $size contains the desired size of the values*/
    private $size;

    /**
     * Pass the desired size of the values.
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
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Returns a two dimensional array of values.
     * 
     * @return array 
     */
    public function getValues(): array
    {
        $values = [];

        for ($row=1; $row<=$this->size; $row++) {
            for ($col=1; $col<=$this->size; $col++) {
                $values[$row][] = $row*$col;
            }
        }

        return $values;
    }
}
