<?php

namespace Edmonds;

class Validator
{
    public static function validate($input)
    {
        $options = array(
            'options' => array( 
                'default' => 10,
                'min_range' => 1
            ),
        );    
            
        return filter_var($input, FILTER_VALIDATE_INT, $options);
    
    }
}
