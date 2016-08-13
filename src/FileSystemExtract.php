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
    $path = $this->path;
    
    $only_files = function($file)
    {
      return $file->isFile();
    };
    
    $trim_path = function($file) use($path)
    {
      return substr($file, strlen($path) + 1);
    };
    
    $iterator = new RecursiveDirectoryIterator($path);
    $iterator = new RecursiveIteratorIterator($iterator);
    
    $files = iterator_to_array($iterator);
    $files = array_filter($files, $only_files);
    $pages = [];
    
    foreach($files as $path)
    {
      $pages[$trim_path($path)] = compact('path');
    }
    
    return $pages;
  }
}
