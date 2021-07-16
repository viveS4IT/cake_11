<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

<script type="text/javascript" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<h3 class="check_message"></h3>

<?php  
    echo $this->Session->flash(); 
?>

<table id="index" class="table table-bordered table-striped table_vam">
    <thead>
    <tr>
        <th>ID</th>
        <th>City</th>
        <th>State ID</th>
        <th>Population</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
       
    </tbody>
</table>

<!-- View -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="View-Content">
       
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="edit-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
   
    
    $('#index').dataTable({
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo $this->Html->url(array( 'controller' => 'cities', 'action' => 'index' )); ?>.json",
        "aoColumns": [
            {mData:"City.id"},
            {mData:"City.name"},
            {mData:"City.state_id"},
            {mData:"City.population"},
            {
                "targets": -1,
                "searchable": false,
                "data": null,
                "wrap": true, 
                "defaultContent": ' <button type="button" class="view_check btn btn-primary mr-2" data-toggle="modal" data-target="#view">View</button>\n\
                                    <button type="button" class="edit_check btn btn-success mr-2" data-toggle="modal" data-target="#edit">Edit</button>\n\
                                    <a href="javascript:void(0)" class="deleted_check btn btn-danger">Delete</a>',
                                         
            },
        ],
        "fnCreatedRow": function(nRow, aData, iDataIndex){
            $('td:eq(0)', nRow).html('<a href="/cake_11/cities/view/'+aData.City.id+'">'+aData.City.name+'</a>');
        }
    });
    
    
  
    $(document).ready(function() {
        var table = $("#index").DataTable();
        $('#index tbody').on('click', '.view_check', function () {
            var data = table.row( $(this).parents('tr') ).data();
           
            var id = data['City']['id']; 
            $.ajax({
                type:"POST",
                dataType: '',
                data:{id:id}, 
                url:"/cake_11/cities/ajax",
                success : function(data) {
                    console.log(data);
                    $('.View-Content').html(data);
                    return data;

                },
                error : function() {
                   alert("false");
                }
            });
        });
        
        $('#index tbody').on('click', '.deleted_check', function () {
            var aElems = $('.deleted_check');
            
            var data = table.row( $(this).parents('tr') ).data();
            
            var check = confirm('Are you sure '+data['City']['id']+' ?');
            
            if (check == true) {
                id = data['City']['id'];
                
                $.ajax({
                    type:"POST",
                    dataType: '',
                    data:{id:id}, 
                    url:"/cake_11/cities/delete",
                    success : function(data) {
                        
                        window.location.reload(data);
                        $('.check_message').addClass('text-success alert alert-success text-center mb-2');
                        $('.check_message').html('Deleted Success.')
                    },
                    error : function() {
                       alert("false");
                    }
                });
                return true;
            } else {
               return false;
            }
         
        });
        
        
        $('#index tbody').on('click', '.edit_check', function () {
            var data = table.row( $(this).parents('tr') ).data();
          
            id = data['City']['id'];
          
            $.ajax({
                type:"POST",
                dataType: '',
                data:{id:id}, 
                url:"/cake_11/cities/edit",
                success : function(data) {
                    
                    $('.edit-body').html(data);
                    
                },
                error : function() {
                   alert("false");
                }
            });
            
        });
        
    });
    
</script>
   


