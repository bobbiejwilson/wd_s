module.exports = function(grunt) {

	// load all grunt tasks in package.json matching the `grunt-*` pattern
	require('load-grunt-tasks')(grunt);

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		githooks: {
			all: {
				'pre-commit': 'default'
			}
		},

		sprite: {
			all: {
				'src': 'themes/_s/images/sprites/*.png',
				'destImg': 'themes/_s/images/sprites.png',
				'destCSS': 'themes/_s/sass/partials/_sprites.scss',
				'imgPath': 'images/sprites.png',
				'algorithm': 'binary-tree',
			}
		},

		csscomb: {
			dist: {
				files: [{
					expand: true,
					cwd: 'themes/_s/',
					src: ['**/*.css'],
					dest: 'themes/_s/',
				}]
			}
		},

		sass: {
			dist: {
				options: {
					style: 'expanded',
					lineNumbers: true,
					loadPath: require('node-neat').includePaths,
					sourceMap: false,
				},
				files: {
					'themes/_s/style.css': 'themes/_s/sass/style.scss'
				}
			}
		},

		autoprefixer: {
			options: {
				browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1']
			},
			dist: {
				src:  'themes/_s/style.css'
			}
		},

		cmq: {
			options: {
				log: false
			},
			dist: {
				files: {
					'themes/_s/style.css': 'themes/_s/style.css'
				}
			}
		},

		cssmin: {
			minify: {
				expand: true,
				cwd: 'themes/_s/',
				src: ['*.css', '!*.min.css'],
				dest: 'themes/_s/',
				ext: '.min.css'
			}
		},

		concat: {
			dist: {
				src: [
					'themes/_s/js/partials/*.js'
				],
				dest: 'themes/_s/js/project.js',
			}
		},

		uglify: {
			build: {
				options: {
					mangle: false
				},
				files: [{
					expand: true,
					cwd: 'themes/_s/js/',
					src: ['**/*.js', '!**/*.min.js', '!partials/*.js'],
					dest: 'themes/_s/js/',
					ext: '.min.js'
				}]
			}
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'themes/_s/images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'themes/_s/images/'
				}]
			}
		},

		update_submodules: {
			dist: {
			}
		},

		watch: {

			scripts: {
				files: ['themes/_s/js/**/*.js'],
				tasks: ['javascript', 'shell:grunt'],
				options: {
					spawn: false,
				},
			},

			css: {
				files: ['themes/_s/sass/**/*.scss'],
				tasks: ['styles', 'shell:grunt'],
				options: {
					spawn: false,
					livereload: true,
				},
			},

			sprite: {
				files: ['themes/_s/images/sprites/*.png'],
				tasks: ['sprite', 'styles', 'shell:grunt'],
				options: {
					spawn: false,
					livereload: true,
				},
			},

		},

		shell: {
			grunt: {
				command: 'afplay grunt.mp3'
			}
		},

		clean: {
			js: ['themes/_s/js/project*', 'themes/_s/js/**/*.min.js'],
			css: ['themes/_s/style.css', 'themes/_s/style.min.css']
		},

		makepot: {
			theme: {
				options: {
					cwd: 'themes/_s/',
					domainPath: 'languages/',
					potFilename: '_s.pot',
					type: 'wp-theme'
				}
			}
			/*plugin_name: {
				options: {
					cwd: 'plugins/plugin_name',
					domainPath: '/languages/',
					potFilename: 'plugin_name.pot',
					type: 'wp-plugin'
				}
			}
			repeat as necessary
			*/
		},

		addtextdomain: {
			theme: {
				options: {
					textdomain: '_s'
				},
				target: {
					files: {
						src: ['*.php']
					}
				}
			},
			/*plugin_name: {
				options: {
					textdomain: 'text-domain'
				},
				target: {
					files: {
						src: ['*.php']
					}
				}
			}
			repeat as necessary
			*/
		},

		update_submodules: {

			default: {
				options: {
					// default command line parameters will be used: --init --recursive
				}
			},
			withCustomParameters: {
				options: {
					params: '--force' // specifies your own command-line parameters
				}
			},

		},

		phpcs: {
			application: {
				dir: [
					'**/*.php',
					'!**/node_modules/**'
				]
			},
			options: {
				bin: '~/phpcs/scripts/phpcs',
				standard: 'WordPress'
			}
		},

	});

	grunt.registerTask('styles', ['sass', 'autoprefixer', 'cmq', 'csscomb', 'cssmin']);
	grunt.registerTask('javascript', ['concat', 'uglify']);
	grunt.registerTask('imageminnewer', ['newer:imagemin']);
	grunt.registerTask('i18n', ['makepot']);
	grunt.registerTask('default', ['update_submodules', 'styles', 'javascript', 'imageminnewer', 'i18n']);

};
