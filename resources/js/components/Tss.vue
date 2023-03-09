<template>
    <main class="container text-center">
        <section class="send_info" v-show="send_order">
            <div class="bck" @click.self="closeSendOrder">
                <button type="button" class="tingle-modal__close" @click.self="closeSendOrder">
                    <span class="tingle-modal__closeIcon">
                        <svg viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                            <path @click.self="closeSendOrder" d="M.3 9.7c.2.2.4.3.7.3.3 0 .5-.1.7-.3L5 6.4l3.3 3.3c.2.2.5.3.7.3.2 0 .5-.1.7-.3.4-.4.4-1 0-1.4L6.4 5l3.3-3.3c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0L5 3.6 1.7.3C1.3-.1.7-.1.3.3c-.4.4-.4 1 0 1.4L3.6 5 .3 8.3c-.4.4-.4 1 0 1.4z" fill="#000" fill-rule="nonzero"></path>
                        </svg>
                    </span>
                    <span class="tingle-modal__closeLabel">Закрыть
                    </span>
                </button>
                <div class="tingle-modal-box">
                <div class="tingle-modal-box__content" id="popup">
                <div class="modal-form">
                    <h2 class="modal-form__title title-2">Сервер Dell PowerEdge T330</h2>
                    <div class="final">
                        <p><span class="pale">{{ cpu_selected }}</span></p>
                        <p><span class="pale">{{ raid_selected }}</span></p>
                        <p><span class="pale">{{ lan_selected }}</span></p>
                        <p><span class="bold">Итого: {{ itogo }} ₽</span></p>
                    </div>
                    <div role="form" class="wpcf7" id="wpcf7-f29364-o1" lang="ru-RU" dir="ltr">
                        <div class="screen-reader-response">
                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul></div>
                        <form action="/cart/#wpcf7-f29364-o1" method="post" class="wpcf7-form init" novalidate="novalidate" data-status="init">
                            <p>
                                <span class="form-control" data-name="text-572">
                                    <input type="text" name="text-572" value="" size="40" maxlength="50" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" v-model="fio" aria-required="true" aria-invalid="false" placeholder="ФИО *">
                                </span>
                            </p>
                            <p><span class="form-control" data-name="tel-714"><input type="tel" name="tel-714" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" v-model="phone" aria-required="true" aria-invalid="false" placeholder="Номер телефона *" inputmode="text"></span></p>
                            <p><span class="form-control" data-name="email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" v-model="email" aria-required="true" aria-invalid="false" placeholder="E-mail *"></span></p>
                            <p><span class="form-control" data-name="textarea-880"><textarea name="textarea-880" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" v-model="comment" placeholder="Комментарий к заказу"></textarea></span></p>
                            <p>
                                <input value="Оставить заявку" class="btn btn-primary w-100" @click="sendOrder()">
                                <span class="wpcf7-spinner"></span>
                            </p>
                            <div class="wpcf7-response-output" aria-hidden="true"></div></form></div>
                    <div class="accept-agreement">
                    <p class="accept-agreement__text">
                        <input name="agreement" type="checkbox" checked="" disabled=""> Я согласен на обработку <a class="link" target="_blank" href="/privacy/">персональных данных</a></p>
                </div>
                </div>
            </div></div></div>
        </section>
        <h1>Конфигуратор сервера</h1>
        <div class="starter-template text-left py-5 px-3">
            <section class="server_conf p-5">
                <div class="product_image"></div>
                <div class="product_info col-sm">
                    <h2>Сервер Dell PowerEdge T330</h2>
                    <span class="pale">артикул: R0Q84A</span><br>
                    <span class="pale">вендор: DELL</span><br>
                    <span class="razdel">CPU:</span>
                    <div class="form-check">
                        <template v-for="product in products">
                            <div v-if="product['tss_category_id'] == 2">
                                <input class="form-check-input" type="radio" v-bind:id="product['id']" v-bind:name="product['id']" v-bind:value="product['id']" v-model="cpu_active">
                                <label class="form-check-label" v-bind:for=" product['id']">
                                    <span class="pale product_name">{{ product['name'] }} </span>
                                    <span class="pale"> ............... </span>
                                    <span class="bold price">{{ product['price_text'] }}</span>
                                </label>
                            </div>
                        </template>
                    </div>
                    <span class="razdel">RAID:</span>
                    <div class="form-check">
                        <template v-for="product in products">
                            <div v-if="product['tss_category_id'] == 3">
                                <input class="form-check-input" type="radio" v-bind:id="product['id']" v-bind:name="product['id']" v-bind:value="product['id']" v-model="raid_active">
                                <label class="form-check-label" v-bind:for=" product['id']">
                                    <span class="pale product_name">{{ product['name'] }} </span>
                                    <span class="pale"> ............... </span>
                                    <span class="bold price">{{ product['price_text'] }}</span>
                                </label>
                            </div>
                        </template>
                    </div>
                    <span class="razdel">LAN ADAPTER:</span>
                    <div class="form-check">
                        <template v-for="product in products">
                            <div v-if="product['tss_category_id'] == 4">
                                <input class="form-check-input" type="radio" v-bind:id="product['id']" v-bind:name="product['id']" v-bind:value="product['id']" v-model="lan_active">
                                <label class="form-check-label" v-bind:for=" product['id']">
                                    <span class="pale product_name">{{ product['name'] }} </span>
                                    <span class="pale"> ............... </span>
                                    <span class="bold price">{{ product['price_text'] }}</span>
                                </label>
                            </div>
                        </template>
                    </div>
                    <span class="itogo">Итого: {{ itogo }} ₽</span><br>
                    <button class="btn btn-primary" @click="showSendOrder()">Оставить заявку</button>
                </div>

            </section>
        </div>
    </main>
