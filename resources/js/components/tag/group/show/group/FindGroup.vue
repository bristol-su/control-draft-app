<template>
    <div>
        <b-form-group id="group-group" label="Group:" label-for="group">
            <b-form-select
                id="group"
                v-model="group_selected"
                @change="onChange($event)"
            >
                <option v-for="item in groups" :value="item.id" >
                    {{ item.data.name }}
                </option>
            </b-form-select>
        </b-form-group>
    </div>
</template>

<script>
    export default {
        name: "FindGroup",

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
                group_selected: null,
                groups: []
            }
        },

        mounted() {
            this.syncValue();
        },

        created() {
            this.$control.group().all()
                .then(response => this.groups = response.data)
                .catch(error => this.$notify.alert('Could not load groups'))
        },

        methods: {
            syncValue() {
                if (this.value !== 0) {
                    this.group_selected = this.value;
                }
            },


            onChange(event) {
                this.$emit('input', event);
            }
        }
    }
</script>