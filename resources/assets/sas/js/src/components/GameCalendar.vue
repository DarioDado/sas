<template>
    <div v-if="!loading" class="game-calendar" id="calendar">
        <div class="container">
            <div class="calendar-header">
                <h2 class="subheader1">{{ calendarPageData.first_title }}<br> {{ calendarPageData.second_title }}</h2>
                <div class="league-info">
                    <h2 class="subheader1 lowcase">{{ calendarPageData.first_subtitle }}</h2>
                    <h3 class="subheader2">{{ calendarPageData.second_subtitle }}</h3>
                    <div class="team-list">
                        <p v-for="team in calendarPageData.euroleague_teams" :key="team.id" class="team-info">
                            {{ team.name }} ({{ team.country_code }})
                        </p>
                    </div>    
                </div>
            </div>
            <game-list v-bind:games="games"></game-list>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import GameList from './GameList'
export default {
    name: 'GameCalendar',
    components: {
        GameList,
    },
    data: function() {
        return {
            loading: true,
        }
    },
    computed: {
        ...mapGetters(['calendarPageData', 'games']),
    },
    methods: {
        ...mapActions(['fetchCalendarPageData']),
    },
    async created() {
        await this.fetchCalendarPageData();
        this.loading = false;
    }
}
</script>


<style lang="scss">
    .game-calendar {
        background-color: #FA626A;
        padding: 14vh 0;
        margin-top: -20px;
        color: rgba(255,255,255,0.9);
        .calendar-header {
            display: flex;
            justify-content: space-between;
            margin-top: 11vh;
            .lowcase, .subheader2 {
                text-align: right!important;
            }
            .subheader1 {
                text-align: left;
                text-transform: uppercase;
            }
            .lowcase {
                text-transform: capitalize;
            }
            .subheader2 {
                font-weight: bold;
                text-transform: uppercase;
            }
            p {
                margin: 0;
                text-transform: uppercase;
                font-size: 10px;
                text-align: right;
                line-height: 10px;
                font-weight: bold;
            }
        }
        @media (max-width: 767px) {
            .calendar-header {
                flex-direction: column;
                .lowcase, .subheader2, .subheader1, {
                    text-align: center!important;
                }
                .team-info {
                    text-align: center;
                }
                .lowcase {
                    font-size: 20px;
                    margin: 0;
                }
                .subheader2 {
                    font-size: 20px;
                }
            }
        }
    }
</style>

