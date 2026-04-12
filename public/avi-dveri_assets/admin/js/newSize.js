document.addEventListener('DOMContentLoaded', () => {
    const panelBody = document.getElementById('panel-body');
    if (!panelBody) {
        return;
    }

    const existingSizes = Array.from(panelBody.querySelectorAll('.inputSize'));

    panelBody.addEventListener('click', (e) => {
        const addBtn = e.target.closest('.js-size-add');
        if (addBtn) {
            const inputSize = addBtn.closest('.inputSize');
            const newInputSize = inputSize.cloneNode(true);
            newInputSize.querySelectorAll('input').forEach((input) => {
                input.value = '';
            });
            newInputSize.querySelectorAll('select').forEach((select) => {
                select.selectedIndex = 0;
            });
            panelBody.appendChild(newInputSize);
            return;
        }

        const removeBtn = e.target.closest('.js-size-remove');
        if (removeBtn) {
            const inputSize = removeBtn.closest('.inputSize');
            if (panelBody.querySelectorAll('.inputSize').length > 1) {
                inputSize.remove();
            } else {
                alert('Нельзя удалить последнее поле.');
            }
        }
    });

    if (existingSizes.length) {
        existingSizes.forEach((sizeBlock) => {
            const input = sizeBlock.querySelector('input');
            if (input && input.value) {
                input.setAttribute('value', input.value);
            }
        });
    }
});
