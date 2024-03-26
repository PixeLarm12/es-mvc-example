<template>
    <tr class="w-full border border-black divide-x-2 divide-black xl:text-xl md:text-lg text-sm">
        <td class="lg:pl-3 pl-1 py-2 w-4/12">{{ book.title }}</td>
        <td class="lg:pl-3 pl-1 py-2 w-3/12">{{ book.author }}</td>
        <td class="lg:pl-3 pl-1 py-2 w-1/12">{{ book.pages }}</td>
        <td class="lg:pl-3 pl-1 py-2 w-2/12"> 
            <span class="w-10/12 py-1 bg-cyan-300 rounded-lg px-6">{{ book.genre_formatted }}</span> 
        </td>
        <td class="lg:pl-3 pl-1 py-2 w-1/12"> 
            <span class="w-10/12 py-1 bg-amber-200 rounded-lg px-6">{{ book.language }}</span> 
        </td>
        <td class="lg:pl-3 pl-1 py-2 w-1/12">
            <div class="w-full flex justify-start lg:gap-6 gap-1">
                <router-link :to="'/edit/' + book.id" class="hover:underline">Edit</router-link>
                <button class="hover:underline" @click="remove()">Remove</button>
            </div>
        </td>
    </tr>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        book: {
            type: Object,
            required: true,
            default: () => {}
        },
    },
    methods: {
        async remove() {
            await axios.delete(`/api/books/${this.book.id}`)
                .then(response => {
                    if(response) {
                        this.$router.go(this.$router.currentRoute)
                    } 
                })
                .catch(error => console.log(error));
        }, 
    },
}
</script>
