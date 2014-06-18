module.exports = function(grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

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
					'themes/project-theme/js/customizer.js',
					'themes/project-theme/js/navigation.js',
					'themes/project-theme/js/skip-link-focus-fix.js'
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


	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-connect');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['sass', 'cssmin', 'concat', 'uglify', 'imagemin']);

};
