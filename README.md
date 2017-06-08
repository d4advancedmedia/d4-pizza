# d4-pizza
The D4 code library

Simply create another plugin and paste in the following, uncommenting as needed:
```php
<?php

/*
	Plugin Name: D4 Toppings
	Description: Choice toppings
*/

	function d4toppingchooser($toppings) { 

		#$toppings['brand'] = true;
		#$toppings['button'] = true;
		#$toppings['carousel'] = true;
		#$toppings['customsearch'] = true;
		#$toppings['fonticons'] = true;
		#$toppings['getpost'] = true;
		#$toppings['googlemap'] = true;
		#$toppings['portfolio'] = true;
		#$toppings['reanimator'] = true;
		#$toppings['slidemenu'] = true;
		#$toppings['staffmember'] = true;
		#$toppings['testimonial'] = true;

		return $toppings;

	} add_filter( 'd4toppings', 'd4toppingchooser' );

```
Add and remove toppings as needed!