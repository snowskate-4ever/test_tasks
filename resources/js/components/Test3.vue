<template>
    <div >
        <h1>Исходные данные</h1>
        <table>
            <tr v-for="item in all">
                <td v-for="a in item" class="p-2">
                    <span>{{ a }}</span>
                </td>
            </tr>
        </table>
        <h1>Отсортированные данные</h1>
        <table>
            <tr v-for="item in arr">
                <td v-for="a in item" class="p-2">
                    <span>{{ a }}</span>
                </td>
            </tr>
        </table>
        <br>
        <br>
    </div>
</template>

<script>
export default {
    data() {
        return {
            page: '',
            fib: null,
            arr: null,
            all:null
        }
    },

    mounted() {
        this.getTest3()
    },
    methods: {
        getTest3(){
            axios.get('/api/lichi/test3')
                .then( data => {
                    this.all = data.data.all
                    this.arr = data.data.arr
                    //console.log(data.data)
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
