interface captchaApiResponse {
    sensitive:boolean,
    key:string,
    img:string
}

type response = { success?: string, type?: string, errorsObject?: Record<string, any>, [key: string]: any }