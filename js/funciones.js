$(document).ready(function(){
    
    /*  apaño para que centre la imagen .novisible
     *  Sino lo pongo lo descuadra en el hover. Display block en css
     * 
     * */
    $(".novisible").css({"display": "none"});

        
    $(".imgEliminar").click(function(){
        
        var form = $(this).closest("form").attr('id');
        var linea = $(".lineaBorrar").val();
        //alert("form "+form);
        $("#"+form).submit();
    });

    $(".fancyImg").fancybox({
        helpers: {
            title : {
                 type : 'float'
            }
        }
    });
    
    /*
     *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
     */
    $('.fancybox-media')
        .attr('rel', 'media-gallery')
        .fancybox({
            openEffect : 'none',
            closeEffect : 'none',
            prevEffect : 'none',
            nextEffect : 'none',

            arrows : false,
            helpers : {
                    media : {},
                    buttons : {}
            }
    });
    
    
    $("#refLogin").hover(function() {
        $("#loginUsuario").css({"display":"block"});
        
        },function() {
            $("#loginUsuario").css({"display":"none"});
        }
    );
        
    $("#login").hover(function() {
            $("#loginUsuario").css({"display":"block"});
        }, function() {
            $("#loginUsuario").css({"display":"none"});
        });
        
    $("#refProducts").hover(function() {
        $("#prod").css({"display":"block"});
        
        },function() {
            $("#prod").css({"display":"none"});
        }
    );
        
    $("#divProductos").hover(function() {
            $("#prod").css({"display":"block"});
        }, function() {
            $("#prod").css({"display":"none"});
        });
        
    $("#forget").click(function(){
        var form = $(this).closest("form").attr('id');
        $("#"+form).submit();
    });
    
    $("#cantidad").keydown(function(e){
        //alert(e.shiftKey);
        var cantidad= $("#cantidad").val();
        var long = cantidad.length;
        var key = e.which || e.keyCode;
        
        if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
            // numbers   
                key >= 48 && key <= 57 ||
            // Numeric keypad
                key >= 96 && key <= 105){
                   
                if(long <2){
                    return true;
                }else{
                    return false;
                }
        }else if(// comma, period and minus, . on keypad
               key == 190 || key == 188 || key == 109 || key == 110 ||
            // Backspace and Tab and Enter
               key == 8 || key == 9 || key == 13 ||
            // Home and End
               key == 35 || key == 36 ||
            // left and right arrows
               key == 37 || key == 39 ||
            // Del and Ins
               key == 46 || key == 45){
                   
                   return true;
            
        }else{
            return false;
        }
    });
    
    $("#cmbTallas").change(function(){
        var form = $(this).closest("form").attr('id');
        //alert(form);
       $("#"+form).submit();
    });
    
    
    $(".imgNews").hover(function() {
        $(".novisible",this).show();
        
        },function() {
            $(".novisible",this).hide();
        }
    );
    
    
    
    $(function() {
        $(".rslides").responsiveSlides({
            speed: 10,
            pause: true
            
        });
    });
        
});

function comprobarDatos(){
    
    //si cmbcolor y combo vacios error
    
    var idtalla = $("#cmbtalla").val();
    var idcolor = $("#cmbcolor").val();
    
    
    if(idcolor === "" || idtalla === ""){
        alert("Seleccione una talla y un color");
        return false;
    }else{
        return true;
        
    }
    
}
