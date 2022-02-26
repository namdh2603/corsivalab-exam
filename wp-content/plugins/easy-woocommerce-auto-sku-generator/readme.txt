=== Easy Auto SKU Generator for WooCommerce ===
Contributors: alexodiy, campusboy1987
Donate link: https://www.paypal.com/cgi-bin/webscr?&cmd=_xclick&business=studia55x5@yandex.ru&currency_code=USD&amount=15&item_name=On coffee for the developer
Tags: sku generator, product sku, woocommerce sku, auto sku, add sku, sku woocommerce, woocommerce, SKU Variable Products, Variable Products, sku numbers, sku letters, sku slug, autoSKU, automatically generate SKUs, generate variation SKUs, SKU Settings
Requires at least: 4.8
Tested up to: 5.9
Stable tag: 1.1.2
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
A very simple plug-in of auto-generating SKU for those who are too lazy to fill in the article (SKU) of the product when it is created. Just activate the plugin and when creating a product the SKU will automatically generate.

> In the last update of the plugin, a new function was added - **Generation of SKU into separate categories**.

> **The new version of the plugin adds the function of mass generating SKU of all products at the same time. We will improve this option. In the future, not only mass generation will be available, but also generation for certain parameters (generation by attributes, by tags, by categories).**

== Settings plugin ==

Woocommerce &rarr; Settings &rarr; Products &rarr; SKU Settings

== Features: ==

1. Automatic generation of SKU when creating goods
2. If you have already registered SKU, then generation will not follow.
3. Automatic generation of the SKU of the variable product while saving
4. You can set the number of characters in SKU
5. You can add a prefix before SKU
6. Select format SKU (Only numbers, Only letters, Letters and numbers, Product Slag Generation)
7. You can use the product ID in SKU
8. Disable / Enable SKU generation in variable goods.
9. Special option “Take the previous product” - generates  product taking into account the last published product. Suppose you have the last published product that has SKU 005234, and if this option is enabled, the next item will be 005235 (+1 to the previous published product)
10. Added and ready to use function <br>**"Bulk generate SKU for all products"**
11. Added and ready to use a new function <br>**"Bulk generate SKU by Category"**
12. You can allow duplicate SKUs in the online store

