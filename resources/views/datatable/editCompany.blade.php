<a class="btn btn-info btn-sm" href="/company/edit/{{$id}}" >edit</a>
<hr>
<form action="/company/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>