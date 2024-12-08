<template>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Book Details</h1>
        <p><strong>Title:</strong> {{ book.title }}</p>
        <p><strong>Author:</strong> {{ book.author }}</p>
        <p><strong>Description:</strong> {{ book.description }}</p>
        <p><strong>Published Year:</strong> {{ book.published_year }}</p>
        <p><strong>Status:</strong> {{ book.status }}</p>

        <div class="mt-4">
            <inertia-link
                href="/books"
                class="text-blue-500 underline"
            >
                Back to List
            </inertia-link>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        book: Object,
    },
};
</script>

