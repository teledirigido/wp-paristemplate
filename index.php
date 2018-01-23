<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<?php 
			$meta = array(
				'title' => 'PHP, Stylus &amp; Grunt template by miguel.nz',
				'description' => 'Minimal boilerplate, useful and unobstructive.',
				'image' => 'og_image.png',
				'url' => 'http://miguel.nz/template'
			);
		?>

		<title><?php echo $meta['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">        
		<meta name="description" content="<?php echo $meta['description']; ?>">
		<meta name="author" content="Miguel Garrido">
		
		<meta property="og:title" content="<?php echo $meta['title']; ?>">
		<meta property="og:type" content="website"> 
		<meta property="og:url" content="<?php echo $meta['url']; ?>">
		<meta property="og:image" content="<?php echo $meta['image']; ?>">
		<meta property="og:description" content="<?php echo $meta['description']; ?>">

		<meta name="twitter:card" content="<?php echo $meta['image']; ?>">
		<meta name="twitter:title" content="<?php echo $meta['title'];  ?>">
		<meta name="twitter:description" content="<?php echo $meta['description']; ?>">
		<meta name="twitter:image:src" content="<?php echo $meta['image']; ?>">
		<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXX-X"></script> -->
		<?php wp_head(); ?>
	</head>
	<body>
		<script>
			if (window.location.host==="domain.com" || window.location.host==="www.domain.com") {
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-XXXXXXX-X');
      }
		</script>

		<!--[if lte IE 9]>
			<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
		<![endif]-->

		<div class="bgblack">
			<div class="content-wrapper white">
				<h1>PHP, Stylus &amp; Grunt template</h1>
				<h2>Minimal boilerplate you must escalate</h2>
				<h3>jQuery free, Babel JS included for fast front-end development.</h3>
				<h4>Don't ask if it is responsive, just don't. This is something you should know already.</h4>
				<h5>OOCSS, simple, unbloated and minimal. <strong>43Kb CSS File size</strong> incluing Font-awesome 4.7.0</h5>
			</div>
			
		</div>

		<div class="bgwhite">

			<div class="content-wrapper">
				<h2>Wordpress ready entry-content styles</h2>
				<h4 class="mb1">At: <pre>stylus/components/entry-content.styl</pre></h4>
				<div class="entry-content">
					<p>This template has been created thinking for <strong>front-end development</strong> and clean user interfaces. It uses Stylus, Grunt, Javascript and PHP. You may find it useful if you develop <a href="//wordpress.org" target="_blank">Wordpress</a> Websites. This is an unpretencious boilerplate, it must be scalable and it follows certain <a href="https://www.smashingmagazine.com/2011/12/an-introduction-to-object-oriented-css-oocss/">OOCSS</a> and you may find it similar to <a href="//tachyons.io/" target="_blank">tachyons</a>, although is 100x less bloated (according to pseudo-science).</p>
					<ul>
						<li>All CSS is wrapperd up under <pre>style.styl</pre></li>
						<li>Find <i>global variables</i>, font awesome and <i>media queries</i> variables under <pre>stylus/global.styl</pre></li>
						<li>Base CSS is under <pre>stylus/base</pre>, you won't need to edit this too much. I hope.</li>
						<li>Everything can be a <i>component</i> under <pre>stylus/components</pre></li>
						<li><span class="red">Looking for fancy colours?</span> check out <pre>style.styl</pre> and make your own combination!.</li>
					</ul>
				</div>

				<h2>Font Awesome Stylus 4.7.0 included and Flex Grid included</h2>
				<h4 class="mb1">At: <pre>bower_components/font-awesome-stylus/index.styl</pre> and <pre>stylus/components/grid.styl</pre></h4>
				<div class="flex-3">
					<div class="item"><i class="fa fa-fw fa-facebook"></i> Menu Item 1</div>
					<div class="item"><i class="fa fa-fw fa-instagram"></i> Menu Item 2</div>
					<div class="item"><i class="fa fa-fw fa-twitter"></i> Menu Item 3</div>
				</div>
				<p class="pt1">Read more about <a href="https://github.com/raulghm/Font-Awesome-Stylus" target="_blank">Font Awesome Stylus here</a>.</p>
			</div>

			<div class="bgred white">
				<div class="content-wrapper content-form mt2">
					<h2>Minimal form styles</h2>
					<h4 class="mb1">At: <pre>stylus/components/forms.styl</pre></h4>
					<form action="#">
						<div class="field">
							<input type="text" class="text" placeholder="Contact form 7 styles included">
						</div>
						<div class="field">
							<input type="email" class="text"  placeholder="Pretty cool, no?">
						</div>
						<div class="field-submit">
							<button class="submit">The answer is yes</button>
						</div>
					</form>
				</div>
			</div>
		
			<div class="content-wrapper">
				
				<div class="mt2">
					<h2>Float Span for 2, 3 or N Columns</h2>
					<h4 class="mb1">At: <pre>stylus/components/grid.styl</pre></h4>
					<div class="span-2 pb2">
						<div class="item">
							<p>This boilerplate is jQuery free, it uses Babel ES6 for your modern Javascript and Browser Sync.</p>
						</div>
						<div class="item">
							Scripts files are under under <pre>js/src</pre> and they're exported at <pre>js/dist</pre>. They are also minified into a <pre>scripts.min.js</pre> files.
						</div>
					</div>
				</div>

				<div class="mt2">
					<h2>Flex Grid for modern websites</h2>
					<h4 class="mb1">At: <pre>stylus/components/grid.styl</pre></h4>
					<div class="flex-2 pb2">
						<div class="item">
							<p>Yes, for modern browsers you can use Flex. Hope you're not into developing IE9 compatible websites.</p>
						</div>
						<div class="item">
							<p>Want to see real life projects? Check my projects at <a href="//miguel.nz/projects" target="_blank">miguel.nz/projects</a>. Many of them if not all have been developed following this boilerplate.</p>
						</div>
					</div>
				</div>				
			</div>

		</div>

		<div class="bgblue white p2 text-center">
			<p>PHP, Stylus &amp; Grunt template</p>
			<p class="pt1">
				<a href="https://github.com/teledirigido/html-stylus-grunt-template" target="_blank"><i class="fa fa-fw fa-2x fa-github"></i></a>
				<a href="http://miguel.nz" target="_blank"><i class="fa fa-fw fa-2x fa-link"></i></a>
				<a href="http://twitter.com/vuelvolar" target="_blank"><i class="fa fa-fw fa-2x fa-twitter"></i></a>
			</p>
		</div>
		<?php wp_footer(); ?>
		<script>
      (function(d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = site.template + '/js/head.js';
        // wf.async = true;
        s.parentNode.insertBefore(wf, s);
        wf.onload = function(){
          
          // All JS
          head.load([
            site.template + '/fonts/fonts.css',
            site.template + '/js/polyfill.min.js',
            site.template + '/js/scripts.min.js',
            ], function(){
            	// When files are loaded, load these ones
              // head.load( site.template + '/js/myfile.js' )
          })
          
          /* 
          Optional load JS conditional
          if(site.post_name === 'about'){
            head.load(
              site.template + '/js/box-2column-parallax.min.js'
            )
          }
          */
        }
      })(document);
		</script>
	</body>
</html>
