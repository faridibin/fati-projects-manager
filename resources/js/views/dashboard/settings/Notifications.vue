<template>
    <div class="col-xl-8 col-lg-9">
        <div class="card">
            <div class="card-body">
                <form>
                    <h6>Activity Notifications</h6>
                    <div v-for="() in " class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input type="checkbox" class="custom-control-input" :id="'activity-'+index" checked>
                            <label class="custom-control-label" :for="'activity-'+index">Text goes here</label>
                        </div>
                    </div>

                    <h6>Service Notifications</h6>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input type="checkbox" class="custom-control-input" id="notify-5">
                            <label class="custom-control-label" for="notify-5">Text goes here</label>
                        </div>
                    </div>

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
