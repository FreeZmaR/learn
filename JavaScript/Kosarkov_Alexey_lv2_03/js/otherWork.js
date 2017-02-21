
function OtherWork() {
    //Задание номер 1 , контроль  коректности ввода цвета
    var block_work1 = document.createElement('section');
    var h2_work1 = document.createElement('h2');
    h2_work1.innerText = "Номер 1";
    var label_work1 = document.createElement('label');
    label_work1.innerText = "Введите цвет (пример:#ffffff)";
    label_work1.setAttribute('for', 'input_work1');
    var input_work1 = document.createElement('input');
    input_work1.setAttribute('type', 'text');
    input_work1.id = "input_work1";
    //проверка на ввод каждого сивола
    input_work1.onkeyup = function() {
        console.log("Ввод символа");
        this.value = colorReplace(this.value);
        if(input_work1.value.length == 7){
            input_submit_work1.classList.remove("disable");
            label_work1.classList.remove("error");
            label_work1.classList.add("access");
        }else{
            label_work1.classList.add("error");
            label_work1.classList.remove('access');
            input_submit_work1.classList.add("disable");
        }
    };
    var input_submit_work1 = document.createElement('input');
    input_submit_work1.setAttribute('type', 'submit');
    input_submit_work1.setAttribute('value', 'Ok');
    input_submit_work1.classList.add("btn", "sbt","disable");
    /*подвод мыши на кнопку , если не корректный ввод цвета
      то копка не доступна и label красного цвета*/
    input_submit_work1.addEventListener('mouseover', function () {
        console.log('Курсор на кнопки');
        if(input_work1.value.length != 7){
            label_work1.classList.add("error");
            label_work1.classList.remove('access');
        }
    });
    /*при нажатие на кнопка , если цвет корректный то меняеться цвет
      Номера упрожнение на тот который был введен*/
    input_submit_work1.addEventListener('click', function () {
        if(input_work1.value.length == 7){
            h2_work1.style.color = input_work1.value;
            console.log(h2_work1.style.color);
        }
    });
    block_work1.appendChild(h2_work1);
    block_work1.appendChild(label_work1);
    block_work1.appendChild(input_work1);
    block_work1.appendChild(input_submit_work1);

    //Номер 2 поиск положительный чисел в тексте
    var block_work2 = document.createElement('section');
    var h2_work2 = document.createElement('h2');
    h2_work2.innerText = "Номер 2";
    var label_work2 = document.createElement('label');
    label_work2.setAttribute('for', 'texar');
    label_work2.innerText = "Поиск положительных чисел";
    var input_work2 = document.createElement('textarea');
    input_work2.id = "texar";
    var input_submit_work2 = document.createElement('input');
    input_submit_work2.classList.add("btn", "sbt");
    input_submit_work2.setAttribute('value', 'Ok');
    input_submit_work2.setAttribute('type', 'submit');
    input_submit_work2.addEventListener('click', function () {
       if(input_work2.value.length > 0)
       {
            if(block_work2.getElementsByClassName('conclusion')[0] != undefined){
                block_work2.removeChild(block_work2.getElementsByClassName('conclusion')[0]);
                block_work2.appendChild(findNum(input_work2.value));
            }else{
                block_work2.appendChild(findNum(input_work2.value));
            }
       }
    });
    block_work2.appendChild(h2_work2);
    block_work2.appendChild(label_work2);
    block_work2.appendChild(input_work2);
    block_work2.appendChild(input_submit_work2);

    //Номер 3 поиск и вывод времени
    var block_work3 = document.createElement('section');
    var h2_work3 = document.createElement('h2');
    h2_work3.innerText = "Номер 3";
    var label_work3 = document.createElement('label');
    label_work3.setAttribute('for', 'texar2');
    label_work3.innerText = "Поиск времени";
    var input_work3 = document.createElement('textarea');
    input_work3.id = "texar2";
    var input_submit_work3 = document.createElement('input');
    input_submit_work3.classList.add("btn", "sbt");
    input_submit_work3.setAttribute('value', 'Ok');
    input_submit_work3.setAttribute('type', 'submit');
    input_submit_work3.addEventListener('click', function () {
        if(input_work3.value.length > 0)
        {
            if(block_work3.getElementsByClassName('conclusion2')[0] != undefined){
                block_work3.removeChild(block_work3.getElementsByClassName('conclusion2')[0]);
                block_work3.appendChild(findClock(input_work3.value));
            }else{
                block_work3.appendChild(findClock(input_work3.value));
            }
        }
    });
    block_work3.appendChild(h2_work3);
    block_work3.appendChild(label_work3);
    block_work3.appendChild(input_work3);
    block_work3.appendChild(input_submit_work3);

    //Номер 5
    var block_work5 = document.createElement('section');
    var h2_work5 = document.createElement('h2');
    h2_work5.innerText = "Номер 5";
    var label_phone = document.createElement('label');
    label_phone.setAttribute('for', 'phone');
    label_phone.innerText = "Введите телефон";
    var label_mail = document.createElement('label');
    label_mail.setAttribute('for', 'mail');
    label_mail.innerText = "Введите Email";
    var label_pasport = document.createElement('label');
    label_pasport.setAttribute('for', 'pasport');
    label_pasport.innerText = "Введите сер. и номер паспорта";
    var input_phone = document.createElement('input');
    input_phone.id = "phone";
    input_phone.onkeyup = function () {
        //проверяю только последний ведденный символ проблема если стирают (
        if(this.value.length == 1){
                this.value = "+7 (";
        }else{
            //удаление символов
            if(phoneNumber(this.value.charAt(this.value.length-1)) == ''){
                this.value = this.value.slice(0, -1);
            }
            if( (this.value.length == 12) || (this.value.length == 15)){
                this.value += "-";
            }
            if(this.value.length == 8){
                this.value += " ";
            }
            if(this.value.length == 7){
                this.value += ") ";
            }
        }
        if(this.value.length > 18){
            this.value = this.value.slice(0, -1);
        }
        if(this.value.length == 18){
            label_phone.classList.add('access');
            label_phone.classList.remove('error');
            this.classList.add('access');
            this.classList.remove('error');
        }else{
            label_phone.classList.remove('access');
            label_phone.classList.add('error');
            this.classList.remove('access');
            this.classList.add('error');
        }

    };
    var input_mail = document.createElement('input');
    input_mail.id = "mail";
    input_mail.onkeyup = function () {
        if( ((test = this.value.replace(/([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,3}/, '')) == '') && (this.value.length != 0) ){
            this.classList.remove('error');
            this.classList.add('access');
            label_mail.classList.add('access');
            label_mail.classList.remove('error');
        }else{
            this.classList.add('error');
            this.classList.remove('access');
            label_mail.classList.remove('access');
            label_mail.classList.add('error');
        }
    };
    var input_pasport = document.createElement('input');
    input_pasport.id = "pasport";
    input_pasport.onkeyup = function () {
        if(this.value.length != 0){
            if(posport(this.value.charAt(this.value.length-1)) == '' ){
                this.value = this.value.slice(0, -1);
            }
            if(this.value.length > 1){
                if((this.value.charAt(this.value.length-1) == ' ') && (this.value.charAt(this.value.length-2) == ' ')){
                    this.value = this.value.slice(0, -1);
                }
                if(this.value.length < 5){
                    this.value = this.value.replace(/\s/gi, '');
                }
                if(this.value.length == 4){
                    this.value += ' ';
                }
                if(this.value.length > 5){
                    if(this.value.charAt(this.value.length-1) == ' '){
                        this.value = this.value.slice(0, -1);
                    }
                }
                if(this.value.length > 11){
                    this.value = this.value.slice(0, -1);
                }
            }else{
                if(this.value == ' '){
                    this.value = this.value.slice(0, -1);
                }
            }
        }
        if(this.value.length == 11){
            input_pasport.classList.add('access');
            input_pasport.classList.remove('error');
            label_pasport.classList.add('access');
            label_pasport.classList.remove('error');
        }else{
            input_pasport.classList.remove('access');
            input_pasport.classList.add('error');
            label_pasport.classList.remove('access');
            label_pasport.classList.add('error');
        }
    };
    var input_submit_work5 = document.createElement('input');
    input_submit_work5.classList.add("btn", "sbt", 'disable');
    input_submit_work5.setAttribute('value', 'Ok');
    input_submit_work5.setAttribute('type', 'submit');
    block_work5.appendChild(h2_work5);
    block_work5.appendChild(label_phone);
    block_work5.appendChild(input_phone);
    block_work5.appendChild(label_mail);
    block_work5.appendChild(input_mail);
    block_work5.appendChild(label_pasport);
    block_work5.appendChild(input_pasport);
    block_work5.appendChild(input_submit_work5);


    //Проверка на корекстность ввода символов , удаляет не верные
    function colorReplace(value) {
        if(value.length == 1){
            if(value != '#'){
                return value.replace(value[0], '#');
            }
        }
        if(value.length < 8){
            return value.replace(/[^#0-9a-f]/gi, '');
        }else {
            return value.slice(0, -1);
        }
    }
    //поиск положительных чисел
    function findNum(value){
        var p = document.createElement('p');
        p.className = "conclusion";
        var regexp = /[^0-9.]{0}[0-9.]+/g;
        var result;
        while(result = regexp.exec(value)){
            if(result[0][0] == '.'){
                result[0] = result[0].slice(1);
                console.log(result[0]);
            }
            if(result[0][result[0].length-1] == '.'){
                result[0] = result[0].slice(0, -1);
                console.log(result[0]);
            }
            p.innerText += result[0]+"\n";
        }
        return p;
    }
    //поиск времени
    function findClock(value) {
        var p = document.createElement('p');
        p.className = "conclusion2";
        var regexp = /((([0,1][0-9])|(2[0-3]))[:,-]([0-5][0-9]))|(([0-5][0-9])[:,-](([0,1][0-9])|(2[0-3])))/g;
        var result;
        while(result = regexp.exec(value)){
            p.innerText += result[0]+"\n";
        }
        return p;
    }
    //Проверка на коректный ввод телефоннового номера
    function phoneNumber(value) {
        return value.replace(/[^0-9]/g, '');
    }
    //Проверка паспорта
    function posport(value) {
        return value.replace(/[^ 0-9]/, '');
    }
    //вводит ДЗ в DOM в переданный элемент
    this.show = function (element) {
        if(element){
            element.appendChild(block_work1);
            element.appendChild(document.createElement('hr'));
            element.appendChild(block_work2);
            element.appendChild(document.createElement('hr'));
            element.appendChild(block_work3);
            element.appendChild(document.createElement('hr'));
            element.appendChild(block_work5);
        }
    };
}
