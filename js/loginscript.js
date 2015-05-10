$(document).ready(function () {

//    if(true){
//        $(".hide").css("visibility", "visible");
//    }
//    $(".hide").click(function () {
//        
//    });//css("visibility", "hidden");
 $("textarea").ready(function(){
     tinymce.init({
        selector: "textarea",
        language: 'uk_UA',
        plugins: [
            "advlist autolink link lists charmap preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
            "save table contextmenu directionality template paste textcolor",
            "paste"
        ],
        content_css: "css/content.css",
        paste_webkit_styles: "color font-size"
    });
 });
});







