// document.onreadystatechange = function() {
//     if (document.readyState !== "complete") {
//         document.querySelector("body").style.visibility = "hidden";
//         document.querySelector(".prLoader").style.visibility = "visible";
//         // console.log("loadingggggggggg");
//     } else {
//         document.querySelector("body").style.visibility = "visible";
//         document.querySelector(".prLoader").style.visibility = "hidden";
//         // console.log("loadedddddddddd");
//     }
// };



let arr = ["+" , "-" , "*" , "/"  , "\"" , '\'', "@" , "#" , "$" , "%" , "^" ,"&" , "(" , ")" , "-" , "_" , "=", ".", "\\" , "|" , "/" , ";" , ":" , "!" , "<" , ">" , "~"];


// 
// if(window.location.href[window.location.href.length - 1] == "r" || window.location.href[window.location.href.length - 1] == "p"){
//     window.location.href += "?t=";
// }
// 
let checked = false;
// console.log(checked)
if(document.querySelector("#sendDataOfLesson")){

    document.querySelector("#sendDataOfLesson").addEventListener("submit" , (e)=>{
        for(let int = 1; int <= 3; int++){
        // setInterval(function (){
            if(document.getElementById(`classOfLesson${int}`)){
                // document.getElementById(`classOfLesson${int}`).onclick = ()=>{
                if(document.getElementById(`classOfLesson${int}`).checked){
                    checked = true;
                    // console.log(document.getElementById(`classOfLesson${int}`).value)
                    // console.log(checked)
                }
                // }
            }
            // } , 1000)
        }
        if(checked != true){
            e.preventDefault();
            // Swal.fire({title:"اختر الصف",
            //     icon: "error"
            // });
            alert("اختر الصف");
        }
    })
}

if(document.querySelectorAll(".close_lesson")){
    document.querySelectorAll(".close_lesson").forEach(edit=>{
        edit.onclick = ()=>{
            getFinishedPup(edit.getAttribute("lessonID") , edit.getAttribute("numOfStudents"));
        }
    })
}

