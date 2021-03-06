@extends('layouts.admin.app')
@section('title', '添加角色')
@section('content')

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">添加角色</h3>
            </div>
            <form action="{{ url('/admin/role') }}" method="post">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="roleName">角色名</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="roleName" required autofocus>
                        @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('display_name') ? ' has-error' : '' }}">
                        <label for="displayName">显示名</label>
                        <input type="text" name="display_name" value="{{ old('display_name') }}" class="form-control" id="displayName">
                        @if($errors->has('display_name'))
                            <span class="help-block">
                                {{ $errors->first('display_name') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">描述</label>
                        <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="description">
                        @if($errors->has('description'))
                            <span class="help-block">
                                {{ $errors->first('description') }}
                            </span>
                        @endif
                    </div>
                    {{--<div class="checkbox">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox"> Check me out--}}
                        {{--</label>--}}
                    {{--</div>--}}
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
