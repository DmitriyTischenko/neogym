<template>
    <div class="container">
        <h1>Редактировать данные тренера</h1>
        <form @submit.prevent="updateTrainer">
            <div class="form-group">
                <input
                    type="text"
                    v-model="trainer.name"
                    class="form-control"
                    placeholder="Имя"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    v-model="trainer.surname"
                    class="form-control"
                    placeholder="Фамилия"
                />
            </div>
            <div class="form-group">
                <input
                    type="file"
                    @change="handleFileUpload"
                    class="form-control"
                    placeholder="Фото"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    v-model="trainer.vk"
                    class="form-control"
                    placeholder="Вконтакте"
                />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Изменить</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
import api from '../../../api.js'
export default {
    data() {
        return {
            trainer: {
                name: '',
                surname: '',
                photo: null,
                vk: '',
            },
            trainerId: this.$route.params.id,
        };
    },
    methods: {
        handleFileUpload(event) {
            this.trainer.photo = event.target.files[0];
        },
        loadTrainerData() {
            api.get(`/api/auth/trainers/${this.trainerId}`)
                .then(response => {
                    this.trainer = response.data;
                })
                .catch(error => {
                    console.error('Error fetching trainer data:', error);
                });
        },
        updateTrainer() {
            const formData = new FormData();
            formData.append('name', this.trainer.name);
            formData.append('surname', this.trainer.surname);
            if (this.trainer.photo) {
                formData.append('photo', this.trainer.photo);
            }
            formData.append('vk', this.trainer.vk);
            formData.append('_method', 'PATCH');

            api.post(`/api/auth/trainers/${this.trainerId}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            })
                .then(response => {
                    this.trainer = response.data;
                    this.$router.push({ name: 'trainer' });
                })
                .catch(error => {
                    console.error('Error updating trainer:', error);
                });
        },
    },
    mounted() {
        this.loadTrainerData();
    }
};
</script>

<style scoped>
.form-group {
    margin-bottom: 15px;
}
</style>
