

(function($){
    
    //
    var favicon = {
        
        h:null,
        k:true,
         
        apply: function(i,f,b) {
            if (favicon.h === null && favicon.k) {
                favicon.k = false;
                var u = $('link[rel="shortcut icon"]').attr('href').replace(/\.ico$/, '.php');      
                $.post(u,{i:i,f:f,b:b},function(r){
                    favicon.k = true;
                    console.log('favicon.apply resp:', r);
                    favicon.h = r.trim();
                    favicon.refresh();
                });
            }
        },
        refresh: function() {
            
            var l = $('link[rel="shortcut icon"]');
            
            var u = l.attr('href')+"?r="+Math.random();
            
            l.remove();
           
            (function() {
                var link = document.createElement('link');
                link.type = 'image/x-icon';
                link.rel = 'shortcut icon';
                link.href = u;
                document.getElementsByTagName('head')[0].appendChild(link);
            }());
        }
    };

    
    
    
    
    

    
    window.favicon = favicon;
    
    
})(jQuery);




