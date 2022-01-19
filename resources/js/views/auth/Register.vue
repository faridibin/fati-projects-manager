<template>
    <div class="col-lg-5 col-md-7">
        <div v-if="form.successful">
            <h1 class="h2">Account created! &#x1F389;</h1>
            <p>Before proceeding, we need to verify your email address. Please check your email for a verification link.</p>

            <a class="btn btn-block btn-primary" href="/app/dashboard">Proceed</a>
        </div>
        <div v-else>
            <h1 class="h2">Create account &#x1F603;</h1>
            <p class="lead">Start doing things for free, in an instant</p>

            <signin-options-component></signin-options-component>

            <form @submit.prevent="register" @keydown="form.onKeydown($event)">
                <div class="form-group">
                    <input v-model="form.first_name" class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }" type="text" placeholder="First Name"/>
                    <has-error :form="form" field="first_name"/>
                </div>
                <div class="form-group">
                    <input v-model="form.last_name" class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }" type="text" placeholder="Last Name"/>
                    <has-error :form="form" field="last_name"/>
                </div>
                <div class="form-group">
                    <input v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" type="email" placeholder="Email Address"/>
                    <has-error :form="form" field="email"/>
                </div>
                <div class="form-group">
                    <input v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" type="password" placeholder="Password"/>
                    <has-error :form="form" field="password"/>
                    <div class="text-left">
                        <small>Your password must be at least 8 characters</small>
                        <!-- Your password must include at least one each of the following: uppercase letter, number and special character (eg: !, @, #, $, %, ^, &, *, - or _). -->
                    </div>
                </div>

                <button-component :is-block="true">Create account</button-component>

                <small>By clicking 'Create Account' you agree to our <a href="#">Terms of Use</a></small>
            </form>
        </div>
    </div>
</template>

<script>
	import { mapActions } from "vuex";

	export default {
		data: () => ({
			form: new Form({
				first_name: null,
				last_name: null,
				email: null,
				password: null,
			}),
		}),
		methods: {
			...mapActions({
				attemptRegister: "auth/attemptRegister",
			}),
			register() {
				this.attemptRegister(this.form);
			},
		},
	};
</script>

<style>
</style>
