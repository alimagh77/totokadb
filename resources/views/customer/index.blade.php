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
        <a class="btn btn-info btn-sm" href="/customer/create" >ایجاد مشتری</a>
        <a class="btn btn-info btn-sm" href="/" >خانه</a>

    </div>
</div>
<div class="container">
    <h2>مشتریان</h2>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th width="100px">تاریخ ثبت</th>
            <th>نام</th>
            <th>حوزه فعالیت</th>
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
            ajax: '{{ url('customer/data') }}',
            columns: [
                { data: 'created_at', name: 'created_at' },
                { data: 'name', name: 'name' },
                { data: 'job', name: 'job' },
                { data: 'edit', name: 'edit',"searchable":false },
            ]
        });
    });
</script>
</body>
</html>