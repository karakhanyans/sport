<template>
<div class="card">
    <div class="card-content">
        <div class="row">
            <form @submit.prevent="save()">
                <div class="input-field col s6">
                    <input placeholder="Team Name" v-model="team.name" type="text" class="validate">
                </div>
                <div class="input-field col s6">
                    <button type="submit" class="btn">Save</button>
                </div>
            </form>
        </div>
        <div v-if="errors" class="row">
            <p v-for="error in errors">{{ error[0] }}</p>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "TeamCreate",
        data(){
            return {
                errors: [],
                team:{
                    name:''
                }
            }
        },
        methods:{
            save(){
                this.$http.post('teams',this.team).then(response => {
                    this.$router.push('/team');
                },reason => {
                    this.errors = reason.data.errors;
                });
            }
        }
    }
</script>

<style lang="scss">
 input{
     background-color: transparent;
     border: none;
     border-bottom: 1px solid #9e9e9e;
     border-radius: 0;
     outline: none;
     height: 3rem;
     width: 100%;
     font-size: 1rem;
     margin: 0 0 20px 0;
     padding: 0;
     box-shadow: none;
     box-sizing: content-box;
     transition: all 0.3s;
 }
</style>
