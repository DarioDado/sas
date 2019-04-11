import fetchService from '../../services/fetchService';
const state = {
    news: {},
};

const getters = {
    news: state => state.news,
};

const actions = {
    async fetchNews({ commit }) {
        const response = await fetchService.getData('news');
        commit('setNews', response.data.body.entry);
    },
};

const mutations = {
    setNews: (state, data) => {
        state.news = data;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};
