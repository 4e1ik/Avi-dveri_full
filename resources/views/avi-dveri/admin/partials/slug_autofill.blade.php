<script>
(function () {
    const translitMap = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'yo',
        'ж': 'zh', 'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm',
        'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
        'ф': 'f', 'х': 'h', 'ц': 'ts', 'ч': 'ch', 'ш': 'sh', 'щ': 'sch',
        'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya'
    };

    function slugify(text) {
        if (!text || typeof text !== 'string') return '';
        let slug = text.toLowerCase();
        slug = slug.replace(/[а-яё]/g, function (ch) { return translitMap[ch] || ch; });
        slug = slug.replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
        return slug;
    }

    function init() {
        const titleInput = document.querySelector('input[name="title"]');
        const slugInput = document.getElementById('slug');
        if (!titleInput || !slugInput) return;

        titleInput.addEventListener('input', function () {
            slugInput.value = slugify(this.value);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>
