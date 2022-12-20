$(document).ready(function(){
    var table = $("#datatableBrand").DataTable();
    
    table.on("click", ".editBrand", function(){
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")){
            $tr = $tr.prev(".parent");
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#editModalBrand').find('[name=namabrand]').val(data[1]);

        $("#editFormBrand").attr("action", "/edit-brand/"+data[0]);
        $("#editModalBrand").modal("show");
    });
});