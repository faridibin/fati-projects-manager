<template>
    <form class="modal" id="note-add-modal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">New Note</h5>
                        <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                      </div>
                      <!--end of modal head-->
                      <div class="modal-body">
                        <div class="form-group row align-items-center">
                          <label class="col-3">Title</label>
                          <input class="form-control col" type="text" placeholder="Note title" name="note-name" />
                        </div>
                        <div class="form-group row">
                          <label class="col-3">Text</label>
                          <textarea class="form-control col" rows="6" placeholder="Body text for note" name="note-description"></textarea>
                        </div>
                      </div>
                      <!--end of modal body-->
                      <div class="modal-footer">
                        <button role="button" class="btn btn-primary" type="submit">
                          Create Note
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
</template>

<script>
	export default {};
</script>

<style>
</style>
