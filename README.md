# ocooking-plugin


## Create custom post-types (CPT)

In the root ot the website

````
wp scaffold post-type cpt-recette --label=Recette --plugin=plugin-ocooking
```

Include post-types in the `class-plugin-ocooking.php`

```
/**
 * Load the cpt recette
 * Thierry Charriot@chez.lui
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'post-types/cpt-recette.php';
```

## Insomnia

oCooking GET all (Discovery)

```
http://192.168.0.10/wordpress-titre/web/wp-json/
```

oCooking GET posts

```
http://192.168.0.10/wordpress-titre/web/wp-json/wp/v2/posts
```

oCooking GET recipes (paramètre rest_base dans cpt-recipe)

```
http://192.168.0.10/wordpress-titre/web/wp-json/wp/v2/recipes
```

Désactiver thème 

```
Config::define( 'WP_USE_THEMES', false );
```

## Taxonomies

In the root ot the plugin

```
wp scaffold taxonomy ingredient --post_types=cpt-recipe > taxonomy-ingredient.php
```

Include taxonomy in the `class-plugin-ocooking.php`

```
/**
 * Load the taxonomy ingredient [cpt-recipe]
 * Thierry Charriot@chez.lui
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'taxonomies/taxonomy-ingredient.php';
```

```
wp scaffold taxonomy type --post_types=cpt-recipe > taxonomy-type.php
```

Include taxonomy in the `class-plugin-ocooking.php`

```
/**
 * Load the taxonomy type [cpt-recipe]
 * Thierry Charriot@chez.lui
 */
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'taxonomies/taxonomy-typet.php';
```

Vérifier liste roles en console

```
wp role list
```

Désactiver theme => dans `web/index.php'

```
define('WP_USE_THEMES', true);
```

