module.exports = {
  css: {
    tasks: ['sass','postcss','versioning:css'],
    files: ['local/scss/**/*.scss']
  },
  plugins: {
    tasks: ['jshint', 'concat:plugins', 'uglify:plugins','clean','versioning:plugins'],
    files: ['local/js/plugins/*.js']
  },
  app: {
    tasks: ['jshint', 'concat:app', 'uglify:app','clean','versioning:app'],
    files: ['local/js/app/*.js']
  },
  livereload: {
    options: {
      livereload: true
    },
    files: ['public/**/*']
  }
};