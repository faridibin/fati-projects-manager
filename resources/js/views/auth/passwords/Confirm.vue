<template>
    <div class="col-lg-5 col-md-7">
        <h1 class="h2">Confirm Password &#x1F510;</h1>

        <form @submit.prevent="confirm" @keydown="form.onKeydown($event)">
            <div class="form-group">
                <input v-model="form.password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" type="password" placeholder="Password" autocomplete="current-password"/>
                <has-error :form="form" field="password"/>
            </div>

            <button-component :is-block="true">Confirm Password</button-component>

            <small>Note: We won’t ask for your password again for a few hours. <a href="/password/reset">Forgot password?</a></small>
        </form>
    </div>
</template>

<script>
	import { mapActions } from "vuex";

	export default {
		data: () => ({
			form: new Form({
				password: null,
			}),
		}),
		methods: {
			...mapActions({
				attemptConfirmPassword: "auth/attemptConfirmPassword",
			}),
			confirm() {
				this.form.update({
					intended: this.intended,
				});

				this.attemptConfirmPassword(this.form);
			},
		},
		props: {
			intended: { type: String, default: "/app/dashboard" },
		},
	};
</script>

<style>
</style>
