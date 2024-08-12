import { defineCollection, z } from 'astro:content';

const imageBlocksCollection = defineCollection({
	type: 'content',
	schema: z.object({
		imagePath: z.string(),
		imageTitle: z.string()
	})
});

const textBlocksCollection = defineCollection({
	type: 'content',
	schema: z.object({
		title: z.string(),
		textRight: z.string(),
		textLeft: z.string()
	})
});

const indexLinksCollection = defineCollection({
	type: 'content',
	schema: z.object({
		title: z.string(),
		text: z.string(),
		linkPath: z.string(),
		linkText: z.string(),
		imagePath: z.string()
	})
});

const tablesCollection = defineCollection({
	type: 'content',
	schema: z.object({

	})
});

const privacyPolicyCollection = defineCollection({
	type: 'content',
	schema: z.object({

	})
});

export const collections = {
	imageBlocks: imageBlocksCollection,
	textBlocks: textBlocksCollection,
	indexPageLinks: indexLinksCollection,
	tables: tablesCollection,
	privacypolicy: privacyPolicyCollection
}
