#!/usr/bin/env ruby
#==========================================================================
=begin
 Copyright 2012, martin.vahi@softf1.com that has an
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
   require 'pathname'
   ob_pth_0=Pathname.new(__FILE__).realpath
   ob_pth_1=ob_pth_0.parent.parent.parent.parent
   s_KIBUVITS_HOME_b_fs=ob_pth_1.to_s
   require(s_KIBUVITS_HOME_b_fs+"/src/include/kibuvits_boot.rb")
   ob_pth_0=nil; ob_pth_1=nil; s_KIBUVITS_HOME_b_fs=nil
end # if

require  KIBUVITS_HOME+"/src/include/kibuvits_msgc.rb"

#==========================================================================

# Inspired by the ruby-lang.org flaw #8438
class Kibuvits_rubylang_selftests_testclass_for_Binding_tests
   def initialize
   end # initialize

   def show_that_the_Binding_instances_are_readable
      bn_x=binding()
      s_x="Reading from Binding instances works."
      eval("puts s_x",bn_x)
   end # show_that_the_Binding_instances_are_readable


   def show_that_overwriting_of_existing_vars_works_fine
      bn_x=binding()
      s_x="Text subject to overwriting."
      eval("s_x=\"The modification of an existing variable succeeded.\"",bn_x)
      puts s_x
   end # show_that_overwriting_of_existing_vars_works_fine

   def show_that_new_variables_can_be_created_to_bindings
      bn_x=binding()
      eval("s_x=\"A value of a newly created variable\"",bn_x)
      puts s_x
   end # show_that_new_variables_can_be_created_to_bindings


   def run_demo
      show_that_the_Binding_instances_are_readable()
      show_that_overwriting_of_existing_vars_works_fine()
      show_that_new_variables_can_be_created_to_bindings()
   end # run_demo

end # class Kibuvits_rubylang_selftests_testclass_for_Binding_tests

# A set of selftests to test some assumptions that the
# Ruby interpreter must meet to keep the KRL working.
class Kibuvits_rubylang_selftests

   def initialize
   end #initialize

   private
   #-----------------------------------------------------------------------

   def Kibuvits_rubylang_selftests.test_the_binding_class
      ob_tests=Kibuvits_rubylang_selftests_testclass_for_Binding_tests.new
      s_err=nil
      #------------
      b_thrown=false
      begin
         ob_tests.show_that_the_Binding_instances_are_readable()
      rescue Exception => e
         b_thrown=true
         s_err=e.to_s
      end # rescue
      raise "test 1 e.to_s=="+s_err if b_thrown
      #------------
      b_thrown=false
      begin
         ob_tests.show_that_overwriting_of_existing_vars_works_fine()
      rescue Exception => e
         b_thrown=true
         s_err=e.to_s
      end # rescue
      raise "test 2 e.to_s=="+s_err if b_thrown
      #------------
      b_thrown=false
      begin
         ob_tests.show_that_new_variables_can_be_created_to_bindings()
      rescue Exception => e
         b_thrown=true
         s_err=e.to_s
      end # rescue
      raise "test 3 e.to_s=="+s_err if b_thrown
   end # Kibuvits_rubylang_selftests.test_the_binding_class

   #-----------------------------------------------------------------------

   public
   def Kibuvits_rubylang_selftests.selftest
      ar_msgs=Array.new
      bn=binding()
      #------------- 
      # Needs to be dormant till the ruby-lang.org flaw #8438 gets fixed.
      #kibuvits_testeval bn, "Kibuvits_rubylang_selftests.test_the_binding_class"
      #------------- 
      return ar_msgs
   end # Kibuvits_rubylang_selftests.selftest

end # class Kibuvits_rubylang_selftests

#--------------------------------------------------------------------------

#==========================================================================
#puts Kibuvits_rubylang_selftests.test_x_getset_semisparse_var.to_s

