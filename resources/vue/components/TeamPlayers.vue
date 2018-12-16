<template>
    <div class="card">
        <div class="card-title">
            <h4>Team: {{ team.name }}</h4>
        </div>
        <div class="card-content">
            <table class="striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Team</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(player, index) in players" :key="player.id">
                    <td>{{ index }}</td>
                    <td>{{ player.first_name }}</td>
                    <td>{{ player.last_name }}</td>
                    <td>{{ player.team.name }}</td>
                    <td>{{ player.created_at }}</td>
                    <td>
                        <router-link class="btn" :to="{name:'playerEdit', params:{id:player.id}}">Edit</router-link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TeamPlayers",
        data() {
            return {
                team: {},
                players: []
            }
        },
        created() {
            this.getTeamPlayers();
        },
        methods: {
            getTeamPlayers() {
                this.$http.get('teams/' + this.$route.params.id).then(response => {
                    this.team = response.data.data.team;
                    this.players = response.data.data.players;
                })
            }
        }
    }
</script>

<style scoped>

</style>
