$(document).ready(function(){
    var table = $("#datatableUom").DataTable();
    
    table.on("click", ".editUom", function(){
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")){
            $tr = $tr.prev(".parent");
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#editModalUom').find('[name=namauom]').val(data[1]);
        $('#editModalUom').find('[name=keterangan]').val(data[2]);

        $("#editFormUom").attr("action", "/edit-uom/"+data[0]);
        $("#editModalUom").modal("show");
    });
});