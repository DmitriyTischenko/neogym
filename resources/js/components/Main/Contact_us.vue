<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "Contact",

    computed: {
        ...mapGetters('mainPage', ['gym_infos', 'formData']),
    },

    methods: {
        ...mapActions('mainPage', ['getGymInfo', 'submitForm', 'clearFormData']),

    },

    mounted() {
        this.getGymInfo();
    },
}
</script>

<template>
    <div class="hero_area">
        <div class="sub-page">
            <!-- header section strats -->
            <header class="header_section">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <template class="navbar-brand">
                            <router-link lass="navbar-brand" to="/"><span>Neofitness</span></router-link>
                        </template>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                                <ul class="navbar-nav  ">
                                    <li class="nav-item">
                                        <router-link class="nav-link" to="/"> Главная</router-link>
                                    </li>
                                    <li class="nav-item ">
                                        <router-link class="nav-link" to="/why_us">  Почему мы</router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link class="nav-link" to="/trainers"> Тренеры</router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link class="nav-link" to="/contact_us">  Связаться с нами</router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- end header section -->

        </div>


        <!-- contact section -->

        <section class="contact_section ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <div class="img-box">
                            <img src="/assets/images/contact-img.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="form_container pr-0 pr-lg-5 mr-0 mr-lg-2">
                            <div class="heading_container">
                                <h2>
                                    Связаться с нами
                                </h2>
                            </div>
                            <form @submit.prevent="submitForm">
                                <div>
                                    <input v-model="formData.name" type="text" placeholder="Имя" />
                                </div>
                                <div>
                                    <input v-model="formData.email" type="email" placeholder="Email" />
                                </div>
                                <div>
                                    <input v-model="formData.users_phone_number" type="text" placeholder="Номер телефона" />
                                </div>
                                <div>
                                    <input v-model="formData.message" type="text" class="message-box" placeholder="Сообщение" />
                                </div>
                                <div class="d-flex ">
                                    <button type="submit">
                                        Отправить
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end contact section -->

        <!-- info section -->
        <section class="info_section layout_padding2">
            <div class="container">
                <div v-for="gym_info in gym_infos"  class="info_items">
                    <a href="">
                        <div  class="item ">
                            <div class="img-box box-1">
                                <img src="" alt="">
                            </div>
                            <div class="detail-box">
                                <p>
                                    {{gym_info.location}}
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="item ">
                            <div class="img-box box-2">
                                <img src="" alt="">
                            </div>
                            <div class="detail-box">
                                <p>
                                    {{gym_info.phone_number}}
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="item ">
                            <div class="img-box box-3">
                                <img src="" alt="">
                            </div>
                            <div class="detail-box">
                                <p>
                                    {{gym_info.email}}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <footer class="container-fluid footer_section">
            <p>
                &copy; 2020 All Rights Reserved. Design by
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </footer>
    </div>
</template>

<style scoped>

</style>
