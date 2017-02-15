var move_white = 0;
var move_black = 0;

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
    
    //создание блоков клеток чередуя светлые и темные
    for(var i = 0 ; i < 8; i++)
        {
            for(var j = 0 ; j < 8 ; j++)
                {
                    if((i+j) == 0){
                        var cell_class = document.createElement('div');
                        cell_class.className = "cell";
                        cell_class.classList.add("white");
                        cell_class.innerText = cell.length;
                        cell.push(cell_class);
                        }else if( ((i+j)% 2) == 0)
                        {
                            var cell_class = document.createElement('div');
                            cell_class.className = "cell";
                            cell_class.classList.add("white");
                            cell_class.innerText = cell.length;
                            cell.push(cell_class);
                        }else{
                            var cell_class = document.createElement('div');
                            cell_class.className = "cell";
                            cell_class.classList.add("black");
                            cell_class.innerText = cell.length;
                            cell.push(cell_class);
                }
                }
        }
    
    //выставление фигур + создание слушателя
    cell = chess_put(cell);
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
//вставка фигур по их позициям в лектку и добавление слушетеля
function chess_put(cell)
{
    var chess = create_chess();
    var func = function(v){chess_focus(v);}
    //добавляем в клетку по позиции фигуры картинку фигуры и ее обработчик
    for(var i = 0 ; i < 8 ;i ++)
        {
            //белые
            var pawn = chess.white.pawn[i];
            var text_pawn_white = document.createElement('strong');
            text_pawn_white.innerText = pawn.img;
            var div_pawn_white = document.createElement('div');
            div_pawn_white.appendChild(text_pawn_white);
            div_pawn_white.addEventListener("click", function(pawn){ return function(){func(pawn)}}(pawn));
            cell[pawn.cell].appendChild(div_pawn_white);
            
            //черные
            pawn = chess.black.pawn[i];
            var text_pawn_black =document.createElement('strong');
            text_pawn_black.innerText = pawn.img;
            var div_pawn_black = document.createElement('div');
            div_pawn_black.appendChild(text_pawn_black);
            div_pawn_black.addEventListener("click", function(pawn){ return function(){func(pawn)}}(pawn));
            cell[pawn.cell].appendChild(div_pawn_black);
            
           if(i < 2){
                //белые
                var figur = chess.white;
               
                //конь
                var horse = figur.horse[i];
                var text_horse = document.createElement('strong');
                text_horse.innerText = horse.img;
                var div_horse = document.createElement('div');
                div_horse.appendChild(text_horse);
                div_horse.addEventListener("click", function(horse){ return function(){func(horse)}}(horse));
                cell[horse.cell].appendChild(div_horse);
                //слон
                var elep = figur.elephant[i];
                var text_elep = document.createElement('strong');
                text_elep.innerText = elep.img;
                var div_elep = document.createElement('div');
                div_elep.appendChild(text_elep);
                div_elep.addEventListener("click", function(elep){ return function(){func(elep)}}(elep));
                cell[elep.cell].appendChild(div_elep);

                //ладья
                var rook = figur.rook[i];
                var text_rook = document.createElement('strong');
                text_rook.innerText = figur.rook[i].img;
                var div_rook = document.createElement('div');
                div_rook.appendChild(text_rook);
                div_rook.addEventListener("click", function(rook){ return function(){func(rook)}}(rook));
                cell[rook.cell].appendChild(div_rook);
                
                //черные
                figur = chess.black;
                
                //конь
                horse = figur.horse[i];
                var text_black_horse = document.createElement('strong');
                text_black_horse.innerText = horse.img;
                var div_black_horse = document.createElement('div');
                div_black_horse.appendChild(text_black_horse);
                div_black_horse.addEventListener("click", function(horse){ return function(){func(horse)}}(horse));
                cell[horse.cell].appendChild(div_black_horse);
                
                //слон
                elep = figur.elephant[i];
                var text_black_elep = document.createElement('strong');
                text_black_elep.innerText = elep.img;
                var div_black_elep = document.createElement('div');
                div_black_elep.appendChild(text_black_elep);
                div_black_elep.addEventListener("click", function(elep){ return function(){func(elep)}}(elep));
                cell[elep.cell].appendChild(div_black_elep);
               
                //ладья
                rook = figur.rook[i];
                var text_black_rook = document.createElement('strong');
                text_black_rook.innerText = rook.img;
                var div_black_rook = document.createElement('div');
                div_black_rook.appendChild(text_black_rook);
                div_black_rook.addEventListener("click", function(rook){ return function(){func(rook)}}(rook));
                cell[rook.cell].appendChild(div_black_rook);
            }
        }
    
    //добавляем короля и королеву
    //белые
    var queen = chess.white.queen;
    var text_white_qu = document.createElement('strong');;
    text_white_qu.innerText = queen.img;
    var div_white_qu = document.createElement('div');
    div_white_qu.appendChild(text_white_qu);
    div_white_qu.addEventListener("click", function(queen){ return function(){func(queen)}}(queen));
    cell[queen.cell].appendChild(div_white_qu);
    
    var king = chess.white.king;
    var text_white_kg = document.createElement('strong');;
    text_white_kg.innerText = king.img;
    var div_white_kg = document.createElement('div');
    div_white_kg.appendChild(text_white_kg);
    div_white_kg.addEventListener("click", function(king){ return function(){func(king)}}(king));
    cell[king.cell].appendChild(div_white_kg);
    
    //черные
    queen = chess.black.queen;
    var text_black_qu = document.createElement('strong');;
    text_black_qu.innerText = queen.img;
    var div_black_qu = document.createElement('div');
    div_black_qu.appendChild(text_black_qu);
    div_black_qu.addEventListener("click", function(queen){ return function(){func(queen)}}(queen));
    cell[queen.cell].appendChild(div_black_qu);
    
    king = chess.black.king;
    var text_black_kg = document.createElement('strong');
    text_black_kg.innerText = king.img;
    var div_black_kg = document.createElement('div');
    div_black_kg.appendChild(text_black_kg);
    div_black_kg.addEventListener("click", function(king){ return function(){func(king)}}(king));
    cell[king.cell].appendChild(text_black_kg);
    
    return cell;
}
//слушатель для фигуры
function chess_focus(chess)
{
    var cell = document.getElementsByClassName('cell');
    cell = remove_class_move(cell);
    var position = chess.cell;
    var move = chess.move;
    var active_move = [];
    var active_attac = [];
    //проверка на возможность сделать первый ход через клетку пешкой
    if(chess.hasOwnProperty('firstmove')){
        if((chess.color == "white") && (move_white == 0)){
            move*=-2;
        }
        if((chess.color == "black") && (move_black == 0)){
            move*=2;
        }
    }
    //проверка на возможность атаки фигуры в рамках доски
    
        for(var i = 0 ; i < chess.attac.length ; i++)
            {
                if(borde_out(chess.attac[i], position)){
                    active_attac.push(chess.attac[i]);
                }
            }
    //проверка на возможный ход в рамки доски без учета других фигур
    if(Array.isArray(move)){
        for(var i = 0 ; i < move.length; i++)
            {
                if(borde_out(move[i], position)){
                    active_move.push(move[i]);
                }
            }
    }else{
        if(borde_out(move, position)){
                    active_move.push(move);
                }
    }
    console.log(position+active_move);
  for(var i = 0 ; i < active_move.length; i++)
      {
          cell[position+active_move[i]].classList.add('move');
          cell[position+active_move[i]].addEventListener("click", move_chois());
      }
}
function remove_class_move(cell)
{
    for(var i = 0; i < cell.length;i++)
        {
            for(var key in cell[i].classList)
                {
                    if(cell[i].classList[key] == "move"){
                        cell[i].classList.remove('move');
                    }
                }
        }
    return cell;
}
function move_chois()
{
    
}
//установка граници  движение фигур
function borde_out(move, position)
{
    var ret = true;
    var proc = position + move;
    if((proc < 0) || (proc > 63)){
        return false;
    }
       
    for(var i = 0 ; i < 7;i++)
        {
            if( ((position == (i*8)) && (proc == (15+(i*8)))) || ((position == (7+(8*i))) && (proc == (7+(8*i+1)))) || ((position = (63-(i*8))) && (proc == (63-(i*8)-15))) || ((position == (8*(7-i))) && (proc == (8*(7-i)-1)))){
                
                return false;
            }
            
        }
    
    return true;
}

