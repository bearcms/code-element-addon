<?php

return <<<'LANGUAGEFUNCTION'
function(b){var c={keyword:"break default func interface select case map struct chan else goto package switch const fallthrough if range type continue for import return var go defer bool byte complex64 complex128 float32 float64 int8 int16 int32 int64 string uint8 uint16 uint32 uint64 int uint uintptr rune",literal:"true false iota nil",built_in:"append cap close complex copy imag len make new panic print println real recover delete"};return{aliases:["golang"],keywords:c,illegal:"</",contains:[b.C_LINE_COMMENT_MODE,
b.C_BLOCK_COMMENT_MODE,{className:"string",variants:[b.QUOTE_STRING_MODE,{begin:"'",end:"[^\\\\]'"},{begin:"`",end:"`"}]},{className:"number",variants:[{begin:b.C_NUMBER_RE+"[i]",relevance:1},b.C_NUMBER_MODE]},{begin:/:=/},{className:"function",beginKeywords:"func",end:/\s*\{/,excludeEnd:!0,contains:[b.TITLE_MODE,{className:"params",begin:/\(/,end:/\)/,keywords:c,illegal:/["']/}]}]}};
LANGUAGEFUNCTION;
