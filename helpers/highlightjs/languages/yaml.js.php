<?php

return <<<'LANGUAGEFUNCTION'
function(b){var c={className:"attr",variants:[{begin:"^[ \\-]*[a-zA-Z_][\\w\\-]*:"},{begin:'^[ \\-]*"[a-zA-Z_][\\w\\-]*":'},{begin:"^[ \\-]*'[a-zA-Z_][\\w\\-]*':"}]},d={className:"string",relevance:0,variants:[{begin:/'/,end:/'/},{begin:/"/,end:/"/},{begin:/\S+/}],contains:[b.BACKSLASH_ESCAPE,{className:"template-variable",variants:[{begin:"{{",end:"}}"},{begin:"%{",end:"}"}]}]};return{case_insensitive:!0,aliases:["yml","YAML","yaml"],contains:[c,{className:"meta",begin:"^---s*$",relevance:10},
{className:"string",begin:"[\\|>] *$",returnEnd:!0,contains:d.contains,end:c.variants[0].begin},{begin:"<%[%=-]?",end:"[%-]?%>",subLanguage:"ruby",excludeBegin:!0,excludeEnd:!0,relevance:0},{className:"type",begin:"!"+b.UNDERSCORE_IDENT_RE},{className:"type",begin:"!!"+b.UNDERSCORE_IDENT_RE},{className:"meta",begin:"&"+b.UNDERSCORE_IDENT_RE+"$"},{className:"meta",begin:"\\*"+b.UNDERSCORE_IDENT_RE+"$"},{className:"bullet",begin:"^ *-",relevance:0},b.HASH_COMMENT_MODE,{beginKeywords:"true false yes no null",
keywords:{literal:"true false yes no null"}},b.C_NUMBER_MODE,d]}};
LANGUAGEFUNCTION;
