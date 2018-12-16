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
                                    <option v-for="(team, index) in teams" :value="team.id" :key="team.id">{{ team.name }}</option>
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
        name: "PlayerCreate",
        data() {
            return {
                teams: [],
                player: {
                    first_name: '',
                    last_name: '',
                    team: {
                        id: null
                    }
                }
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
            },
            save(){
                this.$http.post('players', this.player).then(response => {
                    this.$router.push({name:'player'});
                },reason => {
                    alert(reason.message)
                })
            }
        }
    }
</script>

<style lang="scss">
    .select-dropdown {
        background-color: rgba(255, 255, 255, 0.9);
        width: 100%;
        padding: 5px;
        border: 1px solid #f2f2f2;
        border-radius: 2px;
        height: 3rem;
    }
</style>
