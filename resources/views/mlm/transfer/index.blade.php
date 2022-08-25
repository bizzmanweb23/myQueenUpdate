@extends('font.layouts.main')

@section('content')
<!-- Scroll Top -->
<a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End of CloseButton -->
    <div class="mobile-menu-container scrollable">
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off"
                placeholder="@lang('user.search')" required />
            <button class="btn btn-search" type="submit">
                <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <ul class="mobile-menu mmenu-anim">
                <li>
                    <a href="index.html">@lang('auth.home')</a>
                </li>
                <li>
                    <a href="about-us.html">@lang('auth.About')</a>
                </li>
               
                <li>
                    <a href="#">@lang('auth.Products')</a>
                    <ul>
                        <li><a href="{{url('products')}}">@lang('auth.product name1')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name2')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name3')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name4')</a></li>
                        <li><a href="{{url('products')}}">@lang('auth.product name5')</a></li>
                        
                    </ul>
                </li>
              
             
                <li>
                    <a href="contact-us.html">@lang('auth.Contact') </a>
                </li>
                
            </ul>
    </div>
</div>

    {{-- <link rel="stylesheet" href="{{ asset('public/admin/dist/css/adminlte.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('asset/css/font/style.min.css') }}">
    {{-- <script src="{{ asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.js') }}"></script> --}}
    <!-- End Header -->
    <main class="main">
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb" style="background: none;">
                    <li><a href="#"><i class="d-icon-home"></i></a></li>
                    <li>@lang('mlm.Tranfer PV Points')</li>
                </ul>
            </div>
        </nav>
        <div class="page-header pl-4 pr-4" style="background-image: url({{ asset('asset/image/font/about-us.jpg') }})">

            <h1 class="page-title font-weight-bold lh-1 text-capitalize">@lang('mlm.Tranfer PV Points')</h1>

        </div>
        @php
            $img = Auth::user()->image == null ? 'asset/image/icon/user.png' : Auth::user()->image;
        @endphp
        <div class="container">
		    <div class="point-wallet">
                <img src="{{ asset($img) }}" alt="" class="img-fluid rounded-circle">
                <h2>{{ Auth::user()->name }}</h2>
                <div class="row text-center">
                    <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <a href="#myModal" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#myModal"
                               onclick="get_pv_poin_history()">@lang('order.pointHistory')</a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" class="btn btn-primary btn-md btn-block" data-toggle="modal"
                               data-target="#myModal2">@lang('user.TransferFunds')</a>
                        </div>
                        <div class="col-md-3"></div>
                 </div>
            </div>
   </main>
<div class="modal" id="myModal">
     <div class="modal-dialog">
         <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                   <h4 class="modal-title">@lang('order.pointHistory')</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                   <table class="table loyal-table">
                         <thead>
                                <tr>
                                    <th scope="col">@lang('order.Date')</th>
								    <th scope="col">@lang('wallet.User Name')</th>
                                    <th scope="col">@lang('order.Points')</th>
                                </tr>
                        </thead>
                        <tbody id="pv_pint_table_history">
                            {{-- loder --}}
                            <div class="auto-load text-center" id="loder" style="display: none">
                                <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60"
                                    viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                    <path fill="#000"
                                        d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                        <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                            dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>
                            {{-- end loder --}}
                        </tbody>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="padding: 8px">@lang('order.Close')</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal credit_bonus" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">@lang('mlm.Transfer Amount')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
				<form method="post" id="transfer_form">
					  @csrf
                <p>@lang('order.You have')  <?php echo "$".$result[0]->total_pv_point;?> @lang('order.Points')</p>
				    <div class="row">
						    <div class="col-md-6">
							     <label for="tansferID"> @lang('mlm.Enter User ID') </label>
                                 <input type="text" class="form-control input-group-sm" id="tansferID" name="tansferID" placeholder="@lang('mlm.Enter User ID')">
					             <span id="tansferID_error" style="color: red"></span>	
							</div>
							<div class="col-md-6">
							    <label for="amount"> @lang('mlm.Enter Amount') </label>
							    <input type="text" class="form-control input-group-sm" id="amount" name="amount" placeholder="@lang('mlm.Enter Amount')">
					             <span id="amount_error" style="color: red"></span>	
							</div>
					</div>
                    <br>
                    <button type="button" class="btn btn-dark btn-md" id="transfer_pv_points">@lang('order.Submit')</button>
				</form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <br>

@section('javascript')
    <script>
        /*$(document).ready(function() {
            setTimeout(() => {
                $('body').addClass('mainloaded')
            }, [1000])
        });*/

	   jQuery('#transfer_pv_points').click(function()
	{
        var form = $('#transfer_form')[0];
        var data = new FormData(form);

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "{{ URL::signedRoute('MLM.transfer_points.store') }}",
			headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',
            beforeSend: function() {
                $('#loder').show()
            },
            success: function(data) {
                if (data.status == 'success') {
                    toastr.success(data.message);
                }
				else{
					toastr.error(data.message);
				}
				
                $('#transfer_form').trigger("reset");
                $('#loder').hide()
				//location.reload();
            },
            error: function(error) {
                $('#loder').hide()
                var err = error.responseJSON.errors;
                if (error.status == 422) {
                    toastr.error("Error");
                    $('#tansferID_error').html(err.tansferID)
                    $('#amount_error').html(err.amount)
                    if (err.tansferID) {
                        toastr.error(err.tansferID);
                    }
					if (err.amount) {
                        toastr.error(err.amount);
                    }
                }
                console.log(error)
            }
        })
    });
	
	$('#transfer_form :input').click(function() {
        $('#tansferID_error').html('')
        $('#amount_error').html('')
    })

    function get_pv_poin_history() {
            $.ajax({
                url: "{{ URL::signedRoute('MLM.transfer_funds_history') }}",
                type: 'post',
                dataType: 'json',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    $('#loder').show();
                },
                success: function(data) {
                    $('#loder').hide();
                    var len = data.length;
                    $('#pv_pint_table_history').empty();
                    for (var i = 0; i < len; i++) {
                        $('#pv_pint_table_history').append(
                            "<tr><th scope='row'>" + data[i]['transfer_date'] +
                            "</th><td>" + data[i]['name'] + "</td><td>" + data[i]['amount'] +
                            "</td> </tr>");
                    }
					
					$('#myModal').modal();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }	
    </script>
@endsection

@endsection