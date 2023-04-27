import $ from 'jquery';

const handleError = (error:JQuery.jqXHR<any>,callback:Function) => {
    if(error.status == 422){
        const { errors } = error.responseJSON
        const errorsObject = {} as Record<string,any>
        Object.entries(errors).forEach(([key,item]) =>{
            const message = item as string[]
            errorsObject[key] = message[0];
        })
        callback({ type:"表单验证错误",errorsObject })
    }else if(error.status == 500){
        throw new ReferenceError("后端服务器错误!")
    }
}
const ajax = async (options: JQuery.AjaxSettings<any>) => {
    return new Promise((resolve, reject) => {
        $.ajax({
            ...options,
            success: (res) => resolve(res),
            error: (error) => handleError(error,resolve)
        })
    })
}

export default ajax;