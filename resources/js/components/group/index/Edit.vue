<template>
    <div>
        <b-form @submit.prevent="saveGroup">

            <b-form-group id="group-name-group" label="Group Name:" label-for="group-name">
                <b-form-input
                    id="group-name"
                    v-model="form.name"
                    placeholder="Enter group name"
                />
            </b-form-group>

            <b-form-group
                id="email-group"
                label="Email address:"
                label-for="email"
                v-model="form.email"
                description="Email to contact the group on."
            >
                <b-form-input
                    id="email"
                    v-model="form.email"
                    type="email"
                    placeholder="Enter group email"
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
            group: {
                type: Object,
                required: false,
                default: null
            }
        },

        watch: {
            group: {
                handler: function() {
                    this.syncGroupAttributes();
                },
                deep: true
            }
        },

        data() {
            return {
                form: {
                    email: null,
                    name: null
                }
            }
        },

        mounted() {
            this.syncGroupAttributes();
        },

        methods: {
            syncGroupAttributes() {
                if(this.group !== null) {
                    this.form.email = this.group.data.email;
                    this.form.name = this.group.data.name;
                }
            },

            saveGroup() {
                if(this.group !== null) {
                    this.updateGroup();
                } else {
                    this.createGroup();
                }
            },

            updateGroup() {
                this.$control.group().update(this.group.id, this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not update the group.'));
            },

            createGroup() {
                this.$control.group().create(this.form)
                    .then(response => this.$emit('input', response.data))
                    .catch(error => this.$notify.alert('Could not save the group.'));
            }
        },

    }
</script>

<style scoped>

</style>
