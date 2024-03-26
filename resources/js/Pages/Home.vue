<template>
    <page-template title="All books">
        <section id="all-books" class="w-full min-h-[40vh] flex flex-col justify-center items-center">
            <div class="lg:w-10/12 w-full flex flex-row justify-start items-center lg:h-16 h-10 gap-4">
                <div>
                    <router-link to="/books/create" class="button-primary px-10 mb-4">New book</router-link>
                </div>
            </div>

            <div class="lg:w-10/12 w-full lg:px-0 px-2 h-full flex justify-center items-center">
                <books-table :books="books"></books-table>
            </div>
        </section>
    </page-template>
</template>

<script>
import axios from 'axios';
import PageTemplate from "../Components/PageTemplate.vue"
import BooksTable from '../Components/BooksTable.vue'

export default {
    beforeMount() {
        this.getBooks()
    },
    components: {
        PageTemplate,
        BooksTable,
    },
    methods: {
        async getBooks() {
            await axios.get("/api/books")
            .then(response => {
                    this.books = response.data;
                })
            .catch(error => console.log(error));
        },
    },
    data() {
        return {
            books: [],
        }
    }
}
</script>
