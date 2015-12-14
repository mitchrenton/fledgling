module.exports = {
	options: {
		keepOriginal: false,
		grepFiles: [
			'index.html'
		]
	},
	js: {
		src: [
			'public/js/<%= package.name %>.plugins.min.js',
			'public/js/<%= package.name %>.app.min.js'
		]
	},
	plugins: {
		src: [
			'public/js/<%= package.name %>.plugins.min.js'
		]
	},
	app: {
		src: [
			'public/js/<%= package.name %>.app.min.js'
		]
	},
	css: {
		src: [
			'public/css/<%= package.name %>.min.css'
		]
	}
};