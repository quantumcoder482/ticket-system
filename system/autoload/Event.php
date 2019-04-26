<?php
class Event
{
    public static $events = array();

    public static function trigger($event, $args = array())
    {
        if(isset(self::$events[$event]))
        {
            foreach(self::$events[$event] as $func)
            {
                call_user_func($func, $args);
            }
        }

    }

    public static function bind($event, Closure $func)
    {
        self::$events[$event][] = $func;
    }
}