@isset($jobPortal)
    <div class="modal fade" id="editJobPortalModal" tabindex="-1" role="dialog" aria-labelledby="editJobPortalModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJobPortalModalLabel">Edit Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editJobPortalForm" action="{{ route('job-portals.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="editJobPortalId">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editJobName">Job Title</label>
                            <input type="text" class="form-control" id="editJobName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="editJobDescription">Description</label>
                            <textarea class="form-control" id="editJobDescription" name="description" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editJobRequirements">Requirements</label>
                            <textarea class="form-control" id="editJobRequirements" name="requirements" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editJobImage">Job Image</label>
                            <input type="file" class="form-control-file" id="editJobImage" name="jobs_image" accept="image/*">
                            <div id="currentImage"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="updateJobPortalBtn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
    @php
        \Illuminate\Support\Facades\Log::error('job-portal-edit-modal: $jobPortal is undefined');
    @endphp
@endisset