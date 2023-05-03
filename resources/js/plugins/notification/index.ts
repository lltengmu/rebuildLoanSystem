import { Notyf } from "notyf";
import "notyf/notyf.min.css";
const notification = new Notyf({
    duration:3000,
    position:{
        x:"right",
        y:"top"
    }
});

export default (message) => notification.success(message);