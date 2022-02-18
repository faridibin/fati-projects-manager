<template>
    <div class="col-lg-5 col-md-7">
        <div v-if="form.successful" class="alert alert-success" role="alert">
            We have emailed your password reset link!
        </div>

        <h1 class="h2">Forgot password &#x1f62B;</h1>
        <p class="lead">Enter your email address to reset</p>

        <form @submit.prevent="email" @keydown="form.onKeydown($event)">
            <div class="form-group">
                <input v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" type="email" placeholder="Email Address"/>
                <has-error :form="form" field="email"/>
            </div>

            <button-component :is-block="true">Send Reset Link</button-component>

            <small v-if="!isAuthenticated">Back to <a href="/login">Login</a></small>
        </form>
    </div>
</template>

<script>
	import { mapGetters, mapActions } from "vuex";

	export default {
		data: () => ({
			form: new Form({
				email: null,
			}),
		}),
		computed: {
			...mapGetters({
				isAuthenticated: "auth/isAuthenticated",
			}),
		},
		methods: {
			...mapActions({
				attemptForgotPassword: "auth/attemptForgotPassword",
			}),
			email() {
				this.attemptForgotPassword(this.form).then(() => this.form.reset());
			},
		},
	};
</script>

<style>
</style>
