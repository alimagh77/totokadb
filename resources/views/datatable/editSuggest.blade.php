<a class="btn btn-info btn-sm" href="/suggest/edit/{{$id}}" >edit</a>
<hr>
<form action="/suggest/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>