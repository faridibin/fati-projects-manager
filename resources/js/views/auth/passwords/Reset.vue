<template>
    <div class="col-lg-5 col-md-7">
        <h1 class="h2">Reset Password &#x1F510;</h1>
        <p>Your password must be at least 8 characters</p>
        <!-- Your password must include at least one each of the following: uppercase letter, number and special character (eg: !, @, #, $, %, ^, &, *, - or _). -->

        <form @submit.prevent="reset" @keydown="form.onKeydown($event)">
            <div class="form-group">
                <input v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" type="password" placeholder="Password"/>
                <has-error :form="form" field="password"/>
            </div>

            <div class="form-group">
                <input v-model="form.password_confirmation" class="form-control" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" type="password" placeholder="Comfrim Password"/>
                <has-error :form="form" field="password_confirmation"/>
            </div>

            <button-component :is-block="true">Reset Password</button-component>
        </form>
    </div>
</template>

<script>
	import { mapActions } from "vuex";

	export default {
		data: () => ({
			form: new Form({
				password: null,
				password_confirmation: null,
			}),
		}),
		methods: {
			...mapActions({
				attemptResetPassword: "auth/attemptResetPassword",
			}),
			reset() {
				this.form.update({
					token: this.token,
					email: this.email,
				});

				this.attemptResetPassword(this.form);
			},
		},
		props: {
			token: { type: String, required: true },
			email: { type: String, required: true },
		},
	};
</script>

<style>
</style>
