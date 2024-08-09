<template>
    <div class="container">
        <h1 class="my-4">Добавить тренера</h1>
        <form @submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" v-model="name" class="form-control" placeholder="Имя" required>
            </div>
            <div class="form-group">
                <input type="text" v-model="surname" class="form-control" placeholder="Фамилия" required>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" @change="handleFileUpload" class="custom-file-input" id="exampleInputFile" required>
                        <label class="custom-file-label" for="exampleInputFile">{{ fileName }}</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" v-model="vk" class="form-control" placeholder="Вконтакте" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Добавить">
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'
import api from '../../../api.js'
export default {
    data() {
        return {
            name: '',
            surname: '',
            file: null,
            fileName: 'Выберите файл',
            vk: ''
        };
    },
    methods: {
        handleFileUpload(event) {
            this.file = event.target.files[0];
            this.fileName = this.file.name;
        },
        async submitForm() {
            let formData = new FormData();
            formData.append('name', this.name);
            formData.append('surname', this.surname);
            formData.append('photo', this.file);
            formData.append('vk', this.vk);

            try {
                await api.post('/api/auth/trainers', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                });
                // Перенаправляем пользователя обратно на страницу индекса тренеров
                window.location.href = '/admin/trainers';
            } catch (error) {
                console.error('Ошибка при добавлении тренера:', error);
            }
        },
    },
};
</script>

<style scoped>
/* Добавьте стили, если необходимо */
</style>
