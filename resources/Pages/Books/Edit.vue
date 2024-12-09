<template>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Book</h1>
        <form @submit.prevent="submit">
            <div class="mb-4">
                <label for="title" class="block font-medium mb-1">Title</label>
                <input
                    id="title"
                    v-model="form.title"
                    type="text"
                    class="border rounded w-full p-2"
                />
                <span v-if="form.errors.title" class="text-red-500 text-sm">{{
                    form.errors.title
                }}</span>
            </div>

            <div class="mb-4">
                <label for="author" class="block font-medium mb-1"
                    >Author</label
                >
                <input
                    id="author"
                    v-model="form.author"
                    type="text"
                    class="border rounded w-full p-2"
                />
                <span v-if="form.errors.author" class="text-red-500 text-sm">{{
                    form.errors.author
                }}</span>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium mb-1"
                    >Description</label
                >
                <textarea
                    id="description"
                    v-model="form.description"
                    rows="5"
                    class="border rounded w-full p-2"
                ></textarea>
                <span
                    v-if="form.errors.description"
                    class="text-red-500 text-sm"
                    >{{ form.errors.description }}</span
                >
            </div>

            <div class="mb-4">
                <label for="published_year" class="block font-medium mb-1"
                    >Published Year</label
                >
                <input
                    id="published_year"
                    v-model="form.published_year"
                    type="number"
                    class="border rounded w-full p-2"
                />
                <span
                    v-if="form.errors.published_year"
                    class="text-red-500 text-sm"
                    >{{ form.errors.published_year }}</span
                >
            </div>

            <div class="mb-4">
                <label for="status" class="block font-medium mb-1"
                    >Status</label
                >
                <select
                    id="status"
                    v-model="form.status"
                    class="border rounded w-full p-2"
                >
                    <option value="available">Available</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="reserved">Reserved</option>
                </select>
                <span v-if="form.errors.status" class="text-red-500 text-sm">{{
                    form.errors.status
                }}</span>
            </div>

            <div class="flex justify-between items-center">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="bg-blue-500 text-white px-4 py-2 rounded"
                >
                    Update
                </button>

                <inertia-link
                    href="/"
                    class=" bg-blue-200 hover:bg-blue-500 px-4 py-2 rounded-md shadow-md transition"
                >
                    Back to List
                </inertia-link>
            </div>
        </form>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/vue3";

export default {
    props: {
        book: Object,
    },
    setup(props) {
        const form = useForm({
            title: props.book.title,
            author: props.book.author,
            description: props.book.description,
            published_year: props.book.published_year,
            status: props.book.status,
        });
        const submit = () => {
            const bookId = props.book.id;
            form.put(`/books/${bookId}`);
        };
        return { form, submit };
    },
};
</script>
