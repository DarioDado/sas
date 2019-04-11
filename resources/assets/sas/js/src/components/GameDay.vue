<template>
    <div class="col-sm-6 col-md-4 row-margin-bottom">
        <div class="row date">
            <div class="col-3 month">
                <p class="month-name">{{ gameDay[0].date.shortMonth }}</p>
                <p class="day-name">{{ gameDay[0].date.shortDayOfWeek }}</p>
            </div>
            <div class="col-9 day">
                <p class="day-number">{{formatedDay}}</p>
                <div class="day-line"></div>
            </div>
        </div>
        <game v-for="(game, index) in gameDay" v-bind:key="game.id" v-bind:game="game" v-bind:index="index" v-bind:lastIndex="lastIndex"></game>
    </div>
</template>

<script>
import Game from './Game';
export default {
    components: {
        Game,
    },
    props: ['gameDay'],
    computed: {
        formatedDay(){
            const stringDay = '' + this.gameDay[0].date.day;
            return stringDay.length === 1 ? '0' + stringDay : stringDay;
        },
        lastIndex(){
            return this.gameDay.length - 1;
        },
    },
}
</script>


<style lang="scss">
    .col-9 {
        padding-left: 0;
    }
    .row-margin-bottom {
        margin-bottom: 40px;
    }
    .month {
        p {
            margin: 0;
            color: #3D667A;
            line-height: 15px
        }
        .month-name {
            font-weight: bold;
        }
        .day-name {
            font-size: 14px;
            font-style: italic;
        }
    }
    .day {
        .day-number {
            font-size: 65px;
            font-weight: bold;
            margin: 0;
            line-height: 55px;
        }
        .day-line {
            border-bottom: 3px solid;
            width: 55px;
            height: 20px;
        }
        @media (max-width: 767px) {
            .day-number {
                text-align: left;
            }
        }
    }
    .divider-line {
        border-bottom: 2px dashed;
        height: 20px;
        width: 45px;
    }

</style>
