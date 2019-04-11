import fetchService from '../../services/fetchService';
const state = {
    homePageData: {},
};

const getters = {
    homePageData: state => state.homePageData,
};

const actions = {
    async fetchHomePageData({ commit }) {
        const response = await fetchService.getData('home-page');
        commit('setHomePageData', response.data.body.entry);
    },
};

const mutations = {
    setHomePageData: (state, data) => {
        state.homePageData = data;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};
