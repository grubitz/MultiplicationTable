<?php

namespace Edmonds;

/**
 * Provides validation functions for input variables.
 */
class Validator
{
    /**
     * Validates size variable. Returns default value if criteria not met.
     * 
     * @param mixed $size
     * 
     * @return int
     */
    public static function validateSize($size)
    {
        $options = array(
            'options' => array( 
                'default' => 10,
                'min_range' => 1,
                'max_range' => 140
            ),
        );    
            
        return filter_var($size, FILTER_VALIDATE_INT, $options);
    
    }
}
