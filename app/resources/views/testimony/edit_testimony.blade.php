@extends('layouts.app', ['page_title' =>  'Edit Testimony: ' . $testimony->id])
@section('content')
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

                                <button type="submit" class="btn btn-primary">Edit Testimony</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
