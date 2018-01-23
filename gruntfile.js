
module.exports = function(grunt) {
  // Configure Grunt
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    babel: {
      options: {
        'sourceMap': true,
        presets: ['es2015']
      },
      dist: {
        files: [{
          "expand": true,
          "cwd": "./js/src/",
          "src": ["*.js"],
          "dest": "./js/dist/",
          "ext": ".js"
        }]
      }
    },
    uglify: {
      my_target: {
        options : {
          sourceMap : true,
        },
        // src : './js/dist/*.js',
        // dest : './js/scripts.min.js'
        files: {
          'js/scripts.min.js': [
            './js/dist/scripts.js',
            './js/dist/header.js',
          ]
        }
      }
    },
    browserSync: {
      dev: {
        bsFiles: {
          src : [
            './*.css',
            './*.php',
            './js/*.js',
          ]
        },
        options: {
          watchTask: true,
          proxy: "http://localhost/template/"
        }
      }
    },

    stylus: {
      compile: {
        options: {
          compress: true,
          sourcemap:{
            inline:false
          },
          paths: ['stylus'],
          import: ['stylus/*']
        },
        files: {
          'style.css' : 'style.styl',
          'fonts/fonts.css': 'fonts/fonts.styl'
        }
      }
    },

    // grunt-watch will monitor the projects files
    // https://github.com/gruntjs/grunt-contrib-watch
    watch: {
      template: {
        files: ['*/*.*'],
        options: {
          livereload: true
        }
      },
      stylus: {
        files: ['*.styl','./**/*.styl'],
        tasks: ['stylus'],
        options : { livereload: true },
      },
      scripts: {
        files: ['./js/src/*.js'],
        tasks: ['babel','uglify'],
        options: {
          livereload: true
        }
      }
    },

  });
  
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-contrib-stylus');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-babel');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Creates the `server` task
  grunt.registerTask('site', [
    'browserSync',
    'babel',
    'uglify',
    'stylus',
    'watch',
  ]);

};