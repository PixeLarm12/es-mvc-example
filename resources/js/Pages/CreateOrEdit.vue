<template>
    <page-template :title="getPageTitle">
        <div class="w-screen min-h-[70vh] flex flex-col justify-center items-center">
            <div class="w-6/12 min-h-[40vh] bg-light-black flex flex-col justify-center items-center rounded-lg shadow-lg my-10 py-3">
                <h1 class="w-full text-center text-white text-4xl font-bold">{{ getPageTitle }}</h1>

                <form @submit.prevent="submitForm()" method="POST" class="xl:w-6/12 h-full px-4 grid grid-cols-12 gap-6 place-items-center place-content-center">
                    <div class="col-span-12 w-full">
                        <label for="title" class="text-white text-2xl font-semibold">Title <span class="font-bold text-red-600 text-xl">*</span></label><br>
                        <input type="text" id="title" v-model="book.title" name="title" placeholder="Type the book's title" class="w-full h-10 px-5 rounded-md border border-black border-opacity-80" required>
                    </div>
                    
                    <div class="md:col-span-6 col-span-12 w-full">
                        <label for="author" class="text-white text-2xl font-semibold">Author <span class="font-bold text-red-600 text-xl">*</span></label><br>
                        <input type="text" id="author" v-model="book.author" name="author" placeholder="Type the book's author" class="w-full h-10 px-5 rounded-md border border-black border-opacity-80" required>
                    </div>

                    <div class="md:col-span-6 col-span-12 w-full">
                        <label for="pages" class="text-white text-2xl font-semibold">Number of pages <span class="font-bold text-red-600 text-xl">*</span> </label><br>
                        <input type="text" id="pages" v-model="book.pages" name="pages" placeholder="Type the number of pages" class="w-full h-10 px-5 rounded-md border border-black border-opacity-80" required>
                    </div>

                    <div class="md:col-span-6 col-span-12 w-full">
                        <label for="genre" class="text-white text-2xl font-semibold">Genre <span class="font-bold text-red-600 text-xl">*</span></label><br>
                        <select id="genre" v-model="book.genre" name="genre" class="w-full h-10 px-5 rounded-md border border-black border-opacity-80" required>
                            <option value="" selected>Select genre</option>
                            <option v-for="genre in genres" :key="genre.key" :value="genre.key">{{ genre.label }}</option>
                        </select>
                    </div>

                    <div class="md:col-span-6 col-span-12 w-full">
                        <label for="publisher" class="text-white text-2xl font-semibold">Publisher <span class="font-bold text-red-600 text-xl">*</span></label><br>
                        <select id="publisher" v-model="book.publisher" name="publisher" class="w-full h-10 px-5 rounded-md border border-black border-opacity-80" required>
                            <option value="" selected>Select publisher</option>
                            <option v-for="publisher in publishers" :key="publisher.key" :value="publisher.key">{{ publisher.label }}</option>
                        </select>
                    </div>

                    <div class="md:col-span-6 col-span-12 w-full">
                        <label for="language" class="text-white text-2xl font-semibold">Language <span class="font-bold text-red-600 text-xl">*</span></label><br>
                        <select id="language" v-model="book.language" name="language" class="w-full h-10 px-5 rounded-md border border-black border-opacity-80" required>
                            <option value="" selected>Select language</option>
                            <option v-for="language in languages" :key="language.key" :value="language.key">{{ language.label }}</option>
                        </select>
                    </div>
                    
                    <div class="w-full col-span-12">
                        <span class="text-red-500 text-lg">{{ errors.title }}</span>
                        <span class="text-red-500 text-lg">{{ errors.author }}</span>
                        <span class="text-red-500 text-lg">{{ errors.genre }}</span>
                        <span class="text-red-500 text-lg">{{ errors.language }}</span>
                        <span class="text-red-500 text-lg">{{ errors.pages }}</span>
                        <span class="text-red-500 text-lg">{{ errors.publisher }}</span>
                        <span class="text-red-500 text-lg self-center w-10/12 py-5">{{ errors.save }}</span>
                    </div>
                    
                    <div class="col-span-12 w-8/12 flex justify-center items-center pt-12">
                        <button type="submit" name="submitButton" id="submitButton" class="button-secondary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </page-template>
