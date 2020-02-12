<template>
    <div>
        <b-form @submit.prevent="addUser">

            <find-user @input="addUserId($event)"></find-user>

            <b-button v-if="user!==null" type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    import FindUser from './FindUser';

    export default {
        name: "Edit",

        components: { FindUser },

        props: {
            userId: {
                type: Number,
                required: false,
                default: 0
            },

            tag: {
                type: Object,
                required: false,
                default: null
            }
        },

        data() {
            return {
                user: null
            }
        },

        methods: {
            addUser() {
                this.$control.userTag().tagUser(this.tag.id, this.user.id)
                    .then(response => this.$emit('input', this.user))
                    .catch(error => this.$notify.alert('Could not tag the user.'));
            },

            addUserId(event) {
                this.$control.user().get(event)
                    .then(response => this.user = response.data)
                    .catch(error => this.$notify.alert('Could not fetch the user.'));
            }
        },

    }
</script>

<style scoped>

</style>
