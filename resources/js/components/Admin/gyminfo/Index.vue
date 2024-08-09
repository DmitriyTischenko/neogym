<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Информация о фитнес центре</h1>
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
                                <button @click="createGymInfo" class="btn btn-primary">Добавить</button>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Адрес</th>
                                        <th>Номер телефона</th>
                                        <th>Email</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="gymInfo in gymInfos" :key="gymInfo.id">
                                        <td>{{ gymInfo.location }}</td>
                                        <td>{{ gymInfo.phone_number }}</td>
                                        <td>{{ gymInfo.email }}</td>
                                        <td>
                                            <button @click="editGymInfo(gymInfo.id)" class="btn btn-primary me-2">
                                                Изменить
                                            </button>
                                            <button @click="deleteGymInfo(gymInfo.id)" class="btn btn-danger">Удалить
                                            </button>
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
    </div>
</template>

<script>
import axios from "axios";
import api from "../../../api.js"

export default {
    name: 'GymInfo',
    data() {
        return {
            gymInfos: [],
        };
    },
    methods: {
        fetchGymInfos() {
            api.get('/api/auth/gym_info')
                .then(response => {
                    this.gymInfos = response.data.data; // Assuming response follows JSON:API standard
                })
                .catch(error => {
                    console.error("There was an error fetching the gym information:", error);
                });
        },
        createGymInfo() {
            window.location.href = '/admin/gym_info/create';
        },
        editGymInfo(id) {
            window.location.href = `/admin/gym_info/${id}`;
        },
        deleteGymInfo(id) {
            if (confirm('Вы уверены, что хотите удалить данный адрес?')) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                api.delete(`/api/auth/gym_info/${id}`, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                })
                    .then(response => {
                        this.fetchGymInfos();
                    });
            }
        }
    },
    mounted() {
        this.fetchGymInfos();
    }
};
</script>


<style scoped>
/* Add any component-specific styles here */
</style>
