<template>
  <div>
    <preloader v-if="loading"></preloader>
    <div v-else class="jumbotron" v-bind:style="{ backgroundImage: 'url(' + appAssetsUrl + homePageData.background_image + ')' }">
        <div class="container">
            <h3 class="subheader2">{{ homePageData.first_subtitle }}</h3>
            <h1 class="main-header">{{ homePageData.main_title }}</h1>
            <h2 class="subheader1">{{ homePageData.second_subtitle }}</h2>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#about" role="button">Learn more ></a>
            </p>
            <div class="row counters">
                <div v-for="number in homePageData.numbers" :key="number.id" class="col-sm-6 col-md">
                    <div class="label">
                        <div class="num-title">
                            <p class="number">{{ number.number }}</p>
                            <p class="title">{{ number.name }}</p>
                        </div>
                        <div class="bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import constants from '../shared/constants';
import Preloader from "./Preloader";
export default {
  name: 'Jumbotron',
  data: function() {
    return {
      loading: true,
    }
  },
  components: {
    Preloader,
  },
  computed: {
    ...mapGetters(['homePageData']),
    appAssetsUrl() {
      return constants.appAssetsUrl;
    },
  },
  methods: {
    ...mapActions(['fetchHomePageData']),
  },
  async created() {
    await this.fetchHomePageData();
    this.loading = false;
  } 
}
</script>

<style lang="scss">
    .jumbotron {
      background-size: cover;
      background-position: center;
      height: 100vh;
      border-radius: 0;
      margin-bottom: 0;
      .btn-primary {
        text-transform: uppercase;
      }
      .subheader2, .subheader1, .main-header {
        color: rgba(255,255,255,0.9);
        text-transform: uppercase;
      }
      .subheader2 {
        padding-top: 5vh;
      }
      .lead {
        padding-top: 18vh;
      }
      .counters {
        margin-top: 15vh;
        .number, .title {
          color: rgba(255,255,255,0.9);
          text-transform: uppercase;
        }
        .number {
          font-weight: bold;
          font-size: 55px;
          margin-bottom: 0;
          line-height: 65px;
        }
        .title {
          font-size: 17px;
        }
        .bar {
          border: 1.5px solid rgba(255,255,255,0.9);
        }
      }
    }
    .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
      background-color: #F46569;;
      border-color: #F46569;
    }
    .btn-primary.focus, .btn-primary:focus, .btn.focus, .btn:focus {
      box-shadow: none;
    }
    @media (min-width: 992px) {
      .container {
        max-width: 960px;
      } 
    }
    @media (max-width: 1130px) {
      .container {
        max-width: 720px;
        .main-header {
          font-size: 55px;
        }
      }
    }
    @media (max-width: 885px) {
      .container {
        max-width: 80%;  
        .counters {
          .num-title {
            display: flex;
            align-items: center;
            p {
              margin: 0;
            }
          }
          .number{
            font-size: 40px;
            padding-right: 5px;
          }
          .title {
            font-size: 11px;
          }
        }
        .label {
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: flex-end;
        }
      }
    }
    @media(max-width: 660px) {
      .jumbotron {
        height: auto;
      }
    }

    @media (max-width: 575px) {
      .container {
        .subheader2 {
          padding-top: 12vh;
        }
      }
      .counters {
        .label {
            padding: 0 15% 30px;
            margin-bottom: 0px;
        }
      }
    }
</style>

