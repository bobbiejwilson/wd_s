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
					'themes/theme/style.css': 'themes/theme/sass/style.scss'
				}
			}
		},

		cssmin: {
			minify: {
				expand: true,
				cwd: 'themes/theme/',
				src: ['*.css', '!*.min.css'],
				dest: 'themes/theme/',
				ext: '.min.css'
			}
		},

		concat: {
			dist: {
				src: [
					'themes/theme/js/concat/*.js'
				],
				dest: 'themes/theme/js/project.js',
			}
		},

		uglify: {
			build: {
				src: 'themes/theme/js/project.js',
				dest: 'themes/theme/js/project.min.js'
			}
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'themes/theme/images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'themes/theme/images/'
				}]
			}
		},

		watch: {

			scripts: {
				files: ['themes/theme/js/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				},
			},

			css: {
				files: ['themes/theme/sass/partials/*.scss'],
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
