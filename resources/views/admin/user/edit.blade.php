@extends('layouts.admin.app')
@section('title', '编辑用户')
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
                <h3 class="box-title">编辑用户</h3>
            </div>
            <form action="{{ url('/admin/user/'.$user->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="roleName">用户名</label>
                        <input type="text" name="name" value="{{ old('name') ? old('name') : $user->name }}" class="form-control" id="roleName" required autofocus>
                        @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>分配角色</label>
                        @foreach($roles as $role)
                            <div class="checkbox">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="roles[]" value="{{ $role['id'] }}" {{ in_array($role['id'], $has) ? 'checked' : '' }}> {{ $role['name'] }}
                                </label>
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
