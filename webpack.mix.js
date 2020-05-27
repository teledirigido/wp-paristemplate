const startPath = 'testing/paristemplatesite';
const viewsFolder = '.';
const assetsFolder = 'resources';
const publicFolder = 'dist';
const staticFolder = 'static';

let mix = require('laravel-mix');
let mediaQueries = require(`./${assetsFolder}/scripts/mediaQueries`);

const browserSyncOptions = {
  proxy: 'localhost',
  startPath: startPath,
  watch: true,
  reload: true,
  notify: false,
  files: [
    `${publicFolder}/scripts/*.js`,
    `style.css`,
    `${publicFolder}/**/*.css`,
    `${viewsFolder}/**/*.php`,
  ],
   // middleware: [proxyBaseURL]
};

const screenSizes = function(style){
  style.define('bigdesktop-layout', mediaQueries()['bigdesktop-layout']);
  style.define('mobilemenu-layout', mediaQueries()['mobilemenu-layout']);
  style.define('desktop-layout', mediaQueries()['desktop-layout']);
  style.define('tablet-layout', mediaQueries()['tablet-layout']);
  style.define('mobile-layout', mediaQueries()['mobile-layout']);
};

const autoprefixerOptions = {
  browserList: ['> 5%'],
  grid: 'autoplace'
};

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

 mix.options({
  processCssUrls: false,
  postCss: [
    require('autoprefixer')(autoprefixerOptions),
  ],
});

if (!mix.inProduction()) {
  mix.webpackConfig({
    devtool: 'inline-source-map'
  })
}

mix.sourceMaps()

// CSS, Stylus
mix.stylus(
  `${assetsFolder}/style.styl`, 
  `style.css`, {
    use: [
      require('font-awesome-stylus')(),
      screenSizes
    ]
  })
.options({
  processCssUrls: false
});


// Javascript
let $jsFiles = [
  `${assetsFolder}/scripts/header.js`,
  `${assetsFolder}/scripts/scripts.js`,
];
mix.js($jsFiles, `${publicFolder}/scripts/scripts.js`);

// BrowserSync
mix.browserSync(browserSyncOptions);

// Copy Fonts
// mix.copyDirectory(
//   `${assetsFolder}/fonts`,
//   `${staticFolder}/fonts`,
// ).options({
//   // Uses public/ by default
//   // From: https://github.com/JeffreyWay/laravel-mix/issues/1139#issuecomment-352105425
//   fileLoaderDirs: {
//     fonts: `${publicFolder}/fonts`
//   }
// });

// Copy Fonts - Font Awesome
mix.copyDirectory(
  `node_modules/font-awesome-stylus/fonts`,
  `${staticFolder}/fonts`,
).options({
  // Uses public/ by default
  // From: https://github.com/JeffreyWay/laravel-mix/issues/1139#issuecomment-352105425
  fileLoaderDirs: {
    fonts: `${publicFolder}/fonts`
  }
});

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.preact(src, output); <-- Identical to mix.js(), but registers Preact compilation.
// mix.coffee(src, output); <-- Identical to mix.js(), but registers CoffeeScript compilation.
// mix.ts(src, output); <-- TypeScript support. Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
// mix.browserSync('my-site.test');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.babelConfig({}); <-- Merge extra Babel configuration (plugins, etc.) with Mix's default.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.dump(); <-- Dump the generated webpack config object t the console.
// mix.extend(name, handler) <-- Extend Mix's API with your own components.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   globalVueStyles: file, // Variables file to be imported in every component.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   terser: {}, // Terser-specific options. https://github.com/webpack-contrib/terser-webpack-plugin#options
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });
