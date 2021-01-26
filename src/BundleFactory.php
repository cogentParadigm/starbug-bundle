<?php
namespace Starbug\Bundle;

class BundleFactory implements BundleFactoryInterface {
  public function create($data = []): BundleInterface {
    return new Bundle($data);
  }
}