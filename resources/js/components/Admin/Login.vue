<script>
import axios from "axios";
export default {
    name: "Login",

    data() {
        return {
            email: null,
            password: null,
        }
    },

    methods: {
        login() {
            axios.post('/api/auth/login', {email: this.email, password: this.password})
                .then((res) => {
                    localStorage.access_token = res.data.access_token;
                    this.$router.push({ name: 'admin' });
                })
        },
    },
}
</script>

<template>
    <div class="login-box">
        <div class="login-logo">
            <b>Панель администратора</b>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Войдите для доступа панель администратора</p>

                <form action="#" method="post">

                    <div class="input-group mb-3">
                        <input v-model="email" type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input v-model="password" type="password" class="form-control" placeholder="Пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <button @click.prevent  ="login" type="submit" class="btn btn-primary btn-block">Войти</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
.login-box {
    width: 360px;
    margin: 5% auto;
}
</style>
