export function moneyFormatWithRupiah(value) {
    let formattedValue = moneyFormat(value)
    
    return 'Rp' + formattedValue + ',-'
}

export function moneyFormat(value) {
    // Accept only number
    let formattedValue = numberFormat(value)

    // Add . every three digits
    formattedValue = formattedValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.')

    return formattedValue
}

export function numberFormat(value) {
    let onlyNumberValue = value.replace(/\D/g, '')
    
    return onlyNumberValue
}