<template>
    <button class="btn" :class="[color, { 'btn-block':isBlock }]" role="button" :type="type">
        <slot></slot>
    </button>
</template>

<script>
	export default {
		data: () => ({
			block: "btn-block",
		}),
		props: {
			color: {
				type: String,
				default: "btn-primary",
			},
			isBlock: {
				type: Boolean,
				default: false,
			},
			type: {
				type: String,
				default: "submit",
			},
		},
	};
</script>

<style lang="scss" scoped>
	.btn {
		box-shadow: 0 0.1875rem 0.375rem rgb(33 37 41 / 10%);
	}
</style>
