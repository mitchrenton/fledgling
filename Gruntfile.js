module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		compass: {
			dev: {
				options: {
					sassDir: ['source'],
					cssDir: ['public/css'],
					fontsDir: ['pubilc/fonts'],
					outputStyle: ['compressed'],
					environment: 'development'
				}
			}
		},

		watch: {
			compass: {
				files: ['**/*.scss'],
				tasks: ['compass:dev']
			}
		}

	});
	
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
};