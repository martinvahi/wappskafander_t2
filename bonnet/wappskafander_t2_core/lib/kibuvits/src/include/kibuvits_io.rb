#!/usr/bin/env ruby
#==========================================================================
=begin
 Copyright 2009, martin.vahi@softf1.com that has an
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
   ob_pth_1=ob_pth_0.parent.parent.parent
   s_KIBUVITS_HOME_b_fs=ob_pth_1.to_s
   require(s_KIBUVITS_HOME_b_fs+"/src/include/kibuvits_boot.rb")
   ob_pth_0=nil; ob_pth_1=nil; s_KIBUVITS_HOME_b_fs=nil
end # if

KIBUVITS_RUBY_LIBRARY_IS_AVAILABLE=false if !defined? KIBUVITS_RUBY_LIBRARY_IS_AVAILABLE

#==========================================================================

# For string output, the kibuvits_writeln and kibuvits_write
# are defined in the kibuvits_boot.rb
# WARNING: it's not that well tested.
def kibuvits_write_to_stdout data
   $kibuvits_lc_mx_streamaccess.synchronize do
      # It's like the kibuvits_writeln, but without the
      an_io=STDOUT.reopen($stdout)
      an_io.write data
      an_io.flush
      an_io.close
   end # synchronize
end # kibuvits_write_to_stdout

#--------------------------------------------------------------------------
def str2file(s_a_string, s_fp)
   $kibuvits_lc_mx_streamaccess.synchronize do
      begin
         if KIBUVITS_RUBY_LIBRARY_IS_AVAILABLE
            if KIBUVITS_b_DEBUG
               bn=binding()
               kibuvits_typecheck bn, String, s_a_string
               kibuvits_typecheck bn, String, s_fp
            end # if
         end # if
         file=File.open(s_fp, "w")
         file.write(s_a_string)
         file.close
      rescue Exception =>err
         raise "No comments. GUID='44f31a72-79e5-41ec-aa5e-616030119dd7' \n"+
         "s_a_string=="+s_a_string+"\n"+err.to_s+"\n\n"
      end #
   end # synchronize
end # str2file

#--------------------------------------------------------------------------
# It's actually a copy of a TESTED version of
# kibuvits_s_concat_array_of_strings
# and this copy here is made to avoid making the
# kibuvits_io.rb to depend on the kibuvits_str.rb
def kibuvits_hack_to_break_circular_dependency_between_io_and_str_kibuvits_s_concat_array_of_strings(ar_in)
   n=ar_in.size
   if KIBUVITS_RUBY_LIBRARY_IS_AVAILABLE
      if KIBUVITS_b_DEBUG
         bn=binding()
         kibuvits_typecheck bn, Array, ar_in
         s=nil
         n.times do |i|
            bn=binding()
            s=ar_in[i]
            kibuvits_typecheck bn, String, s
         end # loop
      end # if
   end # if
   s_out="";
   n.times{|i| s_out<<ar_in[i]}
   return s_out;
end # kibuvits_hack_to_break_circular_dependency_between_io_and_str_kibuvits_s_concat_array_of_strings

def file2str(s_file_path)
   s_out=$kibuvits_lc_emptystring
   $kibuvits_lc_mx_streamaccess.synchronize do
      if KIBUVITS_RUBY_LIBRARY_IS_AVAILABLE
         if KIBUVITS_b_DEBUG
            kibuvits_typecheck binding(), String, s_file_path
         end # if
      end # if
      # The idea here is to make the file2str easily copyable to projects that
      # do not use the Kibuvits Ruby Library.
      s_fp=nil
      s_fp=s_file_path
      ar_lines=Array.new
      begin
         File.open(s_fp) do |file|
            while line = file.gets
               ar_lines<<$kibuvits_lc_emptystring+line
            end # while
         end # Open-file region.
         s_out=kibuvits_hack_to_break_circular_dependency_between_io_and_str_kibuvits_s_concat_array_of_strings(ar_lines)
      rescue Exception =>err
         raise "\n"+err.to_s+"\n\ns_file_path=="+s_file_path+"\n\n"
      end #
   end # synchronize
   return s_out
end # file2str

#--------------------------------------------------------------------------
# The main purpose of this method is to encapsulate the console
# reading code, because there's just too many unanswered questions about
# the console reading.
def read_a_line_from_console
   s_out=nil
   $kibuvits_lc_mx_streamaccess.synchronize do
      # The IO.gets() treats console arguments as if they would have
      # been  as user input for a query. For some weird reason,
      # the current solution works.
      s_out=""+$stdin.gets
   end # synchronize
   return s_out
end # read_a_line_from_console

def write_2_console a_string
   $kibuvits_lc_mx_streamaccess.synchronize do
      # The "" is just for reducing the probability of
      # mysterious memory sharing related quirk-effects.
      $stdout.write ""+a_string.to_s
   end # synchronize
end # write_2_console

