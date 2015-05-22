<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5 伊甸园</title>

  <link href="/css/app.css" rel="stylesheet">

  <!-- Fonts -->
  <link href='http://fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>

  <div class="container" style="margin-top: 20px;border: 1px solid rgb(238, 238, 238); border-radius: 6px; background-color: #fff;">
    @yield('content')
    <div id="footer" style="text-align: center; border-top: dashed 3px #eeeeee; margin: 50px 0; padding: 20px;">
      ©2015 <a href="#">SparkLee. Powered By Laravel 5</a>
    </div>
  </div>


</body>
</html>