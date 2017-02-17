function Phone() {
    var xhr = new XMLHttpRequest();
    xhr.open('post' , 'phone.json', true);

    var info = document.createElement('h2');
    info.innerText = "Идет загрузка...";
    //в какую облость DOM вставить информацию
    var place_show = document.body;
    //в какой элемент расположить вывод
    this.setPlace = function (element) {
      if(element){
          place_show = element;
      }
    };
    this.show = function() {
        place_show.appendChild(info);
        xhr.send();
        xhr.onreadystatechange = function(){
           if(xhr.readyState != 4) return;

           if(xhr.status == 200){
               place_show.removeChild(info);
               place_show.appendChild(content(xhr.responseText));
           }else {
               info.innerText = "Произошла ошибка!";
           }
        };

    }

    function content(responseText){
        var content = document.createElement('ul');
        content.className = "content";
        var model = JSON.parse(responseText);
        for(var i = 0; i < model.length;i++)
        {
            var li_1 = document.createElement('li');
            li_1.className = "li_1";
            li_1.addEventListener('click', function(i){
                return function(){showOl(i)}}(i));
            var ol = document.createElement('ol');
            ol.className = "ol_"+i;
            for(var key in model[i]){
                if(key == 'name'){
                    li_1.innerText = model[i][key];
                }else{
                    var li_2 = document.createElement('li');
                    li_2.innerText = model[i][key];
                    ol.appendChild(li_2);
                }
            }
            content.appendChild(li_1);
            content.appendChild(ol);
        }
        //для скрытия текста

        var showOl = function(i) {
            var show_ol = document.getElementsByClassName('ol_'+i)[0];
            if(show_ol != undefined){
                if(show_ol.style.display == 'none'){
                    show_ol.style.display = 'block';
                }else{
                    show_ol.style.display = 'none';
                }
            }
        };
        //убираем из DOM <br>
        /*
        var br_tag = content.getElementsByTagName('br');
        while(br_tag[0]){
            br_tag[0].parentNode.removeChild(br_tag[0]);
        }
        */
        return content;
    }
}
