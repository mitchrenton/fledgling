module.exports = {
  options: {
    banner: '/*! fledgling <%= grunt.template.today("dd-mm-yyyy") %> */\n',
    sourceMap: true,
    soureMapName: 'public/js/fledgling.map',
    report: 'gzip'
  },
  plugins: {
    files: {
      'public/js/fledgling.plugins.min.js': ['tmp/fledgling.plugins.js']
    }
  },
  app: {
    files: {
      'public/js/fledgling.app.min.js': ['tmp/fledgling.app.js']
    }
  }
};