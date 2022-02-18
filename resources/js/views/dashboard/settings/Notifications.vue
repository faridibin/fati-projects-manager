<template>
    <div class="col-xl-8 col-lg-9">
        <div v-if="form.successful" class="alert alert-success" role="alert">
            Your preferences have been saved.
        </div>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="save" @keydown="form.onKeydown($event)">
                    <h6>Activity Notifications</h6>
                    <div v-for="(setting, index) in form.activity" v-bind:key="index" class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input v-model="form.activity[index]" type="checkbox" class="custom-control-input" :id="'activity-'+index" :checked="setting">
                            <label class="custom-control-label" :for="'activity-'+index">{{ index|trans('settings.notifications.activity') }}</label>
                        </div>
                    </div>

                    <h6>Service Notifications</h6>
                    <div v-for="(setting, index) in form.service" v-bind:key="index" class="form-group">
                        <div class="custom-control custom-checkbox custom-checkbox-switch">
                            <input v-model="form.service[index]" type="checkbox" class="custom-control-input" :id="'service-'+index" :checked="setting">
                            <label class="custom-control-label" :for="'service-'+index">{{ index|trans('settings.notifications.service') }}</label>
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
	import { mapGetters, mapActions } from "vuex";

	export default {
		mounted() {
			this.setData(this.settings);
		},
		data: () => ({
			form: new Form({
				activity: null,
				service: null,
			}),
		}),
		computed: {
			...mapGetters({
				settings: "user/settings",
			}),
		},
		watch: {
			settings(data) {
				this.setData(data);
			},
		},
		methods: {
			...mapActions({
				attemptUpdateNotificationSettings:
					"user/attemptUpdateNotificationSettings",
			}),
			setData(data) {
				this.form.update(JSON.parse(JSON.stringify(data)));
			},
			save() {
				this.attemptUpdateNotificationSettings(this.form).then(
					() => {} // this.form.reset()
				);
			},
		},
	};
</script>

<style>
</style>
