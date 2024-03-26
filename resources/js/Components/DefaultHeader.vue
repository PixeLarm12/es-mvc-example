<template>
    <header class="w-screen min-h-[5vh] bg-light-black flex items-center">
        <nav class="w-full h-full flex justify-around items-center gap-6 px-12">
            <div class="lg:w-5/12 md:w-2/12 md:flex hidden h-full text-center text-white text-3xl font-bold uppercase">
                <router-link to="/">library</router-link>
            </div>

            <div class="lg:w-7/12 md:w-10/12 w-full h-full text-center flex justify-end">
                <div class="lg:w-4/12 md:w-6/12 w-full flex flex-row justify-between">
                    <router-link class="nav-item" to="/">See books</router-link>
                    <router-link class="nav-item" to="/create">New book</router-link>
                </div>
            </div>
        </nav>
    </header>
</template>
