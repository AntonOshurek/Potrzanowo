import { defineCollection } from 'astro:content';
import { z } from 'astro/zod';
import { glob } from 'astro/loaders';

const imageBlocksCollection = defineCollection({
	loader: glob({
		pattern: '**/*.{md,mdx}',
		base: './src/content/imageBlocks',
	}),
	schema: z.object({
		imagePath: z.string(),
		blockTitle: z.string(),
		imageAlt: z.string(),
	}),
});

const textBlocksCollection = defineCollection({
	loader: glob({
		pattern: '**/*.{md,mdx}',
		base: './src/content/textBlocks',
	}),
	schema: z.object({
		title: z.string(),
		textRight: z.string(),
		textLeft: z.string(),
	}),
});

const indexLinksCollection = defineCollection({
	loader: glob({
		pattern: '**/*.{md,mdx}',
		base: './src/content/indexPageLinks',
	}),
	schema: z.object({
		title: z.string(),
		linkPath: z.string(),
		linkText: z.string(),
		imagePath: z.string(),
		imageAlt: z.string(),
	}),
});

const tablesCollection = defineCollection({
	loader: glob({
		pattern: '**/*.{md,mdx}',
		base: './src/content/tables',
	}),
	schema: z.object({}),
});

const privacyPolicyCollection = defineCollection({
	loader: glob({
		pattern: '**/*.{md,mdx}',
		base: './src/content/privacypolicy',
	}),
	schema: z.object({}),
});

export const collections = {
	imageBlocks: imageBlocksCollection,
	textBlocks: textBlocksCollection,
	indexPageLinks: indexLinksCollection,
	tables: tablesCollection,
	privacypolicy: privacyPolicyCollection,
};
