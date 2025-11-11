#!/usr/bin/env ruby
#==========================================================================
=begin
 Initial author: Martin.Vahi@softf1.com

 Copyright 2024, martin.vahi@softf1.com that has an Estonian personal
 identification code of 38108050020. All rights reserved.

 Redistribution and use in source and binary forms, with or without
 modification, are permitted provided that the following conditions are
 met:

 * Redistributions of source code must retain the above copyright
   notice, this list of conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright
   notice, this list of conditions and the following disclaimer
   in the documentation and/or other materials provided with the
   distribution.
 * Neither the name of the Martin Vahi nor the names of its
   contributors may be used to endorse or promote products derived
   from this software without specific prior written permission.

 THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

 The following line is a spdx.org license label line:
 SPDX-License-Identifier: BSD-3-Clause-Clear
=end
#==========================================================================
# This file allows to run Ruby version 2.4.0 code with Ruby language 
# version 3.4.1 implementation.
#--------------------------------------------------------------------------
# Most Ruby versions prior to Ruby version 3.4.1 had that method. This
# code makes old code that worked with those older Ruby versions work
# with the Ruby version 3.4.1 .
if !defined? File.exists?
   def File.exists? x
      b=File.exist? x
      return b
   end # File.exists?
end # if
# Ruby 2.4.0 introduced a change, where classes Fixnum and Bignum were
# deprecated their use triggered a warning text to stderr and their
# common parent class, Integer, was expected to be used instead of
# them. Ruby version 2.7.2 removed the warning from the stderr. Ruby
# version 3.4.1 missed the classes, Fixnum and Bignum. The following 2
# if-clauses keep the old code working.
if !defined? Fixnum
   Fixnum=Integer
end # if
if !defined? Bignum
   Bignum=Integer
end # if
#==========================================================================
# S_VERSION_OF_THIS_FILE="205a3af2-b23c-464f-864f-f261a0c129e7"
#==========================================================================
