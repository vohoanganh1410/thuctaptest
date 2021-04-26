@extends('backend.master')
@section('main')
@section('title','Thêm danh mục')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{__('Category Product Manager')}}</h1>
            @if(session('info'))
            <h4 style="color: green;">{{ session('info')}}</h4>
            @endif
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-5 col-lg-5">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    {{ __('Add Category') }}
                </div>
                <form action="{{ route('categories.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="panel-body">
                        <div class="form-group">
                            <label>{{__('Name Category')}}</label>
                            @error('name')
                            <small style="color: red;">{{$message}}</small>
                            @enderror
                            <input type="text" name="name" class="form-control" placeholder="Tên danh mục...">
                        </div>
                        <div class="form-group">
                            <label>{{__('Description')}}</label>
                            @error('description')
                            <small style="color: red;">{{$message}}</small>
                            @enderror
                            <input type="text" name="description"
                                value="{{ old('description') ?: (!empty($post) ? $category->description : '') }}"
                                name="description" class="form-control" placeholder="Mô tả danh mục...">
                        </div>
                        <div class="form-group">
                            <label>{{__('Slug')}} </label>
                            @error('slug')
                            <small style="color: red;">{{$message}}</small>
                            @enderror
                            <input type="text" name="slug"
                                value="{{ old('slug') ?: (!empty($post) ? $category->slug : '') }}" class="form-control"
                                placeholder="Slug danh mục...">
                        </div>
                        <div class="form-group">
                            <label>{{__('Parent')}}</label>
                            <select required name="parent_id" class="form-control">
                                <option value="0">Danh mục gốc</option>
                                @foreach($categories as $cate)
                                <option value="{{ $cate->id }}" @if(old('parent_id')==$cate->id ) selected='selected'
                                    @endif>{{$cate->name }}</option>

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{__('Status')}} </label>
                            <select required name="status" class="form-control">
                                <option value="1" @if(old('status')==1) selected='selected' @endif>{{__('Active')}}
                                </option>
                                <option value="0" @if(old('status')==0) selected='selected' @endif>{{__('Inactive')}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary" value="Thêm Danh Mục">
                        </div>
                    </div>
                </form>

            </div>



        </div>
        <div class="col-xs-12 col-md-7 col-lg-7">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ __('List Name Category')}}</div>

                <div class="panel-body">
                    <div class="bootstrap-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    @if(session('edit'))
                                    <h4 style="color: green;">{{ session('edit')}}</h4>
                                    @endif
                                </tr>
                                <tr class="bg-primary">
                                    <th>{{__('Name Category')}} :</th>
                                    <th style="width:30%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $cate)
                                <tr>
                                    <td><?php echo str_repeat('---|', $cate['level'] ).$cate['name']; ?></td>
                                    <td>

                                        <a href="{{ route('categories.edit', ['category' => $cate->id]) }}"
                                            class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span>
                                            Sửa</a>


                                        <form style="display:inline-block"
                                            action="{{ route('categories.destroy', $cate->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Xoá" class="btn btn-danger  "
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        </form>



                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->
@stop