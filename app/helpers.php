<?php

/**
 * GEt random string for avtivation code etc..
 * 
 */
if (!function_exists('get_random_string')) {
    
    /**
     * @param  integer $length
     * @param  boolean $unique
     * @param  string  $table 
     * @param  string  $column
     * @return string          
     */
    function get_random_string($length = 42, $unique = false, $table = '', $column = '') {
        
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $random_string = substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
        
        if ($unique) {
        	$data = DB::table($table)->where($column, $random_string)->first();
        	
        	if ($data) {
        		get_random_string();
        	}
        }

        return $random_string;
    }
}

/**
 * Function to add empty option to select lists
 */
if (!function_exists('withEmpty')) 
{
    /**
     * Function to add empty option to select lists
     *
     * @param $selectList array
     * @param $emptyLabel string to use as label for empty option
     * @author rtconner
     */
    function withEmpty($selectList, $emptyLabel = 'Please Select')
    {
        return ['' => $emptyLabel] + $selectList;
    }
}