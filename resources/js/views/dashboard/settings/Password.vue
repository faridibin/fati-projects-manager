<template>
    <div class="col-xl-8 col-lg-9">
        <div v-if="form.successful" class="alert alert-success" role="alert">
            Your password has been changed.
        </div>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="changePasssword" @keydown="form.onKeydown($event)">
                    <div class="form-group row align-items-center">
                        <label class="col-3">Current Password</label>
                        <div class="col">
                            <input v-model="form.current_password" type="password" placeholder="Enter your current password" class="form-control" :class="{ 'is-invalid': form.errors.has('current_password') }"/>
                            <has-error :form="form" field="current_password"/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">New Password</label>
                        <div class="col">
                            <input v-model="form.password" type="password" placeholder="Enter a new password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }"/>
                            <has-error :form="form" field="password"/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">Confirm Password</label>
                        <div class="col">
                            <input v-model="form.password_confirmation" type="password" placeholder="Confirm your new password" class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }"/>
                            <has-error :form="form" field="password_confirmation"/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button-component>Change Password</button-component>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
	import { mapActions } from "vuex";

	export default {
		data: () => ({
			form: new Form({
				current_password: null,
				password: null,
				password_confirmation: null,
			}),
		}),
		methods: {
			...mapActions({
				attemptChangePassword: "user/attemptChangePassword",
			}),
			changePasssword() {
				this.attemptChangePassword(this.form).then(() => this.form.reset());
			},
		},
	};
</script>

<style>
</style>
