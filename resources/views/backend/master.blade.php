<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | HoangAnh Vo</title>
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <script type="text/javascript" src="/editor/ckeditor/ckeditor.js"></script>
    <script src="'/js/lumino.glyphs.js"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
    

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Hoanganh Vo </a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                                <use xlink:href="#stroked-male-user"></use>
                            </svg> User <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><svg class="glyph stroked cancel">
                                        <use xlink:href="#stroked-cancel"></use>
                                    </svg> Logout</a></li>
                        </ul>
                        <select class="selectpicker" data-width="fit">
                            <option data-content='<span class="flag-icon flag-icon-vn"></span> English'>Việt Nam
                            </option>
                            <option data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
                        </select>
                    </li>
                </ul>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <ul class="nav menu">
            <li role="presentation" class="divider"></li>
            <li class="active"><a href="index.html"><svg class="glyph stroked dashboard-dial">
                        <use xlink:href="#stroked-dashboard-dial"></use>
                    </svg> {{__('home_page')}}</a></li>
            <li><a href="{{route('products.create')}}"><svg class="glyph stroked calendar">
                        <use xlink:href="#stroked-calendar"></use>
                    </svg>{{__('Products')}}</a></li>
            <li><a href="{{route('categories.create')}}"><svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-line-graph"></use>
                    </svg> {{__('Category')}}</a></li>
            <li role="presentation" class="divider"></li>
        </ul>

    </div>
    <!--/.sidebar-->

    @yield('main')

    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/js/chart-data.js"></script>
    <script src="/js/easypiechart.js"></script>
    <script src="/js/easypiechart-data.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>

    <script>
    $('#calendar').datepicker({});
    ! function($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function() {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function() {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
    </script>

    
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
CKEDITOR.replace('my-editor', options);
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
		// File manager button
		var lfm = function(id, type, options) {
			let button = document.getElementById(id);
		  
			button.addEventListener('click', function () {
			  	var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
			  	var target_input = document.getElementById(button.getAttribute('data-input'));
			  	var target_preview = document.getElementById(button.getAttribute('data-preview'));
		  
			  	window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
			  	window.SetUrl = function (items) {
				var file_path = items.map(function (item) {
				  return item.url;
				}).join(',');
		  
				// set the value of the desired input to image url
				target_input.value = file_path;
				target_input.dispatchEvent(new Event('change'));
		  
				// clear previous preview
				target_preview.innerHtml = '';
		  
				// set or change the preview image
					items.forEach(function (item) {
						let img = document.createElement('img');
						
						img.setAttribute('src', item.thumb_url);
					
					});
		  
				// trigger change event
				target_preview.dispatchEvent(new Event('change'));
			  	};
			});
		};
		
		$('#lfm').filemanager('image');
        </script>


</body>

</html>