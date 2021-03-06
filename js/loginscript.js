$(document).ready(function () {
    $(".del").click(function (sender) {
        if (confirm("Ви дійсьно хочете видалити сторінку?")) {
            var curent = sender.currentTarget;
            var path = curent.origin + curent.pathname + '?delete=' + sender.target.alt;
            sender.currentTarget.href = path;
        }
    });

    $(".delart").click(function (sender) {
        if (confirm("Ви дійсьно хочете видалити статтю?")) {
            var curent = sender.currentTarget;
            var path = curent.origin + curent.pathname + '?deleteart=' + sender.target.alt;
            sender.currentTarget.href = path;
        }
    });

    $(".delnew").click(function (sender) {
        if (confirm("Ви дійсьно хочете видалити новину?")) {
            var curent = sender.currentTarget;
            var path = curent.origin + curent.pathname + '?deletenews=' + sender.target.alt;
            sender.currentTarget.href = path;
        }
    });

    $("textarea").ready(function () {
        tinymce.init({
            selector: "textarea",
            language: 'uk_UA',
            plugins: [
                "advlist autolink link lists charmap preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                "save table contextmenu directionality template paste textcolor code colorpicker",
                "textpattern"
            ],
            toolbar: [
                "forecolor backcolor styleselect | undo redo | removeformat | bold italic underline |  aligncenter alignjustify  | bullist numlist outdent indent | link | print | fontselect fontsizeselect"
            ],
            
            content_css: "css/content.css",
            paste_webkit_styles: "color font-size"
        });
    });
});







