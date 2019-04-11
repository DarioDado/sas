import fetchService from '../../services/fetchService';
const state = {
    calendarPageData: {},
    games: [],
};

const getters = {
    calendarPageData: state => state.calendarPageData,
    games: (state) => {
        const groupedGames = [];
        const gamesToMap = state.games.map(game => game);
        while (gamesToMap.length !== 0) {
            const dayGroup = actions.groupByDay(gamesToMap);
            groupedGames.push(dayGroup);
          }
        
        return groupedGames;
    },
};

const actions = {
    async fetchCalendarPageData({ commit }) {
        const response = await fetchService.getData('calendar-page');
        commit('setCalendarPageData', response.data.body.entry);
        commit('setGames', response.data.body.entry.games);
    },
    groupByDay(gamesToMap) {
        const dayGroup = [gamesToMap[0]];
        for (let j = 1; j < gamesToMap.length; j++) {
            if (gamesToMap[0].date.year === gamesToMap[j].date.year
                && gamesToMap[0].date.month === gamesToMap[j].date.month
                && gamesToMap[0].date.day === gamesToMap[j].date.day
            ) {
                dayGroup.push(gamesToMap[j]);
                gamesToMap.splice(j, 1);
            }
        }
        gamesToMap.splice(0, 1);
        return dayGroup;
    }
};

const mutations = {
    setCalendarPageData: (state, data) => {
        state.calendarPageData = data;
    },
    setGames: (state, data) => {
        state.games = data;
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};