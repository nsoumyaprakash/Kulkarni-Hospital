function getMonthName(month, length_type) {
    var monthNames = [];
    if (length_type == 'long') {
        monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    } else {
        monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
    }

    return monthNames[month];
}

function formatDate(date, format_type) {

    // if (date.indexOf('-') != 0) {
    // 	date = date.replace(/-/gi, " ");

    // } else if (date.indexOf('/') != 0) {
    // 	date = date.replace(/\//gi, ' ');
    // } else {
    // 	date = date;
    // }

    var date = new Date(date);
    var day, month, year, finalDate;
    day = date.getDate();
    month = date.getMonth() + 1;
    if (format_type.indexOf('mm') !== -1) {
        month = (month < 10) ? '0' + month : month;
    }
    day = (day < 10) ? '0' + day : day;
    monthname = getMonthName(month - 1, 'short');
    year = date.getFullYear();
    switch (format_type) {
        case 'dd-mm-yyyy':
            finalDate = day + '-' + month + '-' + year;
            break;
        case 'dd-M-yyyy':
            finalDate = day + '-' + monthname + '-' + year;
            break;
        case 'dd/mm/yyyy':
            finalDate = day + '/' + month + '/' + year;
            break;
        case 'dd/M/yyyy':
            finalDate = day + '/' + monthname + '/' + year;
            break;
        case 'mm/dd/yyyy':
            finalDate = month + '/' + day + '/' + year;
            break;
        case 'mm-dd-yyyy':
            finalDate = month + '-' + day + '-' + year;
            break;
        case 'yyyy-mm-dd':
            finalDate = year + '-' + month + '-' + day;
            break;
        case 'yyyy/mm/dd':
            finalDate = year + '/' + month + '/' + day;
            break;
        default:
            finalDate = day + '-' + month + '-' + year;
            break;
    }
    console.log(finalDate);
    return finalDate;

}