<template>
    <div>
        <div class="row game">
            <div class="col-3 game-number">
                <p v-if="lastIndex !== 0" class="month-name">G{{index + 1}}</p>
            </div>
            <div class="col-9 day">
                <p class="vs">Vs</p>
                <p class="opponent">{{game.opponent.name}} ({{game.opponent.country_code}})</p>
                <p class="time">{{formatedHour}}.{{formatedMinute}}</p>
                <a v-if="isFinished" class="btn btn-primary btn-lg game-info" href="#" role="button">{{game.win ? "W" : "L"}} {{game.our_score}}-{{game.opponent_score}}</a>
            </div>
        </div>
        <div v-if="index !== lastIndex" class="row divider">
            <div class="col-3"></div>
            <div class="col-9">
                <div class="divider-line"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['lastIndex', 'game', 'index'],
    computed: {
        formatedHour(){
            return this.addZero(this.game.date.hour);
        },
        formatedMinute(){
            return this.addZero(this.game.date.minute);
        },
        isFinished(){
            return (this.game.our_score && this.game.opponent_score) ? true : false;
        },
    },
    methods: {
        addZero(number) {
            const stringDay = '' + number;
            return stringDay.length === 1 ? '0' + stringDay : stringDay;
        }
    }
    
}
</script>


<style lang="scss">
    .content .game-calendar .btn-primary {
        padding: .1rem 1.7rem;
        margin-top: 10px;
    }
    .content .game-calendar .btn-primary:hover {
    }
    .row.game {
        margin-top: 15px;
    }
    .month-name {
        font-weight: bold;
    }
    .day {
        p {
            margin: 0;
            line-height: 18px;
        }
        .time {
            font-weight: bold;
        }
        @media (max-width: 767px) {
            text-align: left;
        }
    }
    .divider-line {
        border-bottom: 2px dashed;
        height: 20px;
        width: 45px;
    }
</style>

