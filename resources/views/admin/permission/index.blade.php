@extends('layouts.admin.app')
@section('title', '权限列表')

@section('content')
    <section class="content">
        @if (session('status'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('status') }}
            </div>
        @endif
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">角色列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                    <tr>
                        <th style="width: 10px">id</th>
                        <th>权限名</th>
                        <th>显示名</th>
                        <th>描述</th>
                        <th style="width: 200px;">操作</th>
                    </tr>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->display_name }}</td>
                            <td>{{ $permission->description }}</td>
                            <td>
                                <a href="{{ url('/admin/permission/'. $permission->id) }}" class="btn btn-primary">子权限</a>
                                <a  href="{{ url('/admin/permission/'. $permission->id .'/edit') }}" class="btn btn-primary">编辑</a>
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-delete" data-permission_id="{{ $permission->id }}">删除</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{-- 模态框 --}}
            <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">提示</h4>
                        </div>
                        <div class="modal-body">
                            <p class="lead">
                                <i class="fa fa-question-circle fa-lg"></i>
                                确认要删除这个权限吗?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <form class="deleteForm" method="POST" action="">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="submit" class="btn btn-danger" >
                                    <i class="fa fa-times-circle"></i> 确认
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- 模态框 --}}
        <!-- /.box-body -->
            {{--<div class="box-footer clearfix">--}}
                {{--{{ $roles->links() }}--}}
            {{--</div>--}}
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('#modal-delete').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var permission_id = button.data('permission_id');
            var form = $(this).find('.deleteForm');
            form.attr('action', '/admin/permission/' + permission_id);
        });
    </script>
@endsection
