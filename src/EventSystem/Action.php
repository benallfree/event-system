<?php
  
namespace BenAllfree\EventSystem;

class Action
{
  static $actions = array();
  static function register($name, $callback, $priority=10)
  {
    if(!isset(self::$actions[$name]))
    {
      self::$actions[$name] = array();
    }
    if(!isset(self::$actions[$name][$priority]))
    {
      self::$actions[$name][$priority] = array();
    }
    self::$actions[$name][$priority][] = $callback;
  }
  
  static function _do()
  {
    $args = func_get_args();
    $name = array_shift($args);
    $priorities = array_keys(self::$actions[$name]);
    sort($priorities);
    foreach($priorities as $p)
    {
      foreach(self::$actions[$name][$p] as $callback)
      {
        call_user_func($callback, $args);
      }
    }
  }
}