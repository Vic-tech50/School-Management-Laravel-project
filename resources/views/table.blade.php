<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Table</title>

	<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>


</head>
<body>
<table id="example" class="display checkbox-datatable table nowrap">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="select-all" />
            </th>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><input type="checkbox" class="select-row" value="{{ $user->id }}"></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->position }}</td>
            <td>{{ $user->office }}</td>
            <td>{{ $user->start_date }}</td>
            <td>{{ $user->salary }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<button id="promote-selected" class="btn btn-primary">Promote Selected</button>

</body>
</html>