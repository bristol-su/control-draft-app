<template>
    <div>
        <b-form-group id="user-group" label="User:" label-for="user">
            <b-form-select
                id="user"
                v-model="user_selected"
                @change="onChange($event)"
            >
                <option v-for="item in users" :value="item.id" >
                    {{ item.data.preferred_name }}
                </option>
            </b-form-select>
        </b-form-group>
    </div>
</template>

<script>
    export default {
        name: "FindUser",

        props: {
            value: {
                type: Number,
                required: false,
                default: 0
            }
        },

        watch: {
            value: {
                handler: function() {
                    this.syncValue();
                },
                deep: true
            }
        },

        data() {
            return {
                user_selected: null,
                users: []
            }
        },

        mounted() {
            this.syncValue();
        },

        created() {
            this.$control.user().all()
                .then(response => this.users = response.data)
                .catch(error => this.$notify.alert('Could not load users'))
        },

        methods: {
            syncValue() {
                if (this.value !== 0) {
                    this.user_selected = this.value;
                }
            },


            onChange(event) {
                this.$emit('input', event);
            }
        }
    }
</script>