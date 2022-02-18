<template>
    <div class="content-list" data-filter-list="content-list-body">
        <div class="row content-list-head">
            <div class="col-auto">
                <h3>Notes</h3>
                <button class="btn btn-round" data-toggle="modal" data-target="#note-add-modal">
                    <em class="fas fa-plus"></em>
                </button>
            </div>
            <form class="col-md-auto">
                <div class="input-group input-group-round">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <em class="fas fa-search"></em>
                        </span>
                    </div>
                    <input type="search" class="form-control filter-list-input" placeholder="Filter notes" aria-label="Filter notes">
                </div>
            </form>
        </div>

        <div class="content-list-body">
            <note-component v-for="(note, index) in notes" :note="note" v-bind:key="index"></note-component>
            <p v-if="!notes.length" class="text-center">No notes available.</p>
        </div>

        <new-note-component></new-note-component>
    </div>
</template>

<script>
	export default {
		props: {
			notes: {
				type: Array,
				default: () => [{}, {}],
			},
		},
	};
</script>

<style>
</style>
