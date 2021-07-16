$(document).ready(function(){



    function setActive() {
      linkObj = document.querySelectorAll('.sidebar > ul > li > a');
      for(i=0;i<linkObj.length;i++) { 
        if(document.location.href.indexOf(linkObj[i].href)>=0) {
            linkObj[i].classList.add("active");
            
        }
      }
    }

    window.onload = setActive;
    
    
    $(document).click(function(){
       
        var check = $("#user_profile").hide('slow'); 
        if (check) {
            $('#user_profile ul li a').css('display','none'); 
        } 
    });
    $("i#user_modal").click(function(e){
        $('.header-account-setting').find('#user_profile').fadeToggle();
        $('#user_profile ul li a').css('display','block'); 

        e.stopPropagation(); 
    });
    
});