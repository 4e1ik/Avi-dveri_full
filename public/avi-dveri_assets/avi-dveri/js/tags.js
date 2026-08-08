document.addEventListener('DOMContentLoaded', function() {
    const moreBtn = document.getElementById('tagsMore');
    const hiddenTags = document.querySelectorAll('.tags__item--hidden');
    const tagsContainer = document.getElementById('tagsContainer');
    
    if (moreBtn && hiddenTags.length > 0) {
        moreBtn.textContent = '...';
        
        moreBtn.addEventListener('click', function() {
            this.classList.toggle('active');
            
            let isOpen = this.classList.contains('active');
            
            if (isOpen) {
                hiddenTags.forEach(function(tag) {
                    tag.style.display = 'inline-flex';
                    tagsContainer.insertBefore(tag, moreBtn);
                });
                this.textContent = '✕';
            } else {
                hiddenTags.forEach(function(tag) {
                    tag.style.display = 'none';
                    document.getElementById('tagsHidden').appendChild(tag);
                });
                this.textContent = '...';
            }
        });
    }
});