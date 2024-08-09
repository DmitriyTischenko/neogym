<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Данные администраторов</h1>
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
                                <router-link :to="{name: 'administrators.create'}" class="btn btn-primary">Добавить</router-link>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Пароль</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="user in users" :key="user.id">
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.password }}</td>
                                        <td>
                                            <button @click="deleteAdmin(user.id)" class="btn btn-danger">Удалить</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous" :class="{ 'disabled': !pagination.prev_page_url }">
                                        <a href="#" @click.prevent="fetchUsers(pagination.prev_page_url)" class="page-link">Назад</a>
                                    </li>
                                    <li class="paginate_button page-item" :class="{ 'active': page === pagination.current_page }" v-for="page in pagination.last_page" :key="page">
                                        <a href="#" @click.prevent="fetchUsers('/api/auth/administrators?page=' + page)" class="page-link">{{ page }}</a>
                                    </li>
                                    <li class="paginate_button page-item next" :class="{ 'disabled': !pagination.next_page_url }">
                                        <a href="#" @click.prevent="fetchUsers(pagination.next_page_url)" class="page-link">Далее</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';
import api from "../../../api.js"

export default {
    name: "Administrators",
    data() {
        return {
            users: [],
            pagination: {},
        };
    },
    methods: {
        fetchUsers(pageUrl = '/api/auth/administrators') {
            api.get(pageUrl,
                {headers: {'authorization': `Bearer ${localStorage.getItem('access_token')}`}})
                .then((response) => {
                    this.users = response.data.data;
                    this.pagination = {
                        current_page: response.data.meta.current_page,
                        last_page: response.data.meta.last_page,
                        prev_page_url: response.data.links.prev,
                        next_page_url: response.data.links.next,
                    };
                })
                .catch((error) => {
                    console.error("There was an error fetching the administrators:", error);
                });
        },
        deleteAdmin(id) {
            if (id === undefined) {
                console.error('Error: User ID is undefined');
                return;
            }

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    api.delete(`/api/auth/administrators/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'authorization': `Bearer ${localStorage.getItem('access_token')}`,
                },
            })
                .then(response => {
                    if (response.status === 200) {
                        this.fetchUsers(); // обновляем данные после успешного удаления
                    } else {
                        console.error('Error deleting admin:', response);
                    }
                })
                .catch(error => console.error('Error:', error));
        },

    },
    mounted() {
        this.fetchUsers();
    }
}
</script>

<style scoped>
</style>
