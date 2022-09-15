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


import "./modules/modalWindowPopup";
import "./modules/login";
import chats from "./modules/chats";
import addProducts from "./modules/addProduct";
import modulsWindow from "./modules/modulsWindow";
import photoSlider from "./modules/photoSlider";

//Вызовы модулей
scrollingTop('.btn-top', '#main');
cutText();
headerJS();
dropdown();
customCheckbox();
chats();
notification();
addProducts();
modulsWindow();
photoSlider();

