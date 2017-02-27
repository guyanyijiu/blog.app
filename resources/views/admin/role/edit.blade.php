@extends('layouts.admin.app')
@section('title', '编辑角色')
@section('content')

    <section class="content">
        @if (session('status'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('status') }}
            </div>
        @endif
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">编辑角色</h3>
            </div>
            <form action="{{ url('/admin/role/'.$role->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="roleName">角色名</label>
                        <input type="text" name="name" value="{{ old('name') ? old('name') : $role->name }}" class="form-control" id="roleName" required autofocus>
                        @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}">
                        <label for="displayName">显示名</label>
                        <input type="text" name="display_name" value="{{ old('display_name') ? old('display_name') : $role->display_name }}" class="form-control" id="displayName">
                        @if($errors->has('display_name'))
                            <span class="help-block">
                                {{ $errors->first('display_name') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">描述</label>
                        <input type="text" name="description" value="{{ old('description') ? old('description') : $role->description }}" class="form-control" id="description">
                        @if($errors->has('description'))
                            <span class="help-block">
                                {{ $errors->first('description') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>分配权限</label>
                        @foreach($permissions as $permission)
                        <div class="checkbox">
                            <label class="checkbox-inline">
                                <input  type="checkbox"> {{ $permission['display_name'] }} :
                            </label>
                            @foreach($permission['child'] as $child)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="permissions[]" value="{{ $child['id'] }}" {{ in_array($child['id'], $has) ? 'checked' : '' }}> {{ $child['display_name'] }}
                            </label>
                            @endforeach
                        </div>
                        @endforeach
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">提交</button>
                    <button type="reset" class="btn btn-primary">重置</button>
                </div>
            </form>
        </div>
    </section>

@endsection
