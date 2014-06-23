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

		csscomb: {
			dist: {
				files: [{
					expand: true,
					cwd: 'themes/_s/sass/',
					src: ['**/*.scss', '!**/_mixins.scss'],
					dest: 'themes/_s/sass/',
				}]
			}
		},

		sass: {
			dist: {
				options: {
					style: 'expanded',
					lineNumbers: true,
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
					'themes/_s/js/concat/*.js'
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
					src: ['**/*.js', '!**/*.min.js', '!concat/*.js'],
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

		watch: {

			scripts: {
				files: ['themes/_s/js/**/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				},
			},

			css: {
				files: ['themes/_s/sass/partials/*.scss'],
				tasks: ['sass', 'cssmin'],
				options: {
					spawn: false,
					livereload: true,
				},
			},

		},

		clean: {
			js: ['themes/_s/js/project*', 'themes/_s/js/**/*.min.js'],
			css: ['themes/_s/style.css', 'themes/_s/style.min.css']
		}

	});

	grunt.registerTask('imageminnewer', ['newer:imagemin']);
	grunt.registerTask('default', ['csscomb', 'sass', 'autoprefixer', 'cmq', 'cssmin', 'concat', 'uglify', 'imageminnewer']);

};
