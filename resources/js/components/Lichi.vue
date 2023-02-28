<template>
    <div class = "conteiner w-75 mx-auto" v-if="page == 'test1'">
        <div class = "conteiner">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="/lichi/test1">Test1</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test2">Test2</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test3">Test3</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test4">Test4</a></li>
            </ul>
            <Test1></Test1>
        </div>
    </div>
    <div class = "conteiner w-75 mx-auto" v-if="page == 'test2'">
        <div class = "conteiner ">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="/lichi/test1">Test1</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test2">Test2</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test3">Test3</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test4">Test4</a></li>
            </ul>
            <Test2></Test2>
        </div>
    </div>
    <div class = "conteiner w-75 mx-auto" v-if="page == 'test3'">
        <div class = "conteiner ">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="/lichi/test1">Test1</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test2">Test2</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test3">Test3</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test4">Test4</a></li>
            </ul>
            <Test3></Test3>
        </div>
    </div>
    <div class = "conteiner w-75 mx-auto" v-if="page == 'test4'">
        <div class = "conteiner ">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="/lichi/test1">Test1</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test2">Test2</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test3">Test3</a></li>
                <li class="nav-item"><a class="nav-link" href="/lichi/test4">Test4</a></li>
            </ul>
            <Test4></Test4>
        </div>
    </div>
</template>

<script>
import Test1 from './Test1.vue';
import Test2 from './Test2.vue';
import Test3 from './Test3.vue';
import Test4 from './Test4.vue';
export default {
    name: "Lichi.vue",
    components: {
        Test1,
        Test2,
        Test3,
        Test4
    },
    data() {
        return {
            page: ''
        }
    },
    mounted() {
        var st_ar = window.location.href.split('/')
        this.page = st_ar[st_ar.length - 1]
        console.log(this.page)
    },
};
</script>

<style scoped>

</style>
