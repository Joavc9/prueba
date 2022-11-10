function load(event){
    $(event).prop("disabled",true);
    $.ajax ({
        url: 'controller/Controller.php',
        data:{action: 'ajax'},
        type: 'get',
        typeData: 'JSON',
        success: function(data){
           let response = JSON.parse(data);
           $("#load").empty();
           $.each(response,function(index,value){
            $("#load").append("<tr><td>"+value.id+"</td><td>"+value.contact_no+"</td><td>"+value.lastname+"</td><td>"+value.createdtime+"</td></tr>");
           });
           $(event).prop("disabled",false);
        },
        error: function(error){
          console.log("Error obteniedo información "+ error);
        }
    });
}