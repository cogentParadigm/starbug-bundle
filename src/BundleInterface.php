<?php
namespace Starbug\Bundle;

use IteratorAggregate;
use Countable;
use ArrayAccess;

interface BundleInterface extends IteratorAggregate, Countable, ArrayAccess {

  /**
   * Get a value.
   *
   * @param mixed ...$keys Zero or more keys of successive depth.
   *   Think of $data["user"]["first_name"] becoming $this->get("user", "first_name").
   *
   * @return void
   */
  public function get(...$keys);

  /**
   * Check if a value exists.
   *
   * @param mixed ...$keys Zero or more keys of successive depth. {@see BundleInterface::get()}.
   *
   * @return boolean True if the key position has a value, false otherwise.
   */
  public function has(...$keys);

  /**
   * Set a value.
   *
   * @param mixed ...$keys Zero or more keys of successive depth. {@see BundleInterface::get()}.
   * @param mixed $value The last parameter is the value to set.
   *
   * @return void
   */
  public function set(...$keys);

  /**
   * Check if the bundle is empty or not.
   *
   * @return boolean True if the bundle has no data, false otherwise.
   */
  public function isEmpty();
}
