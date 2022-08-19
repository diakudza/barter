<<<<<<< HEAD
import "./bootstrap";
import "./modalWindowPopup";
=======
//Сторонние библиотеки
import "./venders";
>>>>>>> front

//Скрипты из шаблона (удалить после их переноса)
import "./checkFile";

//Модули
import { headerJS } from "./navbar";
import cutText from "./cutText";
import searchDropdown from "./searchDropdown";

import "./modalWindowPopup";
//Вызовы модулей

cutText();
headerJS();

searchDropdown();