function player_chois()
{
    var btn_singl = document.createElement('button');
    var btn_multy = document.createElement('button');
    btn_singl.classList.add('btn');
    btn_singl.classList.add('singl');
    btn_singl.innerText = "Один игрок";
    btn_multy.classList.add('btn');
    btn_multy.classList.add('multy');
    btn_multy.innerText = "Два игрока";
    
    var btn_block = document.getElementsByClassName("button-block")[0];
    var del_btn = document.getElementsByClassName("btn");
    delete_elements(del_btn, btn_block);
    
    btn_block.appendChild(btn_singl);
    btn_block.appendChild(btn_multy);
    
    btn_multy.addEventListener('click', function(){
       create_board(); 
    });
    
    btn_singl.addEventListener('click', function(){
       create_board; 
    });
}

function delete_elements(elements, parent)//удаление элементов 2 аргумента массив элементов(1 вид элементов) и их родитель
{
    for(var i = 0 ; i < elements.length;i++)
        {
           parent.removeChild(elements[i]);
        }
}

function create_chess()//создание шахматных фигур
{
    var chess ={
        white:{
            pawn: [],
            horse:[],
            elephant:[],
            rook:[],
            queen:{
                img:"\u2655",
                cell: 59,
                attac: [],
                move: null,
                color: "white"
            },
            king:{
                img:"\u2654",
                cell: 60,
                attac: [],
                move: null,
                color: "white"
            }
        },
        black:{
            pawn: [],
            horse:[],
            elephant:[],
            rook:[],
            queen:{
                img:"\u265B",
                cell: 3,
                attac: [1],
                move: null,
                color: "black"
            },
            king:{
                img:"\u265A",
                cell: 4,
                attac: [1],
                move: null,
                color: "black"
            }
        }
    };
    
    //заполнение масива под фигуры
    for(var i = 0 ; i < 8 ; i++)
        {
            //пешки
            
            //черные
            chess.black.pawn.push({img:"\u265F",
                cell: (8+i),
                attac: [1],
                firstmove: 2,
                move: 8,
                color: "black"});
            //белые
            chess.white.pawn.push({
                img:"\u2659",
                cell: (48+i),
                attac: [1],
                firstmove: 2,
                move: 8,
                color: "white"}); 
            
            //создание 2-ух конь,слон,лодья
            if(i<2){
                //белые
                chess.white.horse.push({img:"\u2658",
                cell: (57+(i*5)),
                attac: [1],
                move: null,
                color: "white"});
                
                chess.white.elephant.push({img:"\u2657",
                cell: (58+(i*3)),
                attac: [1],
                move: null,
                color: "white"});
                
                chess.white.rook.push({img:"\u2656",
                cell: (56+(i*7)),
                attac: [1],
                move: null,
                color: "white"});
                
                //черные
                chess.black.horse.push({img:"\u265E",
                cell: (1+(i*5)),
                attac: [1],
                move: null,
                color: "black"});
                
                chess.black.elephant.push({img:"\u265D",
                cell: (2+(i*3)),
                attac: [1],
                move: null,
                color: "black"});
                
                chess.black.rook.push({img:"\u265C",
                cell: (0+(i*7)),
                attac: [1],
                move: null,
                color: "black"});
            }
        }
    
    
    return chess;
}