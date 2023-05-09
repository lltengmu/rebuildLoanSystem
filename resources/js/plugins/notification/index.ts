import { Notyf } from "notyf";
import "notyf/notyf.min.css";
const notification = new Notyf({
    duration:3000,
    position:{
        x:"right",
        y:"top"
    }
});

export const customAlert = new Notyf({
    duration:2000,
    position:{
        x:"center",
        y:"top"
    },
    types:[
        {
            type:"warning",
            background:"#FFAA16"
        },
        {
            type:"error",
            background:"#FF1616"
        }
    ]
});

export default (message) => notification.success(message);