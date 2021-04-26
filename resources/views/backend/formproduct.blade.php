@extends('backend.master')
@section('main')
@section('title','Thêm sản phẩm')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{__('Products')}}</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Thêm sản phẩm</div>
                <div class="panel-body">
                    <form method="post" action="{{empty($products) ? route('products.store') : route('products.update')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if (!empty($product)) @method('PUT') @endif
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>{{__('Product Name')}}</label>
                                    <input required type="text" name="pro_name" class="form-control"
                                    value="{{ old('pro_name') ?: (!empty($products) ? $products->pro_name : '') }}">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Price')}}</label>
                                    <input required type="number" name="pro_price" class="form-control">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> {{__('Thumbnail')}}
                                        </a>
                                    </span>
                                    <input id="thumbnail" class="form-control" type="text" name="pro_img">

                                </div>




                                <div class="form-group">

                                    <div id="holder" style="margin-top:15px;max-height:250px;"></div>
                                </div>


                                <div class="form-group">
                                    <label>{{__('Accessory')}}</label>
                                    <input required type="text" name="pro_accessories" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Warranty')}}</label>
                                    <input required type="text" name="pro_warranty" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Promotion')}}</label>
                                    <input required type="text" name="pro_promotion" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Condition')}}</label>
                                    <input required type="text" name="pro_condition" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{__('Status')}}</label>
                                    <select required name="pro_status" class="form-control">
                                        <option value="1">Còn hàng</option>
                                        <option value="0">Hết hàng</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{__('Description')}}</label>
                                    <textarea id="my-editor" name="pro_description" class="form-control"></textarea>

                                </div>
                               
                                <div class="form-group">
                                    <label>{{__('Category')}}</label><br>
                                    @foreach($categories as $cate)
                                    <input type="checkbox" name="cate_pro[]" value="{{$cate->id}}" /> <?php echo str_repeat('---|', $cate['level'] ).$cate['name']; ?> </br>
                                    @endforeach
                                </div>
                               

                                <div class="form-group">
                                    <label>{{__('Hot Product')}}</label><br>
                                    Có: <input type="radio" name="pro_featured" value="1" >
                                    Không: <input type="radio" name="pro_featured" value="0">
                                </div>
                                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                                <a href="#" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
$('#lfm').filemanager('image');
$(document).ready(function() {

    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
            'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {

                lfm({
                    type: 'image',
                    prefix: '/laravel-filemanager'
                }, function(lfmItems, path) {
                    lfmItems.forEach(function(lfmItem) {
                        context.invoke('insertImage', lfmItem.url);
                    });
                });

            }
        });
        return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#description').summernote({
        toolbar: [
            ['popovers', ['lfm']],
        ],
        buttons: {
            lfm: LFMButton
        }
    })
});
</script>

<!--/.main-->
@stop