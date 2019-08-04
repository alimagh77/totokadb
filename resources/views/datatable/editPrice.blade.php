<a class="btn btn-info btn-sm" href="/price/edit/{{$id}}" >edit</a>
<hr>
<form action="/price/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>