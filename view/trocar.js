setInterval(trocarImg, 1000);
/*window.onload = function(){
	trocarImg();
}*/
function trocarImg() {

	var imagens = document.getElementsByTagName("img");
	var timestamp;
  if(vez == 0){
    timestamp = 0;
    vez=1;
  }else{
    timestamp = timestamp_ant;
    timestamp_ant = Date.now()/1000;
  }
	//alert(timestamp);
	$(document).ready(function() {
    $.ajax({
    	type: "POST",
    // url para o arquivo json.php
        url : "json.php",
        data : {'timestamp' : timestamp},
    // dataType json
        dataType : "json",
    // função para de sucesso
        success : function(data){
          //(data[0].numero);
          for(var i = 0; i < data.length; i++){
           
           var img = document.getElementsByClassName(data[i].numero);
           //alert(img.length);
           for(var j = 0; j < img.length; j++ ){
              img[j].src = "../imagens/semFoto.jpg";
              img[j].title = "Sem Nome";
           }
           var posicaoImagem = 0;
           if(data[i].congressistas == null){
              continue;
           }
           for(j = 0; j < data[i].congressistas.length; j++){

              img[posicaoImagem].src = data[i].congressistas[j].end;
              img[posicaoImagem].title = data[i].congressistas[j].nome;
              posicaoImagem++;
           }
           /*for( j = 0; j < img.length && (data[i].congressistas != null); j++){
              
              if(img[j].title == data[i].nome){
                  break;
              }
              else if(img[j].title == "Sem Nome"  ){
                img[j].src = data[i].end;
                img[j].title = data[i].nome;
                break;
              }
            }*/
           
          }
        }
    });//termina o ajax
});//termina o jquery

}
