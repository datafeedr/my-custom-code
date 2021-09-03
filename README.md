# Custom Code Examples

In this repo you can find custom code examples to extend or modify how the Datafeedr plugins work.

## How to Use

1. [Download this repo](https://github.com/datafeedr/my-custom-code/archive/refs/heads/main.zip).
2. Go here WordPress Admin Area > Plugins > Add New > [Upload Plugin]
3. Upload the `my-custom-code-main.zip` plugin.
4. Activate the **My Custom Code** plugin.
5. Go here WordPress Admin Area > Plugins > Plugin Editor
6. Select **My Custom Code** from the **_Select plugin to edit_** drop down menu.
7. You will see a list of `require_once` statements and some will have `//` in front. If you want to use one of the modules, remove the preceeding `//` code.

Here's an example of some modules enabled and others not. In this example the first 2 modules and last module are enabled whereas the 3rd, 4th and 5th modules are disabled.

```php
require_once 'modules/enable-product-update-feature-flag.php';
require_once 'modules/prune-action-scheduler-actions-more-often.php';
//require_once 'modules/set-product-excerpt-equal-to-product-description.php';
//require_once 'modules/sort-products-from-specific-merchants-last.php';
//require_once 'modules/add-size-attribute-for-each-product.php';
require_once 'modules/limit-results-returned-by-comparison-set.php';
```

## Modules

Here's a list of the modules included in this custom code plugin. You can activate or deactivate any of these modules at any time (see "How to use" above).

### add-size-attribute-for-each-product.php

Adds size mapping for automatically adding size attributes to products.

### enable-product-update-feature-flag.php

Enabled the new Product Update feature flag. [Learn more](https://github.com/datafeedr/wordpress-plugins/discussions/5).

### limit-results-returned-by-comparison-set.php

Limit the number of results displayed by a Comparison Set.

### normalize-merchant-attribute-names.php

Modify merchant names before they are imported as product attributes.

### prune-action-scheduler-actions-more-often.php

Prune completed actions created by the Action Scheduler every day (instead of every 30 days) and allow up to 500 actions
to be deleted at a time.

### set-product-excerpt-equal-to-product-description.php

Set the products short description (excerpt) equal to this `description` field if the `shortdescription` is unavailable.

### sort-products-from-specific-merchants-last.php

Set products from specific merchants to sort last on category pages.

