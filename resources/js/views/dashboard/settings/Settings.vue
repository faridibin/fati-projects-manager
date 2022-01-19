<template>
    <div class="row">
        <div class="col-lg-3 mb-3">
            <ul class="nav nav-tabs flex-lg-column" role="tablist">
                <li class="nav-item">
                    <router-link :to="{ name: 'settings.profile'}" class="nav-link">Your Profile</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'settings.password'}" class="nav-link">Password</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'settings.notifications'}" class="nav-link">Notifications</router-link>
                </li>
            </ul>
        </div>

        <router-view></router-view>
    </div>
</template>

<style lang="scss" scoped>
	.nav-tabs {
		@media screen and (max-width: 768px) {
			border-radius: 0;
		}
	}
</style>
