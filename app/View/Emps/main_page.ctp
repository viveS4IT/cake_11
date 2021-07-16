<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script type="text/javascript">
    $(document).ready(function() {
        $('#ajaxtable').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "ajax": {
                "url": '<?php echo $this->Html->Url(array('controller' => 'Emps', 'action' => 'ajax')); ?>',
                "data": {}
              }
        });
    });
</script>
<h1>Browser List</h1>
<table id="ajaxtable">
    <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>s
            <th>DOB</th>
            <th>email</th>        
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4" class="dataTables_empty">Loading data from server...</td>
        </tr>
    </tbody>
</table>