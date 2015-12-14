module.exports = {
	options: {
		keepOriginal: false,
		grepFiles: [
			'index.html'
		]
	},
	plugins: {
		src: [
			'public/js/fledgling.plugins.min.js'
		]
	},
	app: {
		src: [
			'public/js/fledgling.app.min.js'
		]
	},
	css: {
		src: [
			'public/css/fledgling.min.css'
		]
	}
};