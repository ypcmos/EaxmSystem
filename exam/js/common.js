addEventListener("load",function(){
    layout();  
}, false);
                 
window.onresize = function(){ 
    layout();
}
            
function layout() {
    $("#wrapper").css("height", $(window).height() - $('header').height() - $('footer').height() * 1.5);
}

$("#more-menu").on("click", function(e){
    e.stopPropagation();
    if($("#main").hasClass("main-open")){
        $("#main").removeClass("main-open");
        setTimeout(function(){
            $("#menu").hide();
        }, 400);
    }else{
        $("#menu").show();
        $("#main").addClass("main-open");
        //$("#main").css("height", $(window).height());
    }
});
            
$("#main").on("click", function() {
    $("#main").removeClass("main-open");
    layout();
    setTimeout(function(){
        $("#menu").hide();
    }, 400);
});