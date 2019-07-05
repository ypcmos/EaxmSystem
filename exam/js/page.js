addEventListener("load", function(){
    myScroll = new IScroll('#wrapper', { mouseWheel: true,
                                        preventDefault:false,
                                        //click: true, 
                                        //useTransition: false ,
                                        //bounceEasing: 'elastic', 
                                        //bounceTime: 1200
                                       });
    document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false); 
}, false);