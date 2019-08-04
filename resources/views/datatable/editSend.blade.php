<a class="btn btn-info btn-sm" href="/send/edit/{{$id}}" >edit</a>
<hr>
<form action="/send/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>