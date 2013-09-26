#!/usr/bin/ruby
#==========================================================================
=begin
 Copyright 2010, martin.vahi@softf1.com that has an
 Estonian personal identification code of 38108050020.
 All rights reserved. This file is licensed under the
 BSD license: http://www.opensource.org/licenses/bsd-license.php
=end
#==========================================================================
if !defined? SIREL_CODE_GENERATION
   x=ENV['SIREL_CODE_GENERATION']
   SIREL_CODE_GENERATION=x if (x!=nil and x!="")
end # if
require SIREL_CODE_GENERATION+"/sirel_cg1.rb"
#==========================================================================

s_name="css"
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_ar)
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_ar_add_s)

s_elemeval="$s_elem='<link rel=\"stylesheet\" href=\"'."+
"$elem.'\"  type=\"text/css\">';"
ar_spec=[s_name," ",s_elemeval," ","\"\\n\""]
puts Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_ar_to_s)
puts "\n\n"

#-----------------------------------------------
s_name="javascript"
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_ar)
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_ar_add_s)

s_elemeval="$s_elem='<script type=\"text/javascript\" src=\"'.$elem.'\"></script>';"
ar_spec=[s_name," ",s_elemeval," ","\"\\n\""]
puts Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_ar_to_s)
puts "\n\n"

#-----------------------------------------------
s_name="head_section"
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_ar)
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_ar_add_s)

s_elemeval="$s_elem=$elem;"
ar_spec=[s_name," ",s_elemeval," ","\"\\n\""]
puts Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_ar_to_s)
puts "\n\n"

#-----------------------------------------------
s_name="body"
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_ar)
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_ar_add_s)

s_elemeval="$s_elem=$elem;"
ar_spec=[s_name," ",s_elemeval," ","''"]
puts Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_ar_to_s)
puts "\n\n"

#-----------------------------------------------
s_name="body_attribute"
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_arht)
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_arht_add_s)

s_elemeval="$s_elem=$a_key.'=\"'.$elem.'\"';"
ar_spec=[s_name," ",s_elemeval," ","' '"]
puts Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_arht_to_s)
puts "\n\n"

#-----------------------------------------------
s_name="data_section"
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_arht)
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_arht_add_s)

s_to_s_prefix="$s_prefix='<div id=\""+
"webpage_initiation_data_from_server_div\" "+
"style=\"visibility:hidden;\">'.\"\\n\";"
s_elemeval="$s_elem='<p "+
"id=\"webpage_initiation_data_from_server_'.$a_key.'\" >'.$elem.\'</p>';"
s_to_s_suffix="$s_suffix='</div> <!-- "+
"id==\"webpage_initiation_data_from_server_div\" -->'.\"\\n\";"
ar_spec=[s_name,s_to_s_prefix,s_elemeval,s_to_s_suffix,"\"\\n\""]
puts Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_arht_to_s)
puts "\n\n"


#==========================================================================
