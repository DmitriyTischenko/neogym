<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Главная</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Email</th>
                                <th>Номер телефона</th>
                                <th>Cообщение</th>
                                <th>Время появления сообщения</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in usersContacts.data" :key="user.id">
                                <td>{{ user.id }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.users_phone_number }}</td>
                                <td>{{ user.message }}</td>
                                <td>{{ formatDate(user.created_at) }}</td>
                                <td>
                                    <button @click="deleteUser(user.id)" class="btn btn-danger">Удалить</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li class="paginate_button page-item previous"
                                :class="{ disabled: !usersContacts.prev_page_url }">
                                <a href="#" @click.prevent="fetchData(usersContacts.prev_page_url)" class="page-link">Назад</a>
                            </li>
                            <li
                                v-for="page in paginationPages"
                                :key="page"
                                class="paginate_button page-item"
                                :class="{ active: page === usersContacts.current_page }"
                            >
                                <a href="#" @click.prevent="fetchData(getPageUrl(page))" class="page-link">{{ page }}</a>
                            </li>
                            <li class="paginate_button page-item next"
                                :class="{ disabled: !usersContacts.next_page_url }">
                                <a href="#" @click.prevent="fetchData(usersContacts.next_page_url)" class="page-link">Далее</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import api from '../../api.js'
export default {
    name: "Admin_index",
    data() {
        return {
            usersContacts: {
                data: [],
                current_page: 1,
                last_page: 1,
                prev_page_url: null,
                next_page_url: null,
            },
        };
    },
    computed: {
        paginationPages() {
            let pages = [];
            for (let i = 1; i <= this.usersContacts.last_page; i++) {
                pages.push(i);
            }
            return pages;
        },
    },
    methods: {
        fetchData(url = '/api/auth/admin') {
            api.get(url, { headers: { 'authorization': `Bearer ${localStorage.getItem('access_token')}` } })
                .then(response => {
                    this.usersContacts = response.data;
                })
        }


        ,
        deleteUser(id) {
            api.delete(`/api/auth/admin/${id}`, {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(response => {
                    if (response.status === 200) {
                        this.fetchData(); // обновляем данные после успешного удаления
                    } else {
                        console.error('Error deleting user:', response);
                    }
                })
                .catch(error => console.error('Error:', error));
        },
        getPageUrl(page) {
            return `/api/auth/admin?page=${page}`;
        },
        formatDate(dateString) {
            try {
                const date = new Date(dateString);
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');
                return `${day}.${month}.${year} ${hours}:${minutes}`;
            } catch (error) {
                console.error("Error formatting date:", error);
                return dateString;
            }
        },
    },
    mounted() {
        this.fetchData();
    },
};
</script>

<style scoped>
</style>



