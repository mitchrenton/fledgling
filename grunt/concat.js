module.exports = {
  options: {
    separator: ';'
  },
  plugins: {
    src: [
        
    ],
    dest: 'tmp/<%= package.name %>.plugins.js'
  },
  app: {
    src: [
        
    ],
    dest: 'tmp/<%= package.name %>.app.js'
  }
};