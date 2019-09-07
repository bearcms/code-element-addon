<?php

return <<<'LANGUAGEFUNCTION'
function(b){return{case_insensitive:!0,illegal:/[=\/|'\$]/,contains:[b.C_BLOCK_COMMENT_MODE,{className:"selector-id",begin:/#[A-Za-z0-9_-]+/},{className:"selector-class",begin:/\.[A-Za-z0-9_-]+/},{className:"selector-attr",begin:/\[/,end:/\]/,illegal:"$"},{className:"selector-pseudo",begin:/:(:)?[a-zA-Z0-9_\-\+\(\)"'.]+/},{begin:"@(font-face|page)",lexemes:"[a-z-]+",keywords:"font-face page"},{begin:"@",end:"[{;]",illegal:/:/,contains:[{className:"keyword",begin:/\w+/},{begin:/\s/,endsWithParent:!0,
excludeEnd:!0,relevance:0,contains:[b.APOS_STRING_MODE,b.QUOTE_STRING_MODE,b.CSS_NUMBER_MODE]}]},{className:"selector-tag",begin:"[a-zA-Z-][a-zA-Z0-9_-]*",relevance:0},{begin:"{",end:"}",illegal:/\S/,contains:[b.C_BLOCK_COMMENT_MODE,{begin:/(?:[A-Z_\.\-]+|--[a-zA-Z0-9_-]+)\s*:/,returnBegin:!0,end:";",endsWithParent:!0,contains:[{className:"attribute",begin:/\S/,end:":",excludeEnd:!0,starts:{endsWithParent:!0,excludeEnd:!0,contains:[{begin:/[\w-]+\(/,returnBegin:!0,contains:[{className:"built_in",
begin:/[\w-]+/},{begin:/\(/,end:/\)/,contains:[b.APOS_STRING_MODE,b.QUOTE_STRING_MODE]}]},b.CSS_NUMBER_MODE,b.QUOTE_STRING_MODE,b.APOS_STRING_MODE,b.C_BLOCK_COMMENT_MODE,{className:"number",begin:"#[0-9A-Fa-f]+"},{className:"meta",begin:"!important"}]}}]}]}]}};
LANGUAGEFUNCTION;
