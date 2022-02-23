@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Information') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>{{ __('E-Mail Address') }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Name') }}</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Furigana') }}</td>
                                <td>{{ $user->furigana }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Postal Code') }}</td>
                                <td>{{ $user->postalcode }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Address') }}</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Login ID') }}</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Introducer I D') }}</td>
                                <td>{{ $user->parent->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection