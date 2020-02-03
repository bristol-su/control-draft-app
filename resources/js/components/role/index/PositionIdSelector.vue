<template>
	<div>
		<b-form-group id="position-group" label="Position:" label-for="position">
            <b-form-select
                id="position"
                v-model="position_selected"
                @change="onChange($event)"
            >
            	<option v-for="item in positions" :value="item.data.id" >
            		{{ item.data.name }}
            	</option>
        	</b-form-select>
        </b-form-group>
	</div>
</template>

<script>
	export default {
		name: "Position-Id-Selector",

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
				position_selected: null,
				positions: []
			}
		},

		mounted() {
			this.syncValue();
		},

		created() {
			this.$control.position().all()
                .then(response => this.positions = response.data)
                .catch(error => this.$notify.alert('Could not load positions'))
		},

		methods: {
			syncValue() {
				if (this.value !== 0) {
					this.position_selected = this.value;
				}
			},


            onChange(event) {
            	this.$emit('input', event);
            }
		}
	}
</script>