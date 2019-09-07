function (html) {
    var changes = {
        'comment': 'comment',
        'quote': 'comment',
        'doctag': 'comment',
        'keyword': 'keyword',
        'selector-tag': 'keyword',
        'variable': 'variable',
        'template-variable': 'variable',
        'entity-attr': 'variable',
        'attr': 'variable',
        'number': 'value',
        'literal': 'value',
        'regexp': 'value',
        'string': 'value',
        'subst': 'value',
        'symbol': 'value'
    }
    for (var search in changes) {
        html = html.split('bearcms-code-element-entity-internal-' + search).join('bearcms-code-element-entity-' + changes[search]);
    }
    html = html.replace(new RegExp(' class="bearcms-code-element-entity-internal-[a-z\-]*"', 'g'), '');
    return html;
};