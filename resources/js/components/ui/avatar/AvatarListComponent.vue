<template>
    <ul class="avatars">
        <li v-for="({name, src}, index) in avatars" v-bind:key="index">
            <a href="#" v-tooltip:top="name">
                <avatar-component :alt="name" :src="src" :size="size"></avatar-component>
            </a>
        </li>
    </ul>
</template>

<script>
	export default {
		props: {
			avatars: {
				type: Array,
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
