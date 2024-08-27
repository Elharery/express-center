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
// ----------------
if(document.getElementById('log')){
    log.addEventListener("submit" , (e)=>{
        if(document.getElementById("passLog").value.length == "" ){
            // Swal.fire({title:"يجب ملء جميع الحقول بشكل صحيح",
            //     icon: "error"
            // });
            alert('يجب ملء حقل الإدخال بشكل صحيح');
            e.preventDefault();
        }
        if(document.getElementById("subLog")){
            if(document.getElementById("passLog").value.length != "" ){

                subLog.value = 'جاري تسجيل الدخول...';
            }
        }
            // if (document.getElementById("passLog").value.length !== "") {
                // document.onkeydown = (e)=>{
                //     if(e.key == "g"){
                
                    //     fetch(`https://api.github.com/users/Elharery/repos`)
                    //     .then((res) => {
                    //     let myData = res.json();
                    //     console.log(myData);
                    //     return myData;
                    // })
                    // .then((result) => {
                    //     console.log(result);
                    //     result.forEach(ele => {
                    //         if(ele.name == document.getElementById("passLog").value){
                    //             alert("HangMan");
                    //             // e.preventDefault();
                    //         }else{
                    //             alert("Policeeeee");
                    //             e.preventDefault();
                    //         }
                    //     });
                    // })
                // }
                // }
                // e.preventDefault();
            // }
            // alert('Logged In');
            // setTimeout(function (){
            //     console.log("logged In SetTim");
            // } , 2000)
        
        
    })
    
}

// var dataToSend = {
//     test: "rewq"
// }
// ;
// const jsonData = JSON.stringify(dataToSend);
// https://jsonplaceholder.typicode.com/posts

                //   Data to send
//             const dataToSend = {
//                 name: "John Doe",
//                 age: 25
//             };

//             // Send data to PHP API
// function postData(){
//     fetch('http://localhost/express-center/t', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json'
//         },
//         body: JSON.stringify(dataToSend)
//     })
//     .then(response => response.json())
//     .then(data => {
//         // document.getElementById('responseText').textContent = 
//         //     'Response: ' + data
//             console.log(data);
//     })
//     .catch(error => console.error('Error:', error));
// }

let arr = ["+" , "-" , "*" , "/"  , "\"" , '\'', "@" , "#" , "$" , "%" , "^" ,"&" , "(" , ")" , "-" , "_" , "=", ".", "\\" , "|" , "/" , ";" , ":" , "!" , "<" , ">" , "~"];
// console.log("POST DATA")
// postData();
            // --------------------------------------------------------------------------------------------------------------
            // opening website
// const page = document.getElementById("page");
// const projectsB = document.getElementById("projects");
// const aboutB = document.getElementById("about");
// const contactB = document.getElementById("contact");
// const testC = document.querySelectorAll(".te");


