<a class="btn btn-info btn-sm" href="/file/edit/{{$id}}" >edit</a>
<hr>
<form action="/file/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>