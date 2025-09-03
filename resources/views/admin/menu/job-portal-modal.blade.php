<!-- Create Job Portal Modal -->
<div class="modal fade" id="createJobPortalModal" tabindex="-1" role="dialog" aria-labelledby="createJobPortalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createJobPortalModalLabel">{{__('job_portal.create_job_portal')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createJobPortalForm" method="POST" action="{{ route('job-portals.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jobName">{{__('job_portal.name')}}</label>
                        <input type="text" class="form-control" id="jobName" name="name" placeholder="{{__('job_portal.enter_job_name')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="jobDescription">{{__('job_portal.description')}}</label>
                        <textarea class="form-control" id="jobDescription" name="description" rows="3" placeholder="{{__('job_portal.enter_job_description')}}" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jobRequirements">{{__('job_portal.requirements')}}</label>
                        <textarea class="form-control" id="jobRequirements" name="requirements" rows="3" placeholder="{{__('job_portal.enter_job_requirements')}}" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jobsImage">{{__('job_portal.jobs_image')}}</label>
                        <input type="file" class="form-control" id="jobsImage" name="jobs_image" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('job_portal.cancel')}}</button>
                    <button type="button" class="btn btn-primary" id="saveJobPortalBtn">{{__('job_portal.save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
