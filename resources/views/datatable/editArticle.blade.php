<a class="btn btn-info btn-sm" href="/article/edit/{{$id}}" >edit</a>
<hr>
<form action="/article/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>