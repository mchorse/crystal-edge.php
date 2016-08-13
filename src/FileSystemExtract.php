<?php

namespace crystal\edge;

/**
 * File system extractiom implementation
 *
 * Extracts web pages from file system
 */
class FileSystemExtract implements Extract
{
  /**
   * @var string $path Source from where to extract the data from files
   */
  private $path = '';
  
  /**
   * Initiate with path
   */
  public function __construct($path)
  {
    $this->path = realpath($path);
  }
  
  /**
   * Extract web pages from file system from given path
   */
  public function extract()
  {
    return [];
  }
}
