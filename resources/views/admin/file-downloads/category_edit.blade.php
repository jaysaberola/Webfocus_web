@extends('admin.layouts.app')


@section('pagecss')
    <link href="{{ asset('lib/bselect/dist/css/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">CMS</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('product-categories.index')}}">File Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit File Category</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Update File Category</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('file-categories.update', $fileDownloadCategory->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="d-block">Name *</label>
                        <input type="hidden" name="id" value="{{$fileDownloadCategory->id}}">
                        <input type="text" name="title" id="title" value="{{ old('title',$fileDownloadCategory->title)}}" class="form-control @error('title') is-invalid @enderror" maxlength="150" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <small id="category_slug"></small>
                    </div>

                    <div class="form-group">
                        <label class="d-block">Type *</label>
                        <select id="parentPage" class="selectpicker mg-b-5 @error('type') is-invalid @enderror" name="type" data-style="btn btn-outline-light btn-md btn-block tx-left" title="- None -" data-width="100%" required>
                            <option value="" selected>Choose One</option>
                            <option @if($fileDownloadCategory->type == 0) selected @endif value="0">Department</option>
                            <option @if($fileDownloadCategory->type == 1) selected @endif value="1">Document</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="d-block">Status</label>
                        <div class="custom-control custom-switch @error('status') is-invalid @enderror">
                            <input type="checkbox" class="custom-control-input" name="status" {{ ($fileDownloadCategory->status == 'Active' ? "checked":"") }} id="customSwitch1">
                            <label class="custom-control-label" id="label_status" for="customSwitch1">{{$fileDownloadCategory->status}}</label>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-sm btn-uppercase" type="submit">Update Category</button>
                    <a class="btn btn-outline-secondary btn-sm btn-uppercase" href="{{ route('file-categories.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
    <script src="{{ asset('lib/bselect/dist/js/bootstrap-select.js') }}"></script>
@endsection

@section('customjs')
    <script>
        $(function() {
            $('.selectpicker').selectpicker();
        });

        $("#customSwitch1").change(function() {
            if(this.checked) {
                $('#label_status').html('Active');
            }
            else{
                $('#label_status').html('Inactive');
            }
        });
    </script>
@endsection
