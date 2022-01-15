<template>
    <div class="col-xl-5 col-lg-6 col-md-7">
        <h1 class="h2">Create account</h1>
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
                    <small>Your password should be at least 8 characters</small>
                </div>
            </div>

            <button class="btn btn-block btn-primary" role="button" type="submit">Create account</button>

            <small>By clicking 'Create Account' you agree to our <a href="#">Terms of Use</a></small>
        </form>
    </div>
</template>

<script>
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
			register: () => {},
		},
	};
</script>

<style>
</style>
