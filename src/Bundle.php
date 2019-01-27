<?php
namespace Starbug\Bundle;

class Bundle implements BundleInterface {
  protected $data;

  public function __construct(array $data = []) {
    $this->data = $data;
  }

  public function get(...$keys) {
    $value = $this->data;
    foreach ($keys as $key) {
      if (!isset($value[$key])) return null;
      $value = $value[$key];
    }
    return $value;
  }

  public function has(...$keys) {
    $target = $this->data;
    while (!empty($keys)) {
      $key = array_shift($keys);
      if (is_array($target) && array_key_exists($key, $target)) {
        $target = $target[$key];
      } else {
        return false;
      }
    }
    return !empty($target);
  }

  public function set(...$keys) {
    $target = &$this->data;
    $value = array_pop($keys);
    foreach ($keys as $key) {
      if (!is_array($target)) $target = [];
      $target = &$target[$key];
    }
    $target = $value;
    return $this;
  }

  public function getIterator() {
    return new ArrayIterator($this->data);
  }

  public function count() {
    return count($this->data);
  }

  public function offsetExists($offset) {
    return isset($this->data[$offset]);
  }

  public function offsetGet($offset) {
    return isset($this->data[$offset]) ? $this->data[$offset] : null;
  }

  public function offsetSet($offset, $value) {
    if (is_null($offset)) {
      $this->data[] = $value;
    } else {
      $this->data[$offset] = $value;
    }
  }

  public function offsetUnset($offset) {
    unset($this->data[$offset]);
  }

  public function isEmpty() {
    return empty($this->data);
  }
}
