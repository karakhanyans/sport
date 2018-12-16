<template>
<div class="card">
    <div class="card-content">
        <router-link :to="{name: 'team'}" class="btn">Teams</router-link>
        <router-link :to="{name: 'player'}" class="btn">Players</router-link>
    </div>
</div>
</template>

<script>
    export default {
        name: "Sidebar"
    }
</script>

<style lang="scss">
    .btn{
        text-decoration: none;
        color: #fff;
        background-color: #26a69a;
        text-align: center;
        letter-spacing: .5px;
        transition: .2s ease-out;
        cursor: pointer;
        border: none;
        border-radius: 2px;
        display: inline-block;
        height: 36px;
        line-height: 36px;
        outline: 0;
        padding: 0 2rem;
        text-transform: uppercase;
    }
    .text-right{
        float: right;
    }
</style>
