
function inscribirse(presentacion_id){
    //alert("aqui");
    //alert(idtipo);
    //alert(idfact);
    $.ajax({
        type: "GET",
        url: "/mescyt/frontend/web/index.php/asignar_presentacion?presentacion_id="+presentacion_id,
        
        }).done(function( data ) {
            //if(data==1)
                //{
                    alert("Resgistro realizado");
                location.reload();
		$('presentacion_ver').html(data);

             //   $(presentacion_id+"regis").css();
                //}
                return;
            
        
        });
    
}
function un_cribirse(presentacion_id){
    //alert("aqui");
    //alert(idtipo);
    //alert(idfact);
    $.ajax({
        type: "GET",
        url: "/mescyt/frontend/web/index.php/un_cribirse?presentacion_id="+presentacion_id,
        
        }).done(function( data ) {
            //if(data==1)
                //{
                    //alert("Resgistro realizado");
                location.reload();
		$('presentacion_ver').html(data);

             //   $(presentacion_id+"regis").css();
                //}
                return;
            
        
        });
    
}

function log(){
    $.ajax({
        
        }).done(function( data ) {
                    alert("Inicie sesión para poder inscribirse");
                return;
            
        
        });
}