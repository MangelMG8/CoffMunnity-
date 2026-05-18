document.addEventListener('DOMContentLoaded', () => {   
    var quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Escribe aquí tu experiencia cafetera...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'color': [] }, { 'background': [] }],
                ['link', 'blockquote'],
                ['clean']
            ]
        }
    });

    const typeSelect = document.getElementById('post_type');
    const secReview = document.getElementById('dynamic_review');
    const secRecipe = document.getElementById('dynamic_recipe');
    const secArticle = document.getElementById('dynamic_article');

    const hideAll = () => {
        [secReview, secRecipe, secArticle].forEach(sec => {
            sec.classList.add('hidden');
            const inputs = sec.querySelectorAll('input');
            inputs.forEach(input => input.value = '');
        });
    };

    typeSelect.addEventListener('change', (e) => {
        hideAll(); 
        const selected = e.target.value;
        if (selected === 'review') secReview.classList.remove('hidden');
        else if (selected === 'recipe') secRecipe.classList.remove('hidden');
        else if (selected === 'article') secArticle.classList.remove('hidden');
    });

    const form = document.getElementById('createPostForm');
    const hiddenContent = document.getElementById('hidden_content');

    form.addEventListener('submit', function(e) {
        var htmlContent = quill.root.innerHTML;
        
        if (htmlContent === '<p><br></p>' || quill.getText().trim().length === 0) {
            e.preventDefault();
            alert("El contenido del post no puede estar vacío.");
            return;
        }

        hiddenContent.value = htmlContent;
    });
});