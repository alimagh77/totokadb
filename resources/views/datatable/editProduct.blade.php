<a class="btn btn-info btn-sm" href="/product/edit/{{$id}}" >edit</a>
<hr>
<form action="/product/destroy/{{$id}}" method="post">
    @csrf
    <button class="btn-sm btn-info btn" name="delete" >حذف</button>
</form>