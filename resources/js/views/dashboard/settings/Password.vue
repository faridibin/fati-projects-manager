<template>
    <div class="col-xl-8 col-lg-9">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group row align-items-center">
                        <label class="col-3">Current Password</label>
                        <div class="col">
                            <input type="password" placeholder="Enter your current password" name="password-current" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">New Password</label>
                        <div class="col">
                            <input type="password" placeholder="Enter a new password" name="password-new" class="form-control" />
                            <small>Password must be at least 8 characters long</small>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-3">Confirm Password</label>
                        <div class="col">
                            <input type="password" placeholder="Confirm your new password" name="password-new-confirm" class="form-control" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Change Password</button>
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
