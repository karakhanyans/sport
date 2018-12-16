<template>
    <div class="card">
        <div class="card-title">
            <router-link :to="{name: 'teamCreate'}" class="btn text-right">Create Team</router-link>
        </div>

        <div class="card-content">
            <table class="striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(team, index) in teams" :key="team.id">
                    <td>{{ index }}</td>
                    <td>{{ team.name }}</td>
                    <td>{{ team.created_at}}</td>
                    <td><router-link class="btn" :to="{name: 'teamPlayers',params:{id:team.id}}">View</router-link></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Team",
        data() {
            return {
                teams: []
            }
        },
        created() {
            this.getTeams();
        },
        methods: {
            getTeams() {
                this.$http.get('teams').then(response => {
                    this.teams = response.data.data;
                })
            }
        }
    }
</script>

<style>

</style>
