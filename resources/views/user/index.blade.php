@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Furigana') }}</th>
                            <th scope="col">{{ __('E-Mail Address') }}</th>
                            <th scope="col">{{ __('Address') }}</th>       
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->furigana }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>
                                        <form id="user{{$user->id}}" name="user{{$user->id}}" action="{{ route('user.destroy',$user->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('user.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="removeFn({{$user->id}})"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr> 
                               
                                
                            @empty
                                {{ __('Empty') }}
                            @endforelse
                        </tbody>
                    </table>
                    {{-- <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">                                
                                <li class="page-item"><a class="page-link" href="#">@lang('pagination.previous')</a></li>
                                @for ($i = 1; $i <= ceil( count($users) /10 ); $i++)                                    
                                    <li class="page-item"><a class="page-link" href="#">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item"><a class="page-link" href="#">@lang('pagination.next')</a></li>
                            </ul>
                        </nav>
                    </div> --}}
                    {{-- <div class="d-flex justify-content-center">
                        {!! $users->links('vendor.pagination.bootstrap-4') !!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="confirmModal" role="dialog" data-id="">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="py-4">本当に削除しますか？</div>
                <div class="">
                    <button type="button" class="btn btn-primary mr-2" id="okBtn">はい</button>
                    <button type="button" class="btn btn-primary ml-2" data-dismiss="modal">いいえ</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("#okBtn").click(function(){
            var id = $("#confirmModal").attr("data-id");
            console.log("user"+id);
            var form = document.getElementById("user"+id);
            form.submit();
        });
    });
    function removeFn(id) {
        $("#confirmModal").modal("toggle");
        $("#confirmModal").modal("show");
        $("#confirmModal").attr("data-id", id);
    }
</script>
@endsection
