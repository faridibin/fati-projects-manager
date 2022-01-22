<template>
    <div class="col-xl-8 col-lg-9">
        <div v-if="form.successful" class="alert alert-success" role="alert">
            Your profile has been updated.
        </div>
        <div class="card">
            <div class="card-body">
                <profile-avatar-component></profile-avatar-component>

                <form @submit.prevent="save" @keydown="form.onKeydown($event)">
                    <div class="form-group row align-items-center">
                        <label class="col-3">First Name</label>
                        <div class="col">
                            <input v-model="form.first_name" type="text" placeholder="First name" class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }"/>
                            <has-error :form="form" field="first_name"/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">Last Name</label>
                        <div class="col">
                            <input v-model="form.last_name" type="text" placeholder="First name" class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }"/>
                            <has-error :form="form" field="last_name"/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">Email</label>
                        <div class="col">
                            <input v-model="form.email" type="email" placeholder="Enter your email address" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }"/>
                            <has-error :form="form" field="email"/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">Location</label>
                        <div class="col">
                            <input v-model="form.location" type="text" placeholder="Enter your location" class="form-control" :class="{ 'is-invalid': form.errors.has('location') }"/>
                            <has-error :form="form" field="location"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Bio</label>
                        <div class="col">
                            <textarea v-model="form.bio" placeholder="Tell us a little about yourself" class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }" rows="5"></textarea>
                            <has-error :form="form" field="bio"/>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button-component>Save</button-component>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
	import { mapGetters, mapActions } from "vuex";

	export default {
		mounted() {
			this.setData(this.user);
		},
		data: () => ({
			form: new Form({
				bio: null,
				email: null,
				first_name: null,
				last_name: null,
				location: null,
				name: null,
			}),
		}),
		computed: {
			...mapGetters({
				user: "user/user",
			}),
		},
		watch: {
			user(data) {
				this.setData(data);
			},
		},
		methods: {
			...mapActions({
				attemptUpdateUser: "user/attemptUpdateUser",
			}),
			setData(data) {
				this.form.update(data);
			},
			save() {
				this.attemptUpdateUser(this.form).then(() => this.form.reset());
			},
		},
	};
</script>

<style>
</style>
