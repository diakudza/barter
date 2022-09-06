//Сторонние библиотеки
import "./venders";

//Скрипты из шаблона (удалить после их переноса)
import "./checkFile";

//Модули
import { headerJS } from "./navbar";
import scrollingTop from "./scrollingTop";
import cutText from "./cutText";
import dropdown from "./dropdown";
import customCheckbox from "./customCheckbox";
import notification from "./notification";


import "./modalWindowPopup";
import "./login";
import chats from "./chats";
import addProducts from "./addProduct";

//Вызовы модулей
scrollingTop('.btn-top', '#main');
cutText();
headerJS();
dropdown();
customCheckbox();
chats();
notification();
addProducts();
