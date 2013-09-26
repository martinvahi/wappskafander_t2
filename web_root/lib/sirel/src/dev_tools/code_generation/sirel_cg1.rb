#!/usr/bin/ruby
#==========================================================================
=begin
 Copyright 2010, martin.vahi@softf1.com that has an
 Estonian personal identification code of 38108050020.
 All rights reserved.

 Redistribution and use in source and binary forms, with or
 without modification, are permitted provided that the following
 conditions are met:

 * Redistributions of source code must retain the above copyright
   notice, this list of conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer
   in the documentation and/or other materials provided with the
   distribution.
 * Neither the name of the Martin Vahi nor the names of its
   contributors may be used to endorse or promote products derived
   from this software without specific prior written permission.

 THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
 CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES,
 INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR
 CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY,
 WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

=end
#==========================================================================
if !defined? KIBUVITS_HOME
   x=ENV['KIBUVITS_HOME']
   KIBUVITS_HOME=x if (x!=nil and x!="")
   require KIBUVITS_HOME+"/src/include/kibuvits_boot.rb"
end # if

require KIBUVITS_HOME+"/src/include/kibuvits_msgc.rb"
require KIBUVITS_HOME+"/src/include/kibuvits_gstatement.rb"
require KIBUVITS_HOME+"/src/include/kibuvits_cg.rb"

require "singleton"

#==========================================================================

class Sirel_cg1
   attr_reader :s_form_declr_arht, :s_form_declr_ar
   attr_reader :s_form_func_arht_add_s, :s_form_func_ar_add
   attr_reader :s_form_func_ar_add_s
   attr_reader :s_form_func_arht_to_s, :s_form_func_ar_to_s
   attr_reader :s_form_func_b_entry_point

   def init_templates
      s_warning=""+
      "	   // WARNING: This function resides in an autogeneration region.\n"

      @s_form_declr_arht=""+
      "	private $cg_arht_[CODEGENERATION_BLANK_0]_ = array();\n"
      @s_form_declr_ar=@s_form_declr_arht.gsub("arht","ar")

      @s_form_func_arht_add_s=""+
      "	public function add_2_arht_[CODEGENERATION_BLANK_0]($s_name, $s_value) {\n"+
      s_warning+
      "		$this->cg_arht_[CODEGENERATION_BLANK_0]_[$s_name] = $s_value;\n"+
      "	} // add_2_arht_[CODEGENERATION_BLANK_0]\n"

      @s_form_func_ar_add=""+
      "	public function add_2_ar_[CODEGENERATION_BLANK_0]($x_value) {\n"+
      s_warning+
      "		array_push($this->cg_ar_[CODEGENERATION_BLANK_0]_,$x_value);\n"+
      "	} // add_2_ar_[CODEGENERATION_BLANK_0]\n"

      @s_form_func_ar_add_s=""+
      "	public function add_2_ar_[CODEGENERATION_BLANK_0]($s_value) {\n"+
      s_warning+
      "		array_push($this->cg_ar_[CODEGENERATION_BLANK_0]_,$s_value);\n"+
      "	} // add_2_ar_[CODEGENERATION_BLANK_0]\n"

      @s_form_func_arht_to_s=""+
      "	public function to_s_arht_[CODEGENERATION_BLANK_0]($s_separator=[CODEGENERATION_BLANK_4]) {\n"+
      s_warning+
      "     $s_prefix='';\n"+
      "     [CODEGENERATION_BLANK_1]\n"+
      "	    $s_out=$s_prefix;\n"+
      "	    $b_nonfirst=False;\n"+
      "	    $s_elem='';\n"+
      "     $ar_keys=array_keys($this->cg_arht_[CODEGENERATION_BLANK_0]_);\n"+
      "	    foreach ($ar_keys as $a_key) {\n"+
      "         $elem=$this->cg_arht_[CODEGENERATION_BLANK_0]_[$a_key];\n"+
      "	        if($b_nonfirst!=False) {\n"+
      "	            $s_out=$s_out.$s_separator;\n"+
      "	        } // if\n"+
      "         [CODEGENERATION_BLANK_2]\n"+
      "	        $s_out=$s_out.$s_elem;\n"+
      "	        $b_nonfirst=True;\n"+
      "	     } // foreach\n"+
      "     $s_suffix='';\n"+
      "     [CODEGENERATION_BLANK_3]\n"+
      "	    $s_out=$s_out.$s_suffix;\n"+
      "		return $s_out;\n"+
      "	} // to_s_arht_[CODEGENERATION_BLANK_0]\n"

      @s_form_func_ar_to_s=@s_form_func_arht_to_s.gsub("_arht_","_ar_")

      @s_form_func_b_entry_point=""+
      "//------------------------------------------------------\n"+s_warning+
      "// The reason, why this code block is not in a function, is that\n"+
      "// at that point one just does not have enough information about \n"+
      "// paths to include any custom libraries. This code block is\n"+
      "// under the BSD license.\n"+
      "$s_my_name=''.__FILE__;\n"+
      "$s_running_file_name=''.$_SERVER['SCRIPT_FILENAME'];\n"+
      "$b_this_file_is_an_entry_point=False;\n"+
      "// One uses the normalization to get rid of characters\n"+
      "// that have a special meaning in regex. There will be collisions,\n"+
      "// but they're considered unlikely to happen.\n"+
      "$s_rgx='[\\\\\\\\/.:\\s\\()\\\\[\\\\]+*-\\\\^$]';\n"+
      "//$s_rgx_test_string='(Once).[upon]/a\\time: there+was*a-Red$hat^';\n"+
      "//echo '<br/> $s_rgx_test_string=='.$s_rgx_test_string;\n"+
      "//$s_test_processed=mb_ereg_replace($s_rgx, 'x', $s_rgx_test_string);\n"+
      "//echo '<br/> $s_test_processed=='.$s_test_processed;\n"+
      "$s_my_name_normalized=mb_ereg_replace($s_rgx, 'x', $s_my_name);\n"+
      "$s_running_file_name_normalized=mb_ereg_replace($s_rgx, 'x',\n"+
      "		$s_running_file_name);\n"+
      "$b_a=mb_ereg_match($s_my_name_normalized,$s_running_file_name_normalized);\n"+
      "$b_b=mb_ereg_match($s_running_file_name_normalized,$s_my_name_normalized);\n"+
      "$b_this_file_is_an_entry_point=$b_a&&$b_b;\n"+
      "unset($s_my_name);\n"+
      "unset($s_running_file_name);\n"+
      "unset($s_rgx);\n"+
      "unset($s_my_name_normalized);\n"+
      "unset($s_running_file_name_normalized);\n"+
      "unset($b_a);\n"+
      "unset($b_b);\n"+
      "//echo '<br/> The result is:'.$b_this_file_is_an_entry_point;\n"+
      "//------------------------------------------------------\n"

   end # init_templates

   def initialize
      init_templates
   end # initialize

   def Sirel_cg1.inst
      return Sirel_cg1.instance
   end # Sirel_cg1.inst
   include Singleton
end # class Sirel_cg1


#==========================================================================
