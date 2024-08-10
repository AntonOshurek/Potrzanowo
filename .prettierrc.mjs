export default {
	plugins: ['prettier-plugin-astro'],
	tabWidth: 2,
	trailingComma: 'all',
	singleQuote: true,
	semi: true,
	printWidth: 100,
	htmlWhitespaceSensitivity: 'css',
	endOfLine: 'auto',
	overrides: [
		{
			files: '*.scss',
			options: {
				parser: 'scss',
			},
		},
		{
			files: '*.astro',
			options: {
				parser: 'astro',
			},
		},
		{
			files: '*.mdx',
			options: {
				parser: 'mdx',
			},
		},
	],
	ignore: ['**/node_modules/**'],
	htmlVoidElements: ['img', 'meta', 'img'],
};
