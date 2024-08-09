<template>
    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить информацию о фитнес центре</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form @submit.prevent="submitForm">
                        <div class="form-group">
                            <input type="text" v-model="form.location" class="form-control" placeholder="Адрес" required>
                        </div>
                        <div class="form-group">
                            <input type="text" v-model="form.phone_number" class="form-control" placeholder="Номер телефона" required>
                        </div>
                        <div class="form-group">
                            <input type="email" v-model="form.email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Success/Error Messages -->
        <div v-if="message" :class="{'alert-success': success, 'alert-danger': !success}" class="alert">
            {{ message }}
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import api from '../../../api.js'

export default {
    data() {
        return {
            form: {
                location: '',
                phone_number: '',
                email: ''
            },
            message: '',
            success: false
        };
    },
    methods: {
        async submitForm() {
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const response = await api.post('/api/auth/gym_info', this.form, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                });
                if (response.data.success) {
                    this.message = 'Данные успешно добавлены';
                    this.success = true;
                } else {
                    this.message = 'Удалите старые данные прежде чем добавлять новые';
                    this.success = false;
                }
            } catch (error) {
                if (error.response && error.response.status === 400) {
                    this.message = 'Удалите старые данные прежде чем добавлять новые';
                } else {
                    this.message = 'Удалите старые данные прежде чем добавлять новые';
                }
                this.success = false;
            }
        }
    }
};
</script>

<style scoped>
</style>
