@extends('theme.main')

@section('pagecss')
@endsection

@section('content')
<div class="container my-6">
    <div class="row">
        <div class="col-12">
            @if(session()->has('success'))
                <div class="style-msg successmsg">
                    <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> {{ session()->get('success') }}</div>
                </div>
            @endif

            <div class="fancy-title title-bottom-border">
                <h3>{{$career->name}}</h3>
            </div>

            {!!$career->contents!!} 
            <!-- Centered modal -->
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target=".bs-example-modal-centered">Apply Now</button>

            <div class="modal fade bs-example-modal-centered" tabindex="-1" role="dialog" aria-labelledby="centerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">{{$career->name}}</h4>
                            <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <form method="post" action="{{ route('careers.front.apply') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">                                        
                                <div class="form-group">
                                    <input type="hidden" name="career_id" value="{{$career->id}}">
                                    <label for="exampleInputName">Name <span class="text-danger">*</span></label>
                                    <input type="name" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter name" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputName">Contact <span class="text-danger">*</span></label>
                                    <input type="text" name="contact" class="form-control" id="exampleInputContact" aria-describedby="contactHelp" placeholder="09XXXXXXXXX" required maxlength="11" onkeypress="return /[0-9]/i.test(event.key)">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label>Send your Resume <span class="text-danger">*</span></label><br>
                                    <input id="input-1" type="file" name="resume" class="file" data-show-preview="false" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('pagejs')
@endsection
