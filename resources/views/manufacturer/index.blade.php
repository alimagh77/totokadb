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
        <a class="btn btn-info btn-sm" href="/manufacturer/create" >ایجاد تولیدکننده</a>
        <a class="btn btn-info btn-sm" href="/" >خانه</a>

    </div>
</div>
<div class="container text-right">
    <h2>تولیدی ها</h2>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th width="60px" class="text-right">تاریخ ثبت</th>
            <th class="text-right">نام برند</th>
            <th class="text-right">حوزه کاری</th>
            <th class="text-right">سایز</th>
            <th width="30px" class="text-right">ویرایش</th>
        </tr>
        </thead>
    </table>
</div>
<script>
    $(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('manufacturer/data') }}',
            columns: [
                { data: 'created_at', name: 'created_at' },
                { data: 'brand', name: 'brand' },
                { data: 'realm', name: 'realm' },
                { data: 'size', name: 'size' },
                { data: 'edit', name: 'edit',"searchable":false },
            ]
        });
    });
</script>
</body>
</html>