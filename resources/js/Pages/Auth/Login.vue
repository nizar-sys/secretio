<template>
    <Head title="Secreto" />

    <BreezeValidationErrors class="mb-4" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <div>
            <BreezeLabel for="nama" value="Nama Kamu" />
            <BreezeInput id="nama" type="text" class="mt-1 block w-full" v-model="form.nama" autofocus />
        </div>

        <div class="flex items-center justify-end mt-4">

            <BreezeButton class="btn-block" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Daftar
            </BreezeButton>
        </div>
    </form>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                nama: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('message.register'), {
                onFinish: () => this.form.reset('nama'),
            })
        }
    }
}
</script>
