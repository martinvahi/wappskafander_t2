#!/usr/bin/ruby
#==========================================================================
=begin
 Copyright 2010, martin.vahi@softf1.com that has an
 Estonian personal identification code of 38108050020.
 This file is licensed under the BSD license:
 http://www.opensource.org/licenses/bsd-license.php
=end
#==========================================================================
if !defined? SIREL_CODE_GENERATION
   x=ENV['SIREL_CODE_GENERATION']
   SIREL_CODE_GENERATION=x if (x!=nil and x!="")
end # if
require SIREL_CODE_GENERATION+"/sirel_cg1.rb"
#==========================================================================
s_name="ZZ"
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_declr_arht)
puts Kibuvits_cg.fill_form(s_name,Sirel_cg1.inst.s_form_func_arht_add_s)

s_elemeval="$s_elem='$s_key=='.$a_key.'  $elem=='.$elem;"
ar_spec=[s_name," ",s_elemeval," ","'<br/>'"]
puts Kibuvits_cg.fill_form(ar_spec,Sirel_cg1.inst.s_form_func_arht_to_s)
puts "\n\n"


#==========================================================================
