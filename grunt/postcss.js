module.exports = {
	options: {
		map: true,
		processors: [
			require('pixrem')(),
			require('autoprefixer')({browsers: 'last 2 versions'}),
			require('cssnano')()
		]
	},
	dist: {
		src: 'public/css/fledgling.min.css'
	}
};