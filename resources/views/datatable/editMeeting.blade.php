<a class="btn btn-info btn-sm" href="/meeting/edit/{{$id}}" >edit</a>
<hr>
<form action="/meeting/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>