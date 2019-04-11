<template>
    <div class="side-social-nav">
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-facebook-f"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss"> 
.side-social-nav {
    position: fixed;
    top: 50vh;
    z-index: 5;
    display: flex;
    flex-direction: column;
    left: 3.5vw;

    i {
        color: white;
        padding: 10px;
        font-size: 20px;
        -webkit-transition: font-size 0.5s; /* Safari */
        transition: font-size 0.5s;
        &:hover {
            font-size: 25px;
        }
    }
}
</style>