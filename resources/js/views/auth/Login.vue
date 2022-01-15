<template>
    <div class="col-xl-5 col-lg-6 col-md-7">
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

            <button class="btn btn-block btn-primary" role="button" type="submit">Log in</button>

            <small>Don't have an account yet? <a href="/register">Create one</a></small>
        </form>
    </div>
</template>

<script>
	export default {
		data: () => ({
			form: new Form({
				email: null,
			}),
		}),
		methods: {
			login: () => {},
		},
	};
</script>

<style>
</style>
