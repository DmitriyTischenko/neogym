<template>
    <div class="container">
        <h1>Редактировать данные фитнес центра</h1>
        <form @submit.prevent="updateGymInfo">
            <div class="form-group">
                <input v-model="form.location" type="text" class="form-control" placeholder="Адрес" />
            </div>
            <div class="form-group">
                <input v-model="form.phone_number" type="text" class="form-control" placeholder="Номер телефона" />
            </div>
            <div class="form-group">
                <input v-model="form.email" type="text" class="form-control" placeholder="Email" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
</template>

<script>
import api from '../../../api.js';

export default {
    name: 'UpdateGymInfo',
    data() {
        return {
            form: {
                location: '',
                phone_number: '',
                email: ''
            }
        };
    },
    mounted() {
        this.fetchGymInfo();
    },
    methods: {
        async fetchGymInfo() {
            try {
                const response = await api.get(`/api/auth/gym_info/${this.$route.params.id}`);
                this.form = response.data;
            } catch (error) {
                console.error('Failed to fetch gym info', error);
            }
        },
        async updateGymInfo() {
            try {
                const response = await api.patch(`/api/auth/gym_info/${this.$route.params.id}`, this.form);
                if (response.data) {
                    this.form = response.data; // Обновление данных формы
                }
                alert('Данные обновлены!');
            } catch (error) {
                console.error('Failed to update gym info', error);
            }
        }
    }
};
</script>

<style scoped>
/* Add any specific styles here */
</style>
