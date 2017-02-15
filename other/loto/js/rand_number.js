/**
 * Created by FreeZmaR on 08.02.2017.
 */

function four_twenty()
{
    var block = document.getElementsByClassName('four_twenty')[0];
    var text = document.createElement('p');
    text.classList.add('bg-info', 'four_info');
    var number = getArr(20);
    var iter;
    var combo = "";
    for(var i = 0 ; i < 4 ; i++)
    {
        iter = Math.round(Math.random()*(number.length-1));
        combo += " "+number[iter];
        number.splice(iter, 1);
    }
    var check = document.getElementById('chek_4');
    //проверка на нажатия чек бокса на повторение, если не нажато то обновляем массив если нажато то остовляем преждний
    if(check.checked != true){
        number = getArr(20);
    }
    combo += " |";
    for(var i = 0 ; i < 4 ; i++)
    {
        iter = Math.round(Math.random()*(number.length-1));
        combo += " "+number[iter];
        number.splice(iter, 1);
    }
    text.innerText = combo;
    var reset = document.getElementById('reset_4');
    if(!reset){
        reset = document.createElement('a');
        reset.id = "reset_4";
        reset.innerText = "Очистить";
        reset.addEventListener('click', function(){
            var info = document.getElementsByClassName('four_info');
            console.log(info.length);
            console.log(info);
            if(info.length != null){
                while(info.hasOwnProperty(0)){
                    info[0].parentNode.removeChild(info[0]);
                }
            }
            reset.parentNode.removeChild(reset);
        });
    }
    block.appendChild(text);
    block.appendChild(reset);

}
function six() {
    var block = document.getElementsByClassName('six')[0];
    var text = document.createElement('p');
    text.classList.add('bg-info', 'six_info');
    var number = getArr(45);
    var iter;
    var combo = "";
    for(var i = 0 ; i < 6 ; i++)
    {
        iter = Math.round(Math.random()*(number.length-1));
        combo += " "+number[iter];
        number.splice(iter, 1);
    }

    text.innerText = combo;
    var reset = document.getElementById('reset_6');
    if(!reset){
        reset = document.createElement('a');
        reset.id = "reset_6";
        reset.innerText = "Очистить";
        reset.addEventListener('click', function(){
            var info = document.getElementsByClassName('six_info');
            console.log(info.length);
            console.log(info);
            if(info.length != null){
                while(info.hasOwnProperty(0)){
                    info[0].parentNode.removeChild(info[0]);
                }
            }
            reset.parentNode.removeChild(reset);
        });
    }
    block.appendChild(text);
    block.appendChild(reset);
}
function seven() {
    var block = document.getElementsByClassName('seven')[0];
    var text = document.createElement('p');
    text.classList.add('bg-info', 'seven_info');
    var number = getArr(49);
    var iter;
    var combo = "";
    for(var i = 0 ; i < 7 ; i++)
    {
        iter = Math.round(Math.random()*(number.length-1));
        combo += " "+number[iter];
        number.splice(iter, 1);
    }

    text.innerText = combo;
    var reset = document.getElementById('reset_7');
    if(!reset){
        reset = document.createElement('a');
        reset.id = "reset_7";
        reset.innerText = "Очистить";
        reset.addEventListener('click', function(){
            var info = document.getElementsByClassName('seven_info');
            console.log(info.length);
            console.log(info);
            if(info.length != null){
                while(info.hasOwnProperty(0)){
                    info[0].parentNode.removeChild(info[0]);
                }
            }
            reset.parentNode.removeChild(reset);
        });
    }
    block.appendChild(text);
    block.appendChild(reset);
}
function getArr(num)
{
    var number = [];
    for(var i = 0 ; i < num; i++)
    {
        number.push((i+1));
    }
    return number;
}