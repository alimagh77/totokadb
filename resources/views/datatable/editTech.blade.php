<a class="btn btn-info btn-sm" href="/tech/edit/{{$id}}" >edit</a>
<hr>
<form action="/tech/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>