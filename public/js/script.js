const more_Btn = document.querySelectorAll(".panel-heading");

more_Btn.forEach((btn) => {
    btn.addEventListener("click", () =>{
        btn.classList.toggle("active");
    });
});


// $(document).ready(function(){
//     $(".menu-icon").click(function(){
//         $(".sidebar").toggleClass("collapse");
//     })
// })

$(document).ready(function(){
    var table = $("#datatableKategori").DataTable();
    
    table.on("click", ".editKategori", function(){
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")){
            $tr = $tr.prev(".parent");
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#editModalKategori').find('[name=namakategori]').val(data[1]);

        $("#editFormKategori").attr("action", "/edit-kategori/"+data[0]);
        $("#editModalKategori").modal("show");
    });
});


