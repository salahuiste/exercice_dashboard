        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        $(document).ready(function(){
          $(document).on('click', "tr.transaction", function(){

            //je recupére le premier child (td transaction id ) pour pouvoir recuupèrer l'id de la transaction
            var child=$(this).children(":first");
            var transaction_id=child.text();
            $.ajax({
                url:'transaction_details.php',
                type:'GET',
                data:'id='+transaction_id,
                dataType:'json',
                success: function(response, statut){
                   //var obj=JSON.parse(response);
                    $("#tr_id").text(response["id"]);
                    $("#tr_date").text(response["date"]);
                    $("#tr_acc").text(response["acc_id"]);
                    $("#tr_amount").text(response["total"]);
                    $("#tr_cur").text(response["currency"]);
                    $("#tr_type").text(response["type"]);
                    $("#tr_status").text(response["status"]);
                    modal.style.display = "block";
                    //alert(response["acc_id"]);
                },
                error: function(resultat,statut,erreur){
                    //alert("Erreur");
                }
            })
          });
        });
        span.onclick = function() {
            modal.style.display = "none";
        }
    var counter=3;
    //loading date on scroll
    $(window).scroll(function() {
          if($(window).scrollTop() + $(window).height() >= $(document).height()){
             //alert("scrolling");
             $.ajax({
                url:'transaction_details.php',
                type:'GET',
                data:'nb='+counter,
                dataType:'json',
                success: function(response, statut){
                    var currencies= new Object();
                    currencies["EUR"]="€";
                    currencies["USD"]="$";     
                    var status;
                    if(response["status"]==0){
                        status=["Canceled","icon/canceled.svg","tr_canceled"];
                    }else if(response["status"]==0){
                        status=["Pending","icon/pending.svg","tr_pending"];
                    }else{
                        status=["Completed","icon/completed.svg","tr_completed"];
                    }
                    var row="<tr class='transaction'>";
                    row+="<td data-label='ID TRANSACTION'>"+response["id"]+"</td>";
                    row+="<td data-label='Date'>"+response["date"]+"</td>";
                    row+="<td data-label='Amount'>"+response["total"]+currencies[response["currency"]]+"</td>";
                    row+="<td data-label='Status' class='"+status[2]+"'><img src='"+status[1]+"'/>"+status[0]+"</td>";
                    row+="</tr>";
                    $("#tbody_tr").append(row);
                    //on incrèmente le compteur
                    counter++;
                },
                error: function(resultat,statut,erreur){
                    //alert("Erreur");
                }
            })
          }
        });
        //la navigation des cartes 
        var current_card=0; //la carte courante
        $(".a_btn").click(function(){
            //pour savoir quelle action je recupère la valeur de l'id  (next or back)
            var action=$(this).attr('id');
            if(action=="next_btn"){
                //la prochaine carte
                current_card++;
            }else{
                current_card--;
            }
            $.ajax({
                url:'card_infos.php',
                type:'GET',
                data:'card='+current_card+"&key=a54daze2zaea6z", //j'ai ajouté un attribut key(pour sécuriser l'accès aux données...)
                dataType:'json',
                success: function(response, statut){
                    $("#cc_num").text("˙˙˙˙ ˙˙˙˙ ˙˙˙˙ "+response["cc_number"].substr(response["cc_number"].length-4));
                    $("#cc_datexp").text(response["date_exp"]);
                    $("#cc_holdername").text(response["holder_name"]);
                    current_card=response["id"];
                    
                    //alert(response["acc_id"]);
                },
                error: function(resultat,statut,erreur){
                    alert(statut+"Erreur"+erreur);
                }
            })  
          });