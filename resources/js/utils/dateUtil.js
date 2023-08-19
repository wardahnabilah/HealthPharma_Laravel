const date = new Date()
    
const day = date.getDate() > 10 ? date.getDate() : '0' + (date.getDate() + 1)
const month = date.getMonth() + 1 > 10 ? date.getMonth() + 1 : '0' + (date.getMonth() + 1)
const year = date.getFullYear()

export function currentDate() {    
    return year + '-' + month + '-' + day;
}

export function formattedCurrentDate() {
    return day + '/' + month + '/' + year;
}