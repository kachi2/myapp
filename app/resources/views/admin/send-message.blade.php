@extends('layouts.admin', ['page_title' => 'Message Users'])
@section('content')
    <div class="body-content row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('admin.message_users') }}">
                        @csrf
                        <div class="form-group">
                            <label for="inputSubject">Subject</label>
                            <input type="text" name="subject"
                                   value="{{ old('subject') }}"
                                   class="form-control {{ form_invalid('subject') }}" id="inputSubject"
                                   placeholder="Enter message subject">
                            @showError('subject')
                        </div>

                        <div class="form-group">
                            <label for="inputMessage">Message</label>
                            <textarea name="message"
                                   class="form-control {{ form_invalid('message') }}" id="inputMessage"
                                      placeholder="Enter user name" cols="10"
                                      rows="10">{{ old('message') }}</textarea>
                            @showError('message')
                        </div>

                        <div class="form-group">
                            <label for="inputRecipients">Recipients</label>
                            <select name="recipients" id="inputRecipients" class="form-control {{ form_invalid('recipients') }}"
                                    style="border-radius: 0 !important;">

                                <option value="all" {{ old('recipients') == 'all' ? 'selected' : ''}}>All Users</option>
                                <option value="admins" {{ old('recipients') == 'admins' ? 'selected' : ''}}>All Admins</option>
                                <option value="deposited" {{ old('recipients') == 'deposited' ? 'selected' : ''}}>
                                    Deposited Users
                                </option>
                                <option
                                    value="non-deposited" {{ old('recipients') == 'non-deposited' ? 'selected' : ''}}>
                                    Non-Deposited Users
                                </option>

                            </select>
                            @showError('recipients')
                        </div>

                        <button type="submit" class="btn btn-primary">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
