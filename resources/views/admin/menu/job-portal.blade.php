@extends('admin.layouts.app')

@section('pagetitle')
    Job Portal Management
@endsection

@section('pagecss')
    <link href="{{ asset('lib/bselect/dist/css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .row-selected {
            background-color: #92b7da !important;
        }
        #currentImage img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            margin-top: 10px;
        }
        .action-icon {
            font-size: 1rem;
            color: #000;
            text-decoration: none;
            margin-right: 10px;
            transition: color 0.3s ease;
        }
        .action-icon:hover {
            color: #007bff;
        }
        .action-icon i {
            background: none !important;
            border: none !important;
            padding: 0 !important;
        }
    </style>
@endsection

@section('content')
<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">CMS</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('menus.index')}}">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Job Portal List</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Record List</h4>
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
            <div class="d-md-flex bd-highlight mg-b-10">
                <div class="bd-highlight mg-r-10 mg-t-10">
                    <div class="dropdown d-inline mg-r-5">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('common.filters')}}
                        </button>
                        <div class="dropdown-menu">
                            <form id="filterForm" class="pd-20">
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1">{{__('common.sort_by')}}</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="orderBy1" name="orderBy" class="custom-control-input" value="updated_at" @if (isset($filter) && $filter->orderBy == 'updated_at') checked @endif>
                                        <label class="custom-control-label" for="orderBy1">{{__('common.date_modified')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="orderBy2" name="orderBy" class="custom-control-input" value="name" @if (isset($filter) && $filter->orderBy == 'name') checked @endif>
                                        <label class="custom-control-label" for="orderBy2">{{__('common.name')}}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1">{{__('common.sort_order')}}</label>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sortByAsc" name="sortBy" class="custom-control-input" value="asc" @if (isset($filter) && $filter->sortBy == 'asc') checked @endif>
                                        <label class="custom-control-label" for="sortByAsc">{{__('common.ascending')}}</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="sortByDesc" name="sortBy" class="custom-control-input" value="desc" @if (isset($filter) && $filter->sortBy == 'desc') checked @endif>
                                        <label class="custom-control-label" for="sortByDesc">{{__('common.descending')}}</label>
                                    </div>
                                </div>
                                <div class="form-group mg-b-40">
                                    <label class="d-block">{{__('common.item_displayed')}}</label>
                                    <input id="displaySize" type="text" class="js-range-slider" name="perPage" value="{{ isset($filter) ? $filter->perPage : 10 }}"/>
                                </div>
                                <button id="filter" type="button" class="btn btn-sm btn-primary">{{__('common.apply_filters')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="ml-auto bd-highlight mg-t-10 mg-r-10">
                    <form class="form-inline" id="searchForm">
                        <div class="search-form mg-r-10">
                            <input name="search" type="search" id="search" class="form-control" placeholder="Search by Name" value="{{ isset($filter) ? $filter->search : '' }}">
                            <button class="btn filter" id="btnSearch" type="submit"><i data-feather="search" class="feather-icon"></i></button>
                        </div>
                        <a class="btn btn-success btn-sm mg-b-5 mt-lg-0 mt-md-0 mt-sm-0 mt-1" href="javascript:void(0)" data-toggle="modal" data-target="#advanceSearchModal">{{__('common.advance_search')}}</a>
                    </form>
                </div>
                <div class="mg-t-10">
                    <a href="#" class="btn btn-primary btn-sm mg-b-20" data-toggle="modal" data-target="#createJobPortalModal">Create Job Portal</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card card-body">
                <div class="table-list mg-b-10">
                    @include('admin.menu.job-portal-table')
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.menu.job-portal-modal')
@include('admin.menu.job-portal-edit-modal')

<!-- Delete Confirmation Modal -->
<div class="modal effect-scale" id="prompt-delete-job-portal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{__('common.delete_confirmation_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete "<span id="delete-job-portal-name"></span>"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('common.cancel')}}</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteJobPortalBtn">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
<script src="{{ asset('lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<script>
$(document).ready(function() {
    var listingUrl = '{{ route('menus.job-portal') }}';

    // Initialize range slider
    $("#displaySize").ionRangeSlider({
        min: 10,
        max: 100,
        step: 10,
        grid: true
    });

    // Initialize Feather icons for non-table elements
    feather.replace({ 'class': 'feather-icon' });

    // Create job portal
    $('#saveJobPortalBtn').on('click', function() {
        let $btn = $(this).prop('disabled', true).text('Saving...');
        let formData = new FormData($('#createJobPortalForm')[0]);

        $.ajax({
            url: '{{ route('job-portals.store') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#createJobPortalModal').modal('hide');
                    $('#createJobPortalForm')[0].reset();
                    $('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        'Job portal created successfully.' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span></button></div>')
                        .insertBefore('.row.row-sm')
                        .delay(3000).fadeOut(500, function() { $(this).remove(); });
                    $('.table-list').load(listingUrl + ' .table-list > *', {
                        orderBy: $('input[name="orderBy"]:checked').val(),
                        sortBy: $('input[name="sortBy"]:checked').val(),
                        perPage: $('#displaySize').val(),
                        search: $('#search').val(),
                        _token: '{{ csrf_token() }}'
                    });
                } else {
                    $('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        'Failed to create job portal: ' + (response.message || 'Invalid response.') +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span></button></div>')
                        .insertBefore('.row.row-sm');
                }
            },
            error: function(xhr) {
                let errorMsg = 'Failed to create job portal.';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMsg = Object.values(xhr.responseJSON.errors).join('<br>');
                }
                $('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    errorMsg +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span></button></div>')
                    .insertBefore('.row.row-sm');
            },
            complete: function() {
                $btn.prop('disabled', false).text('{{__('job_portal.save')}}');
            }
        });
    });

    // Edit job portal
    $('.table-list').on('click', '.edit-job-portal-btn', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let name = $(this).data('name');
        let description = $(this).data('description');
        let requirements = $(this).data('requirements');
        let jobs_image = $(this).data('jobs_image');

        $('#editJobPortalId').val(id);
        $('#editJobName').val(name);
        $('#editJobDescription').val(description);
        $('#editJobRequirements').val(requirements);
        $('#currentImage').html(jobs_image ? `<img src="${jobs_image}" alt="Current Image">` : 'No image uploaded');
        $('#editJobPortalModal').modal('show');
    });

    $('#updateJobPortalBtn').on('click', function() {
        let $btn = $(this).prop('disabled', true).text('Saving...');
        let formData = new FormData($('#editJobPortalForm')[0]);

        $.ajax({
            url: '{{ route('job-portals.update') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $('#editJobPortalModal').modal('hide');
                    $('#editJobPortalForm')[0].reset();
                    $('#currentImage').html('');
                    $('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        'Job portal updated successfully.' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span></button></div>')
                        .insertBefore('.row.row-sm')
                        .delay(3000).fadeOut(500, function() { $(this).remove(); });
                    $('.table-list').load(listingUrl + ' .table-list > *', {
                        orderBy: $('input[name="orderBy"]:checked').val(),
                        sortBy: $('input[name="sortBy"]:checked').val(),
                        perPage: $('#displaySize').val(),
                        search: $('#search').val(),
                        _token: '{{ csrf_token() }}'
                    });
                } else {
                    $('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        'Failed to update job portal: ' + (response.message || 'Invalid response.') +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span></button></div>')
                        .insertBefore('.row.row-sm');
                }
            },
            error: function(xhr) {
                let errorMsg = 'Failed to update job portal.';
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMsg = Object.values(xhr.responseJSON.errors).join('<br>');
                }
                $('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                    errorMsg +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span></button></div>')
                    .insertBefore('.row.row-sm');
            },
            complete: function() {
                $btn.prop('disabled', false).text('{{__('job_portal.save')}}');
            }
        });
    });

    // Delete job portal
    $('.table-list').on('click', '.delete-job-portal-icon', function(e) {
        e.preventDefault();
        let aid = $(this).data('id');
        let name = $(this).data('name');
        $('#delete-job-portal-name').text(name);
        $('#prompt-delete-job-portal').modal('show');
        $('#confirmDeleteJobPortalBtn').data('id', aid);
    });

    $('#confirmDeleteJobPortalBtn').on('click', function() {
        let aid = $(this).data('id');
        let $btn = $(this).prop('disabled', true).html('Deleting...');
        let $form = $('#jobPortalForm' + aid);

        if ($form.length) {
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        $('#prompt-delete-job-portal').modal('hide');
                        $('#row' + aid).remove();
                        $('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                            'Job portal deleted successfully.' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span></button></div>')
                            .insertBefore('.row.row-sm')
                            .delay(3000).fadeOut(500, function() { $(this).remove(); });
                        $('.table-list').load(listingUrl + ' .table-list > *', {
                            orderBy: $('input[name="orderBy"]:checked').val(),
                            sortBy: $('input[name="sortBy"]:checked').val(),
                            perPage: $('#displaySize').val(),
                            search: $('#search').val(),
                            _token: '{{ csrf_token() }}'
                        });
                    } else {
                        $('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            'Failed to delete job portal: ' + (response.message || 'Invalid response.') +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span></button></div>')
                            .insertBefore('.row.row-sm');
                    }
                },
                error: function(xhr) {
                    $('#prompt-delete-job-portal').modal('hide');
                    $('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        'Failed to delete job portal: ' + (xhr.responseJSON?.message || 'An error occurred.') +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span></button></div>')
                        .insertBefore('.row.row-sm');
                },
                complete: function() {
                    $btn.prop('disabled', false).html('Yes, Delete');
                }
            });
        } else {
            console.error('Form not found for ID: ' + aid);
            alert('Error: Delete form not found.');
            $('#prompt-delete-job-portal').modal('hide');
            $btn.prop('disabled', false).html('Yes, Delete');
        }
    });

    // Filter function
    $('#filter').on('click', function(e) {
        e.preventDefault();
        let orderBy = $('input[name="orderBy"]:checked').val();
        let sortBy = $('input[name="sortBy"]:checked').val();
        let perPage = $('#displaySize').val();
        let search = $('#search').val();

        $('.table-list').html('<div class="text-center p-5">Loading...</div>');

        $.ajax({
            url: listingUrl,
            type: 'GET',
            data: {
                orderBy: orderBy,
                sortBy: sortBy,
                perPage: perPage,
                search: search,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response && response.success && response.html) {
                    $('.table-list').html(response.html);
                } else {
                    $('.table-list').html('<div class="text-center p-5">Error: Invalid response format</div>');
                    console.error('Invalid response:', response);
                }
            },
            error: function(xhr) {
                $('.table-list').html('<div class="text-center p-5">Error applying filters. Please try again.</div>');
                console.error('Filter error:', xhr.responseText);
            }
        });
    });

    // Simple search
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        let search = $('#search').val();
        let orderBy = $('input[name="orderBy"]:checked').val();
        let sortBy = $('input[name="sortBy"]:checked').val();
        let perPage = $('#displaySize').val();

        $('.table-list').html('<div class="text-center p-5">Loading...</div>');

        $.ajax({
            url: listingUrl,
            type: 'GET',
            data: {
                search: search,
                orderBy: orderBy,
                sortBy: sortBy,
                perPage: perPage,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response && response.success && response.html) {
                    $('.table-list').html(response.html);
                } else {
                    $('.table-list').html('<div class="text-center p-5">Error: Invalid response format</div>');
                    console.error('Invalid response:', response);
                }
            },
            error: function(xhr) {
                $('.table-list').html('<div class="text-center p-5">Error searching. Please try again.</div>');
                console.error('Search error:', xhr.responseText);
            }
        });
    });

    // Handle pagination clicks
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        $('.table-list').html('<div class="text-center p-5">Loading...</div>');
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response && response.success && response.html) {
                    $('.table-list').html(response.html);
                } else {
                    $('.table-list').html('<div class="text-center p-5">Error: Invalid response format</div>');
                }
            },
            error: function(xhr) {
                $('.table-list').html('<div class="text-center p-5">Error loading page. Please try again.</div>');
                console.error('Pagination error:', xhr.responseText);
            }
        });
    });

    // Clear forms when modals are hidden
    $('#createJobPortalModal').on('hidden.bs.modal', function() {
        $('#createJobPortalForm')[0].reset();
    });

    $('#editJobPortalModal').on('hidden.bs.modal', function() {
        $('#editJobPortalForm')[0].reset();
        $('#editJobPortalId').val('');
        $('#currentImage').html('');
    });
});
</script>
@endsection
