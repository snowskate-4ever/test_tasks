<template>
    <div >
        <div class="container">
            <h1>Тестовое задание</h1>
            <div class="card mx-5 p-3" style="width: 18rem;">
                Переписано человек: <div>{{ people_count}}</div>
                Общий возраст: <div>{{ people_sum_age}}</div>
                <div class="input-group mb-3">
                    <span class="input-group-text">ФИО</span>
                    <input type="text" class="form-control" id="name" v-model="name" aria-label="ФИО" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Возраст</span>
                    <input type="text" class="form-control"  id="age" v-model="age" aria-label="Возраст" aria-describedby="basic-addon1">
                </div>
                <button class="btn btn-outline-secondary" @click="add()">Добавить</button>
            </div>
            <div class="card mx-5 p-3" style="width: 18rem;">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Имя</th>
                        <th scope="col">Возраст</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in people">
                        <th scope="row">{{ item['name']}}</th>
                        <td>{{ item['age']}}</td>
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
            people:null,
            name: '',
            age: null,
            people_count: null,
            people_sum_age: null

        }
    },

    mounted() {
        this.getArtists()
    },
    methods: {
        getArtists(){
            axios.get('/api/people')
                .then( data => {
                    this.people = data.data['people']
                    this.people_count = data.data['people_count']
                    this.people_sum_age = data.data['people_sum_age']
                    //console.log(data.data)
                })
                .catch(errors => {
                    console.log(errors);
                })
                .finally( {

                })
        },
        add(){
            console.log('lj,fdktybt ' + this.name + ' ' + this.age)
            axios.post('/api/people/add', {
                name: this.name,
                age: this.age
            })
            .then( res => {
                console.log(res.data)
                this.people = res.data['people']
                this.people_count = res.data['people_count']
                this.people_sum_age = res.data['people_sum_age']
                this.name = '';
                this.age = null;
                //window.location.replace('/admn/clubs')
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
