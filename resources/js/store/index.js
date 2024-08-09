import { createStore } from 'vuex';
import mainPage from './modules/main_page.js';

const store = createStore({
    modules: {
        mainPage,
    },
});

export default store;
