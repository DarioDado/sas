
import Vuex from 'vuex';
import Vue from 'vue';
import homePage from './modules/homePage';
import aboutPage from './modules/aboutPage';
import calendarPage from './modules/calendarPage';
import donatePage from './modules/donatePage';
import news from './modules/news';
import contact from './modules/contact';


Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    homePage,
    aboutPage,
    calendarPage,
    donatePage,
    news,
    contact,
  },
});
