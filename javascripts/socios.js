
  $(document).ready(function(){
    $('form').submit(function(ev){
      var errors = 0;
      $('input[type="text"]:lt(8)').each(function(i,ele){
        if ($(ele).val().length==0) {
          $(ele).addClass('error');
          errors++;
        } else {
          $(ele).removeClass('error');
        }
      });
      if (errors>0) {
        $('p.error').text('Faltan campos por rellenar').show();
        ev.preventDefault();
        return false;
      }
      
      if (!emailValidation($('input[name="email"]').val())) {
        $('p.error').text('El email no es correcto').show();
        $('input[name="email"]').addClass('error');
        ev.preventDefault();
        return false;
      }
    });
  });
  
  
  function emailValidation(email) {
    var emailRegEx = /^([a-zA-Z0-9])(([a-zA-Z0-9])*([\._\+-])*([a-zA-Z0-9]))*@(([a-zA-Z0-9\-])+(\.))+([a-zA-Z]{2,4})+$/;
    if(email.search(emailRegEx)==-1) {
      return false;
    } else {
      return true;
    }
  }