@extends('admin.layouts.app')

@section('content')
<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard') }}">CMS</a></li>
                    {{-- <li><a href="{{ route('admin.client.client-portal') }}" class="text-gray-200 hover:text-white">Client Portfolio</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Add Client</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Add New Client</h4>
        </div>
    </div>

    <div class="glass-effect rounded-2xl shadow-2xl p-8 bg-white/10 max-w-lg mx-auto">
        <form method="POST" action="{{ route('admin.client.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            @if ($errors->any())
                <div class="bg-red-500/20 border-l-4 border-red-500 text-red-100 p-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="name" class="block text-sm font-medium text-gray-200">Client Name <span class="text-red-400">*</span></label>
                <input type="text" id="name" name="name" class="form-control w-full px-4 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="comment" class="block text-sm font-medium text-gray-200">Comment <span class="text-red-400">*</span></label>
                <textarea id="comment" name="comment" class="form-control w-full px-4 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('comment') }}</textarea>
            </div>

            <div>
                <label for="commentator_name" class="block text-sm font-medium text-gray-200">Commentator Name <span class="text-red-400">*</span></label>
                <input type="text" id="commentator_name" name="commentator_name" class="form-control w-full px-4 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('commentator_name') }}" required>
            </div>

            <div>
                <label for="position" class="block text-sm font-medium text-gray-200">Position <span class="text-red-400">*</span></label>
                <input type="text" id="position" name="position" class="form-control w-full px-4 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-black placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('position') }}" required>
            </div>

            <div>
                <label for="logo" class="block text-sm font-medium text-gray-200">Logo (Optional)</label>
                <input type="file" id="logo" name="logo" class="form-control w-full px-4 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-black">
            </div>

            <div class="mt-8"> <!-- Increased spacing under logo -->
                <div class="flex space-x-3">
                    <button type="submit" class="btn btn-success w-full">Save Client</button>
                    {{-- <a href="{{ route('admin.client.client-portal') }}" class="btn btn-secondary w-full text-center">Cancel</a> --}}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
