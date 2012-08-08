#!/usr/bin/perl -w

#this script scrapes all .js files looking for style markers.

#use strict;
#use warnings;

use File::Basename;

#use CSS::Simple; # for parsing CSS, silly!
use Data::Dumper;

#regex used for finding CSS class declarations
my $class_rex=/style_class\:\s*(['"])(.+)$1/;

#regex used for finding CSS id declarations. not yet used by gnome shell
my $id_rex=false; #doesn't appear to be used by gtk-St

#absolute path to the gnome-shell js file directory
my $js_path = "/usr/share/gnome-shell/js";

#absolute path of theme should be ~/.themes/theme-name or /usr/share/themes/theme-name
my $theme_path = $ENV{"HOME"}."/.themes/Bubbly-Blue-Theme";

#path of css file, relative to $theme_path
my $theme_css = "gnome-shell/gnome-shell.css";

#create a single file (gnome-shell.css)?
#if false, split css so that the .css file corresponds to the .js file 
my $one_file=false;

my $cur_file_path = "";

parse_css("$theme_path/$theme_css");

sub parse_css{
	my $file = shift;
	print "Reading theme at $file...";
	my $css_string = read_file( $file ) ;
	print "Done.\n";
	get_at_rules($css_string);
}

#at-rules are qw[ @charset @import @media @page @font-face @namespace]
sub get_at_rules{
  my $str = shift;
  while ($str=~/(\@(.*)\;)/){
		local @line = split(/\s+/,$2);
		local $cmd = "handle_at_".$line[0];
		#print "Found $line[0] at-rule: $1\n";
    $replacement = &$cmd(@line);
    print "Replacing $1 with $replacement";
    $str=~s/$1/$replacement/;
  }
}

sub build_css{

}
sub current_css{
}


#no need for this.
sub handle_at_charset{return "";}

#import urls and insert into the file
sub handle_at_import{
	my ($cmd,$url) = @_;
	$url =~ s/url\((['"])(.*)\1\)/$2/;
	print "Handling \@import $2\n";
	return parse_css("$cur_file_path/$url");
}
sub handle_at_media{}
sub handle_at_page{}

#defines a font to be used
sub handle_at_font_face{return "";}

#defines a namespace
sub handle_at_namespace{return "";}

sub read_file{
	my $file= shift;
	$cur_file_path = dirname $file;
  return do { local( @ARGV, $/ ) = $file ; <> };
}
