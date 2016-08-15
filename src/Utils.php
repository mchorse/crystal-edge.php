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
  return function($pages) use($func)
  {
    return array_map($func, $pages);
  };
}

/**
 * Filter given pages according to callable
 */
function filter(callable $func)
{
  return function($pages)
  {
    $output = [];
    
    foreach($pages as $key => $value) use($func)
    {
      if ($func($value, $key)) $output[$key] = $value;
    }
    
    return $output;
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
}
