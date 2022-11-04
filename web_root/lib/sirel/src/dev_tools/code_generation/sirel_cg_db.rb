#!/usr/bin/ruby
#==========================================================================
=begin
 Copyright 2010, martin.vahi@softf1.com that has an
 Estonian personal identification code of 38108050020.

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
end # if

require "rubygems"
require "monitor"
if defined? KIBUVITS_HOME
   require KIBUVITS_HOME+"/experimental/kibuvits_msgc.rb"
   require KIBUVITS_HOME+"/experimental/kibuvits_str.rb"
   require KIBUVITS_HOME+"/experimental/kibuvits_gstatement.rb"
   require KIBUVITS_HOME+"/experimental/kibuvits_cg.rb"
else
   require "kibuvits_msgc.rb"
   require "kibuvits_src.rb"
   require "kibuvits_gstatement.rb"
   require "kibuvits_cg.rb"
end # if

require "singleton"

#==========================================================================
class Sirel_cg_db_table_init
   def init_templates
      s_warning=""+
      "	   // WARNING: This function resides in an autogeneration region.\n"
   end # init_templates

   def initialize
   end # initialize

   def to_s_ensure_table_existence
   end # to_s_ensure_table_existence

end # class Sirel_cg_db_table_init

#--------------------------------------------------------------------------
class Sirel_cg_db

   def init_templates
      s_warning=""+
      "	   // WARNING: This function resides in an autogeneration region.\n"

      @s_form_declr_arht=""+
      "	private $cg_arht_[CODEGENERATION_BLANK_0]_ = array();\n"
      @s_form_declr_ar=@s_form_declr_arht.gsub("arht","ar")

      @s_form_func_drop_tables=""+
      "      public function drop_tables() {\n"+s_warning+
      "		try {\n"+
      "			// The delete_table checks for table existence.\n"+
      "			[CODEGENERATION_BLANK_0]"+
      "		}catch (Exception $err_exception) {\n"+
      "			sirelBubble(__FILE__,__LINE__,$err_exception,\n"+
      "					__CLASS__.'->'.__FUNCTION__.': ');\n"+
      "		} // catch\n"+
      "      } // drop_tables"

      @s_form_func_drop_tables_list_entry=""+
      "$this->db_->delete_table([CODEGENERATION_BLANK_0]);\n"

      @s_form_func_tables_exist=""+
      " public function tables_exist() {\n"+s_warning+
      "		try {\n"+
      "		    $b=True;\n"+
      "         [CODEGENERATION_BLANK_0]"+
      "			return $b;\n"+
      "		}catch (Exception $err_exception) {\n"+
      "			sirelBubble(__FILE__,__LINE__,$err_exception,\n"+
      "					__CLASS__.'->'.__FUNCTION__.': ');\n"+
      "		}\n"+
      "	} // tables_exist"

      @s_form_func_tables_exist_entry=""+
      "			$b=$b&&($this->db_->table_exists([CODEGENERATION_BLANK_0]));\n"

      @s_form_func_ensure_table_existence=""+
      "	public function ensure_tbl_existence_[CODEGENERATION_BLANK_0]() {\n"+
      s_warning+
      "		try {\n"+
      "			$b=$this->db_->table_exists('[CODEGENERATION_BLANK_0]');\n"+
      "			if($b) return;\n"+
      "			$id_max_length=$this->db_->get_ID_max_length();\n"+
      "			$s1= ' '.\n"+
      "                 [CODEGENERATION_BLANK_1]"+
      "					' ';\n"+
      "			$this->db_->ensure_table_existence('[CODEGENERATION_BLANK_0]',$s1);\n"+
      "		}catch (Exception $err_exception) {\n"+
      "			sirelBubble(__FILE__,__LINE__,$err_exception,\n"+
      "					__CLASS__.'->'.__FUNCTION__.': ');\n"+
      "		}\n"+
      "	} // ensure_tbl_existence_[CODEGENERATION_BLANK_0]"


   end # init_templates

   def initialize
      init_templates
   end # initialize

   def to_s_drop_tables(s_or_ar_of_table_names)
      s_out=Kibuvits_cg.assemble_list_by_forms(
      @s_form_func_drop_tables,@s_form_func_drop_tables_list_entry,
      s_or_ar_of_table_names)
      return s_out
   end # to_s_drop_tables

   def to_s_tables_exist(s_or_ar_of_table_names)
      s_out=Kibuvits_cg.assemble_list_by_forms(
      @s_form_func_tables_exist,@s_form_func_tables_exist_entry,
      s_or_ar_of_table_names)
      return s_out
   end # to_s_tables_exist

   # Example of the s_columns_declaration value:
   #
   # "'dbf_attr_name scty_txt, dbf_i_coord1 scty_int,"+
   # "id scty_varchar('.$id_max_length.')'"
   #
   # A thing to notice at the example is the existence of
   # the PHP string quotes.
   def to_s_ensure_table_existence(s_table_name,s_columns_declaration)
      bn=binding()
      kibuvits_typecheck bn, String, s_table_name
      kibuvits_typecheck bn, String, s_columns_declaration
      s_cldec1=Kibuvits_str.normalise_linebreaks(s_columns_declaration)
      s_cldec1=s_cldec1.gsub(/[\s\n\r\t]+/," ")
      ht_needles=Hash.new
      ht_needles[',']=",'.\n'"
      s_cldec2=Kibuvits_str.s_batchreplace(ht_needles, s_cldec1)+".\n"
      s_out=Kibuvits_cg.fill_form([s_table_name,s_cldec2],
      @s_form_func_ensure_table_existence)
      return s_out
   end # to_s_ensure_table_existence

   def Sirel_cg_db.inst
      return Sirel_cg_db.instance
   end # Sirel_cg_db.inst
   include Singleton
end # class Sirel_cg_db


#==========================================================================
