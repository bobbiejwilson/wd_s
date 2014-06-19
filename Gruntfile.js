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
					'themes/project-theme/style.css': 'themes/project-theme/sass/style.scss'
				}
			}
		},

		cssmin: {
			minify: {
				expand: true,
				cwd: 'themes/project-theme/',
				src: ['*.css', '!*.min.css'],
				dest: 'themes/project-theme/',
				ext: '.min.css'
			}
		},

		concat: {
			dist: {
				src: [
					'themes/project-theme/js/concat/*.js'
				],
				dest: 'themes/project-theme/js/project.js',
			}
		},

		uglify: {
			build: {
				src: 'themes/project-theme/js/project.js',
				dest: 'themes/project-theme/js/project.min.js'
			}
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'themes/project-theme/images/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'themes/project-theme/images/'
				}]
			}
		},

		watch: {

			scripts: {
				files: ['themes/project-theme/js/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					spawn: false,
				},
			},

			css: {
				files: ['themes/project-theme/sass/partials/*.scss'],
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
