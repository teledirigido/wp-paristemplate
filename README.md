# WP Paris Template 
Laravel Mix, Stylus, ACF

Documentation coming soon, like everything.
`wp-paristemplate` is a Wordpress boilerplate ready to work.

## File & Folder Structure

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
Base boilerplate.
`index.styl`
`default.styl`: Default mixins and functions.  
`gaps.styl`: Padding and Margin gaps.  
`grid.styl`: Grid and flex styles.  
`media-queries.styl`: Your mediaqueries, variables are aread from `scripts/mediaQueries.js`  
`print.css`: Soon to be deprecated  
`reset.css`: Reset styles

#### `/components`
For reusable component elements througout your interfaces.  
Intented to be modified and filled with your own development.  

`colours.styl`: Colour and background colour styles 
`entry-content.styl`: Blog post styles
`footer.styl`: Footer styles
`forms.styl`: Forms styles
`header.styl`: Header styles

#### `/pages`
For page styles only. Follow the wordpress name nomenclature.  
`front-page.styl`: Front Page Styles

## Scripts folder `/scripts`

*Documentation coming soon*
