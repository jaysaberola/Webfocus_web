@extends('theme.main')

@section('pagecss')
    <link rel="stylesheet" href="{{ url('/theme/plugins/jssocials/jssocials.css') }}" />
    <link rel="stylesheet" href="{{ url('/theme/plugins/jssocials/jssocials-theme-flat.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
     <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/landing-2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}">
    <style>
        body {
            background: #fff;
        }

        .job-card {
            background: #fff;
            padding: 20px;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .job-title {
            color: #333;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .job-image-container {
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-height: 280px;
        }

        .job-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .job-image-container:hover img {
            transform: scale(1.05);
        }

        .section-title {
            color: #333;
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .section-title i {
            margin-right: 10px;
            color: #FF9B00;
        }

        .job-description p {
            line-height: 1.7;
            font-size: 1rem;
            color: #666;
        }

        .requirements-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .requirement-item {
            background: #eef4ff;
            border: 1px solid #e0e0e0;
            border-radius: 50px;
            padding: 8px 16px;
            font-size: 0.9rem;
            color: #666;
            display: inline-flex;
            align-items: center;
            transition: background .2s ease;
        }

        .requirement-item i {
            color: #FF9B00;
            margin-right: 6px;
            font-size: 1rem;
        }

        .requirement-item:hover {
            background: #dbe7ff;
        }

        .apply-now-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 1.5rem;
            text-decoration: none;
            transition: all .3s ease;
            background-color: #fff;
            border: 2px solid #FF9B00;
            color: #FF9B00;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .apply-now-btn:hover {
            background-color: #FF9B00;
            color: #fff;
            border-color: #FF9B00;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .modal-content {
            border-radius: 0.5rem;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: #FF9B00;
            color: #fff;
            border: none;
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .modal-footer {
            border-top: none;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            border-radius: 1.5rem;
            text-decoration: none;
            transition: all .3s ease;
            background-color: #FF9B00;
            color: #fff;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #FF9B00;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            border-radius: 1.5rem;
            text-decoration: none;
            transition: all .3s ease;
            background-color: #fff;
            border: 2px solid #e0e0e0;
            color: #333;
        }

        .btn-secondary:hover {
            background-color: #f1f3f5;
            border-color: #ccc;
        }
    </style>
@endsection

@section('content')
<div class="container py-5">
    <div class="job-card">
        <h1 class="job-title">{{ $job->name }}</h1>

        <div class="job-image-container">
            @if($job->images->first() && \Illuminate\Support\Facades\Storage::disk('public')->exists($job->images->first()->image_path))
                <img src="{{ url('/storage/' . str_replace('\\', '/', $job->images->first()->image_path)) }}" alt="{{ $job->name }}" loading="lazy">
            @else
                <img src="{{ url('/theme/images/jobs/no-image.jpg') }}" alt="No Image" loading="lazy">
            @endif
        </div>

        <div class="job-description mb-4">
            <h3 class="section-title"><i class="bi bi-info-circle"></i> Description</h3>
            <p>{!! nl2br(e($job->description)) !!}</p>
        </div>

        <div class="job-requirements mb-4">
            <h3 class="section-title"><i class="bi bi-list-check"></i> Requirements</h3>
            <div class="requirements-list">
                @if($job->requirements)
                    @foreach(explode("\n", $job->requirements) as $requirement)
                        <div class="requirement-item">
                            <i class="bi bi-check-circle"></i> {{ trim($requirement) }}
                        </div>
                    @endforeach
                @else
                    <div class="requirement-item">
                        <i class="bi bi-exclamation-circle"></i> No specific requirements listed.
                    </div>
                @endif
            </div>
        </div>

        <div class="text-center">
            <button class="apply-now-btn" data-bs-toggle="modal" data-bs-target="#applyModal">
                Apply Now <i class="bi bi-arrow-right-circle"></i>
            </button>
        </div>
    </div>
</div>

<!-- Apply Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for {{ $job->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="applyForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="bday" class="form-label">Birthday</label>
                        <input type="date" class="form-control" id="bday" name="bday" required>
                    </div>
                    <div class="mb-3">
                        <label for="resume" class="form-label">Upload Resume</label>
                        <input type="file" class="form-control" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                    </div>
                    <input type="hidden" name="job_id" value="{{ $job->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitApplication">Submit Application</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        console.log('CSRF Token from meta:', $('meta[name="csrf-token"]').attr('content'));
        console.log('CSRF Token from form:', $('#applyForm [name="_token"]').val());

        $('#submitApplication').on('click', function() {
            const $btn = $(this).prop('disabled', true).text('Submitting...');
            const formData = new FormData($('#applyForm')[0]);
            console.log('Submitting form with data:', Object.fromEntries(formData));

            $.ajax({
                url: '{{ route('jobs.apply') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || $('#applyForm [name="_token"]').val()
                },
                success: function(response) {
                    $('#applyModal').modal('hide');
                    $('#applyForm')[0].reset();
                    $btn.prop('disabled', false).text('Submit Application');
                    showSuccessModal('You successfully sent your application. Please wait for the response.');
                },
                error: function(xhr) {
                    console.log('AJAX Error', xhr.status, xhr.responseText);
                    let errorMsg = 'Failed to submit application. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMsg = Object.values(xhr.responseJSON.errors).join('\n');
                    }
                    alert(errorMsg);
                    $btn.prop('disabled', false).text('Submit Application');
                }
            });
        });

        function showSuccessModal(message) {
            if (!$('#successModal').length) {
                $('body').append(`
                    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p id="successMessage">${message}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="successOkBtn">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            } else {
                $('#successMessage').text(message);
            }

            $('#successModal').modal('show');

            $(document).off('click', '#successOkBtn').on('click', '#successOkBtn', function () {
                location.reload();
            });
        }
    });
</script>
@endsection
