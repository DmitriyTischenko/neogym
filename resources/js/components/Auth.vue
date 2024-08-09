<template>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li v-if="!access_token" class="nv-item mr-3">
                    <router-link class="btn btn-primary" :to="{name: 'admin.login'}">Войти</router-link>
                </li>
                <li v-if="access_token" class="nv-item mr-3">
                    <a class="btn btn-danger" href="#" @click.prevent="logout">Выйти</a>
                </li>
            </ul>

        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="brand-text font-weight-light">
                <router-link class="brand-link" :to="{name: 'admin'}">NeoGym</router-link>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li v-if="access_token" class="nav-item">
                            <router-link :to="{name: 'trainer'}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Тренеры</p>
                            </router-link>
                        </li>

                        <li v-if="access_token" class="nav-item">
                            <router-link :to="{name: 'gym_info'}" class="nav-link">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>Информация о фитнес центре</p>
                            </router-link>
                        </li>


                        <li v-if="access_token" class="nav-item">
                            <router-link :to="{name: 'administrators'}" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>Добавить администратора</p>
                            </router-link>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
    </div>
    <router-view></router-view>  <!-- v-if="this.access_token" -->
</template>

<script>
import api from '../api.js'

export default {
    name: "Auth",
    data() {
        return {
            access_token: null
        }
    },

    mounted() {
        this.getAccessToken()
    },

    updated() {
        this.getAccessToken()
    },

    methods: {

        getAccessToken() {
            this.access_token = localStorage.getItem('access_token')
        },

        logout() {
            api.post('/api/auth/logout')
                .then(res => {
                    localStorage.removeItem('access_token')
                    this.$router.push({name: 'admin.login'})
                })
        }
    }

}

</script>

<style>

</style>
