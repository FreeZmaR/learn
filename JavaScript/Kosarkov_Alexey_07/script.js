function create_board()
{
    //создаем блоки элементов доски
    var board = document.createElement('div');
    board.className = "board";
    
    
    //массив с перевернутами буквами
    var flip_latter = ['\u0250','q','\u0254','p','\u01DD','\u025F','\u0183','\u0265'];
    //массив с нормальбными буквами
    var normal_latter = ['a','b','c','d','e','f','g','h'];
   //создаем массив блоков для доски
    var number_left = [];
    var number_right = [];
    var latter_up = [];
    var latter_down = [];
    var cell = [];
    //юникод фигур
    var chess_white = {
        pawn:"\u2659",
        horse:"\u2658",
        elephant:"\u2657",
        rook:"\u2656",
        queen:"\u2655",
        king:"\u2654"
    };
    var chess_black = {
        pawn:"\u265F",
        horse:"\u265E",
        elephant:"\u265D",
        rook:"\u265C",
        queen:"\u265B",
        king:"\u265A"
    };
    //создание блоков клеток чередуя светлые и темные
    for(var i = 0 ; i < 8; i++)
        {
            for(var j = 0 ; j < 8 ; j++)
                {
                    if((i+j) == 0){
                        var cell_class = document.createElement('div');
                        cell_class.className = "cell";
                        cell_class.classList.add("white");
                        cell.push(cell_class);
                        }else if( ((i+j)% 2) == 0)
                        {
                            var cell_class = document.createElement('div');
                            cell_class.className = "cell";
                            cell_class.classList.add("white");
                            cell.push(cell_class);
                        }else{
                            var cell_class = document.createElement('div');
                            cell_class.className = "cell";
                            cell_class.classList.add("black");
                            cell.push(cell_class);
                }
                }
        }
    //выставляем фигуры
    for(var i = 0 ; i < cell.length;i++)
        {
            if(i < 8){
                var text = document.createElement('strong');
                text.innerText = switch_chess(chess_white, i);
                cell[i].appendChild(text);
            }else if(i < 16){
                 var text = document.createElement('strong');
                 text.innerText = switch_chess(chess_white, i);
                 cell[i].appendChild(text);
                }else if( (i > 47) && (i < 56)){
                 var text = document.createElement('strong');
                 text.innerText = switch_chess(chess_black, i);
                 cell[i].appendChild(text);
                }else if( i > 55){
                 var text = document.createElement('strong');
                 text.innerText = switch_chess(chess_black, i);
                 cell[i].appendChild(text);
                }
        }
    
      //создание блоков под буквы и цыфры  
    for(var i = 0 ; i <  8; i++)
        {
            var number_class_left = document.createElement('div');
            number_class_left.className = "number";
            number_class_left.innerText = ""+(8-i);
            number_left.push(number_class_left);
            
            var number_class_right = document.createElement('div');
            number_class_right.className = "number";
            number_class_right.innerText = ""+(8-i);
            number_right.push(number_class_right);
            
            var latter_class_up = document.createElement('div');
            latter_class_up.className = "latter";
            latter_class_up.innerText = flip_latter[i];
            latter_up.push(latter_class_up);
            
            var latter_class_down = document.createElement('div');
            latter_class_down.className = "latter";
            latter_class_down.innerText = normal_latter[i];
            latter_down.push(latter_class_down);
        }
    var side_left = document.createElement('div');
    side_left.className = "side";
    var side_right = document.createElement('div');
    side_right.className = "side";
    var up = document.createElement('div');
    up.className = "up";
    var down = document.createElement('div');
    down.className = "down";
    
   //добавление блоков в свое положение номера и буквы
    for(var i = 0 ; i < 8;i++)
        {
            side_left.appendChild(number_left[i]);
            side_right.appendChild(number_right[i]);
            up.appendChild(latter_up[i]);
            down.appendChild(latter_down[i]);
        }
    
    //добавление блоков с клетками на доску
    for(var i = 0 ; i < 64; i++)
        {
            board.appendChild(cell[i]);
        }
    
    var main = document.getElementById('main');
    var inp = document.getElementsByClassName('inp')[0];
    inp.parentElement.removeChild(inp);
    
    main.appendChild(up);
    main.appendChild(side_left);
    main.appendChild(board);
    main.appendChild(side_right);
    var clear = document.createElement('div');
    clear.classList.add("clear");
    main.appendChild(clear);
    main.appendChild(down);
}

function switch_chess(chess, iter)
    {
        var str = "";
        if( (iter == 0) || (iter == 7) || (iter == 56) || (iter == 63)){
            str = chess['rook'];
            return str;
        }
        if( (iter == 1) || (iter == 6) || (iter == 57) || (iter == 62)){
            str = chess['horse'];
            return str;
        }
        if( (iter == 2) || (iter == 5) || (iter == 58) || (iter == 61)){
            str = chess['elephant'];
            return str;
        }
        if( (iter == 3) || (iter == 59)){
            str = chess['queen'];
            return str;
        }
        if( (iter == 4) ||  (iter == 60)){
            str = chess['king'];
            return str;
        }else{
            str = chess['pawn'];
            return str;
        }
        
    }