<?php

return <<<'LANGUAGEFUNCTION'
function(b){var c={className:"variable",variants:[{begin:/\$\d+/},{begin:/\$\{/,end:/}/},{begin:"[\\$\\@]"+b.UNDERSCORE_IDENT_RE}]};return{aliases:["nginxconf"],contains:[b.HASH_COMMENT_MODE,{begin:b.UNDERSCORE_IDENT_RE+"\\s+{",returnBegin:!0,end:"{",contains:[{className:"section",begin:b.UNDERSCORE_IDENT_RE}],relevance:0},{begin:b.UNDERSCORE_IDENT_RE+"\\s",end:";|{",returnBegin:!0,contains:[{className:"attribute",begin:b.UNDERSCORE_IDENT_RE,starts:{endsWithParent:!0,lexemes:"[a-z/_]+",keywords:{literal:"on off yes no true false none blocked debug info notice warn error crit select break last permanent redirect kqueue rtsig epoll poll /dev/poll"},
relevance:0,illegal:"=>",contains:[b.HASH_COMMENT_MODE,{className:"string",contains:[b.BACKSLASH_ESCAPE,c],variants:[{begin:/"/,end:/"/},{begin:/'/,end:/'/}]},{begin:"([a-z]+):/",end:"\\s",endsWithParent:!0,excludeEnd:!0,contains:[c]},{className:"regexp",contains:[b.BACKSLASH_ESCAPE,c],variants:[{begin:"\\s\\^",end:"\\s|{|;",returnEnd:!0},{begin:"~\\*?\\s+",end:"\\s|{|;",returnEnd:!0},{begin:"\\*(\\.[a-z\\-]+)+"},{begin:"([a-z\\-]+\\.)+\\*"}]},{className:"number",begin:"\\b\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}\\.\\d{1,3}(:\\d{1,5})?\\b"},
{className:"number",begin:"\\b\\d+[kKmMgGdshdwy]*\\b",relevance:0},c]}}],relevance:0}],illegal:"[^\\s\\}]"}};
LANGUAGEFUNCTION;
