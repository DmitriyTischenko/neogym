<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить нового администратора</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form @submit.prevent="submitAdmin">
                        <div class="form-group">
                            <input type="text" v-model="name" class="form-control" placeholder="Имя" required>
                        </div>
                        <div class="form-group">
                            <input type="text" v-model="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" v-model="password" class="form-control" placeholder="Пароль" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';
import api from '../../../api.js'

export default {
    name: "Create",
    data() {
        return {
            name: '',
            email: '',
            password: '',
        };
    },
    methods: {
        submitAdmin() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            axios.post('/api/administrators', {
                name: this.name,
                email: this.email,
                password: this.password,
            }, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
            })
                .then(response => {
                    this.$router.push({name: 'administrators'});
                })
                .catch(error => {
                    console.error('Error adding admin:', error.response.data);
                });
        }
    }
};
</script>

<style scoped>
</style>
