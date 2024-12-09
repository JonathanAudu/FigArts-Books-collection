<template>
    <div class="p-6 max-w-7xl mx-auto">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">Books</h1>
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center space-x-4">
                <label for="status" class="text-lg">Filter by Status:</label>
                <select
                    v-model="filters.status"
                    @change="filterBooks"
                    class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">All</option>
                    <option value="available">Available</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="reserved">Reserved</option>
                </select>
            </div>
            <div>
                <Link
                    href="/books/create"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                >
                    Add New Book
                </Link>
            </div>
        </div>
        <div
            v-if="successMessage"
            class="p-4 mb-4 text-xxl text-center text-green-800 bg-green-100 rounded"
        >
            {{ successMessage }}
        </div>
        <table class="min-w-full table-auto border-separate border-spacing-0">
            <thead>
                <tr class="bg-gray-100">
                    <th
                        class="border p-4 text-left text-sm font-medium text-gray-700"
                    >
                        Title
                    </th>
                    <th
                        class="border p-4 text-left text-sm font-medium text-gray-700"
                    >
                        Author
                    </th>
                    <th
                        class="border p-4 text-left text-sm font-medium text-gray-700"
                    >
                        Year
                    </th>
                    <th
                        class="border p-4 text-left text-sm font-medium text-gray-700"
                    >
                        Status
                    </th>
                    <th
                        class="border p-4 text-left text-sm font-medium text-gray-700"
                    >
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="book in books.data"
                    :key="book.id"
                    class="hover:bg-gray-50"
                >
                    <td class="border p-4 text-sm text-gray-800">
                        {{ book.title }}
                    </td>
                    <td class="border p-4 text-sm text-gray-800">
                        {{ book.author }}
                    </td>
                    <td class="border p-4 text-sm text-gray-800">
                        {{ book.published_year }}
                    </td>
                    <td class="border p-4 text-sm text-gray-800">
                        {{ book.status }}
                    </td>
                    <td class="border p-4 text-sm text-gray-800 space-x-2">
                        <inertia-link
                            :href="`/books/${book.id}`"
                            class="text-blue-500 hover:text-blue-700"
                            >View</inertia-link
                        >

                        <span>|</span>
                        <Link
                            :href="`/books/${book.id}/edit`"
                            class="text-green-500 hover:text-green-700"
                            >Edit</Link
                        >
                        <span>|</span>
                        <button
                            @click="archiveBook(book.id)"
                            class="text-red-500 hover:text-red-700"
                        >
                            Archive
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination -->
        <div v-if="books.links.length > 1" class="mt-6">
            <button
                v-for="link in books.links"
                :key="link.url"
                @click.prevent="goToPage(link.url)"
                :disabled="link.active"
                :class="[
                    'px-4 py-2 mx-1',
                    link.active
                        ? 'bg-blue-500 text-white'
                        : 'bg-gray-200 text-gray-700',
                ]"
                v-html="link.label"
            ></button>
        </div>
    </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        books: Object,
    },
    data() {
        return {
            filters: {
                status: "",
            },
        };
    },
    computed: {
        successMessage() {
            return usePage().props.flash || null;
        },
    },
    methods: {
        filterBooks() {
            console.log(this.filters);
            Inertia.get("/books", this.filters, { preserveState: true });
            console.log(this.books.links);
        },
        archiveBook(id) {
            if (confirm("Are you sure you want to archive this book?")) {
                Inertia.delete(`/books/${id}`);
            }
        },
        goToPage(url) {
            Inertia.get(url, { preserveState: true });
        },
    },
};
</script>

<style scoped>
/* Optional: Add any additional custom styles if needed */
</style>
