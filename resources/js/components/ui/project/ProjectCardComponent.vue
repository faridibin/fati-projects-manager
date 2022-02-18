<template>
    <div class="card card-project">
        <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
            <div class="dropdown card-options">
                <button class="btn-options" type="button" id="..." data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <em class="fas fa-ellipsis-v"></em>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    ...
                </div>
            </div>
            <div class="card-title">
                <a href="#">
                    <h5>{{ name }}</h5>
                </a>
            </div>
            <ul class="avatars">
                ...
            </ul>
            <div class="card-meta d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <em class="material-icons mr-1"></em>
                    <span class="text-small">-/-</span>
                </div>
                <span class="text-small">{{ dueDate }}e</span>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		props: {
			name: {
				type: String,
				required: true,
			},
			src: {
				type: String,
				required: true,
			},
			dueDate: {
				type: String,
				required: true,
			},
		},
	};
</script>

<style>
</style>
