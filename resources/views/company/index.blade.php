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
        <a class="btn btn-info btn-sm" href="/company/create" >ایجاد شرکت</a>
        <a class="btn btn-info btn-sm" href="/" >خانه</a>

    </div>
</div>
<div class="container">
    <h2>شرکت ها</h2>
    <table class="table table-bordered text-right" id="table">
        <thead>
        <tr>
            <th width="58px">تاریخ ثبت</th>
            <th width="60px" class="text-right">نام</th>
            <th class="text-right">حوزه فعالیت</th>
            <th class="text-right">بنیانگذاران</th>
            <th class="text-right">حمایت شده ی</th>
            <th class="text-right">همکاری با</th>
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
            ajax: '{{ url('company/data') }}',
            columns: [
                { data: 'created_at', name: 'created_at' },
                { data: 'name', name: 'name' },
                { data: 'realm', name: 'realm' },
                { data: 'founder', name: 'founder' },
                { data: 'support', name: 'support' },
                { data: 'partner', name: 'partner' },
                { data: 'edit', name: 'edit',"searchable":false },
            ]
        });
    });
</script>
</body>
</html>