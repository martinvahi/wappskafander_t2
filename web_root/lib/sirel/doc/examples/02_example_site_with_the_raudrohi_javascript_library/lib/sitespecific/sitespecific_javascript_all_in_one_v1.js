//=========================================================================
// Author: martin.vahi@softf1.com that has an
// Estonian personal identification code of 38108050020.
// This file is in public domain.
//=========================================================================

window.func_do_some_totally_unexplained_stuff_to_demonstrate_the_presence_of_JavaScript=function(){
	var s_our_widget_html_id='a_button_from_javascript';
	var s_button_label = "This is a button that is created with the Raudrohi JavaScript Library";
	var btn = new raudrohi.widgets.g1.button_t1(
		s_our_widget_html_id, s_button_label);

	var s_color_white='#FFFFFF';
	var s_color_black='#000000';

	btn.b_black='t';
	btn.set_colors(s_color_white,s_color_black);

	btn.evh_button_pushed_impl=function(){
		//btn.hide(true);
		if (btn.b_black=='t'){
			btn.set_label('___White___');
			btn.set_colors(s_color_black,s_color_white);
			btn.b_black='f';
			var ob=document.getElementById('the_document_body');
			ob.setAttribute('style','background-color:'+s_color_black+';');
		} else {
			btn.set_label('___Black___');
			btn.set_colors(s_color_white,s_color_black);
			btn.b_black='t';
			var ob=document.getElementById('the_document_body');
			ob.setAttribute('style','background-color:'+s_color_white+';');
		} // if
	} // evh_button_pushed_impl

	var s_widget_wrapper_div_html_id=s_our_widget_html_id+"_div";
	raudrohi.base.set_innerHTML('for_javascript',
		'<div id="'+s_widget_wrapper_div_html_id+'"></div>');
	btn.startup_sequence_init();
	btn.unhide();
} // func_do_some_totally_unexplained_stuff_to_demonstrate_the_presence_of_JavaScript

window.onload = function() {
	// The reason, why the raudrohi.run gets called from this, onload, method,
	// is that this way it's guaranteed that all of the necessary
	// JavaScript files have been downloaded prior to the start of
	// the program execution.
	raudrohi.run(true,
		window.func_do_some_totally_unexplained_stuff_to_demonstrate_the_presence_of_JavaScript);
} // window.onload

