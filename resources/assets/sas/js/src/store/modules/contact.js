import fetchService from '../../services/fetchService';
const state = {
    contactData: {},
};

const getters = {
    contactData: state => state.contactData,
};

const actions = {
    async fetchContactData({ commit }) {
        const response = await fetchService.getData('contact');
        commit('setContactData', response.data.body.entry);
    },
    async sendMessage({ commit }, data) {
        const response = await fetchService.postData('send-message', data);
        return response.data;
    },
};

const mutations = {
    setContactData: (state, data) => {
        state.contactData = data;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};