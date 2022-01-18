<template>
    <div class="col-lg-5 col-md-7">
        <h1 class="h2">Welcome Back &#x1f44b;</h1>
        <p class="lead">Log in to your account to continue</p>

        <form @submit.prevent="login" @keydown="form.onKeydown($event)">
            <div class="form-group">
                <input v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" type="email" placeholder="Email Address"/>
                <has-error :form="form" field="email"/>
            </div>
            <div class="form-group">
                <input v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" type="password" placeholder="Password"/>
                <has-error :form="form" field="password"/>
                <div class="text-right">
                    <small><a href="/password/reset">Forgot password?</a></small>
                </div>
            </div>

            <button-component :is-block="true">Log in</button-component>

            <small>Don't have an account yet? <a href="/register">Create one</a></small>
        </form>
    </div>
</template>

<script>
	import { mapActions } from "vuex";

	export default {
		data: () => ({
			form: new Form({
				email: null,
			}),
		}),
		methods: {
			...mapActions({
				attemptLogin: "auth/attemptLogin",
			}),
			login() {
				this.attemptLogin(this.form);
			},
		},
	};
</script>

<style>
</style>
