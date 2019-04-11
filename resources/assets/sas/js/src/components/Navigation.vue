<template>
    <nav class="navbar navbar-expand-lg navbar-light position-fixed nav-transition" :class="isTransparent ? '' : 'dynamic-background'">
        <button  @click="onChangeCollor" class="navbar-toggler" :class="isTransparent ? '' : 'open'" type="button"
            data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" :class="isTransparent ? '' : 'open'"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <div class="navbar-brand">
                <div class="logo"><img src="http://sas.test/storage/assets/logo.webp" alt=""></div>
                <div class="logo-text">
                    <a @click="onCloseNav" href="#">SAS</a>
                    <p>Softball Association of Singidunum</p>
                    <p>nonprofit sports organisation</p>
                </div>
            </div>
            <ul class="navbar-nav nav navbar-right">
                <li class="nav-item"><a @click="onCloseNav" class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a @click="onCloseNav" class="nav-link" href="#about">About sas</a></li>
                <li class="nav-item"><a @click="onCloseNav" class="nav-link" href="#calendar">Game calendar</a></li>
                <li class="nav-item"><a @click="onCloseNav" class="nav-link" href="#donate">Donate</a></li>
                <li class="nav-item"><a @click="onCloseNav" class="nav-link" href="#carouselExampleControls">Gallery/news</a></li>
                <li class="nav-item"><a @click="onCloseNav" class="nav-link" href="#contact">Contacts</a></li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'Navigation',
        data(){
            return {
            navTransparent: true,
            navOpen: false,
            }
        },

        computed: {
            isTransparent() {
                return this.navTransparent;
            },
        },

        methods: {
            //close nav on menu item click
            onCloseNav() {
                if (this.navOpen) {
                    var navMain = $("#navbarTogglerDemo01");
                    navMain.on("click", "a", null, function () {
                        navMain.collapse('hide');
                    });
                    this.navTransparent = this.navTransparent ? false : true;
                    this.navOpen = !this.navOpen;
                }
            },
            onChangeCollor() {
                this.navOpen = !this.navOpen;
                this.navTransparent = this.navTransparent ? false : true;
            },

        }
    }
</script>

<style lang="scss">
    nav {
        width: 100%;
        background-color: #fff;
        border-top: 2.5px solid #A0138D;
        z-index: 100;

        .navbar-collapse {
            justify-content: space-between;
            .navbar-brand {
                display: flex;
                align-items: center;
                margin-left: 7vw;
                .logo {
                    padding-right: 15px;
                }
                .logo-text {
                    display: flex;
                    flex-direction: column;
                }
                p {
                    font-size: 12px;
                    margin: 0;
                    color: #6D6D6D;
                }
                a {
                    color: #F46569;
                    font-weight: bold;
                    &:hover {
                        text-decoration: none;
                        color: #40687C;
                    }
                }
            }
        }

        li {
            padding: 20px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
        }

        &.navbar-light .navbar-nav .nav-link {
            color: #F46569;
        }

        &.navbar-light .navbar-nav .nav-link:focus,
        &.navbar-light .navbar-nav .nav-link:hover {
            color: #A0B3BE;
        }

        @media (max-width: 991px) {
            background-color: transparent;
            -webkit-transition: background-color 0.5s; /* Safari */
            transition: background-color 0.5s;
            .navbar-brand {
                justify-content: center;
            }
            ul {
                text-align: center;
            }
            &.dynamic-background {
                background-color: rgba(255,255,255,1);
            }

            &.navbar-light .navbar-toggler {
                border-color: rgba(255,255,255,0.9);
            }

            &.navbar-light .navbar-toggler.open {
                border-color: #40687C;
            }

            &.navbar-light .navbar-toggler-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255,0.9)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
            }
            &.navbar-light .navbar-toggler-icon.open {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='#40687C' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
            }
        }
        @media (max-width: 1130px) {
            li {
                padding: 5px;
            }
        }
    }

    .navbar-light .navbar-nav .active>.nav-link,
    .navbar-light .navbar-nav .nav-link.active,
    .navbar-light .navbar-nav .nav-link.show,
    .navbar-light .navbar-nav .show>.nav-link {
        color: #A0B3BE;
    }

    li.nav-item.active {
        color: #A0B3BE;
    }
</style>