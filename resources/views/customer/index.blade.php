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
        <a class="btn btn-info btn-sm" href="/customer/create" >ایجاد فرصت</a>
        <a class="btn btn-info btn-sm" href="/" >خانه</a>

    </div>
</div>
<div class="container text-right">
    <h2>فرصت ها</h2>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th class="text-right" width="60px ">تاریخ ثبت</th>
            <th class="text-right">نام</th>
            <th class="text-right">استفاده</th>
            <th class="text-right">جایگاه حقوقی</th>
            <th class="text-right">حوزه فعالیت</th>
            <th class="text-right" width="40px">ویرایش</th>
        </tr>
        </thead>
    </table>
</div>
<script>
    $(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('customer/data') }}',
            columns: [
                { data: 'created_at', name: 'created_at',"searchable":false },
                { data: 'name', name: 'name' },
                { data: 'use', name: 'use' },
                { data: 'pos', name: 'pos' },
                { data: 'job', name: 'job' },
                { data: 'edit', name: 'edit',"searchable":false },
            ]
        });
    });
</script>
</body>
</html>