</template>

<script>
export default {
    name: "Tss",
    data() {
        return {
            products: null,
            cpu_active: null,
            raid_active: null,
            lan_active: null,
            cpu_selected: ' ',
            raid_selected: ' ',
            lan_selected: ' ',
            itogo: 0,
            send_order: false,
            fio: '',
            phone: '',
            email: '',
            comment: ''
        }
    },
    mounted() {
        this.getProducts()
    },
    watch: {
        cpu_active (newValue, oldValue) {
            if(oldValue === null) {
                this.itogo = this.itogo + Number(this.products[newValue]['price'])
            } else {
                this.itogo = this.itogo + Number(this.products[newValue]['price']) - Number(this.products[oldValue]['price'])
            }
        },
        raid_active (newValue, oldValue) {
            if(oldValue === null) {
                this.itogo = this.itogo + Number(this.products[newValue]['price'])
            } else {
                this.itogo = this.itogo + Number(this.products[newValue]['price']) - Number(this.products[oldValue]['price'])
            }
        },
        lan_active (newValue, oldValue) {
            if(oldValue === null) {
                this.itogo = this.itogo + Number(this.products[newValue]['price'])
            } else {
                this.itogo = this.itogo + Number(this.products[newValue]['price']) - Number(this.products[oldValue]['price'])
            }
        }
    },
    methods: {
        getProducts(){
            axios.get('/api/tss/all')
                .then( data => {
                    this.products = data.data.products
                    //console.log(data.data.products)
                    //console.log(Object.keys(this.products).length)
                    var k = Object.keys(this.products).length
                    for(var i = 0; i<k; i++) {
                        //console.log(this.products[i])
                    }
                })
                .catch(errors => {
                    console.log(errors);
                })
                .finally( {

                })
        },
        showSendOrder () {
            var k = 0
            if(this.cpu_active === null || this.raid_active === null || this.lan_active === null){
                alert('не выбрана комплектация сервера!!!!')
                k++
            }
            if (k === 0) {
                this.send_order = true
                //console.log(this.cpu_active)
                this.id_cpu = this.products[this.cpu_active]['id']
                this.id_lan = this.products[this.lan_active]['id']
                this.id_raid = this.products[this.raid_active]['id']
                this.cpu_selected = this.products[this.cpu_active]['name'] + ' - ' + this.products[this.cpu_active]['price'] + ' ₽'
                this.lan_selected = this.products[this.lan_active]['name'] + ' - ' + this.products[this.lan_active]['price'] + ' ₽'
                this.raid_selected = this.products[this.raid_active]['name'] + ' - ' + this.products[this.raid_active]['price'] + ' ₽'
            }
        },
        closeSendOrder () {
            this.send_order = false
        },
        sendOrder() {
            console.log(this.id_cpu + ' - ' + this.id_raid + ' - ' + this.id_lan + ' - ' + this.fio + ' - ' + this.phone + ' - ' + this.email + ' - ' + this.comment)
            axios.post('/api/tss/sendorder',{
                id_cpu: this.id_cpu,
                id_raid: this.id_raid,
                id_lan: this.id_lan,
                fio: this.fio,
                phone: this.phone,
                email: this.email,
                comment: this.comment
                })
                .then(res => {
                    //console.log(res)
                    if (res.status === 200) {
                        //this.res_status = 'Данные успешно сохранены!'
                    }
                    this.send_order = false
                    this.id_cpu = null
                    this.id_lan = null
                    this.id_raid = null
                    this.cpu_selected = ''
                    this.lan_selected = ''
                    this.raid_selected = ''
                    location.reload();
                    //console.log(res)
                })
                .catch(errors => {
                    console.log(errors);
                })
                .finally( {

                })
        }
    }
}
</script>

<style scoped>

</style>
