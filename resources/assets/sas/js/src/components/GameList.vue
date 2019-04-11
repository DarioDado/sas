<template>
    <div class="row game-list">
        <game-day v-for="gameDay in games" v-bind:gameDay="gameDay"></game-day>
    </div>
</template>


<script>
import GameDay from "./GameDay"
export default {
    components: {
        GameDay,
    },
    props: ['games'],
    
}
</script>


<style lang="scss">
    .game-list {
        margin-top: 10vh;
        @media (max-width: 767px) {
            margin-left: 5vw;
        }
        @media (max-width: 575px) {
            margin-left: 11vw;
        }
    }
</style>

