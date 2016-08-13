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
   * @var array $filters Callable filters which responsible for modifying data
   */
  public $filters = [];
  
  /**
   * Initiate with extraction method
   */
  public function __construct(Extract $extract)
  {
    $this->pages = $extract->extract();
  }
  
  /** 
   * Process pages via filters and return the content
   * 
   * @return array
   */
  public function process()
  {
    $pages = $this->pages;

    foreach ($this->filters as  $filter)
    {
      $pages = $filter($pages);
    }
    
    return $pages ?: [];
  }
}
