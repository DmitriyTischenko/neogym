<script>
import { mapGetters, mapActions } from 'vuex';
export default {
    name: "Trainers",


    computed: {
        ...mapGetters('mainPage', ['trainers', 'gym_infos']),
    },

    methods: {
        ...mapActions('mainPage', ['getTrainers', 'getGymInfo']),
    },

    mounted() {
        this.getTrainers();
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


        <!-- trainer section -->

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
                                    {{trainer.name}} {{trainer.surname}}
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

        <!-- end trainer section -->

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
        <!-- footer section -->
    </div>
</template>

<style scoped>

</style>
