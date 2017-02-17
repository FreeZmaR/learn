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
        case 1: var board = new ChessBoard();
            clear(container);
            board.creatBoardIn(container);
            menu(container);
            break;
        case 2: clear(container);
            var phone = new Phone();
            phone.show();
            menu(container);
            break;
        default:break;
    }
}
function menu(element) {
    var main = document.createElement('div');
    main.classList.add("back");
    var btn = document.createElement('button');
    btn.classList.add("btn");
    btn.innerText = "Назад";
    btn.addEventListener('click', function() {location.reload();});
    main.appendChild(btn);
    element.appendChild(main);
}