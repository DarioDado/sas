<template>
    <div v-if="!loading" id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li v-for="(singleNews, index) in news" v-bind:key="singleNews.id" data-target="#carouselExampleIndicators" :data-slide-to="index" :class="index === 0 ? 'active' : ''"></li>
        </ol>
        <div class="carousel-inner">
            <div v-for="(singleNews, index) in news" v-bind:key="singleNews.id" :class="index === 0 ? 'carousel-item news-slide active' : 'carousel-item news-slide'" :style="{ backgroundImage: 'url(' + appAssetsUrl + singleNews.image + ')' }">
                <div class="news-info">
                    <h2 class="subheader1">{{singleNews.first_title}}</h2>
                    <h2 class="subheader1">{{singleNews.second_title}}</h2>
                    <a class="btn btn-primary btn-lg game-info" href="#" role="button">see more...</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import constants from '../shared/constants';
export default {
    name: 'GalleryNews',
    data: function() {
        return {
            loading: true,
        }
    },
    computed: {
        ...mapGetters(['news']),
        appAssetsUrl() {
            return constants.appAssetsUrl;
        },
    },
    methods: {
        ...mapActions(['fetchNews']),
    },
    async created() {
        await this.fetchNews();
        this.loading = false;
    } 
}
</script>

<style lang="scss">
    #carouselExampleControls {
        height: 100vh;
        .carousel-inner {
            height: 100%;
            .carousel-item.news-slide {
                height: 100%;
            }
        }
    }
    .content {
        .subheader1 {
            color: rgba(255,255,255,0.9);
        }
        .btn-primary {
            &:hover {
            }
        }
    }
    .gallery-news {
        height: 100vh;
    }
    .news-info {
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .news-slide {
        height: 70vh;
        background-size: cover;
        background-position: center;
    }
</style>

