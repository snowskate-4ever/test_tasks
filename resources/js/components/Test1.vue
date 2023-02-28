<template>
    <div >
        <h1>Исходные данные</h1>
        <table>
            <tr v-for="item in arr">
                <td v-for="a in item" class="p-2">
                    <span>{{ a.value }}</span>
                </td>
            </tr>
        </table>
        <h1>Последовательность Фибоначчи</h1>
        {{ fib }}<br>
        <h1>Результат</h1>
        <table>
            <tr v-for="item in arr">
                <td v-for="a in item" class="p-2">
                    <template v-if="a.chek == 1">
                        <span style="background-color: #0dcaf0">{{ a.value }} </span>
                    </template>
                    <template v-else>
                        <span>{{ a.value }}</span>
                    </template>
                </td>
            </tr>
        </table>
        <br>
    </div>
</template>

<script>
export default {
    data() {
        return {
            page: '',
            fib: null,
            arr: null
        }
    },

    mounted() {
        this.getTest1()
    },
    methods: {
        getTest1(){
            axios.get('/api/lichi/test1')
                .then( data => {
                    this.fib = data.data.fib
                    this.arr = data.data.arr
                    console.log(data.data)
                })
                .catch(errors => {
                    console.log(errors);
                })
                .finally( {

                })
        }
    }
};
</script>

<style scoped>

</style>
