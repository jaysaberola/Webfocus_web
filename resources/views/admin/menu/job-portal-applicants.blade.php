@extends('admin.layouts.app')

@section('pagetitle')
    Applicants for {{ $jobPortal->name }}
@endsection

@section('pagecss')
    <link href="{{ asset('lib/bselect/dist/css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <style>
        .table-responsive-lg {
            margin-bottom: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .table td {
            word-wrap: break-word;
        }
        .resume-link a {
            color: #007bff;
            text-decoration: none;
        }
        .resume-link a:hover {
            text-decoration: underline;
        }
        .resume-link .error {
            color: #dc3545;
            font-style: italic;
        }
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
        .pagination .page-link {
            border-radius: 50%;
            margin: 0 5px;
            color: #007bff;
            border: 1px solid #007bff;
            padding: 8px 14px;
            transition: all 0.3s ease;
        }
        .pagination .page-link:hover {
            background: #007bff;
            color: #fff;
            border-color: #007bff;
        }
        .pagination .page-item.active .page-link {
            background: #007bff;
            color: #fff;
            border-color: #007bff;
        }
        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            border-color: #ced4da;
        }
    </style>
@endsection

@section('content')
<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">CMS</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('menus.index') }}">Menu</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('menus.job-portal') }}">Job Portal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Applicants for {{ $jobPortal->name }}</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Applicants List</h4>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="table-responsive-lg">
                <table class="table mg-b-0 table-light table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Job ID</th>
                            <th>Full Name</th>
                            <th>Birthday</th>
                            <th>Resume</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applicants as $applicant)
                            <tr>
                                <td>{{ $applicant->id }}</td>
                                <td>{{ $applicant->job_id }}</td>
                                <td>{{ $applicant->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($applicant->bday)->format('M d, Y') }}</td>
                                <td class="resume-link">
                                    @php
                                        $fileExists = $applicant->resume_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($applicant->resume_path);
                                        \Illuminate\Support\Facades\Log::debug('Resume File Check', [
                                            'applicant_id' => $applicant->id,
                                            'resume_path' => $applicant->resume_path,
                                            'file_exists' => $fileExists,
                                            'full_path' => storage_path('app/public/' . $applicant->resume_path),
                                            'url' => $applicant->resume_path ? asset('storage/' . $applicant->resume_path) : 'N/A'
                                        ]);
                                    @endphp
                                    @if($fileExists)
                                        <a href="{{ route('download.resume', $applicant->resume_path) }}" target="_blank">Download Resume</a>
                                    @else
                                        <span class="error">No Resume (File Missing)</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($applicant->created_at)->format('M d, Y H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($applicant->updated_at)->format('M d, Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No applicants found for this job.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                {{ $applicants->links('theme.layouts.pagination') }}
            </div>
        </div>
    </div>
</div>
@endsection
