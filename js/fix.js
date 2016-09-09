;(function($){
	
$(document).ready(function(){

	$("ul#dw-navbar-menu li").each(function(){	
		var t = $(".fixjs[name=title]").val();
		var a = $(this).children("a").attr("title");
		if (a===t) {
			$(this).addClass("uk-active");
		} else {
			t = t.split(":");
			a = a.split(":");
			if (t[0]===a[0]) {
				$(this).addClass("uk-active");
			}		
		}
	});
	
	$("ul.uk-nav li").each(function(){
		if ($(this).children("a").size() > 0) {
			if ($(this).children("a").attr("title")===$(".fixjs[name=title]").val()) {
				$(this).addClass("uk-active");
			}
		} else {
			$(this).addClass("uk-nav-header");
		}
	});
	
	$("form").each(function(){
		$(this).addClass("uk-form");
	});
	
	$("pre > code").each(function(i,e){
		hljs.highlightBlock(e); 
	});
	
	if ($("article.uk-article #dw__editform").size() === 0) {
		$("article.uk-article").html(function(i,html){
			return html
				.replace('[article-subtitle]','<h3 class="tm-article-subtitle">')
				.replace('[/article-subtitle]','</h3>')
			;		
		});
	}
	
});
	
})(jQuery);


