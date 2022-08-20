//Сторонние библиотеки
import "./venders";

//Скрипты из шаблона (удалить после их переноса)
import "./checkFile";

//Модули
import { headerJS } from "./navbar";
import cutText from "./cutText";
import searchDropdown from "./searchDropdown";

import "./modalWindowPopup";
import "./login";

//Вызовы модулей
cutText();
headerJS();

searchDropdown();
