<?php

namespace crystal\edge;

/**
 * File system export implementation
 *
 * This class is responsible for exporting given instance of 
 * Site to file system folder.
 */
class FileSystemExport implements Export
{
  /**
   * @var \crystal\edge\Site $site An instance of Site class
   */
  private $site;
  
  /**
   * Folder to which an instance of Site going to be exported
   */
  private $path = '';
  
  /**
   * Initiate this class with aite and build path
   */
  public function __construct(Site $site, $path)
  {
    $this->site = $site;
    $this->path = $path;
  }
  
  /**
   * Export a site to build folder
   */
  public function export()
  {
    foreach ($this->site->process() as $path => $content)
    {
      $path = "{$this->path}/$path";
      $folder = substr($path, strrpos($path, '/'));
      
      if (!is_dir($folder)) mkdir($folder, 0777, true);
      
      file_put_contents($path, $content['output']);
    }
    
    return true;
  }
}
