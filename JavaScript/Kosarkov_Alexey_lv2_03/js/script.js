/*
    Возвращениие через кнопку назад функции menu(1, 2)
    1 - элемент куда поместить кнопку
    2 - куда вернуться после нажатия :
        chessColor - к выбору цвета фигур
        main - на главную страницу
 */

//функциия удаления детей из DOM
function clear(element){
    while(element.lastChild){
        element.removeChild(element.lastChild);
    }
}
//функция выбора действий
function chois(n) {
    var container = document.getElementsByClassName('container')[0];
    switch(n){
        case 1: clear(container);
                chess_color(container);
            menu(container, "main");
            break;
        case 2: clear(container);
            menu(container, "main");
            otherWork(container);
            break;
        default:break;
    }
}
function  creatBoard(n) {
    var container = document.getElementsByClassName('container')[0];
    clear(container);
    var board = new ChessBoard();
    console.log(n);
    board.start_chess = n;
    console.log(board.start_chess);
    board.creatBoardIn(container);
    menu(container, "chessColor");
}
function menu(container, where) {
    var main = document.createElement('div');
    main.classList.add("back");
    var btn = document.createElement('button');
    btn.classList.add("btn");
    btn.innerText = "Назад";
    //куда вернуться
    switch(where){
        case 'chessColor': btn.addEventListener('click', function() {chois(1);});
            break;
        default: btn.addEventListener('click', function() {location.reload();});
            break;
    }
    main.appendChild(btn);
    container.appendChild(main);
}
function chess_color(container) {
    var main = document.createElement('div');
    main.className = "menu";
    var p1 = document.createElement('p');
    var p2 = document.createElement('p');
    var b1 = document.createElement('button');
    b1.innerText = "Белые";
    b1.className = "btn";
    b1.addEventListener('click', function(){creatBoard(0)});
    var b2 = document.createElement('button');
    b2.innerText = "Черные";
    b2.className = "btn";
    b2.addEventListener('click', function(){creatBoard(1)});
    p1.appendChild(b1);
    p2.appendChild(b2);
    main.appendChild(p1);
    main.appendChild(p2);
    container.appendChild(main);
}

function otherWork(container) {
var h1 = document.createElement('h1');
container.appendChild(h1);
h1.innerText = "Задания №1 №2 №3 №5";
var other = new OtherWork();
other.show(container);
}