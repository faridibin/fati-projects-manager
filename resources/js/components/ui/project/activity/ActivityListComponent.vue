<template>
    <ol class="list-group list-group-activity">
        <activity-component v-for="({author, action, item, date}, index) in activities" :author="author" :action="action" :item="item" :date="date" v-bind:key="index"></activity-component>
    </ol>
</template>

<script>
	export default {
		props: {
			activities: {
				type: Array,
				required: true,
			},
		},
	};
</script>

<style>
</style>
