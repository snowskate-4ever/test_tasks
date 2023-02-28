<template>
    <div >
        <div class="conteiner col-4">
            test5
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>group</th>
                        <th>name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in products">
                        <td v-for="a in item" class="p-2">
                            <span>{{ a }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            page: '',
            res: null,
            products: null,
            groups: [
                {
                    0: {
                        name: '',
                        id_parent: null
                    }
                }
            ],
            first: false,
            g_count: null,
            n: null,
            p_all: null,
            tmp: null,
            show: [ false]
        }
    },
    mounted() {
        this.getTest4()
    },
    methods: {
        getTest4(){
            axios.get('/api/lichi/test4')
                .then( data => {
                    this.products = data.data.products
                    this.groups = data.data.groups
                    this.g_count = data.data.g_count
                    this.p_all = data.data.p_all
                    this.n = null
                    this.tmp = data.data.tmp
                    Object.entries(data.data.show).forEach(([key, value]) => {
                        this.show[key] = value
                    })
                })
                .catch(errors => {
                    console.log(errors);
                })
                .finally( {

                })

        },
        shows(i){
            console.log(" show1[" + i + "] = " + this.show[i])
            //console.log(this.show)
            if (this.show[i] == false) {
                this.show[i] = true
            } else {
                this.show[i] = false
            }
            //console.log(this.show)
        },
        getTest41(id){
            console.log(id)
            axios.post('/api/lichi/test41', {
                    id: id
                })
                .then( data => {
                    this.products = data.data.products
                    console.log(data)
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
