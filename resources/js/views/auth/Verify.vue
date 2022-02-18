<template>
    <div class="col-xl-6 col-lg-5 col-md-7">
        <div v-if="form.successful" class="alert alert-success" role="alert">
            A fresh verification link has been sent to your email address.
        </div>

        <div class="card">
            <form class="card-body" @submit.prevent="verify" @keydown="form.onKeydown($event)">
                <h5 class="card-title">Verify Your Email Address</h5>

                <p class="card-text">
                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email click <a href="/email/verify" @click.prevent="verify">here</a> to request another.
                </p>
            </form>
        </div>
    </div>
</template>

<script>
	import { mapActions } from "vuex";

	export default {
		data: () => ({
			form: new Form({}),
		}),
		methods: {
			...mapActions({
				attemptVerification: "auth/attemptVerification",
			}),
			verify() {
				this.attemptVerification(this.form);
			},
		},
	};
</script>

<style>
</style>
