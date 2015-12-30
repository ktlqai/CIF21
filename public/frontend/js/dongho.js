function showtime(){
if (!document.all&!document.getElementById)
return
thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
var Digital=new Date()
myday = Digital.getDay(); 
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var ngay=Digital.getDate()
var thang=Digital.getMonth()+1
var nam=Digital.getFullYear()
if(myday == 0) 
day = "Hôm Nay Chủ Nhật , "; 
else if(myday == 1) 
day = "Hôm Nay Thứ 2, "; 
else if(myday == 2) 
day = "Hôm Nay Thứ 3, "; 
else if(myday == 3) 
day = "Hôm Nay Thứ 4, "; 
else if(myday == 4) 
day = "Hôm Nay Thứ 5, "; 
else if(myday == 5) 
day = "Hôm Nay Thứ 6 , "; 
else if(myday == 6) 
day = "Hôm Nay Thứ 7 , "; 


if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
var ctime=day+ngay+"/"+thang+"/"+nam+"-"+hours+":"+minutes+":"+seconds
thelement.innerHTML="<i style='font-size:14;color:#B9B9B9; '>"+ctime+"</i>"
setTimeout("showtime()",1000)
}
window.onload=showtime 

