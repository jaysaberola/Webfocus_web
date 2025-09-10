@extends('admin.layouts.app')

@section('content')
<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('dashboard') }}">CMS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Client Portfolio</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Client Portfolio</h4>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-600/90 text-white p-4 rounded-lg shadow-lg mb-6 flex items-center" id="toast_success">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-500/20 border-l-4 border-red-500 text-red-100 p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="glass-effect rounded-2xl shadow-2xl p-8 bg-white/10">
        <div class="overflow-x-auto">
            <table class="table w-full text-left text-gray-200">
                <thead class="bg-white/10">
                    <tr>
                        <th class="px-2 py-2">Logo</th> <!-- Reduced padding in Logo column -->
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Comment</th>
                        <th class="px-4 py-2">Commentator</th>
                        <th class="px-4 py-2">Position</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clients as $client)
                        <tr class="border-b border-gray-400/30">
                            <td class="px-2 py-2"> <!-- Reduced padding in Logo column -->
                                @if($client->logo_path)
                                    <img src="{{ asset('storage/' . $client->logo_path) }}" alt="{{ $client->name }}"
                                         alt="Image"
                                         width="100"
                                         class="zoomable-image"
                                         style="cursor: pointer;">
                                @else
                                    <span>No Logo</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $client->name }}</td>
                            <td class="px-4 py-2">{{ Str::limit($client->comment, 50) }}</td>
                            <td class="px-4 py-2">{{ $client->commentator_name }}</td>
                            <td class="px-4 py-2">{{ $client->position }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('admin.client.client-edit', $client->id) }}" class="btn">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('admin.client.destroy', $client->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this client?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center">No clients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.client.client-create') }}" class="btn btn-success mt-4">Add New Client</a>
    </div>
</div>

<script>
    setTimeout(() => {
        const toast = document.getElementById('toast_success');
        if (toast) toast.style.display = 'none';
    }, 3000);
</script>
@endsection
