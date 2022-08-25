 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>
     <li class="nav-item">
       <img src="{{ asset('admin/logo-text.png') }}" alt="myqueen" width="150">
     </li>
   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
     <!-- Notifications Dropdown Menu -->
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-bell"></i>
         <span class="badge badge-warning navbar-badge">15</span>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <span class="dropdown-item dropdown-header">15 @lang('admin.Notifications')</span>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item">
           <i class="fas fa-envelope mr-2"></i> 4 @lang('admin.new messages')
           <span class="float-right text-muted text-sm">3 @lang('admin.mins')</span>
         </a>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item">
           <i class="fas fa-users mr-2"></i> 8 @lang('admin.friend requests')
           <span class="float-right text-muted text-sm">12 @lang('admin.hours')</span>
         </a>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item">
           <i class="fas fa-file mr-2"></i> 3 @lang('admin.new reports')
           <span class="float-right text-muted text-sm">2 @lang('admin.days')</span>
         </a>
         <div class="dropdown-divider"></div>
         <a href="#" class="dropdown-item dropdown-footer">@lang('admin.See All Notifications')</a>
       </div>
     </li>
	 <li>
	       <div class="dropdown ml-5" style="margin-top: 8px; margin-right: 6px;">
			    @lang('auth.language') : <select onchange="changeLanguage(this.value)">
                                                 <option <?php if(session()->get('lang_code') == 'en') { echo 'selected'; }?> value="en">English</option>
                                                 <option <?php if(session()->get('lang_code') == 'chi') { echo 'selected'; }?> value="chi">Chinese</option>
                                                 <option <?php if(session()->get('lang_code') == 'malay') { echo 'selected'; }?> value="malay">Malay</option>
                                          </select>
		   </div>
	 </li>
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         <img src="{{ asset('admin/icon/user.png') }}" alt="" class="img-fluid rounded-circle" width="25">
       </a>
       <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
         <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
           <img src="{{ asset('admin/icon/logout.png') }}" alt="" width="20" class="nav-icon">
           <span class="text-sm text-muted">@lang('admin.Logout')</span>
         </a>
         <form action="{{ route('logout') }}" id="logout-form" method="post">@csrf</form>
       </div>
     </li>
   </ul>
 </nav>
 <!-- /.navbar -->