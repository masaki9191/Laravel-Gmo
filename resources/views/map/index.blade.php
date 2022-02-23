@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
@endsection
@section('content')
<div class="container">
            <div class="card">
                <div class="card-header">{{ __('Map') }}</div>

                <div class="card-body">
                    <!-- partial:index.partial.html -->
                    <div class="body genealogy-body genealogy-scroll">
                        <div class="genealogy-tree">
                        @if(count($user->allChildren) > 0)
                            <ul>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="member-view-box">
                                            <div class="member-image">
                                                <div class="member-details">
                                                    <h3>{{$user->name}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <ul>
                                        @include('map.partial', ['datas' => $user->allChildren])
                                    </ul>
                                </li>
                            </ul>
                        @else
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                            <div class="member-details">
                                                <h3>{{$user->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endif
                            
                        </div>
                    </div>
                    <!-- partial -->
                </div>
            </div>
</div>
@endsection
@section('js')
<script>
$(function () {
    // $('.genealogy-tree ul').hide();
    // $('.genealogy-tree>ul').show();
    // $('.genealogy-tree ul.active').show();
    $('.genealogy-tree li').on('click', function (e) {
        var children = $(this).find('> ul');
        if (children.is(":visible")) children.hide('fast').removeClass('active');
        else children.show('fast').addClass('active');
        e.stopPropagation();
    });
});
</script>
@endsection
