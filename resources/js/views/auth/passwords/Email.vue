<template>
    <div class="col-xl-5 col-lg-6 col-md-7">
        <h1 class="h2">Forgot password &#x1f62B;</h1>
        <p class="lead">Enter your email address to reset</p>

        <form @submit.prevent="email" @keydown="form.onKeydown($event)">
            <div class="form-group">
                <input v-model="form.email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" type="email" placeholder="Email Address"/>
                <has-error :form="form" field="email"/>
            </div>

            <button class="btn btn-block btn-primary" role="button" type="submit">Send reset link</button>

            <small>Back to <a href="/login">Login</a></small>
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
			email: () => {},
		},
	};
</script>

<style>
</style>
