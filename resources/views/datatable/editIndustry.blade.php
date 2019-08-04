<a class="btn btn-info btn-sm" href="/industry/edit/{{$id}}" >edit</a>
<hr>
<form action="/industry/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>