<template>
    <div v-if="!loading" class="donate" id="donate">
        <div class="container">
            <h2 class="subheader1">{{ donatePageData.first_title }}</h2>
            <h1 class="subheader2">{{ donatePageData.second_title }}</h1>
            <h1 class="main-header">{{ donatePageData.third_title }}</h1>
            <div v-html="donatePageData.text">
                {{ donatePageData.text }}
            </div>
            <div class="donate-line"></div>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

                <!-- Identify your business so that you can collect the payments. -->
                <input type="hidden" name="business"
                    value="donations@kcparkfriends.org">

                <!-- Specify a Donate button. -->
                <input type="hidden" name="cmd" value="_donations">

                <!-- Specify details about the contribution -->
                <input type="hidden" name="item_name" value="Friends of the Park">
                <input type="hidden" name="item_number" value="Fall Cleanup Campaign">
                <input type="hidden" name="currency_code" value="USD">

                <!-- Display the payment button. -->
                <input name="submit"
                type="submit"
                class="btn btn-primary btn-lg game-info"
                value="DONATE HERE"
                alt="Donate">

            </form>
            <!-- <a class="btn btn-primary btn-lg game-info" href="#" role="button">DONATE HERE</a> -->
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import { Carousel, Slide } from 'vue-carousel';
export default {
    name: 'Donate',
    data: function() {
        return {
            loading: true,
        }
    },
    computed: {
        ...mapGetters(['donatePageData']),
    },
    methods: {
        ...mapActions(['fetchDonatePageData']),
    },
    async created() {
        await this.fetchDonatePageData();
        this.loading = false;
    }
}
</script>
<style lang="scss">
    .content .donate {
        .main-header {
            font-size: 55px;
        }
        .subheader1 {
            font-weight: normal;
            text-transform: uppercase;
        }
        .btn-primary {
            border-color: #F3C039;
            color: #F3C039;
            font-weight: normal;
            padding: 15px 35px;
            &:hover {
                background-color: #F3C039;
                border-color: #F3C039;
                color: white;
            }
        }
        @media (max-width: 815px) {
            .main-header {
                font-size: 35px;
            }
        }
        @media (max-width: 575px) {
            .main-header {
                font-size: 30px;
            }
            .subheader2 {
                padding-top: 0;
            }
        }
    }
    .donate {
        height: 100vh;
        background-color: #3D667A;
        padding: 14vh 0;
        color: rgba(255,255,255,0.9);
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            p {
                max-width: 30vw;
            }
            .donate-line {
                border: 2px solid rgba(255,255,255,0.9);
                width: 12vw;
                margin-bottom: 30px;
            }
        }
        @media (max-width: 815px) {
            height: auto;
            .container {
                p {
                    max-width: 60vw;
                }
            }
        }
        @media (max-width: 575px) {
            .container {
                p {
                    max-width: 70vw;
                }
            }
        }
    }
</style>

