<html>
<head>
    <title>这是标题</title>
</head>
<body>
<div>
    @foreach($brands as $brand)
        <h1>{{$brand->name}}</h1>
    @endforeach
</div>
<h1><tr>{{$brands->appends(['see'=>'weew'])->fragment('qqqq')->links()}}</tr></h1>
</body>
</html>
