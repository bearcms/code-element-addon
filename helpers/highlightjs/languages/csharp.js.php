<?php

return <<<'LANGUAGEFUNCTION'
function(b){var d={keyword:"abstract as base bool break byte case catch char checked const continue decimal default delegate do double enum event explicit extern finally fixed float for foreach goto if implicit in int interface internal is lock long nameof object operator out override params private protected public readonly ref sbyte sealed short sizeof stackalloc static string struct switch this try typeof uint ulong unchecked unsafe ushort using virtual void volatile while add alias ascending async await by descending dynamic equals from get global group into join let on orderby partial remove select set value var where yield",
literal:"null false true"},e={className:"number",variants:[{begin:"\\b(0b[01']+)"},{begin:"(-?)\\b([\\d']+(\\.[\\d']*)?|\\.[\\d']+)(u|U|l|L|ul|UL|f|F|b|B)"},{begin:"(-?)(\\b0[xX][a-fA-F0-9']+|(\\b[\\d']+(\\.[\\d']*)?|\\.[\\d']+)([eE][-+]?[\\d']+)?)"}],relevance:0},c={className:"string",begin:'@"',end:'"',contains:[{begin:'""'}]},f=b.inherit(c,{illegal:/\n/}),g={className:"subst",begin:"{",end:"}",keywords:d},h=b.inherit(g,{illegal:/\n/}),k={className:"string",begin:/\$"/,end:'"',illegal:/\n/,contains:[{begin:"{{"},
{begin:"}}"},b.BACKSLASH_ESCAPE,h]},l={className:"string",begin:/\$@"/,end:'"',contains:[{begin:"{{"},{begin:"}}"},{begin:'""'},g]},m=b.inherit(l,{illegal:/\n/,contains:[{begin:"{{"},{begin:"}}"},{begin:'""'},h]});g.contains=[l,k,c,b.APOS_STRING_MODE,b.QUOTE_STRING_MODE,e,b.C_BLOCK_COMMENT_MODE];h.contains=[m,k,f,b.APOS_STRING_MODE,b.QUOTE_STRING_MODE,e,b.inherit(b.C_BLOCK_COMMENT_MODE,{illegal:/\n/})];c={variants:[l,k,c,b.APOS_STRING_MODE,b.QUOTE_STRING_MODE]};f=b.IDENT_RE+"(<"+b.IDENT_RE+"(\\s*,\\s*"+
b.IDENT_RE+")*>)?(\\[\\])?";return{aliases:["csharp","c#"],keywords:d,illegal:/::/,contains:[b.COMMENT("///","$",{returnBegin:!0,contains:[{className:"doctag",variants:[{begin:"///",relevance:0},{begin:"\x3c!--|--\x3e"},{begin:"</?",end:">"}]}]}),b.C_LINE_COMMENT_MODE,b.C_BLOCK_COMMENT_MODE,{className:"meta",begin:"#",end:"$",keywords:{"meta-keyword":"if else elif endif define undef warning error line region endregion pragma checksum"}},c,e,{beginKeywords:"class interface",end:/[{;=]/,illegal:/[^\s:,]/,
contains:[b.TITLE_MODE,b.C_LINE_COMMENT_MODE,b.C_BLOCK_COMMENT_MODE]},{beginKeywords:"namespace",end:/[{;=]/,illegal:/[^\s:]/,contains:[b.inherit(b.TITLE_MODE,{begin:"[a-zA-Z](\\.?\\w)*"}),b.C_LINE_COMMENT_MODE,b.C_BLOCK_COMMENT_MODE]},{className:"meta",begin:"^\\s*\\[",excludeBegin:!0,end:"\\]",excludeEnd:!0,contains:[{className:"meta-string",begin:/"/,end:/"/}]},{beginKeywords:"new return throw await else",relevance:0},{className:"function",begin:"("+f+"\\s+)+"+b.IDENT_RE+"\\s*\\(",returnBegin:!0,
end:/\s*[{;=]/,excludeEnd:!0,keywords:d,contains:[{begin:b.IDENT_RE+"\\s*\\(",returnBegin:!0,contains:[b.TITLE_MODE],relevance:0},{className:"params",begin:/\(/,end:/\)/,excludeBegin:!0,excludeEnd:!0,keywords:d,relevance:0,contains:[c,e,b.C_BLOCK_COMMENT_MODE]},b.C_LINE_COMMENT_MODE,b.C_BLOCK_COMMENT_MODE]}]}};
LANGUAGEFUNCTION;
