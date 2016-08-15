<?php

namespace crystal\edge;

/**
 * Site class
 *
 * This class is responsible for storing extracted web pages and
 * process them via given filters.
 */
class Site
{
  /**
   * @var array $pages Hash map of web pages (path => data)
   */
  protected $pages = [];
  
  /**
   * @var array $plugins Callable plugins which add functionality by manipulating 
   *                     pages data
   */
  public $plugins = [];
  
  /**
   * Initiate with extraction method
   */
  public function __construct(Extract $extract)
  {
    $this->pages = $extract->extract();
  }
  
  /** 
   * Process pages via plugins and return the content
   * 
   * @return array
   */
  public function process()
  {
    $pages = $this->pages;

    foreach ($this->plugins as $plugin)
    {
      $pages = $plugin($pages);
    }
    
    return $pages ?: [];
  }
}
