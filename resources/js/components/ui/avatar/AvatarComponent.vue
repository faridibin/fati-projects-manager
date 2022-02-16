<template>
    <img :alt="alt" class="avatar" :class="[{'avatar-sm': isSmall}, {'avatar-lg': isLarge}]" :src="src"/>
</template>

<script>
	export default {
		mounted() {
			switch (this.size) {
				case "small":
					this.isSmall = true;
					break;
				case "large":
					this.isLarge = true;
					break;

				default:
					this.isSmall = false;
					this.isLarge = false;
					break;
			}
		},
		data() {
			return {
				isSmall: false,
				isLarge: false,
			};
		},
		props: {
			alt: {
				type: String,
				required: true,
			},
			src: {
				type: String,
				required: true,
			},
			size: {
				type: String,
				default: "default",
				validator: function (value) {
					return ["default", "small", "large"].indexOf(value) !== -1;
				},
			},
		},
	};
</script>

<style>
</style>
