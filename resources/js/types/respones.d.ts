type ResponseResult<T> = {
    "code": number,
    "status": "success",
    "message": string,
    "data": T
}