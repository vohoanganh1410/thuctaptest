@extends('backend.master')
@section('main')
@section('title','Sửa Danh Mục ')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh mục sản phẩm</h1>

        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-5 col-lg-5">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Sửa danh mục
                </div>
                <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post">
                    @csrf
                    @if (!empty($category )) @method('PUT') @endif
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Tên danh mục:</label>
                            @error('name')
                            <small style="color: red;">{{$message}}</small>
                            @enderror
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name') ?: (!empty($category) ? $category->name : '') }}"
                                placeholder="Tên danh mục...">
                        </div>
                        <div class="form-group">
                            <label>Mô tả:</label>
                            @error('description')
                            <small style="color: red;">{{$message}}</small>
                            @enderror
                            <input type="text" name="description"
                                value="{{ old('description') ?: (!empty($category) ? $category->description : '') }}"
                                class="form-control" placeholder="Tên danh mục...">
                        </div>
                        <div class="form-group">
                            <label>Slug: </label>
                            @error('slug')
                            <small style="color: red;">{{$message}}</small>
                            @enderror
                            <input type="text" name="slug"
                                value="{{ old('slug') ?: (!empty($category) ? $category->slug : '') }}"
                                class="form-control" placeholder="Tên danh mục...">
                        </div>
                        <div class="form-group">
                            <label>Danh mục cha:</label>
                            <select required name="parent_id" class="form-control">
                                <option value="0">Danh mục cha</option>
                                @if(!empty($category))
                                @foreach ($categories as $cate)
                                        @if ($cate->id != $category->id)
                                            @if ($cate->id == $category->parent_id)
                                                <option value="{{ $cate->id }}" selected='selected'>{{ $cate->name }}</option>
                                            @else
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endif
                                         @endif
                                @endforeach
                                @endif

                            </select>
                        </div>
                        <div class=" form-group">
                            <label>Trạng thái: </label>
                            <select required name="status" class="form-control">
                                <option value="1" @if($category->status == 1) selected @endif > Kích hoạt</option>
                                <option value="0" @if($category->status == 0) selected @endif > Không kích hoạt </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary"
                                value="Sửa Danh Mục">{{ __('Save') }} </button>
                        </div>
                        <div class="form-group">
                            <a class="form-control btn btn-danger" href="{{route('categories.create')}}">{{__('Cannel')}}</a>
                        </div>

                    </div>
                </form>

            </div>



        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->
@stop