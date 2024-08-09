<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Тренеры</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <router-link to="/admin/trainers/create" class="btn btn-primary">Добавить</router-link>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Фото</th>
                                    <th>Вконтакте</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="trainer in trainers" :key="trainer.id">
                                    <td>{{ trainer.id }}</td>
                                    <td>{{ trainer.name }}</td>
                                    <td>{{ trainer.surname }}</td>
                                    <td>
                                        <img :src="trainer.image_url" :alt="trainer.name" style="width: 100px; height: auto;">
                                    </td>
                                    <td><a :href="trainer.vk" target="_blank">{{ trainer.vk }}</a></td>
                                    <td>
                                        <router-link :to="`/admin/trainers/${trainer.id}`" class="btn btn-primary me-2">Изменить</router-link>
                                        <button @click="deleteTrainer(trainer.id)" class="btn btn-danger">Удалить</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from "axios";
import api from '../../../api.js'

export default {
    name: "Trainers",
    data() {
        return {
            trainers: []
        };
    },
    created() {
        this.fetchTrainers();
    },
    methods: {
        async fetchTrainers() {
            try {
                const response = await api.get('/api/auth/trainers');

                if (response.data && Array.isArray(response.data.data)) {
                    this.trainers = response.data.data;
                } else {
                    console.error('Unexpected API response format', response.data);
                }
            } catch (error) {
                console.error('Error fetching trainers:', error);
            }
        },
        async deleteTrainer(id) {
            if (confirm('Вы уверены, что хотите удалить данного тренера?')) {
                try {
                    await api.delete(`/api/auth/trainers/${id}`, {
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });
                    this.trainers = this.trainers.filter(trainer => trainer.id !== id);
                } catch (error) {
                    console.error('Error deleting trainer:', error);
                }
            }
        }
    }
};
</script>

<style>
</style>
