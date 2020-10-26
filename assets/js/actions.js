$(function(){
  $(".topMenu, .cep-form").hide();
  $("#cadastra").attr('disabled', true);

  $("#loginUsuario").click(function(e){
    e.preventDefault();

    $("#msg").html('').hide();
    $("#loginUsuario").attr('disabled', true);

    $.getJSON('api/getLogin', {
      usuario: $("#usuario").val(),
      senha: $("#senha").val()
    }, function(getReturn){
      $("#msg").html(getReturn.info).show('fast');
      if(!getReturn.error){
        setTimeout(function(){
          $(".login-form").hide('slow');
          $(".topMenu, .cep-form").show('slow');
        }, 1000);
      }else
        $("#loginUsuario").attr('disabled', false);
    });
  });

  $("#cep").keyup(function(){
    if(validateCEP($(this).val())){
      $("#cadastra").attr('disabled', false);
      $("#msgCep").html('').hide();
    }else{
      $("#msgCep").html('CEP Invalido!').show('fast');
      $("#cadastra").attr('disabled', true);
    }
  });

  $("#cadastra").click(function(e){
    $("#msgCep").html('').hide();
    $("#cadastra").attr('disabled', true);

    $.getJSON('api/addCep', {
      cidade: $("#cidade").val(),
      cep: $("#cep").val()
    }, function(getReturn){
      $("#msgCep").html(getReturn.info).show('fast');
      if(!getReturn.error){
        setTimeout(function(){
          $("#listar").click();
        }, 1000);
      }else
        $("#cadastra").attr('disabled', false);
    });
  });

  $("#home").click(function(){
    $("#msgCep, #msg").html('').hide();
    $("#cep, #cidade").val('');
    $("#cadastra").attr('disabled', true);
    $(".cep-form, .topMenu").show('slow');
    $(".login-form, .lista-cep").hide('slow');
  });
  $("#listar").click(function(){
    listaCep();
    $("#msgCep, #msg").html('').hide();
    $(".topMenu, .lista-cep").show('slow');
    $(".cep-form, .login-form").hide('slow');
  });
  $("#deslogar").click(function(){
    $("#usuario, #senha").val('');
    $("#msgCep, #msg").html('').hide();
    $("#loginUsuario").attr('disabled', false);
    $(".login-form").show('slow');
    $(".cep-form, .topMenu, .lista-cep").hide('slow');
  });

});