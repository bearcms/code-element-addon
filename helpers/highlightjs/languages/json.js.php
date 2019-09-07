<?php

return <<<'LANGUAGEFUNCTION'
function(b){var d={literal:"true false null"},c=[b.QUOTE_STRING_MODE,b.C_NUMBER_MODE],e={end:",",endsWithParent:!0,excludeEnd:!0,contains:c,keywords:d},f={begin:"{",end:"}",contains:[{className:"attr",begin:/"/,end:/"/,contains:[b.BACKSLASH_ESCAPE],illegal:"\\n"},b.inherit(e,{begin:/:/})],illegal:"\\S"};b={begin:"\\[",end:"\\]",contains:[b.inherit(e)],illegal:"\\S"};c.splice(c.length,0,f,b);return{contains:c,keywords:d,illegal:"\\S"}};
LANGUAGEFUNCTION;
