<a class="btn btn-info btn-sm" href="/customer/edit/{{$id}}" >edit</a>
<hr>
<form action="/customer/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>