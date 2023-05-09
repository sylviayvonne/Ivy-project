$(function (){
   $('.form_header > div:last-child input').click(function (){
       $('.btn_form').removeClass('btn_activ'); 
       $(this).addClass('btn_activ');  
   });
   
   $('.btn_form_log_in').click(function (){
       $('.form_sign_in_content').css('display','none');
       $('.form_log_in_content').css('display','block');
   });
   
   $('.btn_form_sign_up').click(function (){
       $('.form_log_in_content').css('display','none');
       $('.form_sign_in_content').css('display','block');
   });
});