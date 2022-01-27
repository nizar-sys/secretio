<template>
    <Head :title="'Beranda ' + user.name"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <Link :href="share.url" class="font-semibold text-xl text-gray-800 leading-tight">Beranda {{user.name}}</Link>
        </template>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center">
                        <Link :href="share.url" class="card-title font-weight-bold text-center h3">Beranda {{user.name}}</Link>
                        <div class="align-items-center">
                            <a :href="share.facebook" target="_blank"><i class="fa fa-facebook border p-3 rounded mr-1"></i></a>
                            <a :href="share.tweeter" target="_blank"><i class="fa fa-twitter border p-3 rounded mr-1"></i></a>

                            <button @click.prevent="copyURL(share.url)"><i class="far fa-copy border p-3 rounded mr-1"></i></button>
                        </div>
                        <BreezeValidationErrors class="mt-2 font-weight-bold" />
                    </div>

                    <div class="container mt-4">
                        <div class="d-flex justify-content-center row" v-if="messages.length > 0" v-for="message in messages" :key="message.id">
                            <div class="col-md-8">
                                <div class="d-flex flex-column comment-section" :id="'myGroup'+message.id">
                                    <div class="bg-white p-2">
                                        <div class="d-flex flex-row user-info"><img class="rounded-circle"
                                                src="https://sekolahnesia.com/wp-content/uploads/2020/11/Foto-Profil-Default.jpg"
                                                width="40">
                                            <div class="d-flex flex-column justify-content-start ml-2"><span
                                                    class="d-block font-weight-bold name">Seseorang</span><span
                                                    class="date text-black-50">Shared publicly - {{message.created_at}}</span></div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text">{{message.body}}</p>
                                        </div>
                                    </div>
                                    <div class="bg-white p-2">
                                        <div class="d-flex flex-row fs-12">
                                            <div class="like p-2 cursor action-collapse" data-toggle="collapse"
                                                aria-expanded="true" :aria-controls="'collapse-balas-'+message.id" :href="'#collapse-balas-'+message.id"><i
                                                    class="fa fa-commenting-o"></i><span
                                                    class="ml-1">Balas</span></div>

                                            <div class="like p-2 cursor action-collapse" data-toggle="collapse"
                                                aria-expanded="true" :aria-controls="'collapse-balasan-'+message.id" :href="'#collapse-balasan-'+message.id"><i
                                                    class="fa fa-reply-all"></i><span
                                                    class="ml-1">Lihat Balasan</span></div>
                                        </div>
                                    </div>
                                    <div :id="'collapse-balasan-'+message.id" class="p-2 collapse" :data-parent="'#myGroupBalasan'+message.id">
                                        <div class="d-flex justify-content-center row" v-for="reply in message.replies" :key="reply.id" v-if="message.replies.length > 0">
                                            <div class="col-md-8">
                                                <div class="d-flex flex-column comment-section" :id="'myGroupBalasan'+message.id">
                                                    <div class="bg-white p-2">
                                                        <div class="d-flex flex-row user-info"><img class="rounded-circle"
                                                                src="https://sekolahnesia.com/wp-content/uploads/2020/11/Foto-Profil-Default.jpg"
                                                                width="40">
                                                            <div class="d-flex flex-column justify-content-start ml-2"><span
                                                                    class="d-block font-weight-bold name">Seseorang</span><span
                                                                    class="date text-black-50">Shared publicly - {{reply.created_at}}</span></div>
                                                        </div>
                                                        <div class="mt-2">
                                                            <p class="comment-text">{{reply.body_reply}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center row" v-else>
                                            <p>Ngga ada balasan, nih.</p>
                                        </div>
                                    </div>

                                    <form @submit.prevent="postReplyMessage(message.id)">
                                        <div :id="'collapse-balas-'+message.id" class="bg-light p-2 collapse" :data-parent="'#myGroup'+message.id">
                                            <div class="d-flex flex-row align-items-start"><img class="rounded-circle"
                                                    src="https://sekolahnesia.com/wp-content/uploads/2020/11/Foto-Profil-Default.jpg"
                                                    width="40"><BreezeInput id="body" type="text" class="mt-1 mx-2 block w-full" v-model="form.body"/>
                                            </div>
                                            <div class="mt-2 text-right">
                                                <button class="btn btn-outline-primary btn-sm" :disabled="form.processing" type="submit">Kirim
                                                    Balasan</button>
                                                <button class="btn btn-outline-primary btn-sm ml-1" data-toggle="collapse"
                                                    aria-expanded="true" :aria-controls="'collapse-balas-'+message.id" :href="'#collapse-balas-'+message.id"
                                                    type="button">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center row" v-else>
                            <p>Belum ada pesan rahasia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="card-title font-weight-bold text-center">Sampaikan sesuatu ke <u>{{user.name}}</u> tanpa diketahui
                    
                    </p>

                    <div class="container-fluid mt-4">
                        <form @submit.prevent="postMessage">
                            <div class="d-flex justify-content-center row mt-5">
                                <div class="col-md-8">
                                    <div class="bg-light p-2">
                                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle"
                                                src="https://sekolahnesia.com/wp-content/uploads/2020/11/Foto-Profil-Default.jpg"
                                                width="40">
                                                <BreezeInput id="body" :key="'postMessage'" type="text" class="mt-1 mx-2 block w-full" v-model="form.body" />
                                        </div>
                                        <div class="mt-2 text-right">
                                            <button class="btn btn-outline-primary btn-sm" :disabled="form.processing" type="submit">Kirim Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import {Head} from '@inertiajs/inertia-vue3';
    import BreezeInput from '@/Components/Input.vue'
    import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
    import Echo from 'laravel-echo';
    import { Link } from '@inertiajs/inertia-vue3';
    window.Pusher = require('pusher-js');


    export default {
        props: ['user', 'message', 'share'],
        components: {
            Head, 
            BreezeAuthenticatedLayout, 
            BreezeInput,
            BreezeValidationErrors,
            Link
        },
        data() {
            return {
                messages: {},
                form: this.$inertia.form({
                    body: ''
                })
            }
        },
        mounted(){
            // this.fetchMessage()
            this.EchoListen()
            this.messages = this.$props.message
        },
        methods: {
            async fetchMessage () { // unused
                try {
                    // const response = await axios.get(`/m/${user.slug}`)
                    // console.log(response)
                } catch (error) {
                    console.log(error)
                }
            },

            postMessage () {
                this.form.post(this.route('message.post', this.$props.user.slug), {
                    onFinish: (response) => {
                    },
                })
                this.form.reset('body')  
            },

            postReplyMessage (id) {
                this.form.post(this.route('message.post.reply', {slug: this.$props.user.slug, id}), {
                    onFinish: (response) => {
                    },
                })
                this.form.reset('body')
            },

            EchoListen () {
                window.Echo = new Echo({
                  broadcaster: 'pusher',
                  key: '190486a45bceb2adf203',
                  cluster: 'ap1',
                  forceTLS: true
                });

                var channel = window.Echo.channel('getMessage');
                channel.listen('.getMessage', (e)=> {
                    this.messages = e.messages
                })
                
            },
            
            async copyURL(mytext) {
                try {
                    await navigator.clipboard.writeText(mytext);
                    alert('Url disalin');
                } catch($e) {
                    alert('Url gagal disalin');
                }
            }
        }

    }
</script>