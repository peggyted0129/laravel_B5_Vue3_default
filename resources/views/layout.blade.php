<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSRF Token -->
  <meta name="_token" content="{!! csrf_token() !!}">
 
  <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/app.css')) }}">
  <title>@yield('title')</title>
</head>
<body>
  {{-- <nav>
    <a class="dropdown-item" href="{{ url('cdrbc0') }}">業績</a>
    <a class="dropdown-item" href="{{ route('admin.users') }}">客戶列表</a>
  </nav> --}}
  <p class="mb-5">我是 layout 頁 : 以有載入 captcha 亂碼驗證登入套件 </p>

  <!-- 參考官方文件說明 https://github.com/mewebstudio/captcha -->
  <div class="my-5">{!! captcha_img() !!}</div> <!-- Return Image : 使用這個 -->
  <div class="my-5">{!! captcha_src() !!}</div> <!-- Return URL -->
  <div class="my-5">{!! captcha_img('flat') !!}</div>    <!-- 背景灰: BigImage -->
  <div class="my-5">{!! Captcha::img('inverse') !!}</div> <!-- 背景黑 Image -->


  <div class="container mt-8">
    @yield('content')
  </div>

  <p style="height:500px"></p>

  <!-- 以下為 JS Code =========================================== -->
  <script src="{{ asset(mix('js/app.js')) }}"></script> {{-- 引入 jquery --}}
  <script src="{{ asset(mix('js/jquery.datetimepicker.full.min.js')) }}"></script>
  <script src="{{ asset(mix('js/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('js/sweetalert2.js')) }}"></script>

  @yield('scripts')

  <script>
    function getCurrentUrl(){ // 設定抓取 CurrentUrl (Domain name)
      // console.log(window.location.origin);
      
      /*
      // 測試環境 open
      let thisLocalname = window.location.origin;
      let thisCurrentUrl = thisLocalname.substr(0, 4)=='http' ? thisLocalname : `http://${thisLocalname}`;
      */
      
      // 正式環境 open : 補上路徑 /report
      let thisLocalUrl = thisLocalname.substr(0, 4)=='http' ? thisLocalname : `https://${thisLocalname}`;
      let thisCurrentUrl = `${thisLocalUrl}/report`;
      

      return thisCurrentUrl;
    }

    function alert(icon, title){
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon,   // 'error',
        title: title, //'此筆沒有資料...',
        showConfirmButton: false,
        timer: 1500
      })
    }
  </script>

</body>
</html>