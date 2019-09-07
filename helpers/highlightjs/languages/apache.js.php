<?php

return <<<'LANGUAGEFUNCTION'
function(b){var c={className:"number",begin:"[\\$%]\\d+"};return{aliases:["apacheconf"],case_insensitive:!0,contains:[b.HASH_COMMENT_MODE,{className:"section",begin:"</?",end:">"},{className:"attribute",begin:/\w+/,relevance:0,keywords:{nomarkup:"order deny allow setenv rewriterule rewriteengine rewritecond documentroot sethandler errordocument loadmodule options header listen serverroot servername"},starts:{end:/$/,relevance:0,keywords:{literal:"on off all"},contains:[{className:"meta",begin:"\\s\\[",
end:"\\]$"},{className:"variable",begin:"[\\$%]\\{",end:"\\}",contains:["self",c]},c,b.QUOTE_STRING_MODE]}}],illegal:/\S/}};
LANGUAGEFUNCTION;
