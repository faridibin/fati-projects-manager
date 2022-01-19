<template>
    <div class="col-xl-8 col-lg-9">
        <div class="card">
            <div class="card-body">
                <!-- <div class="media mb-4">
                    <img alt="Image" src="assets/img/avatar-male-4.jpg" class="avatar avatar-lg" />
                    <div class="media-body ml-3">
                        <div class="custom-file custom-file-naked d-block mb-1">
                            <input type="file" class="custom-file-input d-none" id="avatar-file">
                            <label class="custom-file-label position-relative" for="avatar-file">
                            <span class="btn btn-primary">
                            Upload avatar
                            </span>
                            </label>
                        </div>
                        <small>For best results, use an image at least 256px by 256px in either .jpg or .png format</small>
                    </div>
                </div> -->
                <!--end of avatar-->
                <form>
                    <div class="form-group row align-items-center">
                        <label class="col-3">First Name</label>
                        <div class="col">
                            <input type="text" placeholder="First name" value="David" name="profile-first-name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">Last Name</label>
                        <div class="col">
                            <input type="text" placeholder="First name" value="Whittaker" name="profile-last-name" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">Email</label>
                        <div class="col">
                            <input type="email" placeholder="Enter your email address" name="profile-email" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">Location</label>
                        <div class="col">
                            <input type="text" placeholder="Enter your location" name="profile-location" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Bio</label>
                        <div class="col">
                            <textarea placeholder="Tell us a little about yourself" class="form-control" rows="5"></textarea>
                            <small>This will be displayed on your public profile</small>
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
	export default {};
</script>

<style>
</style>
