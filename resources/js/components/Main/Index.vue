<script>
import {mapActions, mapGetters} from "vuex";

export default {
    name: "Index",

    computed: {
        ...mapGetters('mainPage', [
            'trainers',
            'gym_infos',
            'formData'
        ]),
    },

    methods: {
        ...mapActions('mainPage', [
            'getTrainers',
            'getGymInfo',
            'submitForm',
            'clearFormData'
        ]),
    },

    mounted() {
        this.getTrainers();
        this.getGymInfo();
    },
}


</script>

<template>
    <div>
        <div class="hero_area">
            <!-- header section strats -->
            <header class="header_section">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <template class="navbar-brand">
                            <router-link lass="navbar-brand" to="/"><span>Neofitness</span></router-link>
                        </template>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                                <ul class="navbar-nav  ">
                                    <li class="nav-item">
                                        <router-link class="nav-link" to="/"> Главная</router-link>
                                    </li>
                                    <li class="nav-item ">
                                        <router-link class="nav-link" to="/why_us"> Почему мы</router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link class="nav-link" to="/trainers"> Тренеры</router-link>
                                    </li>
                                    <li class="nav-item">
                                        <router-link class="nav-link" to="/contact_us"> Связаться с нами</router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- end header section -->
            <!-- slider section -->
            <section class=" slider_section position-relative">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="col-lg-10 col-md-11 mx-auto">
                                    <div class="detail-box">
                                        <div>
                                            <h3>
                                                Fitness
                                            </h3>
                                            <h2>
                                                Training
                                            </h2>
                                            <h1>
                                                Neofitness
                                            </h1>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse .
                                            </p>
                                            <div class="">
                                                <router-link class="nav-link" to="/contact_us"> Связаться с нами</router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end slider section -->
        </div>
        <!-- Us section -->
        <section class="us_section layout_padding">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        Why Choose Us
                    </h2>
                </div>

                <div class="us_container ">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="box">
                                <div class="img-box">
                                    <img src="/public/assets/images/u-1.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        QUALITY EQUIPMENT
                                    </h5>
                                    <p>
                                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="box">
                                <div class="img-box">
                                    <img src="/public/assets/images/u-4.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        NUTRITION
                                    </h5>
                                    <p>
                                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="box">
                                <div class="img-box">
                                    <img src="/public/assets/images/u-2.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        HEALTHY DIET PLAN
                                    </h5>
                                    <p>
                                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="box">
                                <div class="img-box">
                                    <img src="/public/assets/images/u-3.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        SPORT TRAINING
                                    </h5>
                                    <p>
                                        ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end us section -->
        <!-- heathy section -->
        <section class="heathy_section layout_padding">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="detail-box">
                            <h2>
                                HEALTHY MIND, HEALTHY BODY
                            </h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillumLorem ipsum dolor sit amet,
                                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="trainer_section layout_padding">
            <div class="container">
                <div class="heading_container">
                    <h2>
                        Our Gym Trainers
                    </h2>
                </div>

                <div class="row">
                    <div v-for="trainer in trainers" class="col-lg-4 col-md-6 mx-auto">
                        <div class="box">
                            <div class="name">
                                <h5>
                                    {{ trainer.name }} {{ trainer.surname }}
                                </h5>
                            </div>
                            <div class="img-box">
                                <img :src="trainer.image_url" alt="">
                            </div>
                            <div>
                                <h4><a :href="trainer.vk">VK</a></h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
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
                                    Contact Us
                                </h2>
                            </div>
                            <form @submit.prevent="submitForm">
                                <div>
                                    <input v-model="formData.name" type="text" placeholder="Имя"/>
                                </div>
                                <div>
                                    <input v-model="formData.email" type="email" placeholder="Email"/>
                                </div>
                                <div>
                                    <input v-model="formData.users_phone_number" type="text"
                                           placeholder="Номер телефона"/>
                                </div>
                                <div>
                                    <input v-model="formData.message" type="text" class="message-box"
                                           placeholder="Сообщение"/>
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
                <div v-for="gym_info in gym_infos" class="info_items">
                    <a href="">
                        <div class="item ">
                            <div class="img-box box-1">
                                <img src="" alt="">
                            </div>
                            <div class="detail-box">
                                <p>
                                    {{ gym_info.location }}
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
                                    {{ gym_info.phone_number }}
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
                                    {{ gym_info.email }}
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
        <!-- footer section -->
    </div>
</template>

<style scoped>

</style>
