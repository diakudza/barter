//Сторонние библиотеки
import "./venders";

//Скрипты из шаблона (удалить после их переноса)
import "./checkFile";

//Модули
import { headerJS } from "./navbar";
import scrollingTop from "./scrollingTop";
import cutText from "./cutText";
import searchDropdown from "./searchDropdown";
import customCheckbox from "./customCheckbox";
import notification from "./notification";

import "./modalWindowPopup";
import "./login";
import chats from "./chats";

//Вызовы модулей
scrollingTop('.btn-top', '#main');
cutText();
headerJS();
searchDropdown();
customCheckbox();
chats();
notification();
