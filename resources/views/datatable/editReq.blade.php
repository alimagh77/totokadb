<a class="btn btn-info btn-sm" href="/req/edit/{{$id}}" >edit</a>
<hr>
<form action="/req/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>