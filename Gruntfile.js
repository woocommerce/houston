module.exports = function( grunt ) {

	'use strict';

	var banner = '/**\n * Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.homepage %> \n * This file is generated automatically, do not edit. \n */';

	var themeScripts = [
	];

	// Project configuration
	grunt.initConfig( {

		pkg:    grunt.file.readJSON( 'package.json' ),

		// JS Minification & Concatenation
		uglify: {

			dev: {
				options: {
					banner: banner,
					preserveComments: true,
					sourceMap: true,
					sourceMapRoot: '/',
					beautify: true,

				},
				files: {
					'assets/js/theme.js': themeScripts
				}
			},

			prod: {
				options: {
					banner: banner,
					preserveComments: false,
					mangle: { except: ['jQuery'] }
				},
				files: {
					'assets/js/theme.js': themeScripts
				}
			}

		},

		compass: {
			dev: {
				options: {
					sassDir: 'assets/css/scss',
					cssDir: 'assets/css',
					imagesDir: 'assets/images',
					outputStyle: 'expanded',
					relativeAssets: true,
					noLineComments: false
				}
			},
			prod: {
				options: {
					sassDir: 'assets/css/scss',
					cssDir: 'assets/css',
					imagesDir: 'assets/images',
					environment: 'production',
					outputStyle: 'compressed',
					relativeAssets: true,
					noLineComments: true,
					force: true
				}
			}
		},

		// Watch for changes
		watch: {
			css: {
				files: 'assets/css/**/*.scss',
				tasks: ['compass:dev'],
				options: {
					debounceDelay: 500,
					livereload: true
				}
			},
			scripts: {
				files: 'assets/js/src/**/*.js',
				tasks: ['uglify:dev']
			}
		}

	} );

	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	// Default task.
	grunt.registerTask( 'default', ['compass:prod', 'uglify:prod'] );
	grunt.registerTask( 'dev',     ['compass:dev', 'uglify:dev'] );

};
