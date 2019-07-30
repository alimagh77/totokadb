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
        <a class="btn btn-info btn-sm" href="/article/create" >ایجاد جلسه</a>
        <a class="btn btn-info btn-sm" href="/" >خانه</a>

    </div>
</div>
<div class="container">
    <h2>جلسات</h2>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th>تاریخ</th>
            <th>موضوع</th>
            <th>اعضا</th>
            <th>ویرایش</th>

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
                { data: 'date', name: 'date' },
                { data: 'topic', name: 'topic' },
                { data: 'members', name: 'members' },
                { data: 'edit', name: 'edit', "searchable":false },

            ]
        });
    });
</script>
</body>
</html>