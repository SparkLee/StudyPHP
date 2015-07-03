<html>
<style>
  .error {color: red;}
</style>

{{-- var_dump(Session::all()) --}}
{{-- var_dump($errors->default) --}}

{{-- 未指定错误清单名称时，默认为default，而为默认的default值时，这个default也可以省略。以面两条语句是等同的 --}}
{{-- var_dump($errors->first('uname')) --}}
{{-- var_dump($errors->default->first('uname')) --}}

{{-- 错误清单名称login在Controller中定义 return Redirect::back()->withErrors($validator); --}}
{{-- var_dump($errors->login) --}}
{{-- var_dump($errors->login->first('uname')) --}}

<form action="{{ URL::to('/validator/login') }}" method="post">
    <p>用户名：<input type="text" name="uname" /></p>
    @if($errors->has('uname'))
        {{ $errors->first('uname', '<p class="error">:message</p>') }}
    @endif
    <p>年龄：<input type="text" name="uage" /></p>
    @if($errors->has('uage'))
        <p class="error">{{ $errors->first('uage') }}</p>
    @endif
    <p>邮箱：<input type="text" name="uemail" /></p>
    @if($errors->has('uemail'))
        <p class="error">{{ $errors->first('uemail') }}</p>
    @endif
    <p><button type="submit">登陆</button></p>
</form>    
</html>