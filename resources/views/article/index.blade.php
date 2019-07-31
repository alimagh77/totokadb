<!DOCTYPE html>
<html lang="en">
<head>
    <title>Totoka</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <a class="btn btn-info btn-sm" href="/article/create" >ایجاد مقاله</a>
        <a class="btn btn-info btn-sm" href="/" >خانه</a>

    </div>
</div>
<div class="container">
    <h2 class="text-right">مقالات</h2>
    <table class="table table-bordered text-right" id="table">
        <thead>
        <tr>
            <th width="58px" class="text-right">تاریخ ثبت</th>
            <th width="100px" class="text-right">عنوان</th>
            <th class="text-right">کلمات کلیدی</th>
            <th class="text-right">شرح مختصر</th>
            <th width="30px">ویرایش</th>
        </tr>
        </thead>
    </table>
</div>
<script>
    $(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('article/data') }}',
            columns: [
                { data: 'created_at', name: 'created_at',"searchable":false },
                { data: 'title', name: 'title' },
                { data: 'keys', name: 'keys' },
                { data: 'explain', name: 'explain' },
                { data: 'edit', name: 'edit', "searchable":false },

            ]
        });
    });
</script>
</body>
</html>