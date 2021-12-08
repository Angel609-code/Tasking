$(document).ajaxStart(function () {
    $("#backLoader").show();
}).ajaxStop(function () {
    setTimeout(function(){
        $("#backLoader").hide();
    }, 800);
});