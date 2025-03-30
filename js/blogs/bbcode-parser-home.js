// This is a 'custom' iteration of BBCode to match my needs
function bbcodeToHtml(text) {
    const bbcodeRules = [
        { regex: /\[h1\](.*?)\[\/h1\]/gis, replacement: '$1<br/>' },
        { regex: /\[h2\](.*?)\[\/h2\]/gis, replacement: '$1<br/>' },
        { regex: /\[h3\](.*?)\[\/h3\]/gis, replacement: '$1<br/>' },
        { regex: /\[h4\](.*?)\[\/h4\]/gis, replacement: '$1<br/>' },
        { regex: /\[h5\](.*?)\[\/h5\]/gis, replacement: '$1<br/>' },
        { regex: /\[h6\](.*?)\[\/h6\]/gis, replacement: '$1<br/>' },
        { regex: /\[p\](.*?)\[\/p\]/gis, replacement: '$1<br/>' },
        { regex: /\[br\]/gis, replacement: '<br/>' },

        { regex: /\[b\](.*?)\[\/b\]/gis, replacement: '$1' },
        { regex: /\[i\](.*?)\[\/i\]/gis, replacement: '$1' },
        { regex: /\[u\](.*?)\[\/u\]/gis, replacement: '$1' },
        { regex: /\[s\](.*?)\[\/s\]/gis, replacement: '$1' },

        { regex: /\[a=(.*?)\](.*?)\[\/a\]/gis, replacement: '[(link) $2]' },
        { regex: /\[img=(.*?)\](.*?)\[\/img\]/gis, replacement: '[image here]' },
        { regex: /\[q=(.*?)\](.*?)\[\/q\]/gis, replacement: '[quote]' },
        { regex: /\[quote=(.*?)\](.*?)\[\/quote\]/gis, replacement: '[quote]' },
        { regex: /\[spoiler\](.*?)\[\/spoiler\]/gis, replacement: '[SPOILER]' },
        
        { regex: /\[code\](.*?)\[\/code\]/gis, replacement: '[code here]]' }
    ];

    bbcodeRules.forEach(rule => {
        text = text.replace(rule.regex, rule.replacement);
    });

    return text;
}

document.addEventListener("DOMContentLoaded", function () {
    let blogPs = document.getElementsByClassName("bbcodeparser");
    for (let blogP of blogPs) {
        blogP.innerHTML = bbcodeToHtml(blogP.innerHTML);
    }
});