<template>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Add a New Book</h1>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label for="title" class="block font-medium mb-1">Title</label>
                <input
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="border rounded w-full p-2"
                />
                <span v-if="errors.title" class="text-red-500 text-sm">{{ errors.title }}</span>
            </div>

            <div class="mb-4">
                <label for="author" class="block font-medium mb-1">Author</label>
                <input
                    id="author"
                    v-model="form.author"
                    type="text"
                    class="border rounded w-full p-2"
                />
                <span v-if="errors.author" class="text-red-500 text-sm">{{ errors.author }}</span>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium mb-1">Description</label>
                <textarea
                    id="description"
                    v-model="form.description"
                    rows="5"
                    class="border rounded w-full p-2"
                ></textarea>
                <span v-if="errors.description" class="text-red-500 text-sm">{{ errors.description }}</span>
            </div>

            <div class="mb-4">
                <label for="published_year" class="block font-medium mb-1">Published Year</label>
                <input
                    id="published_year"
                    v-model="form.published_year"
                    type="number"
                    class="border rounded w-full p-2"
                />
                <span v-if="errors.published_year" class="text-red-500 text-sm">{{ errors.published_year }}</span>
            </div>

            <div class="mb-4">
                <label for="status" class="block font-medium mb-1">Status</label>
                <select
                    id="status"
                    v-model="form.status"
                    class="border rounded w-full p-2"
                >
                    <option value="available">Available</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="reserved">Reserved</option>
                </select>
                <span v-if="errors.status" class="text-red-500 text-sm">{{ errors.status }}</span>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
    data() {
        return {
            form: {
                title: '',
                author: '',
                description: '',
                published_year: '',
                status: 'available',
            },
            errors: {},
        };
    },
    methods: {
        submit() {
            Inertia.post('/books', this.form, {
                onError: (err) => (this.errors = err),
            });
        },
    },
};
</script>
