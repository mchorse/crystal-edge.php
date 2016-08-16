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
        $iterator = new RecursiveDirectoryIterator($this->path);
        $iterator = new RecursiveIteratorIterator($iterator);

        $pages = [];
        $files = iterator_to_array($iterator);
        $files = array_filter($files, function($file)
        {
            return $file->isFile();
        });
        
        foreach($files as $path)
        {
            $pages[$this->exclude($path)] = compact('path');
        }
        
        return $pages;
    }
    
    /**
     * Exclude the path from the given file path including one slash
     * 
     * @param string $path Given file path
     * @return string
     */
    private function exclude($path)
    {
        return substr($path, strlen($this->path) + 1);
    }
}