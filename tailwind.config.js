/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./**/*.php"
	],
	theme: {
		extend: {
			colors: {
				'oxford-blue': 	'rgba(10, 17, 40, 1)',
				'royal-blue-dark': 	'rgba(0, 31, 84, 1)',
				'indigo-dye': 	'rgba(3, 64, 120, 1)',
				'cg-blue': 	'rgba(18, 130, 162, 1)',
				'white': 	'rgba(254, 252, 251, 1)',
			},
		},
	},
	plugins: [
		require('@tailwindcss/forms'),
	],
}