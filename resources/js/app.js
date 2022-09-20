//Сторонние библиотеки
import "./venders";

//Скрипты из шаблона (удалить после их переноса)
import "./modules/checkFile";

//Модули
import { headerJS } from "./modules/navbar";
import scrollingTop from "./modules/scrollingTop";
import cutText from "./modules/cutText";
import dropdown from "./modules/dropdown";
import customCheckbox from "./modules/customCheckbox";
import notification from "./modules/notification";

import "./modules/login";
import chats from "./modules/chats";
import addProducts from "./modules/addProduct";
import modulsWindow from "./modules/modulsWindow";
import photoSlider from "./modules/photoSlider";
import checkImg from "./modules/checkImg";
import city from "./modules/citys";
import sendForms from "./modules/sendForms";

//Вызовы модулей
headerJS();
scrollingTop('.btn-top', '#main');
// cutText();
dropdown();
notification();
customCheckbox();
chats();
addProducts();
// modulsWindow();
photoSlider();
// checkImg();
// city();
sendForms();

