<template>
    <div class="card card-task">
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
            <div class="card-title">
            <a href="#"><h6>Task Name</h6></a>
            <span class="text-small">Due Tomorrow</span>
            </div>
            <div class="card-meta">
            <ul class="avatars">
                <!-- <li>
                <img alt="..." class="avatar" src="..." />
                </li> -->
            </ul>
            <div class="d-flex align-items-center">
                <i class="material-icons">playlist_add_check</i>
                <span>-/-</span>
            </div>
            <div class="dropdown card-options">
                <button class="btn-options" type="button" id="task-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <em class="fas fa-ellipsis-v"></em>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                ...
                </div>
            </div>
            </div>
        </div>
    </div><!--end of task-->
</template>

<script>
	export default {};
</script>

<style>
</style>
