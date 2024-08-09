import axios from 'axios';

const state = {
    trainers: [],
    gym_infos: [],
    formData: {
        name: '',
        email: '',
        users_phone_number: '',
        message: '',
    }
};

const getters = {
    trainers: (state) => state.trainers,
    gym_infos: (state) => state.gym_infos,
    formData: state => state.formData,
};

const mutations = {
    setTrainers(state, trainers) {
        state.trainers = trainers;
    },
    setGymInfos(state, gym_infos) {
        state.gym_infos = gym_infos;
    },
    SET_FORM_DATA(state, formData) {
        state.formData = formData;
    },
    clearFormData(state) {
        state.formData = {
            name: '',
            email: '',
            users_phone_number: '',
            message: '',
        };
    }
};

const actions = {
    getTrainers({ commit }) {
        axios.get("/api/trainers")
            .then((res) => {
                commit('setTrainers', res.data.data);
            });
    },
    getGymInfo({ commit }) {
        axios.get("/api/gym_info")
            .then((res) => {
                commit('setGymInfos', res.data.data);
            });
    },
    async submitForm({ commit, state }) {
        try {
            const response = await axios.post('/api/contact_us', state.formData);
            console.log(response.data.message);
            commit('clearFormData');
            alert('Сообщение успешно отправлено');
        } catch (error) {
            console.error('Ошибка при отправке данных:', error.response.data);
        }
    },
    clearFormData({ commit }) {
        commit('clearFormData');
    },
};

export default {
    namespaced: true, // ВАЖНО: добавьте эту строку для namespace
    state,
    getters,
    mutations,
    actions,
};
