/**
 * Created by aser on 09.02.2017.
 */
function credit() {
    var sum = document.getElementById('credit_sum');
    var proc = document.getElementById('credit_proc');
    var date = document.getElementById('credit_date');
    var sum_float;
    var proc_float;
    var date_float;
    var erorr = 0;
    //проверка на корекстность ввода суммы займа
    if(sum.value == ""){
        sum.style.border = "1px solid red";
        if(document.getElementById('warn1') == null){
            var warn1 = document.createElement('span');
            warn1.classList.add('warn-inp');
            warn1.innerText = "Не должно быть пустым";
            warn1.setAttribute('id', 'warn1');
            sum.parentNode.appendChild(warn1);
        }
        erorr++;
    }else {
        //проверка на замечание о пустоте и проверка на коректность
            if(parseFloat(sum.value) > 0) {
                if((warn1 = document.getElementById('warn1')) != null){
                    warn1.parentNode.removeChild(warn1);
                }
                sum.style.borderColor = "green";
            }else {
                if((warn1 = document.getElementById('warn1')) != null){
                    warn1.innerText = "Не коректное число";
                }else{
                    warn1 = document.createElement('span');
                    warn1.classList.add('warn-inp');
                    warn1.setAttribute('id', 'warn1');
                    warn1.innerText = "Не коректное значение";
                    sum.parentNode.appendChild(warn1);
                }
                sum.style.border = "1px solid red";
                erorr++;
            }

    }

//проверка на корекстность ввода процентной ставки
    if(proc.value == ""){
        proc.style.border = "1px solid red";
        if(document.getElementById('warn2') == null){
            var warn2 = document.createElement('span');
            warn2.classList.add('warn-inp');
            warn2.innerText = "Не должно быть пустым";
            warn2.setAttribute('id', 'warn2');
            proc.parentNode.appendChild(warn2);
        }
        erorr++;
    }else{
            //проверяем на коректность процентной ставки
            if((parseFloat(proc.value) < 100) && (parseFloat(proc.value) > 0) ){
                if((warn2 = document.getElementById('warn2')) != null){
                    warn2.parentNode.removeChild(warn2);
                }
                proc.style.borderColor = "green";
            }else {
                if((warn2 = document.getElementById('warn2')) != null){
                    warn2.innerText = "Не коректное число";
                }else{
                    warn2 = document.createElement('span');
                    warn2.classList.add('warn-inp');
                    warn2.setAttribute('id', 'warn2');
                    warn2.innerText = "Не коректное значение";
                    proc.parentNode.appendChild(warn2);
                }
                proc.style.border = "1px solid red";
                erorr++;
            }
    }

    //проверка на коректность ввода месяцев
    if(date.value == ""){
        date.style.border = "1px solid red";
        if(document.getElementById('warn3') == null){
            var warn3 = document.createElement('span');
            warn3.classList.add('warn-inp');
            warn3.innerText = "Не должно быть пустым";
            warn3.setAttribute('id', 'warn3');
            date.parentNode.appendChild(warn3);
        }
        erorr++;
    }else{

            if((parseFloat(date.value) > 0) && (parseFloat(date.value) < 61)) {
                if((warn3 = document.getElementById('warn3')) != null){
                    warn3.parentNode.removeChild(warn3);
                }
                sum.style.borderColor = "green";
            }else {
                if((warn3 = document.getElementById('warn3')) != null){
                    warn3.innerText = "Не коректное число";
                }else {
                    warn3 = document.createElement('span');
                    warn3.classList.add('warn-inp');
                    warn3.setAttribute('id', 'warn3');
                    warn3.innerText = "Не коректное значение Макс-60мес(5лет)";
                    date.parentNode.appendChild(warn3);
                }
                date.style.border = "1px solid red";
                erorr++;
            }

    }

    if(erorr == 0){
        //Проверка на уже имеющийся результат , если есть то удаляем его
        var info = document.getElementsByClassName('credit_info')[0];
        if(info != null){
            info.parentNode.removeChild(info);
        }
        /*
        * передаем значения для вычисления ,
        * преобразуем во float и оставим определенное кол. знаков после запятой
        * sum - 0 знаков
        * proc - 2 знака
        * date - 0 знаков
        */
        calc_credit(parseFloat(sum.value).toFixed(), parseFloat(proc.value).toFixed(2), parseFloat(date.value).toFixed());
    }
}
function calc_credit(sum, procent, date) {

    procent=procent/100;
    procent=procent/12;
    var f1 = sum*(procent);
    var f2 =Math.pow(procent+1,date);
    //Ежемесячный платеж
    var monPay = f1/(1-(1/f2));
    //переплата за весь срок
    var overPay = monPay*date-sum;

var credit_block = document.getElementsByClassName('credit')[0];
var info = document.createElement('p');
info.classList.add('bg-info', 'credit_info');
info.innerText = "Ежемесячный платеж : "+monPay.toFixed(2)+"руб\nПереплата : "+overPay.toFixed(2)+"руб";
credit_block.appendChild(info);
}