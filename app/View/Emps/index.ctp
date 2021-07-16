<?php echo $this->Html->script("jquery-3.6.0.min"); ?>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>-->
<script type="text/javascript" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<h1>Browser List</h1>

<table id="users-table">
    <thead>
        <th>Username</th>
        <th>Email</th>
        <th>Created</th>
    </thead>
    <tbody>
    </tbody>
</table>


<script type="text/javascript">
    $('#users-table').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": "/emps/index.json",
    "aoColumns": [
        {mData:"Emp.first_name"},
        {mData:"Emp.last_name"},
        {mData:"Emp.gender"}
    ],
});
</script>