function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}

function getWeekNumber(d) {
    // Copy date so don't modify original
    d = new Date(+d);
    d.setHours(0,0,0,0);
    // Set to nearest Thursday: current date + 4 - current day number
    // Make Sunday's day number 7
    d.setDate(d.getDate() + 4 - (d.getDay()||7));
    // Get first day of year
    var yearStart = new Date(d.getFullYear(),0,1);
    // Calculate full weeks to nearest Thursday
    var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7);
    // Return array of year and week number
    return [d.getFullYear(), weekNo];
}

//dates-----------------------------------------------
var currentDay = (new Date).getDate(); //today
var currentDay1 = (new Date).getDate()+ 1; //+1
var currentDay2 = (new Date).getDate()+ 2; //+2
var currentDay3 = (new Date).getDate()+ 3; //+3
var currentDay4 = (new Date).getDate()+ 4; //+4
var currentDay5 = (new Date).getDate()+ 5; //+5 
var currentDay6 = (new Date).getDate()+ 6; //+6
var currentMonth = (new Date).getMonth()+ 1;
var currentMonth1 = (new Date).getMonth()+ 1;
var currentMonth2 = (new Date).getMonth()+ 1;
var currentMonth3 = (new Date).getMonth()+ 1;
var currentMonth4 = (new Date).getMonth()+ 1;
var currentMonth5 = (new Date).getMonth()+ 1;
var currentMonth6 = (new Date).getMonth()+ 1;
//--------------------------------------------------