# WP Paris Template 
Laravel Mix, Stylus, ACF

Documentation coming soon, like everything.
`wp-paristemplate` is a Wordpress boilerplate ready to work.

## Structure

### /acf
`googlemaps.php`: Google Maps api key.  
`og.php`: Open Graph meta tags for posts and pages, customisable.  
`option_page.php`: Option page sample.  

### /assets
`misc.php`: Misc actions and filters: theme_support, image_size, etc.  
`post_type.php`: Add post types programatically.  
`scripts.php`: Register scripts and Styles.  
`wp_footer.php`: Useful info and data for your footer.  

### /resources
`/scripts`: JS Scripts.  
`/stylus`: Stylus boilerplate.  
`style.styl`: Base style layout.  

### /static
`/fonts`: Custom fonts.  

## Stylus folder `/stylus`
The stylus folder has a `base`, `components` and `page` folder.

`global.styl`: Theme's global variables  
`layout.styl`: Theme's style layout  

#### `/base`
`default.styl`  
`gaps.styl`  
`grid.styl`  
`index.styl`  
`media-queries.styl`  
`print.css`: Soon to be deprecated  
`reset.css`

#### `/components`
For components elements, reusable througout the interface

#### `/pages`
For page styles only
