type filterCardsResponse = {
    cases:number
    clients:number
    rejectCases:number
    serviceProvider:number
    successCases:number
}
type lineChartData = {
    [key:string]:string | number
}
type lineChartResponse = {
    data:lineChartData[]
    ykeys:string[]
    labels:string[]
}
type pieChartResponse = {
    data:number[]
    labels:string[]
}