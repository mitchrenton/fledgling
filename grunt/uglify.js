module.exports = {
  options: {
    banner: '/*! <%= package.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n',
    sourceMap: true,
    soureMapName: 'public/js/<%= package.name %>.map',
    report: 'gzip'
  },
  plugins: {
    files: {
      'public/js/<%= package.name %>.plugins.min.js': ['tmp/<%= package.name %>.plugins.js']
    }
  },
  app: {
    files: {
      'public/js/<%= package.name %>.app.min.js': ['tmp/<%= package.name %>.app.js']
    }
  }
};