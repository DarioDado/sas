import fetchService from '../../services/fetchService';
const state = {
    donatePageData: {},
};

const getters = {
    donatePageData: state => state.donatePageData,
};

const actions = {
    async fetchDonatePageData({ commit }) {
        const response = await fetchService.getData('donate-page');
        commit('setDonatePageData', response.data.body.entry);
    },
};

const mutations = {
    setDonatePageData: (state, data) => {
        state.donatePageData = data;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};