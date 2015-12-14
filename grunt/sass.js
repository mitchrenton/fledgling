module.exports = {
	dist: {
		options: {
    		style: 'expanded'
    	},
		files: {
			'public/css/<%= package.name %>.min.css' : 'local/scss/style.scss'
		}
	}
};