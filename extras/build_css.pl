#!/usr/bin/perl

#this script scrapes all .js files looking for style markers.

use CSS::Simple; # for parsing CSS, silly!
use Data::Dumper;

$class_rex=/style_class\:\s*(['"])(.+)$1/;
$id_rex=false; #doesn't appear to be used by gtk-St

$js_path = "/usr/share/gnome-shell/js";
$theme_path = $ENV{"HOME"}."/.themes/Bubbly-Blue-Theme";

#creates a single file: gnome-shell.css
#if false, split css so that the .css file corresponds to the .js file 
$one_file=false;

my $css = CSS::Simple->new();
#my $css = CSS->new({parser=>'CSS::Parse::Lite',adaptor=>'CSS::Adaptor::Pretty'});

print "Reading theme at $theme_path/gnome-shell/gnome-shell.css...";
$css->read_file({filename=>"$theme_path/gnome-shell/gnome-shell.css"});
print "Done.\n";
print Dumper $css->get_selectors;
print $css->write();

sub current_css{

}

#at-rules are qw[ @charset @import @media @page @font-face @namespace]
sub get_at_rules{
  my $str = shift;
  while $str=~s/(\@(.*)\;)//
}
sub build_css{

}

sub parse_file{
  my $filename = shift;
  
}

#no need for this.
sub handle_at_charset{return "";}
sub handle_at_import{}
sub handle_at_media{}
sub handle_at_page{}

#defines a font to be used
sub handle_at_font_face{return "";}

#defines a namespace
sub handle_at_namespace{return "";}