def writeln_2_console a_string,
   i_number_of_prefixing_linebreaks=0,
   i_number_of_suffixing_linebreaks=1
   s=("\n"*i_number_of_prefixing_linebreaks)+a_string.to_s+
   ("\n"*i_number_of_suffixing_linebreaks)
   write_2_console s
end # write_2_console

class Kibuvits_io
   @@cache=Hash.new
   def initialize
   end #initialize

   #-----------------------------------------------------------------------

   def creat_empty_ht_stdstreams
      ht_stdstreams=Hash.new
      ht_stdstreams['s_stdout']=""
      ht_stdstreams['s_stderr']=""
      return 	ht_stdstreams
   end # creat_empty_ht_stdstreams

   def Kibuvits_io.creat_empty_ht_stdstreams
      ht_stdstreams=Kibuvits_io.instance.creat_empty_ht_stdstreams
      return ht_stdstreams
   end # Kibuvits_io.creat_empty_ht_stdstreams

   #-----------------------------------------------------------------------

   # A computer might have multiple network
   # cards, like WiFi card, mobile internet USB-stick, etc.
   #
   # If only loop-back interfaces are found, a random
   # "localhost" loop-back IP-addrss is returned.
   #
   # Action priorities:
   #
   #     highest_priority) Return a non-loop-back IPv4 address
   #       lower_priority) Return a non-loop-back IPv6 address
   #       lower_priority) Return a loop-back IPv4 address
   #       lower_priority) Return a loop-back IPv6 address
   #      lowest_priority) Throw an exception
   #
   # The reason, why IPv4 is preferred to IPv6 is
   # that IPv6 addresses are assigned to interfaces
   # on LAN even, when the actual internet connection
   # is available only through an IPv4 address.
   #
   # On the other hand, just like NAT almost solved the
   # IPv4 address space problem by mapping
   # LANipAddress:whateverport1_to_WANipAddress:someport2
   # it is possible to increase the number of end-point
   # addresses even further by adding a software layer, like
   # ApplicationName_LANipAddress:whateverport1, where the
   # ApplicationName might depict a multiplexer/demultiplexer.
   # That is to say, the IPv4 addresses are likely
   # to go a pretty long way.
   def s_one_of_the_public_IP_addresses_or_a_loopback_if_unconnected
      if !defined? $kibuvits_inclusionconstannt_kibuvits_io_s_one_of_the_public_IP_addresses_or_a_loopback_if_unconnected
         # The interpreter is sometimes picky, if real
         # Ruby constants are  in a function.
         require "socket"
         $kibuvits_inclusionconstannt_kibuvits_io_s_one_of_the_public_IP_addresses_or_a_loopback_if_unconnected=true
      end # if
      ar_doable=Array.new(5,false) # actions by priority
      #ar_doable[4]=true # throw, if all else fails, outcommented due to a hack
      ar_data=Array.new(5,nil)
      # Credits go to to:
      # http://stackoverflow.com/questions/5029427/ruby-get-local-ip-nix
      ar_addrinfo=Socket.ip_address_list
      ar_addrinfo.each do |ob_addrinfo|
         if ob_addrinfo.ipv6?
            next if ob_addrinfo.ipv6_multicast?
            if ob_addrinfo.ipv6_loopback?
               ar_doable[3]=true
               ar_data[3]=ob_addrinfo.ip_address
               next
            end # if
            next if ar_doable[1]
            ar_doable[1]=true
            ar_data[1]=ob_addrinfo.ip_address
         else
            if ob_addrinfo.ipv4?
               next if ob_addrinfo.ipv4_multicast?
               if ob_addrinfo.ipv4_loopback?
                  ar_doable[2]=true
                  ar_data[2]=ob_addrinfo.ip_address
                  next
               end # if
               next if ar_doable[0]
               ar_doable[0]=true
               ar_data[0]=ob_addrinfo.ip_address
            else
               kibuvits_throw("ob_addrinfo.to_s=="+ob_addrinfo.to_s+
               "\n GUID='b258e56b-7570-43b9-9a5e-616030119dd7'\n\n")
            end # if
         end # if
      end # loop
      i_n=ar_doable.size-1 # The last option is throwing.
      i_n.times do |i_ix|
         if ar_doable[i_ix]
            s_out=ar_data[i_ix]
            return s_out
         end # if
      end # loop
      kibuvits_throw("ar_addrinfo.to_s=="+ar_addrinfo.to_s+
      "\n GUID='43fcec15-43a4-41a7-b14e-616030119dd7'\n\n")
   end # s_one_of_the_public_IP_addresses_or_a_loopback_if_unconnected

   def Kibuvits_io.s_one_of_the_public_IP_addresses_or_a_loopback_if_unconnected
      s_out=Kibuvits_io.instance.s_one_of_the_public_IP_addresses_or_a_loopback_if_unconnected
      return s_out
   end # Kibuvits_io.s_one_of_the_public_IP_addresses_or_a_loopback_if_unconnected

   #-----------------------------------------------------------------------

   public
   include Singleton

end # class Kibuvits_io

#==========================================================================