// =------------------=======================
function getFirstPup(){
    document.querySelectorAll(".cont").forEach(element => {
        if(element){
            element.remove();
        }
    });
let div = document.createElement("div");
div.className = "cont rtl";
document.body.appendChild(div)
div.innerHTML = 
`
<div class="box-cont">
<div class = 'm-15'>
<span class = 'add_delete setTch cns '>add or delete</span>
<span class = 'finished_lesson_btn setTch cns '>finish</span>
<span class = 'setTch cns fs-13' id="cns">إلغاء</span>
</div>
</div>
`
cns.onclick = ()=>{
    document.querySelector(".cont").style.scale = "0";
    setTimeout(function (){
        cns.parentElement.parentElement.remove()
}, 500)
}
document.querySelector(".cont").style.cssText = " transition: 0.5s; scale: 0; ";
setTimeout(function (){
document.querySelector(".cont").style.scale = "1";
}, 50)
if(document.querySelector(".add_delete")){
    document.querySelector(".add_delete").onclick = ()=>{
        // document.querySelector(".add_delete").setAttribute("onClick" , "\"getFinishPup()\"");
        // document.querySelector(".add_delete").click();
            getSecondPup();
        }
    
}
if(document.querySelector(".finished_lesson_btn")){
    document.querySelector(".finished_lesson_btn").onclick = ()=>{
            getFinishedPup();
        }
            // }
}
}
function getSecondPup(){
    document.querySelectorAll(".cont").forEach(element => {
        if(element){
            element.remove();
        }
    });
let div = document.createElement("div");
div.className = "cont rtl";
document.body.appendChild(div)
div.innerHTML = 
`
<div class="box-cont">
<div class = 'm-15'>
<form method = 'POST' id = 'add_delete_student_form'>
<div>
<input type = 'text' class = 'input inp' id = 'add_delete_student_id' name = 'add_delete_student' placeholder = 'اسم الطالب او ID' />
</div>
<div>
<input type = 'submit' class = 'cns setTch' name = 'add_delete_student_btn' value = 'تسجيل الحصه' />
</div>
</form>
<span class = 'setTch cns fs-13' id="cns">إلغاء</span>
</div>
</div>
`
cns.onclick = ()=>{
    document.querySelector(".cont").style.scale = "0";
    setTimeout(function (){
        cns.parentElement.parentElement.remove()
}, 500)
}
document.querySelector(".cont").style.cssText = " transition: 0.5s; scale: 0; ";
setTimeout(function (){
document.querySelector(".cont").style.scale = "1";
}, 50)
document.querySelector("#add_delete_student_form").addEventListener("submit" , (e)=>{
    if( document.querySelector("#add_delete_student_id").value.length == "" ){
        e.preventDefault();
        alert("املء البيانات بشكل صحيح");
        
    }else{
        // setTimeout(function (){
            // getSecondPup();
        // } , 500)
    }
})
getInputValidate();
}
function getFinishedPup(lessonIDCloseParam , valueOfNumStudentsParam){
    document.querySelectorAll(".cont").forEach(element => {
        if(element){
            element.remove();
        }
    });
let div = document.createElement("div");
div.className = "cont rtl";
document.body.appendChild(div)
div.innerHTML = 
`
<div class="box-cont">
<div class = 'm-15'>
<form method = 'POST' id = 'close_lesson_form'>
<div>
<input type = 'hidden' class = 'input inp' value = '${lessonIDCloseParam}' id = 'lessonIDClose' name = 'lessonIDClose' placeholder = 'رقم الحصه' />
</div>
<div>
<input type = 'hidden' class = 'input inp' value = '${valueOfNumStudentsParam}' id = 'numOfStudentClose' name = 'numOfStudentClose' placeholder = 'عدد الطلاب' />
</div>
<div>
<input type = 'number' class = 'input inp' id = 'centerPrice' name = 'centerPrice' placeholder = 'نسبة السنتر' />
</div>
<div>
<input type = 'number' class = 'input inp' id = 'teacherPrice' name = 'teacherPrice' placeholder = 'نسبة المدرس' />
</div>
<input type = 'submit' class = 'cns setTch' name = 'close_lesson_btn' value = 'إنهاء' />
</form>
<span class = 'setTch cns fs-13' id="cns">إلغاء</span>
</div>
</div>
`
cns.onclick = ()=>{
    document.querySelector(".cont").style.scale = "0";
    setTimeout(function (){
        cns.parentElement.parentElement.remove()
}, 500)
}
document.querySelector(".cont").style.cssText = " transition: 0.5s; scale: 0; ";
setTimeout(function (){
document.querySelector(".cont").style.scale = "1";
}, 50)
document.querySelector("#close_lesson_form").addEventListener("submit" , (e)=>{
    if( document.querySelector("#lessonIDClose").value.length == "" || document.querySelector("#numOfStudentClose").value.length == "" || document.querySelector("#centerPrice").value.length == "" || document.querySelector("#teacherPrice").value.length == ""){
        e.preventDefault();
        // Swal.fire({title:"يجب ملء بيانات الإنهاء بشكل صحيح",
        //     icon: "error"
        // });
        alert("ملء بيانات الإنهاء بشكل صحيح");
    }else{
        // setTimeout(function (){
            // getSecondPup();
        // } , 500)
    }
})
getInputValidate();
}
// ---------------------------------------------
document.querySelectorAll(".inp").forEach(inp=>{
    inp.oninput = ()=>{
        console.log(inp.value);
    arr.forEach(e=>{
    if(inp.value.includes(e)){
    inp.style.borderColor = "red";
    inp.value = "";
        }else{
    // inp.style.borderColor = "#ccc";
        }
    })

    }
})

function getInputValidate(){
    if(document.querySelectorAll(".input")){

        document.querySelectorAll(".input").forEach((inputElement) =>{
            inputElement.oninput = ()=>{
            arr.forEach(e=>{
        if(inputElement.value.includes(e)){
            inputElement.style.borderColor = "red";
            inputElement.value = "";
                }
            }
        )
        }
        })
}
    }
// --
setInterval(function (){
    let dn = new Date();
    let getTime = dn.getHours() >= 12 ? "pm" : "am";
            let chMin = dn.getMinutes() < 10 ? "0" + dn.getMinutes() : dn.getMinutes();
            let chSec = dn.getSeconds() < 10 ? "0" + dn.getSeconds() : dn.getSeconds();
            let chHou = dn.getHours() > 12 ? (dn.getHours() - 12) : dn.getHours();
            // let variable = dn.getFullYear() + "-" + (dn.getMonth() + 1) + "-" + dn.getDate() + " / " + chHou + ":" + chMin + ":" + chSec + getTime;
            let date = (dn.getMonth() + 1) + "-" + dn.getDate();
            let year = dn.getFullYear() ;
            let time = chHou + ":" + chMin + ":" + chSec + getTime;
            document.cookie = "date=" + date;
            document.cookie = "year=" + year;
            document.cookie = "time=" + time;
            // console.log(variable);
            } , 1000);
            window.addEventListener("beforeunload", function (event) {
                sessionStorage.setItem("refreshing", "true");
                document.querySelector("body").style.visibility = "hidden";
document.querySelector(".loader2_div").style.visibility = "visible";
            });
            
            window.onload = function() {
                if (sessionStorage.getItem("refreshing") === "true") {
                    sessionStorage.removeItem("refreshing");
                    document.querySelector("body").style.visibility = "visible";
document.querySelector(".loader2_div").style.visibility = "hidden";
                }else{
                }
            };