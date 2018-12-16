import Vue from 'vue'
import VueRouter from 'vue-router'
import Team from './components/Team'
import Player from './components/Player'
import TeamCreate from './components/TeamCreate'
import PlayerCreate from './components/PlayerCreate'
import PlayerEdit from './components/PlayerEdit'
import TeamPlayers from './components/TeamPlayers'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        {
            path: '/',
            name:'home',
            component: Team
        },
        {
            path: '/team',
            name:'team',
            component: Team,
        },
        {
            path: '/team/create',
            name:'teamCreate',
            component: TeamCreate
        },
        {
            path: '/team/:id/players',
            name:'teamPlayers',
            component: TeamPlayers
        },
        {
            path: '/player',
            name:'player',
            component: Player
        },
        {
            path: '/player/create',
            name:'playerCreate',
            component: PlayerCreate
        },
        {
            path: '/player/:id',
            name:'playerEdit',
            component: PlayerEdit
        }

    ]
})
