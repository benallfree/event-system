<?php

use BenAllfree\EventSystem\Action;
use BenAllfree\EventSystem\Filter;

function register_action($name, $callback, $priority=10) {
  Action::register($name, $callback, $priority);
}

function register_filter($name, $callback, $priority) {
  Filter::register($name, $callback, $priority);
}

function do_action() {
  $args = func_get_args();
  call_user_func_array('Action::do', $args);
}

function apply_filters() {
  $args = func_get_args();
  return call_user_func_array('Filter::apply', $args);
}