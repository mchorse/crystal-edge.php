<?php

namespace crystal\edge;

/**
 * Logger interface
 *
 * Responsible for logging, duh.
 */
interface Logger
{
    /* Severity log levels */
    const INFO = 0;
    const WARN = 1;
    const ERROR = 2;
    
    /**
     * Logs the message
     *
     * @param int $level The severity level of log
     * @param string $string Format string
     * @param array $args Arguments to be used in formatting the $string argument
     */
    public function log($level, $string, array $args);
}
