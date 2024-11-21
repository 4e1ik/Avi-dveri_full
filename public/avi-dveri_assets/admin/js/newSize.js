document.addEventListener('DOMContentLoaded', ()  => {
    const panelBody = document.getElementById('panel-body');

    panelBody.addEventListener('click', (e) => {
        if (e.target.classList.contains('addButton')) {
            const inputSize = e.target.closest('.inputSize');
            const newInputSize = inputSize.cloneNode(true);

            newInputSize.querySelectorAll('input').forEach((input) =>  {
                input.value = '';
            });

            panelBody.appendChild(newInputSize);
        }
    });
});