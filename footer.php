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