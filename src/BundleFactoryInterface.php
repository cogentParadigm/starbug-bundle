<?php
namespace Starbug\Bundle;

interface BundleFactoryInterface {
  public function create($data = []): BundleInterface;
}