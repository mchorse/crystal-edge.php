<?php

/**
 * Crystal Edge filter utilities functions
 *
 * @author mchorse
 */

namespace crystal\edge;

/**
 * Process all pages as separate array elements
 */
function process(callable $func)
{
  return function($pages)
  {
    return array_map($func, $pages);
  };
}

/**
 * Apply a function on a page
 */
function apply($from, $to, callable $func)
{
  return process(function($data) use($from, $to, $func)
  {
    $data[$to] = $func($data[$from]);
    
    return $data;
  });
}

/**
 * Remap all keys in the array
 */
function remap(callable $func)
{
  return function($pages) use($func)
  {
    $output = [];
    
    foreach($pages as $key => $value)
    {
      $output[$func($key, $value)] = $value;
    }
    
    return $output;
  };
};
