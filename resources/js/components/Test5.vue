<template>
    <div >
        <div class="row">
        <div class="conteiner col-4">
            <ul class="list-group" >
                <li class="list-group-item d-flex justify-content-between align-items-center bg-secondary">
                    <span style = "color:#cff4fc" @click="shows(0)"> Все товары </span>
                    <span class="badge bg-primary rounded-pill" @click="getTest4()">{{ p_all }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center"  v-if="show[0]"  v-for="(item, i) in groups[0]">
                    <ul class="list-group w-100" >
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-secondary">
                                <span style = "color:#cff4fc" @click="shows(item['id'])">{{ item['name'] }} </span>
                                <span class="badge bg-primary rounded-pill" @click="getTest41(item['id'])">{{ item['p_count_all']}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" v-if="show[item['id']]"   v-for="(jtem, j) in groups[item['id']]">
                                <ul class="list-group w-100" >
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-secondary">
                                        <span style = "color:#cff4fc" @click="shows(jtem['id'])">{{ jtem['name'] }} </span>
                                        <span class="badge bg-primary rounded-pill" @click="getTest41(jtem['id'])">{{ jtem['p_count_all']}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" v-if="show[jtem['id']]" v-for="(ztem, z) in groups[jtem['id']]">
                                        <span @click="shows(ztem['id'])">{{ ztem['name'] }} </span>
                                        <span class="badge bg-primary rounded-pill" @click="getTest41(ztem['id'])">{{ ztem['p_count_all']}}</span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                </li>
            </ul>
        </div>
        <div class="conteiner col-4">
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
