function validateCEP(cep){
  let char = 0, last = '', next = '', stats = true;

  if(cep.match(/^[^0]\d{5}$/)){
    while(char < cep.length){
      last = char == 0 ? '' : cep.substr(char-1, 1);
      next = char == cep.length ? '' : cep.substr(char+1, 1);
      if(last == next){
        stats = false;
        break;
      }else
        char++;
    }
  }else
    stats = false;
  return stats;
}

function listaCep(){
  $.getJSON('api/listaCep', function(getCeps){
    if(getCeps.error){
      $(".lista-cep").html('<h4>'+getCeps.info+'</h4>');
    }else{
      let contentTable = '<table class="table table-striped table-light table-sm table-hover">';
      contentTable += "<th colspan=\"2\">Tabela CEP's</th>";
      contentTable += "<tr><td><b>Cidade<b></td><td><b>CEP<b></td></tr>";

      $.each(getCeps.ceps, function(key, item){
        contentTable += "<tr><td>"+item.cidade+"</td><td>"+item.cep+"</td></tr>";
      });

      contentTable += "</table>";

      $(".lista-cep").html(contentTable);
    }
  });
}