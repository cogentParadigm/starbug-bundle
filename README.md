# Bundle

The Bundle class is a simple object abstraction for working with nested array structures.

Basic example:

```php
use Starbug\Bundle\Bundle;

$bundle = new Bundle();

$bundle->set("user", "first_name", "Abdul");

$bundle->get("user", "first_name"); // returns Abdul
$bundle->has("user", "first_name"); // return true


$bundle->set("user", "address", "city", "Vancouver");

$bundle->get("user", "address", "city"); // returns Vancouver
$bundle->has("user", "address", "city"); // returns true
```

See the [specification](spec/Starbug/Bundle/BundleSpec.php) for more details.
