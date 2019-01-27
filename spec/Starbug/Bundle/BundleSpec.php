<?php

namespace spec\Starbug\Bundle;

use Starbug\Bundle\Bundle;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Spec test for Starbug\Bundle\Bundle.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */
class BundleSpec extends ObjectBehavior {
  public function it_is_initializable() {
    $this->shouldHaveType(Bundle::class);
  }
  public function it_is_empty_by_default() {
    $this->isEmpty()->shouldReturn(true);
  }
  public function it_can_set_and_get_values() {
    $this->set("key1", "value1");
    $this->set("key2", "value2");

    $this->get("key1")->shouldReturn("value1");
    $this->get("key2")->shouldReturn("value2");
    $this->get("key3")->shouldReturn(null);
  }
  public function it_can_tell_you_what_it_has() {
    $this->set("key1", "value1");
    $this->set("key2", "value2");

    $this->has("key1")->shouldReturn(true);
    $this->has("key2")->shouldReturn(true);
    $this->has("key3")->shouldReturn(false);
  }
  public function it_can_be_initialized_with_values() {
    $this->beConstructedWith(["key" => "value"]);
    $this->isEmpty()->shouldReturn(false);
    $this->has("key")->shouldReturn(true);
    $this->get("key")->shouldReturn("value");
  }
  public function it_can_set_and_get_nested_values() {
    $this->set("user", "first_name", "Abdul");

    $this->has("user")->shouldReturn(true);
    $this->has("user", "first_name")->shouldReturn(true);
    $this->has("user", "last_name")->shouldReturn(false);
    $this->get("user", "first_name")->shouldReturn("Abdul");
  }
  public function it_can_set_and_get_nested_values_at_any_depth() {
    $this->set("one", "two", "three", "four", "five", "six", "seven", "Abdul");

    $this->has("one")->shouldReturn(true);
    $this->has("one", "two")->shouldReturn(true);
    $this->has("one", "two", "three")->shouldReturn(true);
    $this->has("one", "two", "three", "four")->shouldReturn(true);
    $this->has("one", "two", "three", "four", "five")->shouldReturn(true);
    $this->has("one", "two", "three", "four", "five", "six")->shouldReturn(true);
    $this->has("one", "two", "three", "four", "five", "six", "seven")->shouldReturn(true);
    $this->has("one", "three")->shouldReturn(false);
    $this->has("one", "two", "three", "four", "five", "six", "eight")->shouldReturn(false);
    $this->get("one", "two", "three", "four", "five", "six", "seven")->shouldReturn("Abdul");
  }
}
