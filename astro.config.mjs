import { defineConfig } from 'astro/config';
import sitemap from '@astrojs/sitemap';

export default defineConfig({
	site: 'https://oshurek.com',
	base: '/',
	integrations: [sitemap()],
});
