/**
 * Created by aser on 11.02.2017.
 */

var head_menu = document.getElementsByClassName('head_menu')[0];
var head_menu_buffer = document.getElementsByClassName('head_menu_buffer')[0];
var head_menu_position = head_menu.getBoundingClientRect().top + window.pageYOffset;

window.onscroll = function () {
    if(head_menu.classList.contains('fixed') && (window.pageYOffset < head_menu_position)){
        head_menu.classList.remove('fixed');
        head_menu_buffer.style.display = "none";
    }else if(window.pageYOffset >= head_menu_position){
        head_menu.classList.add('fixed');
        head_menu_buffer.style.display = "block";
    }
};
