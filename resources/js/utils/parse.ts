export default (responseErrors) => {
    const errors = {}
    Object.entries<Record<string,string[]>>(responseErrors).forEach(([key,value]) => {
        errors[key] = value[0]
    })
    return errors;
}