module.exports = function(grunt) {
    grunt.initConfig({
        concat: {
            plugins: {
                src: ['lib/jquery-animateNumber/jquery.animateNumber.min.js', 'lib/slick-carousel/slick/slick.min.js', 'lib/Morphext/dist/morphext.js','assets/oembed/oembed.min.js','lib/history.js/scripts/bundled/html4+html5/jquery.history.js'],
                dest: 'assets/js/plugins.concat.js'
            },
            js: {
                src: ['assets/js/app.js'],
                dest: 'assets/js/app.concat.js'
            },
        },
        uglify: {
            plugins: {
                src: 'assets/js/plugins.concat.js',
                dest: 'assets/js/build/plugins.js'
            },
            build: {
                src: 'assets/js/app.concat.js',
                dest: 'assets/js/build/app.min.js',
                options: {
                    sourceMap: true
                }
            }
        },
        stylus: {
            compile: {
                options: {
                    use: [
                        require('rupture')
                    ],
                },
                files: {
                    'assets/css/app.min.css': 'assets/css/app.styl'
                }
            }
        },
        cssmin: {
          options: {
            shorthandCompacting: true,
            roundingPrecision: -1
          },
          target: {
            files: {
              'assets/css/build/build.min.css': ['assets/css/normalize.css', 'assets/oembed/oembed.css', 'assets/css/sens-font.css', 'lib/slick-carousel/slick/slick.css','lib/slick-carousel/slick/slick-theme.css','lib/animate.css/source/_base.css', 'lib/animate.css/source/flippers/flipInX.css', 'lib/Morphext/dist/morphext.css', 'assets/css/app.min.css']
            }
          }
        },
        watch: {
            js: {
                files: ['lib/**/*.js', 'assets/js/**/!(app.min|app.concat).js'],
                tasks: ['javascript'],
                options: {
                    livereload: true,
                }
            },
            css: {
                files: ['assets/css/**/*.styl'],
                tasks: ['stylesheets'],
                options: {
                    livereload: true,
                }
            }
        },
        php: {
            test: {
                options: {
                    keepalive: true,
                    port: 5000,
                    open: true
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-stylus');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-php');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('javascript', ['concat', 'uglify']);
    grunt.registerTask('stylesheets', ['stylus', 'cssmin']);
    grunt.registerTask('test', ['php', 'mocha']);
    grunt.registerTask('default', ['javascript', 'stylesheets', 'watch', 'php']);
};