$(document).ready(function(){
    var count = 0;
    $('#menu-toggle').on('click',function(){
        count++;
           var isEven = function(someNumber) {
           return (someNumber % 2 === 0) ? true : false;
       };
       if (isEven(count) === false) {
             $('#mySidepanel').width('250px');   
        } else if (isEven(count) === true) {
            $('#mySidepanel').width('0px');
       }
    });
  });