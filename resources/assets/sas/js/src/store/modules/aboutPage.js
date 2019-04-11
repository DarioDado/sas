import fetchService from '../../services/fetchService';
const state = {
    aboutPageData: {},
};

const getters = {
    aboutPageData: state => state.aboutPageData,
};

const actions = {
    async fetchAboutPageData({ commit }) {
        const response = await fetchService.getData('about-page');
        commit('setAboutPageData', response.data.body.entry);
    },
};

const mutations = {
    setAboutPageData: (state, data) => {
        state.aboutPageData = data;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};