<template>
    <div>
        <b-form @submit.prevent="saveUser">

            <b-form-group id="user-first-name-group" label="First Name:" label-for="user-first-name">
                <b-form-input
                    id="user-first-name"
                    v-model="form.first_name"
                    placeholder="Enter first name"
                />
            </b-form-group>

            <b-form-group id="user-last-name-group" label="Last Name:" label-for="user-last-name">
                <b-form-input
                    id="user-last-name"
                    v-model="form.last_name"
                    placeholder="Enter last name"
                />
            </b-form-group>

            <b-form-group id="user-preferred-name-group" label="Preferred Name:" label-for="user-preferred-name">
                <b-form-input
                    id="user-preferred-name"
                    v-model="form.preferred_name"
                    placeholder="Enter preferred name"
                />
            </b-form-group>

            <b-form-group
                id="user-email-group"
                label="Email address:"
                label-for="user-email"
                v-model="form.email"
            >
                <b-form-input
                    id="user-email"
                    v-model="form.email"
                    type="email"
                    placeholder="Enter email"
                />
            </b-form-group>

            <b-form-group
                id="user-dob-group"
                label="Date of Birth:"
                label-for="user-dob"
                v-model="form.dob"
            >
                <b-form-input
                    id="user-dob"
                    v-model="form.dob"
                    type="date"
                    placeholder="Enter date of birth"
                />
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: "Edit",

        props: {
            user: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            user: {
                handler: function() {
                    this.syncUserAttributes();
                },
                deep: true
            }
        },

        data() {
            return {
                form: {
                    first_name: null,
                    last_name: null,
                    preferred_name: null,
                    email: null,
                    dob: null
                }
            }
        },

        mounted() {
            this.syncUserAttributes();
        },

        methods: {
            syncUserAttributes() {
                if(this.user !== null) {
                    this.form.first_name = this.user.data.first_name;
                    this.form.last_name = this.user.data.last_name;
                    this.form.preferred_name = this.user.data.preferred_name;
                    this.form.email = this.user.data.email;
                    this.form.dob = this.user.data.dob;
                }
            },

            saveUser() {
                if(this.user !== null) {
                    this.updateUser();
                } else {
                    this.createUser();
                }
            },

            updateUser() {
                this.$control.user().update(this.user.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the user.'));
            },

            createUser() {
                this.$control.user().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the user.'));
            }
        },

    }
</script>

<style scoped>

</style>
