$(document).ready(function(){
  $(document).on('submit','.btnAjax',function(e){
    idForm = $(this).attr('id');
    e.preventDefault();
    console.log(this);
    
    
    $.ajax({
        url:'index.php',
        type:'POST',
        data:$('#'+idForm).serialize(),
    })
    .done(function(res){
      $('#'+idForm)[0].reset();
      salida(JSON.parse(res));    
      console.log('success\n'+res)
    })
    .fail(function(res){
      console.log('error\n'+res);
    })
    .always(function(res){
      console.log('complete\n'+res);
    });
  });
});

function salida(res){
  console.log(res.salida + '--' + res.msj);
  if(res.salida == 'modal'){
    $("#msjModal .modal-title").html(res.title);
    $("#msjModal .modal-body").html(res.msj);
    $("#msjModal").modal('show');
  }else if(res.salida == 'redirect'){
    document.location = 'index.php?c='+res.c+'&a='+res.a;
  }
}

function editar(id){
//  console.log(id);
  $.ajax({
    url:'index.php',
    data:{c:$('#c').val(),a:'edit',id:id},
    type:'POST'
  })
  .done(function(res){
    var oRes = {salida:'modal',
               msj:res,title:'Editar'}
    salida(oRes);
    console.log('success\n'+res)
  })
  .fail(function(res){
    console.log('error\n'+res);
  })
  .always(function(res){
    console.log('complete\n'+res);
  });
}

function eliminar(id){
//  console.log(id);
  
  $("#confModal #spanId").html(id);
  $("#confModal #id").val(id);
  $("#confModal").modal('show');
}

function mostrar(id){
  console.log(id);
  $.ajax({
    url:'index.php',
    data:{c:$('#c').val(),a:'show',id:id},
    type:'POST'
  })
  .done(function(res){
    var oRes = {salida:'modal',
                msj:res,
                title:'Datos usuarios'};
    salida(oRes);
    console.log('success\n'+res)
  })
  .fail(function(res){
    console.log('error\n'+res);
  })
  .always(function(res){
    console.log('complete\n'+res);
  });
}