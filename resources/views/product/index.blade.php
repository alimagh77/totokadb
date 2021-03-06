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
        <a class="btn btn-info btn-sm" href="/product/create" >ایجاد محصول</a>
        <a class="btn btn-info btn-sm" href="/" >خانه</a>

    </div>
</div>
<div class="container text-right">
    <h2>محصولات</h2>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th width="60px">تاریخ ثبت</th>
            <th>نام محصول</th>
            <th>دسته بندی</th>
            <th>تولید کننده</th>
            <th>استفاده</th>
            <th>ملزومات</th>
            <th>جزئیات</th>
            <th width="30px">ارزش اقتصادی</th>
            <th width="30px">کیفیت</th>
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
            ajax: '{{ url('product/data') }}',
            columns: [
                { data: 'created_at', name: 'created_at' },
                { data: 'color', name: 'color' },
                { data: 'category', name: 'category' },
                { data: 'manufacturers', name: 'manufacturers' },
                { data: 'use', name: 'use' },
                { data: 'supplies', name: 'supplies' },
                { data: 'details', name: 'details' },
                { data: 'value', name: 'value' },
                { data: 'quality', name: 'quality' },
                { data: 'edit', name: 'edit',"searchable":false },

            ]
        });
    });
</script>
</body>
</html>