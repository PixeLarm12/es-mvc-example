<template>
    <table class="w-full bg-gray-50">
        <tr class="w-full text-left border border-black divide-x-2 divide-black">
            <th class="lg:pl-3 pl-1 py-3 xl:text-xl md:text-lg text-sm font-bold text-white bg-light-black">Title</th>
            <th class="lg:pl-3 pl-1 py-3 xl:text-xl md:text-lg text-sm font-bold text-white bg-light-black">Author</th>
            <th class="lg:pl-3 pl-1 py-3 xl:text-xl md:text-lg text-sm font-bold text-white bg-light-black">Pages</th>
            <th class="lg:pl-3 pl-1 py-3 xl:text-xl md:text-lg text-sm font-bold text-white bg-light-black">Genre</th>
            <th class="lg:pl-3 pl-1 py-3 xl:text-xl md:text-lg text-sm font-bold text-white bg-light-black">Language</th>
            <th class="lg:pl-3 pl-1 py-3 xl:text-xl md:text-lg text-sm font-bold text-white bg-light-black">Actions</th>
        </tr>

        <books-table-row v-for="book in books" :key="book.id" :book="book"></books-table-row>
    </table>
</template>

<script>
import BooksTableRow from "./BooksTableRow.vue"

export default {
    components: {
        BooksTableRow
    },
    props: {
        books: {
            type: Array,
            required: true,
            default: () => []
        },
    }
}
</script>
