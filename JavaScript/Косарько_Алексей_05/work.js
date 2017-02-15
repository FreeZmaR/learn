function color(r, g, b)
{
    if(r<0 || r>255 || g<0 || g>255 || b<0 || b>255)
        {
            console.log("Не правельные параметры!");
            return null;
        }else{
            r=decToHex(r);
            g=decToHex(g);
            b=decToHex(b);
            
        }
    return "#"+r+g+b;
}
//функция перевода из 10 в 16 сист
function decToHex(num)
{
    var ost = [];
    var b = 0;
   if(num > 15)//проверка на возможность обойтись без деления
       {
           for(;;)
            {
                b = parseInt(num/16);
                ost.push(b);
                num=num-(b*16);
                if(num<=15)
                    {
                        ost.push(num);
                        break;
                    }
            }
       }else{
            ost.push(num);//что бы массив не был пуст
        }
    
    var str="";
    //с конца переводим значение в строку 
    for(var i = ost.length; i > 0; i--)
        {
            switch(ost[i-1])
                {
                    case 10: str+="A";
                        break;
                    case 11: str+="B";
                        break;
                    case 12: str+="C";
                        break;
                    case 13: str+="D";
                        break;
                    case 14: str+="E";
                        break;
                    case 15: str+="F";
                        break;
                    default: str+=num;
                        break;
                }
        }
    if(str.length!=2)//проверка значение без десятка
        {
            return "0"+str;
        }else{
            return str;
        }
}
console.log(color(14, 216, 255));//тест функции

function numToObject(num)//число в объект 
{   
    var value = {};
    
    if(num>999 || num<0){
        console.log("Не правельные параметры!");
    }else{
        value['Сотни'] = parseInt(num/100);
        value['Десятки'] = parseInt(num/10)%10;
        value['Единицы'] = num%10; 
    }
    return value;
}
console.log(numToObject(4));

function objectToQueryString(user)
{
    for(var x in user)
        {
            console.log(x+" = "+user[x]);
        }
}
//var user = numToObject(543);
objectToQueryString({user: 'Лешка'});