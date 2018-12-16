<template>
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="col s6">
                    <form @submit.prevent="save()">
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="First Name" v-model="player.first_name" type="text"
                                       class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Last Name" v-model="player.last_name" type="text" class="validate">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select class="select-dropdown" v-model="player.team.id">
                                    <option value="">-</option>
                                    <option v-for="(team, index) in teams"
                                        :value="team.id" :key="team.id">
                                        {{ team.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PlayerEdit",
        data() {
            return {
                teams: [],
                player: {}
            }
        },
        created() {
            this.getTeams();
            this.getPlayer();
        },
        methods: {
            getTeams() {
                this.$http.get('teams').then(response => {
                    this.teams = response.data.data;
                })
            },
            getPlayer() {
                this.$http.get('players/' + this.$route.params.id).then(response => {
                    this.player = response.data.data;
                })
            },
            save() {
                this.$http.put('players/' + this.$route.params.id, this.player).then(response => {
                    this.$router.push({name: 'player'});
                }, reason => {
                    // alert(reason.message)
                })
            }
        }
    }
</script>

<style scoped>

</style>
