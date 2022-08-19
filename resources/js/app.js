import "./bootstrap";
import "./modalWindowPopup";

//Bootstrap
import "/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";
import "/node_modules/ellipsis.js/ellipsis.min.js";

//Модули
import { headerJS } from "./navbar";
import cutText from "./cutText";

//Вызовы модулей

cutText();
headerJS();
