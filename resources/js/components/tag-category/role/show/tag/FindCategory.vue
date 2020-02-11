<template>
    <div>
        <b-form-group id="category-group" label="Category:" label-for="category">
            <b-form-select
                id="category"
                v-model="category_selected"
                @change="onChange($event)"
            >
                <option v-for="item in categories" :value="item.id" >
                    {{ item.name }}
                </option>
            </b-form-select>
        </b-form-group>
    </div>
</template>

<script>
    export default {
        name: "FindCategory",

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
                category_selected: null,
                categories: []
            }
        },

        mounted() {
            this.syncValue();
        },

        created() {
            this.$control.roleTagCategory().all()
                .then(response => this.categories = response.data)
                .catch(error => this.$notify.alert('Could not load categories'))
        },

        methods: {
            syncValue() {
                if (this.value !== 0) {
                    this.category_selected = this.value;
                }
            },


            onChange(event) {
                this.$emit('input', event);
            }
        }
    }
</script>