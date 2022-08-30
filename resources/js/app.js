//Сторонние библиотеки
import "./venders";

//Скрипты из шаблона (удалить после их переноса)
import "./checkFile";

//Модули
import { headerJS } from "./navbar";
import cutText from "./cutText";
import searchDropdown from "./searchDropdown";
import customCheckbox from "./customCheckbox";
import "./modalWindowPopup";
import "./login";
import chats from "./chats";

//Вызовы модулей
cutText();
headerJS();
searchDropdown();
customCheckbox();
chats();
