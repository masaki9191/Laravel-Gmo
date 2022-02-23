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
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Name') }}</td>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Furigana') }}</td>
                                <td>{{ auth()->user()->furigana }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Postal Code') }}</td>
                                <td>{{ auth()->user()->postalcode }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Address') }}</td>
                                <td>{{ auth()->user()->address }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Login ID') }}</td>
                                <td>{{ auth()->user()->username }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Introducer I D') }}</td>
                                <td>{{ auth()->user()->parent->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-center">
                    <a href="{{ route('profile.edit',auth()->user()->id) }}" class="btn btn-primary" >
                        {{ __('Edit') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection