import { getEntry, type CollectionKey } from 'astro:content';

export async function mustGetEntry<C extends CollectionKey>(
	collection: C,
	id: string,
) {
	const entry = await getEntry(collection, id);

	if (!entry) {
		const message = `[content] Missing entry: ${collection}/${id}`;
		console.error(message);
		throw new Error(message);
	}

	return entry;
}
