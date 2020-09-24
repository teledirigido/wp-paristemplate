# WP Paris Template 

This is an opinionated Wordpress starter theme that uses Laravel Mix, Stylus, ACF and modern JS. Includes postcss, several polyfills, utility wordpress actions and filters that will help you to start crafting your wordpress themes right away.

## Getting Started
1. Clone this repo under `wp-content/themes/your-theme`  
2. Install your dependencies: `$ yarn install`  
3. Customise your Laravel Mix settings on `webpack.mix.js`. Make sure your `startPath` is correct.
4. Watch your files via `$ yarn run watch`  
5. Start creating your beautiful Wordpress website.  

## File & Folder Structure

### /acf
`googlemaps.php`: Google Maps api key.  
`og.php`: Open Graph meta tags for posts and pages, customisable.  
`option_page.php`: Option page sample.  

### /inc
`autoload.php`: Autoload your own classes.  
`misc.php`: Misc actions and filters: theme_support, image_size, etc.  
`post_type.php`: Add post types programatically.  
`scripts.php`: Register scripts and Styles.  
`wp_footer.php`: Useful info and data for your footer.  
`post_types.php`: Easily register your own post post types.  
`taxonomies.php`: Easily register your own taxonomies.  

### /inc/classes
`PostTypeRegister.php`: Post Type register wrapper Class.  
`TaxonomyRegister.php`: Taxonomy register wrapper Class.  

### /resources
`/scripts`: JS Scripts.  
`/stylus`: Stylus boilerplate.  
`/stylus/style.styl`: Base style layout. Exported as `style.css` on your theme base.

### /static
`/fonts`: Custom fonts.  

## Stylus folder `/resources/stylus`
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

## Scripts folder `/resources/scripts`

*Documentation coming soon*
