<?php

namespace crystal\edge;

/**
 * File system extractiom implementation
 *
 * Extracts web pages from file system
 */
class FileSystemExtract implements Extract
{
  private $path = '';
  
  public function __construct($path)
  {
    $this->path = $path;
  }
  
  /**
   * Extract web pages from file system from given path
   */
  public function extract()
  {
    return [];
  }
}
