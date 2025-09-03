<table class="table mg-b-0 table-light table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Requirements</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($jobPortals as $jobPortal)
            <tr id="row{{ $jobPortal->id }}">
                <td>{{ $jobPortal->id }}</td>
                <td>{{ $jobPortal->name }}</td>
                <td>{{ Str::limit($jobPortal->description, 50) }}</td>
                <td>{{ Str::limit($jobPortal->requirements, 50) }}</td>
                <td>
                    @if($jobPortal->images->first())
                        <img src="{{ asset('storage/' . $jobPortal->images->first()->image_path) }}"
                             alt="Image"
                             width="100"
                             class="zoomable-image"
                             style="cursor: pointer;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <a href="{{ route('job-portals.applicants', $jobPortal->id) }}" class="action-icon" title="View Applicants">
                        <i class="bi bi-people small-icon"></i>
                    </a>
                    <a href="#" class="action-icon edit-job-portal-btn"
                       data-id="{{ $jobPortal->id }}"
                       data-name="{{ $jobPortal->name }}"
                       data-description="{{ $jobPortal->description }}"
                       data-requirements="{{ $jobPortal->requirements }}"
                       data-jobs_image="{{ $jobPortal->images->first() ? asset('storage/' . $jobPortal->images->first()->image_path) : '' }}"
                       title="Edit">
                        <i class="bi bi-pencil small-icon"></i>
                    </a>
                    <a href="#" class="action-icon delete-job-portal-icon"
                       data-id="{{ $jobPortal->id }}"
                       data-name="{{ $jobPortal->name }}"
                       title="Delete">
                        <i class="bi bi-trash small-icon"></i>
                    </a>
                    <form id="jobPortalForm{{ $jobPortal->id }}" action="{{ route('job-portals.destroy', $jobPortal->id) }}" method="POST" style="display:none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @include('admin.menu.job-portal-edit-modal', ['jobPortal' => $jobPortal])
        @empty
            <tr>
                <td colspan="6" class="text-center">No jobs found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="pagination">
    {{ $jobPortals->links('theme.layouts.pagination') }}
</div>

<!-- Image Zoom Modal -->
<div id="imageZoomModal" class="zoom-modal">
    <span class="close-zoom">&times;</span>
    <img class="zoom-modal-content" id="zoomedImage">
    <div id="zoomCaption"></div>
</div>

<style>
    .small-icon {
        font-size: 1rem;
        width: 16px;
        height: 16px;
    }

    /* Zoom Modal Styles */
    .zoom-modal {
        display: none;
        position: fixed;
        z-index: 1050;
        padding-top: 60px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.9);
        animation: fadeIn 0.3s ease-in-out;
    }

    .zoom-modal-content {
        margin: auto;
        display: block;
        max-width: 90%;
        max-height: 80vh;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(255,255,255,0.3);
        animation: zoomIn 0.3s ease-in-out;
    }

    #zoomCaption {
        margin: auto;
        display: block;
        width: 80%;
        text-align: center;
        color: #ccc;
        padding: 10px;
        font-size: 14px;
    }

    .close-zoom {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #fff;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .close-zoom:hover {
        color: #ff4444;
    }

    @keyframes zoomIn {
        from {transform: scale(0.7);}
        to {transform: scale(1);}
    }

    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById("imageZoomModal");
        const modalImg = document.getElementById("zoomedImage");
        const captionText = document.getElementById("zoomCaption");
        const closeBtn = document.getElementsByClassName("close-zoom")[0];

        document.querySelectorAll('.zoomable-image').forEach(img => {
            img.addEventListener('click', function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt || 'Job Image';
            });
        });

        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        modal.onclick = function(e) {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        }
    });
</script>
