//Jquery
// import "../../node_modules/jquery/dist/jquery.min.js";
import { $, jQuery } from "jquery";

try {
    $(document).ready(function () {
        $(".modalWindow").click(function () {
            var img = $(this);
            var src = img.attr("src");
            src = src.replace("small", "big");
            $("body").append(
                "<div class='popup'>" +
                    "<div class='popup_bg'></div>" +
                    "<img src='" +
                    src +
                    "' class='popup_img' />" +
                    "</div>"
            );
            $(".popup").fadeIn(800);
            $(".popup_bg").click(function () {
                $(".popup").fadeOut(800);
                setTimeout(function () {
                    $(".popup").remove();
                }, 800);
            });
        });
    });
} catch (error) {
    console.warn(`Произошла ошибка из-за JQuery - ${error}`);
}
