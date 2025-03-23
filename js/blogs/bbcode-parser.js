// This is a 'custom' iteration of BBCode to match my needs
function bbcodeToHtml(text) {
    const bbcodeRules = [
        { regex: /\[h1\](.*?)\[\/h1\]/gis, replacement: '<h1>$1</h1>' },
        { regex: /\[h2\](.*?)\[\/h2\]/gis, replacement: '<h2>$1</h2>' },
        { regex: /\[h3\](.*?)\[\/h3\]/gis, replacement: '<h3>$1</h3>' },
        { regex: /\[h4\](.*?)\[\/h4\]/gis, replacement: '<h4>$1</h4>' },
        { regex: /\[h5\](.*?)\[\/h5\]/gis, replacement: '<h5>$1</h5>' },
        { regex: /\[h6\](.*?)\[\/h6\]/gis, replacement: '<h6>$1</h6>' },
        { regex: /\[p\](.*?)\[\/p\]/gis, replacement: '<p>$1</p>' },
        { regex: /\[br\]/gis, replacement: '<br>' },

        { regex: /\[b\](.*?)\[\/b\]/gis, replacement: '<strong>$1</strong>' },
        { regex: /\[i\](.*?)\[\/i\]/gis, replacement: '<em>$1</em>' },
        { regex: /\[u\](.*?)\[\/u\]/gis, replacement: '<u>$1</u>' },
        { regex: /\[s\](.*?)\[\/s\]/gis, replacement: '<s>$1</s>' },

        { regex: /\[a=(.*?)\](.*?)\[\/a\]/gis, replacement: '<a href="$1" target="_blank">$2</a>' },
        { regex: /\[img=(.*?)\](.*?)\[\/img\]/gis, replacement: '<img src="$1" alt="$2" />' },
        { regex: /\[q=(.*?)\](.*?)\[\/q\]/gis, replacement: '<q cite="$1">$2</q>' },
        { regex: /\[quote=(.*?)\](.*?)\[\/quote\]/gis, replacement: '<blockquote cite="$1"><p>$2</p></blockquote>' },
        { regex: /\[spoiler\](.*?)\[\/spoiler\]/gis, replacement: '<span class="spoiler">$1</span>' },
        
        { regex: /\[code\](.*?)\[\/code\]/gis, replacement: '<pre><code>$1</code></pre>' }
    ];

    bbcodeRules.forEach(rule => {
        text = text.replace(rule.regex, rule.replacement);
    });

    return text;
}

document.addEventListener("DOMContentLoaded", function () {
    let blogDiv = document.getElementById("blog-content");
    if (blogDiv) {
        blogDiv.innerHTML = bbcodeToHtml(blogDiv.innerText);
    }
});