function contact(){
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
    <h3 class="">إضافة مدرس جديد</h3>
    <form method = 'POST' action = '' id = 'formTch'>
    <div class="">
    <input class = 'inp' type="text" name="nameTch" id="nameTch" placeholder="اسم المدرس" >
    </div>
    <div class="">
    <input class = 'inp' type="number" name="numTch" id="numTch" placeholder="رقم الهاتف" 
    </div>
    <div class="">
    <input class = 'inp' type="text" name="schoolTch" id="schoolTch" placeholder="المدرسه الحاليه" >
    </div>
    <div class="">
    <textarea class = 'txt_area h-100p inp' name = 'centersTch' placeholder = 'سناتر المدرس' ></textarea>
    </div>
    <div class="">
    <input class = 'secR'  type="radio" name="st" value = 'المرحله الثانويه' id="" >
    <label for = 'secR' class = 'color-grey'>المرحله الثانويه </label>
    <input class = 'secR'  type="radio" name="st" value = 'المرحله الإعداديه' id="prep" >
    <label for = 'prep' class = 'color-grey'>المرحله الإعداديه </label>
    </div>
    <div class = ''>
    <input class= 'secR' type = 'checkbox' value = '1' id = 'one'  name = 'stgs[]'/>
    <label for = 'one' class = 'color-grey'>اولى</label>
    <input class= 'secR' type = 'checkbox' value = '2' id=  'two' name = 'stgs[]'/>
    <label for = 'two' class = 'color-grey'>تانيه</label>
    <input class= 'secR' type = 'checkbox' value = '3' id = 'three' name = 'stgs[]'/>
    <label for = 'three' class = 'color-grey'>تالته</label>
    </div>
    <div class = 'arabic'>
    <div class = 'lang custom-select d-fle'>
                        <select name="cates" id="" class="selction">
                            <option value="">اختر مادة</option>
                            <option value="عربي" name= "one">عربي</option>
                            <option value="انجليزي"name = "two">انجليزي</option>
                            <option value="فرنساوي" name = "three"> فرنساوي</option>
                            <option value="ايطالي" name = "forne">ايطالي</option>
                            <option value="اسباني" name = "four">اسباني </option>
                            <option value="الماني" name = "five"> الماني</option>
                            <option value="صيني" name = "seven"> صيني </option>
                            <option value="علوم" name = "eight">علوم</option>
                            <option value="دراسات" name = "nine">دراسات</option>
                            <option value="فيزياء" name = "ten">فيزياء</option>
                            <option value="كيمياء" name = "eleven">كيمياء</option>
                            <option value="احياء" name = "12">احياء</option>
                            <option value="جغرافيا" name = "13">جغرافيا</option>
                            <option value="تاريخ" name = "14">تاريخ</option>
                            <option value="جيولوجيا" name = "143">جيولوجيا</option>
                            <option value="فلسفه" name = "15">فلسفه</option>
                            <option value="علم نفس" name = "16">علم نفس</option>
                            <option value="احصاء" name = "17">احصاء</option>
                            <option value="رياضيات" name = "18">رياضيات</option>
                            <option value="رياضيات بحته" name = "19">رياضه (بحته)</option>
                            <option value="رياضيات تطبيقيه" name = "20">رياضه (تطبيقية)</option>
                            <option value = 'physics' name = '21'>Physics</option>
                            <option value = 'chemistry' name = '22'>Chemistry</option>
                            <option value = 'biology' name = '23'>Biology</option>
                            <option value = 'math' name = '24'>Math</option>
                            <option value = 'math2' name = '28'>Math2</option>
                            <option value = 'science' name= '26'>Science</option>
                            
                        </select>
    </div>
    </div>
    <div  class = 'd-flex j-cont-b '>
    <input class = 'setTch sub fs-13' id = 'add_now' type = 'submit' name= 'setTch' value = 'أضف الأن' id=""/>
    <span class = 'setTch cns fs-13' id="cns">إلغاء</span>
    </form>
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
// document.getElementById("send").addEventListener("click", () => {
//     let person = "Please Fill All Fields To Send All Data Right";
//     if (confirm(person) == true) {
//       sendMe()
//     } else {
//       console.log(Error("Error"))
//     }
//   })

document.querySelector("#formTch").addEventListener("submit" , (e)=>{
    if( document.querySelector("#nameTch").value.length == "" || document.querySelector("#numTch").value.length == "" || document.querySelector("#schoolTch").value.length == "" || document.querySelector("#centersTch").value.length == ""){
        e.preventDefault();
        // Swal.fire({title:"يجب ملء جميع بيانات المدرس بشكل صحيح",
        //     icon: "error"
        // });
        alert("املء البيانات المدرس بشكل صحيح");
        
    }
    
})
// e.preventDefault();
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

}
function addStudent(){
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
    <h3 class="">إضافة طالب جديد</h3>
    <form method = 'POST' action = '' id = 'formSt'>
    <div class="">
    <input class = 'inp' type="text" name="nameSt" id="nameSt" placeholder="اسم الطالب" >
    </div>
    <div class="">
    <input class = 'inp' type="number" name="numSt" id="numSt" placeholder="رقم الهاتف" >
    </div>
    <div class="">
    <input class = 'inp' type="number" name="prNum" id="prNum" placeholder="رقم الهاتف ولي الأمر" >
    </div>
    <div class="">
    <input class = 'secR' id = 'secondaryStage'  type="radio" name="studentStage" value = 'المرحله الثانويه' id="" >
    <label for = 'secR' class = 'color-grey'>المرحله الثانويه </label>
    <input class = 'secR'  type="radio" name="studentStage" value = 'المرحله الإعداديه' id="prepStage"  >
    <label for = 'prep' class = 'color-grey'>المرحله الإعداديه </label>
    </div>
    <div class = ''>
    <input class= 'secR class' type = 'radio' value = '1' id = 'secondary1'  name = 'studentR' />
    <label for = 'secondary1' class = 'color-grey'>اولى</label>
    <input class= 'secR class' type = 'radio' value = '2' id=  'secondary2' name = 'studentR' />
    <label for = 'secondary2' class = 'color-grey'>تانيه</label>
    <input class= 'secR class' type = 'radio' value = '3' id = 'secondary3' name = 'studentR' />
    <label for = 'secondary3' class = 'color-grey'>تالته</label>
    </div>
    <div class = ''>
    <input class= 'secR' type = 'radio' value = 'عربي' id=  'langAr' name = 'langSelect' />
    <label for = 'langAr' class = 'color-grey'>عربي</label>
    <input class= 'secR' type = 'radio' value = 'لغات' id = 'langEn' name = 'langSelect' />
    <label for = 'langEn' class = 'color-grey'>لغات</label>
    </div>
    <div class = 'secondary-b'>
    <input class= 'secR prep_clear' type = 'radio' value = 'علمي' id=  'elmy' name = 'secondaryBranch'/>
    <label for = 'elmy' class = 'color-grey'>علمي</label>
    <input class= 'secR prep_clear' type = 'radio' value = 'ادبي' id = 'adbi' name = 'secondaryBranch'/>
    <label for = 'adbi' class = 'color-grey'>ادبي</label>
    </div>
    <div class = 'elmy-b'>
    <input class= 'secR prep_clear' type = 'radio' value = 'علمي رياضه' id=  'elmyMath' name = 'elmyBranch'/>
    <label for = 'elmy' class = 'color-grey'>علمي رياضه</label>
    <input class= 'secR prep_clear' type = 'radio' value = 'علمي علوم' id = 'elmyScience' name = 'elmyBranch'/>
    <label for = 'adbi' class = 'color-grey'>علمي علوم</label>
    </div>
    <div class = 'arabic'>
    <div class = 'lang custom-select d-fle'>
                        <select name="secLangs" id="" class="selction">
                            <option value="">اختر اللغه التانيه</option>
                            <option value="فرنساوي" name = "three"> فرنساوي</option>
                            <option value="ايطالي" name = "forne">ايطالي</option>
                            <option value="اسباني" name = "four">اسباني </option>
                            <option value="الماني" name = "five"> الماني</option>
                            <option value="صيني" name = "seven"> صيني </option>
                        </select>
    </div>
    </div>
    <div  class = 'd-flex j-cont-b '>
    <input class = 'setTch sub fs-13' id = 'add_now' type = 'submit' name= 'setSt' value = 'أضف الأن' id=""/>
    <span class = 'setTch cns fs-13' id="cns">إلغاء</span>
    </form>
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
// document.getElementById("send").addEventListener("click", () => {
//     let person = "Please Fill All Fields To Send All Data Right";
//     if (confirm(person) == true) {
//       sendMe()
//     } else {
//       console.log(Error("Error"))
//     }
//   })

// 
document.getElementById("prepStage").onclick = ()=>{
document.querySelectorAll(".prep_clear").forEach(e=>{
    e.checked = false;
    console.log(e.checked);
    document.querySelector(".secondary-b").style.display = 'none';
    document.querySelector(".elmy-b").style.display = 'none';
})
}
// 
document.getElementById("secondaryStage").addEventListener("click" , ()=>{
    if(document.getElementById("secondary2").checked){
        document.querySelector(".secondary-b").style.display = "block";
    }
    if(document.getElementById("secondary3").checked && document.getElementById("adbi").checked == false){
        document.querySelector(".secondary-b").style.display = "block";
        document.querySelector(".elmy-b").style.display = "block";
    }
})
document.getElementById("secondary2").onclick = ()=>{

    if(document.getElementById("secondaryStage").checked){

        if(document.getElementById("prepStage").checked == false){
            console.log(false)
            document.querySelector(".elmy-b").style.display = "none";
            // if(document.getElementById("secondary1").checked == false){
                document.querySelector(".secondary-b").style.display = "block";
                // }
            }
        }
}
    // 
    document.getElementById("elmy").addEventListener("click" , ()=>{
        if(document.getElementById("secondary2").checked == false && document.getElementById("secondary3").checked){
            document.querySelector(".elmy-b").style.display = "block";
        }
    })
    // 
document.getElementById("secondary3").onclick = ()=>{
    if(document.getElementById("secondaryStage").checked && document.getElementById("adbi").checked == false){


    if(document.getElementById("prepStage").checked == false){
                document.querySelector(".secondary-b").style.display = "block";
        // if(document.getElementById("secondary1").checked == false){
            document.querySelector(".elmy-b").style.display = "block";
        // }
    }}}
    // 
    document.getElementById("adbi").addEventListener("click", ()=>{
        if(document.getElementById("secondary3").checked){

            document.querySelector(".elmy-b").style.display = "none";
            document.getElementById("elmyMath").checked = false;
            document.getElementById("elmyScience").checked = false;
        }
        })
    // 
    document.getElementById("secondary1").onclick =()=>{
        document.querySelector(".elmy-b").style.display = "none";
        document.querySelector(".secondary-b").style.display = "none";
        document.querySelectorAll(".prep_clear").forEach(e=>{
            e.checked = false;
            console.log(e.checked);
            document.querySelector(".secondary-b").style.display = 'none';
            document.querySelector(".elmy-b").style.display = 'none';
        })
    }
    // 
    //
// 
document.querySelector("#formSt").addEventListener("submit" , (e)=>{
    if( document.querySelector("#numSt").value.length !== 0 || document.querySelector("#prNum").value.length !== 0){
        if(document.querySelector("#numSt").value == document.querySelector("#prNum").value){
            e.preventDefault();
            // Swal.fire({title:"يجب عدم مطابقة رقم الطالب ورقم ولي الأمر",
            //     icon: "error"
            // });
            alert("يجب عدم مطابقة رقم الطالب ورقم ولي الأمر");
        }
    }
    if( document.querySelector("#nameSt").value.length == "" || document.querySelector("#numSt").value.length == "" || document.querySelector("#prNum").value.length == ""){
        e.preventDefault();
        // Swal.fire({title:"يجب ملء بيانات الطالب بشكل صحيح",
        //     icon: "error"
        // });
        alert("املء البيانات الطالب بشكل صحيح");
    }
    if(document.getElementById("secondaryStage").checked){
        if(document.getElementById("secondary2").checked)
            {
            if(document.getElementById("elmy").checked == false && document.getElementById("adbi").checked == false){
                alert("*#0 اختر القسم علمي-ادبي");
                e.preventDefault();
            }
            }
            if(document.getElementById("secondary3").checked){
                if(document.getElementById("adbi").checked == false && document.getElementById("elmy").checked == false){
                    alert("اختر القسم علمي-ادبي #2");
                    e.preventDefault();
                }
                if(document.getElementById("adbi").checked == false){

                    if(document.getElementById("elmy").checked){
                        if(document.getElementById("elmyScience").checked == false && document.getElementById("elmyMath").checked == false){
                            alert("اختر قسم علمي (رياضه-علوم)");
                            e.preventDefault();
                        }
                    }
                }
            }
        
    }
})
// document.querySelectorAll(".class").forEach(sec=>{
//     sec.onclick = ()=>{
//             if(sec.checked == "1"){
//                 console.log(sec.value);
//                 document.getElementById("secondary2")
//                     // if(document.getElementById("secondary").checked)
                
//             }
//         }
//     })
// e.preventDefault();
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

}
function addStudentToTeacher(){
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
    <h3 class="">إضافة طالب لمدرس</h3>
    <form method = 'POST' action = '' id = 'formStToTch'>
    <div class="">
    <input class = 'inp' type="text" name="nameOfTch" id="nameOfTch" placeholder="اسم المدرس او رقم ID">
    </div>
    <div class="">
    <input class = 'inp' type="text" name="nameOfSt" id="nameOfSt" placeholder="اسم الطالب او رقم ID">
    </div>
    <div  class = 'd-flex j-cont-b '>
    <input class = 'setTch sub fs-13' id = 'add_now' type = 'submit' name= 'setStToTch' value = 'أضف الأن' />
    <span class = 'setTch cns fs-13' id="cns">إلغاء</span>
    </form>
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
// document.getElementById("send").addEventListener("click", () => {
//     let person = "Please Fill All Fields To Send All Data Right";
//     if (confirm(person) == true) {
//       sendMe()
//     } else {
//       console.log(Error("Error"))
//     }
//   })

document.querySelector("#formStToTch").addEventListener("submit" , (e)=>{
    if( document.querySelector("#nameOfTch").value.length == "" || document.querySelector("#nameOfSt").value.length == ""){
        e.preventDefault();
        
        // Swal.fire({title:"يجب ملء بيانات الطالب والمدرس بشكل صحيح بشكل صحيح",
        //     icon: "error"
        // });
        alert("يجب ملء بيانات الطالب والمدرس بشكل صحيح بشكل صحيح");
    }
    
})
if(document.getElementById("add_now")){

    add_now.addEventListener("click" , ()=>{
        if( document.querySelector("#nameOfTch").value.length != "" && document.querySelector("#nameOfSt").value.length != "")
            {
                add_now.value = "جاري العمل على ذلك...";
            }
    })
}
// e.preventDefault();
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

}

    console.log("equll path");
    // document.getElementById("searchInputId").onblur = (e)=>{
    //     document.getElementById("searchForm").submit();
    // }
    // --------------------------------------------------------------------------------------------------------------
    // add student
    
    if(document.getElementById("tch")){
        tch.onclick = ()=>{
            contact()
        }
    }
    if(document.getElementById("addSt")){
        addSt.onclick = ()=>{
            addStudent()
        }
    }
    if(document.getElementById("addStToTch")){
        addStToTch.onclick = ()=>{
            addStudentToTeacher()
        }
    }
    // --------------------------------------------------------------------------------------------------------------
// }
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