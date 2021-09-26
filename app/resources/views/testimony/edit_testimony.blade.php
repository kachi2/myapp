@extends('layouts.app')
@section('content')
      <div class="nk-content nk-content-fluid">
                     <div class="nk-content-body">
                            <div class="nk-block-head">
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title fw-normal">Testimony</h5>
                                        
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools gx-3">
                                            <li class="order-md-last">
                                                 <a href="{{ route('testimonies.add') }}" class="btn btn-primary"><i
                                    class='uil uil-plus mr-1'></i>Submit New Testimony</a>
                       
                                            </li>
                                       </ul>
                                    </div>
                                </div>
                            </div>
    <div class="body-content row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" action="{{ route('testimonies.edit', ['id' => $testimony->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="inputMessage">Message</label>
                                    <textarea
                                        type="text" name="message"
                                        class="form-control {{ form_invalid('message') }}"
                                        id="inputMessage"
                                        aria-describedby="messageHelp"
                                        placeholder="Enter message"
                                        rows="6"
                                        cols="6"
                                    > {{ old('message', $testimony->message) }} </textarea>
                                    <small id="messageHelp" class="form-text text-muted">
                                        Enter your Testimony
                                    </small>
                                    @showError('message')
                                </div>

                                <button type="submit" class="btn btn-primary">Update Testimony</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     </div>
    </div>
@endsection
@section('scripts')


<script>

let message = {!! json_encode(Session::get('message')) !!};
let msg = {!! json_encode(Session::get('alert')) !!};

//alert(msg);
if(message != null){
toastr.clear();
    NioApp.Toast(message , msg, {
      position: 'top-right',
        timeOut: 5000,
    });
}

</script>


@endsection