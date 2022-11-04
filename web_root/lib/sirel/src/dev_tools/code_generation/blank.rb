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

#==========================================================================
