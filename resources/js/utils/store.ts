export interface IData {
    data: any
}
export default {
    set(key: string, data: any): void {
        let cache: IData = { data }
        sessionStorage.setItem(key, JSON.stringify(cache))
    },
    get(key: string, defaultValue: any = null): any {
        const cacheStore = sessionStorage.getItem(key)
        if (cacheStore) {
            const cache = JSON.parse(cacheStore)
            return cache.data
        }
        return defaultValue
    },
    remove(key: string) {
        sessionStorage.removeItem(key)
    },
}