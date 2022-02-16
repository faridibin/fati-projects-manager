<template>
    <li class="list-group-item">
        <div class="media align-items-center">
            <ul class="avatars">
                <li>
                    <activity-icon-component :type="action.type"></activity-icon-component>
                </li>
                <li>
                    <avatar-component :alt="author.name" :src="author.src"></avatar-component>
                </li>
            </ul>

            <div class="media-body">
                <div>
                    <span class="h6">{{ author.name }} </span><span>{{ action.name }} </span><a :href="item.url">{{ item.name }}</a>
                </div>
                <span class="text-small">{{ date|date.humanize }}</span>
            </div>
        </div>
    </li>
</template>

<script>
	export default {
		props: {
			author: {
				type: Object,
				required: true,
			},
			action: {
				type: Object,
				required: true,
			},
			item: {
				type: Object,
			},
			date: {
				type: String,
				required: true,
			},
		},
	};
</script>

<style>
</style>
