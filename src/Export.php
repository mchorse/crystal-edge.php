<?php

namespace crystal\edge;

/**
 * Export interface
 * 
 * Implementations of this class responsible for exporting 
 * give instance of Site to some kind of destination like 
 * file system folder, zip archive, FTP, git, etc.
 */
interface Export
{
    /**
     * Export the website
     * 
     * @param \crystal\edge\Logger|null $logger Logger implementation
     * @return bool
     */ 
    public function export(Logger $logger = null);
}
