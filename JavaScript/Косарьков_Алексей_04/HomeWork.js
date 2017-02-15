function min (num1,num2)
{
    return num1>num2 ? num2 : num1;
}

function countBs (string)
{
    var iter = 0 ;
    string=string.toLowerCase();
    for(var i = 0 ; i < string.length;i++)
        {
          iter+=string.charAt(i)=="в"||string.charAt(i)=="b" ? 1 : 0 ;
        }

    return iter;
}

function countChar (string,char)
{
    var iter = 0 ;
    string=string.toLowerCase();
    char=char.toLowerCase();
    
    for(var i = 0 ; i < string.length;i++)
        {
            iter+= string.charAt(i)==char ? 1 : 0 ;
        }
    
    return iter;
}

function isEven(number)
{
    var ret=false;
    
    if(number!=0 && number!=1&&number!=-1){
        if(number>0){
    for(;;)
        {
            if(number==1||number==0)break;
            number-=2;
        }
        return number==1 ? false:true;
        }else{
            for(;;)
                {
                    if(number==-1||number==0)break;
                    number+=2;
                }
            return number == -1 ? false:true;
        }
        
    }else{return number==1 ? false:true;}

}

 function testMin()//функция для проверки min + проверка на правильность ввода
{
    var num1 = +prompt("Введите первое число :");
    while(true)
        {
            if(num1>=0||num1<=0){
                break;
            }else{
                 num1 = +prompt("Не является числом !\nВведите число :");}
        }
    var num2 = +prompt("Введите второе число :");
    while(true)
        {
            if(num2>=0||num2<=0){
                break;
            }else{
                 num2 = +prompt("Не является числом !\nВведите число :");}
        }
    showText(min(num1,num2));
    console.log(min(num1,num2));
}

function testCountBs()//функция для проверки countBs + проверка на правильность ввода
{
    var string = prompt("Введите слово или предложение :");
    //проверка на правильность ввода + повтор ввода если была ошибка
    while(true)
        {
            if(string==null||string==undefined||string.length<2){
                string = prompt("Не правельное значение !\nВведите слово или предложение :");
            }else{break;}
        }
    showText(countBs(string));
    console.log(countBs(string));
}

function testCountChar()//функция для проверки countChar + проверка на правильность ввода
{
    var string = prompt("Введите слово или предложение :");
    //проверка на правильность ввода + повтор ввода если была ошибка
    while(true)
        {
            if(string==null||string==undefined||string.length<2){
                string = prompt("Не правельное значение !\nВведите слово или предложение :");
            }else{break;}
        }
    var char = prompt("Введите символ для поиска :");
    //проверка на правильность ввода + повтор ввода если была ошибка
    while(true)
        {
            if(char==null||char==undefined||char.length>1){
                char = prompt("Не правельное значение !\nВведите символ для поиска :");
            }else{break;}
        }
    showText(countChar(string,char));
    console.log(countChar(string,char));
}
function testIsEven()//функция для проверки isEven + проверка на правильность ввода
{
    var number = +prompt("Введите целое число :");
    while(true)
        {
            if(number>=0|| number<=0){
            if(parseInt(number)==number)
                {
                    break;
                  
                }else{
                     number= +prompt("Не являеться  целым числом!\nВведите положительное  целое число :");
                }
            }else{
                number= +prompt("Не являеться  целым числом!\nВведите положительное  целое число :");
            }
        }
    showText(isEven(number));
    console.log(isEven(number));
}

function showText(text)// функция вывода текста в html
{
    document.getElementById("display").innerHTML =text;
}