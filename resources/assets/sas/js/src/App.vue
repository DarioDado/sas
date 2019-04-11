<template>
  <div id="app">
    <side-social-nav></side-social-nav>
    <navigation></navigation>
    <div class="content">
      <jumbotron></jumbotron>
      <about></about>
      <video autoplay muted loop id="myVideo">
        <source src="http://sas.test/storage/assets/background-video.mp4" type="video/mp4">
      </video>
      <game-calendar></game-calendar>
      <donate></donate>
      <gallery-news></gallery-news>
      <contact></contact>
    </div>
  </div>
</template>

<script>
import Navigation from './components/Navigation';
import Jumbotron from './components/Jumbotron';
import SideSocialNav from './components/SideSocialNav';
import About from './components/About';
import GameCalendar from './components/GameCalendar';
import Donate from './components/Donate';
import GalleryNews from './components/GalleryNews';
import Contact from './components/Contact';
export default {
  components: {
    Navigation,
    Jumbotron,
    SideSocialNav,
    About,
    GameCalendar,
    Donate,
    GalleryNews,
    Contact
  }
  
}
</script>


<style lang="scss">
  //content
  html {
    scroll-behavior: smooth;
  }
  .content {
    padding-top: 90px;
    overflow: hidden;
    .btn-primary {
      color: rgba(255,255,255,0.8);
      background-color: rgba(255,255,255,0);
      border:2px solid  rgba(255,255,255,0.8);
      border-radius: 0;
      font-size: 1rem;
      padding: .4rem 1.7rem;
      font-weight: bold;
    }
    .btn-primary:hover {
      color: white;
      border:2px solid white;
    }
    .subheader1 {
      font-size: 37px;
      font-weight: bold;
    }
    .subheader2 {
      font-size: 20px;
    }
    .main-header {
      font-size: 70px;
      font-weight: bold;
    }
    video {
      width: 100%;
    }

    @media (max-width: 1130px) {
      .main-header {
        font-size: 55px;
      }
    }

    @media (max-width: 991px) {
      padding-top: 0; 
    }
    @media (max-width: 885px) {
      .main-header {
        font-size: 40px;
      }
      .subheader1 {
        font-size: 30px;
      }
      video {
        width: 200%;
      }
    }
    @media (max-width: 575px) {
      text-align: center;
      .subheader1 {
        font-size: 24px;
      }
      .main-header {
        font-size: 32px;
      }
    }
  }

</style>
