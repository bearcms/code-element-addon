<?php

return <<<'LANGUAGEFUNCTION'
function(b){var d={keyword:"and then defined module in return redo if BEGIN retry end for self when next until do begin unless END rescue else break undef not super class case require yield alias while ensure elsif or include attr_reader attr_writer attr_accessor",literal:"true false nil"},c={className:"doctag",begin:"@[A-Za-z]+"},f={begin:"#<",end:">"};c=[b.COMMENT("#","$",{contains:[c]}),b.COMMENT("^\\=begin","^\\=end",{contains:[c],relevance:10}),b.COMMENT("^__END__","\\n$")];var e={className:"subst",
begin:"#\\{",end:"}",keywords:d},g={className:"string",contains:[b.BACKSLASH_ESCAPE,e],variants:[{begin:/'/,end:/'/},{begin:/"/,end:/"/},{begin:/`/,end:/`/},{begin:"%[qQwWx]?\\(",end:"\\)"},{begin:"%[qQwWx]?\\[",end:"\\]"},{begin:"%[qQwWx]?{",end:"}"},{begin:"%[qQwWx]?<",end:">"},{begin:"%[qQwWx]?/",end:"/"},{begin:"%[qQwWx]?%",end:"%"},{begin:"%[qQwWx]?-",end:"-"},{begin:"%[qQwWx]?\\|",end:"\\|"},{begin:/\B\?(\\\d{1,3}|\\x[A-Fa-f0-9]{1,2}|\\u[A-Fa-f0-9]{4}|\\?\S)\b/},{begin:/<<[-~]?'?(\w+)(?:.|\n)*?\n\s*\1\b/,
returnBegin:!0,contains:[{begin:/<<[-~]?'?/},{begin:/\w+/,endSameAsBegin:!0,contains:[b.BACKSLASH_ESCAPE,e]}]}]},h={className:"params",begin:"\\(",end:"\\)",endsParent:!0,keywords:d};b=[g,f,{className:"class",beginKeywords:"class module",end:"$|;",illegal:/=/,contains:[b.inherit(b.TITLE_MODE,{begin:"[A-Za-z_]\\w*(::\\w+)*(\\?|\\!)?"}),{begin:"<\\s*",contains:[{begin:"("+b.IDENT_RE+"::)?"+b.IDENT_RE}]}].concat(c)},{className:"function",beginKeywords:"def",end:"$|;",contains:[b.inherit(b.TITLE_MODE,
{begin:"[a-zA-Z_]\\w*[!?=]?|[-+~]\\@|<<|>>|=~|===?|<=>|[<>]=?|\\*\\*|[-/+%^&*~`|]|\\[\\]=?"}),h].concat(c)},{begin:b.IDENT_RE+"::"},{className:"symbol",begin:b.UNDERSCORE_IDENT_RE+"(\\!|\\?)?:",relevance:0},{className:"symbol",begin:":(?!\\s)",contains:[g,{begin:"[a-zA-Z_]\\w*[!?=]?|[-+~]\\@|<<|>>|=~|===?|<=>|[<>]=?|\\*\\*|[-/+%^&*~`|]|\\[\\]=?"}],relevance:0},{className:"number",begin:"(\\b0[0-7_]+)|(\\b0x[0-9a-fA-F_]+)|(\\b[1-9][0-9_]*(\\.[0-9_]+)?)|[0_]\\b",relevance:0},{begin:"(\\$\\W)|((\\$|\\@\\@?)(\\w+))"},
{className:"params",begin:/\|/,end:/\|/,keywords:d},{begin:"("+b.RE_STARTERS_RE+"|unless)\\s*",keywords:"unless",contains:[f,{className:"regexp",contains:[b.BACKSLASH_ESCAPE,e],illegal:/\n/,variants:[{begin:"/",end:"/[a-z]*"},{begin:"%r{",end:"}[a-z]*"},{begin:"%r\\(",end:"\\)[a-z]*"},{begin:"%r!",end:"![a-z]*"},{begin:"%r\\[",end:"\\][a-z]*"}]}].concat(c),relevance:0}].concat(c);e.contains=b;h.contains=b;return{aliases:["rb","gemspec","podspec","thor","irb"],keywords:d,illegal:/\/\*/,contains:c.concat([{begin:/^\s*=>/,
starts:{end:"$",contains:b}},{className:"meta",begin:"^([>?]>|[\\w#]+\\(\\w+\\):\\d+:\\d+>|(\\w+-)?\\d+\\.\\d+\\.\\d(p\\d+)?[^>]+>)",starts:{end:"$",contains:b}}]).concat(b)}};
LANGUAGEFUNCTION;