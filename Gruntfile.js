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

		sass: {
			dist: {
				options: {
					style: 'expanded',
					lineNumbers: true,
				},
				files: {
					'themes/_s/style.css': 'themes/theme/sass/style.scss'
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
				src: 'themes/_s/js/project.js',
				dest: 'themes/_s/js/project.min.js'
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
				files: ['themes/_s/js/*.js'],
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

		}

	});

	grunt.registerTask('imageminnewer', ['newer:imagemin']);
	grunt.registerTask('default', ['sass', 'cssmin', 'concat', 'uglify', 'imageminnewer']);

};