</template>

<script>
import axios from 'axios';
import PageTemplate from '../Components/PageTemplate.vue';

export default {
    beforeMount() {
        this.getEnums();

        if(this.$route.params.id) {
            this.getBook();
        }
    },
    components: {
        PageTemplate
    },
    data() {
        return {
            book: {
                id: "",
                title: "",
                author: "",
                genre: "",
                pages: "",
                language: "",
                publisher: "",
            },
            errors: {
                title: "",
                author: "",
                genre: "",
                pages: "",
                language: "",
                publisher: "",
            },
            genres: [],
            publishers: [],
            languages: [],
        }
    },
    computed: {
        getPageTitle() {
            return this.book.id ? `Edit ${this.book.title}` : 'Create Book';
        },
    },
    methods: {
        submitForm() {
            this.validateForm();

            if(this.$route.params.id) {
                this.update();
            } else {
                this.save();
            }
        },
        async getBook() {
            await axios.get(`/api/books/${this.$route.params.id}`)
                .then(response => {
                    if(response.data) {
                        this.book.id = response.data.id;
                        this.book.title = response.data.title;
                        this.book.author = response.data.author;
                        this.book.genre = response.data.genre;
                        this.book.pages = response.data.pages;
                        this.book.language = response.data.language;
                        this.book.publisher = response.data.publisher;
                    }
                })
                .catch(error => console.log(error));
        },
        async getEnums() {
            await axios.get(`/api/enums`)
                .then(response => {
                    if(response.data) {
                        this.genres = response.data.genres;
                        this.publishers = response.data.publishers;
                        this.languages = response.data.languages;
                    }
                })
                .catch(error => console.log(error));
        },
        async save() {
            const data = {
                    "title": this.book.title,
                    "author": this.book.author,
                    "genre": this.book.genre,
                    "pages": this.book.pages,
                    "language": this.book.language,
                    "publisher": this.book.publisher,
            };
            await axios.post(
                "/api/books", data)
                .then(response => {
                    if(! response.data) {
                        this.errors.save = "An error occurred when trying to SAVE new Book. Try again later.";
                    } else {
                        this.$router.push('/')
                    } 
                })
                .catch(error => console.log(error));
        },
        async update() {
            const data = {
                "id": this.book.id,
                "title": this.book.title,
                "author": this.book.author,
                "genre": this.book.genre,
                "pages": this.book.pages,
                "language": this.book.language,
                "publisher": this.book.publisher,
            }
            await axios.post(
                `/api/books/${this.book.id}`, data)
                .then(response => {
                   if(! response.data) {
                        this.errors.save = "An error occurred when trying to UPDATE new Book. Try again later.";
                    } else {
                        this.$router.push('/')
                    } 
                })
                .catch(error => console.log(error));
        },
        validateForm() {
            let shouldSubmit = true;

            if(this.book.title === '' || this.book.title.length < 3) {
                this.errors.title = "The Title field is required and at least 3 characters";
                shouldSubmit = false;
            }

            if(this.book.author === '' || this.book.author.length < 3) {
                this.errors.author = "The Author field is required and at least 3 characters";
                shouldSubmit = false;
            }

            if(this.book.genre === '') {
                this.errors.genre = "The Genre field is required!";
                shouldSubmit = false;
            }
            
            if(this.book.language === '') {
                this.errors.language = "The Language field is required!";
                shouldSubmit = false;
            }

            if(this.book.pages === '' || this.book.pages <= 1) {
                this.errors.pages = "The Pages field is required and at least 1 page!";
                shouldSubmit = false;
            }

            if(this.book.publisher === '') {
                this.errors.publisher = "The Publisher field is required!";
                shouldSubmit = false;
            }

            return shouldSubmit
        }
    },
}
</script>
