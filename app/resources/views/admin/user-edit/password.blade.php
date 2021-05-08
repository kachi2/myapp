@extends('admin.user-edit.base', ['page_title' => 'Update User Password'])
@section('form')
    <form method="post" action="#">
        @csrf

        <div class="form-group">
            <label for="inputNewPassword">New Password</label>
            <input type="password" name="password"
                   value="{{ old('password') }}"
                   class="form-control {{ form_invalid('password') }}" id="inputNewPassword" placeholder="Enter new password">
            @showError('password')
        </div>

        <div class="form-group">
            <label for="inputRepeatPassword">Repeat Password</label>
            <input type="password" name="password_confirmation"
                   value="{{ old('password_confirmation') }}"
                   class="form-control {{ form_invalid('password_confirmation') }}" id="inputRepeatPassword" placeholder="Confirm password">
            @showError('password_confirmation')
        </div>

        <button type="submit" class="btn btn-primary">Update password</button>
    </form>
@endsection
