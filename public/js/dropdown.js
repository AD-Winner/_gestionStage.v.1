
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script text="javascript">

    $(document).ready(function(){
    //------------ DEBUT DE LA FONCTION APPELEE QUAND ON SELECIONNE UNE REGION -------------------
    //------Quand on selectionne une region, il affiche les cercles de cette région -----------
    $(document).on('change','.region',function(){
        //console.log("Region is changed !");
    // window.locate()
         var region_id=$(this).val();
         var div=$(this).parent().parent().parent();
         var op="";
         // console.log(region_id);
         $.ajax({
             type: 'get',
           //  url:'{!!URL::to('findCercleName')!!}',
             url:"{{route('find-cercle')}}",
             data:{'id':region_id},

             success:function(data){
             op+='<option value="0" selected disabled> ..selectionner le cercle.. </option>';
             for(var i=0; i<data.length; i++){
                 op+='<option value="'+data[i].id+'">'+data[i].cercle+'</option>';

             }
             div.find('.cercle').html("")
             div.find('.cercle').append(op)
         },
         error:function(){

         }
        });
    });//FIN DE LA FUNCTION ----------------------------------------->
   
    //------------ DEBUT DE LA FUNCTION APPELEE QUAND ON SELECIONNE UN CERCLE ------------------------------------
    //------Quand on selectionne un cercle electoral, il affiche les secteurs de ce district electoral -----------
    $(document).on('change','.cercle',function(){
        var cercle_id=$(this).val();
        var a=$(this).parent().parent().parent();
        var op="";
        $.ajax({
             type: 'get',
             //url:'{!!URL::to('findSecteurName')!!}',
             url:"{{route('find-secteur')}}",
             data:{'id':cercle_id},
            // dataType:'json',
             success:function(data){
                console.log("success");
            //console.log("secteur");
            //console.log(data);
            op+='<option value="0" selected disabled>..selectionner le secteur..</option>';
             for(var i=0; i<data.length; i++){
                 op+='<option value="'+data[i].id+'">'+data[i].secteur+'</option>';

             }
             a.find('.secteur').html("")
             a.find('.secteur').append(op)

         },
         error:function(){

         }
        });
    }); /// FIN DE LA FUNCTION

    
    //------------ DEBUT DE LA FUNCTION APPELEE QUAND ON SELECIONNE UN SECTEUR -------------------
    //------Quand on selectionne un secteur, il affiche les district de ce secteur -----------
    $(document).on('change','.secteur',function(){
        var secteur_id=$(this).val();
        var b=$(this).parent().parent().parent().parent();
        var op="";
        $.ajax({
             type: 'get',
            // url:'{!!URL::to('findDistrictName')!!}',
            url:"{{route('find-district')}}",
             data:{'id':secteur_id},
            // dataType:'json',
             success:function(data){
                console.log("success");
            //console.log("secteur");
            console.log(data);
                op+='<option value="0" selected disabled>..selectinner le district..</option>';
                for(var i=0; i<data.length; i++){
                    op+='<option value="'+data[i].id+'">'+data[i].district+'</option>';
                }
                b.find('.district').html("")
                b.find('.district').append(op)
         },
         error:function(){

         }
        });
    });
    //------------ FIN DE METHODE APPELEE QUAND ON SELECIONNE SECTEUR -------------------

    //------------ DEBUT DE METHODE APPELEE QUAND ON SELECIONNE DISTRICT -------------------
    //------Quand on selectionne le ditrict, il affiche les bureau de ce district ----------
    $(document).on('change','.district',function(){
        var district_id=$(this).val();
        var c=$(this).parent().parent().parent();
        var op="";
        $.ajax({
             type: 'get',
             //url:'{!!URL::to('findBureauName')!!}',
             url:"{{route('find-bureau')}}",
             data:{'id':district_id},
            // dataType:'json',
             success:function(data){
             // console.log("success");
            //console.log("secteur");
            //console.log(data);
            op+='<option value="0" selected disabled>..selectinner le bureau..</option>';
             for(var i=0; i<data.length; i++){
                 op+='<option value="'+data[i].id+'">'+data[i].bureau+'</option>';
             }

             c.find('.bureau').html("")
             c.find('.bureau').append(op)
         },
         error:function(){

         }
        });
    });
//------------ FIN DE METHODE APPELEE QUAND ON SELECIONNE DISTRICT -------------------
 });
</script>