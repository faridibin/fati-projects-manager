<template>
    <div class="media mb-2">
        <avatar-component :alt="'avatar'" :src="avatar" :size="'large'"></avatar-component>

        <form enctype="multipart/form-data" class="media-body ml-3">
            <div class="custom-file custom-file-naked d-block mb-1">
                <input  accept="image/*" @change="save" type="file" class="custom-file-input d-none" id="avatar-file">
                <label class="custom-file-label position-relative" for="avatar-file">
                    <span class="btn btn-primary shadow-sm">Change Avatar</span>

                </label>
            </div>
            <small v-if="form.success" class="text-success d-block">Your avatar has been updated.</small>
            <small>For best results, use an image at least 256px by 256px in either .jpg or .png format</small>
        </form>
    </div>
</template>

<script>
	import { mapGetters, mapActions } from "vuex";

	export default {
		data: () => ({
			form: new Form({
				file: null,
			}),
		}),
		computed: {
			...mapGetters({
				avatar: "user/avatar",
			}),
		},
		methods: {
			...mapActions({
				attemptUpdateAvatar: "user/attemptUpdateAvatar",
			}),
			save(event) {
				const { 0: file } = event.target.files;

				if (file) {
					const reader = new FileReader();

					reader.addEventListener("load", () => {
						this.$refs.avatar.src = reader.result;

						this.form.file = file;

						this.attemptUpdateAvatar(this.form);
					});

					reader.readAsDataURL(file);
				}
			},
		},
	};
</script>

<style>
</style>
