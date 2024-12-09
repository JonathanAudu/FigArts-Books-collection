<template>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-6 border-b pb-3">Book Details</h1>
        <div class="space-y-4">
            <p class="text-lg">
                <span class="font-semibold text-gray-700">Title:</span>
                <span class="text-gray-900"> {{ book.title }}</span>
            </p>
            <p class="text-lg">
                <span class="font-semibold text-gray-700">Author:</span>
                <span class="text-gray-900"> {{ book.author }}</span>
            </p>
            <p class="text-lg">
                <span class="font-semibold text-gray-700">Description:</span>
                <span class="text-gray-900 mr-2"> {{ book.description }}</span>
            </p>
            <p class="text-lg">
                <span class="font-semibold text-gray-700">Published Year:</span>
                <span class="text-gray-900"> {{ book.published_year }}</span>
            </p>
            <p class="text-lg">
                <span class="font-semibold text-gray-700">Status:</span>
                <span
                    class="px-2 py-1 rounded-full text-sm font-medium"
                    :class="{
                        'bg-green-100 text-green-700': book.status === 'Available',
                        'bg-red-100 text-red-700': book.status === 'Unavailable'
                    }"
                >
                    {{ book.status }}
                </span>
            </p>
        </div>

        <div class="mt-6">
            <inertia-link
                href="/"
                class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md shadow-md transition"
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
