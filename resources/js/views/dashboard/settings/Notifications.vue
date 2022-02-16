<template>
    <div class="col-xl-8 col-lg-9">
        <div class="card">
            <div class="card-body">
                <form>
                    <h6>Activity Notifications</h6>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input type="checkbox" class="custom-control-input" id="notify-1" checked>
                            <label class="custom-control-label" for="notify-1">Someone assigns me to a task</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input type="checkbox" class="custom-control-input" id="notify-2" checked>
                            <label class="custom-control-label" for="notify-2">Someone mentions me in a conversation</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input type="checkbox" class="custom-control-input" id="notify-3" checked>
                            <label class="custom-control-label" for="notify-3">Someone adds me to a project</label>
                        </div>
                    </div>
                    <div class="form-group mb-md-4">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input type="checkbox" class="custom-control-input" id="notify-4">
                            <label class="custom-control-label" for="notify-4">Activity on a project I am a member of</label>
                        </div>
                    </div>
                    <!-- <h6>Service Notifications</h6>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input type="checkbox" class="custom-control-input" id="notify-5">
                            <label class="custom-control-label" for="notify-5">Monthly newsletter</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input type="checkbox" class="custom-control-input" id="notify-6" checked>
                            <label class="custom-control-label" for="notify-6">Major feature enhancements</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input type="checkbox" class="custom-control-input" id="notify-7">
                            <label class="custom-control-label" for="notify-7">Minor updates and bug fixes</label>
                        </div>
                    </div> -->
                    <div class="d-flex justify-content-end">
                        <button-component>Save Preferences</button-component>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
	export default {};
</script>

<style>
</style>
