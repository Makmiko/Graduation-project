function validate(event) {
    const id = event.target.getAttribute('id');
    if (id === 'area' || id === 'price') {
        let result = event.target.value.match(/^[0-9]+[.]?[0-9]*$/);
        if(result == null) {
            event.target.value = event.target.value.slice(0, -1);
        } else {
            event.target.value = result;
        }
    } else if(id === 'rooms') {
        let result = event.target.value.match(/^[0-9]+$/);
        if(result == null) {
            event.target.value = event.target.value.slice(0, -1);
        } else {
            event.target.value = result;
        }
    }
    // else if (id === 'Наименование' || id === 'area' || id === 'area') {
    //     event.target.value = event.target.value.replace(/[^а-я\s.,]/, '');/^[0-9]+[.]?[0-9]+$/
    // }
};
document.addEventListener('input', validate);