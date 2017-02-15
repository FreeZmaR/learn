function reverseArray(mas)
{
    var ret = [];
    for(var i = mas.length-1; i >=0;i--)
        {
            ret.push(mas[i]);
        }
    return ret;
}

function reverseArrayInPlace (mas)
{
    var midl = parseInt(mas.length/2);
    var iter = 0;
    for(var i = 0 ; i < midl;i++)
        {
            iter = mas[mas.length-1-i];
            
            mas[mas.length-1-i] = mas[i];
            mas[i]=iter;
        }
    return mas;
}
function show(sh)
{
    console.log(sh);
}
var arr = [1,2,3,4,5,6,7,8,10];
show(reverseArray(arr));

show(reverseArrayInPlace(arr));


//вывод по ключу
function pick(obj, key)
{
    var new_obj = {};
    for(var i = 0 ; i < key.length;i++)
        {
            for( var x in obj)
                {
                    if(x==key[i])
                        {
                            new_obj[key[i]]=obj[x];
                        }
                }
        }
    return new_obj;
}

var user = {
    name: 'Alex',
    age: 22,
    friends: ['bob','rob']
};
show(pick(user,['name', 'friends']));

//Из массива в список
function arrayToList(mas)
{
    var rect= {};
    if(mas.length==0){
        return null;
    }else{
    if(mas.length==1)
        {
            rect['value']=mas[0];
            rect.rect = null;
            return rect;
        }else{
            rect['value']=mas[0];
                mas.splice(0,1);
            rect.rect = arrayToList(mas);
            return rect;
        }
    }
}

console.log(arrayToList([1,2,3]));

// вывод позиции из списка вариант1

function nth1(list, num)
{
    var iter = 0;
    for(var x in list)
        {
            if(iter==num)
                {
                    return x+" : "+list[x];
                }else{
                    iter++;
                }
        }
    return undefined;
}
var numbers = {
    one : 1,
    two : 2,
    three : 3
};
console.log(nth1(numbers,2));
//
function nth2(list, num)
{
    if(list.rect==null && num!=0)
        {
            return undefined;
        }else{
    if(num==0)
        {
            return list.value;
        }else{
            return nth(list.rect, num-1);
        }
        }
}
//добавление элемента в структуру
function prepend(list, elem)
{
    var new_list = {};
    new_list['value']=elem;
    new_list.rect = list;
    return new_list;
}

show(prepend(arrayToList([1,2,3]), 5));
//из списка в массив
function listToArray(list)
{
    var mas = [];
    if(list.rect==null){
        mas.push(list.value);
        return mas;
    }else{
        mas = listToArray(list.rect);
        mas.push(list.value);
        return mas;
    }

}

show(listToArray(arrayToList([1,2,3])));