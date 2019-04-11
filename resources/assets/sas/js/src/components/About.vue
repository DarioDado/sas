<template>
    <div v-if="!loading" class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="subheader1">{{ aboutPageData.first_title }}</h2>
                    <h2 class="subheader1">{{ aboutPageData.second_title }}</h2>
                    <div class="text-about" v-html="aboutPageData.description">
                        {{ aboutPageData.description }}
                        <a class="btn btn-primary btn-lg" href="#donate" role="button">Let's work together ></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="teams">
                        <h2 class="subheader2">{{ aboutPageData.subtitle }}</h2>
                        <div v-for="team in aboutPageData.our_teams" :key="team.id" class="team">
                            <div class="title">
                                <p class="label">({{ team.seniority }})</p>
                                <p class="team-title">{{ team.name }}</p>
                            </div>
                            <div class="logo-team"><img :src="appAssetsUrl + team.logo" alt="team logo"></div>
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
export default {
  name: 'About',
  data: function() {
    return {
      loading: true,
    }
  },
  computed: {
    ...mapGetters(['aboutPageData']),
    appAssetsUrl() {
        return constants.appAssetsUrl;
    },
  },
  methods: {
    ...mapActions(['fetchAboutPageData']),
  },
  async created() {
    await this.fetchAboutPageData();
    this.loading = false;
  } 
}
</script>


<style lang="scss">
    .content .about .btn-primary {
        border:2px solid  #3D667A;
        color: #3D667A;
        margin-top: 3vh;
        text-transform: uppercase;
    }
    .content .about .btn-primary:hover {
        border:2px solid  #F46569;
        color: #F46569;
        margin-top: 3vh;
    }
    .content .about {
        .subheader1 {
            text-transform: uppercase;
            color: #3D667A;
        }
    }
    .about {
        height: 100vh;
        background-color: #FFE5E5;
        padding: 14vh 0;
        color: #3D667A;
        .text-about {
            padding: 29px 0 0 10%;
            text-align: justify;
        }
        .teams {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-top: 30px;
            .team {
                display: flex;
                width: 65%;
                justify-content: flex-start;
                align-items: center;
                padding-bottom: 15px;
                .title {
                    padding-right: 10px;
                }
                .label {
                    font-size: 11px;
                }
                .team-title {
                    text-transform: uppercase;
                }
            }
            .subheader2 {
                align-self: center;
                font-size: 30px;
                font-weight: bold;
                text-transform: uppercase;
            }
            p {
                margin: 0;
            }
        }
        @media (max-width: 1130px) {
            height: auto;
            .teams {
                margin-top: 8vh;
                .team {
                    width:80%;
                }
            }
        }
        @media (max-width: 991px) {
            .teams {
                margin-top: 10vh;
                .team {
                    width:100%;
                    justify-content: center;
                }
            }
        }
        @media (max-width: 575px) {
            .btn-primary {
                padding: .4rem .6rem!important;
            }
        }
    }
</style>
