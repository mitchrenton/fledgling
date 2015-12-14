module.exports = function(grunt) {
  
  // measures the time each task takes
  require('time-grunt')(grunt);

  // load grunt config
  require('load-grunt-config')(grunt);

  grunt.registerTask('js', ['jshint', 'concat', 'uglify', 'clean','versioning:js']);

  grunt.registerTask('css', ['sass', 'postcss', 'clean', 'versioning:css' ]);

  grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'sass', 'postcss', 'clean', 'versioning:js','versioning:css' ]);

};