== Required Plugins ==
* [WooCommerce](https://wordpress.org/plugins/woocommerce/)

== Great thanks ==
* Thanks for the help [KAGG Design](https://profiles.wordpress.org/kaggdesign/)
* Thanks for helping the developer [Artem Abramovich](https://profiles.wordpress.org/artabr/)
* For help [Telegram chat "WordPress & WooCommerce" and all participants](https://t.me/c_wordpress)
* For the best documentation in Russian by WordPress [Site wp-kama.ru](https://wp-kama.ru/)

== Translations ==

If you wish to help translate this plugin, you are most welcome!
To contribute, please visit [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/easy-woocommerce-auto-sku-generator/)

== Donate link: ==
<a href="https://www.paypal.com/cgi-bin/webscr?&amp;cmd=_xclick&amp;business=studia55x5@yandex.ru&amp;currency_code=USD&amp;amount=15&amp;item_name=On coffee for the developer" target="_blank">Pay with Paypal</a>

== Installation ==

This section describes how to install the plugin and get it working.

Install From WordPress Admin Panel:

1. Login to your WordPress Admin Area
2. Go to Plugins -> Add New
3. Type "**Easy Auto SKU Generator for WooCommerce**" into the Search and hit Enter.
4. Find this plugin Click "install now"
5. Activate The Plugin

Manual Installation:

1. Download the plugin from WordPress.org repository
2. On your WordPress admin dashboard, go to ‘Plugins -> Add New -> Upload Plugin’
3. Upload the downloaded plugin file and click ‘Install Now’
4. Activate ‘**Easy Auto SKU Generator for WooCommerce**’ from your Plugins page.

== Frequently Asked Questions ==

= Can I contribute to the improvement of the plugin? =

Sure! You can leave a request on the user [support forum](https://wordpress.org/support/plugin/easy-woocommerce-auto-sku-generator/). We will consider any proposal and teach any criticism.

= Bulk SKU generation for all products stops and does not work correctly - what should I do? =

Some users have problems with mass SKU generation. Today I can say with confidence that the plugin has been fixed in relation to this function, we decided this in [this thread on the user support forum](https://wordpress.org/support/topic/mass-creation-crashed/).

**So what if mass creation ceases?**

1. Be sure to update the plugin to the latest version

2. On the settings page in a browser, open DevTools and on the console tab check for errors. If you have any errors, be sure to let us know in the user support forum. If you see a 500 error, this is a server error, and you need to get your server logs to determine the error.

3. If you know how to do this, then look at the server logs, there are all the errors. Write us about the error on the [user support forum](https://wordpress.org/support/plugin/easy-woocommerce-auto-sku-generator/).

4. Contact the technical support service of your hosting provider and explain the cause of the problem. Find out where the server logs are located (if you do not know which log is stored). Ask to fix the problem, maybe they will fix it.

Only after we see the server logs, we can find out the reason for the script to work incorrectly. You can find an alternative to our plugin, but keep in mind that something on your server is not working correctly.

Be sure to write to the [user support forum](https://wordpress.org/support/plugin/easy-woocommerce-auto-sku-generator/) if the error has been fixed. There are other people who will use our plugin and need to be properly informed.

== Screenshots ==

1. Format SKU
2. SKU Settings
3. Where to find the settings?
4. Support forum and field SKU
5. SKU generation options
6. Bulk generate SKU for all products
7. Bulk generate SKU by Category
8. Bulk generate SKU by Category
9. The process of generating SKU of all products
10. Completion of the SKU generation process for all products
11. Future plans

== Upgrade Notice ==

== Changelog ==

= 1.1.2 =
* Tested compatibility with WordPress 5.9
* Tested compatibility with WooCommerce 5.8.3
* Changed SKU generator progress indicator
* Add style generator SKU

= 1.1.1 =
* Added compatibility with the "Table Rate Shipping Method for WooCommerce by Flexible Shipping" plugin
* CSS class of the modal window is now unique. Added compatibility with other plugins

= 1.1.0 =
* Fixed bug with disabling SKU block

= 1.1.2 =
* Added new option "Allow identical SKUs"

= 1.0.8 =
* Fixed an error generating variant products
* Changed the order of execution of the variable products generator script
* Fixed getting a basic SKU in relation to variable products in the SKU generator

= 1.0.7 =
* Fixed bug with SKU generation by slug of product

= 1.0.6 =
* Tested WP version 5.8

= 1.0.5 =
* Tested WP version

= 1.0.4 =
* Correction of error with number 0

= 1.0.3 =
* The limitation on the generation of the minimum number of characters has been removed

= 1.0.2 =
* Rename function "ffxf_action_javascript"

= 1.0.1 =
* Plugin tested with WordPress version 5.5

= 1.0.0 =
* Tested WP 5.4

= 0.9.9 =
* Fixed a bug that was caused due to duplication of SKU

= 0.9.8 =
* Update notice

= 0.9.7 =
* Added new functions "Bulk generate SKU by Category"
* Bugs fixed with the function of the previous product
* Take previous product has become more convenient
* Update CSS
* Update JS

= 0.9.6 =
* Update CSS
* Preparation for the introduction of a new parameter - Generation of SKU into separate categories.

= 0.9.5 =
* Fix error in notice

= 0.9.4 =
* Test WordPress 5.3

= 0.9.3 =
* Fixed bug with mass generation

= 0.9.2 =
* Re-create online button is now always available
* New support forum notification added

= 0.9.1 =
* WooCommerce test 3.8.0
* Optimize code
* Add notice

= 0.9.0 =
* fix translate and add text-domain in generate SKU

= 0.8.9 =
* update CSS

= 0.8.8 =
* fix translate

= 0.8.7 =
* fix translate

= 0.8.7 =
* fix translate selector

= 0.8.6 =
* fix missing dependencies ffxf_slug_script.js

= 0.8.5 =
* Now, after installing the plugin, you can immediately generate products without saving the general settings.
* New POT file
* Fixed text domain of the translation plugin

= 0.8.4 =
* Added and ready to use a new function "Bulk generate SKU for all products"
* New function “Bulk generate SKU by Category” prepared for implementation
* New function “Bulk generate SKU by Attributes” prepared for implementation
* New function “Bulk generate SKU by product tags” prepared for implementation
* New interface added

= 0.8.3 =
* Changed the main banner so as not to infringe on Woocommerce copyright
* In the latest version of plugin 0.8.3, preparations were made for implementing a function that generates SKUs for all products bulk. 

= 0.8.2 =
* Fixed numerical values

= 0.8.2 =
* Test numerical values and fix error

= 0.8.1 =
* Test numerical values

= 0.8.1 =
* Test numerical values
* Added a new function for converting SKU numbers of previously published products
* New notification added in case of error or failure

= 0.8.0 =
* Fix error id SKU and all option

= 0.7.9 =
* New feature refinement - "Consider the previous product"

= 0.7.8 =
* Improvement of the function "Consider the previous product"
* Fixed bugs with zeros
* Using the new function, the article can now be rewritten
* New styles added

= 0.7.7 =
* Add new functions "Take into account the previous product" 

= 0.7.6 =
* Product ID is now at the end SKU

= 0.7.5 =
* Fix JS error

= 0.7.4 =
* Fixed script connection

= 0.7.3 =
* Optimized code

= 0.7.2 =
* Fix JS error

= 0.7.1 =
* Fix error slug SKU

= 0.7.0 =
* Add new settings - Product Slug Generation
* Add Re-Create SKU online
* Optimized code

= 0.6.0 =
* Optimized settings code

= 0.5.0 =
* Fixed problems with literal values

= 0.4.0 =
* Added settings in ‘Woocommerce &rarr; Settings &rarr; Products &rarr; SKU Settings’
* Added option - Number of characters in SKU
* Added option - Prefix before SKU
* Added option - SKU format (Only numbers, Only letters, Letters and numbers)
* Added option - Use product ID in SKU
* Added option - Disable / Enable generation of SKU in variable goods
* Update generation function sku

= 0.3.0 =
* Update generation function sku

= 0.2.0 =
* Release