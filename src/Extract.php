<?php

namespace crystal\edge;

/**
 * Web page extractor interface
 * 
 * This interface is responsible for implementing extraction of 
 * web pages from some source like data base or file system.
 */
interface Extract
{
    /**
     * Extract web pages from some (DB, cache, FS, array) source 
     * 
     * @return array
     */
    public function extract();
}
