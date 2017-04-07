# d4-pizza
The D4 code library

Simply create another plugin and paste in the following:
```php
<?php

/*
	Plugin Name: D4 Toppings
	Description: Choice toppings
*/

	function d4toppingchooser($toppings) { 

		#$toppings['test'] = true;
		$toppings['testimonial'] = true;

		return $toppings;

	} add_filter( 'd4toppings', 'd4toppingchooser' );

```
Add and remove toppings as needed!