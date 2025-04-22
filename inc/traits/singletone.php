<?php

trait WPBoilerplateSingleTone
{
    private static $instance;

    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
