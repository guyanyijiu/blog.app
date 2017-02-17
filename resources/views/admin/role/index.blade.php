@extends('layouts.admin.app')
@section('title', '角色列表')

@section('content')
    <section class="content">
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
                        <th>角色名</th>
                        <th>显示名</th>
                        <th>描述</th>
                        <th style="width: 200px;">操作</th>
                    </tr>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a  href="{{ url('/admin/role/'. $role->id .'/edit') }}" class="btn btn-primary">编辑</a>
                            <form action="{{ url('/admin/role/'. $role->id) }}" method="post" style="display: inline;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger" onclick="return confirm('确定删除?')" data-toggle="modal" data-target=".bs-example-modal-lg">删除</button>
                                {{--<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">--}}
                                    {{--<div class="modal-dialog modal-lg" role="document">--}}
                                        {{--<div class="modal-content">--}}
                                            {{--...--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                {{--<ul class="pagination pagination-sm no-margin pull-right">--}}
                    {{--<li><a href="#">«</a></li>--}}
                    {{--<li><a href="#">1</a></li>--}}
                    {{--<li><a href="#">2</a></li>--}}
                    {{--<li><a href="#">3</a></li>--}}
                    {{--<li><a href="#">»</a></li>--}}
                {{--</ul>--}}
                {{ $roles->links() }}
            </div>
        </div>
    </section>
@endsection
