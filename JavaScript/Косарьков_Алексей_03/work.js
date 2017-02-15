function fizbuz ()
{
    
for ( var i = 1 ; i < 101; i++ )
    {
        console.log( ((i%3)==0) ?  ((i%5)==0) ? "FizzBuzz" : "Fizz" : ((i%5)==0) ? "Buzz" : i);
    }
    
}

function board()
{
    var star= "";
    var chois = ["#"," "];
    var iter = 0;
    
    for (var i = 0 ; i < 64 ; i++)
        {
           
           if(i%8==0&&i!=0) {
                star+="\n";
                iter= (iter==1) ? 0 : 1;
            }
            if(iter==2) {iter=0;}  
            star+= chois[iter];
            iter++;
        }
  console.log(star);
   
}

function triangle()
{
    var s = "#";
    var num = +prompt("Введите высату треуголника (не меньше 3): ")
    if(num<3){
        while(true)
            {
                num = +prompt("Не меньше 3!\nВведите высату треуголника ): ")
                if(num>=3){break;}
            }
    }
    else{
    for(var i = 0 ; i < num;i++)
        {
            console.log(s+"\n");
            s=s+"#";
        }
    }
}