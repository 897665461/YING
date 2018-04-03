<html>
<head>
<title>这是标题 - @tield('title')</title>
</head>
<body>
@section('sidebar')
    这是侧边栏
    @show
<h5>这是第1个文件中的内容1</h5>

<h5>这是第1个文件中的内容2</h5>
<div class="wfee">
    @yield('concent')

    <h5>这是第1个文件中的内容3</h5>
</div>
<h5>这是第1个文件中的内容4</h5>
@component('zujian')
@slot
slot
@endslot
qidwdwqdwq
@endcompoent
s

</body>
</html>
