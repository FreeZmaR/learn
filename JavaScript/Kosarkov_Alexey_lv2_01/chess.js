/**
 * Created by aser on 14.02.2017.
 */
function ChessBoard() {
    //доска
    var board = document.createElement('div');
    board.classList.add("board");
    //блок для цыфр
    var block_number = document.createElement('div');
    block_number.classList.add("block", "block_number");
    var block_number_duplicate = document.createElement('div');
    block_number_duplicate.classList.add("block", "block_number");
    //блок букв
    var block_letter = document.createElement('div');
    block_letter.classList.add("block", "block_letter");
    var block_letter_duplicate = document.createElement('div');
    block_letter_duplicate.classList.add("block", "block_letter");
    //пол умолчанию в низу белые
    var start_chess = "white";
    //блок с выводом активной клетки
    var table_move = document.createElement('div');
    table_move.classList.add("table_move");
    table_move.innerText = " ";
    //блок для клеток
    var block_cell = document.createElement('div');
    block_cell.classList.add("block_cell");
    // cell объект содержит массив блоков клеток и их стиль
    var cell = {
        cell_arr: [],
        height: 50,
        width: 50
    };
    //добавляем в массив cell блоки клеток чередуя цвет , четные и не четные
    for(var i = 0 ; i < 8; i++)
    {
        for(var j = 0 ; j < 8 ; j++)
        {
            //создание клетки в зависимости от суммы i и j : четные - белые , не четные черные
            if((i+j) == 0){
                var cell_class = document.createElement('div');
                cell_class.classList.add("cell", "white");
                //cell_class.innerText = cell.cell_arr.length; - для отладки
                //задаем высату и ширину клетки
                cell_class.style.width = cell.width+"px";
                cell_class.style.height = cell.height+"px";
                cell_class.addEventListener('click', function(i, j){return function(){activeCell(i, j)}}(i, j));
                cell.cell_arr.push(cell_class);
            }else if( ((i+j)% 2) == 0)
            {
                var cell_class = document.createElement('div');
                cell_class.classList.add("cell", "white");
                //cell_class.innerText = cell.cell_arr.length; - для отладки
                //задаем высату и ширину клетки
                cell_class.style.width = cell.width+"px";
                cell_class.style.height = cell.height+"px";
                cell_class.addEventListener('click', function(i, j){return function(){activeCell(i, j)}}(i, j));
                cell.cell_arr.push(cell_class);
            }else{
                var cell_class = document.createElement('div');
                cell_class.classList.add("cell", "black");
                //cell_class.innerText = cell.cell_arr.length; - для отладки
                //задаем высату и ширину клетки
                cell_class.style.width = cell.width+"px";
                cell_class.style.height = cell.height+"px";
                cell_class.addEventListener('click', function(i, j){return function(){activeCell(i, j)}}(i, j));
                cell.cell_arr.push(cell_class);
            }
        }
    }
    //выставляем клетки в блок для клеток
    for(var i = 0 ; i < 64; i++){
        block_cell.appendChild(cell.cell_arr[i]);
    }
    //добавляем в блоки буквы и цыфры
    for(var i = 0 ; i < 8 ; i++){
        var number = document.createElement('div');
        number.className = "number";
        number.innerText = ""+(i+1);
        number.style.height = (cell.height)+"px";
        block_number.appendChild(number);
        var number_duplicate = document.createElement('div');
        number_duplicate.className = "number";
        number_duplicate.innerText = ""+(i+1);
        number_duplicate.style.height = (cell.height)+"px";
        block_number_duplicate.appendChild(number_duplicate);
        var letter = document.createElement('div');
        letter.className = "letter";
        letter.innerText = numToLet(i+1);
        letter.style.width = (cell.width)+"px";
        block_letter.appendChild(letter);
        var letter_duplicate = document.createElement('div');
        letter_duplicate.className = "letter";;
        letter_duplicate.innerText = numToLet(i+1);
        letter_duplicate.style.width = (cell.width)+"px";
        block_letter_duplicate.appendChild(letter_duplicate);
    }
    //добавляем все элименты на доску
    block_letter.style.width = (cell.width*8)+"px";
    board.appendChild(block_letter);
    block_number.style.height = (cell.height*8)+"px";
    board.appendChild(block_number);
    block_cell.style.width = (cell.width*8)+"px";
    block_cell.style.height = (cell.height*8)+"px";
    board.appendChild(block_cell);
    block_number_duplicate.style.height = (cell.height*8)+"px";
    board.appendChild(block_number_duplicate);
    block_letter_duplicate.style.width = (cell.width*8)+"px";
    board.appendChild(block_letter_duplicate);
    board.appendChild(table_move);
    //слушатель для клетки
    var activeCell = function(i , j) {
        if(document.getElementsByClassName('cell_show')[0] != undefined){
            table_move.removeChild(document.getElementsByClassName('cell_show')[0]);
        }

        var cell_show = document.createElement('span');
        cell_show.classList.add("cell_show");
        cell_show.innerText = getCellName((i+1), (j+1));
        table_move.appendChild(cell_show);
    };
    //выбор цвет фигур
    this.choisChess = function(color) {
        //проверка на правильность указания цвета, иначе белые
        switch(color){
            case "black": start_chess = color;
            break;
            default: break;
        }

    };
    //создает доску после переданого элемента
    this.creatBoardAfter = function(element){
       if(element){
           board.style.width = (32 + cell.width*8)+"px";
           element.parentNode.appendChild(board);
       }
    };
    //создает доску в переданого элемента
    this.creatBoardIn = function(element) {
        if(element){
            board.style.width = (32 + cell.width*8)+"px";
            board.style.marginTop = "10%";
            element.appendChild(board);
        }

    };
    //задаем размер клеток
    this.setStyleCell = function(height, width) {
        //проверка на корректные размеры
        if((height < 100) && (width < 100) && (height > 0) && (width > 0)){
            cell.width = width;
            cell.height = height;
        }
    };
    function getCellName(i, j) {
        var name = "";
        switch(i){
            case 1: name+= 1;
                break;
            case 2: name+= 2;
                break;
            case 3: name+= 3;
                break;
            case 4: name+= 4;
                break;
            case 5: name+= 5;
                break;
            case 6: name+= 6;
                break;
            case 7: name+= 7;
                break;
            case 8: name+= 8;
                break;
            default: name+=0;
            break;
        }
        name+= numToLet(j);
        return name;
    }

    function numToLet(num) {
        switch(num){
            case 1: return "A";
                break;
            case 2: return "B";
                break;
            case 3: return "C";
                break;
            case 4: return "D";
                break;
            case 5: return "E";
                break;
            case 6: return "F";
                break;
            case 7: return "G";
                break;
            case 8: return "H";
                break;
            default: return "0";
        }
    }
}