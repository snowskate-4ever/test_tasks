<template>
    <div >
        <h1>Задание </h1>
        Исключить из массива элементы содержащие: {{ condition }}
        <h1>Результат</h1>
        {{ arr }}
        <br>
    </div>
</template>

<script>
export default {
    data() {
        return {
            page: '',
            condition: '',
            arr: null
        }
    },

    mounted() {
        this.getTest2()
    },
    methods: {
        getTest2(){
            axios.get('/api/lichi/test2')
                .then( data => {
                    this.condition = data.data.condition
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
